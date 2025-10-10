@include('user.partials.__header')
@include('user.partials.__nav')

<main id="main" class="main page-center pt-5">

  <!-- ✅ Main container for page content -->
  <div class="container">

    <div class="row mb-5 align-items-center">
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/damit.jpg') }}" class="img-fluid rounded" alt="Ladies">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/jacket.jpg') }}" class="img-fluid rounded" alt="Gents">
        </div>
        <div class="col-md-4 mb-3">
            <img src="{{ asset('img/sapatos.jpg') }}" class="img-fluid rounded" alt="Shoes">
        </div>
    </div>

    <!-- Just In Section -->
    <div class="text-center mb-5 justin-section">
        <h2 class="fw-bold">Rent clothes with your favorite brands and shop</h2>
    </div>

    <div class="row g-4 mb-5">
        @foreach($shops as $shop)
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-lg shop-card">
                <div class="position-relative overflow-hidden">
                    @if($shop->logo)
                        <img src="{{ asset('storage/' . $shop->logo) }}" class="card-img-top" alt="{{ $shop->shop_name }}">
                    @else
                        <img src="{{ asset('img/default-shop.jpg') }}" class="card-img-top" alt="{{ $shop->shop_name }}">
                    @endif
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $shop->shop_name }}</h5>
                    <p class="mb-2 text-muted">{{ $shop->address }}</p>

                    <p class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-dark">(4.5/5)</span>
                    </p>

                    <a href="{{ url('/shop/'.$shop->id) }}" class="btn btn-dark btn-gradient">Visit Shop</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Try Our Best Fashion Style Section -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold">Try our best fashion style</h2>
            <p>
                At our digital fashion hub, we believe in the power of fashion to empower, foster community,
                and inspire social change. Explore a curated collection of the finest fashion styles from
                around the globe, perfect for every mood and occasion.
            </p>
        </div>
        <div class="col-md-6">
            <div id="fashionCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <img src="{{ asset('img/flower.jpg') }}" class="d-block w-100 rounded" alt="Dress1">
                        <p class="mt-2 fw-bold">Php 200.00 - Floral Print White Dress</p>
                    </div>
                    <div class="carousel-item text-center">
                        <img src="{{ asset('img/blackdress.png') }}" class="d-block w-100 rounded" alt="Dress2">
                        <p class="mt-2 fw-bold">Php 300.00 - Black Dress</p>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#fashionCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#fashionCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Cart Offcanvas -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="offcanvasCart">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold">Your Cart 🛒</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <div id="cartItemsContainer"></div>
            <div class="border-top pt-3 mt-4">
                <div class="d-flex justify-content-between mb-2 fw-semibold">
                    <span>Subtotal</span>
                    <span id="cartSubtotal">₱0.00</span>
                </div>
                <div class="d-grid">
                    <a href="{{ route('checkout') }}"
                        class="btn py-3 rounded-4 fw-semibold shadow-sm"
                        style="background: linear-gradient(135deg, #343a40, #1e1e2f); color: white;">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

  </div> <!-- ✅ end of container -->

  <!-- ✅ AI Chatbot Floating Button -->
  <a href="#" id="aiChatBtn" class="btn btn-primary rounded-circle shadow-lg">
      <i class="fas fa-robot fa-lg"></i>
  </a>

  <!-- ✅ Chatbot Container -->
  <div class="fashionbot" id="fashionBot">
      <div class="bot-header">
          <span><i class="fas fa-robot"></i> Fashionbot</span>
          <button id="closeBot" class="btn-close"></button>
      </div>
      <div class="bot-body" id="botBody">
          <div class="bot-message">Welcome to Fashionbot! Ready to discover your next stylish look? 😊</div>
          <div class="bot-message">I'm here to assist you with everything you need today.</div>
          <div class="bot-buttons">
              <button class="bot-btn">Rent Now!</button>
              <button class="bot-btn">About Us</button>
              <button class="bot-btn">Contact Us</button>
          </div>
      </div>
      <div class="bot-footer">
          <input type="text" id="botInput" placeholder="Type your answer...">
          <button id="sendBotBtn"><i class="fas fa-paper-plane"></i></button>
      </div>
  </div>

</main>

@include('user.partials.__footer')

<!-- ✅ Chatbot Styles -->
<style>
#aiChatBtn {
  position: fixed;
  bottom: 30px;
  right: 30px;
  z-index: 1050;
  background: orange;
  color: white;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.fashionbot {
  position: fixed;
  bottom: 100px;
  right: 30px;
  width: 350px;
  max-height: 500px;
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  display: none;
  flex-direction: column;
  z-index: 1051;
  overflow: hidden;
  transform: translateY(30px);
  opacity: 0;
  transition: all 0.3s ease;
}

.fashionbot.show {
  display: flex;
  transform: translateY(0);
  opacity: 1;
}

.bot-header {
  background: linear-gradient(135deg, #1e1e2f, #343a40);
  color: white;
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.bot-body {
  padding: 15px;
  overflow-y: auto;
  flex-grow: 1;
}

.bot-message {
  background: #f1f1f1;
  border-radius: 10px;
  padding: 10px 15px;
  margin-bottom: 10px;
}

.bot-buttons {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.bot-btn {
  background: linear-gradient(135deg, #343a40, #1e1e2f);
  color: white;
  border: none;
  border-radius: 10px;
  padding: 8px 12px;
  font-size: 0.9rem;
  transition: background 0.2s;
}

.bot-btn:hover {
  background: linear-gradient(135deg, #1e1e2f, #000);
}

.bot-footer {
  display: flex;
  border-top: 1px solid #dee2e6;
  padding: 10px;
}

#botInput {
  flex-grow: 1;
  border: 1px solid #dee2e6;
  border-radius: 10px;
  padding: 8px;
  margin-right: 10px;
}

#sendBotBtn {
  background: #343a40;
  color: white;
  border: none;
  border-radius: 10px;
  padding: 8px 12px;
}
</style>


