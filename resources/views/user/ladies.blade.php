@include('user.partials.__header')
@include('user.partials.__nav')

<main class="pt-5">
    <div class="container">
        <!-- Ladies Collection Header -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/ladies.jpg') }}" class="img-fluid rounded shadow-sm" alt="Fashion Hero">
            </div>
            <div class="col-md-6">
                <h1 class="fw-bold mb-3">Ladies Collection</h1>
                <p class="lead mb-3">
                    Discover the perfect outfit for every occasion — from elegant dresses to casual wear,
                    our ladies’ collection lets you express your unique style effortlessly.
                </p>
                <p class="lead mb-3">
                    Enjoy a sustainable and budget-friendly way to stay fashionable.
                    Rent your favorite looks, try new trends, and refresh your wardrobe
                    without the commitment of ownership.
                </p>
            </div>
        </div>

        <!-- Filters and Products Section -->
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Filter By</h5>

                        <!-- Category Filter -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Category</label>
                            <select class="form-select">
                                <option selected>All</option>
                                <option>Activewear</option>
                                <option>Denim</option>
                                <option>Dresses</option>
                                <option>Jackets</option>
                                <option>Accessories</option>
                                <option>Footwear</option>
                            </select>
                        </div>

                        <!-- Size Filter -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Size</label>
                            <select class="form-select">
                                <option selected>All</option>
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                                <option>Extra Large</option>
                            </select>
                        </div>

                        <!-- Color Filter -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Color</label>
                            <select class="form-select">
                                <option selected>All</option>
                                <option>Black</option>
                                <option>White</option>
                                <option>Red</option>
                                <option>Blue</option>
                                <option>Pink</option>
                                <option>Green</option>
                            </select>
                        </div>

                        <button class="btn btn-dark w-100">Apply Filters</button>
                    </div>
                </div>
            </div>

            <!-- Product List Area -->
            <div class="col-md-9">
                <!-- Category Buttons -->
                <div class="d-flex flex-wrap gap-2 mb-4">
                    <button class="btn btn-outline-dark active rounded-pill px-4 py-2">Activewear</button>
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2">Denim</button>
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2">Dresses</button>
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2">Jackets</button>
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2">Accessories</button>
                    <button class="btn btn-outline-dark rounded-pill px-4 py-2">Footwear</button>
                </div>

                <!-- Product Grid (sample items) -->
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('img/blackdress.png') }}" class="card-img-top" alt="Black Dress">
                            <div class="card-body text-center">
                                <h5 class="fw-bold mb-1">Elegant Black Dress</h5>
                                <p class="text-muted mb-2">₱300.00</p>
                                <button class="btn btn-dark btn-sm w-100">Rent Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('img/flower.jpg') }}" class="card-img-top" alt="Floral Dress">
                            <div class="card-body text-center">
                                <h5 class="fw-bold mb-1">Floral White Dress</h5>
                                <p class="text-muted mb-2">₱200.00</p>
                                <button class="btn btn-dark btn-sm w-100">Rent Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="{{ asset('img/jacket.jpg') }}" class="card-img-top" alt="Jacket">
                            <div class="card-body text-center">
                                <h5 class="fw-bold mb-1">Classic Denim Jacket</h5>
                                <p class="text-muted mb-2">₱250.00</p>
                                <button class="btn btn-dark btn-sm w-100">Rent Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('user.partials.__footer')
