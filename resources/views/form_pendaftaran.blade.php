<form method="POST" action="{{ route('pendaftaran.store') }}">
    @csrf
    <div>
        <label for="nama_toko">Nama Toko:</label>
        <input type="text" name="nama_toko" id="nama_toko" value="{{ old('nama_toko') }}" required>
    </div>
    <div>
        <label for="deskripsi_toko">Deskripsi Toko:</label>
        <textarea name="deskripsi_toko" id="deskripsi_toko" required>{{ old('deskripsi_toko') }}</textarea>
    </div>
    <div>
        <label for="kategori_toko">Kategori Toko:</label>
        <input type="text" name="kategori_toko" id="kategori_toko" value="{{ old('kategori_toko') }}" required>
    </div>
    <div>
        <label for="alamat_toko">Alamat Toko:</label>
        <input type="text" name="alamat_toko" id="alamat_toko" value="{{ old('alamat_toko') }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="no_telepon">No Telepon:</label>
        <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon') }}" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>
    <button type="submit">Register</button>
</form>


