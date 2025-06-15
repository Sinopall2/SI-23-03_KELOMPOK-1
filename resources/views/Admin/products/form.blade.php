<div class="mb-3">
    <label for="name" class="form-label">Nama Toko</label>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-control" required>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="shop_description" class="form-label">Deskripsi Toko</label>
    <textarea name="shop_description" id="shop_description" class="form-control" rows="2" required>{{ old('shop_description', $product->shop_description ?? '') }}</textarea>
    @error('shop_description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Alamat Toko</label>
    <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="jam_buka" class="form-label">Jam Buka Toko</label>
    <input type="text" name="jam_buka" id="jam_buka" value="{{ old('jam_buka', $product->jam_buka) }}" class="form-control" required>
    @error('jam_buka')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="telepon" class="form-label">No. Telepon/WhatsApp</label>
    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $product->telepon) }}" class="form-control" required>
    @error('telepon')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="platform" class="form-label">Platform Mitra Online</label>
    <input type="text" name="platform" id="platform" value="{{ old('platform', $product->platform) }}" class="form-control">
    @error('platform')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Gambar Toko</label>
    <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Preview Gambar:</label><br>
    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
         class="img-preview img-fluid"
         id="preview"
         style="max-height: 300px; border-radius: 5px;">
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('#preview');

        const reader = new FileReader();
        reader.readAsDataURL(image.files[0]);

        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
