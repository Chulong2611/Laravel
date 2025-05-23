@extends('user.layouts.app')


@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Category -->
            <div class="col-md-2">
                <div class=" border p-3">
                    <h5 class="mb-3">Category</h5>
                    <ul class="list-unstyled">
                        @foreach($categories as $cat)
                        <li class="mb-2">
                            <a href="{{ route('category.show', $cat->id) }}" class="text-decoration-none text-dark {{ $cat->id === $category->id ? 'fw-bold text-primary' : '' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-10">
                <div class="border p-3">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                        @foreach($products as $product)
                        <div class="col">
                            <div class="card h-100 text-center position-relative">
                                                    <a href="{{ route('product.show', $product->id) }}" class="stretched-link"></a>
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top mx-auto" style="max-height: 150px; object-fit: contain;" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-success fw-bold">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                                </div>
                                <div class="card-footer mt-auto" style="z-index: 10;">
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection