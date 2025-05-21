@extends('user.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Sản phẩm yêu thích</h2>


    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($favorites->count())
    <table class="table align-middle table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th class="text-center" style="width: 250px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($favorites as $item)
            <tr>
                <td><img src="{{ asset('storage/'. $item->product->image) }}" class="img-fluid mx-auto " style="height: 40px;" alt="{{ $item->product->name }}"></td>
                <td><strong>{{ $item->product->name }}</strong></td>
                <td>{{ number_format($item->product->price, 0, ',', '.') }} đ</td>
                <td class="text-center d-flex justify-content-around align-items-center">

                    <form action="{{ route('user.cart.add', $item->product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary w-30 h-10">Add to Cart
                        </button>
                    </form>
                    
                    <form id="delete-form-{{ $item->product->id }}" method="POST" action="{{ route('user.favorites.remove', $item->product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-20 h-10">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Không có sản phẩm yêu thích nào.</p>
    @endif
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