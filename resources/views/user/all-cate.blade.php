@extends('user.layouts.app')


@section('content')
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Category -->
            <div class="col-md-2">
                <div class=" border p-3">
                    <h5 class="mb-3">Category</h5>
                    <ul class="list-unstyled">
                        @foreach($categories as $cat)
                        <li class="mb-2">
                            <a href="{{ route('category.show', $cat->id) }}" class="text-decoration-none text-dark">
                                {{ $cat->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-10">
                <div class="border p-3">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection