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
                    <label for="id_kecamatan">Kecamatan</label>                
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
        <br>
        {{-- table --}}
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $i => $k)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $k->kode_kriteria }}</td>
                        <td>{{ $k->nama_kriteria }}</td>
                        <td>
                            <input type="test" id="id_kriteria" name="id_kriteria[{{ $k->id }}]" value="{{ $k->id }}" hidden>
                            <select class="form-control" id="id_subkriteria" name="id_subkriteria[{{ $k->id }}]">
                                @foreach ($subkriteria as $n)
                                    @if ($n->id_kriteria == $k->id)
                                        <option value="{{ $n->id }}">{{ $n->bobot }}  - {{ $n->nilai }} [ {{ $n->nama_subkriteria }} ]</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="row">
            <div class="col-sm-8">
                <div class="form-group">   
                    <label for="id_kriteria">Kriteria</label>                 
                    <select class="form-control" id="id_kriteria" name="id_kriteria">
                        <option value="">Pilihan Kriteria</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">  
                    <label for="nilai">Nilai</label>                  
                    <select class="form-control" id="id_subkriteria" name="id_subkriteria">
                        <option value="">Pilih Nilai</option>
                        @foreach ($subkriteria as $n)
                            <option value="{{ $n->id }}">{{ $n->nama_subkriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_subkriteria"></small>
                </div>
            </div>
        </div> --}}

        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-success" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>