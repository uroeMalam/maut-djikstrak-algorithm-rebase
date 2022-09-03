<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Models\kecamatan;
use App\Models\subkriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['title'] = 'penilaian';
        $dtPenilaian = penilaian::all();
        return view('penilaian.index', compact('dtPenilaian'));
    }

    public function create()
    {
        $data['title'] = 'penilaian';
        $data['kecamatan'] = kecamatan::all();
        $data['kriteria'] = kriteria::all();
        $data['subkriteria'] = subkriteria::all();
        return view('penilaian.create',$data);
    }

    public function store(Request $request)
    {
        // $data=$request ->validate([
        //     'tahun' => 'required',
        //     'id_kecamatan' => 'required',
        //     'id_kriteria' => 'required',
        //     'id_subkriteria' => 'required',
        // ]);

        // penilaian::create($data);
        $request ->validate([
            'tahun' => 'required',
            'id_kecamatan' => 'required',
        ]);

        $data = [];
        $len = count($request->id_subkriteria);
        for ($i=1; $i <= $len; $i++) { 
            $temp = [];
            $temp['tahun'] = $request->tahun;
            $temp['id_kecamatan'] = $request->id_kecamatan;
            $temp['id_kriteria'] = $request->id_kriteria[$i];
            $temp['id_subkriteria'] = $request->id_subkriteria[$i];
            array_push($data, $temp);
        }
        penilaian::insert($data);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;     
        $data['kecamatan'] = kecamatan::all();   
        $data['kriteria'] = kriteria::all();
        $data['subkriteria'] = subkriteria::all();
        $data['data'] = penilaian::where('id', $id)->first();
        return view('penilaian.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'tahun' => 'required',
            'id_kecamatan' => 'required',
            'id_kriteria' => 'required',
            'id_subkriteria' => 'required', 
        ]);
        penilaian::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function destroy(Request $request)
    {
        penilaian::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = new penilaian;
        return DataTables::of($table->AllData())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-info" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->kecamatan . '"><i class="fas fa-trash"></i></button>';

                $btn = '<div class="btn-group" role="group" aria-label="LihatData">' .
                    $btn_edit .
                    $btn_hapus .
                    '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
