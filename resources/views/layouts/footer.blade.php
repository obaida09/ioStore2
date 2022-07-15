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

{{-- Bootstrap link --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- JavaScript files-->
<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script src="{{ asset('frontend/js/front.js') }}"></script>

{{-- <script type="text/javascript"
  src="{{ asset('frontend/vendor/slick/code.jquery.com/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/vendor/slick/slick/slick.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.your-class').slick({
      setting-name: setting-value
    });
  });
</script> --}}


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script type="module">
  import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'

  // const swiper = new Swiper(...)



  const swiper = new Swiper('.swiper', {
  // Default parameters
  slidesPerView: 4,
  spaceBetween: 5,
  loop: true,

//   autoplay: {
//    delay: 1000,
//  },

  // If we need pagination
  // pagination: {
  //   el: '.swiper-pagination',
  // },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

</script>


<!-- livewire Scripts-->
@livewireScripts
<!-- livewire Sweet Alert-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::flash />
{{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}

<script>

        
// ------------------------------------------------------- //
//   Inject SVG Sprite -
//   see more here
//   https://css-tricks.com/ajaxing-svg-sprite/
// ------------------------------------------------------ //
function injectSvgSprite(path) {

var ajax = new XMLHttpRequest();
ajax.open("GET", path, true);
ajax.send();
ajax.onload = function(e) {
  var div = document.createElement("div");
  div.className = 'd-none';
  div.innerHTML = ajax.responseText;
  document.body.insertBefore(div, document.body.childNodes[0]);
}
}
// this is set to BootstrapTemple website as you cannot
// inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
// while using file:// protocol
// pls don't forget to change to your domain :)
injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

// slider.noUiSlider.on('update', function (value) {
//   var dive = document.getElementById('tes');
//   dive.innerHTML += value[0];
//   console.log(value[0])
// });


</script>

{{-- sweetalert --}}
@include('sweetalert::alert')

@stack('js')
</body>

</html>