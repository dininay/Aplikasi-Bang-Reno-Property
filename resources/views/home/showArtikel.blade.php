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
              <li class="active"><a href="/artikel">Artikel</a></li>
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

    <div class="hero page-inner overlay" style="background-image: url({{asset ('landing_page/assets/images/hero_bg_3.jpg')}})">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">{{ $artikel->judul }}</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                ><a href="/artikel">Artikel</a>
                </li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  {{ $artikel->judul }}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-9 align-item-center">
            <h2 class="font-weight-bold heading text-primary mb-4 text-center">{{$artikel->judul}}</h2>
            <h5 class="text-center text-black-50">
              Tentang - {{$artikel->kategori}}
            </h5>
            <h6 class="text-center text-black-50">
              Dibuat {{$artikel->created_at}}
            </h6>
          </div>
          <div class="col-lg-12">
          </div>
        </div>
      </div>
    </div>
    <!-- Tentang Kami Start -->
    <div class="section pt-0">
      <div class="container">
        <div class="row justify-content-between mb-2">
          <div class="col-lg-5 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
            <img src="{{ asset('uploads/' . $artikel->gambar) }}" class="img-fluid" width="500" height="500">
            </div>
          </div>
          <div class="col-lg-6">
            <div class=" feature-h">
              <h2 class="font-weight-bold heading text-primary mb-4">
              </h2>
              <h6 class="text-black mb-3">
              {{ $artikel->isi }}
              </h6>
              <h6 class="text-black mb-3">
              {{ $artikel->isi2 }}
              </h6>
              <h6 class="text-black">
              {{ $artikel->isi3 }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-info">
              <div class="address mt-2">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
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
                <p>bangrenoproperty@gmail.com</p>
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
