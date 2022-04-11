@include('header')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
  <!-- Hero Section -->
  <div class="position-relative bg-img-hero"
    style="background-image: url({{ asset('front/assets/svg/components/abstract-shapes-14.svg')}});">
    <div class="container space-top-3 space-top-lg-4 space-bottom-2 space-bottom-lg-3 position-relative z-index-2">
      <div class="row justify-content-lg-between align-items-md-center">
        <div class="col-md-6 col-lg-5 mb-11 mb-md-0">
          <div class="mb-5">
            <h1 class="display-4">Sempurnakan Puasa Dengan Zakat Fitrah</h1>
            <p class="lead">Setiap 2.5% Zakatmu, sangat berarti bagi mereka yang membutuhkan</p>
          </div>
        </div>
        {{--
        <div class="col-md-6">
          <div class="row justify-content-end">
            <div class="col-3 mb-4">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-lg shadow-sm rounded-circle p-3 mt-n3 ml-5" data-aos="fade-up">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img17.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
            <div class="col-4 mb-4">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-xl shadow-sm rounded-circle p-4 mx-auto mt-5"
                data-aos="fade-up" data-aos-delay="50">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img12.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
            <div class="col-4 mb-4">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-xl shadow-sm rounded-circle p-4 ml-auto" data-aos="fade-up"
                data-aos-delay="150">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img13.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
          </div>

          <div class="row">
            <div class="col-3 offset-1 my-4">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-xl shadow-sm rounded-circle p-4 ml-auto" data-aos="fade-up"
                data-aos-delay="200">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img8.jpg')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
            <div class="col-3 offset-2 my-4">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-xl shadow-sm rounded-circle p-4 ml-auto" data-aos="fade-up"
                data-aos-delay="250">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img29.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
          </div>

          <div class="row d-none d-md-flex">
            <div class="col-6">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-lg shadow-sm rounded-circle p-3 ml-auto" data-aos="fade-up"
                data-aos-delay="300">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img35.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
            <div class="col-6 mt-6">
              <!-- Logo -->
              <div class="d-block bg-white avatar avatar-xl shadow-sm rounded-circle p-4 ml-auto" data-aos="fade-up"
                data-aos-delay="350">
                <img class="avatar-img" src="{{ asset('front/assets/img/160x160/img24.png')}}" alt="Image Description">
              </div>
              <!-- End Logo -->
            </div>
          </div>
        </div> --}}
      </div>
    </div>

    <!-- SVG Shape -->
    <figure class="position-absolute bottom-0 right-0 left-0">
      <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
        <polygon fill="#fff" points="0,273 1921,273 1921,0 " />
      </svg>
    </figure>
    <!-- End SVG Shape -->
  </div>
  <!-- End Hero Section -->

  <!-- Testimonials Section -->
  <div id="learnSection" class="container space-2 space-lg-3">
    <div class="overflow-hidden">
      <div class="container space-bottom-2">
        <div class="row justify-content-lg-center align-items-md-center">
          <div class="col-md-5 mb-11 mb-md-0">
            <div class="position-relative">
              <img class="img-fluid rounded-lg" src="{{ asset('front/assets/image/zakat.jpg')}}"
                alt="Image Description">

              <!-- SVG Elements -->
              <figure class="max-w-19rem w-100 position-absolute bottom-0 left-0 z-index-n1">
                <div class="mb-n7 ml-n7">
                  <img class="img-fluid" src="{{ asset('front/assets/svg/components/dots-2.svg')}}"
                    alt="Image Description">
                </div>
              </figure>
              <!-- End SVG Elements -->
            </div>
          </div>

          <div class="col-md-6 col-lg-5">
            <div class="pl-lg-5">

              <h3>Ramadhan Telah Tiba, Tapi Belum Tau Apa Itu Zakat Fitrah?</h3>

              <div class="mb-6 mt-3">
                <blockquote class="h4 font-weight-normal text-lh-lg">Zakat fitrah adalah zakat pribadi yang diwajibkan
                  atas diri setiap Muslim yang memiliki syarat-syarat tertentu yang ditunaikan pada bulan Ramadhan
                  sampai menjelang shalat Idul Fitri yang berfungsi untuk membersihkan diri dari perbuatan yang tidak
                  bermanfaat selama bulan puasa.</blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials Section -->


  <!-- Signup Form Section -->
  <div id="hireUsSection" class="bg-dark rounded mx-3 mx-xl-10" style="background-image: url({{ asset('front/assets/image/bg.jpg')}}); background-size: cover;
    background-position: center center;">
    <div class="container-xl container-fluid space-1 space-md-2 px-4 px-md-8 px-lg-10">
      <div class="row justify-content-lg-between align-items-lg-center">
        <div class="col-md-10 col-lg-5 mb-9 mb-lg-0">
          <h1 class="text-white">Perintah Zakat</h1>
          <p class="text-white-70">Sumber dari kitab suci Al-Qur'an</p>

          <div class="w-50">
            <hr class="opacity-xs my-5">
          </div>

          <!-- Carousel Main -->
          <div id="testimonialsNavMain" class="js-slick-carousel slick mb-4" data-hs-slick-carousel-options='{
                   "autoplay": true,
                   "autoplaySpeed": 7000,
                   "fade": true,
                   "infinite": true,
                   "asNavFor": "#testimonialsNavPagination"
                 }'>

            <div class="js-slide">
              <blockquote class="h3 text-white font-weight-normal mb-4"><em>"Dan laksanakanlah salat dan tunaikanlah
                  zakat. Dan segala kebaikan yang kamu kerjakan untuk dirimu, kamu akan mendapatkannya (pahala) di sisi
                  Allah. Sungguh, Allah Maha Melihat apa yang kamu kerjakan"</em></blockquote>
              {{-- <span class="h5 text-white">Al-Qur'an</span> --}}
              <small class="d-block text-white-70"><b>(QS. Al-Baqarah:110)</b></small>
            </div>

            <div class="js-slide">
              <blockquote class="h3 text-white font-weight-normal mb-4"><em>"Dan pada harta benda mereka ada hak untuk
                  orang miskin yang meminta dan orang miskin yang tidak meminta"</em></blockquote>
              {{-- <span class="h5 text-white">Al-Qur'an</span> --}}
              <small class="d-block text-white-70"><b>(QS. Az-Zariyat:92)</b></small>
            </div>

            <div class="js-slide">
              <blockquote class="h3 text-white font-weight-normal mb-4"><em>"Ambillah zakat dari harta mereka, guna
                  membersihkan dan menyucikan mereka, dan berdoalah untuk mereka. Sesungguhnya doamu itu (menumbuhkan)
                  ketenteraman jiwa bagi mereka. Allah Maha Mendengar, Maha Mengetahui"</em></blockquote>
              {{-- <span class="h5 text-white">Al-Qur'an</span> --}}
              <small class="d-block text-white-70"><b>(QS. At-Taubah:103)</b></small>
            </div>

          </div>
          <!-- End Carousel Main -->

          <!-- Carousel Pagination -->
          <div id="testimonialsNavPagination"
            class="js-slick-carousel slick slick-transform-off slick-pagination-modern" data-hs-slick-carousel-options='{
                   "infinite": true,
                   "slidesToShow": 3,
                   "centerMode": true,
                   "isThumbs": true,
                   "asNavFor": "#testimonialsNavMain"
                 }'>
            <div class="js-slide">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="{{ asset('front/assets/image/1.jpg')}}" alt="Image Description">
              </div>
            </div>

            <div class="js-slide">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="{{ asset('front/assets/image/3.jpg')}}" alt="Image Description">
              </div>
            </div>

            <div class="js-slide">
              <div class="avatar avatar-circle">
                <img class="avatar-img" src="{{ asset('front/assets/image/2.jpg')}}" alt="Image Description">
              </div>
            </div>
          </div>
          <!-- End Carousel Pagination -->
        </div>

        <div class="col-lg-6">
          <!-- Form -->
          {{Form::open(['route' => 'zakat.store', 'files' => true, 'class' => 'js-validate card'])}}
          {{ Form::hidden('saldo', $saldo) }}
          <div class="card-header bg-light text-center py-4 px-5 px-md-6">
            <h2 class="h4 mb-0">Bayar Zakat</h2>
          </div>

          <div class="card-body p-4 p-md-6">
            <div class="row">
              <div class="col-sm-12 mb-3">
                <!-- Form Group -->
                <div class="js-form-message form-group">
                  <label for="firstName" class="input-label">Nama</label>
                  {{Form::select('warga_id', $warga, null,['class' => 'js-custom-select custom-select', 'id' => 'zakat',
                  'size' => 1, 'style' => 'opacity: 0;',
                  'placeholder' => '--Pilih--'])}}
                </div>
                <!-- End Form Group -->
              </div>

              <div class="col-sm-12 mb-3">
                <!-- Form Group -->
                <div class="js-form-message form-group">
                  <label for="emailAddress" class="input-label">Pilih Jenis Zakat</label>
                  <!-- Select -->
                  <select name="jenis_zakat" class="js-custom-select custom-select" size="1" style="opacity: 0;"
                    data-hs-select2-options='{
                    "placeholder": "Pilih Zakat"
                    }'>
                    <option value="">--Pilih--</option>
                    <option value="1">Beras( 2,5 Kg) </option>
                    <option value="2">Uang</option>
                  </select>
                  <!-- End Select -->
                </div>
                <!-- End Form Group -->
              </div>

              <div class="col-sm-12 mb-3 devan" style="display: none;">
                <!-- Form Group -->
                <div class="js-form-message form-group">
                  <label for="emailAddress" class="input-label">Pilih Uang</label>
                  <!-- Select -->
                  <select name="uang" class="js-custom-select custom-select" size="1" style="opacity: 0;"
                    data-hs-select2-options='{
                    "placeholder": "Pilih Jenis Uang"
                    }'>
                    <option value="">--Pilih--</option>
                    <option value="12000">Uang Rp 12.000,- / Kg</option>
                    <option value="13000">Uang Rp 13.000,- / Kg</option>
                  </select>
                  <!-- End Select -->
                </div>
                <!-- End Form Group -->
              </div>

              {{-- <div class="col-sm-12 mb-3 devandewa" style="display: none;">
                <!-- Form Group -->
                <div class="js-form-message form-group">
                  <label for="emailAddress" class="input-label">Berat Beras</label>
                  <div class="input-group-prepend">
                    {{Form::number('beras', null, ['class' => 'form-control ', 'placeholder' => ''])}}
                    <span class="input-group-text">
                      <span>Kg</span>
                    </span>
                  </div>
                  <!-- End Select -->
                </div>
                <!-- End Form Group -->
              </div> --}}



              <!-- Checkbox -->
              <div class="js-form-message mb-5">
                <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                  <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required
                    data-msg="Please accept our Terms and Conditions.">
                  <label class="custom-control-label" for="termsCheckbox">
                    <small>
                      Saya menyetujui
                      <a class="link-underline">syarat dan ketentuan
                      </a>
                    </small>
                  </label>
                </div>
              </div>
              <!-- End Checkbox -->

              <button type="submit" class="btn btn-block btn-success transition-3d-hover">
                Kirim
                <i class="fas fa-angle-right fa-sm ml-1"></i>
              </button>
            </div>
            {{Form::close()}}
            <!-- End Form -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Signup Form Section -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


@include('footer')

<script>
  $(document).ready(function () {
    $('select[name=jenis_zakat]').change(function () {
      let isi = $(this).val();

      if (isi == '1') {
        $('.devandewa').show('slow');
      } else {
        $('.devandewa').hide('slow');
      }

      if (isi == '2') {
        $('.devan').show('slow');
      } else {
        $('.devan').hide('slow');
      }
    });
  });
</script>