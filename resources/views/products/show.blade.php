@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<style>
    .produk-header-img {
        width: 140px;
        height: 140px;
        object-fit: cover;
        border-radius: 16px;
        border: 6px solid #4B9499;
        background: #fff;
        margin-right: 24px;
    }
    .produk-header-box {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 2px 12px #0001;
        padding: 24px 32px;
        display: flex;
        align-items: flex-start;
        gap: 24px;
    }
    .produk-header-info {
        flex: 1;
    }
    .produk-rating-box, .produk-harga-box {
        display: inline-block;
        padding: 4px 16px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 1.1rem;
        margin-right: 8px;
    }
    .produk-rating-box {
        background: #e3f6f3;
        color: #4B9499;
    }
    .produk-harga-box {
        background: #e3e8f6;
        color: #4B6B99;
    }
    .produk-header-title {
        color: #4B9499;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 8px;
    }
    .produk-header-btns .btn {
        border-radius: 20px;
        min-width: 140px;
        margin-right: 8px;
    }
    .produk-header-btns .btn-success {
        background: #2e8b57;
        border: none;
    }
    .produk-header-btns .btn-info {
        background: #4B9499;
        border: none;
    }
    .produk-header-btns .btn-warning {
        background: #ffc107;
        color: #fff;
        border: none;
    }
    .produk-menu-card {
        border-radius: 12px;
        border: 2px solid #ddd;
        box-shadow: 0 2px 8px #0001;
        margin-bottom: 18px;
        padding: 12px 12px 0 12px;
        background: #fff;
        height: 100%;
    }
    .produk-menu-img {
        width: 100%;
        height: 110px;
        object-fit: contain;
        aspect-ratio: 16/9;
        border-radius: 8px;
        background: #fff;
        margin-bottom: 8px;
        display: block;
    }
    .produk-menu-title {
        font-weight: bold;
        font-size: 1.05rem;
        margin-bottom: 2px;
    }
    .produk-menu-harga {
        color: #198754;
        font-weight: bold;
        font-size: 1.1rem;
    }
    .produk-review-title {
        color: #4B9499;
        font-weight: bold;
        font-size: 1.3rem;
        text-align: center;
        margin: 32px 0 18px 0;
    }
    .produk-review-card {
        border-radius: 12px;
        border: 1.5px solid #e0e0e0;
        background: #fff;
        box-shadow: 0 2px 8px #0001;
        margin-bottom: 18px;
        padding: 16px 18px;
        display: flex;
        gap: 14px;
        align-items: flex-start;
    }
    .produk-review-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        object-fit: cover;
        background: #eee;
    }
    .produk-review-meta {
        font-size: 0.95rem;
        font-weight: bold;
        color: #4B9499;
    }
    .produk-review-badge {
        font-size: 0.85rem;
        color: #888;
        margin-left: 6px;
    }
    .produk-review-rating {
        color: #ffc107;
        font-weight: bold;
        margin-left: 8px;
    }
    .produk-review-footer {
        font-size: 0.85rem;
        color: #888;
        margin-top: 6px;
    }
</style>

