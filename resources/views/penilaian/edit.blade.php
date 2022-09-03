<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">     
                    <label for="tahun">Tahun</label>               
                    <select class="form-control" id="tahun" name="tahun">
                        <option value=""  {{ ($data->tahun == "") ? "selected" : ""}}>Pilih Tahun</option>
                        <option value="2020" {{ ($data->tahun == "2020") ? "selected" : ""}}> 2020</option>
                        <option value="2021" {{ ($data->tahun == "2021") ? "selected" : ""}}> 2021</option>
                    </select>
                    <small class="d-none text-danger" id="tahun"></small>
                </div>
            </div>
            <div class="col-sm-6">
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
            <div class="col-sm-6">
                <div class="form-group"> 
                    <label for="kriteria">Kriteria</label>                   
                    <select class="form-control" id="id_kriteria" name="id_kriteria">
                        <option value="">Pilih</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}" {{ ($k->id == $data->id_kriteria) ? "selected" : ""}}>{{ $k->nama_kriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria"></small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">    
                    <label for="id_subkriteria">Nilai</label>                
                    <select class="form-control" id="id_subkriteria" name="id_subkriteria">
                        <option value="">Pilih Nilai</option>
                        @foreach ($subkriteria as $s)
                            <option value="{{ $s->id }}" {{ ($s->id == $data->id_subkriteria) ? "selected" : ""}}>{{ $s->nama_subkriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_subkriteria"></small>
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