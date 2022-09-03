<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="kode_kriteria">Kode Kriteria</label>
                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="" aria-describedby="kode_kriteria">
                    <small class="d-none text-danger" id="kode_kriteria"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="" aria-describedby="nama_kriteria">
                    <small class="d-none text-danger" id="nama_kriteria"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" value="" aria-describedby="nilai">
                    <small class="d-none text-danger" id="nilai"></small>
                </div>
            </div>
        </div>
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-success" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>