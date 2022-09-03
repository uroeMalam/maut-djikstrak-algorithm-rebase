<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SIG_Hasil Produksi Padi</title>
  <link href="{{ asset('datatables.net-bs4\css\dataTables.bootstrap4.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('sweetalert2\dist\sweetalert2.min.css') }}">
   <!-- Favicon -->
   <link rel="icon" href="{{asset('template')}}/assets/img/brand/kosong.png" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/css/argon.css?v=1.1.0" type="text/css">
   {{-- woi map --}}
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
  <style>
      #map {
          position: absolute;
          top: 0;
          bottom: 0;
          width: 100%;
      }

      .coordinates {
          background: rgba(0, 0, 0, 0.5);
          color: #fff;
          position: absolute;
          bottom: 40px;
          left: 10px;
          padding: 5px 10px;
          margin: 0;
          font-size: 11px;
          line-height: 18px;
          border-radius: 3px;
          display: none;
      }

  </style>

</head>

<body>
  <!-- Navabr -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{('/maut')}}" class="nav-link">
              <span class="nav-link-inner--text">MAUT</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{('/djikstrak')}}" class="nav-link">
              <span class="nav-link-inner--text">djikstrak</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/" target="_blank" data-toggle="tooltip" title="" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/" target="_blank" data-toggle="tooltip" title="" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="{{('/login')}}"target="#" class="btn btn-neutral btn-icon">
              {{-- <span class="btn-inner--icon">
                <i class="fas fa-arrow-right-to-bracket mr-2"></i>
              </span> --}}
              <span class="nav-link-inner--text">LOGIN</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-primary pt-5 pb-7">
      <div class="container">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="pr-5">
                <h1 class="display-2 text-white font-weight-bold mb-0">Sistem Informasi Geografis</h1>
                <h2 class="display-4 text-white font-weight-light">Menggunakan Maut-Djikstra</h2>
                <p class="text-white mt-4">Analisis Lahan Pertanian Rawan Banjir Aceh Utara</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card mb-8">
                <div class="card-body">
                  <h5 class="h3">Tampilan Map</h5>
                  <p>mohon di isi dengan hal-hal positif</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- map start --}}
    <div class="container-fluid">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row">
                    <h2 class="ml-4">Data Dalam Peta</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="col-sm">
                            <div class="card" style="height:500px;">
                                <div id="map"></div>
                                <pre id="coordinates" class="coordinates"></pre>
                                <div class="clearBoth"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h2>Map</h2>
                        
                        <br>
                        <div class="bungkus" name="bungkus" id="bungkus">
                            <label for="">Pilih Titik A</label>
                            <select name="titik_awal" id="titik_awal" class="form-control">
                                <option selected value="">pilih</option>
                                @foreach($kecamatan as $t)
                                    <option value="{{ $t->latitude.','.$t->longitude }}"  data-alpa="A" data-label="{{ $t->kecamatan }}" data-lat="{{ $t->latitude }}"
                                        data-lng="{{ $t->longitude }}">{{ $t->kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="bungkus" name="bungkus" id="bungkus">
                            <label for="">Pilih Titik B</label>
                            <select name="titik_akhir" id="titik_akhir" class="form-control">
                                <option selected value="">pilih</option>
                                @foreach($kecamatan as $t)
                                    <option value="{{ $t->latitude.','.$t->longitude }}"  data-alpa="A" data-label="{{ $t->kecamatan }}" data-lat="{{ $t->latitude }}"
                                        data-lng="{{ $t->longitude }}">{{ $t->kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <br>             
                        <div class="form-group">
                            <label>Jarak (KM)</label>
                            <input type="text" class="form-control" id="jarak" name="jarak" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- map end --}}

    {{-- hasil --}}
    <div class="py-6 pb-9 bg-default">
      <div class="row justify-content-center text-left">
        <div class="col-md-6">
          <h2 class="display-4 text-white">Infromasi Tentang Aplikasi</h3>
            <p class="lead text-white">
              blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla blablablanla .
            </p>
        </div>
      </div>
    </div> 
    {{-- hasil end --}}    
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2022 <a href="#" class="font-weight-bold ml-1" target="#">Sistem Informasi Geografis</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->

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
 <script src="{{asset('template')}}/assets/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
 <script src="{{asset('template')}}/assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>

 
 <script src="{{asset('dist\js\my-script.js') }}"></script>

 <script src="{{asset('template')}}/assets/js/argon.js?v=1.1.0"></script>
 <script src="{{ asset('datatables.net\js\jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dist\js\datatable\datatable-basic.init.js') }}"></script>

<script src="{{ asset('sweetalert2\dist\sweetalert2.min.js') }}"></script>

<script src='https://unpkg.com/@turf/turf/turf.min.js'></script>
<script  type="text/javascript">
$(document).ready(function () {
    mapboxgl.accessToken =
        'pk.eyJ1Ijoicmljb280MDQiLCJhIjoiY2w2aTV4MW5pMDhuMTNmczJiNWR5YnJhbyJ9.R_LVgwa2VbomQopHxXFlXg';
    const coordinates = document.getElementById('coordinates');
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [97.1413222, 5.1811638],
        zoom: 13
    });

    map.addControl(new mapboxgl.NavigationControl());



    //lng, lat 

    $('#titik_akhir').change(function() {
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [97.1413222, 5.1811638],
            zoom: 7
        });

        map.addControl(new mapboxgl.NavigationControl());
        
        var awal_lat = $('#titik_awal').find(':selected').data('lat');
        var awal_lng = $('#titik_awal').find(':selected').data('lng');
        var akhir_lat = $(this).find(':selected').data('lat');
        var akhir_lng = $(this).find(':selected').data('lng');

        var awal_intial = $('#titik_awal').find(':selected').data('alpa');
        var awal_label = $('#titik_awal').find(':selected').data('label');
        var akhir_intial = $(this).find(':selected').data('alpa');
        var akhir_label = $(this).find(':selected').data('label');

        var to = [akhir_lng, akhir_lat]; //lng, lat
        var from = [awal_lng, awal_lat];
        var greenMarker = new mapboxgl.Marker({
                color: 'green'
            })
            .setLngLat(to) // marker position using variable 'to'
            .addTo(map); //add marker to map

        var purpleMarker = new mapboxgl.Marker({
                color: 'purple'
            })
            .setLngLat(from) // marker position using variable 'from'
            .addTo(map); //add marker to map

        var positions =[
            from,to
            ]; 

        var linestring = turf.lineString(positions);

        map.on('load', function () {

            map.addLayer({
                "id": "route",
                "type": "line",
                "source": {
                    "type": "geojson",
                    "data": linestring
                },
                "layout": {                        
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                "paint":{
                    'line-color': '#888',
                    'line-width': 8
                },
            });

        });

        var options = {
            units: 'kilometers'
        }; // units can be degrees, radians, miles, or kilometers, just be sure to change the units in the text box to match. 

        var distance = turf.distance(to, from, options);
        $("#jarak").val(distance);
        console.log("jarak distance " + distance + " km");
    });
});
</script>
</body>

</html>