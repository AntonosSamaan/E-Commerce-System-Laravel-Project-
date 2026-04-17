@extends('User.layouts.app')

@section('content')

<style>
    body {
        background: #f8f9fa;
    }

    .order-box {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #eee;
        padding: 25px;
    }

    .item-row {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
    }

    .item-row:last-child {
        border-bottom: none;
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
</style>

<section class="py-5">
    <div class="container">
                        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold mb-1">Order Details</h4>
                <p class="text-muted mb-0">
                    Hello, {{ Auth::user()->name }}
                </p>
            </div>

            <a href="{{ route('user.orders.index') }}" class="btn btn-outline-secondary btn-sm">
                ← Back
            </a>
        </div>

        <!-- Order Box -->
        <div class="order-box">

            <!-- Order Info -->
            <div class="mb-4">
                <p class="mb-1"><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p class="mb-1 text-muted">
                    Date: {{ $order->created_at->format('Y-m-d') }}
                </p>
            </div>

            <!-- Items -->
            @foreach ($order->items as $item)
            <div class="item-row d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <p class="mb-1 fw-semibold">
                        {{ $item->product->name }}
                    </p>
                    <small class="text-muted">
                        Quantity: {{ $item->quantity }}
                    </small>
                </div>

                <div class="text-end">
                    <p class="mb-0">
                        {{ $item->price }} $
                    </p>
                    <small class="text-muted">
                        {{ $item->created_at->format('Y-m-d') }}
                    </small>
                </div>

            </div>
            @endforeach

            <!-- Total -->
            <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                <strong>Total</strong>
                <strong>{{ $order->total_price }} $</strong>
            </div>

        </div>

    </div>
</section>

@endsection