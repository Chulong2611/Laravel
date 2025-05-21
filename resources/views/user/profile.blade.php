@extends('user.layouts.app') 

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-success text-white fs-4">
                    Thông Tin Cá Nhân
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Username:</label>
                        <div class="col-sm-8">
                            {{ Auth::user()->username }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Tên người dùng:</label>
                        <div class="col-sm-8">
                            {{ Auth::user()->fullname }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Email:</label>
                        <div class="col-sm-8">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Số điện thoại:</label>
                        <div class="col-sm-8">
                            {{ Auth::user()->phone ?? 'Chưa cập nhật' }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 fw-bold">Năm sinh:</label>
                        <div class="col-sm-8">
                            {{ Auth::user()->birth_year ?? 'Chưa cập nhật' }}
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('user.profile.edit') }}" class="btn btn-success">Chỉnh sửa</a>
                        <a href="{{ route('user.password.change') }}" class="btn btn-success">Doi mk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection