<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center mb-4">
        <h2>{{ $product['name'] }}</h2>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <img src="{{ asset('images/tape.jpg') }}" class="img-fluid rounded" alt="Tape Cikasungka">
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr><th>Rasa</th><td>{{ $product['ratings']['rasa'] }}</td></tr>
                <tr><th>Harga</th><td>{{ $product['ratings']['harga'] }}</td></tr>
                <tr><th>Kemasan</th><td>{{ $product['ratings']['kemasan'] }}</td></tr>
                <tr><th>Pelayanan</th><td>{{ $product['ratings']['pelayanan'] }}</td></tr>
            </table>
            <p><strong>Alamat:</strong> {{ $product['location'] }}</p>
            <p><strong>Jam Buka:</strong> {{ $product['open'] }}</p>
            <p><strong>Tersedia di:</strong> {{ implode(', ', $product['platforms']) }}</p>
            <div class="d-flex gap-3">
                <a href="#" class="btn btn-outline-success">Berikan Ulasanmu</a>
                <a href="#" class="btn btn-primary">Pesan Sekarang</a>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Daftar Menu</h4>
    <div class="row">
        @foreach($product['menus'] as $menu)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset('images/' . $menu['image']) }}" class="card-img-top" alt="{{ $menu['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu['name'] }}</h5>
                    <p class="card-text">Rp {{ number_format($menu['price'], 0, ',', '.') }}</p>
                    <a href="#" class="btn btn-outline-secondary btn-sm">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h4 class="mt-5">Review</h4>
    <div class="row">
        @for($i = 0; $i < 6; $i++)
        <div class="col-md-4 mb-3">
            <div class="card p-3 h-100">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('images/user.png') }}" class="rounded-circle me-2" width="40" height="40">
                    <div>
                        <strong>{{ $product['review']['name'] }}</strong><br>
                        <small>{{ $product['review']['wilayah'] }}</small>
                    </div>
                </div>
                <p>{{ $product['review']['text'] }}</p>
                <small class="text-muted">
                    {{ $product['review']['username'] }} • Dilihat {{ $product['review']['views'] }} Kali • ⭐ {{ $product['review']['rating'] }}
                </small>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
</body>
</html>
