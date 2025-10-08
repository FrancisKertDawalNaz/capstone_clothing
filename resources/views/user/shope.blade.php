@include('user.partials.__header')
@include('user.partials.__nav')

@php
// If controller didn't pass a $product array, try to build it from query params (used by chatbot links)
if (!isset($product) || !is_array($product)) {
$product = [];
$product['img'] = request()->query('img', '');
$product['name'] = request()->query('name', 'Product Name');
$product['desc'] = request()->query('desc', '');
$product['price'] = request()->query('price', '');
$inclusions = request()->query('inclusions', '[]');
if (is_string($inclusions)) {
$decoded = json_decode($inclusions, true);
$product['inclusions'] = is_array($decoded) ? $decoded : [];
} else {
$product['inclusions'] = is_array($inclusions) ? $inclusions : [];
}
$product['shop'] = request()->query('shop', 'Shop 1');
$product['size'] = request()->query('size', '');
}

// Resolve image URL: allow absolute URLs or convert relative paths to asset()
$imgSrc = '';
if (!empty($product['img'])) {
$imgVal = $product['img'];
// If it's an absolute URL, use as-is
if (filter_var($imgVal, FILTER_VALIDATE_URL)) {
$imgSrc = $imgVal;
} elseif (substr($imgVal, 0, 1) === '/') {
$imgSrc = asset(ltrim($imgVal, '/'));
} else {
$imgSrc = asset($imgVal);
}
} else {
$imgSrc = asset('img/placeholder.jpg');
}
@endphp

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-0 shadow-lg border-0 rounded-4 overflow-hidden"
                    style="background:rgba(255,255,255,0.96);backdrop-filter:blur(10px);">

                    <!-- LEFT -->
                    <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                        <img id="productImg" src="{{ $imgSrc }}" alt="Product"
                            style="width:100%;max-height:320px;object-fit:cover;border-radius:16px;">
                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-7 p-4">
                        @php
                        // Use provided price or default
                        $rawPrice = $product['price'] ?? 1500;
                        // If price contains currency symbol or commas (e.g., "₱1,200"), sanitize to numeric
                        if (is_numeric($rawPrice)) {
                        $priceNumeric = (float) $rawPrice;
                        } else {
                        $clean = str_replace(',', '', $rawPrice);
                        $clean = preg_replace('/[^0-9\.]/', '', $clean);
                        $priceNumeric = $clean !== '' ? (float) $clean : 0.0;
                        }
                        @endphp
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h4 id="productName" class="fw-bold mb-1">{{ $product['name'] ?? 'Product Name' }}</h4>
                                <div class="small text-muted">Shop: <span id="productShop">{{ $product['shop'] ?? 'Shop 1' }}</span></div>
                            </div>
                            <div class="text-end">
                                <div class="h4 mb-0 text-dark">₱ <span id="productPrice">{{ number_format($priceNumeric, 2, '.', ',') }}</span></div>
                            </div>
                        </div>
                        <p id="productDesc">{{ $product['desc'] ?? '' }}</p>

                        @if(!empty($product['inclusions']))
                        <div class="mb-3">
                            <strong class="d-block mb-1">Inclusions</strong>
                            <ul class="ps-3 mb-0 text-secondary" style="font-size:0.95rem;line-height:1.6;">
                                @foreach($product['inclusions'] as $inc)
                                <li>{{ $inc }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="mt-3">
                            <form id="cartForm" action="{{ route('cart.store') }}" method="POST" class="w-100">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product['id'] ?? 1 }}">
                                <input type="hidden" name="name" value="{{ $product['name'] ?? '' }}">
                                <input type="hidden" name="price" value="{{ $priceNumeric }}">
                                <input type="hidden" name="image" value="{{ $product['img'] ?? '' }}">
                                <input type="hidden" name="shop" value="{{ $product['shop'] ?? '' }}">
                                <input type="hidden" name="duration" id="durationInput" value="Not selected">

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <label class="fw-semibold mb-0">Quantity:</label>
                                    <div class="input-group" style="width:120px;">
                                        <button type="button" class="btn btn-outline-secondary" id="qtyMinus">-</button>
                                        <input type="text" name="qty" id="qtyInput" class="form-control text-center" value="1" readonly>
                                        <button type="button" class="btn btn-outline-secondary" id="qtyPlus">+</button>
                                    </div>
                                </div>



                                <button type="button"
                                    id="addToCartBtn"
                                    data-product='@json($product)'
                                    class="btn flex-fill fw-semibold d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-cart-plus"></i>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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