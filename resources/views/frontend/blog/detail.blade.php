@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route("Home")}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route("home.blog.index")}}">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wraper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">

                    <!-- single-categories-1 end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="blog-details mt-95">
                        <div class="blog-hero-img">
                            <img src="{{asset($data->image)}}" width="100%" alt="">
                        </div>
                        <div class="blog-details-contend mb-60">
                            <h3 class="blog-dtl-header">{{$data->new_name}}</h3>
                            <ul class="meta-box meta-blog d-flex">
                                <li class="meta-date"><span><i aria-hidden="true" class="fa fa-calendar"></i>{{date($data->created_at)}}</span></li>
                            </ul>
                            <p class="mb-20">{{$data->new_title}}</p>
                            {!! $data->new_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
