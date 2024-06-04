@extends('layouts.main')

@section('content')
    <main id="main">
        <!-- ======= Portfolio Section ======= -->
    <section id="pesanmasyarakat" class="pesanmasyarakat">
        {{-- <div class="container" data-aos="fade-up"> --}}
  
          <div class="section-title">
            <h3>Pesan untuk <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
          
          {{-- <div class="container mb-3"> --}}
          <br><div class="row">
              {{-- <div class="card mb-4"> --}}
                <div class="search-bar">
                  
                  <div class="input-group">
                    <input class="form-control" type="text" placeholder="Cari Pertanyaan Anda" aria-label="Cari Pertanyaan Anda" aria-describedby="button-search" />
                    {{-- <div class="input-group-append"> --}}
                      <button class="btn btn-primary" id="button-search" type="button">Cari</button>
                      {{-- </div> --}}
                    </div>
                </div>
              {{-- </div> --}}
          </div><br><br>
        {{-- </div> --}}
        
        
    
          
  
          {{-- <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200" style="align-content: center;"> --}}
          <div class="row d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <ul class="pesanmasyarakat-list">
              @php
                $pesanNo = 1;
              @endphp
              @foreach ($pesan as $item)
                <li>
                  <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{$pesanNo}}">
                    <h2>{{ $item->pesan_subjek }}</h2>
                    <p>{{ $item->pesan_isi }}</p>
                    {{-- <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i> --}}
                  </div>
                  @php
                    $balasanNo = 1;
                  @endphp
                  @foreach ($item->balasan as $balasan)
                    <div id="faq{{$pesanNo}}" class="collapse" data-bs-parent=".pesanmasyarakat-list">
                      <h2>Balasan Koharmat<span>AU</span> {{ $balasanNo }}</h2>
                      <p>
                        {{ $balasan->balasan_isi }}
                      </p>
                    </div>
                    @php
                      $balasanNo++;
                    @endphp
                  @endforeach
                <li>
                  @php
                    $pesanNo++;
                  @endphp
              @endforeach
              
            </ul>

          </div>
            
  
        {{-- </div> --}}
      </section><!-- End Portfolio Section -->
    
    </main>
@endsection