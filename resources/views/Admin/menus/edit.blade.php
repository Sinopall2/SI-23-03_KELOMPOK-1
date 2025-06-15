@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 fw-bold">Edit Menu</h3>

    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $menu->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            @if ($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" class="img-thumbnail mt-2" style="max-height: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Menu</button>
        <a href="{{ route('admin.products.show', $menu->product_id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
