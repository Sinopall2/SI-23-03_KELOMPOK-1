<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Produk Desa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #007d9c;
        }
        .navbar a {
            color: white !important;
        }
        footer {
            background-color: #e3f2fd;
            padding: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark px-4">
    <a class="navbar-brand" href="#">Desa Cikasungka</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Profil Desa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Data Desa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Program Desa</a></li>
            <li class="nav-item"><a class="nav-link btn btn-light text-dark ms-3" href="#">Layanan Mandiri</a></li>
        </ul>
    </div>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="mt-5 text-center">
    <div>
        <p class="mb-1"><strong>Desa Cikasungka</strong> - Kecamatan Solear, Kabupaten Tangerang, Provinsi Banten</p>
        <p>Email: <a href="mailto:cikasungka12@gmail.com">cikasungka12@gmail.com</a> | Telp: 081296403215</p>
        <p>Jam Operasional: 08.00 - 16.00</p>
        <small class="text-muted">© 2025 Powered by Yayasan Pendidikan Telkom</small>
    </div>
</footer>

</body>
</html>
