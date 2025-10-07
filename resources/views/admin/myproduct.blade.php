@include('admin.partials.__header')
@include('admin.partials.__nav')

<main id="main" class="main dashboard py-4">
  <div class="pagetitle mb-4">
    <h1 class="fw-bold text-dark">My Product</h1>
  </div>

  <section class="section dashboard">
    <div class="container-fluid">
      <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold text-dark mb-0">Product List</h5>
          <div>
            <button class="btn btn-primary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
              <i class="bi bi-plus-lg me-1"></i>Add Product
            </button>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-middle table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th class="text-secondary fw-semibold">#</th>
                <th class="text-secondary fw-semibold">Image</th>
                <th class="text-secondary fw-semibold">Item Name</th>
                <th class="text-secondary fw-semibold">Brand</th>
                <th class="text-secondary fw-semibold">Status</th>
                <th class="text-secondary fw-semibold">Stocks</th>
                <th class="text-secondary fw-semibold">Price</th>
                <th class="text-secondary fw-semibold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $product)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @if($product->image)
                  <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->item_name }}" width="50" class="rounded">
                  @else
                  <img src="{{ asset('img/placeholder.png') }}" alt="No Image" width="50" class="rounded">
                  @endif
                </td>
                <td>{{ $product->item_name }}</td>
                <td>{{ $product->brand }}</td>
                <td>
                  <span class="badge 
                    {{ $product->status == 'Available' ? 'bg-success' : 
                       ($product->status == 'Low Stock' ? 'bg-warning' : 'bg-danger') }}">
                    {{ $product->status }}
                  </span>
                </td>
                <td>{{ $product->stocks }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                  <button class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center text-muted">No products available.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="section dashboard mt-4">
    <div class="container-fluid">
      <div class="card border-0 shadow-sm p-4" style="border-radius:18px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold text-dark mb-0">Shop List</h5>
          <button class="btn btn-success btn-sm px-3" data-bs-toggle="modal" data-bs-target="#addShopModal">
            <i class="bi bi-shop me-1"></i>Add Shop
          </button>
        </div>

        <div class="table-responsive">
          <table class="table align-middle table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th class="text-secondary fw-semibold">#</th>
                <th class="text-secondary fw-semibold">Logo</th>
                <th class="text-secondary fw-semibold">Shop Name</th>
                <th class="text-secondary fw-semibold">Owner</th>
                <th class="text-secondary fw-semibold">Contact</th>
                <th class="text-secondary fw-semibold">Address</th>
                <th class="text-secondary fw-semibold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($shops as $shop)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @if($shop->logo)
                  <img src="{{ asset('storage/'.$shop->logo) }}" alt="{{ $shop->shop_name }}" width="45" class="rounded">
                  @else
                  <img src="{{ asset('img/placeholder.png') }}" alt="No Logo" width="45" class="rounded">
                  @endif
                </td>
                <td>{{ $shop->shop_name }}</td>
                <td>{{ $shop->owner_name}}</td>
                <td>{{ $shop->contact }}</td>
                <td>{{ $shop->address }}</td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                  <button class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-muted">No shops available.</td>
              </tr>
              @endforelse
  </section>

  <!-- Add Product Modal -->
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius:18px;">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold text-dark" id="addProductModalLabel">Add New Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Shop Dropdown -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Select Shop</label>
              <select name="shop_id" class="form-select" required>
                <option value="" disabled selected>-- Choose Shop --</option>
                @foreach($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
              <label class="form-label fw-semibold">Product Image</label>
              <input type="file" name="product_image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Item Name</label>
              <input type="text" name="item_name" class="form-control" placeholder="Enter item name">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Brand</label>
              <select class="form-select" name="brand">
                <option selected disabled>Select brand</option>
                <option>Nike</option>
                <option>Adidas</option>
                <option>H&M</option>
                <option>Zara</option>
                <option>Uniqlo</option>
                <option>Shein</option>
                <option>Bench</option>
                <option>Penshoppe</option>
                <option>Levi’s</option>
                <option>Lacoste</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Status</label>
              <select class="form-select" name="status">
                <option>Available</option>
                <option>Low Stock</option>
                <option>Out of Stock</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Stocks</label>
              <input type="number" name="stocks" class="form-control" placeholder="Enter stock count">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Price</label>
              <input type="text" name="price" class="form-control" placeholder="₱0.00">
            </div>

            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Add Shop Modal -->
  <div class="modal fade" id="addShopModal" tabindex="-1" aria-labelledby="addShopModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius:18px;">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold text-dark" id="addShopModalLabel">Add New Shop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.storeShop') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label fw-semibold">Shop Name</label>
              <input type="text" name="shop_name" class="form-control" placeholder="Enter shop name">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Shop Owner</label>
              <input type="text" name="owner_name" class="form-control" placeholder="Enter shop owner name">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Contact Number</label>
              <input type="text" name="contact" class="form-control" placeholder="Enter contact number">
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Shop Address</label>
              <textarea name="address" class="form-control" rows="2" placeholder="Enter shop address"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Shop Logo</label>
              <input type="file" name="logo" class="form-control" accept="image/*">
            </div>

            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Save Shop</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@include('admin.partials.__footer')