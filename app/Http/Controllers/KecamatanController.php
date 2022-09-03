<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KecamatanController extends Controller
{
    public function index()
    {
        $data['title'] = 'kecamatan';
        $dtKecamatan = kecamatan::all();
        return view('kecamatan.index', compact('dtKecamatan'));
    }

    public function create()
    {
        $data['title'] = 'kecamatan';
        return view('kecamatan.create');
    }

    public function store(Request $request)
    {
        kecamatan::create([
            'kecamatan' => $request->kecamatan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;
        $data['data'] = kecamatan::where('id', $id)->first();
        return view('kecamatan.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'kecamatan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        kecamatan::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

   
    public function destroy(Request $request)
    {
        kecamatan::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = kecamatan::select('*');
        return DataTables::of($table)
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
