@extends('user.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Sản phẩm yêu thích</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="products-carousel swiper">
            <div class="swiper-wrapper">
                @forelse($favorites as $product)
                <div class="col-md-3">
                    <div class="product-item card swiper-slide h-100  position-relative">
                        <a href="{{ route('product.show', $product->id) }}" class="stretched-link"></a>
                        <form method="POST" action="{{ route('user.favorites.remove', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn-wishlist text-decoration-none" style="z-index: 10;"><i class="fa-solid fa-heart"></i></button>
                        </form>
                        <img src="{{ asset('storage/' . $product->product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 150px;min-height: 150px;" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->product->name }}</h5>
                            <p class="card-text text-success fw-bold">{{ number_format($product->product->price, 0, ',', '.') }}₫</p>

                            <div class="mt-auto" style="z-index: 10; position: relative;">
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
                    @empty
                    <p>Không có sản phẩm yêu thích nào.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection