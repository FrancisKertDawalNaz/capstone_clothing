
  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('theme/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ URL::asset('theme/assets/vendor/php-email-form/validate.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="{{ URL::asset('theme/assets/js/main.js')}}"></script>
  <script src="{{ URL::asset('js/global.js') }}"></script>
  <script src="{{ URL::asset('js/summernote.js')}}"></script>
  <script src="{{ URL::asset('js/user/booking.js')}}"></script>
  <script src="{{ URL::asset('js/user/user.js')}}"></script>
  @if(Request::routeIs('videocall'))
    <script src="https://sdk.videosdk.live/js-sdk/0.0.82/videosdk.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
  @endif
  <script src="{{ URL::asset('js/chatbot.js')}}"></script>

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

</body>

</html>