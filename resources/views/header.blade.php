<header class="header-area">
    <div class="navbar-area">
            <div class="row">
                <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg sticky">
                    <div class="container">
                            <a class="navbar-brand" href="javascript:void(0)">
                                <img src="{{asset('assets/images/logo-2.svg')}}" alt="Logo">
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
                                            @if(Auth::user()->role_id === 2)
                                                <a class="dropdown-item px-3">ajukan perusahaan</a>
                                                <a class="dropdown-item">kirim laporan</a>
                                                <a class="dropdown-item">info prakerin</a>

                                                @else

                                                <a href="/pengajuan" class="dropdown-item px-3">pengajuan</a>
                                                <a href="/perusahaan" class="dropdown-item">perusahaan</a>
                                                <a  class="dropdown-item">jurusan</a>
                                                <a class="dropdown-item" href="/siswa">Daftar siswa</a>
                                                <a class="dropdown-item" href="/siswa/create">Tambahkan siswa</a>
                                            @endif
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