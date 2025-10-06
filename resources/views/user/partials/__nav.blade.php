<div class="bg-warning text-center py-1">
    <small>"Explore trends without the commitment, rent with us."</small>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <img src="{{ asset('img/onee.png') }}" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- Shops Mega Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="shopsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Shops
          </a>
          <div class="dropdown-menu p-4" aria-labelledby="shopsDropdown" style="width: 600px;">
            <div class="row">
              <div class="col-md-4">
                <h6 class="dropdown-header">Categories</h6>
                <a class="dropdown-item" href="#">Men's Wear</a>
                <a class="dropdown-item" href="#">Women's Wear</a>
                <a class="dropdown-item" href="#">Kids</a>
                <a class="dropdown-item" href="#">Accessories</a>
              </div>
              <div class="col-md-4">
                <h6 class="dropdown-header">Brands</h6>
                <a class="dropdown-item" href="#">Brand A</a>
                <a class="dropdown-item" href="#">Brand B</a>
                <a class="dropdown-item" href="#">Brand C</a>
              </div>
              <div class="col-md-4">
                <img src="{{ asset('img/ladies.jpg') }}" alt="Promo" class="img-fluid rounded">
                <p class="mt-2 small text-muted">Check out our latest promotions!</p>
              </div>
            </div>
          </div>
        </li>

        <!-- New Arrivals Mega Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="newArrivalsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            New Arrivals
          </a>
          <div class="dropdown-menu p-3" aria-labelledby="newArrivalsDropdown" style="width: 400px;">
            <a class="dropdown-item" href="#">Men's Collection</a>
            <a class="dropdown-item" href="#">Women's Collection</a>
            <a class="dropdown-item" href="#">Kids' Collection</a>
          </div>
        </li>

        <!-- Occasions Mega Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="occasionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Occasions
          </a>
          <div class="dropdown-menu p-3" aria-labelledby="occasionsDropdown" style="width: 400px;">
            <a class="dropdown-item" href="#">Weddings</a>
            <a class="dropdown-item" href="#">Birthdays</a>
            <a class="dropdown-item" href="#">Casual</a>
            <a class="dropdown-item" href="#">Formal</a>
          </div>
        </li>

        <!-- How It Works Mega Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="howItWorksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            How It Works
          </a>
          <div class="dropdown-menu p-3" aria-labelledby="howItWorksDropdown" style="width: 400px;">
            <a class="dropdown-item" href="#">Browse Products</a>
            <a class="dropdown-item" href="#">Add to Cart</a>
            <a class="dropdown-item" href="#">Checkout</a>
            <a class="dropdown-item" href="#">Delivery & Returns</a>
          </div>
        </li>

      </ul>

      <form class="d-flex me-3">
        <input class="form-control me-2" type="search" placeholder="Search Products">
        <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <a href="#" class="me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin">
        <i class="fa fa-user fa-lg"></i>
      </a>

      @auth
        <span class="text-muted small me-3">{{ Auth::user()->email }}</span>
      @endauth

      <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart">
        <i class="fa fa-shopping-cart fa-lg me-3"></i>
      </a>

      @auth
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm me-3">Logout</button>
        </form>
      @endauth
    </div>
  </div>
</nav>

