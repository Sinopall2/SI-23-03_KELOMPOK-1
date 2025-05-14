<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - Jagoan UMKM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 420px;
            margin: auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #2396a6;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 93.5%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background: #2396a6;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 1em;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 14px;
            color: #2396a6;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Registrasi</h2>
    <form method="post" action="#">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email Aktif" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
        <button type="submit">Daftar Sekarang</button>
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>
