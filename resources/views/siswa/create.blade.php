@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Tambahkan Siswa</h4>
                </div>
                <!-- <a href="/admin/perusahaans" class="main-btn">management perusahaan</a> -->
            </div>
            <form action="/siswa" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" id="kelas" name="jurusan_id">
                        @foreach($jurusan as $data)
                            <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas_id">
                        @foreach($kelas as $data)
                            <option value="{{$data->id}}">{{$data->kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="main-btn">create siswa</button>
            </form>
        </div>
    </section>
@endsection
