<footer class="bg-dark text-white">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Customer services</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
          <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
          <li><a class="footer-link" href="#!">Online Stores</a></li>
          <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Company</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#!">What We Do</a></li>
          <li><a class="footer-link" href="#!">Available Services</a></li>
          <li><a class="footer-link" href="#!">Latest Posts</a></li>
          <li><a class="footer-link" href="#!">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="text-uppercase mb-3">Social media</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#!">Twitter</a></li>
          <li><a class="footer-link" href="#!">Instagram</a></li>
          <li><a class="footer-link" href="#!">Tumblr</a></li>
          <li><a class="footer-link" href="#!">Pinterest</a></li>
        </ul>
      </div>
    </div>
    <div class="border-top pt-4" style="border-color: #1d1d1d !important">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor"
              href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
          <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
        </div>
      </div>
    </div>
  </div>
</footer>


</div>


{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
{{-- Bootstrap link --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- JavaScript files-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('frontend/js/front.js') }}"></script>

<!-- livewire Scripts-->
@livewireScripts
<!-- livewire Sweet Alert-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
<x-livewire-alert::flash />
<!-- sweetalert Scripts-->
@include('sweetalert::alert')

{{-- <script>

  Echo.private('App.Models.User.1')
      .notification((notification) => {
          console.log(notification.message);
      });
  
  </script> --}}
@stack('js')

</body>

</html>