<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/assets/images/favicon/'.$favicon->image)}}">
    <title>{{$setting->name}}</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset ('assets/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jq -->
    <script type="text/javascript" src="{{ asset ('assets/dist/js/jquery.min.js') }}"></script>
    <!-- select2 -->
    <link href="{{ asset ('assets/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/dist/css/select2-bootstrap.min.css') }}">

    <style type="text/css">
        .notifyjs-corner{
            z-index: 10000 !important;
        }
    </style>
</head>

<body>

       @include('page.include.massage')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a style="background-color: #010F21;" class="navbar-brand" href="{{route ('index')}}">
                        <!-- Logo icon -->
                        <b  class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img style="height:100%; width: 200px;font-size: 100%;" src="{{url('public/assets/images/logo/'.$logo->image)}}" alt="homepage" class="light-logo" id="image" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div style="background-color:#010F21!important;" class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="height: 40px; width: 40px;border-radius: 100%;display:inline-block; padding: 0px"src="{{url('public/assets/images/admin/'.auth()->user()->image)}}" class="avatar img-circle img-thumbnail" alt="avatar"  width="40"><i style="padding-left:10px; font-size: 10px;" class="fas fa-sort-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a href="{{route ('profiles.view')}}" class="dropdown-item"><i class="fas fa-user-circle"></i> Profile </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('profiles.password.view')}}" class="dropdown-item"><i class="fas fa-key"></i> Password Change </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('settings.view')}}" class="dropdown-item"><i class="fas fa-cog"></i> Setting </a>
                                <div class="dropdown-divider"></div>
                                    <a style="text-align:center; border:1px solid #96D4D4;border-collapse: collapse;background-color:powderblue;border-radius: 10px;" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>  
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->

       @include('page.include.leftSider')

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
            <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             

           @yield('content')



               <script src="{{ asset('assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/dist/js/chartjs.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- Charts js Files -->
    <script src="{{ asset('assets/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{asset('assets/dist/js/handlebars.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/pages/chart/chart-page-init.js') }}"></script>

<script type="text/javascript" src="{{asset ('assets/dist/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dist/js/additional-methods.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('assets/dist/js/notify.min.js')}}"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- select2 -->
<script src="{{asset('assets/dist/js/select2.min.js')}}"></script>

<!-- sweet alart massage Approval -->
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#approveBtn',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "Approve this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approve it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
            Swal.fire(
                'Approved!',
                'Your file has been Approved.',
                'success'
                     )
                 }
             })
        });
 });
 </script>

 <!-- sweet alart massage Delete -->
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
                Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                     )
                 }
             })
        });
 });
 </script>

 <script type="text/javascript">
     $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
     });
 </script>
<!-- select2 -->
<script type="text/javascript">
    $(function(){
     $('.select2').select2();
})
</script>


</body>

</html>