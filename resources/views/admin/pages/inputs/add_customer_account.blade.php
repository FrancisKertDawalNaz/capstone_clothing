@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add customer account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Add customer account</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body p-3">
                <form id="add_customer_account_form" class="was-validated">
                    <div class="row g-2 mb-3">

                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email" id="email"
                                required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" placeholder="Enter address" name="address"
                                id="address" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Contact</label>
                            <input type="text" class="form-control" placeholder="Enter contact" name="contact"
                                id="contact" required>
                        </div>

                        <div class="col-md-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                        </div>

                        <div class="col-md-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password"
                                name="password_confirmation" placeholder="Confirm password" required>
                        </div>

                        <input type="hidden" name="user_type" id="user_type" value="1">

                    </div>
                    @csrf
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary rounded rounded-0">Add account</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main>

@include('admin.partials.__footer')