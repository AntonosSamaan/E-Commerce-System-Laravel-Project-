@extends('User.layouts.app')

@section('content')

<style>
    body {
        background: #f8f9fa;
    }

    .wishlist-card {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 15px;
        transition: 0.25s;
        height: 100%;
    }

    .wishlist-card:hover {
        transform: translateY(-4px);
        border-color: #dc3545;
        box-shadow: 0 6px 18px rgba(0,0,0,0.05);
    }

    .product-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        transition: 0.3s;
    }

    .wishlist-card:hover .product-img {
        transform: scale(1.03);
    }

    .product-title {
        font-weight: 600;
        margin-top: 10px;
    }

    .price {
        color: #dc3545;
        font-weight: bold;
    }

    .status {
        font-size: 13px;
        color: #6c757d;
    }

    .btn-remove {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
        border-radius: 8px;
        width: 100%;
        padding: 6px;
        transition: 0.2s;
    }

    .btn-remove:hover {
        background: #dc3545;
        color: #fff;
    }

    .header-link {
        color: #dc3545;
        text-decoration: none;
        font-weight: 600;
    }

    .header-link:hover {
        text-decoration: underline;
    }
</style>

<section class="py-5">
    <div class="container">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0">My Wishlist</h3>
                <p class="text-muted mb-0">Your saved products</p>
            </div>

            <a href="{{ route('home') }}" class="header-link">
                Home →
            </a>
        </div>

        <div class="row g-4">

            @forelse ($wishlists as $wishlist)

            <div class="col-md-4 col-sm-6">

                <div class="wishlist-card">

                    <!-- Image -->
                    <a href="{{ route('user.products.show', $wishlist->product->id) }}">
                        <img src="{{ asset('storage/'.$wishlist->product->image) }}"
                             class="product-img">
                    </a>

                    <!-- Title -->
                    <div class="product-title">
                        {{ $wishlist->product->name }}
                    </div>

                    <!-- Price -->
                    <p class="price mt-2">
                        ${{ number_format($wishlist->product->price, 2) }}
                    </p>

                    <!-- Status -->
                    <p class="status">
                        Status: Pending
                    </p>

                    <!-- Remove -->
                    <form action="{{ route('user.wishlist.destroy', $wishlist->id) }}"
                          method="POST"
                          class="mt-2">

                        @csrf
                        @method('DELETE')

                        <button class="btn-remove">
                            Remove
                        </button>

                    </form>

                </div>

            </div>

            @empty

                <div class="text-center text-muted">
                    No items in wishlist ❤️
                </div>

            @endforelse

        </div>

    </div>
</section>

@endsection