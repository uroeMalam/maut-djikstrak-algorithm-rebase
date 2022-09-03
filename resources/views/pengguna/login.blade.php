
<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>{{ $title }} - {{ config('app.name') }}</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('template')}}/assets/img/brand/lambang.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('template')}}/assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body class="bg-gradient-success">
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header py-lg-3 pt-lg-3">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">SIG Maut-Djikstra</h1>
              <h1 class="text-white">Analisis Lahan Pertanian Rawan Banjir Aceh Utara</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 pt-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-default border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-white text-muted mb-4">
              Halaman Login
              </div>
              @if (session()->has('loginError'))
              <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <form class="mt-4" action="/authenticate" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" id="username" name="username" placeholder="username" type="text">
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control"  id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted text-white">Remember me</span>
                  </label>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-info my-4">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted text-white">
            &copy; 2022 <a href="#" class="font-weight-bold ml-1" target="_blank">Analisis Lahan Pertanian Rawan Banjir Aceh Utara</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            {{-- <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Diana Amanda</a>
            </li> --}}
            <li class="nav-item text-white">
              <a href="#" class="nav-link text-white" target="_blank">Sistem Informasi Unimal</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="../../assets/js/demo.min.js"></script>
</body>

</html>