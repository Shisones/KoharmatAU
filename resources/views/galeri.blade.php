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
                          <li data-filter="*" class="filter-active">All</li>
                          <li data-filter=".filter-foto">Foto</li>
                          <li data-filter=".filter-video">Video</li>
                      </ul>
                  </div>
              </div>

              <div class="row portfolio-containergaleri d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200" style="align-content: center;">
                  
                  @foreach($image as $img)
                      <div class="col-lg-4 col-md-6 portfolio-item filter-foto" style="width: 300px; height: 300px;">
                          <img src="{{ $img->galeri_path }}" class="img-fluid" alt="">
                          <div class="details-container">
                              <h2>{{ $img->galeri_judul }}</h2>
                              <p>{{ \Carbon\Carbon::parse($img->galeri_tanggal)->format('d/m/Y')}}</p>
                          </div>
                      </div>
                  @endforeach

                  @foreach($video as $v)
                      <div class="col-lg-4 col-md-6 portfolio-item filter-video" style="width: 300px; height: 300px;">
                          <video controls>
                              <source src="{{$v->galeri_path}}" type="video/mp4">
                          </video>
                          <div class="details-container">
                              <h2>{{$v->galeri_judul}}</h2>
                              <p>{{ \Carbon\Carbon::parse($v->galeri_tanggal)->format('d/m/Y')}}</p>
                          </div>
                      </div>
                  @endforeach

              </div>
          </div>
      </section><!-- End Galeri Section -->
    </main>

    <script>
      // Portfolio filter
      document.addEventListener('DOMContentLoaded', () => {
          const portfolioContainer = document.querySelector('.portfolio-containergaleri');
          if (portfolioContainer) {
              const portfolioFilters = document.querySelectorAll('#portfolio-flters li');
              const portfolioItems = portfolioContainer.querySelectorAll('.portfolio-item');

              portfolioFilters.forEach(filter => {
                  filter.addEventListener('click', () => {
                      portfolioFilters.forEach(el => el.classList.remove('filter-active'));
                      filter.classList.add('filter-active');

                      const filterValue = filter.getAttribute('data-filter');
                      portfolioItems.forEach(item => {
                          if (filterValue === '*' || item.classList.contains(filterValue.replace('.', ''))) {
                              item.style.display = 'block';
                          } else {
                              item.style.display = 'none';
                          }
                      });
                  });
              });
          }
      });
  </script>
@endsection