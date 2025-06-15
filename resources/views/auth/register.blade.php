<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Jagoan UMKM Desa Cikasungka</title>
    <style>
        /* Global */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #000;
        }

        /* Wrapper */
        .register-wrapper {
            display: flex;
            height: 100vh;
        }

        /* Left Panel */
        .register-left {
            background: #2396a6;
            color: #fff;
            width: 45%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .register-left img {
            width: 120px;
            margin-bottom: 25px;
        }

        .register-left h1 {
            font-size: 2em;
            margin: 0 0 10px 0;
            font-weight: bold;
        }

        .register-left h2 {
            font-size: 1.3em;
            margin: 0 0 20px 0;
            font-weight: normal;
        }

        .register-left p {
            margin: 4px 0;
            font-size: 1em;
        }

        .register-left small {
            display: block;
            margin-top: 30px;
            color: #e0e0e0;
            font-size: 0.9em;
        }

        /* Right Panel */
        .register-right {
            background: #fff;
            width: 55%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        /* Form */
        .register-form {
            width: 100%;
            max-width: 380px;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            background: #f3f3f3;
            box-sizing: border-box;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 8px;
        }

        /* Button and Links */
        .btn-outline {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 14px;
            border: 1px solid #2396a6;
            border-radius: 8px;
            background: #fff;
            color: #2396a6;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        .btn-outline:hover {
            background: #2396a6;
            color: #fff;
        }

        .register-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95em;
            color: #666;
        }

        .link-register {
            color: #2396a6;
            text-decoration: underline;
            font-weight: bold;
        }

        .link-register:hover {
            color: #1c7d89;
        }

        .alert {
            padding: 12px;
            margin-bottom: 18px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .register-wrapper {
                flex-direction: column;
            }
            .register-left, .register-right {
                width: 100%;
                min-height: 50vh;
            }
        }
    </style>
</head>

<body>
<div class="register-wrapper">
    <div class="register-left">
        <img src="{{ asset('images/logo_desa.png') }}" alt="Logo Desa" />
        <h1>JAGOAN UMKM</h1>
        <h2>DESA CIKASUNGKA</h2>
        <p>Kecamatan Solear</p>
        <p>Kabupaten Tangerang</p>
        <p>Jl. Raya Cikuya - Desa Cikasungka</p>
        <p>Kodepos 15730</p>
        <small>Untuk informasi perihal PIN silahkan menghubungi pihak sekretariat desa</small>
    </div>

    <div class="register-right">
        <form class="register-form" action="{{ route('register') }}" method="POST" autocomplete="off">
            @csrf
            
            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <input type="text" name="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <div class="checkbox-group">
                <input type="checkbox" id="showPassword" onclick="togglePassword()" />
                <label for="showPassword">Tampilkan Password</label>
            </div>

            <button type="submit" class="btn-outline">Daftar</button>
            <p class="register-text">Sudah punya akun? <a href="{{ route('login') }}" class="link-register">Login</a></p>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    var passwordInput = document.querySelector('input[name="password"]');
    var confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
    
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    confirmPasswordInput.type = confirmPasswordInput.type === "password" ? "text" : "password";
}
</script>

</body>
</html>