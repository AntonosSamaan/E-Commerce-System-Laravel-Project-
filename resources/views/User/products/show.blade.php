@extends('User.layouts.app')

@section('content')

<!-- Page Style Wrapper -->
<style>
    body {
        background: #f8f9fa;
    }

    .best-features {
        padding: 60px 0;
    }

    .section-heading h2 {
        font-weight: 700;
    }

    .product-box {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        border: 1px solid #eee;
    }

    .product-img {
        width: 100%;
        border-radius: 10px;
        object-fit: cover;
    }

    .price {
        color: #dc3545;
        font-weight: bold;
        font-size: 18px;
    }

    input[type="number"] {
        width: 100px;
        padding: 6px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-right: 10px;
    }

    .btn-primary {
        background: #dc3545;
        border: none;
        transition: 0.2s;
        padding: 8px 16px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background: #b71c1c;
    }
</style>

<div class="best-features">
    <div class="container">

        <!-- TITLE -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading text-center mb-4">
                    <h2 >About {{ $product->name }}</h2>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-md-6">
                <div class="product-box">

                    <p> Description:{{ $product->desc }}</p>

                    <p class="price">
                        Price: {{ $product->price }} $
                    </p>

                    <p>
                        Quantity Available: {{ $product->quantity }}
                    </p>

                    <!-- ADD TO CART -->
                    <form action="{{ route('user.addToCart', $product->id) }}" method="POST" class="mt-3">

                        @csrf

                        <div class="d-flex align-items-center">

                            <input type="number"
                                   name="quantity"
                                   value="1"
                                   min="1"
                                   max="{{ $product->quantity }}">

                            <button type="submit" class="btn btn-primary">
                                Add To Cart
                            </button>

                        </div>

                    </form>

                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-6">
                <div class="product-box">
                    <img src="{{ asset('storage/'.$product->image) }}" class="product-img">
                </div>
            </div>

        </div>

    </div>
</div>

@endsection