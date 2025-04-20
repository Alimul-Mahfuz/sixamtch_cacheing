@extends('shared._layout')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded-3">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="text-muted">Category: {{ $product->category->name ?? 'N/A' }}</p>

                        <p class="card-text mt-3">{{ $product->description }}</p>

                        @php
                            $price = (float) $product->price;
                            $discount = (float) $product->discount;
                            $finalPrice = $price - $discount;
                            $discountPercent = $price > 0 ? round(($discount / $price) * 100) : 0;
                        @endphp

                        <p class="text-bg-success px-2 py-1 d-inline-block rounded">
                            <strong>Discount:</strong> -${{ number_format($discount, 2) }}
                            @if($discount > 0)
                                <span class="ms-2 badge bg-danger">{{ $discountPercent }}% OFF</span>
                            @endif
                        </p>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-success mb-0">
                                @if($discount > 0)
                                    <span class="text-decoration-line-through text-muted me-2">
                                        ${{ number_format($price, 2) }}
                                    </span>
                                    <span class="fw-bold text-dark">
                                        ${{ number_format($finalPrice, 2) }}
                                    </span>
                                @else
                                    <span class="fw-bold text-dark">
                                        ${{ number_format($price, 2) }}
                                    </span>
                                @endif
                            </h4>
                            <span class="badge bg-warning text-dark">
                                {{ $product->stock_count > 0 ? 'In Stock: ' . $product->stock_count : 'Out of Stock' }}
                            </span>
                        </div>

                        <div class="mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                ← Back
                            </a>
                        </div>
                        <div class="row my-2">
                            <div class="col-12">
                                <p><strong>Took {{$fetch_time}} sec to fetch from {{$productCount}} products.</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
