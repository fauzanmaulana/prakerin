@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Daftar Perusahaan</h4>
                    <p>yang akan di ajukan untuk prakerin</p>
                </div>
                <div class="action-button">
                <div class="row">
                    <div class="col">
                        <form action="/cari/perusahaan" method="POST" class="d-flex">
                        @csrf
                            <div class="form-group">
                                <select class="form-control" id="temaop" name="jurusan_id">
                                    <option value="">semua jurusan</option>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{$jurusan->id}}">{{$jurusan->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary ml-2">cari</button>
                        </form>
                    </div>
                </div>
                </div>
                <a href="/admin/perusahaans" class="main-btn">management perusahaan</a>
            </div>
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Slot</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($perusahaans as $perusahaan)
                        @if (!session('jurusan_id'))
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$perusahaan->jurusan ? $perusahaan->jurusan->nama : 'jurusan'}}</td>
                            <td>{{$perusahaan->nama}}</td>
                            <td>{{$perusahaan->alamat}}</td>
                            <td>{{$perusahaan->deskripsi}}</td>
                            <td>{{$perusahaan->slot}}</td>
                            <td>{{$perusahaan->status}}</td>
                            <td>
                                <a href="{{ route('perusahaan.show', $perusahaan->id) }}" class="main-btn">Atur Pengajuan</a>
                            </td>
                        </tr>
                        @elseif($perusahaan->jurusan_id == session('jurusan_id'))
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$perusahaan->jurusan->nama}}</td>
                                <td>{{$perusahaan->nama}}</td>
                                <td>{{$perusahaan->alamat}}</td>
                                <td>{{$perusahaan->deskripsi}}</td>
                                <td>{{$perusahaan->slot}}</td>
                                <td>{{$perusahaan->status}}</td>
                                <td>
                                    <a href="{{ route('perusahaan.show', $perusahaan->id) }}" class="main-btn">Atur Pengajuan</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
