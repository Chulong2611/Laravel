<!-- <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
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
</div> -->

<div class="cate-products content container mb-5">
    <div class="tab-header mb-3">
        <h5>Organic Fresh Fruit Juice</h5>
    </div>

    <div id="fruitJuiceCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="row">
                    @foreach($products->slice(0, 4) as $product)
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 250px;" alt="{{ $product->name }}">
                            <p class="mt-2 mb-1">{{ $product->name }}</p>
                            <strong class="text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="row">
                    @foreach($products->slice(4, 4) as $product)
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="max-height: 250px;" alt="{{ $product->name }}">
                            <p class="mt-2 mb-1">{{ $product->name }}</p>
                            <strong class="text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Nút điều hướng nằm bên ngoài không che -->
        <div class="d-flex justify-content-between mt-2">
            <button class="btn btn-outline-dark" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left"></i>
            </button>
            <button class="btn btn-outline-dark" type="button" data-bs-target="#fruitJuiceCarousel" data-bs-slide="next">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>
    </div>

    <div class="text-center mt-3">
        <a href="#" class="btn btn-outline-success">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
    </div>
</div>

