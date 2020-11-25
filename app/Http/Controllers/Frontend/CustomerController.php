<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Citys;
use App\Models\Customers;
use App\Models\Orders;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordEmail;

class CustomerController extends Controller
{
    public function index()
    {
        return view("frontend.customer.login");
    }
    public function postLogin(Request $request)
    {
//        dd($request->all());
        $login = Auth::guard('cus')->attempt(["email"=>$request->__get("email"),"password"=>$request->__get("password")]);
//        dd($login);
        if ($login){
            return redirect()->back();
        }
        return redirect()->back()->with("error","Login failed..");
    }
    public function getRegister()
    {
        return view("frontend.customer.register");
    }
    public function postRegister(Request $request)
    {
        $request->validate([
           "customer_name"=>"required|min:3",
           "email"=>"required|unique:customers",
           "password"=>"required|min:6",
           "password_cf"=>"same:password"
        ]);
        $cus = Customers::create([
            "customer_name"=>$request->customer_name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);
        if ($cus)
        {
            return redirect()->route("customer.login")->with("success","Sign Up Success...");
        }
        return redirect()->back()->with("error","Registration failed...");
    }
    public function logoutCustomer()
    {
        Auth::guard("cus")->logout();
        return redirect()->route("Home");
    }
    public function getArea($id)
    {
        $citys = Citys::where('area_id',$id)->get();
        foreach ($citys as $value)
        {
            echo "<option value='".$value->id."'>".$value->name_city."</option>";
        }
    }
    public function purchaseOrder(Customers $customer)
    {
        $id = $customer->__get("id");
        $order = Orders::where("customer_id",$id)->orderby("status","ASC")->get();
        return view("frontend.checkout.purchase_order",compact("order"));
    }
    public function getProfile(Customers $customer)
    {
        $data = Customers::find($customer->id);
        return view("frontend.checkout.profile",compact("data"));

    }
    public function postProfile(Request $request,Customers $customer)
    {
//        dd($request->all());
//        dd($customer->id);
        $cus = Customers::find($customer->id);
//        dd($cus);
        $random = Str::random(4);
        $image = "";
        if ($request->hasFile("image"))
        {
            $file = $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("thong_bao","File avatar không hợp lệ..");
            }
            if (!is_null($cus->__get("image"))){
                unlink($cus->__get("image"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/account"),$fileImage);
            $image = "upload/account/".$fileImage;
//            $request->merge(["image2" => $image]);
        }else{
            $image = $cus->__get("image");
//            $request->merge(["image2" => $image]);
        }
        $cus->customer_name = $request->customer_name;
        $cus->address = $request->address;
        $cus->phone_number = $request->phone_number;
        $cus->image = $image;
        $cus->save();
        return redirect()->back();

    }


    //ajax
    public function orderAll(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }
    public function awaiting(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->where("status",0)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }
    public function confirmed(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->where("status",1)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }
    public function beingTransported(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->where("status",2)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }
    public function complete(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->where("status",3)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }
    public function cancel(Customers $customer)
    {
        $id = $customer->id;
        $order = Orders::where("customer_id",$id)->where("status",4)->orderby("updated_at","DESC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }


    public function getForgotPass()
    {
        return view("frontend.customer.forgot");
    }
    public function postForgotPass(Request $request)
    {
        $email = $request->email;
        $checkUser = Customers::where("email",$email)->first();
        if (!$checkUser)
        {
            return redirect()->back()->with("error","Email not failed...");
        }
        $remember_token = bcrypt(md5(time().$email));
        $checkUser->remember_token = $remember_token;
        $checkUser->save();
        $url = route('customer.link-resetpas',["remember_token"=>$checkUser->remember_token,"email"=>$email]);
        \Mail::to($request->email)->send(new ForgotPasswordEmail($url));
        return redirect()->back()->with("success","Send Mail Success...");
    }
    public function getRessetPass(Request $request)
    {
        $remember_token = $request->remember_token;
        $email = $request->email;

        $checkUser = Customers::where([
            'remember_token'=>$remember_token,
            'email'=>$email
        ])->first();
        if (!$checkUser)
        {
            return redirect()->with("error","The path is incorrect..");
        }
        return view("frontend.customer.resset-password",compact("checkUser"));
    }
    public function saveRessetPass(Request $request)
    {
        $request->validate([
            "password"=>"required|min:6",
            "password_cf"=>"required|same:password"
        ],
            [
                "password_cf.same"=>"Password does not match..."
            ]);
        if ($request->password)
        {
            $remember_token = $request->remember_token;
            $email = $request->email;
            $checkUser = Customers::where([
                'remember_token'=>$remember_token,
                'email'=>$email
            ])->first();
            if (!$checkUser)
            {
                return redirect()->back()->with("error","The path is incorrect..");
            }
            $checkUser->password = bcrypt($request->password);
            $checkUser->save();
            return redirect()->to(route("customer.login"))->with("success","Change password successfully...");

        }
    }

    public function huyDon($id,Request $request)
    {
        $or = Orders::findOrFail($id);
        $or->status = request()->status;
        $or->save();
        $order = Orders::where("customer_id",$or->customer_id)->orderby("status","ASC")->get();
        return view("frontend.checkout.ajax_orders.ajax_purchase_order",compact("order"));
    }

}
