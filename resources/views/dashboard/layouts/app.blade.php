<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Coordinates</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  <!-- Vector CSS -->
  <link href="{{asset('')}}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{asset('')}}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('')}}assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{asset('')}}assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{asset('')}}assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{asset('')}}assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{asset('')}}assets/css/app-style.css" rel="stylesheet"/>
  <!-- skins CSS-->
  <link href="{{asset('')}}assets/css/skins.css" rel="stylesheet"/>

  <link rel="stylesheet" href="{{asset('')}}assets/plugins/sweetalert2/sweetalert2.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('css')

</head>

<body>

   <!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner"><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 @include('dashboard.layouts.sidebar')

@include('dashboard.layouts.header')

<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

      @yield('content')



      <!--End Dashboard Content-->

      <!--start overlay-->
	  <div class="overlay toggle-menu"></div>
	<!--end overlay-->
    </div>
    <!-- End container-fluid-->
  </div>
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2024 AB Services
        </div>
      </div>
    </footer>
	<!--End footer-->

	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">


	 <p class="mb-0">Header Colors</p>
      <hr>

	  <div class="mb-3">
	    <button type="button" id="default-header" class="btn btn-outline-primary">Default Header</button>
	  </div>

      <ul class="switcher">
        <li id="header1"></li>
        <li id="header2"></li>
        <li id="header3"></li>
        <li id="header4"></li>
        <li id="header5"></li>
        <li id="header6"></li>
      </ul>

      <p class="mb-0">Sidebar Colors</p>
      <hr>

      <div class="mb-3">
	    <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default Header</button>
	  </div>

      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

     </div>
   </div>
  <!--end color switcher-->

  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('')}}assets/js/jquery.min.js"></script>
  <script src="{{asset('')}}assets/js/popper.min.js"></script>
  <script src="{{asset('')}}assets/js/bootstrap.min.js"></script>

 <!-- simplebar js -->
  <script src="{{asset('')}}assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="{{asset('')}}assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="{{asset('')}}assets/js/jquery.loading-indicator.js"></script>

  <!-- Custom scripts -->
  <script src="{{asset('')}}assets/js/app-script.js"></script>
<script src="{{asset('')}}assets/js/myhelper-script.js"></script>

<script src="{{asset('')}}assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
   $('.ajaxForm').submit(function(e) {
        e.preventDefault();
        $('.ajaxForm button[type="submit"]').prop('disabled', true);
        var url = $(this).attr('action');
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {}, true);
        $('.ajaxForm button[type="submit"]').prop('disabled', false);
    });
</script>
@yield('JScript')
</body>
</html>


