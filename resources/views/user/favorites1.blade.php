@extends('user.layouts.app')

@section('title', 'Yêu thích')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Sản phẩm yêu thích</h2>

    @if(isset($favorites) && count($favorites) > 0)
        <div class="row">
            @foreach($favorites as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-success">{{ number_format($product->price, 0, ',', '.') }} đ</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Bạn chưa có sản phẩm yêu thích nào.</p>
    @endif
</div>
@endsection
