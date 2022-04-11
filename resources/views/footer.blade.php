<!-- ========== FOOTER ========== -->
<footer class="bg-light">
    <div class="container">

      <hr class="my-0">

      <div class="space-1">
        <!-- Copyright -->
        <div class="w-md-75 text-lg-center mx-lg-auto">
          <p class="text-muted small">&copy; Danang Hari Purnomo ♦ Devandewa. {{ Carbon\Carbon::now()->isoFormat('Y') }}. All rights reserved.</p>
        </div>
        <!-- End Copyright -->
      </div>
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->

  <!-- Go to Top -->
  <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
     data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": 15
         },
         "show": {
           "bottom": 15
         },
         "hide": {
           "bottom": -15
         }
       }
     }'>
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- End Go to Top -->

  <!-- JS Global Compulsory  -->
  
  <script src="{{ asset('front/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

  <!-- JS Implementing Plugins -->
  <script src="{{ asset('front/assets/vendor/hs-header/dist/hs-header.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-go-to/dist/hs-go-to.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-unfold/dist/hs-unfold.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-scroll-nav/dist/hs-scroll-nav.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/hs-video-player/dist/hs-video-player.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/@fancyapps/fancybox/dist/jquery.fancybox.min.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/slick-carousel/slick/slick.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/aos/dist/aos.js')}}"></script>
  <script src="{{ asset('front/assets/vendor/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

  




  <!-- JS Front -->
  <script src="{{ asset('front/assets/js/theme.min.js')}}"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // INITIALIZATION OF HEADER
      // =======================================================
      var header = new HSHeader($('#header')).init();


      // INITIALIZATION OF MEGA MENU
      // =======================================================
      var megaMenu = new HSMegaMenu($('.js-mega-menu')).init();


      // INITIALIZATION OF UNFOLD
      // =======================================================
      var unfold = new HSUnfold('.js-hs-unfold-invoker').init();


      // INITIALIZATION OF SCROLL NAV
      // =======================================================
      var isClosed = false;

      $('.js-scroll-nav').each(function () {
        var scrollNav = new HSScrollNav($(this), {
          beforeShow: function () {
            if (window.innerWidth < 768) {
              $('#navBar').collapse('hide').on('hidden.bs.collapse', function () {
                isClosed = true;
              });
            } else {
              isClosed = true;
            }

            return isClosed;
          },
          afterShow: function () {
            isClosed = false;
          }
        }).init();
      });

        // INITIALIZATION OF SELECT PICKER
        // =======================================================
        $('.js-custom-select').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
        });


      // INITIALIZATION OF FANCYBOX
      // =======================================================
      $('.js-fancybox').each(function () {
        var fancybox = $.HSCore.components.HSFancyBox.init($(this));
      });


      // INITIALIZATION OF STICKY BLOCKS
      // =======================================================
      $('.js-sticky-block').each(function () {
        var stickyBlock = new HSStickyBlock($(this)).init();
      });


      // INITIALIZATION OF SLICK CAROUSEL
      // =======================================================
      $('.js-slick-carousel').each(function() {
        var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
      });


      // INITIALIZATION OF VIDEO PLAYER
      // =======================================================
      $('.js-inline-video-player').each(function () {
        var videoPlayer = new HSVideoPlayer($(this)).init();
      });


      // INITIALIZATION OF AOS
      // =======================================================
      AOS.init({
        duration: 650,
        once: true
      });

     


      // INITIALIZATION OF GO TO
      // =======================================================
      $('.js-go-to').each(function () {
        var goTo = new HSGoTo($(this)).init();
      });
    });
  </script>


  <!-- IE Support -->
  <script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{ asset('front/assets/vendor/babel-polyfill/dist/polyfill.js')}}"><\/script>');
  </script>
</body>
</html>