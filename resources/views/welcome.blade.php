@include('partials.__header')
@include('partials.__nav')
<main>
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/mainpic.jpg') }}" class="img-fluid rounded" alt="Fashion Hero">
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold">Welcome to our Digital Fashion Hub!</h1>
                        <p class="lead">
                            Renting clothes is presented as a stylish, sustainable, and budget-friendly alternative
                            to buying new items, allowing for access to a variety of looks and trends without
                            the commitment of ownership.
                        </p>
                        <a href="#" class="btn btn-dark">Rent Now</a>
                    </div>
                </div>
            </div>


            <div class="carousel-item">
                <!-- Second slide -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/main2.jpg') }}" class="img-fluid rounded" alt="Slide Two">
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold">Discover Our Collection</h1>
                        <p class="lead">Check out the latest trends and rent what you love.</p>
                        <a href="#" class="btn btn-dark">Explore Now</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <!-- Third slide -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/main3.jpg') }}" class="img-fluid rounded" alt="Slide Three">
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold">Fashion For Every Occasion</h1>
                        <p class="lead">From casual to formal, find the perfect outfit to match your event.</p>
                        <a href="#" class="btn btn-dark">Shop Styles</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <!-- Fourth slide -->
                <div class="row align-items-center mb-5">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('img/main4.jpg') }}" class="img-fluid rounded" alt="Slide Four">
                    </div>
                    <div class="col-md-6">
                        <h1 class="fw-bold">Affordable Luxury</h1>
                        <p class="lead">Look your best without breaking the bank. Rent designer looks today.</p>
                        <a href="#" class="btn btn-dark">Get Started</a>
                    </div>
                </div>
            </div>


            <!-- Add more slides as needed -->

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="row text-center img-category mb-5">
        <div class="col">
            <img src="{{ asset('img/ladies.jpg') }}" class="img-fluid rounded mb-2" alt="Ladies">
            <p>Ladies</p>
            <a href="{{ route('user.ladies') }}" class="btn btn-dark mt-1" style="padding: 5px 25px;">View</a>
        </div>
        <div class="col">
            <img src="{{ asset('img/gens.jpg') }}" class="img-fluid rounded mb-2" alt="Gents">
            <p>Gents</p>
            <button class="btn btn-dark mt-1" style="padding: 5px 25px;">View</button>
        </div>
        <div class="col">
            <img src="{{ asset('img/shoes.jpg') }}" class="img-fluid rounded mb-2" alt="Shoes">
            <p>Shoes</p>
            <button class="btn btn-dark mt-1" style="padding: 5px 25px;">View</button>
        </div>
        <div class="col">
            <img src="{{ asset('img/acces.jpg') }}" class="img-fluid rounded mb-2" alt="Accessories">
            <p>Accessories</p>
            <button class="btn btn-dark mt-1" style="padding: 5px 25px;">View</button>
        </div>
        <div class="col">
            <img src="{{ asset('img/kids.jpg') }}" class="img-fluid rounded mb-2" alt="Kids">
            <p>Kids</p>
            <button class="btn btn-dark mt-1" style="padding: 5px 25px;">View</button>
        </div>
    </div>

    <!-- Just In Section -->
    <div class="text-center mb-5 justin-section">
        <h2 class="fw-bold">Just in!</h2>
        <p>Browse our newest products</p>
    </div>

    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/jacket.jpg') }}" class="card-img-top" alt="Jackets">
                <div class="card-body">
                    <h5 class="card-title">Jackets, Coats and Blazers</h5>
                    <p class="card-text">Stylish outerwear options for every season and occasion.</p>
                    <a href="#" class="btn btn-dark">Rent Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/activewear.jpg') }}" class="card-img-top" alt="Activewear">
                <div class="card-body">
                    <h5 class="card-title">Activewear & Loungewear</h5>
                    <p class="card-text">Stay comfy and trendy with our sports and casual collections.</p>
                    <a href="#" class="btn btn-dark">Rent Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('img/sweater.jpg') }}" class="card-img-top" alt="Sweaters">
                <div class="card-body">
                    <h5 class="card-title">Sweaters & Knits</h5>
                    <p class="card-text">Perfect warm layers for a cozy, fashionable look.</p>
                    <a href="#" class="btn btn-dark">Rent Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- 3 Icons Row -->
    <div class="row text-center py-5">
        <div class="col-md-4">
            <i class="bi bi-hdd-stack fs-1 mb-3"></i>
            <p>If items do not fit or feel right in your first 10 days, you will get free items in your next shipment.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-truck fs-1 mb-3"></i>
            <p>Delivered to you in 1–3 business days. Schedule a pickup at home or return to UPS.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-cash-coin fs-1 mb-3"></i>
            <p>Plans are flexible! Rent more items when you like. Keep items as long as you want.</p>
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
</main>

