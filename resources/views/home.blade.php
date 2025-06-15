@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Header -->
<div class="py-5" style="background-image: url('{{ asset('images/foto_desa2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Desa Cikasungka</h1>
            <p class="lead fw-normal text-white-bolder mb-0">Kec. Solear Kab Tangerang, Prov Banten</p>
        </div>
    </div>
</div>

<style>
    .highlight-carousel-img {
        width: 100%;
        height: 260px;
        object-fit: contain;
        aspect-ratio: 4/3;
        border-radius: 20px 0 0 20px;
        background: #fff;
        display: block;
    }
    @media (max-width: 768px) {
        .highlight-carousel-img {
            height: 140px;
            border-radius: 20px 20px 0 0;
        }
    }
</style>

<!-- Highlight UMKM Unggulan -->
@if ($highlights && count($highlights) > 0)
<section class="py-5">
    <div class="container">
        <div id="highlightCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
            <div class="carousel-inner">
                @foreach ($highlights as $i => $highlight)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-6">
                                <img src="{{ $highlight->image ? asset('storage/' . $highlight->image) : 'https://dummyimage.com/600x400/dee2e6/6c757d.jpg' }}" class="img-fluid highlight-carousel-img" alt="Produk Unggulan">
                            </div>
                            <div class="col-md-6 text-white bg-dark p-4" style="border-radius: 0 20px 20px 0;">
                                <h1 class="fw-bold">{{ strtoupper($highlight->title) }}</h1>
                                <p>{{ $highlight->description }}</p>
                                @if ($highlight->product_id)
                                    <a href="{{ route('products.show', $highlight->product_id) }}" class="btn btn-light">Lihat Produk</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#highlightCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#highlightCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endif

<!-- Judul UMKM -->
<section class="text-center mt-5">
    <h2 class="fw-bold" style="color: #4B9499;">JAGOAN UMKM</h2>
</section>

<!-- Produk -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        @auth
            @if(auth()->user()->admin)
                <div class="text-end mb-4">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success">+ Tambah Toko</a>
                </div>
            @endif
        @endauth

        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top"
                             style="height: 200px; object-fit: cover; width: 100%;"
                             src="{{ $product->image ? asset('storage/' . $product->image) : 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' }}"
                             alt="{{ $product->name }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <div class="d-flex justify-content-center align-items-center gap-2 mt-2">
                                    <span class="badge bg-warning text-dark"><i class="bi bi-star-fill"></i> {{ $product->reviews && $product->reviews->isNotEmpty() ? number_format($product->reviews->avg('rating'), 1) : 0 }}</span>
                                    <span class="badge bg-light text-dark"><i class="bi bi-eye"></i> Dilihat {{ $product->view_count }} kali</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('products.show', $product->id) }}">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
