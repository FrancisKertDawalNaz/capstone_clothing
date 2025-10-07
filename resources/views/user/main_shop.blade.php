@include('user.partials.__header')
@include('user.partials.__nav')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">{{ $shop->shop_name }}</h2>
        <p class="text-muted">{{ $shop->address }}</p>
        <img src="{{ asset('storage/' . $shop->logo) }}" 
             alt="{{ $shop->shop_name }}" 
             class="img-fluid rounded mb-3" style="max-height: 200px;">
    </div>

    <h4 class="fw-bold mb-4">Products</h4>
    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body text-center">
                    <h6 class="fw-bold">{{ $product->name }}</h6>
                    <p class="text-muted">₱{{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">No products available in this shop.</p>
        @endforelse
    </div>
</div>
@endsection
