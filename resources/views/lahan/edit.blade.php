<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group"> 
                    <label for="kecamatan">Kecamatan</label>                   
                    <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                        <option value="">Pilih</option>
                        @foreach ($kecamatan as $c)
                            <option value="{{ $c->id }}" {{ ($c->id == $data->id_kecamatan) ? "selected" : ""}}>{{ $c->kecamatan }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kecamatan"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="luas">Luas Lahan</label>
                    <input type="text" class="form-control" id="luas" name="luas" value="{{ $data->luas }}" aria-describedby="luas">
                    <small class="d-none text-danger" id="luas"></small>
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