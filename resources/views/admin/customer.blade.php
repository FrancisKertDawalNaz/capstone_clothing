@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
  <div class="pagetitle mb-4">
    <h1 class="fw-bold text-dark">Customer Details</h1>
  </div>

  <section class="section">
    <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
      <div class="table-responsive">
        <table class="table align-middle table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th scope="col" class="fw-semibold text-secondary">ID</th>
              <th scope="col" class="fw-semibold text-secondary">First Name</th>
              <th scope="col" class="fw-semibold text-secondary">Last Name</th>
              <th scope="col" class="fw-semibold text-secondary">Address</th>
              <th scope="col" class="fw-semibold text-secondary">City</th>
              <th scope="col" class="fw-semibold text-secondary">Region</th>
              <th scope="col" class="fw-semibold text-secondary">Postal</th>
              <th scope="col" class="fw-semibold text-secondary">Phone</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($customers as $customer)
              <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->region }}</td>
                <td>{{ $customer->postal }}</td>
                <td>{{ $customer->phone }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center text-muted">No customers found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

@include('admin.partials.__footer')
