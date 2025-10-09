@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Rider Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Add Rider Account</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body p-4">
                <form id="add_rider_account_form" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="row g-3">
                        <!-- Station Details -->
                        <div class="col-md-4">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname"
                                placeholder="Enter full name" required>
                            <div class="invalid-feedback">Full name is required.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter username name" required>
                            <div class="invalid-feedback">Username is required.</div>
                        </div>

                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                required>
                            <div class="invalid-feedback">Valid email is required.</div>
                        </div>

                        <!-- Login Credentials -->
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>

                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password"
                                name="password_confirmation" placeholder="Confirm password" required>
                            <div class="invalid-feedback">Please confirm your password.</div>
                        </div>

                        <input type="hidden" name="user_type" id="user_type" value="1">

                        <!-- Submit -->
                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-primary">Add Account</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

</main>

@include('admin.partials.__footer')