<?php

namespace App\Http\Controllers;

use App\Models\lahan;
use App\Models\kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LahanController extends Controller
{
    public function index()
    {
        $data['title'] = 'lahan';
        $dtLahan = lahan::all();
        return view('lahan.index', compact('dtLahan'));
    }

    public function create()
    {
        $data['title'] = 'lahan';
        $data['kecamatan'] = kecamatan::all();
        return view('lahan.create',$data);
    }

    public function store(Request $request)
    {
        $data=$request ->validate([
            'id_kecamatan' => 'required',
            'luas' => 'required',
        ]);

        lahan::create($data);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;     
        $data['kecamatan'] = kecamatan::all();   
        $data['data'] = lahan::where('id', $id)->first();
        return view('lahan.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id_kecamatan' => 'required',
            'luas' => 'required',
        ]);
        lahan::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

   
    public function destroy(Request $request)
    {
        lahan::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = new lahan;
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
