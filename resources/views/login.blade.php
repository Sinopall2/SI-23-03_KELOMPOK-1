<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jagoan UMKM Desa Cikasungka</title>
    <style>
    /* Global */
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background: #000;
    }

    /* Wrapper */
    .login-wrapper {
        display: flex;
        height: 100vh;
    }

    /* Left Panel */
    .login-left {
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

    .login-left img {
        width: 120px;
        margin-bottom: 25px;
    }

    .login-left h1 {
        font-size: 2em;
        margin: 0 0 10px 0;
        font-weight: bold;
    }

    .login-left h2 {
        font-size: 1.3em;
        margin: 0 0 20px 0;
        font-weight: normal;
    }

    .login-left p {
        margin: 4px 0;
        font-size: 1em;
    }

    .login-left small {
        display: block;
        margin-top: 30px;
        color: #e0e0e0;
        font-size: 0.9em;
    }

    /* Right Panel */
    .login-right {
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
    .login-form {
        width: 100%;
        max-width: 380px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1em;
        background: #f3f3f3;
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
        width: 106.6%;
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

    /* Responsive */
    @media (max-width: 900px) {
        .login-wrapper {
            flex-direction: column;
        }
        .login-left, .login-right {
            width: 100%;
            min-height: 50vh;
        }
    }
    </style>
</head>

<body>
<div class="login-wrapper">
    <div class="login-left">
        <img src="IMG/logo desan 1.png" alt="Logo Desa">
        <h1>JAGOAN UMKM</h1>
        <h2>DESA CIKASUNGKA</h2>
        <p>Kecamatan Solear</p>
        <p>Kabupaten Tangerang</p>
        <p>Jl. Raya Cikuya - Desa Cikasungka</p>
        <p>Kodepos 15730</p>
        <small>Untuk informasi perihal PIN silahkan menghubungi pihak sekretariat desa</small>
    </div>

    <div class="login-right">
        <form class="login-form" action="dashboard">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <div class="checkbox-group">
                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                <label for="showPassword">Tampilkan Password</label>
            </div>
            <button type="submit" class="btn-outline">Masuk</button>
            <button <a href="lupa_password.php" class="btn-outline">Lupa Password</a></button> 
            <p class="register-text">Belum punya? <a href="registrasi.php" class="link-register">Registrasi</a></p>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    var passwordInput = document.querySelector('input[name="password"]');
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
}
</script>

</body>
</html>


