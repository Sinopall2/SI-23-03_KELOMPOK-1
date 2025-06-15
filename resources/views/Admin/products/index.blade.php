@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h2 class="fw-bold mb-0"><i class="bi bi-shop-window me-2"></i>Manajemen Toko UMKM</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill px-4 py-2 d-flex align-items-center"><i class="bi bi-plus-circle me-2"></i>Tambah Toko</a>
            <a href="{{ route('admin.highlight.index') }}" class="btn btn-outline-success rounded-pill px-4 py-2 d-flex align-items-center"><i class="bi bi-star-fill me-2"></i>Kelola Highlight</a>
        </div>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi Toko</th>
                            <th>Gambar</th>
                            <th>Rating</th>
                            <th>Views</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>
                                <a href="{{ route('admin.products.show', $product) }}" class="fw-bold text-decoration-none text-primary d-flex align-items-center gap-2 nama-toko-link">
                                    <i class="bi bi-shop me-1 text-success"></i>
                                    <span class="nama-toko-text">{{ $product->name }}</span>
                                    @if($product->platform)
                                        <span class="badge bg-info text-dark ms-1">{{ $product->platform }}</span>
                                    @endif
                                </a>
                            </td>
                            <td>{{ $product->shop_description }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="48" class="img-thumbnail rounded-circle border-2" style="object-fit:cover; height:48px;">
                                @else
                                    <span class="badge bg-secondary">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark"><i class="bi bi-star-fill"></i> {{ $product->reviews && $product->reviews->isNotEmpty() ? number_format($product->reviews->avg('rating'), 1) : 0 }}</span>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark"><i class="bi bi-eye"></i> {{ $product->view_count }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil-square"></i> Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus toko ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
.table thead th { vertical-align: middle; }
.table tbody tr:hover { background: #f0f8ff; transition: background 0.2s; }
.card { border-radius: 18px; }
.btn { font-weight: 500; }
.nama-toko-link:hover .nama-toko-text { text-decoration: underline; color: #198754 !important; }
.nama-toko-link .bi-shop { font-size: 1.2rem; }
</style>
@endsection
