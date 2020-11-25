@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route("Home")}}">Home</a></li>
                        <li class="breadcrumb-item active">About us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wraper mt-95">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6">
                    <div class="about-us-img">
                        <img alt="" src="{{asset("frontend/img/about/about1.jpg")}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-info-wrapper">
                        <h2>Our company</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ullam repellat mollitia odio aliquid, assumenda, quis, reprehenderit, fugit hic optio sit! Vitae id quisquam aperiam sint amet perspiciatis, praesentium quasi!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ullam repellat mollitia odio aliquid, assumenda, quis, reprehenderit, fugit hic optio sit! Vitae.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ullam repellat mollitia odio aliquid, assumenda, quis, reprehenderit,</p>
                        <div class="read-more-btn">
                            <a href="#">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project-count-area bg-gray pt-80 pb-50 mt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <span class="ion-ios-briefcase-outline"></span>
                        </div>
                        <div class="count-title">
                            <h2 class="count">360</h2>
                            <span>project done</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <span class="ion-ios-wineglass-outline"></span>
                        </div>
                        <div class="count-title">
                            <h2 class="count">690</h2>
                            <span>cups of coffee</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <span class="ion-ios-lightbulb-outline"></span>
                        </div>
                        <div class="count-title">
                            <h2 class="count">420</h2>
                            <span>branding</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count text-center mb-30">
                        <div class="count-icon">
                            <span class="ion-happy-outline"></span>
                        </div>
                        <div class="count-title">
                            <h2 class="count">100</h2>
                            <span>happy clients</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonials-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-8">
                    <div class="testimonials-active owl-carousel owl-loaded owl-drag">


                        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-1460px, 0px, 0px); transition: all 0s ease 0s; width: 4380px;"><div class="owl-item cloned" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>tayeb rayed</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div><div class="owl-item cloned" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>Alex johan</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div><div class="owl-item active" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>tayeb rayed</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div><div class="owl-item" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>Alex johan</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div><div class="owl-item cloned" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>tayeb rayed</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div><div class="owl-item cloned" style="width: 730px;"><div class="single-testimonial text-center">
                                        <img alt="" src="{{asset("frontend/img/team/1.png")}}">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                        <h4>Alex johan</h4>
                                        <span>ui/ux Designer</span>
                                    </div></div></div></div><div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></button></div><div class="owl-dots disabled"></div></div>
                </div>
            </div>
        </div>
    </div>

@endsection
