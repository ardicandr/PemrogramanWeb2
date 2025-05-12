<x-layout>
  @vite(['resources/css/homepage.css', 'resources/js/homepage.js'])
  <div id="preloader">
    <div class="loader">
      <span>L</span><span>O</span><span>A</span><span>D</span><span>I</span><span>N</span><span>G</span><span>.</span><span>.</span><span>.</span>
    </div>
  </div>

  <div class="container py-5">
    <h3 class="text-center mb-5 text-white">Detail Product</h3>
    
    <div id="product" class="row">
      @foreach ($products as $product)
        <div class="col-md-4 mb-4">
          <div class="card futuristic-card h-100">
            <img src="{{ ($product->image_url) }}" alt="{{ $product->name }}" class="futuristic-img h-100 w-100 object-cover rounded">
            <div class="card-body">
              <h5 class="card-title futuristic-title">{{ $product->name }}</h5>
              <p class="card-text futuristic-description">{{ $product->description }}</p>
              <p class="card-text text-white"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <button id="back-to-top" class="back-to-top-btn">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>

</x-layout>
