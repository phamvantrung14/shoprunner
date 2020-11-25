<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Area;
use App\Models\Arrtibute_value;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Citys;
use App\Models\Customers;
use App\Models\Endow_product;
use App\Models\News;
use App\Models\Order_detail;
use App\Models\Orders;
use App\Models\Product_arrtibutes;
use App\Models\Product_image;
use App\Models\Products;
use App\Models\Slides;
use App\Models\Stores;
use App\Models\Technical;
use Illuminate\Http\Request;
use Auth;
use App\Events\OrderCreated;
use Gloudemans\Shoppingcart\Cart;

class FrontendController extends Controller
{
    public function index()
    {
        $slide_homes = Slides::where("status",2)->where("type",1)->orderBy("created_at","ASC")->get();
        $slide_shoes = Slides::where("status",2)->where("type",2)->orderBy("updated_at","DESC")->first();
        $products_shirst_men = Products::where("cate_id",7)->where("new",3)->get();
        $products_shirst_wonmen = Products::where("cate_id",8)->where("new",3)->get();

        $cate = Categories::orderby("id","ASC")->get();
        $products_treadmill = Products::where("cate_id",1)->where("new",3)->get();
        $pd_image2 = Product_image::all();
        $pd_image = Product_image::pluck("product_id")->toArray();
        $for_men = Products::where("cate_id",11)->get();
        $for_women = Products::where("cate_id",12)->get();
        $pro_treadmill_hot = Products::where("cate_id",1)->where("new",4)->get();
        $pro_treadmill_new = Products::where("cate_id",1)->where("new",3)->get();
        $pro_hot = Products::where("new",4)->orderBy("cate_id","DESC")->get();


        $news_default = News::where("type_new",0)->orderBy("updated_at","DESC")->first();
        $news_recruiment = News::where("type_new",1)->orderBy("updated_at","DESC")->first();
        $news_runningMachine = News::where("type_new",2)->orderBy("updated_at","DESC")->first();
        $news_shoes = News::where("type_new",4)->orderBy("updated_at","DESC")->first();
        $news_outfist = News::where("type_new",3)->orderBy("updated_at","DESC")->first();

        return view("frontend.index",compact("products_shirst_men","pd_image","pd_image2","cate",
            "products_treadmill","for_men","slide_homes","news_default","news_recruiment","news_runningMachine"
        ,"news_shoes","news_outfist","slide_shoes","pro_treadmill_hot","pro_hot","products_shirst_wonmen","for_women","pro_treadmill_new"));
    }

    public function proDetail(Products $product)
    {
        $product_detail = Products::findOrFail($product->id);
        $pd_image = Product_image::where("product_id",$product->id)->where("status",1)->get();
        $color = Arrtibute_value::where("arrtb_id",9)->get();
        $size_shirt = Arrtibute_value::where("arrtb_id",2)->get();
        $size_short = Arrtibute_value::where("arrtb_id",1)->get();
        $arrtb_vl = Product_arrtibutes::where("product_id",$product->id)->pluck("arrtibute_value_id")->toArray();
        $technical = Technical::where("product_id",$product->id)->first();
        $pro_endow = Endow_product::where("product_id",$product->id)->get();

        return view("frontend.product.pro_detail",compact("product_detail",
            "pd_image","color","arrtb_vl","size_shirt","technical","size_short","pro_endow"));
    }
    public function proCate(Categories $cate)
    {
        $products = Products::where("cate_id",$cate->id)->where("status",2)->orderby("new","DESC")->paginate(20);
        return view("frontend.product.product-cate",compact("products"));
    }
    public function proBrand(Brands $brands)
    {
        $products = Products::where("brand_id",$brands->id)->where("status",2)->orderby("new","DESC")->paginate(20);
        return view("frontend.product.product-cate",compact("products"));
    }
    public function shopAll()
    {
        $products = Products::where("status",2)->orderby("new","DESC")->paginate(20);
        return view("frontend.product.product-cate",compact("products"));
    }

