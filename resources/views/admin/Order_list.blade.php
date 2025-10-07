@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
  <div class="pagetitle mb-4">
    <h1 class="fw-bold text-dark">Order List</h1>
  </div>

  <section class="section">
    <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
      <div class="table-responsive">
        <table class="table align-middle table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col" class="fw-semibold text-secondary">ID</th>
              <th scope="col" class="fw-semibold text-secondary">User ID</th>
              <th scope="col" class="fw-semibold text-secondary">First Name</th>
              <th scope="col" class="fw-semibold text-secondary">Address</th>
              <th scope="col" class="fw-semibold text-secondary">Payment</th>
              <th scope="col" class="fw-semibold text-secondary">Subtotal</th>
              <th scope="col" class="fw-semibold text-secondary">Name</th>
              <th scope="col" class="fw-semibold text-secondary">Qty</th>
              <th scope="col" class="fw-semibold text-secondary">Duration</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>#{{ $order->user_id }}</td>
                <td>{{ $order->first_name }}</td>
                <td>{{ $order->address }}</td>
                <td>
                  @if ($order->payment === 'Gcash')
                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Paid</span>
                  @elseif ($order->payment === 'Cash on Delivery')
                    <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">Pending</span>
                  @else
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Failed</span>
                  @endif
                </td>
                <td>₱{{ number_format($order->subtotal, 2) }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->qty }}</td>
                <td>{{ $order->duration }} days</td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center text-muted">No orders found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

@include('admin.partials.__footer')
