<!doctype html>
<html lang="en">

<head>
    <x-admin.head/>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    @yield('admin')
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <x-admin.nav-bar/>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <x-admin.nav-left/>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        @yield("content")
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="{{asset('backend/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<!-- bootstap bundle js -->
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('backend/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<!-- main js -->
<script src="{{asset('backend/libs/js/main-js.js')}}"></script>
<script src="{{asset("backend/ckeditor/ckeditor/ckeditor.js")}}"></script>
<!-- chart chartist js -->
{{--<script src="{{asset('backend/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>--}}
{{--<!-- sparkline js -->--}}
{{--<script src="{{asset('backend/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>--}}
{{--<!-- morris js -->--}}
{{--<script src="{{asset('backend/vendor/charts/morris-bundle/raphael.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/vendor/charts/morris-bundle/morris.js')}}"></script>--}}
{{--<!-- chart c3 js -->--}}
{{--<script src="{{asset('backend/vendor/charts/c3charts/c3.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/vendor/charts/c3charts/C3chartjs.js')}}"></script>--}}
{{--<script src="{{asset('backend/libs/js/dashboard-ecommerce.js')}}"></script>--}}
@yield("script")

</body>

</html>

