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
                        <label for="">Pilih tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <option selected>pilih</option>
                            @foreach ($tahun as $t)
                                <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="bungkus" name="bungkus" id="bungkus">
                            <label for="">Pilih Kecamatan</label>
                            <select name="titik_akhir" id="titik_akhir" class="form-control">
                                <option selected id="titik" name='titik'>pilih</option>
                            </select>
                        </div>
                        <br>                   
                        <div class="form-group">
                            <label>Cluster</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" readonly>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" class="form-control" id="kec" name="kec" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lat</label>
                            <input type="text" class="form-control" id="lat" name="lat" readonly>
                        </div>
                        <div class="form-group">
                            <label>Long</label>
                            <input type="text" class="form-control" id="lng" name="lng" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" readonly>
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



    //lng, lat = longitude, latitude
    $('#titik_akhir').change(function() {   
        var value = $(this).find(':selected').data('warna');
        $("input[name='kelas']").val(value);

        var value = $(this).find(':selected').data('kec');
        $("input[name='kec']").val(value);

        var value = $(this).find(':selected').data('lat');
        $("input[name='lat']").val(value);

        var value = $(this).find(':selected').data('lng');
        $("input[name='lng']").val(value);

        var value = $(this).find(':selected').data('nilai');
        $("input[name='nilai']").val(value);

        var lat = $(this).find(':selected').data('lat');
        var lng = $(this).find(':selected').data('lng');

        mapboxgl.accessToken ='pk.eyJ1Ijoicmljb280MDQiLCJhIjoiY2w2aTV4MW5pMDhuMTNmczJiNWR5YnJhbyJ9.R_LVgwa2VbomQopHxXFlXg';
        const coordinates = document.getElementById('coordinates');
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [lng,lat],
            zoom: 13,
            animation: true,
        });

        map.addControl(new mapboxgl.NavigationControl());
        
        var warna = $(this).find(':selected').data('warna');
        $("input[name='label_akhir']").val(warna);

        var to = [lng, lat]; //lng, lat

        var greenMarker = new mapboxgl.Marker({
                color: warna
            })
            .setLngLat(to) // marker position using variable 'to'
            .addTo(map); //add marker to map
    });
});

</script>

<script>
    //ajax menampilkan data berdasarkan tahun dan id kabupaten
    $('body').on('change','#tahun', function() {
        var tahun = $("#tahun").val();
        $.ajax({
            url: `/maut/getByData/${tahun}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#titik_akhir').empty();
                $("#titik_akhir").append($("<option/>", {
                    "value": "",
                    "text": "Pilih"
                }));

                $.each(data, function (key, value) {
                    let clascColor = '';
                    if (value.hasil > 0 && value.hasil <= 0.32) {
                        clascColor = 'green';
                    }
                    else if (value.hasil > 0.32 && value.hasil <= 0.68) {
                        clascColor = 'yellow';
                    }
                    else {
                        clascColor = 'red';
                    }
                    
                    $('#titik_akhir').append('<option value="' + value.id_kecamatan + '" data-warna="'+clascColor+  '" data-kec="'+ value.kecamatan +'" data-nilai="'+ value.hasil +'" data-lat="'+value.latitude+'" data-lng="'+value.longitude+'"> ' + value.kecamatan + '</option>');
                });         
                console.log("data succes"); 
                console.log(data); 
                // $("input[name='semester']").val(data[0]['semester'] == 0 ? 1 : data[0]['semester']);
            },
            error:function(data){
                console.log("data Error"); 
                console.log(data);
                // $("input[name='nama']").val(' -');
            }
        });
	}); 
</script>
</body>

</html>