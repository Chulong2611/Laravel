@extends('user.layouts.app')

@section('content')
<section class="py-5 container">
    <h2 class="mb-4">Tất cả sản phẩm</h2>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <form method="POST" action="{{ route('user.favorites.add', $product->id) }}">
                    @csrf
                    <button type="submit" class="btn-wishlist text-decoration-none">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </form>
                <figure>
                    <a href="index.html" title="Product Title">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid mx-auto d-block" style="max-height: 150px;" alt="{{ $product->name }}">
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
        </div>
        @endforeach
    </div>
</section>

@endsection