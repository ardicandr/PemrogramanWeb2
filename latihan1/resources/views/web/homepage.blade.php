<x-layout>
  @vite(['resources/css/homepage.css', 'resources/js/homepage.js'])
<div id="preloader">
  <div class="loader">
    <span>L</span><span>O</span><span>A</span><span>D</span><span>I</span><span>N</span><span>G</span><span>.</span><span>.</span><span>.</span>
  </div>
</div>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://media.flixfacts.com/inpage/lenovo/Legion-5-15ACH6H-AG-250N/img/feature-1.jpg" class="d-block w-100 carousel-img" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="https://dlcdnimgs.asus.com/websites/global/productcustomizedTab/1460/images/banner-00.jpg" class="d-block w-100 carousel-img" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="https://i.ytimg.com/vi/kbPbBI4sH5g/maxresdefault.jpg" class="d-block w-100 carousel-img" alt="Slide 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div id="product" class="container py-5">
        <h3 class="text-center mb-5 text-white">categories</h3>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card futuristic-card">
                        <img src="{{ Storage::url($category['image']) }}" class="card-img-top futuristic-img" alt="Gambar kategori {{ $category['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title futuristic-title">{{ $category['name'] }}</h5>
                            <p class="card-text futuristic-description">
                                {{ $category['description'] }}
                            </p>
                            <a href="/category/{{ $category['slug'] }}" class="btn btn-primary futuristic-btn">Detail</a>
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