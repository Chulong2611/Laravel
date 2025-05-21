@extends('user.layouts.app') {{-- layout chính của frontend --}}

@section('title', $product->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">Danh mục: {{ $product->category->name ?? 'Chưa phân loại' }}</p>
            <h4 class="text-danger">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h4>
            <p class="mt-4">{{ $product->description }}</p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <label class="me-2">Số lượng:</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25">
                </div>
                <button type="submit" class="btn btn-primary">Thêm vào giỏ</button>
            </form>
        </div>
    </div>
</div>
@endsection
