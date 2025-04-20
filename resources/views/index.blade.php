@extends('shared._layout')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Product List</h2>
        </div>

        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
{{--                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">--}}
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                        <div class="row">
                            <p class="mb-1"><strong>Category:</strong> {{$product->category->name}}</p>
                        </div>
                        <div class="mt-auto">
                            <p class="mb-1"><strong>Price:</strong> ${{ $product->price }}</p>
                            <p class="mb-2"><strong>Stock:</strong> {{ $product->stock_count }}</p>
                            <a href="{{ route('product.show.without-cache', $product->id) }}" class="btn btn-primary w-100 mb-2">View Without Cache</a>
                            <a href="{{ route('product.show.with-cache', $product->id) }}" class="btn btn-secondary w-100 mb-2">View With Cache</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
