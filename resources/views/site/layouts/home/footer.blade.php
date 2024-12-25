  <!-- الفوتر -->
  <footer class=" text-center text-lg-start mt-5">

      <div class="container " style="padding-top: 20px">
          <div class="row">
              <div class="col-lg-6 col-md-6    text-dark">
                  <p class="footer-reserve"><strong> © 2024 {{ $mainarr['title'] }}. جميع الحقوق محفوظة</strong></p>
              </div>

              <div class="col-lg-6 col-md-6  mb-md-0 footer-menu footer-link">
                  <a href="{{ url('/page' . '/' . 'privacy') }}" class="text-dark"><strong>سياسة الخصوصية<strong></a>
              </div>
          </div>
      </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="{{ url('assets/site/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <script src="{{ url('assets/site/js/custom/script.js') }}"></script>
  <script src="{{ url('assets/site/bootstrap/bootstrap-slider.js') }}"></script>
  <script src="{{ url('assets/site/bootstrap/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ url('assets/site/js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('assets/site/js/custom/main.js') }}"></script>
  <script src="{{ url('assets/site/js/sweetalert.min.js') }}"></script>

  @yield('js')

  </body>

  </html>
