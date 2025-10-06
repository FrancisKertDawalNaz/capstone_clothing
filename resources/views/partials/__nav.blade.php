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

                <!-- Mega Menu for Shops -->
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
                                <h6 class="dropdown-header">Featured Brands</h6>
                                <a class="dropdown-item" href="#">Brand A</a>
                                <a class="dropdown-item" href="#">Brand B</a>
                                <a class="dropdown-item" href="#">Brand C</a>
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('img/mega-menu.jpg') }}" alt="Promo" class="img-fluid rounded">
                                <p class="mt-2 small text-muted">Check out our latest promotions and offers!</p>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Simple Dropdown Example -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newArrivalsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        New Arrivals
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="newArrivalsDropdown">
                        <li><a class="dropdown-item" href="#">Men</a></li>
                        <li><a class="dropdown-item" href="#">Women</a></li>
                        <li><a class="dropdown-item" href="#">Kids</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Occasions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">How It Works</a>
                </li>

            </ul>

            <form class="d-flex me-3">
                <input class="form-control me-2" type="search" placeholder="Search Products">
                <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
            </form>

            <a href="#" class="me-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" title="Login / Account">
                <i class="fa fa-user fa-lg"></i>
            </a>

            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" title="View your shopping cart">
                <i class="fa fa-shopping-cart fa-lg"></i>
            </a>

        </div>
    </div>
</nav>