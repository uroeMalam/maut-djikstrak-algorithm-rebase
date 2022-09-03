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
              <h2 class="mb-0">Data Kriteria</h2>
              <div class="col-auto">
                <div class="form-actions">
                  <div class="text-right">
                    <button type="submit" class="btn btn-info btn-sm" id="tambah">Tambah Data</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Kode Kriteria</th>
                    <th style="font-size: 13px">Nama Kriteria</th>
                    <th style="font-size: 13px">Bobot</th>
                    <th style="font-size: 13px">Actions</th>
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
    $(document).ready(function () {

      // data table
      var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        rowId:"id",
        ajax: "{{ route('kriteria_dataTable') }}",
        columns: [
            {data:'DT_RowIndex',name: 'DT_RowIndex',orderable:false,searchable:false},
            {data: 'kode_kriteria', name: 'kode_kriteria'},
            {data: 'nama_kriteria', name: 'nama_kriteria'},
            {data: 'bobot', name: 'bobot'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
      });
        
      // menjalankan tombol tambah
      $(document).on('click', '#tambah',function (e) {
          e.preventDefault();
          let element = $(this);
          show_loading(element, "full");
          $.ajax({
              type: 'get',
              url: "/kriteria/tambah",
              success: function(data) {
              hide_loading(element, '', 'full', ' Tambah Data');
              $('#modalDialogLabel').html("Tambah Data")
              $('#modalDialogSize').addClass("modal-lg")
              $('#modalDialogData').html(data);
              $('#modalDialog').modal({
                  backdrop: 'static'
              })
              $('#modalDialog').modal("show");
              }
          });
      });

      // menjalankan fungsi tambah
      $(document).on('submit', '#formCreate', function(e) {
          e.preventDefault();
          clear_error_withStyle()
          show_loading("#btnCreate", "full");
          $.ajax({
              url: '/kriteria/simpan',
              method: "POST",
              data: new FormData(this),
              dataType: 'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  if (data.status) {
                      clearInput();
                      $('#modalDialog').modal("hide");
                      Swal.fire("Berhasil!", data.message, "success").then(function() {
                          table.ajax.reload();
                      });
                  }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  check_errors_withStyle(xhr.responseJSON.errors);
              }
          });
      });


      // fungsi tombil edit
      $(document).on('click', '#edit',function (e) {
          e.preventDefault();
          let element = $(this);
          show_loading(element, "full");
          let id=$(this).attr('data-id');
          console.log(id);
          $.ajax({
              type: 'get',
              url: "/kriteria/edit/"+id,
              success: function(data) {
              hide_loading(element, 'edit', '', ' Edit');
              $('#modalDialogLabel').html("Edit")
              $('#modalDialogSize').addClass("modal-lg")
              $('#modalDialogData').html(data);
              $('#modalDialog').modal({
                  backdrop: 'static'
              })
              $('#modalDialog').modal("show");
              }
          });
      });

      // menjalankan fungsi edit
      $(document).on('submit', '#formEdit', function(e) {
        e.preventDefault();
        clear_error_withStyle()
        show_loading("#btnEdit", "");
        $.ajax({
            url: `/kriteria/update`,
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                hide_loading('#btnEdit', '', '', 'Edit');
                if (data.status) {
                    clearInput();
                    $('#modalDialog').modal("hide");
                    Swal.fire("Berhasil!", data.message, "success").then(function() {
                        table.ajax.reload();
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                hide_loading('#btnEdit', '', '', 'Edit');
                check_errors_withStyle(xhr.responseJSON.errors);
            }
        });
      });

      // fungsi tombol hapus
      $(document).on('click', '#hapusData', function(e) {
        e.preventDefault();
        var url = "{{ route('kriteria-delete') }}";
        var csrf= '{{ csrf_token() }}';
        var dataText= $(this).attr('data-text');
        var id= $(this).attr('data-id');
        deleteConfirm(url,table,dataText,csrf,id);
      });
    });
        
    </script>
@endpush