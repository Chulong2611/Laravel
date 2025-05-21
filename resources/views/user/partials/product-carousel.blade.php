<!--
 <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($products->chunk(4) as $chunkIndex => $chunk)
      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
        <div class="row">
          @foreach($chunk as $product)
            <div class="col-md-3">
              <div class="card">
              <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
              <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ number_format($product->price) }} VNĐ</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
-->

<!--
<div class="cate-products content container juice">
  <div class="tab-header">
    <h5>Organic Fresh Fruit Juice</h5>
  </div>


  <div id="fruitJuiceCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="d-flex align-items-center justify-content-between">
          <button class="btn btn-light me-2" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-angle-left text-dark fs-4"></i>
          </button>
          <div class="row w-100">
            @foreach($products->slice(0, 4) as $product)
            <div class="col-md-3 text-center">
              <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 250px;" alt="{{ $product->name }}">
              <p class="mt-2 mb-1">{{ $product->name }}</p>
              <strong class="text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>
            </div>
            @endforeach
          </div>
          <button class="btn btn-light ms-2" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="next">
            <i class="fa-solid fa-angle-right text-dark fs-4"></i>
          </button>
        </div>
      </div>

      <div class="carousel-item">
        <div class="d-flex align-items-center justify-content-between">
          <button class="btn btn-light me-2" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-angle-left text-dark fs-4"></i>
          </button>
          <div class="row w-100">
            @foreach($products->slice(4, 4) as $product)
            <div class="col-md-3 text-center">
              <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 250px;" alt="{{ $product->name }}">
              <p class="mt-2 mb-1">{{ $product->name }}</p>
              <strong class="text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>
            </div>
            @endforeach
          </div>
          <button class="btn btn-light ms-2" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="next">
            <i class="fa-solid fa-angle-right text-dark fs-4"></i>
          </button>
        </div>
      </div>

      <div class="text-center mt-3">
        <a href="#" class="btn btn-outline-success">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div> -->

<!--
<div class="cate-products content container juice">
  <div class="tab-header mb-3">
    <h5>Organic Fresh Fruit Juice</h5>
  </div>

  <div class="juice-carousel">
    @foreach($products as $product)
      <div class="text-center card px-3">
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 250px;" alt="{{ $product->name }}">
        <p class="mt-2 mb-1">{{ $product->name }}</p>
        <strong class="text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>
      </div>
    @endforeach
  </div>

  <div class="text-center mt-3">
    <a href="#" class="btn btn-outline-success">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
  </div>
</div>

@push('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  
@endpush

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.juice-carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        prevArrow: '<button class="slick-prev btn btn-light"><i class="fa-solid fa-angle-left text-dark fs-4"></i></button>',
        nextArrow: '<button class="slick-next btn btn-light"><i class="fa-solid fa-angle-right text-dark fs-4"></i></button>',
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    });
  </script>
@endpush
        -->

<section class="py-5 overflow-hidden">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">

        <div class="section-header d-flex flex-wrap justify-content-between my-5">

          <h2 class="section-title">Best selling products</h2>

          <div class="d-flex align-items-center">
            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
            <div class="swiper-buttons">
              <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
              <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="products-carousel swiper">
          <div class="swiper-wrapper">
          @foreach($products as $product)
            <div class="product-item card swiper-slide">
              <form method="POST" action="{{ route('user.favorites.add', $product->id) }}">
    @csrf
              <button type="submit" class="btn-wishlist text-decoration-none"><i class="fa-solid fa-heart"></i></button>
              </form>
              <figure>
                <a href="index.html" title="Product Title">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 250px;" alt="{{ $product->name }}">
                </a>
              </figure>
              <h3>{{ $product->name }}</h3>
              <strong class="price text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>              
              <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-primary mt-auto"><i class="fas fa-shopping-cart"></i> Add to Cart
    </button>
</form>
            </div>
          @endforeach          
          </div>
        </div>
        <!-- / products-carousel -->

      </div>
    </div>
  </div>
</section>