    public function formCheckOut()
    {
        $carts = \Cart::content();
        $areas = Area::orderby("name_area","ASC")->get();
        $citys = Citys::orderby("name_city","ASC")->get();
        return view("frontend.checkout.checkout",compact("carts","areas","citys"));
    }
    public function formCheckOutPay()
    {
        $carts = \Cart::content();
        $areas = Area::orderby("name_area","ASC")->get();
        $citys = Citys::orderby("name_city","ASC")->get();
        return view("frontend.checkout.checkoutpay",compact("carts","areas","citys"));
    }
    public function postCheckOut(Request $request)
    {
//        dd($request->all());
        $carts = \Cart::content();
        $cus_id = Auth::guard("cus")->user()->id;
        $total_price = str_replace(',','',\Cart::subtotal(00));
        $total_price2 = str_replace(',','',\Cart::subtotal(00));
        $request->validate([
            "order_name"=>"required|min:3",
            "phone_number"=>"required|max:11",
            "address"=>"required",
        ]);

        $orders = Orders::create([
            "order_name"=>$request->order_name,
            "email"=>$request->email,
            "phone_number"=>$request->phone_number,
            "city_id"=>$request->city_id,
            "address"=>$request->address,
            "payment"=>$request->payment,
            "note"=>$request->note,
            "status"=>0,
            "customer_id"=>$cus_id,
            "total_price"=>$total_price
        ]);
        foreach ($carts as $value)
        {
            Order_detail::create([
                "product_id"=>$value->id,
                "order_id"=>$orders->id,
                "quantity"=>$value->qty,
                "price"=>$value->price,
                "size"=>$value->options->size?$value->options->size:"",
            ]);
        }


        if ($request->payment==1)
        {
            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "VLANCGV2"; //Mã website tại VNPAY
            $vnp_HashSecret = "OBVXPEMFCKSCDATLNUZBJZWZIQBWKSCE"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/return-vnpay";
            $vnp_TxnRef = $orders->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh Toán ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $total_price*100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "USD",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
//            dd($inputData);
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' =>'00',
                'message' =>'success',
                'data' => $vnp_Url
            );
            return redirect()->to($returnData['data']);
        }else
        {
            $name = $request->order_name;
            \Mail::to($request->email)->send(new OrderShipped($carts,$total_price2,$name));
            \Cart::destroy();
        }

        return redirect()->route("Home");
    }
    public function postCheckOutPay(Request $request)
    {
        $carts = \Cart::content();
        $cus_id = Auth::guard("cus")->user()->id;
        $total_price = str_replace(',','',\Cart::subtotal(00));
        $request->validate([
            "order_name"=>"required|min:3",
            "phone_number"=>"required|max:11",
            "address"=>"required",
        ]);

        $orders = Orders::create([
            "order_name"=>$request->order_name,
            "email"=>$request->email,
            "phone_number"=>$request->phone_number,
            "city_id"=>$request->city_id,
            "address"=>$request->address,
            "payment"=>$request->payment,
            "note"=>$request->note,
            "status"=>0,
            "customer_id"=>$cus_id,
            "total_price"=>$total_price
        ]);
        foreach ($carts as $value)
        {
            Order_detail::create([
                "product_id"=>$value->id,
                "order_id"=>$orders->id,
                "quantity"=>$value->qty,
                "price"=>$value->price,
                "size"=>$value->options->size?$value->options->size:"",
            ]);
        }

            session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = "VLANCGV2"; //Mã website tại VNPAY
            $vnp_HashSecret = "OBVXPEMFCKSCDATLNUZBJZWZIQBWKSCE"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/return-vnpay";
            $vnp_TxnRef = $orders->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = "Thanh Toán ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = ($total_price*2300)*100;//tinh theo ty gia usd sang vnd
            $vnp_Locale = 'vn';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );
//            dd($inputData);
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' =>'00',
                'message' =>'success',
                'data' => $vnp_Url
            );
            return redirect()->to($returnData['data']);
    }
    public function returnPay(Request $request)
    {
//        dd($request->vnp_TxnRef);
        $od = Orders::where("id",$request->vnp_TxnRef)->first();
        $email = $od->email;
        $url = session('url_prev','/');
//        dd($request->all());
        if($request->vnp_ResponseCode == "00") {
            Orders::where("id",$request->vnp_TxnRef)->update([
                "status" => 2,
            ]);
            $carts = \Cart::content();

            $name = $od->order_name;
            $total_price = str_replace(',','',\Cart::subtotal(00));
            \Mail::to($email)->send(new OrderShipped($carts,$total_price,$name));
            \Cart::destroy();
            return redirect()->route("Home")->with("success")->with('message', 'Complete Order!');
        }
        session()->forget('url_prev');
        return redirect($url)->with('error' ,'Error in service fee payment process..!..');
    }
