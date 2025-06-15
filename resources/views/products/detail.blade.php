@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- Informasi Toko --}}
    <div class="row g-4">
        <div class="col-md-4">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Toko" class="img-fluid rounded" style="border: 5px solid #339999;">
            @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" class="img-fluid rounded" alt="Tidak ada gambar">
            @endif
        </div>

        <div class="col-md-8">
            <h3 class="fw-bold text-success">{{ $product->name }}</h3>

            <div class="d-flex gap-4 mb-2">
                <div>
                    <div class="fw-bold text-primary">Rasa</div>
                    <div>–</div>
                </div>
                <div>
                    <div class="fw-bold text-primary">Harga</div>
                    <div>
                        @php
                            $min = $product->menus->min('harga');
                            $max = $product->menus->max('harga');
                        @endphp
                        @if($min && $max && $min != $max)
                            Rp {{ number_format($min) }} - Rp {{ number_format($max) }}
                        @elseif($min)
                            Rp {{ number_format($min) }}
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>

            <p><i class="bi bi-geo-alt-fill text-danger"></i> {{ $product->description }}</p>
            <p><i class="bi bi-clock-fill text-success"></i> Buka - {{ $product->jam_buka }}</p>

            @if ($product->platform)
                <p><i class="bi bi-shop-window text-dark"></i> Tersedia di {{ $product->platform }}</p>
            @endif

            <div class="mt-3">
                <a href="#" class="btn btn-info text-white">Pesan Sekarang</a>
                <a href="#" class="btn btn-outline-success">Berikan Ulasanmu</a>
            </div>
        </div>
    </div>

    {{-- DAFTAR MENU --}}
    <hr class="my-4">
    <h4 class="fw-bold text-success">Daftar Menu</h4>

    <div class="row mt-3">
        @forelse ($product->menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $menu->nama }}</h5>
                        <p class="card-text text-muted">{{ $menu->deskripsi }}</p>
                        <p class="fw-bold">Rp {{ number_format($menu->harga) }}</p>
                        @if ($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" class="img-fluid rounded mt-2" style="max-height:150px;">
                        @else
                            <p class="text-muted">Tidak ada gambar</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada produk/menu untuk toko ini.</p>
        @endforelse
    </div>
</div>
@endsection
