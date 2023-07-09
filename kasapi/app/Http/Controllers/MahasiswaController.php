<?php

namespace App\Http\Controllers;

use App\http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::orderBy('nama', 'asc')->get();
        return response()->json([
            'status'=>true,
            'massage'=>'Data ditemukan',
            'data'=>$data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datamahasiswa = new mahasiswa;

        $rules = [
            'nama'=>'required',
            'nim'=>'required',
            'kelas'=>'required',
            'nohp'=>'required',
            'alamat'=>'required'
        ];
        $validator = Validator ::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'false',
                'massage'=>'Gagal menambahkan data',
                'data'=> $validator->errors()
            ]);
        }

        $datamahasiswa->nama = $request->nama;
        $datamahasiswa->nim = $request->nim;
        $datamahasiswa->kelas = $request->kelas;
        $datamahasiswa->nohp = $request->nohp;
        $datamahasiswa->alamat = $request->alamat;

        $post = $datamahasiswa->save();

        return response()->json([
            'status' => true,
            'massage' => 'Sukses menambah data'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $data = mahasiswa::find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'massage'=>'Data ditemukan',
                'data'=>$data
            ], 200);
        }else{
            return response()->json([
                'status'=>false,
                'massage'=>'Data tidak ditemukan',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $datamahasiswa = mahasiswa::find($id);
        if(empty($datamahasiswa)){
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'nama'=>'required',
            'nim'=>'required',
            'kelas'=>'required',
            'nohp'=>'required',
            'alamat'=>'required'
        ];
        $validator = Validator ::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>'false',
                'massage'=>'Gagal update data',
                'data'=> $validator->errors()
            ]);
        }

        $datamahasiswa->nama = $request->nama;
        $datamahasiswa->nim = $request->nim;
        $datamahasiswa->kelas = $request->kelas;
        $datamahasiswa->nohp = $request->nohp;
        $datamahasiswa->alamat = $request->alamat;

        $post = $datamahasiswa->save();

        return response()->json([
            'status' => true,
            'massage' => 'Sukses update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $datamahasiswa = mahasiswa::find($id);
        if(empty($datamahasiswa)){
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $datamahasiswa->delete();

        return response()->json([
            'status' => true,
            'massage' => 'Sukses delete data'
        ]);
    }
}
