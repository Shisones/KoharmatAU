<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a a class="nav-link scrollto {{ ($title == "Beranda") ? "active" : "" }}" href="/">Koharmat<span>AU</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ ($title == "Beranda") ? "active" : "" }}" href="/">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/berita">Berita Utama</a></li>
              <li><a href="/berita">Berita Koharmat</a></li>
              <li><a href="/berita">Berita Lainnya</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              {{-- <li class="dropdown"><a href="#"><span>Profil Koharmat</span> <i class="bi bi-chevron-down"></i></a> --}}
              <li><a class="nav-link {{ ($title == "Profil Koharmat") ? "active" : "" }}" href="/profil">Profil Koharmat</a></li>
              <li class="dropdown"><a href="#"><span>Sejarah</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a class="nav-link {{ ($title == "Struktur Organisasi") ? "active" : "" }}" href="/strukturorganisasi">Struktur Organisasi</a></li>
              <li><a class="nav-link {{ ($title == "Organisasi Koharmat") ? "active" : "" }}" href="/strukturorganisasi">Organisasi Koharmat</a></li>
              {{-- <li class="dropdown"><a href="#"><span>Organisasi</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}
            </ul>
          </li>
          <li><a class="nav-link scrollto {{ ($title == "Galeri") ? "active" : "" }}" href="/galeri">Galeri</a></li>
          <li><a class="nav-link scrollto {{ ($title == "Kontak") ? "active" : "" }}" href="/kontak">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->