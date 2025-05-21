@extends('user.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Sản phẩm yêu thích</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="products-carousel swiper">
        <div class="swiper-wrapper">
        @forelse($favorites as $product)
            <div class="product-item card swiper-slide">
                <form method="POST" action="{{ route('favorites.remove', $product->id) }}" class="position-absolute top-0 end-0 m-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-wishlist text-danger border-0 bg-transparent"><i class="fa-solid fa-heart"></i></button>
                </form>
                <figure>
                    <a href="#" title="{{ $product->name }}">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 250px;" alt="{{ $product->name }}">
                    </a>
                </figure>
                <h3>{{ $product->name }}</h3>
                <strong class="price text-success">{{ number_format($product->price, 0, ',', '.') }}₫</strong>              
                <a href="#" class="btn-cart nav-link"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                <form method="POST" action="{{ route('favorites.remove', $product->id) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">Xóa khỏi yêu thích</button>
                </form>
            </div>
        @empty
            <p>Không có sản phẩm yêu thích nào.</p>
        @endforelse
        </div>
    </div>
</div>
@endsection
