@extends('user.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($items->count())
    <div class="table-responsive">
        <table class="table align-middle table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->product->price, 0, ',', '.') }}₫</td>
                    <td>
                        <form method="POST" action="{{ route('cart.update', $item->product->id) }}" class="d-flex">
                            @csrf
                            
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="200" class="form-control w-50">
                            <button type="submit" class="btn btn-sm btn-primary ms-2">Cập nhật</button>
                        </form>
                    </td>
                    <td>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}₫</td>
                    <td>
                        <form method="POST" action="{{ route('cart.remove', $item->product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p>Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection
