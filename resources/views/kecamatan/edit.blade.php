<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $data->kecamatan }}" aria-describedby="kecamatan">
                    <small class="d-none text-danger" id="kecamatan"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $data->latitude }}" aria-describedby="latitude">
                    <small class="d-none text-danger" id="latitude"></small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $data->longitude }}" aria-describedby="longitude">
                    <small class="d-none text-danger" id="longitude"></small>
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