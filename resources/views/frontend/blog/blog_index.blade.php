@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
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
                        <form class="blog-search-form" action="{{route("home.blog.search.name")}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="form-input">
                                <input type="text" name="new_name" placeholder="Search..." class="input-text">
                                <button class="blog-search-button" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="single-categories-1">
                        <h3 class="blog-categorie-title">Categories</h3>
                        <div class="single-categories-blog">
                            <ul>
                                <li><a href="{{route("home.blog.search.type",0)}}">General</a> <span>({{count($news_default)}})</span></li>
                                <li><a href="{{route("home.blog.search.type",1)}}">Recruiment <span>({{count($news_recruiment)}})</span></a></li>
                                <li><a href="{{route("home.blog.search.type",2)}}">Running Machine<span>({{count($news_runningMachine)}})</span></a></li>
                                <li><a href="{{route("home.blog.search.type",4)}}">News Shoes <span>({{count($news_shoes)}})</span></a></li>
                                <li><a href="{{route("home.blog.search.type",3)}}">Outfit <span>({{count($news_outfist)}})</span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- single-categories-1 end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="blog-content-wrap mt-95">
                        <div class="row">
                            @foreach($news as $value)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                <!-- blog-wrapper start -->
                                <div class="blog-wrapper mb-30 main-blog">
                                    <div class="blog-img mb-20">
                                        <a href="blog-details.html">
                                            <img alt="" src="{{asset($value->image)}}" style="height: 150px!important;width: 100%">
                                        </a>
                                    </div>
                                    <h3><a href="blog-details.html">{{$value->new_name}}</a></h3>
                                    <ul class="meta-box">
                                        <li class="meta-date"><span><i aria-hidden="true" class="fa fa-calendar"></i>{{date($value->created_at)}}</span></li>
                                    </ul>
                                    <p>{{$value->new_title}}!</p>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <a href="{{route("home.blog.detail",$value->id)}}">Read more <i class="fa fa-angle-double-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog-wrapper end -->
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $news->render("vendor.pagination.shop-run") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



