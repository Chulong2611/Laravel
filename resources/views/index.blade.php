@extends('layouts.app')


@section('title', 'Organic shop')

@section('content')
    <!-- banner -->
    <div class="banner swiper">
        <div class="banner-swip swiper-wrapper">
            <div class="banner-slide swiper-slide banner1"><img src="../../storage/app/public/images/banner/banner1.png"
                    width="100%" height="350px">
                <a href=""><button class="btn-banner">Buy now</button></a>
            </div>
            <div class="banner-slide swiper-slide banner2"><img src="../../storage/app/public/images/banner/banner.png"
                    width="100%" height="350px">
                <a href=""><button class="btn-banner btn-banner-2">Buy now</button></a>
            </div>
        </div>
        <div class="swiper-button swiper-button-prev custom-nav"><i class="fa-solid fa-chevron-left"></i></div>
        <div class="swiper-button swiper-button-next custom-nav"><i class="fa-solid fa-chevron-right"></i></div>

    </div>

    <!-- <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-inner">
      
           Slide 1 
          <div class="carousel-item active">
            <img src="../../storage/app/public/images/banner/banner.png" class="d-block w-100" alt="Banner 1">
            <div class="carousel-caption d-none d-md-block text-start">
              <h2 class="text-white fw-bold">Nước ép trái cây tươi</h2>
              <p>Ngon - sạch - không chất bảo quản</p>
              <a href="#" class="btn btn-success">Xem sản phẩm</a>
            </div>
          </div>
      
           Slide 2
          <div class="carousel-item">
            <img src="../../storage/app/public/images/banner/banner1.png" class="d-block w-100" alt="Banner 2">
            <div class="carousel-caption d-none d-md-block text-start">
              <h2 class="text-white fw-bold">Giảm giá lên tới 20%</h2>
              <p>Cho đơn hàng từ 500.000đ</p>
              <a href="#" class="btn btn-outline-light">Khám phá ngay</a>
            </div>
          </div>
      
        </div>
      
        Controls
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
          <i class="fa-solid fa-angle-left fa-2x text-white"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
          <i class="fa-solid fa-angle-right fa-2x text-white"></i>
        </button>
      </div>  -->

      
    
      <!-- categories -->
    <div class="categories content container">
        <div class="tab-header">
            <a href="">
                <h5>Categories <i class="fa-solid fa-arrow-right"></i></h5>
            </a>
            <!-- Navigation buttons -->
            <div class="category-slider-controls">
                <div class="cat-swip cat-btn-prev"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="cat-swip cat-btn-next"><i class="fa-solid fa-chevron-right"></i></div>
            </div>
        </div>
        <!-- các nút danh mục -->
        <div class="cate">
            <div class="category-items">
                <a href="#" class="category-button">abc</a>
                <a href="#" class="category-button">def</a>
                <a href="#" class="category-button">ghi</a>
                <a href="#" class="category-button">jkl</a>
                <a href="#" class="category-button">mno</a>
                <a href="#" class="category-button">pqr</a>
                <a href="#" class="category-button">stu</a>
                <a href="#" class="category-button">vwx</a>
            </div>
        </div>
    </div>

    

    <!-- danh muc san pham -->
    <!--fruit juice-->
    <div class="cate-products content container juice">
        <div class="tab-header">
            <h5>Organic Fresh Fruit Juice</h5>
        </div>

        <div id="vegeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Cam tươi, táo hữu cơ - Aloha</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Cần Tây, Thơm, Táo - Sweet...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép ổi, củ dền, táo hữu cơ...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép ổi, táo, chanh, bạc hà...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Thơm, gừng, bạc hà hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép cam + cà rốt + gừng hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="juice7.png" class="img-fluid" style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép dứa, chanh, bạc hà tươi</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="juice8.png" class="img-fluid" style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép táo đỏ, củ dền hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation -->
            <button class="carousel-control-prev" type="button" data-bs-target="#vegeCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left text-dark"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#vegeCarousel" data-bs-slide="next">
                <i class="fa-solid fa-angle-right text-dark"></i>
            </button>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-success">View all <i class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>

    <!--vegestable-->
    <div class="cate-products content container vegetable">
        <div class="tab-header">
            <h5>Organic Vegetables</h5>
        </div>

        <div id="juiceCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Cam tươi, táo hữu cơ - Aloha</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Cần Tây, Thơm, Táo - Sweet...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép ổi, củ dền, táo hữu cơ...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép ổi, táo, chanh, bạc hà...</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép Thơm, gừng, bạc hà hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="../../storage/app/public/images/products/nuoc-ep-cam-2.webp" class="img-fluid"
                                style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép cam + cà rốt + gừng hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="juice7.png" class="img-fluid" style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép dứa, chanh, bạc hà tươi</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                        <div class="col-md-3">
                            <img src="juice8.png" class="img-fluid" style="max-height: 250px;" alt="">
                            <p class="mt-2 mb-1">Nước ép táo đỏ, củ dền hữu cơ</p>
                            <strong class="text-success">85,000₫</strong>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Navigation -->
            <button class="carousel-control-prev" type="button" data-bs-target="#juiceCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-angle-left text-dark"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#juiceCarousel" data-bs-slide="next">
                <i class="fa-solid fa-angle-right text-dark"></i>
            </button>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-3">
            <a href="#" class="btn btn-outline-success">View all <i class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@endsection