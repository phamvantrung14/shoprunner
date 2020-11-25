@extends("components.admin.layout")
@section("content")

    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Dashboard </h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Products</h5>
                                    <h2 class="mb-0"> {{count($totalProducts)}}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg mt-1"style="background-color: #e83e8c54!important;">
                                    <i class="fab fa-fw fa-wpforms fa-sm " style="color:#e83e8c "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Brands</h5>
                                    <h2 class="mb-0"> {{count($totalBrands)}}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg   mt-1" style="background-color: #ffc10754!important;">
                                    <i class="fab fa-fw fa-wpforms fa-fw fa-sm" style="color: #ffc107"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Orders</h5>
                                    <h2 class="mb-0"> {{count($totalOrders)}}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #dc354554!important;">
                                    <i class="fas fa-cart-arrow-down fa-fw fa-sm " style="color: #dc3545"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-inline-block">
                                    <h5 class="text-muted">Total Stores</h5>
                                    <h2 class="mb-0"> {{count($totalStores)}}</h2>
                                </div>
                                <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #17a2b854!important;">
                                    <i class="fas fa-fw fa-table fa-fw fa-sm" style="color: #17a2b8"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->

                    <!-- recent orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Recent Orders</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">#</th>
                                            <th class="border-0">Order Name</th>
                                            <th class="border-0">Total Price</th>
                                            <th class="border-0">Payment</th>
                                            <th class="border-0">Order Time</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order as $value)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$value->order_name}}</td>
                                                <td>{{$value->getTotalPrice()}}</td>
                                                <td>{{$value->payment()}}</td>
                                                <td>{{$value->updated_at}}</td>
                                                <td><span class="{{$value->statusOrder($value->status)['class']}}">
                                            {{$value->statusOrder($value->status)['name']}}</span></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="9"><a href="{{route("admin.orders")}}" class="btn btn-outline-light float-right">View Details</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end recent orders  -->


                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- customer acquistion  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Status</h5>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end customer acquistion  -->
                    <!-- ============================================================== -->
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- product category  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Product Category</h5>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container-2"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end product category  -->
                    <!-- product sales  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Revenue of months of the year 2020</h5>
                            </div>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container-3" data-month="{{$listMonth}}" data-money-month="{{$arrOrders}}"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end product sales  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- top perfomimg  -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header">Product statistics by brand</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table no-wrap p-table">
                                        <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Brands</th>
                                            <th class="border-0">Total Products</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brand as $value)
                                            <?php
                                                $count_brand = \DB::table("products")->where("brand_id",$value->id)->get();
                                            ?>
                                        <tr>
                                            <td>{{$value->brand_name}}</td>
                                            <td class="text-center">{{count($count_brand)}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">
                                                <a href="#" class="btn btn-outline-light float-right">Details</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end top perfomimg  -->
                        <!-- ============================================================== -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <form action="{{route("admin.order.search")}}" method="POST">
                                    @csrf
                                    <h5 class="text-muted">Awaiting</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($awaiting)}}</h1>
                                    </div>
                                    <input type="hidden" name="status" value="0">
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small text-success "></span><button class="badge badge-cyan badge-pill"  type="submit" style="border: 0px">Detail</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <form action="{{route("admin.order.search")}}" method="POST">
                                    @csrf
                                    <h5 class="text-muted">Confirmed</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($confirmed)}}</h1>
                                    </div>
                                    <input type="hidden" name="status" value="1">
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small text-success"></span><button class="badge badge-indigo badge-pill" style="border: 0px">Detail</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <form action="{{route("admin.order.search")}}" method="POST">
                                    @csrf
                                    <h5 class="text-muted">Being transported</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($beingTransported)}}</h1>
                                    </div>
                                    <input type="hidden" name="status" value="2">
                                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                        <span class="icon-circle-small  text-success "></span><button class="badge badge-secondary badge-pill" style="border: 0px">Detail</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <form action="{{route("admin.order.search")}}" method="POST">
                                    @csrf
                                    <h5 class="text-muted">Complete</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">{{count($complete)}}</h1>
                                    </div>
                                    <input type="hidden" name="status" value="3">
                                    <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                        <span class="icon-circle-small text-danger  "></span><button class="badge badge-success badge-pill " style="border: 0px">Detail</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- total revenue  -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- category revenue  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Products Sales</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Avatar</th>
                                            <th class="border-0">Name Product</th>

                                            <th class="border-0">Price</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product_sale as $value)
                                            @if($value->sale_price!=0)
                                            <tr>
                                                <td><img src="{{asset($value->avatar)}}"width="50px" alt=""></td>
                                                <td>{{$value->pro_name}}<br>{{$value->Brands->brand_name}}<br>{{$value->Categories->cate_name}}</td>
                                                <td>{{$value->getPrice()}}<br>
                                                    {{$value->salePrice()}}</td>

                                            </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end category revenue  -->
                    <!-- ============================================================== -->

