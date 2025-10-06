<footer class="bg-warning  py-5 border-top footer">
  <div class="container">
    <div class="row">
      <!-- Left Column -->
      <div class="col-md-4 mb-4">
        <p class="small">Let’s stay in touch! Sign up to our newsletter and get the best deals</p>
        <img src="{{ asset('img/onee.png') }}" alt="Logo" width="100" class="mb-3">
        <div>
          <a href="#" class="text-dark me-3"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="text-dark me-3"><i class="bi bi-instagram fs-4"></i></a>
        </div>
      </div>

      <!-- Middle Column -->
      <div class="col-md-4 mb-4">
        <label for="newsletter" class="form-label">Insert your email address here</label>
        <input type="email" id="newsletter" class="form-control" placeholder="Your email">
        <button class="btn btn-dark mt-2 w-100">Subscribe</button>
      </div>

      <!-- Right Column -->
      <div class="col-md-4">
        <div class="row">
          <div class="col-6">
            <h6 class="fw-bold">Help</h6>
            <ul class="list-unstyled">
              <li><a href="#" class="text-dark text-decoration-none">FAQ</a></li>
              <li><a href="#" class="text-dark text-decoration-none">Customer Service</a></li>
              <li><a href="#" class="text-dark text-decoration-none">How to Guide</a></li>
              <li><a href="#" class="text-dark text-decoration-none">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-6">
            <h6 class="fw-bold">Other</h6>
            <ul class="list-unstyled">
              <li><a href="#" class="text-dark text-decoration-none">Privacy Policy</a></li>
              <li><a href="#" class="text-dark text-decoration-none">Sitemap</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Text -->
    <div class="text-center mt-4 border-top pt-3">
      <p class="small mb-0">&copy; {{ date('Y') }} Digital Fashion Hub. All rights reserved.</p>
    </div>
  </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ URL::asset('Vesperr/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ URL::asset('Vesperr/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<!-- Main JS File -->
<script src="{{ URL::asset('Vesperr/assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="{{ URL::asset('js/global.js') }}"></script>
<script src="{{ URL::asset('js/welcome.js') }}"></script>
</body>

</html>