@extends('layout.main')

{{-- aditional css for current page --}}
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
@endpush