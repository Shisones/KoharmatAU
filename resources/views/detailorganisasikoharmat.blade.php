@extends('layouts.main')

@section('content')
    <main id="main">
     
        <!-- ======= Detail Organisasi KoharmatAU ======= -->
    <section id="detailorganisasikoharmat" class="detailorganisasikoharmat section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h3>Nama Organisasi</h3>
          </div>
        </div>
        <section class="detail py-1 bg-light">
          <div class="container px-1 my-3">
              <div class="row gx-5 align-items-center">
                  <div class="col-lg-6 d-flex justify-content-start">
                    <div class="image-container me-3">
                        <img src="assets/img/logo-Koharmatau.png" class="img-fluid me-3" alt="..." style="">
                    </div>
                    {{-- <img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/300x300/343a40/6c757d" alt="..." /> --}}
                  </div>
                  <div class="col-lg-6">
                      <h2 class="fw-bolder">Deskripsi</h2>
                      <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                    </div>
                </div>
            </div>
        </section>
    </section><!-- End Detail Organisasi KoharmatAU -->
    
    
    </main>
@endsection