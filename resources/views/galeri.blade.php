@extends('layouts.main')

@section('content')
    <main id="main">
        <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h3>Galeri <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                {{-- <li data-filter="*" class="filter-active">All</li> --}}
                <li data-filter=".filter-foto" class="filter-active">Foto</li>
                <li data-filter=".filter-video">Video</li>
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-containergaleri d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200" style="align-content: center;">
            
            <div class="col-lg-4 col-md-6 portfolio-item filter-foto" style="width: 300px; height: 300px;">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="details-container">
                <h2>Nama</h2>
                <p>Tanggal</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-foto" style="width: 300px; height: 300px;">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="details-container">
                <h2>Nama</h2>
                <p>Tanggal</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 portfolio-item filter-foto" style="width: 300px; height: 300px;">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="details-container">
                <h2>Nama</h2>
                <p>Tanggal</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-video" style="width: 300px; height: 300px;">
                <video controls>
                    <source src="assets/video/1.mp4" type="video/mp4">
                </video>
                <div class="details-container">
                    <h2>Nama</h2>
                    <p>Tanggal</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-video" style="width: 300px; height: 300px;">
                <video controls>
                    <source src="assets/video/2.mp4" type="video/mp4">
                </video>
                <div class="details-container">
                    <h2>Nama</h2>
                    <p>Tanggal</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-video" style="width: 300px; height: 300px;">
                <video controls>
                    <source src="assets/video/3.mp4" type="video/mp4">
                </video>
                <div class="details-container">
                    <h2>Nama</h2>
                    <p>Tanggal</p>
                </div>
            </div>
          </div>
            
  
        </div>
      </section><!-- End Portfolio Section -->
    
    </main>
@endsection