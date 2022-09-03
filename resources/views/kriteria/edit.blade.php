<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="kode_kriteria">Kode Kriteria</label>
                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ $data->kode_kriteria }}" aria-describedby="kode_kriteria">
                    <small class="d-none text-danger" id="kode_kriteria"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $data->nama_kriteria }}" aria-describedby="nama_kriteria">
                    <small class="d-none text-danger" id="nama_kriteria"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="number" class="form-control" id="bobot" name="bobot" value="{{ $data->bobot }}" aria-describedby="bobot">
                    <small class="d-none text-danger" id="bobot"></small>
                </div>
            </div>
        </div>
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-info" id="btnEdit">Edit</button>
                </div>
            </div>
    </form>
</div>