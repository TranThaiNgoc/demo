<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}"> 
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.png') }}">
    <title>@yield('title')</title>
    @section('styles')
    <!-- Bootstrap Core CSS -->
    
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('css/colors/default.css') }}" id="theme" rel="stylesheet">

    <!-- DataTables CSS -->

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('admin/datatable/jquery.dataTables.min.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('vendor/swatkins/gantt/css/gantt.css') }}" rel="stylesheet" type="text/css">

    @show
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @section('scripts')
    @show

</head>

<body class="fix-header sidebar-mini">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        @if(Auth::check())
        @include("admin.layout.header")
        @include("admin.layout.menu")
        @endif    
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div @if(Auth::check()) id="page-wrapper" @endif>
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">@yield('title')</h4> </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
                @if(Auth::check()) 
                <footer class="footer text-center"> 2018 &copy; Create by Hai Nguyen </footer>
                @endif
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        @stack('js')
        

        <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- Menu Plugin JavaScript -->
        <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
        <!--slimscroll JavaScript -->
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ asset('js/waves.js') }}"></script>
        <!--Counter js -->
        <script src="{{ asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
        <!-- chartist chart -->
        <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
        <!-- Sparkline chart JavaScript -->
        <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/dashboard1.js') }}"></script>
        <script src="{{ asset('plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>


        <!-- DataTables JavaScript -->
        
        <script type="text/javascript" language="javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}" ></script>
        <script type="text/javascript" language="javascript" src="{{ asset('admin/ckfinder/ckfinder.js') }}" ></script>

        <script type="text/javascript">
            CKEDITOR.replace( 'ckeditor_add',
            {
                toolbar : 'Basic', /* this does the magic */
            });
        </script>

        <script type="text/javascript">
            function copyToClipboard(element) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).text()).select();
                document.execCommand("copy");
                $temp.remove();
            } 

        </script>


        <script src="{{ asset('admin/datatable/jquery.dataTables.min.js') }}"></script>

        <!-- <script>
            $(document).ready(function() {
                $('#dataTables1').DataTable({
                    responsive: true
                });
            });
            $(document).ready(function() {
                $('#dataTables2').DataTable({
                    responsive: true
                });
            });

            $(document).ready(function() {
                $('.dt').DataTable({
                    responsive: true
                });
            });
        </script> -->

    </body>
    </html>