//Ngân hàng: NCB
//Số thẻ: 9704198526191432198
//Tên chủ thẻ:NGUYEN VAN A
//Ngày phát hành:07/15
//Mật khẩu OTP:123456

    public function mail()
    {
        return view("admin.email.shopping");
    }
    //blog
    public function blogIndex()
    {
        $news_default = News::where("type_new",0)->orderBy("updated_at","DESC")->paginate(20);
        $news_recruiment = News::where("type_new",1)->orderBy("updated_at","DESC")->paginate(20);
        $news_runningMachine = News::where("type_new",2)->orderBy("updated_at","DESC")->paginate(20);
        $news_shoes = News::where("type_new",4)->orderBy("updated_at","DESC")->paginate(20);
        $news_outfist = News::where("type_new",3)->orderBy("updated_at","DESC")->paginate(20);
        $news = News::orderBy("updated_at","DESC")->where("status",2)->paginate(20);
        return view("frontend.blog.blog_index",compact("news","news_default","news_recruiment","news_runningMachine"
        ,"news_shoes","news_outfist"));
    }
    public function searchType($type_new)
    {
        $news_default = News::where("type_new",0)->orderBy("updated_at","DESC")->paginate(20);
        $news_recruiment = News::where("type_new",1)->orderBy("updated_at","DESC")->paginate(20);
        $news_runningMachine = News::where("type_new",2)->orderBy("updated_at","DESC")->paginate(20);
        $news_shoes = News::where("type_new",4)->orderBy("updated_at","DESC")->paginate(20);
        $news_outfist = News::where("type_new",3)->orderBy("updated_at","DESC")->paginate(20);
        $news = News::orderBy("updated_at","DESC")->where("type_new",$type_new)->where("status",2)->paginate(20);
        return view("frontend.blog.blog_index",compact("news","news_default","news_recruiment","news_runningMachine"
            ,"news_shoes","news_outfist"));
    }
    public function searchName(Request $request)
    {
        $news_default = News::where("type_new",0)->orderBy("updated_at","DESC")->paginate(20);
        $news_recruiment = News::where("type_new",1)->orderBy("updated_at","DESC")->paginate(20);
        $news_runningMachine = News::where("type_new",2)->orderBy("updated_at","DESC")->paginate(20);
        $news_shoes = News::where("type_new",4)->orderBy("updated_at","DESC")->paginate(20);
        $news_outfist = News::where("type_new",3)->orderBy("updated_at","DESC")->paginate(20);
        $news = News::orderBy("updated_at","DESC")->where("new_name",'like','%'.$request->new_name.'%')->where("status",2)->paginate(20);
        return view("frontend.blog.blog_index",compact("news","news_default","news_recruiment","news_runningMachine"
            ,"news_shoes","news_outfist"));
    }
    public function blogDetail($id)
    {
        $data = News::findOrFail($id);
        return view("frontend.blog.detail",compact("data"));
    }
    public function storeIndex()
    {
        $areas = Area::orderBy("name_area","ASC")->get();
        $citys = Citys::orderBy("name_city","ASC")->get();
        $stores = Stores::orderBy("name_store","ASC")->where("status",2)->paginate(20);
        return view("frontend.stores.store_index",compact("stores","areas","citys"));
    }
    public function searchStore(Request $request)
    {
        $areas = Area::orderBy("name_area","ASC")->get();
        $citys = Citys::orderBy("name_city","ASC")->get();
        $stores = Stores::orderBy("name_store","ASC")->where("name_store",'like','%'.$request->new_name.'%')
            ->where("city_id",$request->city_id)->where("status",2)->paginate(20);
        return view("frontend.stores.store_index",compact("stores","areas","citys"));
    }
    public function searchPro($type)
    {
        switch ($type)
        {
            case 0:
                $products = Products::where("status",2)->orderby("new","DESC")->paginate(20);
                break;
            case 1:
                $products = Products::where("status",2)->orderby("pro_name","ASC")->paginate(20);
                break;
            case 2:
                $products = Products::where("status",2)->orderby("pro_name","DESC")->paginate(20);
                break;
            case 3:
                $products = Products::where("status",2)->orderby("price","ASC")->paginate(20);
                break;
            case 4:
                $products = Products::where("status",2)->orderby("price","DESC")->paginate(20);
                break;
        }


        return view("frontend.product.product-cate-ajax",compact("products"));
    }
    public function searchCatePro(Request $request)
    {
        if ($request->cate_id!=0){
            $products = Products::where("status",2)->where("cate_id",$request->cate_id)->where("pro_name",'like','%'.$request->pro_name.'%')->orderby("new","DESC")->paginate(20);

        }else
        {
            $products = Products::where("status",2)->where("pro_name",'like','%'.$request->pro_name.'%')->orderby("new","DESC")->paginate(20);

        }
        return view("frontend.product.product-cate",compact("products"));
    }
    public function aboutUs()
    {
        return view("frontend.aboutus.index");
    }
}
