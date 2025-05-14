<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Jagoan UMKM</title>
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
        input[type="text"], input[type="email"] {
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
    <h2>Lupa Password</h2>
    <form action="#" method="post">
        <input type="email" name="email" placeholder="Masukkan Email Anda" required>
        <button type="submit">Kirim Permintaan Reset</button>
    </form>
    <a href="login.php">Kembali ke Login</a>
</div>

</body>
</html>
