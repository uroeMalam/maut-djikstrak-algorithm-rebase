<!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>Sistem Pakar Diagnosa Hama & Penyakit Padi </title>
   <link href="{{ asset('template')}}/assets/datatables.net-bs4/css/dataTables.bootstrap4.css'" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets\libs\sweetalert2\dist\sweetalert2.min.css') }}">
  <!-- Favicon -->
   <link rel="icon" href="{{asset('template')}}/assets/img/brand/lambang.png" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/css/argon.css?v=1.1.0" type="text/css">
 </head>


 <body>
    <!-- Page content  -->
    <div class="container-fluid">
      @yield('content')
    </div>
    <!-- page tampilan  -->
    @extends('layout/modal')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{asset('template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="{{asset('template')}}/assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('dist\js\my-script.js') }}"></script>

  <script src="{{ asset('template')}}/assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('dist\js\datatable\datatable-basic.init.js') }}"></script>

  <script src="{{asset('template')}}/assets/js/demo.min.js"></script>
<script src="{{ asset('assets\libs\sweetalert2\dist\sweetalert2.min.js') }}"></script>
<!-- java scripts punya cerita -->
  @stack('page-scripts')
</body>

</html>