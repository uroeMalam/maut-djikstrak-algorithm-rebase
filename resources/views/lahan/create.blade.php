<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">    
                    <label for="kecamatan">Kecamatan</label>                
                    <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                        <option value="">Pilihan Kecamatan</option>
                        @foreach ($kecamatan as $d)
                            <option value="{{ $d->id }}">{{ $d->kecamatan }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kecamatan"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="luas">Luas</label>
                    <input type="number" class="form-control" id="luas" name="luas" value="" aria-describedby="luas">
                    <small class="d-none text-danger" id="luas"></small>
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