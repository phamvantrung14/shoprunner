<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BeingTransported;
use App\Mail\Confirmed;
use App\Models\Area;
use App\Models\Citys;
use App\Models\Order_detail;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function order()
    {
        $areas = Area::orderBy("name_area","ASC")->get();
        $citys = Citys::orderBy("name_city","ASC")->get();
        $awaiting=Orders::where("status",0)->get();
        $confirmed=Orders::where("status",1)->get();
        $beingTransported = Orders::where("status",2)->get();
        $complete = Orders::where("status",3)->get();
        $order = Orders::orderby("created_at","ASC")->paginate(20);
        return view("admin.orders.index",compact("order","awaiting","confirmed","beingTransported","complete","areas","citys"));
    }
    public function searchStatus(Request $request)
    {
        $areas = Area::orderBy("name_area","ASC")->get();
        $citys = Citys::orderBy("name_city","ASC")->get();
        $awaiting=Orders::where("status",0)->get();
        $confirmed=Orders::where("status",1)->get();
        $beingTransported = Orders::where("status",2)->get();
        $complete = Orders::where("status",3)->get();
        $order = Orders::orderby("updated_at","DESC")->where("status",$request->status)->paginate(20);
        return view("admin.orders.index",compact("order","awaiting","confirmed","beingTransported","complete","areas","citys"));
    }
    public function searchCity(Request $request)
    {
        $areas = Area::orderBy("name_area","ASC")->get();
        $citys = Citys::orderBy("name_city","ASC")->get();
        $awaiting=Orders::where("status",0)->get();
        $confirmed=Orders::where("status",1)->get();
        $beingTransported = Orders::where("status",2)->get();
        $complete = Orders::where("status",3)->get();
        $order = Orders::orderby("updated_at","DESC")->where("status",$request->status)->where("city_id",$request->city_id)->paginate(20);
        return view("admin.orders.index",compact("order","awaiting","confirmed","beingTransported","complete","areas","citys"));
    }
    public function getDetail(Orders $order_detail)
    {
        $id_order = $order_detail->id;
        $order_detail = Order_detail::where("order_id",$id_order)->get();
        $order_find = Orders::find($id_order);
        return view("admin.orders.order_detail",compact("order_detail","order_find"));
    }

    public function updateStatus($id,Request $request)
    {
        $order = Orders::find($id);
        $order_detail = Order_detail::where("order_id",$id)->get();
        $name = $order->order_name;
        $order->status = $request->status;
        $total_price = $order->total_price;
        if ($request->status == 1)
        {
            \Mail::to($order->email)->send(new Confirmed($order_detail,$name,$total_price));
        }else if ($request->status == 2)
        {
            \Mail::to($order->email)->send(new BeingTransported($order_detail,$name,$total_price));
        }
        $order->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $order = Orders::find($id);
        Order_detail::where("order_id",$order->id)->delete();
        $order->delete();
        return redirect()->back()->with("success","Delete successful..!..");
    }
    public function bill($id)
    {
        $bill = Orders::find($id);
        $order_detail = Order_detail::where("order_id",$id)->orderBy("updated_at","ASC")->get();
        return view("admin.bill.bill-detail",compact("bill","order_detail"));
    }
}
