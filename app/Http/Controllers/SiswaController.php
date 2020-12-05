<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = \App\Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = \App\Kelas::all();
        $jurusan = \App\Jurusan::all();
        return view('siswa.create', compact('kelas', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'kelas_id' => $request->kelas_id
        ]);

        $siswas = new \App\Siswa;
        $siswas->user_id = $user->id;
        $siswas->kelas_id = $request->kelas_id;
        $siswas->jurusan_id = $request->jurusan_id;
        $siswas->save();

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
        $siswas = \App\Siswa::find($id);
        return view('siswa.edit', compact('siswas'));
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
        $siswas = Perusahaan::find($id);

        $siswas->nama = $request->nama;
        $siswas->kelas_id = $request->alamat;
        $siswas->depelover = $request->deskripsi;
        $siswas->cv = $request->cv;
        $siswas->portofolio = $request->portofolio;
        $siswas->save();

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
        $siswas = Perusahaan::find($id);
        $siswas->delete();
        return redirect()->back();
    }

    public function daftarkanSiswa(Request $request)
    {
        $calon = $request->pilih;
        for($i=0; $i < count($calon); $i++){
            $siswa = \App\Siswa::find($calon[$i]);
            $siswa->status = 'sudah magang';
            $siswa->save();
            
            $this->insertPilihan($siswa->id, $request->perusahaan_id);
        }

        $perusahaan = \App\Perusahaan::find($request->perusahaan_id);
        $perusahaan->slot = $perusahaan->slot - count($calon);
        $perusahaan->save();

        return redirect()->back();
    }

    private function insertPilihan($siswa_id, $perusahaan_id)
    {
        \App\Penempatan::create([
            'perusahaan_id' => $perusahaan_id,
            'siswa_id' => $siswa_id
        ]);
    }
}
