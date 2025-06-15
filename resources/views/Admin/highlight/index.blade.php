@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="fw-bold mb-4">Manajemen Produk Unggulan</h3>

    <a href="{{ route('admin.highlight.create') }}" class="btn btn-success mb-3">Tambah Produk Unggulan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Produk Terkait</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($highlights as $highlight)
                <tr>
                    <td>
                        @if($highlight->image)
                            <img src="{{ asset('storage/' . $highlight->image) }}" width="100">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $highlight->title }}</td>
                    <td>{{ $highlight->description }}</td>
                    <td>{{ $highlight->product->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.highlight.edit', $highlight->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.highlight.destroy', $highlight->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">Belum ada produk unggulan.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
