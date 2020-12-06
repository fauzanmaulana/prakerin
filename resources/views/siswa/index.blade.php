@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Daftar Siswa</h4>
                    <p>yang akan di ajukan untuk prakerin</p>
                </div>
                <a href="/admin/perusahaans" class="main-btn">management siswa</a>
            </div>
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Kemampuan</th>
                        <th scope="col">CV</th>
                        <th scope="col">prtofolio</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($siswas as $siswa)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$siswa->user->name}}</td>
                            <td>{{$siswa->jurusan->nama}}</td>
                            <td>{{$siswa->user->kelas ? $siswa->user->kelas->kelas : 'belum ada kelas'}}</td>
                            <td>{{$siswa->depelover}}</td>
                            <td>{{$siswa->cv}}</td>
                            <td>{{$siswa->portofolio}}</td>
                            <td>{{$siswa->status}}</td>
                            <td>
                                <a href="{{ route('siswa.show', $siswa->id) }}" class="main-btn">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
