<!DOCTYPE html> 
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Diagnosa Penyakit')</title>
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles') 
</head>

<body class="d-flex flex-column min-vh-100"> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">BACKWARD CHAINING DIAGNOSA PENYAKIT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('penyakit.index') }}">Penyakit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gejala.index') }}">Gejala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aturan.index') }}">Aturan</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat.index') }}">Riwayat Diagnosa</a>
                        </li> --}}
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diagnosa.index') }}">Diagnosa</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 flex-grow-1"> 
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif
        @yield('content')
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mt-5">
            <!-- Konten lainnya -->
        </div>

    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 System Backward Chaining Kelompok II</p>
    </footer>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    @stack('scripts') 
</body>

</html>
