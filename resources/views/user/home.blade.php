@include('user.partials.__header')
@include('user.partials.__nav')

<main id="main" class="main page-center">

    <div class="row mb-5 row align-items-center">
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/damit.jpg') }}" class="img-fluid rounded" alt="Ladies">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/jacket.jpg') }}" class="img-fluid rounded" alt="Gents">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/sapatos.jpg') }}" class="img-fluid rounded" alt="Shoes">
        </div>
    </div>


    <!-- Just In Section -->
    <div class="text-center mb-5 justin-section">
        <h2 class="fw-bold">Rent clothes with you favorite brands and shop</h2>
    </div>

    <div class="row g-4 mb-5">
        <!-- Shop Card Template -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-lg shop-card">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('img/shop1.jpg') }}" class="card-img-top" alt="Shop 1">
                    <span class="badge bg-dark position-absolute top-0 end-0 m-2">New</span>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Shop 1</h5>
                    <p class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-dark">(4.5/5)</span>
                    </p>
                    <a href="#" class="btn btn-dark btn-gradient">Visit Shop</a>
                </div>
            </div>
        </div>

        <!-- Repeat for other shops with updated images and names -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-lg shop-card">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('img/shop2.jpg') }}" class="card-img-top" alt="Shop 2">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Shop 2</h5>
                    <p class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-dark">(5/5)</span>
                    </p>
                    <a href="#" class="btn btn-dark btn-gradient">Visit Shop</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-lg shop-card">
                <div class="position-relative overflow-hidden">
                    <img src="{{ asset('img/shop3.jpg') }}" class="card-img-top" alt="Shop 3">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Shop 3</h5>
                    <p class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-dark">(4/5)</span>
                    </p>
                    <a href="#" class="btn btn-dark btn-gradient">Visit Shop</a>
                </div>
            </div>
        </div>
    </div>

    <!-- AI Chatbot Floating Button -->
    <a href="#" id="aiChatBtn" class="btn btn-primary rounded-circle shadow-lg">
        <i class="fas fa-robot fa-lg"></i>
    </a>

    <!-- Chatbot Container -->
    <div class="fashionbot" id="fashionBot">
        <div class="bot-header">
            <span><i class="fas fa-robot"></i> Fashionbot</span>
            <button id="closeBot" class="btn-close"></button>
        </div>
        <div class="bot-body" id="botBody">
            <!-- Bot messages and buttons will go here -->
            <div class="bot-message">
                Welcome to Fashionbot! Ready to discover your next stylish look? 😊
            </div>
            <div class="bot-message">
                I'm here to assist you with everything you need today.
            </div>
            <div class="bot-buttons">
                <button class="bot-btn">Rent Now!</button>
                <button class="bot-btn">About Us</button>
                <button class="bot-btn">Contact Us</button>
            </div>
        </div>
        <div class="bot-footer">
            <input type="text" id="botInput" placeholder="Type your answer...">
            <button id="sendBotBtn"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>

    <!-- Product Detail Modal -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius:20px;overflow:hidden;background:rgba(255,255,255,0.95);backdrop-filter:blur(12px);">
                <div class="modal-body p-0">
                    <div class="row g-0">

                        <!-- Product Image -->
                        <div class="col-md-5 position-relative">
                            <img id="modalProductImg" src="https://via.placeholder.com/600x800" alt="Product" class="w-100 h-100" style="object-fit:cover;">
                            <span class="position-absolute top-0 start-0 m-3 badge bg-dark px-3 py-2" style="font-size:0.85rem;">Best Seller</span>
                        </div>

                        <!-- Product Details -->
                        <div class="col-md-7 p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h4 id="modalProductName" class="fw-bold mb-0 text-dark">Elegant Linen Dress</h4>
                                <span class="text-end small text-muted">
                                    Shop 1<br><span style="color:#FFD700;">★★★★★</span>
                                </span>
                            </div>

                            <div class="mb-3">
                                <p id="modalProductDesc" class="text-secondary" style="font-size:0.95rem;">
                                    Soft-touch linen fabric with minimal stitching detail. Perfect for everyday wear and weekend getaways.
                                </p>
                            </div>

                            <div class="mb-3">
                                <strong class="d-block mb-1 text-dark">Inclusions</strong>
                                <ul id="modalProductInclusions" class="ps-3 mb-0 text-secondary" style="font-size:0.9rem;line-height:1.6;">
                                    <li>Eco-friendly packaging</li>
                                    <li>Free shipping</li>
                                </ul>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="text-dark fw-semibold mb-1">Size</div>
                                    <select class="form-select form-select-sm shadow-sm border-light rounded-pill">
                                        <option>Small</option>
                                        <option selected>Medium</option>
                                        <option>Large</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="text-dark fw-semibold mb-1">Quantity</div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-light border rounded-circle px-2 py-1" id="modalQtyMinus">−</button>
                                        <span id="modalQty" class="mx-3 fw-semibold">1</span>
                                        <button class="btn btn-light border rounded-circle px-2 py-1" id="modalQtyPlus">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="text-dark fw-semibold mb-1">Duration</div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-dark btn-sm rounded-pill px-3">1–2 days</button>
                                        <button class="btn btn-outline-dark btn-sm rounded-pill px-3">3–4 days</button>
                                    </div>
                                </div>
                                <div class="col-6 text-end align-self-end">
                                    <h4 class="fw-bold text-dark mb-0">₱<span id="modalProductPrice">1,500.00</span></h4>
                                </div>
                            </div>

                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-dark rounded-pill flex-fill py-2 fw-semibold">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Try Our Best Fashion Style Section -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold">Try our best fashion style</h2>
            <p>
                At our digital fashion hub, we believe in the power of fashion to empower, foster community,
                and inspire social change. Explore a curated collection of the finest fashion styles from
                around the globe, perfect for every mood and occasion.
            </p>
        </div>
        <div class="col-md-6">
            <div id="fashionCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <img src="{{ asset('img/flower.jpg') }}" class="d-block w-100 rounded" alt="Dress1">
                        <p class="mt-2 fw-bold">Php 200.00 - Floral Print White Dress</p>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="{{ asset('img/blackdress.png') }}" class="d-block w-100 rounded" alt="Dress2">
                        <p class="mt-2 fw-bold">Php 300.00 - Black Dress</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#fashionCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#fashionCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

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
                    <button class="btn py-3 rounded-4 fw-semibold shadow-sm"
                        style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                        Checkout
                    </button>
                </div>
            </div>

        </div>
    </div>

    </div>


</main>

@include('user.partials.__footer')