<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
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
              <li class=""><a href="/">Home</a></li>
              <li class="has-children active">
                <a href="#">Tentang Kami</a>
                <ul class="dropdown">
                  <li><a href="/tentang">Profil</a></li>
                  <li class="active"><a href="/jasa">Jasa</a></li>
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

    <div
      class="hero page-inner overlay"
      style="background-image: url('{{asset ('landing_page/assets/images/hero_bg_1.jpg')}}')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Jasa</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Jasa
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- Jasa Start -->
    <div class="section bg-light">
      <div class="container">
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
                <h6>Rp.{{ number_format(session('biaya'), 0, ',', '.') }}
</h6>
            </div>
            @endif
          </div>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
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
