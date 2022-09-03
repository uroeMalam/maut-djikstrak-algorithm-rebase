<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KriteriaController extends Controller
{
    public function index()
    {
        $data['title'] = 'kriteria';
        $dtKriteria = kriteria::all();
        return view('kriteria.index', compact('dtKriteria'));
    }

    public function create()
    {
        $data['title'] = 'kriteria';
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'nilai'         => $request->nilai,
            'bobot'         => $request->bobot,
        ]);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;
        $data['data'] = kriteria::where('id', $id)->first();
        return view('kriteria.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'nilai'         => 'required',
        ]);
        kriteria::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

   
    public function destroy(Request $request)
    {
        kriteria::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = kriteria::select('*');
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-info" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->nama_kriteria . '"><i class="fas fa-trash"></i></button>';

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
