@extends('User.layouts.app')

@section('content')

<style>
    body {
        background: #f8f9fa;
    }

    .order-card {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #eee;
        padding: 20px;
        transition: 0.2s;
    }

    .order-card:hover {
        border-color: #dc3545;
    }

    .order-header {
        border-bottom: 1px solid #eee;
        margin-bottom: 15px;
        padding-bottom: 10px;
    }

    .order-id {
        font-weight: 600;
    }

    .status {
        font-size: 12px;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-completed {
        background: #d4edda;
        color: #155724;
    }

    .status-cancelled {
        background: #f8d7da;
        color: #721c24;
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

        <!-- Header -->
        <div class="mb-4">
            <h3 class="fw-bold">My Orders</h3>
            <p class="text-muted mb-0">Hello, {{ Auth::user()->name }}</p>
        </div>
         @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($orders as $order)
        <div class="order-card mb-3">

            <!-- Header -->
            <div class="order-header d-flex justify-content-between align-items-center">
                <div>
                    <span class="order-id">Order #{{ $order->id }}</span><br>
                    <small class="text-muted">{{ $order->created_at->format('Y-m-d') }}</small>
                </div>

                <span class="status 
                    @if($order->status == 'pending') status-pending
                    @elseif($order->status == 'completed') status-completed
                    @else status-cancelled
                    @endif">
                    {{ $order->status }}
                </span>
            </div>

            <!-- Body -->
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <p class="mb-1"><strong>Price:</strong> {{ $order->total_price }} $</p>
                    <p class="mb-0 text-muted">User: {{ $order->user->name }}</p>
                </div>

                <div class="d-flex gap-2 mt-2">
                    <form action="{{ route('user.orders.show', $order->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary">Details</button>
                    </form>

                    <form action="{{ route('user.orders.delete', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-red">Delete</button>
                    </form>
                </div>

            </div>

        </div>
        @endforeach

    </div>
</section>

@endsection