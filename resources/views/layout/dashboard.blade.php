@extends('layout.main')
@section('content')

<div class="container-fluid mt--6">
      <div class="row">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Data Kriteria</h5>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                </div>
                
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="{{('kriteria')}}" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>
      
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Data Sub Kriteria</h5>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                </div>
                
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="{{('subkriteria')}}" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Data Kecamatan</h5>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                </div>
                
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="{{('kecamatan')}}" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Data Luas Lahan</h5>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                </div>
                
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="{{('lahan')}}" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Data Alternatif</h5>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                  </div>
                </div>
                
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="{{('alternatif')}}" class="text-nowrap text-white font-weight-600">Lihat Detail</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection