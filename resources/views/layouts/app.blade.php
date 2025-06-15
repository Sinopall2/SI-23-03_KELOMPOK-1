<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Shop Homepage')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">JAGOAN UMKM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                        @if(Auth::user()->admin)
                            <li class="nav-item">
                                <a class="nav-link text-danger fw-semibold" href="{{ route('admin.products.index') }}">
                                    Admin Panel
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- Login / Logout --}}
                <div class="d-flex align-items-center gap-2">
                    @guest
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLScWHJoajgqmtffNkWv6XgqJ-L7e4WV6v4nbIsSMP0Jdiy0TUQ/viewform?usp=header" target="_blank" class="btn btn-outline-success rounded-pill px-4 py-2 d-flex align-items-center" style="font-weight:600; font-size:1rem;">
                            <i class="bi bi-person-plus-fill me-2"></i> Bergabung Jagoan UMKM
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 ms-2">Login</a>
                    @else
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- Konten Halaman --}}
    <main class="flex-fill py-4 container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-auto text-white" style="background-color: #498F91;">
        <div class="container py-4 d-flex flex-column flex-md-row justify-content-between align-items-start">
            <div class="d-flex align-items-center gap-3 mb-3 mb-md-0">
                <img src="{{ asset('images/logo_desa.png') }}" alt="Logo Desa" style="height: 80px;">
                <div>
                    <h5 class="fw-bold mb-1">Desa Cikasungka</h5>
                    <p class="mb-0">Kecamatan Solear<br>Kabupaten Tangerang, Banten</p>
                </div>
            </div>
            <div class="text-md-end">
                <h6 class="fw-bold">Kontak Desa</h6>
                <p class="mb-1"><i class="bi bi-telephone-fill"></i> 082196403176</p>
                <p class="mb-1"><i class="bi bi-envelope-fill"></i> Cikasungka29@gmail.com</p>
                <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> Jl. Raya Cikuya, Cikasungka</p>
                <p class="mb-0"><i class="bi bi-clock-fill"></i> Jam Operasional: 08.00 – 16.00</p>
            </div>
        </div>
    </footer>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
