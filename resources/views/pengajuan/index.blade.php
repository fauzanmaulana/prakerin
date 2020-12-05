@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Daftar Pengajuan</h4>
                    <p>berikut adalah daftar pengajuan yang di berikan siswa</p>
                </div>
                <!-- <a href="/admin/perusahaans" class="main-btn">management perusahaan</a> -->
            </div>

            @if(\Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    <li>{!! \Session::get('msg') !!}</li>
                </div>
            @endif
            
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Slot</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Pengaju</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($pengajuans as $pengajuan)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$pengajuan->nama}}</td>
                            <td>{{$pengajuan->alamat}}</td>
                            <td>{{$pengajuan->deskripsi}}</td>
                            <td>{{$pengajuan->slot}}</td>
                            <td>{{$pengajuan->status}}</td>
                            <td>{{$pengajuan->user->kelas->kelas}}</td>
                            <td>{{$pengajuan->user->name}}</td>
                            <td>{{$pengajuan->jurusan->nama}}</td>
                            <td>
                                <a href="/setujui/{{$pengajuan->id}}" class="main-btn">setujui</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
