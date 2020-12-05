<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuans = \App\Pengajuan::where('status', '!=', 'disetujui')->get();
        return view('pengajuan.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perusahaans = \App\Perusahaan::all();
        $jurusans = \App\Jurusan::all();
        return view('pengajuan.create', ['perusahaans' => $perusahaans, 'jurusans' => $jurusans]);
    }

    public function setujui($id)
    {
        $pengajuan = \App\Pengajuan::find($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();
        
        $perusahaans = new \App\Perusahaan;
        $perusahaans->nama = $pengajuan->nama;
        $perusahaans->alamat = $pengajuan->alamat;
        $perusahaans->deskripsi = $pengajuan->deskripsi;
        $perusahaans->slot = $pengajuan->slot;
        $perusahaans->save();

        return redirect()->back()->with('msg', "perusahaan ". $pengajuan->nama . " disetujui");
    }

    /**
     * 1 = admin
     * 2 = guru
     * 3 = siswa
     */
    public function store(Request $request)
    {
        $pengajuans = new \App\Pengajuan;

        $pengajuans->nama = $request->nama;
        $pengajuans->alamat = $request->alamat;
        $pengajuans->deskripsi = $request->deskripsi;
        $pengajuans->slot = $request->slot;
        $pengajuans->user_id = \Auth::user()->id;
        $pengajuans->kontak = $request->kontak;
        $pengajuans->status = "terbuka";
        $pengajuans->jurusan_id = $request->jurusan_id;

        $pengajuans->save();

        return redirect()->back()->with('msg', "berhasil mengajukan perusahaan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuans = \App\Pengajuan::find($id);
        return view('pengajuan.edit', compact('pengajuans'));
    }

    /**
     * untuk tolak dan terima bukan update
     */
    public function update(Request $request, $id)
    {
        $pengajuans = Perusahaan::find($id);

        $pengajuans->nama = $request->nama;
        $pengajuans->alamat = $request->alamat;
        $pengajuans->deskripsi = $request->deskripsi;
        $pengajuans->slot = $request->slot;
        $pengajuans->save();

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
        $pengajuans = Perusahaan::find($id);
        $pengajuans->delete();
        return redirect()->back();
    }
}
