<div class="latest-products py-5" style="background:#f8f9fa;">
    <div class="container">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">
                {{ __('user_message.Latest Products') }}
            </h3>

            <a href="{{ route('user.products.index') }}"
               class="text-danger text-decoration-none fw-semibold">
                {{ __('user_message.view all products') }} →
            </a>
        </div>

        <div class="row g-4">

            @forelse ($products as $product)

            <div class="col-md-4">

                <!-- CARD -->
                <div class="card border-0 shadow-sm h-100 product-card"
                     style="border-radius:10px; overflow:hidden; transition:0.3s;">

                    <!-- IMAGE -->
                    <a href="{{ route('user.products.show', $product->id) }}">
                        <img src="{{ asset('storage/'.$product->image) }}"
                             style="height:220px; width:100%; object-fit:cover;">
                    </a>

                    <!-- CONTENT -->
                    <div class="p-3">

                        <h5 class="fw-bold mb-1">
                            {{ $product->name }}
                        </h5>

                        <h6 class="text-danger fw-bold mb-2">
                            {{ $product->price }} $
                        </h6>

                        <p class="text-muted small mb-2">
                            {{ Str::limit($product->desc, 70) }}
                        </p>

                        <span class="text-muted small">
                            Quantity: {{ $product->quantity }}
                        </span>

                        <!-- WISHLIST BUTTON (AUTO STYLE CARD) -->
    @if ($product->quantity == 0)
<form action="{{ route('user.wishlist.create', $product->id) }}" method="POST" class="mt-3">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <button class="btn wishlist-btn w-100">
        ♡ Add to Wishlist
    </button>
</form>
@endif

                    </div>

                </div>

            </div>

            @empty

                <div class="text-center text-muted">
                    No Data Found
                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>

    </div>
</div>

<!-- STYLE -->
<style>

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* WISHLIST BUTTON GRAY STYLE */
.wishlist-btn {
    border-radius: 8px;
    font-weight: 600;
    background: #f1f1f1;
    color: #555;
    border: 1px solid #ddd;
    transition: 0.2s;
}

.wishlist-btn:hover {
    background: #e6e6e6;
    color: #000;
}

.wishlist-btn:active {
    transform: scale(0.97);
}

</style>