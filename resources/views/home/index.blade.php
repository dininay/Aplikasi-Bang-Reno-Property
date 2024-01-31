<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Bang Reno Property" />
    <link rel="shortcut icon" href="{{asset ('landing_page/assets/images/favicon.png')}}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{asset ('landing_page/assets/fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{asset ('landing_page/assets/fonts/flaticon/font/flaticon.css')}}" />

    <link rel="stylesheet" href="{{asset ('landing_page/assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset ('landing_page/assets/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset ('landing_page/assets/css/style.css')}}" />

    <title>
      Bang Reno Property
    </title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="/" class="logo m-0 float-start">Bang Reno Property</a>

            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="/">Home</a></li>
              <li class="has-children">
                <a href="#">Tentang Kami</a>
                <ul class="dropdown">
                  <li><a href="/tentang">Profil</a></li>
                  <!-- <li class="has-children">
                    <a href="#">Jasa</a>
                    <ul class="dropdown"> -->
                  <li><a href="/jasa">Jasa</a></li>
                </ul>
              </li>
              <li><a href="/artikel">Artikel</a></li>
              <li><a href="/portofolio">Portofolio</a></li>
              <li><a href="/kontak">Kontak</a></li>
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <div class="hero overlay" style="background-image: url({{asset ('landing_page/assets/images/hero_bg_2.jpg')}})" alt="">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-8 text-center">
            <h1 class="heading" data-aos="fade-up">
              Bangun & Renovasi Rumah Impianmu
            </h1>
            <h4 class="text-white"data-aos="fade-up">Bersama Bang Reno Property</h4>
          </div>
        </div>
      </div>
    </div>
    <!-- Tentang Kami Start -->
    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-10">
            @foreach($tentang as $item)
            <h3 class="font-weight-bold heading text-primary mb-4">
            {{ $item->judul }}
            </h3>
            <p class="text-black-50">
            {{ $item->tentang }}
            </p>
            @endforeach
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-6 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="{{asset('landing_page/assets/images/hero_bg_3.jpg')}}" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-6">
          @foreach($keunggulan as $item)
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-home2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">{{ $item->keunggulan }}</h3>
                <p class="text-black-50">
                {{ $item->detail }}
                </p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- <div class="row section-counter mt-5">
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">30</span></span
              >
              <span class="caption text-black-50">Pembangunan</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">100</span></span
              >
              <span class="caption text-black-50">Renovasi</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">30</span></span
              >
              <span class="caption text-black-50">Pilihan Jasa</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">50</span></span
              >
              <span class="caption text-black-50">Kerjasama</span>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <!-- Portofolio Start -->
    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Portofolio
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="/portofolio"
                class="btn btn-primary text-white py-3 px-4"
                >Lihat Portofolio Lainnya</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                @foreach($portofolio as $item)
                <div class="property-item">
                  <a href="{{ url('/portofolio/' . $item->id) }}" class="img">
                    <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Image" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;"/>
                  </a>
                  <div class="property-content">
                    <div class="price mb-2"><span>{{$item->judul}}</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >{{$item->kategori}}</span
                      >

                      <a
                        href="{{ url('/portofolio/' . $item->id) }}"
                        class="btn btn-primary py-2 px-3"
                        >Lihat Detail</a
                      >
                    </div>
                  </div>
                </div>
                @endforeach
                <!-- .item -->
              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jasa Start -->
    <div class="section bg-light">
      <div class="container">
      <div class="col-lg-12 text-center mb-5">
          <h2 class="font-weight-bold text-primary heading">
              Jasa
          </h2>
      </div>
          
        <div class="row">
              @foreach($jasa as $item)
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
              <span class="flaticon-house mb-4 d-block"></span>
              <h3 class="text-black mb-3 font-weight-bold">
              {{ $item->jasa }}
              </h3>
              <p class="text-black">
              Rp. {{ number_format($item->harga, 0, ',', '.') }}
              </p>
              <p><a href="{{ url('/jasa/' . $item->id) }}" class="learn-more">Lihat Detail</a></p>
            </div>
          </div>
              @endforeach
        </div>
        <div class="row align-items-center py-5">
          <div class="col-lg-12 text-center">
            <div class="pagination justify-content-center">
            {{ $jasa->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Simulasi Biaya Start -->
    <div class="section">
      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-8 mx-auto text-center">
          <h4 class="mb-4">Percayakan Hunian Nyaman & Terjangkau Bersama Bang Reno Property</h4>
          <h6 class="mb-4">Coba Cek Estimasi Biaya Rumahmu !</h6>
          <!-- <p>
            <a
              href="#"
              target="_blank"
              class="btn btn-primary text-white py-3 px-4"
              >Chat Whatssapp Admin</a
            >
          </p> -->
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
            <form action="{{ route('hitung.biaya') }}" method="post">
            @csrf
              <div class="row">
                <div class="col-4 mb-0">
                <h5 for="luas">Luas Bangunan</h5>
                </div>
                <div class="col-8 mb-3">
                    <input type="number" class="form-control" id="luas" name="luas" placeholder="Luas Bangunan" required>
                </div>
                <div class="col-4 mb-3">
                    <h5 for="jenislayanan">Jenis Layanan</h5>
                </div>
                <div class="col-8 mb-3 form-group">
                  <select class="form-control" name="jenislayanan" required>
                      <option value="">Pilih Kategori</option>
                      @foreach($jasa as $item)
                          <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->jasa }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary">Hitung Biaya</button>
              </div>
              </div>
            </form>
            @if(session('biaya'))
            <div class="alert alert-success mt-3">
                <h4>Biaya Jasa Yang Anda Butuhkan Adalah</h4>
                <h6>Rp.{{ number_format(session('biaya'), 0, ',', '.') }}</h6>
            </div>
            @endif
          </div>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- Hubungi Kami / Pesan User Start -->
    <div class="section bg-light">
      <div class="container">
        <div class="row" data-aos="fade-up">
        <h3 class="mb-4 text-center">Hubungi Bang Reno Property</h3>
          <h6 class="mb-4 text-center">Lanjut Kerjasama Proyek / Pertanyaan Lebih Lanjut Melalui Form Dibawah Ini !</h6>
          <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-info">
              <div class="address mt-2">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
                Jl. Raya Kasin Ampeldento Karangploso<br />
                 Malang Jawa Timur Indonesia
                </p>
              </div>

              <div class="open-hours mt-4">
                <i class="icon-clock-o"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                  Senin - Sabtu :<br />
                  07.00 - 17.00 WIB
                </p>
              </div>

              <div class="email mt-4">
                <i class="icon-envelope"></i>
                <h4 class="mb-2">Email:</h4>
                <p>admin@bangrenopropertymlg.com</p>
              </div>

              <div class="phone mt-4">
                <i class="icon-phone"></i>
                <h4 class="mb-2">Kontak Whatssapp:</h4>
                <p>+62 8510 3436 135</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <form action="/submit-kerjasama" method="post">
              @csrf
              <div class="row">
                <div class="col-6 mb-3">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"/>
                </div>
                <div class="col-6 mb-3">
                  <input type="number" class="form-control" name="nowa" placeholder="No Whatsapp Aktif"/>
                </div>
                <div class="col-12 mb-3">
                  <label for="kategori">Kategori Pertanyaan</label>
                  <select class="form-control" name="kategori" id="kategori">
                      <option value="">Kategori Pertanyaan Anda</option>
                      <option value="Pembangunan">Pembangunan</option>
                      <option value="Renovasi">Renovasi</option>
                      <option value="Interior">Interior</option>
                      <option value="Lain-Lain">Lain-Lain</option>
                      <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <textarea name="pesan" id="" cols="30" rows="7" class="form-control" placeholder="Detail Pertanyaan / Proyek Kerjasama"></textarea>
                </div>

                <div class="col-12 mb-3">
                  <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </div>
              </div>
            </form>
            @if(Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Rating Start -->
    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6" data-aos="fade-up">
            <h3 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Rating
            </h3>
          </div>
          <div class="col-md-6 text-md-end" data-aos="fade-up">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6 col-lg-3 col-md-2 col-sm-6"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
                @foreach($rating as $item)
            <div class="item">
              <div class="testimonial">
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">{{ $item->tempat }}</h3>
                <blockquote>
                  <p>
                    &ldquo;{{ $item->rating }}&rdquo;
                  </p>
                </blockquote>
              </div>
            </div>
                @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="site-footer">
      <div class="container">
        <div class="row">
        <div class="col-lg-5">
            <div class="widget">
              <h3>Kontak</h3>
              <address>Jl. Raya Kasin Ampeldento Karangploso Malang Jawa Timur</address>
              @foreach($kontak as $item)
              <ul class="list-unstyled">
                @if($item->id === 1)
                <li><a href="{{ $item->link }}">{{ $item->kontak }}</a></li>
                @endif
                @if($item->id === 2)
                <li><a href="{{ $item->link }}">{{ $item->kontak }}</a></li>
                @endif
                @if($item->id === 3)
                <li>
                  <a href="{{ $item->link }}">{{ $item->kontak }}</a>
                </li>
                @endif
              </ul>
              @endforeach  
            </div>
            <!-- /.widget -->
          </div>        
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="/tentang">Tentang Kami</a></li>
                <li><a href="/jasa">Simulasi Biaya</a></li>
                <li><a href="/jasa">Jasa</a></li>
                <li><a href="/kontak">Kerjasama</a></li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-3">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="/tentang">Artikel</a></li>
                <li><a href="/jasa">Portofolio</a></li>
              </ul>
              <ul class="list-unstyled social">
                @foreach($kontak as $item)
                @if($item->id === 4)
                <li>
                  <a href="{{ $item->link }}"><span class="icon-instagram"></span></a>
                </li>
                @endif
                @if($item->id === 5)
                <li>
                  <a href="{{ $item->link }}"><span class="icon-facebook"></span></a>
                </li>
                @endif
                @if($item->id === 6)
                <li>
                  <a href="{{ $item->link }}"><span class="icon-linkedin"></span></a>
                </li>
                @endif
                @if($item->id === 7)
                <li>
                  <a href="{{ $item->link }}"><span class="icon-pinterest"></span></a>
                </li>
                @endif
              @endforeach
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
          <div class="col-12 text-center">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; by
              <a href="#">Bang Reno Property</a>
              <!-- License information: https://untree.co/license/ -->
            </p>
            
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="{{asset('landing_page/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/aos.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/navbar.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/counter.js')}}"></script>
    <script src="{{asset('landing_page/assets/js/custom.js')}}"></script>
    
  </body>
</html>