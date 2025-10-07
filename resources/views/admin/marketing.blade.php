@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
  <div class="pagetitle mb-4">
    <h1 class="fw-bold text-dark">Marketing Center</h1>
  </div>

  <div class="container">
    <div class="row g-4">
      <!-- Create Discount -->
      <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded-4 p-4">
          <h5 class="fw-semibold mb-3">Create Discount</h5>

          <div class="mb-3">
            <label class="form-label">Discount Name</label>
            <input type="text" class="form-control" placeholder="Enter your discount name here">
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Start Time</label>
              <input type="datetime-local" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">End Time</label>
              <input type="datetime-local" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Discount</label>
            <div class="input-group">
              <input type="number" class="form-control" placeholder="0">
              <span class="input-group-text">% OFF</span>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Products</label><br>
            <button class="btn btn-outline-primary w-100 py-3 rounded-3 fw-semibold">
              <i class="bi bi-plus-circle fs-5 me-2"></i> Add Products
            </button>
          </div>

          <div class="text-center">
            <button class="btn btn-primary px-5 fw-semibold">Save</button>
          </div>
        </div>
      </div>

      <!-- Create Product Voucher -->
      <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded-4 p-4">
          <h5 class="fw-semibold mb-3">Create Product Voucher</h5>
          <div class="alert alert-warning py-2 small mb-3">
            <strong>Current Voucher</strong> is at the best recommended value to boost sales!
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Discount Amount/Percentage Off</label>
              <div class="input-group">
                <input type="number" class="form-control" placeholder="₱">
                <span class="input-group-text">₱ OFF</span>
              </div>
            </div>
            <div class="col">
              <label class="form-label">Percentage Off</label>
              <div class="input-group">
                <input type="number" class="form-control" placeholder="%">
                <span class="input-group-text">% OFF</span>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Minimum Place Ordered</label>
            <input type="number" class="form-control" placeholder="Enter amount">
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Start Time</label>
              <input type="datetime-local" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">End Time</label>
              <input type="datetime-local" class="form-control">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Voucher Code</label>
            <div class="input-group">
              <span class="input-group-text bg-light border-end-0">RIT</span>
              <input type="text" class="form-control border-start-0" placeholder="X1YYZ23">
            </div>
          </div>

          <div class="text-center">
            <button class="btn btn-warning text-white px-5 fw-semibold">Publish</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@include('admin.partials.__footer')
