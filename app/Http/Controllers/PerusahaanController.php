<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaans = \App\Perusahaan::where('slot', '>', 0)->get();
        $jurusans = \App\Jurusan::all();
        return view('perusahaan.index', ['perusahaans' => $perusahaans, 'jurusans' => $jurusans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perusahaans = new \App\Perusahaan;

        $perusahaans->nama = $request->nama;
        $perusahaans->alamat = $request->alamat;
        $perusahaans->deskripsi = $request->deskripsi;
        $perusahaans->slot = $request->slot;
        $perusahaans->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perusahaans = \App\Perusahaan::find($id);
        $siswa = \App\Siswa::where('jurusan_id', $perusahaans->jurusan->id)->where('status', 'belum magang')->get();
        $terdaftar = \App\Penempatan::where('perusahaan_id', $perusahaans->id)->get();
        return view('perusahaan.info', ['jurusan' => $perusahaans->jurusan->nama, 'siswas' => $siswa, 'perusahaans'=>$perusahaans, 'terdaftar' => $terdaftar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaans = \App\Perusahaan::find($id);
        return view('perusahaan.edit', compact('perusahaans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perusahaans = Perusahaan::find($id);

        $perusahaans->nama = $request->nama;
        $perusahaans->alamat = $request->alamat;
        $perusahaans->deskripsi = $request->deskripsi;
        $perusahaans->slot = $request->slot;
        $perusahaans->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaans = Perusahaan::find($id);
        $perusahaans->delete();
        return redirect()->back();
    }

    public function sortPerusahaan(Request $req)
    {
        $jurusan_id = $req->jurusan_id;
        return redirect()->back()->with('jurusan_id', $jurusan_id);
    }
}
