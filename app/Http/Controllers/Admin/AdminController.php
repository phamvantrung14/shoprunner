<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Month;
use App\Helper\Date;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Order_detail;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Stores;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $order = Orders::where("status",0)->orderby("updated_at","ASC")->limit(9)->get();

        $order_awaiting = Orders::where("status",0)->get();
        $order_confirmed = Orders::where("status",1)->get();
        $order_beingTransported = Orders::where("status",2)->get();
        $dataStatus = [
            [
                "name"=>"Awaiting",
                "y"=>count($order_awaiting)
            ],
            [
                "name"=>"Confirmed",
                "y"=>count($order_confirmed)
            ],
            [
                "name"=>"Being Transported",
                "y"=>count($order_beingTransported)
            ]

        ];
        return view("admin.index",[
            "order" => $order,
            "dataStatus"=>json_encode($dataStatus),
        ]);
    }
    public function dashboard()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        $order = Orders::where("status",0)->orderby("updated_at","ASC")->limit(9)->get();
        $totalProducts = Products::all();
        $totalBrands =Brands::all();
        $totalOrders = Orders::all();
        $totalStores = Stores::all();
        //status
        $order_awaiting = Orders::where("status",0)->get();
        $order_confirmed = Orders::where("status",1)->get();
        $order_beingTransported = Orders::where("status",2)->get();
        $dataStatus = [
            [
                "name"=>"Awaiting",
                "y"=>count($order_awaiting)
            ],
            [
                "name"=>"Confirmed",
                "y"=>count($order_confirmed)
            ],
            [
                "name"=>"Being Transported",
                "y"=>count($order_beingTransported)
            ]

        ];

        $productTreadmill = Products::where("cate_id",1)->get();
        $productShirtForMen = Products::where("cate_id",7)->get();
        $productShirtWomen = Products::where("cate_id",8)->get();
        $productShoesMen = Products::where("cate_id",11)->get();
        $productShoesWonmen = Products::where("cate_id",12)->get();
        $dataProduct = [
            [
                "name"=>"Treadmill",
                "y"=>count($productTreadmill)
            ],
            [
                "name"=>"Jogging Shirt for men",
                "y"=>count($productShirtForMen)
            ],
            [
                "name"=>"Jogging Shirt for women",
                "y"=>count($productShirtWomen)
            ],
            [
                "name"=>"Mens running shoes",
                "y"=>count($productShoesMen)
            ],
            [
                "name"=>"Womens running shoes",
                "y"=>count($productShoesWonmen)
            ],

        ];
        $revenueOdersMonth = Orders::where("status",3)->whereYear("updated_at",2020)
            ->select(\DB::raw('sum(total_price) as totalMoney'),\DB::raw('MONTH(updated_at) month'))->groupBy('month')->get()->toArray();
//        dd($revenueOdersMonth);
        $listMonth = Month::getListMonthInYear();
        $arrOrders = [];
        $arrOrdersDefault = [];
        foreach ($listMonth as $month)
        {
            $total =0;
            foreach ($revenueOdersMonth as $key =>$revenue)
            {
                if ($revenue['month'] == $month){
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrOrders[]=(int)$total;
        }

        $brand = Brands::orderBy("brand_name","ASC")->get();
        $awaiting=Orders::where("status",0)->get();
        $confirmed=Orders::where("status",1)->get();
        $beingTransported = Orders::where("status",2)->get();
        $complete = Orders::where("status",3)->get();
        //doanh thu ngay thang nam
        $moneyDay = Orders::whereDay("updated_at",date('d'))->where("status",3)->sum('total_price');
        $moneyMonth = Orders::whereMonth("updated_at",date('m'))->where("status",3)->sum('total_price');
        $moneyYear = Orders::whereYear("updated_at",date('Y'))->where("status",3)->sum('total_price');
        $month = $dt->month;
        $day1 = $dt->day;
        $year = $dt->year;
        $dataMoney = [
            [
                "name"=>"Turnover today ".$day1,
                "y"=>(int)$moneyDay
            ],
            [
                "name"=>"Sales this month ".$month,
                "y"=>(int)$moneyMonth
            ],
            [
                "name"=>"Turnover of the year ".$year,
                "y"=>(int)$moneyYear
            ]

        ];
        //doanh thu theo thang
        $revenueOdersMonth = Orders::where("status",3)->whereMonth("updated_at",date('m'))
            ->select(\DB::raw('sum(total_price) as totalMoney'),\DB::raw('DATE(updated_at) day'))->groupBy('day')
            ->get()->toArray();

        //doanh thu theo trang thái xác nhận đơn hàng
        $revenueOdersMonthDefault = Orders::where("status",1)->whereMonth("updated_at",date('m'))
            ->select(\DB::raw('sum(total_price) as totalMoney'),\DB::raw('DATE(updated_at) day'))->groupBy('day')
            ->get()->toArray();
        $listDay = Date::getListDayInMonth();
        $arrOrders1 = [];
        $arrOrdersDefault = [];
        foreach ($listDay as $day)
        {
            $total =0;
            foreach ($revenueOdersMonth as $key =>$revenue)
            {
                if ($revenue['day'] == $day){
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrOrders1[]=(int)$total;
            $total = 0;
            foreach ($revenueOdersMonthDefault as $key =>$revenue)
            {
                if ($revenue['day'] == $day){
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrOrdersDefault[]=(int)$total;

        }

        $product_sale = Products::where("status",2)->where("sale_price",">",1)->orderBy("pro_name","ASC")->limit(5)->get();
        return view("admin.dashboard",[
            "order" => $order,
            "dataStatus"=>json_encode($dataStatus),
            "totalProducts" => $totalProducts,
            "totalBrands" =>$totalBrands,
            "totalOrders" =>$totalOrders,
            "totalStores" =>$totalStores,
            "dataProduct"  =>json_encode($dataProduct),
            "listMonth"=>json_encode($listMonth),
            "arrOrders"=>json_encode($arrOrders),
            "brand"     =>$brand,
            "awaiting"    =>$awaiting,
            "confirmed"    =>$confirmed,
            "beingTransported"=>$beingTransported,
            'dataMoney'         =>json_encode($dataMoney),
            "complete"=>$complete,
            'listDay'           =>json_encode($listDay),
            'arrOrders1'         =>json_encode($arrOrders1),
            'arrOrdersDefault'  =>json_encode($arrOrdersDefault),
            'product_sale'      =>$product_sale

        ]);
    }
    public function error()
    {
        $code = \request()->code;
        $errors = [
          'code'=>403,
          'title'=>'Unauthorized',
          'message'=>'Unauthorized ...!'
        ];
        return view("admin.error",$errors);
    }
    public function indexa2()
    {
        $order_awaiting = Orders::where("status",0)->get();
        $order_confirmed = Orders::where("status",1)->get();
        $order_beingTransported = Orders::where("status",2)->get();
        $dataStatus = [
            [
                "name"=>"Awaiting",
                "y"=>count($order_awaiting)
            ],
            [
                "name"=>"Confirmed",
                "y"=>count($order_confirmed)
            ],
            [
                "name"=>"Being Transported",
                "y"=>count($order_beingTransported)
            ]

        ];
        return view("admin.index",[
            "dataStatus"=>json_encode($dataStatus),
        ]);
    }
}
