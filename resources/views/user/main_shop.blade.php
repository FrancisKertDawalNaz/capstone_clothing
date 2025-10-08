@include('user.partials.__header')
@include('user.partials.__nav')

<main id="main" class="main">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ $shop->shop_name }}</h2>
            <p class="text-muted">{{ $shop->address }}</p>
            <img src="{{ asset('storage/' . $shop->logo) }}"
                alt="{{ $shop->shop_name }}"
                class="img-fluid rounded mb-3" style="max-height: 200px;">
        </div>

        <h4 class="fw-bold mb-4">Products</h4>
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('img/default-product.jpg') }}"
                        class="card-img-top"
                        alt="{{ $product->item_name }}">

                    <div class="card-body text-center d-flex flex-column">
                        <h6 class="fw-bold">{{ $product->item_name }}</h6>
                        <p class="text-muted">{{ $product->brand }}</p>
                        <p class="mb-1">Status: <span class="fw-bold">{{ $product->status }}</span></p>
                        <p class="mb-1">Stocks: {{ $product->stocks }}</p>
                        <p class="text-dark fw-bold">₱{{ number_format($product->price, 2) }}</p>

                        <!-- Buttons -->
                        <div class="mt-auto d-grid gap-2">
                            <a href="#" class="btn btn-warning btn-sm w-100">
                                Rent Now
                            </a>
                            <a href="#" class="btn btn-primary btn-sm w-100">
                                Buy Now
                            </a>
                            <a href="#" class="btn btn-success btn-sm w-100">
                                Add to Cart
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!-- Cart Offcanvas -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold">Your Cart 🛒</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">

            <!-- Cart Items Container -->
            <div id="cartItemsContainer"></div>

            <!-- Cart Summary -->
            <div class="border-top pt-3 mt-4">
                <div class="d-flex justify-content-between mb-2 fw-semibold">
                    <span>Subtotal</span>
                    <span id="cartSubtotal">₱0.00</span>
                </div>
                <div class="d-grid">
                    <a href="{{ route('checkout') }}"
                        class="btn py-3 rounded-4 fw-semibold shadow-sm"
                        style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@include('user.partials.__footer')