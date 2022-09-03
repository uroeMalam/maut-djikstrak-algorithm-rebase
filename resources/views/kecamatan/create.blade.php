<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="" aria-describedby="kecamatan">
                    <small class="d-none text-danger" id="kecamatan"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="" aria-describedby="latitude">
                    <small class="d-none text-danger" id="latitude"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="" aria-describedby="longitude">
                    <small class="d-none text-danger" id="longitude"></small>
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