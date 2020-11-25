@extends("components.admin.layout")
@section("content")
    <?php
    $user = Auth::user();
    ?>
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
            </div>
        </div>
    </div>
<div class="row ">
    <div class="col-md-8">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #20c997!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Dashboard</h3>
                            <a href="{{route("admin.dashboard")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg   mt-1" style="background-color: #2ec56c54!important;">
                            <i class="fas fa-chart-bar fa-fw fa-sm text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
            @if($user->can("admin.product.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #e83e8c!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Products</h3>
                            <a href="{{route("admin.product.index")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #e83e8c54!important;">
                            <i class="fab fa-fw fa-wpforms fa-fw fa-sm" style="color:#e83e8c "></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.categories.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #fd7e14!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Categories</h3>
                            <a href="{{route("admin.categories.index")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg   mt-1" style="background-color: #fd7e1454!important;">
                            <i class="fas fa-fw fa-chart-pie fa-fw fa-sm " style="color: #fd7e14"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.brand.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #ffc107!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's Brands</h3>
                            <a href="{{route("admin.brand.index")}}" class="card-link">View Details</a>

                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg   mt-1" style="background-color: #ffc10754!important;">
                            <i class="fab fa-fw fa-wpforms fa-fw fa-sm " style="color: #ffc107"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.store.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #17a2b8!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's Store</h3>
                            <a href="{{route("admin.store.index")}}" class="card-link">View Details</a>

                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  mt-1" style="background-color: #17a2b854!important;">
                            <i class="fas fa-fw fa-table fa-fw fa-sm " style="color: #17a2b8"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.area.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #20c997!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's Place</h3>
                            <a href="{{route("admin.area.index")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #20c99754!important;">
                            <i class="fas fa-map-marker-alt fa-fw fa-sm " style="color: #20c997"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.arrtb-vl.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #007bff!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Arrtibutes</h3>
                            <a href="{{route("admin.arrtb-vl.index")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #007bff54!important;">
                            <i class="fas fa-fw fa-table fa-fw fa-sm" style="color: #007bff"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.account.admin"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #6c757d!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Accounts</h3>
                            <a href="{{route("admin.account.admin")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #6c757d54!important;">
                            <i class="fas fa-address-card fa-fw fa-sm" style="color: #6c757d"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.orders"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #dc3545!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's Orders</h3>
                            <a href="{{route("admin.orders")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #dc354554!important;">
                            <i class="fas fa-cart-arrow-down fa-fw fa-sm " style="color: #dc3545"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.slide"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #fd7e14!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's Slide</h3>
                            <a href="{{route("admin.slide")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #fd7e1454!important;">
                            <i class="fas fa-images fa-fw fa-sm " style="color: #fd7e14"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.accustomer"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #ffc107!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">Ac Customer</h3>
                            <a href="{{route("admin.accustomer")}}" class="card-link">View Details</a>
                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg mt-1" style="background-color: #ffc10754!important;">
                            <i class="fas fa-address-card fa-fw fa-sm " style="color: #ffc107"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($user->can("admin.new.index"))
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top" style="border-radius: 15px;border-top-color: #17a2b8!important;">
                    <div class="card-body">
                        <div class="d-inline-block">
                            <h3 class="text-muted">List's New</h3>
                            <a href="{{route("admin.new.index")}}" class="card-link">View Details</a>

                        </div>
                        <div class="float-right icon-circle-medium  icon-box-lg  mt-1" style="background-color: #17a2b854!important;">
                            <i class="fas fa-newspaper fa-fw fa-sm " style="color: #17a2b8"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Orders Status</h5>
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
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

    </style>
    <script>
        let data = "{{$dataStatus}}";
        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Status'
            },
            subtitle: {
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: ''
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        // format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                // pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: "Orders",
                    colorByPoint: true,
                    data: dataChart,
                }
            ],

        });
    </script>
@endsection
