<x-layouts.app title="Tambah Produk">
    @vite(['resources/css/dashboard_products.css'])
    <div class="p-4">
        <flux:heading size="xl">Tambah Produk</flux:heading>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <flux:label for="category_id">Kategori</flux:label>
                <select name="category_id" id="category_id" class="mt-1 block w-full border rounded px-3 py-2" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <flux:label for="name">Nama Produk</flux:label>
                <flux:input type="text" name="name" id="name" value="{{ old('name') }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="slug">Slug</flux:label>
                <flux:input type="text" name="slug" id="slug" value="{{ old('slug') }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="description">Deskripsi</flux:label>
                <textarea name="description" id="description" class="mt-1 block w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <flux:label for="sku">SKU</flux:label>
                <flux:input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" value="{{ old('sku') }}"/>
            @error('sku')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-4">
                <flux:label for="price">Harga</flux:label>
                <flux:input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="stock">Stok</flux:label>
                <flux:input type="number" name="stock" id="stock" value="{{ old('stock') }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="image_url">Gambar Produk</flux:label>
                <div class="flex items-center">
                    <input type="file" name="image_url" id="image_url" class="hidden">
                    <button type="button" class="bg-gray-200 text-gray-600 px-4 py-2 rounded" onclick="document.getElementById('image_url').click()">Choose file</button>
                    <span id="image_name" class="ml-2 text-sm text-gray-600"></span>
                </div>
                <script>
                    document.getElementById('image_url').addEventListener('change', function(e) {
                        document.getElementById('image_name').innerText = e.target.files[0].name;
                    });
                </script>
            </div>
            <div class="mb-4">
                <flux:label for="is_active">Status</flux:label>
                <select name="is_active" id="is_active" class="mt-1 block w-full border rounded px-3 py-2" required>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-600 px-4 py-2 rounded">Kembali</a>
        </form>
    </div>
</x-layouts.app>