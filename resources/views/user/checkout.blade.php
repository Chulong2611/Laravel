@extends('user.layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow rounded-4 border-0">
        <div class="card-header bg-success text-white fs-4">
            Thông Tin Đặt Hàng
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('user.checkout.process') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-4 fw-bold">Họ tên:</label>
                    <div class="col-sm-8">
                        <input type="text" name="fullname" class="form-control" value="{{ old('fullname', Auth::user()->fullname) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 fw-bold">Email:</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 fw-bold">Số điện thoại:</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 fw-bold">Địa chỉ giao hàng:</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" class="form-control" value="{{ old('address', Auth::user()->address) }}" required>
                    </div>
                </div>

                <h4 class="mt-4">Tóm tắt đơn hàng</h4>
                <ul class="list-group mb-3">
                    @php $total = 0; @endphp
                    @foreach ($items as $item)
                    @php $subtotal = $item->product->price * $item->quantity; @endphp
                    @php $total += $subtotal; @endphp
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $item->product->name }} (x{{ $item->quantity }})
                        <span>{{ number_format($subtotal, 0, ',', '.') }}₫</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between fw-bold">
                        Tổng cộng
                        <span>{{ number_format($total, 0, ',', '.') }}₫</span>
                    </li>
                </ul>


                <div class="text-end">
                    <button type="submit" class="btn btn-success px-4">Xác nhận đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
setTimeout(function() {
        const thongbao = document.getElementById('success-alert');
        if (thongbao) {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(thongbao);
            bsAlert.close();
        }
    }, 3000);
</script>

@endpush