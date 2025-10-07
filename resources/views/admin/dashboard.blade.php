@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
    <div class="pagetitle mb-4">
        <h1 class="fw-bold text-dark">Static</h1>
    </div>

    <section class="section dashboard">
        <div class="container-fluid">

            <!-- === 3 Cards on Top === -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#d1f8ce,#b0f2c2);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">TOTAL REVENUE</h6>
                                <h3 class="fw-bold text-success mb-0">₱{{ number_format($totalRevenue, 2) }}</h3>
                            </div>
                            <div class="fs-2 text-success opacity-75"><i class="bi bi-cash-stack"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#ffd6e0,#ffc1cc);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">TOTAL USERS</h6>
                                <h3 class="fw-bold text-danger mb-0">{{ number_format($totalUsers) }}</h3>
                            </div>
                            <div class="fs-2 text-danger opacity-75"><i class="bi bi-people-fill"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#fff3cd,#ffe699);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">NEW USERS</h6>
                                <h3 class="fw-bold text-warning mb-0">{{ number_format($newusers) }}</h3>
                            </div>
                            <div class="fs-2 text-warning opacity-75"><i class="bi bi-person-plus-fill"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- === 3 Cards on Bottom === -->
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#ffdede,#ffbaba);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">ISSUES</h6>
                                <h3 class="fw-bold text-danger mb-0">3</h3>
                            </div>
                            <div class="fs-2 text-danger opacity-75"><i class="bi bi-exclamation-triangle-fill"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#cde3ff,#a7caff);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">SERVER UPTIME</h6>
                                <h3 class="fw-bold text-primary mb-0">152 days</h3>
                            </div>
                            <div class="fs-2 text-primary opacity-75"><i class="bi bi-hdd-network"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4"
                        style="border-radius:18px; background:linear-gradient(135deg,#d3f1ff,#a8e4ff);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-secondary fw-semibold mb-1">SHIPPED</h6>
                                <h3 class="fw-bold text-info mb-0">1 delivered</h3>
                            </div>
                            <div class="fs-2 text-info opacity-75"><i class="bi bi-truck"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- === Charts and Calendar Section === -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 h-100"
                        style="border-radius:18px; min-height:360px;">
                        <h6 class="fw-bold mb-3 text-dark">Sales in Rent Clothing Business</h6>
                        <canvas id="salesChart" height="300"></canvas>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 h-100"
                        style="border-radius:18px; min-height:360px;">
                        <h6 class="fw-bold mb-3 text-dark">Popular Categories</h6>
                        <canvas id="categoryChart" height="300"></canvas>
                    </div>
                </div>


                <input type="hidden" value="{{ $gcashCount }}" id="gcashCount">
                <input type="hidden" value="{{ $codCount }}" id="codCount">

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 h-100"
                        style="border-radius:18px; min-height:360px;">
                        <h6 class="fw-bold mb-3 text-dark">Payment Distribution</h6>
                        <canvas id="paymentChart" height="300"></canvas>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 h-100"
                        style="border-radius:18px; min-height:360px;">
                        <h6 class="fw-bold mb-3 text-dark">Calendar</h6>
                        <div id="calendar" style="height:100%; min-height:300px;"></div>
                    </div>
                </div>
            </div>


            <!-- === Recent Products, Top Customers, Comments === -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
                        <h6 class="fw-bold mb-3 text-dark">Most Recent Products</h6>
                        <ul class="list-group list-group-flush">
                            @forelse ($recentProducts as $product)
                            <li
                                class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                <span>{{ $product->name }}</span>
                                <span
                                    class="badge bg-success-subtle text-success">₱{{ number_format($product->price, 2) }}</span>
                            </li>
                            @empty
                            <li class="list-group-item border-0 px-0 text-muted">No products available</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
                        <h6 class="fw-bold mb-3 text-dark">Top Customers</h6>
                        <ul class="list-group list-group-flush">
                            @forelse ($topCustomers as $customer)
                            <li
                                class="list-group-item border-0 px-0 d-flex justify-content-between align-items-center">
                                <span>{{ $customer->name }}</span>
                                <span
                                    class="text-success fw-semibold">₱{{ number_format($customer->total_spent, 2) }}</span>
                            </li>
                            @empty
                            <li class="list-group-item border-0 px-0 text-muted">No data available</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
                        <h6 class="fw-bold mb-3 text-dark">Latest Comments</h6>

                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

@include('admin.partials.__footer')