@extends('user.layouts.app')


@section('content')
<div class="container py-5">
    <h2 class="mb-4">Tất cả sản phẩm</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

     <!-- Bộ lọc -->
    <form method="GET" class="row mb-4">
        <div class="col-md-3">
            <select name="category" class="form-select" onchange="this.form.submit()">
                <option value="">-- Tất cả danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="">-- Sắp xếp --</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
            </select>
        </div>
    </form>

    <!-- Hiển thị sản phẩm -->

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        @forelse ($products as $product)
            <div class="col">
                <div class="card position-relative h-100">
                    <a href="{{ route('product.show', $product->id) }}" class="stretched-link"></a>
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 250px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-success fw-bold">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                        
                        <div class="mt-auto">
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
            </div>
        @empty
            <p>Không có sản phẩm nào.</p>
        @endforelse
    </div>

     <!-- Phân trang -->
    <div class="mt-4">
        {{ $products->withQueryString()->links() }}
    </div>
</div>
@endsection