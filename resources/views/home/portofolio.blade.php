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
              <li class="has-children">
                <a href="#">Tentang Kami</a>
                <ul class="dropdown">
                  <li><a href="/tentang">Profil</a></li>
                  <li><a href="/jasa">Jasa</a></li>
                </ul>
              </li>
              <li><a href="/artikel">Artikel</a></li>
              <li class="active"><a href="/portofolio">Portofolio</a></li>
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

    <div class="hero page-inner overlay" style="background-image: url({{asset ('landing_page/assets/images/hero_bg_1.jpg')}})">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Portofolio</h1>

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
                  Portofolio
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 text-center mx-auto">
            <h3 class="font-weight-bold text-primary heading">
              Portofolio Bang Reno Property
            </h3>
            <h6>Cari referensi terbaik pembangunan / renovasi / rekomendasi interior</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="section section-properties">
      <div class="container">
        <div class="row">
      @foreach($portofolio as $item)
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="property-item mb-30">
              <a href="{{ url('/portofolio/' . $item->id) }}" class="img">
                <img src="{{ asset('uploads/' . $item->gambar) }}" alt="Image" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;"/>
              </a>

              <div class="property-content">
                <div class="price mb-2"></div>
                <div>
                  <span class="city d-block mb-3">{{ $item->judul }}</span>
                  <span class="d-block mb-3">{{ $item->kategori }}</span>
                  <a href="{{ url('/portofolio/' . $item->id) }}" class="btn btn-primary py-2 px-3">See details</a>
                </div>
              </div>
            </div>
            <!-- .item -->
          </div>
        @endforeach
        </div>
        <div class="row align-items-center py-5">
          <div class="col-lg-12 text-center">
            <div class="pagination justify-content-center">
            {{ $portofolio->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>

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
