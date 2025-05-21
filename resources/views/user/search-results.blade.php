@extends('user.layouts.app')
@php
use App\Models\Category;
$categoryName = null;
if (request('category_id')) {
$category = Category::find(request('category_id'));
$categoryName = $category ? $category->name : null;
}
@endphp

@section('content')
<div class="container py-5 mb-5">
    <h2 class="mb-4">Kết quả tìm kiếm cho: "<strong>{{ request('keyword') }}</strong>"
        @if(request('category_id'))
        trong <strong>{{ $categoryName }}</strong>
        @endif
    </h2>
    @if($products->isEmpty())
    <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    @else
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100" style="align-items: center;">
                <a href="#" style="text-decoration: none;">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="max-height: 200px;" alt="{{ $product->name }}">
                    <div class="card-body d-flex flex-column" style="align-items: center;">
                        <h5 class="card-title" style="color: #000;">{{ $product->name }}</h5>
                </a>
                <p class="card-text text-success">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary mt-auto"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
</div>
@endsection