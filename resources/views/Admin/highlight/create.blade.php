@extends('layouts.app')

@section('title', 'Tambah Produk Unggulan')

@section('content')
<div class="container mt-5">
    <h3 class="fw-bold mb-4">Tambah Produk Unggulan</h3>

    <form action="{{ route('admin.highlight.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-white">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control" placeholder="Contoh: Tape Legend Khas Cikasungka" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Tuliskan deskripsi singkat produk unggulan di sini..."></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-semibold">Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-4">
            <label for="product_id" class="form-label fw-semibold">Pilih Produk (Opsional)</label>
            <select name="product_id" class="form-select">
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.highlight.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
