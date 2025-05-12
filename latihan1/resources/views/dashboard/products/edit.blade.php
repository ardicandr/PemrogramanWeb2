<x-layouts.app title="Edit Produk">
    @vite(['resources/css/dashboard_products.css'])
    <div class="p-4">
        <flux:heading size="xl">Edit Produk</flux:heading>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <flux:label for="category_id">Kategori</flux:label>
                <select name="category_id" id="category_id" class="mt-1 block w-full border rounded px-3 py-2" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <flux:label for="name">Nama Produk</flux:label>
                <flux:input type="text" name="name" id="name" value="{{ $product->name }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="slug">Slug</flux:label>
                <flux:input type="text" name="slug" id="slug" value="{{ $product->slug }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="description">Deskripsi</flux:label>
                <textarea name="description" id="description" class="mt-1 block w-full border rounded px-3 py-2" rows="4">{{ $product->description }}</textarea>
            </div>
            <div class="mb-4">
                <flux:label for="sku">SKU</flux:label>
                <flux:input type="text" name="sku" id="sku" value="{{ $product->sku }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="price">Harga</flux:label>
                <flux:input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="stock">Stok</flux:label>
                <flux:input type="number" name="stock" id="stock" value="{{ $product->stock }}" required />
            </div>
            <div class="mb-4">
                <flux:label for="image_url">Gambar Produk</flux:label>
                <div class="flex items-center">
                    <input type="file" name="image_url" id="image_url" class="hidden">
                    <button type="button" class="bg-gray-200 text-gray-600 px-4 py-2 rounded" onclick="document.getElementById('image_url').click()">Choose Image</button>
                    <span id="image_name" class="ml-2 text-sm text-gray-600">
                        @if($product->image_url)
                            {{ basename($product->image_url) }}
                        @else
                            Tidak ada gambar
                        @endif
                    </span>
                </div>
                @if($product->image_url)
                    <img src="{{ asset('storage/'.$product->image_url) }}" alt="Product Image" class="mt-2 w-32">
                @endif
                <script>
                    document.getElementById('image_url').addEventListener('change', function(e) {
                        document.getElementById('image_name').innerText = e.target.files[0].name;
                    });
                </script>
            </div>
            <div class="mb-4">
                <flux:label for="is_active">Status</flux:label>
                <select name="is_active" id="is_active" class="mt-1 block w-full border rounded px-3 py-2" required>
                    <option value="1" {{ $product->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $product->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('products.index') }}" class="bg-gray-200 text-gray-600 px-4 py-2 rounded">Kembali</a>
        </form>
    </div>
</x-layouts.app>