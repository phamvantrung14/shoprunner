<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/juta-preview/juta-v1/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 17:12:23 GMT -->
<head>
   <x-frontend.head/>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience. Thanks</p>
<![endif]-->
<!-- Add your application content here -->

<div class="wrapper home-3">
    <!--Notification start-->
{{--    <div class="notification-section">--}}
{{--        <div class="notification-close notification-icon">--}}
{{--            <p>TodaY Offer: $20 OFF order $300 or more with code <span>"Juta-002"</span> + Free Shipping on order over $60 !  <a href="#">Offer details</a> </p>--}}
{{--            <button><i class="ion-close"></i></button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!--Notification end-->

    <!-- header start -->
    <x-frontend.header/>
    <!-- header end -->

    @yield("content")
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="111766620620684"
         theme_color="#e68585"
         logged_in_greeting="Hi!Shoprunner. How can we help you?"
         logged_out_greeting="Hi!Shoprunner. How can we help you?">
    </div>
    <!-- footer-area start -->
   <x-frontend.footer/>
    <!-- footer-area start -->


</div>


{{--<x-frontend.script/>--}}
<!-- jquery -->
<script src="{{asset("frontend/js/vendor/jquery-1.12.4.min.js")}}"></script>
<!-- all plugins JS hear -->
<script src="{{asset("frontend/js/popper.min.js")}}"></script>
<script src="{{asset("frontend/js/bootstrap.min.js")}}"></script>
<script src="{{asset("frontend/js/owl.carousel.min.js")}}"></script>
<script src="{{asset("frontend/js/jquery.mainmenu.js")}}"></script>
<script src="{{asset("frontend/js/ajax-email.js")}}"></script>
<script src="{{asset("frontend/js/plugins.js")}}"></script>
<!-- main JS -->
<script src="{{asset("frontend/js/main.js")}}"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@yield("script")
<script>
    $(".remove a i ").click(function () {
        var id = $(this).data("id");
        // alert(id);
        $.ajax({
            url: "{{url("cart/delete")}}/" + id,
            type: 'GET',
        }).done(function (response) {
            $("body").empty();
            $("body").html(response);
            alertify.success('Successfully deleted the product !!');
        })
    })
</script>
<!-- Load Facebook SDK for JavaScript -->

</body>

<!-- Mirrored from demo.hasthemes.com/juta-preview/juta-v1/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 17:12:50 GMT -->
</html>
