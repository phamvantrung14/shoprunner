<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Roles;
use App\Models\User_role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view("admin.account.index-admin",compact("users"));
    }
    public function searchUser(Request $request)
    {
        $users = User::where("email",'like','%'.$request->email.'%')->where("role",$request->role)->paginate(10);
        return view("admin.account.index-admin",compact("users"));
    }
    public function deleteAdmin($id)
    {
        $data = User::findOrFail($id);
        if (Auth::user()->id==2)
        {
            if ($data->id==2)
            {
                return redirect()->back()->with("error","This account cannot be deleted...");
            }else{
                $data->delete();
                return redirect()->back()->with("success","Account deletion was successful...");
            }
        }
        return redirect()->back()->with("error","Your account does not have permission to delete...");
    }
    public function grantRightAdmin($id)
    {
        $data = User::findOrFail($id);
        $role_assignments = $data->getRoles->pluck('name','id')->toArray();
//        dd($role_assignments);
        $role = Roles::orderBy('name','ASC')->get();
        return view("admin.account.grant-right-admin",compact("data","role","role_assignments"));
    }
    public function postGrantRightAdmin($id,Request $request)
    {
//        dd($request->all());
       $data = User::findOrFail($id);
        if (Auth::user()->id==2)
        {
            if ($data->id==2)
            {
                return redirect()->route("admin.account.admin")->with("error","Authorization failed...");
            }else{
                $data->role = $request->role;
                $data->save();
                if (is_array($request->role2))
                {
                    User_role::where("user_id",$data->id)->delete();
                    foreach ($request->role2 as $role_id)
                    {
                        User_role::create([
                            'user_id'=>$data->id,
                            'role_id'=>$role_id
                        ]);
                    }
                }

                return redirect()->route("admin.account.admin")->with("success","Authorization successful...");
            }
        }
        return redirect()->route("admin.account.admin")->with("error","The account does not have this right...");
    }
    public function changePasswordAdmin($id)
    {
        $data = User::findOrFail($id);
        return view("admin.account.change-password",compact("data"));
    }
    public function postChangePasswordAdmin($id,Request $request)
    {
        $data = User::findOrFail($id);
        if (Hash::check($request->password_old,$data->password))
        {
            $request->validate([
                "password" => "required|min:6",
                "password_cf" => "required|same:password"
            ],[
                "password_cf.same"=>"The password confirm and password must match.",
                "password_cf.required"=>"The password confirm field is required."
            ]);
            $data->password = bcrypt($request->password);
            $data->save();
            return redirect()->route("admin.account.admin")->with("success","Change password successfully...");
        }
        return redirect()->back()->with("error","Old password incorrect...");
    }
    public function infoAccountAdmin($id)
    {
        $data = User::findOrFail($id);
        return view("admin.account.info",compact("data"));
    }
    public function updateInfoAccountAdmin($id,Request $request)
    {
        $data = User::findOrFail($id);
        $random = Str::random(4);
        $request->validate([
           "phone_number"=>"numeric",
           "address"=>"required"
        ]);
        if ($request->hasFile("image"))
        {
            $file= $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("success","File avatar invalid..");
            }
            if (!is_null($data->__get("image"))){
                unlink($data->__get("image"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/users"),$fileImage);
            $image = "upload/users/".$fileImage;
        }
        else{
            $image = $data->__get("image");
        }
        $data->phone_number = $request->phone_number;
        $data->address      = $request->address;
        $data->image        = $image;
        $data->save();
        if ($data)
        {
            return redirect()->back()->with("success","Update successfully...");
        }
        return redirect()->back()->with("error","Update failed...");
    }
    public function indexCustomer()
    {
        $customers = Customers::orderby("updated_at","DESC")->paginate(20);
        return view("admin.account.ac_customer",compact("customers"));
    }

    public function searchCus(Request $request)
    {
//        dd($request->all());
        $customers = Customers::orderby("updated_at","DESC")->where("email",'like','%'.$request->email.'%')->paginate(20);
        return view("admin.account.ac_customer",compact("customers"));


    }
}
