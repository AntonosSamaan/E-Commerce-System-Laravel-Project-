@extends('User.layouts.app')

@section('content')

<style>
    body {
        background: #f8f9fa;
    }

    .product-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 15px;
        transition: 0.2s;
        height: 100%;
    }

    .product-card:hover {
        border-color: #dc3545;
        transform: translateY(-3px);
    }

    .product-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .product-title {
        font-weight: 600;
        margin-top: 10px;
    }

    .price {
        color: #dc3545;
        font-weight: bold;
    }

    .product-info {
        font-size: 14px;
        color: #6c757d;
    }

    .btn-outline-red {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
        transition: 0.2s;
    }

    .btn-outline-red:hover {
        background: #dc3545;
        color: #fff;
    }

    .quantity-input {
        width: 70px;
        border-radius: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .quantity-input:focus {
        border-color: #dc3545;
        box-shadow: none;
    }
</style>

<section class="py-5">
    <div class="container">

        <!-- Header -->
        <div class="mb-4">
            <h3 class="fw-bold">Products</h3>
            <p class="text-muted mb-0">Browse our latest products</p>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-4">

            @foreach ($products as $product)

            <div class="col-md-4 col-sm-6">

                <div class="product-card">

                    <!-- Image -->
                    <a href="{{ route('user.products.show', $product->id) }}">
                        <img src="{{ asset('storage/'.$product->image) }}" class="product-img">
                    </a>

                    <!-- Title -->
                    <div class="product-title">
                        {{ $product->name }}
                    </div>

                    <!-- Description -->
                    <div class="product-info">
                        {{ Str::limit($product->desc, 60) }}
                    </div>

                    <!-- Price -->
                    <p class="price mt-2">
                        {{ $product->price }} $
                    </p>

                    <!-- Quantity -->
                    <p class="product-info">
                        Quantity Available: {{ $product->quantity }}
                    </p>

                    <!-- ADD TO CART WITH QUANTITY -->
                    <form action="{{ route('user.addToCart', $product->id) }}" method="POST" class="mt-2">

                        @csrf

                        <div class="d-flex align-items-center gap-2">

                            <!-- Quantity Input -->
                            <input type="number"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   class="form-control form-control-sm quantity-input">

                            <!-- Button -->
                            <button type="submit" class="btn btn-outline-red btn-sm w-100">
                                Add To Cart
                            </button>

                        </div>

                    </form>

                </div>

            </div>

            @endforeach

        </div>

    </div>
</section>

@endsection