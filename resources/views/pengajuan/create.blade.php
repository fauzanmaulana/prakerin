@extends('base')

@section('content')
    <header class="header-area">
        <div class="navbar-area">
                <div class="row">
                    <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg sticky">
                        <div class="container">
                                <a class="navbar-brand" href="javascript:void(0)">
                                    <img src="assets/images/logo-2.svg" alt="Logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                </div> <!-- navbar collapse -->
                                
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                @if(Auth::user()->role_id === 2)
                                                    {{ Auth::user()->name }}
                                                    @else
                                                    Guru
                                                @endif
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                        </div>
                            </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
        </div> <!-- navbar area -->
    </header>

    <section id="features" class="services-area pt-120">
        <div class="container">
            @if(\Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    <li>{!! \Session::get('msg') !!}</li>
                </div>
            @endif
            <div class="header my-4 d-flex justify-content-between">
                <div class="title">
                    <h4>Ajukan</h4>
                </div>
                <!-- <a href="/admin/perusahaans" class="main-btn">management perusahaan</a> -->
            </div>
            <form action="/lakukan/ajuan" method="POST">
                @csrf
                <div class="form-group">
                    <label for="jurusan">untuk jurusan</label>
                    <select name="jurusan_id" id="jurusan" class="form-control">
                    @foreach($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->nama}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">nama perusahaan</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea class="form-control" name="alamat" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="deskripsi">deskripsi perusahaan</label>
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="slot">slot perusahaan</label>
                    <input type="number" class="form-control" name="slot">
                </div>
                <div class="form-group">
                    <label for="kontak">kotak perusahaan untuk kami hubungi</label>
                    <input type="text" class="form-control" name="kontak">
                </div>
                <button class="main-btn">kirim ajuan</button>
            </form>
        </div>
    </section>
@endsection
