@extends('user.layouts.app')

@section('title', 'Trang chủ')

@section('content')
@include('user.partials.banner-carousel')
@include('user.partials.categories')

<div class="container">
    <!--<h4 class="mb-3">Sản phẩm mới</h4>--->
    @include('user.partials.product-carousel', ['products' => $newProducts, 'carouselId' => 'newProducts'])
</div>

<div class="container">
    <!-- sản phẩm theo danh mục -->
    @include('user.partials.category-products')
</div>

    @endsection