{{--                    doanh thu ngay thang nam--}}
                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header"> Sales today this month and this year</h5>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container-5"></div>

                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- social source  -->
                        <!-- ============================================================== -->
                        <div class="card">
                            <h5 class="card-header"> Detailed Daily Revenue Chart(USD)</h5>
                            <div class="card-body p-0">
                                <figure class="highcharts-figure">
                                    <div id="container-6" data-list-day="{{$listDay}}" data-money="{{$arrOrders1}}" data-money-default="{{$arrOrdersDefault}}"></div>

                                </figure>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end social source  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 200px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
        /*container-2*/





    </style>
    <script>
        let datamoney = "{{$dataMoney}}";
        dataChart4 = JSON.parse(datamoney.replace(/&quot;/g,'"'));
        let listMonth = $("#container-3").attr("data-month");
        listMonth = JSON.parse(listMonth);
        let listMoneyMonth = $("#container-3").attr("data-money-month");
        listMoneyMonth = JSON.parse(listMoneyMonth);
        let data2 = "{{$dataProduct}}";
        dataChart2 = JSON.parse(data2.replace(/&quot;/g,'"'));
        let data = "{{$dataStatus}}";
        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        let listday = $("#container-6").attr("data-list-day");
        listday = JSON.parse(listday);
        let listMoneyMoth2 = $("#container-6").attr('data-money');
        listMoneyMoth2 = JSON.parse(listMoneyMoth2);
        let listMoneyMothDefault = $("#container-6").attr('data-money-default');
        listMoneyMothDefault = JSON.parse(listMoneyMothDefault);
        // Create the chart
        Highcharts.chart('container', {
            chart: {type: 'column'},
            title: {text: 'Status'},
            subtitle: {},
            accessibility: {announceNewData: {enabled: true}},
            xAxis: {type: 'category'},
            yAxis: {title: {text: ''}},
            legend: {enabled: false},
            plotOptions: {series: {borderWidth: 0,dataLabels: {enabled: true,}}},
            tooltip: {headerFormat: '<span style="font-size:11px">{series.name}</span><br>', // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [{name: "Orders",colorByPoint: true,data: dataChart,}],
        });
        // Build the chart
        Highcharts.chart('container-2', {
            chart: {plotBackgroundColor: null,plotBorderWidth: null,plotShadow: false,type: 'pie'},
            title: {text: 'Product statistics by category'},
            tooltip: {pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'},
            accessibility: {point: {valueSuffix: '%'}},
            plotOptions: {pie: {allowPointSelect: true,cursor: 'pointer',dataLabels: {enabled: false},showInLegend: true}},
            series: [{name: 'Brands',colorByPoint: true,data: dataChart2,}]
        });

        Highcharts.chart('container-3', {
            chart: {type: 'line'},
            title: {text: 'Revenue of months of the year'},
            subtitle: {text: ''},
            xAxis: {categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] },
            yAxis: {title: {text: 'USD'}},
            plotOptions: {line: {dataLabels: {enabled: true},enableMouseTracking: false}},
            series: [{name: '2020',data: listMoneyMonth}]
        });

        // Create the chart
        Highcharts.chart('container-5', {
            chart: {type: 'column'},
            title: {text: 'Sales today this month and this year'},
            subtitle: {text: ''},
            accessibility: {announceNewData: {enabled: true}},
            xAxis: {type: 'category'},
            yAxis: {title: {text: ''}},
            legend: {enabled: false},
            plotOptions: {series: {borderWidth: 0,dataLabels: {enabled: true,format: '{point.y:.1f}USD'}}},
            tooltip: {headerFormat: '<span style="font-size:11px">{series.name}</span><br>',pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}USD</b><br/>'},
            series: [{name: "Browsers",colorByPoint: true,data: dataChart4}],
        });
        Highcharts.chart('container-6', {
            chart: {type: 'line'},
            title: {text: 'Detailed Daily Revenue Chart(USD)'},
            subtitle: {text: ''},
            xAxis: {categories: listday},
            yAxis: {title: {text: 'Temperature (°C)'}},
            plotOptions: {line: {dataLabels: {enabled: true}, enableMouseTracking: false}},
            series: [{name: 'Complete The Transaction', data:listMoneyMoth2,}, {name: 'Orders Are Confirmed', data:listMoneyMothDefault,}]
        });
    </script>
@endsection

