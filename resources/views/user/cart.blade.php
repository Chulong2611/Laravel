<!-- resources/views/user/cart.blade.php -->
@extends('user.layouts.app')

@section('content')
<div class="container py-5 mt-5 mb-5">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>


    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($items->count())
    <table class="table align-middle table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th style="width: 150px;">Số lượng</th>
                <th>Thành tiền</th>
                <th class="text-center" style="width: 200px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($items as $item)
             @php
                $subtotal = $item->product->price * $item->quantity;
                $total += $subtotal;
            @endphp
            <tr>
                <td><strong>{{ $item->product->name }}</strong><br><span>Tồn kho: {{ $item->product->quantity }}</span></td>
                <td>{{ number_format($item->product->price, 0, ',', '.') }} đ</td>
                <td>
                     <form method="POST" id="quantity-form-{{$item->product->id}}" action="{{ route('user.cart.update', $item->product->id) }}" >
                        @csrf
                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" data-max="{{ $item->product->quantity }}" class="form-control w-10 me-2 quantity-input" data-product-id="{{ $item->product->id }}">
                    </form>
                </td>
                <td> {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} đ</td>
                <td class="text-center d-flex justify-content-around align-items-center">

                    <button type="submit" form="quantity-form-{{$item->product->id}}" class="btn btn-sm btn-primary w-20 h-10">Cập nhật</button>

                    <form id="delete-form-{{ $item->product->id }}" method="POST" action="{{ route('user.cart.remove', $item->product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-20 h-10">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="text-end" colspan="4"><strong>Tổng tiền thanh toán:</strong></td>
                <td class="text-start text-success fw-bold"><strong>{{ number_format($total, 0, ',', '.') }} đ</strong></td>
            </tr>
            <tr>
                <td class="text-end" colspan="6">
                    <a href="{{ route('user.checkout') }}" class="btn btn-sm btn-primary w-60 h-10">Thanh toan</a>
                </td>
            </tr>
        </tfoot>
    </table>
    @else
    <p>Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.quantity-input');

        inputs.forEach(input => {
            input.addEventListener('change', function() {
                const value = parseInt(this.value);
                const productId = this.dataset.productId;
const maxQuantity = parseInt(this.dataset.max);

                if (value <= 0) {
                    const confirmDelete = confirm('Bạn đã nhập số lượng là 0. Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?');

                    if (confirmDelete) {
                        // Submit form xóa
                        document.querySelector(`#delete-form-${productId}`).submit();
                    } else {
                        // Nếu không, đưa giá trị về 1
                        this.value = 1;
                    }
                } 
                else if (value > maxQuantity) {
                   alert(`Số lượng không được vượt quá ${maxQuantity}`);
                    this.value = maxQuantity;
               }
            });
        });
    });


    setTimeout(function() {
        const thongbao = document.getElementById('success-alert');
        if (thongbao) {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(thongbao);
            bsAlert.close();
        }
    }, 3000);
</script>

@endpush