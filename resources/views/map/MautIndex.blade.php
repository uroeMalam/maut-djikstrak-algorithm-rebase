@extends('layout.main')

@push('page-css')

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
@endpush

@section('content')
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
@endsection


@push('page-scripts')
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
@endpush