<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasLogin" style="backdrop-filter: blur(8px);">
    <div class="offcanvas-header text-white" style="background: linear-gradient(135deg, #1e1e2f, #343a40);">
        <h5 class="offcanvas-title fw-bold text-light">Welcome Back 👋</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-5" style="background: #f8f9fa;">

        <!-- Login Form -->
        <form id="loginsubmit">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                <input type="email" class="form-control rounded-4 border-0 shadow-sm p-3" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                <input type="password" class="form-control rounded-4 border-0 shadow-sm p-3" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn w-100 py-3 rounded-4 shadow-sm fw-semibold" style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="d-flex align-items-center my-4">
            <hr class="flex-grow-1">
            <span class="mx-2 text-muted fw-semibold">OR</span>
            <hr class="flex-grow-1">
        </div>

        <!-- Google Login -->
        <button class="btn w-100 py-3 rounded-4 shadow-sm fw-semibold d-flex align-items-center justify-content-center" style="background: #fff; border: 1px solid #dee2e6;">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="22" class="me-2">
            Continue with Google
        </button>

        <!-- Footer Links -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <small class="text-muted">New here?
                <a href="#" class="fw-semibold text-decoration-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSignup">Sign Up</a>
            </small>
            <a href="#" class="text-muted small text-decoration-none">Forgot Password?</a>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasSignup" style="backdrop-filter: blur(8px);">
    <div class="offcanvas-header text-white" style="background: linear-gradient(135deg, #1e1e2f, #343a40);">
        <h5 class="offcanvas-title fw-bold text-light">Create Account ✨</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-5" style="background: #f8f9fa;">
        @if(session('success'))
        <div class="alert alert-success rounded-4">{{ session('success') }}</div>
        @endif
        <!-- Sign Up Form -->
        <form id="signupsubmit">
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label fw-semibold text-secondary">Full Name</label>
                <input type="text" class="form-control rounded-4 border-0 shadow-sm p-3" id="fullname" name="fullname" placeholder="Enter full name" required>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label fw-semibold text-secondary">Email</label>
                <input type="email" class="form-control rounded-4 border-0 shadow-sm p-3" id="signupEmail" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <span class="text-muted small">Password must be at least 8 characters</span>
                <label for="password" class="form-label fw-semibold text-secondary">Password</label>
                <input type="password" class="form-control rounded-4 border-0 shadow-sm p-3" id="password" name="password" placeholder="Create password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label fw-semibold text-secondary">Confirm Password</label>
                <input type="password" class="form-control rounded-4 border-0 shadow-sm p-3" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
            </div>
            <button type="submit" class="btn w-100 py-3 rounded-4 shadow-sm fw-semibold" style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                Sign Up
            </button>
        </form>

        <!-- Divider -->
        <div class="d-flex align-items-center my-4">
            <hr class="flex-grow-1">
            <span class="mx-2 text-muted fw-semibold">OR</span>
            <hr class="flex-grow-1">
        </div>

        <!-- Google Sign Up -->
        <button class="btn w-100 py-3 rounded-4 shadow-sm fw-semibold d-flex align-items-center justify-content-center" style="background: #fff; border: 1px solid #dee2e6;">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="22" class="me-2">
            Sign Up with Google
        </button>

        <!-- Footer Links -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <small class="text-muted">Already have an account?
                <a href="#" class="fw-semibold text-decoration-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin">Login</a>
            </small>
        </div>
    </div>
</div>

<!-- Cart Offcanvas -->
<div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasCart" style="backdrop-filter: blur(8px);">
    <div class="offcanvas-header text-white" style="background: linear-gradient(135deg, #1e1e2f, #343a40);">
        <h5 class="offcanvas-title fw-bold text-light">Your Cart 🛒</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center text-center" style="background: #f8f9fa;">

        <p class="fw-semibold text-muted mb-4" style="font-size: 1.1rem;">
            Your shopping bag is empty... but it doesn't have to be!
        </p>

        <a href="/" class="btn px-4 py-3 rounded-4 fw-semibold shadow-sm"
            style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
            Shop New Arrivals
        </a>

    </div>
</div>



@include('partials.__footer')