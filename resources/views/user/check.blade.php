@include('user.partials.__header')
@include('user.partials.__nav')

<main>
    <div class="container py-5">
        <!-- Page Title -->
        <h2 class="fw-bold mb-4">Checkout</h2>

        @if($items->isEmpty())
        <div class="alert alert-info">Your cart is empty.</div>
        @else
        <!-- Items Overview -->
        <div class="mb-5">
            <h4 class="fw-semibold mb-3">Items Overview</h4>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td style="width: 80px;">
                                <img src="{{ $item->image ? asset($item->image) : asset('img/placeholder.jpg') }}"
                                    class="img-fluid rounded" style="max-width:70px;">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>₱{{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>₱{{ number_format($item->price * $item->qty, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Subtotal -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h5 class="fw-bold">Subtotal:</h5>
                <h5 class="fw-bold text-success">₱{{ number_format($subtotal, 2) }}</h5>
            </div>
        </div>

        <!-- Checkout Form -->
        <form id="checkoutForm">
            @csrf

            <!-- Delivery -->
            <h4 class="fw-semibold mb-3">Delivery</h4>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="delivery" value="Ship" checked>
                    <label class="form-check-label">Ship</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="delivery" value="Pick-up in Store">
                    <label class="form-check-label">Pick-up in Store</label>
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="col-12">
                    <input type="text" name="address" class="form-control" placeholder="Address" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="postal" class="form-control" placeholder="Postal Code" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="city" class="form-control" placeholder="Municipality/City" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="region" class="form-control" placeholder="Region" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>
            </div>

            <!-- Payment Options -->
            <h4 class="fw-semibold mt-4 mb-3">Payment Options</h4>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="Gcash" checked>
                    <label class="form-check-label">GCash</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="Cash on Delivery">
                    <label class="form-check-label">Cash on Delivery</label>
                </div>
            </div>

            <!-- Payment Instructions -->
            <div class="alert alert-secondary">
                <p class="mb-1">Please send proof of payment to <b>fashionhub@gmail.com</b> if you pay via online.</p>
                <p class="mb-0">
                    <b>Union Bank:</b> FashionHub – 1234567890 <br>
                    <b>GCash:</b> FashionHub – 0912-345-6789
                </p>
            </div>

            <!-- Place Order -->
            <div class="text-end">
                <button type="submit" class="btn btn-lg fw-semibold px-5 py-3 rounded-4 shadow-sm"
                    style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                    Place Order
                </button>
            </div>
        </form>
        @endif
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