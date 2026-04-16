@extends('User.layouts.app')

@section('content')

<style>
    body {
        background: #f8f9fa;
    }

    .cart-wrapper {
        max-width: 900px;
        margin: auto;
    }

    .cart-box {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #eee;
        padding: 20px;
    }

    .cart-item {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .product-name {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .text-muted-small {
        font-size: 13px;
        color: #6c757d;
    }

    .price {
        font-weight: bold;
        color: #dc3545;
    }

    .qty-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .qty-btn {
        border: 1px solid #ddd;
        background: #fff;
        padding: 2px 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .qty-btn:hover {
        border-color: #dc3545;
        color: #dc3545;
    }

    .btn-outline-red {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
    }

    .btn-outline-red:hover {
        background: #dc3545;
        color: #fff;
    }

    .cart-summary {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
</style>

<section class="py-5">
    <div class="container cart-wrapper">

        <!-- Header -->
        <div class="mb-4">
            <h3 class="fw-bold">My Cart</h3>
            <p class="text-muted mb-0">Review your items before checkout</p>
        </div>

        <div class="cart-box">
                    @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


            @if(session('cart') && count(session('cart')) > 0)

                @php $total = 0; @endphp

                @foreach(session('cart') as $id => $item)

                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="cart-item d-flex justify-content-between align-items-center flex-wrap">

                        <!-- Product Info -->
                        <div>
                            <div class="product-name">
                              Product Name: {{ $item['name'] }}
                            </div>

                            <div class="text-muted-small">
                                Price: {{ $item['price'] }} $
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="qty-box mt-2 mt-md-0">
                            <span class="qty-btn">{</span>
                            <span>{{ $item['quantity'] }}</span>
                            <span class="qty-btn">}</span>
                        </div>

                        <!-- Subtotal -->
                        <div class="price mt-2 mt-md-0">
                            {{ $subtotal }} $
                        </div>

                        <!-- Remove -->
                        {{--<form action="{{ route('user.cart.delete', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-red mt-2 mt-md-0">
                                Delete
                            </button>
                        </form>--}}

                    </div>

                @endforeach

                <!-- Summary -->
                <div class="cart-summary d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">Total</h5>

                    <h5 class="price mb-0">
                        {{ $total }} $
                    </h5>

                </div>

                <!-- Make TO Order -->
                <div class="mt-4 text-end">
                    <a href="{{route('user.makeOrder')}}" class="btn btn-danger px-4">
                        Make To Order
                    </a>
                </div>

            @else

                <p class="text-muted text-center mb-0">
                    Your cart is empty 🛒
                </p>

            @endif

        </div>

    </div>
</section>

@endsection