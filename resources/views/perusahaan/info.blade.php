@extends('base')

@section('content')

    @extends('header')

    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Daftar siswa di perusahaan {{$perusahaans->nama}}</h4>
                    <p>silahkan tandai siswa jurusan {{$jurusan}} yang akan diajukan ke perusahaan | <b>Slot {{$perusahaans->slot}}</b></p>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="main-btn" data-toggle="modal" data-target="#exampleModal">
                    Siswa yang terdaftar
                </button>
            </div>

            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    <form action="/daftarkan/siswa" method="post" id="pilih-siswa">
                        <input type="hidden" name="perusahaan_id" value="{{$perusahaans->id}}">
                        @foreach($siswas as $siswa)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$siswa->jurusan->nama}}</td>
                                <td>{{$siswa->user->name}}</td>
                                <td>{{$siswa->user->kelas ? $siswa->user->kelas->kelas : 'belum ada kelas' }}</td>
                                <td>
                                    @csrf
                                    <div class="form-check">
                                        <input name="pilih[]" class="form-check-input" type="checkbox" value="{{$siswa->id}}" id="defaultCheck1"> 
                                        <label class="form-check-label" for="defaultCheck1">pilih</label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
            <button form="pilih-siswa" class="main-btn mt-2">Daftarkan</button>
        </div>
    </section>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Kelas</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                        @foreach($terdaftar as $data)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$data->siswa->user->name}}</td>
                                <td>{{$data->siswa->jurusan->nama}}</td>
                                <td>{{$data->siswa->user->kelas ? $data->siswa->user->kelas->kelas :  'tidak ada kelas'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
@endsection
