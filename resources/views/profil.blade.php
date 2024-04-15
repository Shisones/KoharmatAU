@extends('layouts.main')

@section('content')
    <main id="main">
     
        <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Tentang Kami</h2>
            <h3>Tentang <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="about-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-sejarahsingkat">Sejarah Singkat</li>
                    <li data-filter=".filter-visimisi">Visi Misi</li>
                    <li data-filter=".filter-tugas">Tugas</li>
                </ul>
            </div>
        </div>
        <!-- About section one-->
        <section class="py-5 bg-light" id="about">
          <div class="container px-5 my-50">
              <div class="row gx-5 align-items-center">
                  <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                  <div class="col-lg-6">
                      <h2 class="fw-bolder">Sejarah Singkat</h2>
                      <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                  </div>
              </div>
          </div>
        </section>
        <!-- About section two-->
        <section class="py-5" id="about">
            <div class="container px-5 my-50">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">Visi &amp; Misi</h2>
                        <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section three-->
        <section class="py-5 bg-light" id="about">
          <div class="container px-5 my-50">
              <div class="row gx-5 align-items-center">
                  <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                  <div class="col-lg-6">
                      <h2 class="fw-bolder">Tugas</h2>
                      <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                  </div>
              </div>
          </div>
      </section>
    </section><!-- End About Section -->
    
    
    </main>
@endsection