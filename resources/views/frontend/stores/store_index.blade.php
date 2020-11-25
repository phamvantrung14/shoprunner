@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route("Home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Store</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wraper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="single-categories-1 blog-search mt-95">
                        <h3 class="blog-categorie-title">Search</h3>
                        <form class="blog-search-form" action="{{route("home.store.searchName")}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="form-input">
                                <input type="text" name="new_name" placeholder="Search..." class="input-text">
                                <button class="blog-search-button" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Area/Country</label>
                                <select class="form-control" name="area_id" id="area_id">
                                    <option value="">--choice--</option>
                                    @foreach($areas as $value)
                                    <option value="{{$value->id}}">{{$value->name_area}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Citys</label>
                                <select class="form-control" name="city_id" id="city_id">
                                    @foreach($citys as $value)
                                    <option value="{{$value->id}}">{{$value->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </form>
                    </div>


                    <!-- single-categories-1 end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="blog-content-wrap mt-95">
                        <div class="row">
                            <table class="table">
                                <thead>
                                @foreach($stores as $value)
                                    <tr>
                                        <th>{{$loop->index+1}}</th>
                                        <th>{{$value->name_store}}</th>
                                        <th>{{$value->address}} - {{$value->City->name_city}}</th>
                                        <th>{{$value->phone}}</th>
                                    </tr>
                                @endforeach
                                </thead>

                            </table>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $stores->render("vendor.pagination.shop-run") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function () {
            // alert("ok");
            $("#area_id").change(function (event) {
                var area =$(this).val();

                $.get("../ajaxfrontend/area/"+area,function (data) {
                    $("#city_id").html(data);
                })
            })
        })
    </script>
@endsection



