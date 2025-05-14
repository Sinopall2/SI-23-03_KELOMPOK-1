<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard UMKM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        h1 {
            margin: 0;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            color: white;
            cursor: pointer;
        }
        .add-button {
            background-color: teal;
        }
        .add-button:hover {
            background-color: darkcyan;
        }
        .logout-button {
            background-color: crimson;
        }
        .logout-button:hover {
            background-color: darkred;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard UMKM</h1>
    <a href="{{ route('logout') }}" class="btn logout-button">Logout</a>
</header>

<a href="{{ route('pendaftaran.form') }}" class="btn add-button" style="margin-bottom: 20px; display: inline-block;">+ Daftar UMKM Baru</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Toko</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($umkm as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama_toko }}</td>
                <td>{{ $data->deskripsi_toko }}</td>
                <td>{{ $data->kategori_toko }}</td>
                <td>{{ $data->alamat_toko }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>
                    <a href="{{ route('message.edit', $data->id) }}">Edit</a> |
                    <form action="{{ route('message.destroy', $data->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center;">Belum ada data UMKM.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