<div class="container py-5">
    <div class="produk-header-box mb-4">
        <div>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="produk-header-img">
            @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" class="produk-header-img" alt="Tidak ada gambar">
            @endif
        </div>
        <div class="produk-header-info">
            <div class="produk-header-title">{{ $product->name }}</div>
            <div class="mb-2">
                <span class="produk-rating-box">
                    <i class="bi bi-star-fill"></i> {{ $product->reviews && $product->reviews->isNotEmpty() ? number_format($product->reviews->avg('rating'), 1) : 0 }}
                </span>
                <span class="produk-harga-box">
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
                </span>
            </div>
            @if ($product->shop_description)
                <div class="mb-2 text-muted">{{ $product->shop_description }}</div>
            @endif
            <div class="mb-2">
                <i class="bi bi-geo-alt-fill"></i> {{ $product->description }}
            </div>
            <div class="mb-2 text-success">
                <i class="bi bi-clock-fill"></i> Buka - {{ $product->jam_buka }}
            </div>
            @if ($product->platform)
                <div class="mb-2">
                    <i class="bi bi-bag-fill"></i> Tersedia di {{ $product->platform }}
                </div>
            @endif
            <div class="produk-header-btns mt-2">
                @guest
                    <a href="https://docs.google.com/forms/d/1LV0A_cWE0oCYXO1ig53l40Yjz1zkZgQE1PhBqvD4rgA/edit" target="_blank" class="btn btn-info text-white me-2">Review Toko</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalHubungiToko">Hubungi Toko</button>
                @endguest
                @auth
                    @if(Auth::user()->admin)
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning text-white">Edit Toko</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="fw-bold mb-3" style="color: #4B9499; font-size: 1.15rem;">Daftar Menu</div>
        <div class="row">
            @forelse ($product->menus as $menu)
                <div class="col-md-4 mb-3">
                    <div class="produk-menu-card h-100">
                        @if ($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" class="produk-menu-img" alt="{{ $menu->nama }}">
                        @else
                            <img src="https://via.placeholder.com/120x90?text=No+Image" class="produk-menu-img" alt="Tidak ada gambar">
                        @endif
                        <div class="produk-menu-title">{{ $menu->nama }}</div>
                        <div class="text-muted" style="font-size: 0.95rem;">{{ $menu->deskripsi }}</div>
                        <div class="produk-menu-harga mt-1">Rp {{ number_format($menu->harga) }}</div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada menu makanan untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>

    <div class="produk-review-title" id="ulasan">Review</div>
    <div class="row">
        @if($product->reviews && $product->reviews->isNotEmpty())
            @foreach($product->reviews as $review)
                <div class="col-md-6 col-lg-4">
                    <div class="produk-review-card">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user ? $review->user->name : 'Anonymous') }}&background=4B9499&color=fff&size=64" class="produk-review-avatar" alt="avatar">
                        <div>
                            <div class="produk-review-meta">
                                {{ $review->user ? $review->user->name : 'Anonymous' }}
                                <span class="produk-review-badge">Warga {{ $review->user ? $review->user->role ?? 'UMKM' : 'UMKM' }}</span>
                                <span class="produk-review-rating"><i class="bi bi-star-fill"></i> {{ $review->rating }}</span>
                            </div>
                            <div style="margin: 6px 0 8px 0; font-size: 0.98rem;">{{ $review->comment }}</div>
                            <div class="produk-review-footer d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-clock"></i> {{ $review->created_at->diffForHumans() }}</span>
                                @auth
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ms-2"><i class="bi bi-trash"></i> Hapus</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">Belum ada review untuk produk ini.</p>
        @endif
    </div>
    @auth
        <div class="card mt-4 mb-5" id="form-review">
            <div class="card-body">
                <h5 class="card-title mb-3" style="color:#4B9499;">Tulis Review Anda</h5>
                <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">Komentar</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required>{{ old('comment') }}</textarea>
                        @error('comment')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-select w-auto d-inline-block" required>
                            <option value="">Pilih rating</option>
                            @for($i=5;$i>=1;$i--)
                                <option value="{{ $i }}" {{ old('rating')==$i?'selected':'' }}>{{ $i }} ⭐</option>
                            @endfor
                        </select>
                        @error('rating')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-success px-4">Kirim Review</button>
                </form>
            </div>
        </div>
    @endauth
</div>

<!-- Modal Hubungi Toko -->
<div class="modal fade" id="modalHubungiToko" tabindex="-1" aria-labelledby="modalHubungiTokoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHubungiTokoLabel">Kontak Toko</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="{{ asset('images/kontak_toko.jpg') }}" alt="Kontak Toko" class="img-fluid rounded mb-3" style="max-width:320px;">
        <div class="d-flex justify-content-center">
          <a href="https://chat.whatsapp.com/DJEi1qDmRqfBz4VxVIWsa0" target="_blank" class="btn btn-success" style="min-width:200px; font-size:1.1rem;">
            <i class="bi bi-whatsapp me-2"></i>Chat via WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection







