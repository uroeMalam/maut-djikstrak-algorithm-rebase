<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Models\kecamatan;
use App\Models\subkriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HasilController extends Controller
{
    public function index()
    {
        $data['CData'] = penilaian::all();
        return view('hasil.index', $data);
    }


    public function maxmin(Request $request)
    {
        $table = DB::select('SELECT a.*,tb_kriteria.nama_kriteria FROM (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = '.$request->tahun.' GROUP BY tahun,id_kriteria) AS a JOIN tb_kriteria ON tb_kriteria.id = a.id_kriteria');
        return DataTables::of($table)
            ->addIndexColumn()
            ->make(true);
    }

    public function raw(Request $request)
    {
        $table = DB::select('SELECT tb_penilaian.id,tb_penilaian.tahun, tb_kecamatan.kecamatan,tb_kriteria.nama_kriteria,tb_subkriteria.nama_subkriteria,tb_subkriteria.bobot FROM `tb_penilaian` 
        JOIN tb_kecamatan ON tb_kecamatan.id = tb_penilaian.id_kecamatan
        JOIN tb_kriteria ON tb_kriteria.id = tb_penilaian.id_kriteria
        JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria
    WHERE tahun = '.$request->tahun.'');
        return DataTables::of($table)
            ->addIndexColumn()
            ->make(true);
    }

    public function normalisasi(Request $request)
    {
        $table = DB::select('SELECT 
        tb_penilaian.id,
        tb_penilaian.tahun, 
        tb_kecamatan.kecamatan,
        tb_kriteria.nama_kriteria,
        tb_subkriteria.nama_subkriteria,
        tb_subkriteria.bobot,
        maxmin.*,
        ((tb_subkriteria.bobot-maxmin.min_data)/(maxmin.max_data-maxmin.min_data)) AS normalisasi
    FROM `tb_penilaian` 
        JOIN tb_kecamatan ON tb_kecamatan.id = tb_penilaian.id_kecamatan
        JOIN tb_kriteria ON tb_kriteria.id = tb_penilaian.id_kriteria
        JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria
        JOIN (SELECT a.*,tb_kriteria.nama_kriteria FROM (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = '.$request->tahun.' GROUP BY tahun,id_kriteria) AS a JOIN tb_kriteria ON tb_kriteria.id = a.id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_penilaian.id_kriteria
    WHERE tb_penilaian.tahun = '.$request->tahun.'');
        return DataTables::of($table)
            ->addIndexColumn()
            ->make(true);
    }

    public function matriks(Request $request)
    {
        $table = DB::select('SELECT 
        tb_penilaian.id,
        tb_penilaian.tahun, 
        tb_kecamatan.kecamatan,
        tb_kriteria.nama_kriteria,
        tb_kriteria.bobot AS bobot_kriteria,
        tb_subkriteria.nama_subkriteria,
        tb_subkriteria.bobot,
        maxmin.*,
        ((tb_subkriteria.bobot-maxmin.min_data)/(maxmin.max_data-maxmin.min_data)) AS normalisasi,
        (((tb_subkriteria.bobot-maxmin.min_data)/(maxmin.max_data-maxmin.min_data))*tb_kriteria.bobot) AS matriks
    FROM `tb_penilaian` 
        JOIN tb_kecamatan ON tb_kecamatan.id = tb_penilaian.id_kecamatan
        JOIN tb_kriteria ON tb_kriteria.id = tb_penilaian.id_kriteria
        JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria
        JOIN (SELECT a.*,tb_kriteria.nama_kriteria FROM (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = '.$request->tahun.' GROUP BY tahun,id_kriteria) AS a JOIN tb_kriteria ON tb_kriteria.id = a.id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_penilaian.id_kriteria
    WHERE tb_penilaian.tahun = '.$request->tahun.'');
        return DataTables::of($table)
            ->addIndexColumn()
            ->make(true);
    }

    public function hasil(Request $request)
    {
        $table = DB::select('SELECT 
        tb_penilaian.tahun,
        tb_kecamatan.id as id_kecamatan,
        tb_kecamatan.kecamatan,
        SUM(((tb_subkriteria.bobot-maxmin.min_data)/(maxmin.max_data-maxmin.min_data))*tb_kriteria.bobot) AS hasil
    FROM `tb_penilaian` 
        JOIN tb_kecamatan ON tb_kecamatan.id = tb_penilaian.id_kecamatan
        JOIN tb_kriteria ON tb_kriteria.id = tb_penilaian.id_kriteria
        JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria
        JOIN (SELECT a.*,tb_kriteria.nama_kriteria FROM (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = '.$request->tahun.' GROUP BY tahun,id_kriteria) AS a JOIN tb_kriteria ON tb_kriteria.id = a.id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_penilaian.id_kriteria
    WHERE tb_penilaian.tahun = '.$request->tahun.' GROUP BY id_kecamatan');
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('label', function ($row) {
                if ($row->hasil > 0 && $row->hasil <= 0.32) {
                    return '<h2><span class="badge badge-success">Tidak Rawan</span></h2>';
                }
                elseif ($row->hasil > 0.32 && $row->hasil <= 0.68) {
                    return '<h2><span class="badge badge-warning">Rawan</span></h2>';
                }
                else {
                    return '<h2><span class="badge badge-danger">Sangat Rawan</span></h2>';
                }
            })
            ->rawColumns(['label'])
            ->make(true);
    }

    // map maut
    public function mapMaut($tahun)
    {
        $data= DB::select('SELECT hehe.*,tb_kecamatan.latitude,tb_kecamatan.longitude FROM(SELECT 
        tb_penilaian.tahun,
        tb_kecamatan.id as id_kecamatan,
        tb_kecamatan.kecamatan,
        SUM(((tb_subkriteria.bobot-maxmin.min_data)/(maxmin.max_data-maxmin.min_data))*tb_kriteria.bobot) AS hasil
    FROM `tb_penilaian` 
        JOIN tb_kecamatan ON tb_kecamatan.id = tb_penilaian.id_kecamatan
        JOIN tb_kriteria ON tb_kriteria.id = tb_penilaian.id_kriteria
        JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria
        JOIN (SELECT a.*,tb_kriteria.nama_kriteria FROM (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = '.$tahun.' GROUP BY tahun,id_kriteria) AS a JOIN tb_kriteria ON tb_kriteria.id = a.id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_penilaian.id_kriteria
    WHERE tb_penilaian.tahun = '.$tahun.' GROUP BY id_kecamatan) hehe JOIN tb_kecamatan ON tb_kecamatan.id = hehe.id_kecamatan');
    echo json_encode($data);
    }

}


// get maxmin
// SELECT tb_penilaian.id, tb_penilaian.tahun, tb_penilaian.id_kecamatan, tb_penilaian.id_kriteria, tb_penilaian.id_subkriteria, maxmin.min_data, maxmin.max_data FROM `tb_penilaian` JOIN (SELECT tahun,tb_penilaian.id_kriteria, MIN(bobot) AS min_data, MAX(bobot) AS max_data FROM `tb_penilaian` JOIN tb_subkriteria ON tb_subkriteria.id = tb_penilaian.id_subkriteria WHERE tahun = 2020 GROUP BY tahun,id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_penilaian.id_kriteria WHERE tb_penilaian.tahun = 2020;