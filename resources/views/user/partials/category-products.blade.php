

@foreach($cateProducts as $category)
<section class="py-5 overflow-hidden">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="section-header d-flex flex-wrap justify-content-between my-5">

          <h2 class="section-title">{{$category->name}}</h2>

          <div class="d-flex align-items-center">
            <a href="{{ route('category.show', $category->id) }}" class="btn-link text-decoration-none">View All Products →</a>
            <div class="swiper-buttons">
              <button class="swiper-prev products-{{$category->id}}-carousel-prev btn btn-primary">❮</button>
              <button class="swiper-next products-{{$category->id}}-carousel-next btn btn-primary">❯</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class=" products-{{$category->id}}-carousel swiper" >
          <div class="swiper-wrapper">
            @foreach($category->products as $product)
            <div class="product-item card swiper-slide h-100 position-relative" style="min-height: 350px; max-height: 350px">
              <a href="{{ route('product.show', $product->id) }}" class="stretched-link"></a>

              <!-- Nút yêu thích -->
              <form method="POST" action="{{ route('user.favourites.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn-wishlist text-decoration-none" style="z-index: 10;"><i class="fa-solid fa-heart"></i></button>
                        </form>


              <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 150px; min-height: 150px;" alt="{{ $product->name }}">
              <div class="card-body d-flex flex-column position-absolute">
                <h5 class="card-title mt-1">{{ $product->name }}</h5>
                <p class="card-text text-success fw-bold">{{ number_format($product->price, 0, ',', '.') }}₫</p>

                <div class="mt-auto" style="z-index: 10">
                  <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-success btn-sm w-100">
                      <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                    </button>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- / products-carousel -->

      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
     $(document).ready(function() {
        var cate_products_swiper = new Swiper(".products-{{$category->id}}-carousel", {
      slidesPerView: 5,
      spaceBetween: 30,
      speed: 500,
      navigation: {
        nextEl: ".products-{{$category->id}}-carousel-next",
        prevEl: ".products-{{$category->id}}-carousel-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        991: {
          slidesPerView: 4,
        },
        1500: {
          slidesPerView: 6,
        },
      }
    });
  });
</script>
@endpush
@endforeach




