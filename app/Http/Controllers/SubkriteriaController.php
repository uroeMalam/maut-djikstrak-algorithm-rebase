<?php

namespace App\Http\Controllers;

use App\Models\subkriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubkriteriaController extends Controller
{
    public function index()
    {
        $data['title'] = 'subkriteria';
        $dtSubkriteria = subkriteria::all();
        return view('subkriteria.index', compact('dtSubkriteria'));
    }

    public function create()
    {
        $data['title'] = 'subkriteria';
        $data['kriteria'] = kriteria::all();
        return view('subkriteria.create',$data);
    }

    public function store(Request $request)
    {
        $data=$request ->validate([
            'id_kriteria' => 'required',
            'nama_subkriteria' => 'required',
            'bobot'         => 'required'
        ]);

        subkriteria::create($data);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;        
        $data['kriteria'] = kriteria::all();
        $data['data'] = subkriteria::where('id', $id)->first();
        return view('subkriteria.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id_kriteria' => 'required',
            'nama_subkriteria' => 'required',
            'bobot' => 'required'
        ]);
        subkriteria::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

   
    public function destroy(Request $request)
    {
        subkriteria::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = new subkriteria;
        return DataTables::of($table->AllData())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-info" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->nama_subkriteria . '"><i class="fas fa-trash"></i></button>';

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
