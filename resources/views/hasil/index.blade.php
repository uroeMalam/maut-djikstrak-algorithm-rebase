@extends('layout.main')

{{-- aditional css for current page --}}
@push('page-css')

@endpush

@section('content')
<div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h2 class="mb-0">Hasil Penilaian</h2>
            </div>
            <br>
            <div class="row px-4">
              <div class="col-sm-4">
                  <div class="form-group">
                      <small><label for="">Tahun</label></small>
                      <select class="form-control" id="tahun" name="tahun">
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                      </select>
                  </div>
              </div>
          </div>
            <br>
            <h3 class="ml-4">1. Maximun and Minimun Data</h3>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table-maxmin">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Tahun</th>
                    <th style="font-size: 13px;">Nama Kriteria</th>
                    <th style="font-size: 13px;">Nilai Maximun</th>
                    <th style="font-size: 13px;">Nilai Minimun</th>
                  </tr>
                </thead>
              </table>
            </div>
            {{--  --}}
            <br>
            <h3 class="ml-4">2. Raw Data</h3>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table-raw">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Tahun</th>
                    <th style="font-size: 13px;">Kecamatan</th>
                    <th style="font-size: 13px;">Kriteria</th>
                    <th style="font-size: 13px;">Nilai</th>
                    <th style="font-size: 13px;">Bobot</th>
                  </tr>
                </thead>
              </table>
            </div>
            {{--  --}}
            <br>
            <h3 class="ml-4">3. Normalisasi Data</h3>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table-normalisasi">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Tahun</th>
                    <th style="font-size: 13px;">Kecamatan</th>
                    <th style="font-size: 13px;">Kriteria</th>
                    <th style="font-size: 13px;">Bobot</th>
                    <th style="font-size: 13px;">Max</th>
                    <th style="font-size: 13px;">Min</th>
                    <th style="font-size: 13px;">Normalisasi</th>
                  </tr>
                </thead>
              </table>
            </div>
            {{--  --}}
            <br>
            <h3 class="ml-4">4. Perkalian Matriks</h3>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table-matriks">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Tahun</th>
                    <th style="font-size: 13px;">Kecamatan</th>
                    <th style="font-size: 13px;">Nama Kriteria</th>
                    <th style="font-size: 13px;">Bobot Kriteria</th>
                    <th style="font-size: 13px;">Normalisasi</th>
                    <th style="font-size: 13px;">Matriks</th>
                  </tr>
                </thead>
              </table>
            </div>
            {{--  --}}
            <br>
            <h3 class="ml-4">5. Preferensi</h3>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table-hasil">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Tahun</th>
                    <th style="font-size: 13px;">Kecamatan</th>
                    <th style="font-size: 13px">Total</th>
                    <th style="font-size: 13px">Clastering</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('page-scripts')
    <script type="text/javascript">
        // onchange tahun
        $(document).on('change', '#tahun',function (e) {
          table_maxmin.ajax.reload();
          table_raw.ajax.reload();
          table_normalisasi.ajax.reload();
          table_matriks.ajax.reload();
          table_hasil.ajax.reload();
        });

        // data table maxmin
        var table_maxmin = $('.data-table-maxmin').DataTable({                
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            info: false,
            rowId:"id",
            ajax: {
                'url': "{{ route('maxmin_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'tahun', name: 'tahun'},
                {data: 'nama_kriteria', name: 'nama_kriteria'},
                {data: 'max_data', name: 'max_data'},
                {data: 'min_data', name: 'min_data'},
            ]
        }); 
        // data table raw
        var table_raw = $('.data-table-raw').DataTable({                
            processing: true,
            serverSide: true,
            rowId:"id",
            ajax: {
                'url': "{{ route('raw_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'tahun', name: 'tahun'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'nama_kriteria', name: 'nama_kriteria'},
                {data: 'nama_subkriteria', name: 'nama_subkriteria'},
                {data: 'bobot', name: 'bobot'},
            ]
        }); 
        // data table normalisasi
        var table_normalisasi = $('.data-table-normalisasi').DataTable({                
            processing: true,
            serverSide: true,
            rowId:"id",
            ajax: {
                'url': "{{ route('normalisasi_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'tahun', name: 'tahun'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'nama_kriteria', name: 'nama_kriteria'},
                {data: 'bobot', name: 'bobot'},
                {data: 'max_data', name: 'max_data'},
                {data: 'min_data', name: 'min_data'},
                {data: 'normalisasi', name: 'normalisasi'},
            ]
        }); 
        // data table matriks
        var table_matriks = $('.data-table-matriks').DataTable({                
            processing: true,
            serverSide: true,
            rowId:"id",
            ajax: {
                'url': "{{ route('matriks_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'tahun', name: 'tahun'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'nama_kriteria', name: 'nama_kriteria'},
                {data: 'bobot_kriteria', name: 'bobot_kriteria'},
                {data: 'normalisasi', name: 'normalisasi'},
                {data: 'matriks', name: 'matriks'},
            ]
        }); 
        // data table hasil
        var table_hasil = $('.data-table-hasil').DataTable({                
            processing: true,
            serverSide: true,
            rowId:"id",
            ajax: {
                'url': "{{ route('hasil_dataTable') }}",
                'type': "POST",
                'data': function(d){
                    d.tahun =$("#tahun").val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [
                {orderable:false,searchable:false,data:'DT_RowIndex',name: 'DT_RowIndex'},
                {data: 'tahun', name: 'tahun'},
                {data: 'kecamatan', name: 'kecamatan'},
                {data: 'hasil', name: 'hasil'},
                {data: 'label', name: 'label'},
            ]
        }); 
        
    </script>
@endpush