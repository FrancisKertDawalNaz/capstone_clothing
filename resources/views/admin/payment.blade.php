@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
  <div class="pagetitle mb-4">
    <h1 class="fw-bold text-dark">Payment</h1>
  </div>

  <section class="section dashboard">
    <div class="container-fluid">
      <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold text-dark mb-0">Payment Records</h5>
          <button class="btn btn-primary btn-sm px-3"><i class="bi bi-download me-1"></i>Export</button>
        </div>

        <div class="table-responsive">
          <table class="table align-middle table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th class="text-secondary fw-semibold">#</th>
                <th class="text-secondary fw-semibold">User ID</th>
                <th class="text-secondary fw-semibold">First Name</th>
                <th class="text-secondary fw-semibold">Subtotal</th>
                <th class="text-secondary fw-semibold">Payment</th>
                <th class="text-secondary fw-semibold">Status</th>
                <th class="text-secondary fw-semibold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($payments as $payment)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->user_id }}</td>
                <td>{{ $payment->first_name }}</td>
                <td>₱{{ number_format($payment->subtotal, 2) }}</td>
                <td>{{ $payment->payment}}</td>
                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d') }}</td>
                <td class="text-center">
                  <button class="btn btn-outline-primary btn-sm px-3 rounded-pill" 
                    data-bs-toggle="modal" data-bs-target="#paymentModal{{ $payment->id }}">
                    <i class="bi bi-eye me-1"></i>View
                  </button>
                </td>
              </tr>

              <!-- Payment Modal -->
              <div class="modal fade" id="paymentModal{{ $payment->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content border-0 shadow" style="border-radius:18px;">
                    <div class="modal-header border-0 pb-0">
                      <h5 class="fw-bold text-dark">Payment Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <div class="border rounded p-3">
                        <div class="d-flex justify-content-between mb-2">
                          <span class="fw-semibold text-muted">#{{ $payment->id }}</span>
                        </div>

                        <div class="row mt-3">
                          <div class="col-md-4 mb-3">
                            <h6 class="fw-bold text-dark">General Details</h6>
                            <p class="mb-1"><strong>Order Date:</strong> {{ \Carbon\Carbon::parse($payment->created_at)->format('Y-m-d h:i A') }}</p>
                          </div>

                          <div class="col-md-4 mb-3">
                            <h6 class="fw-bold text-dark">Shipping Address</h6>
                            <p class="mb-1"><strong>Address:</strong> {{ $payment->address }}</p>
                            <p class="mb-0"><strong>Mobile:</strong> {{ $payment->phone }}</p>
                          </div>

                          <div class="col-md-4 mb-3">
                            <h6 class="fw-bold text-dark">Payment</h6>
                            <p class="mb-1"><strong>Subtotal:</strong> ₱{{ number_format($payment->subtotal, 2) }}</p>
                            <p class="mb-0"><strong>Method:</strong> {{ $payment->payment }}</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer border-0">
                      <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

@include('admin.partials.__footer')
