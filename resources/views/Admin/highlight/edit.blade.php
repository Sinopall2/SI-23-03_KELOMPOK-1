@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="fw-bold mb-4">Edit Produk Unggulan</h3>

    <form action="{{ route('admin.highlight.update', $highlight->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $highlight->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $highlight->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Pilih Produk Terkait</label>
            <select name="product_id" class="form-select">
                <option value="">-- Tidak dikaitkan --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $highlight->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Sekarang</label><br>
            @if ($highlight->image)
                <img src="{{ asset('storage/' . $highlight->image) }}" width="150" class="mb-2">
            @else
                <p class="text-muted">Belum ada gambar</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.highlight.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
