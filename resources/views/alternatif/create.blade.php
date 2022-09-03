<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">   
                    <label for="tahun">Tahun</label>                 
                    <select class="form-control" id="tahun" name="tahun">
                        <option value="">Pilih Tahun</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                    <small class="d-none text-danger" id="tahun"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>                   
                    <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $c)
                            <option value="{{ $c->id }}">{{ $c->kecamatan }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kecamatan"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group"> 
                    <label for="Kriteria">Kriteria</label>                   
                    <select class="form-control" id="id_kriteria" name="id_kriteria">
                        <option value="">Pilih Kriteria</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="text" class="form-control" id="nilai" name="nilai" value="" aria-describedby="nilai">
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