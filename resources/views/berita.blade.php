@extends('layouts.main')

@section('content')
    <main id="main">
    <section id="berita" class="berita section-bg" style="padding-right: 120px; padding-left: 120px">
        <div class="container" data-aos="fade-up">
  
            <div class="section-title">
              <h3>Berita Utama <span>KoharmatAU</span></h3>
              <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>
        </div>

    <div class="container mb-5 mt-4" style="" data-aos="fade-up">
        <div class="row">
            <!-- Left column -->
            <a href="/detailberita/{{ $featured[0]->berita_slug }}">
                <div class="col-md-6 mb-md-0 mb-4">
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="{{ $featured[0]->berita_img }}" alt="..." /></a>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                <p class="mb-1">{{ \Carbon\Carbon::parse($featured[0]->created_at)->format('d/m/Y')}}</p>
                                <p class="mb-0 ms-2 me-2 mb-1" style="font-size: 14px">|</p>
                                <i class="bi bi-pen me-2 mb-1"></i>
                                <p class="mb-1">Nama Penulis</p>
                                <div class="category mb-2 ms-auto">{{ $featured[0]->kategori->kategori_nama }}</div>
                            </div>
                            {{-- <p class="mb-1">{{ \Carbon\Carbon::parse($featured[0]->created_at)->format('d/m/Y')}}</p> --}}
                            {{-- <h2 class="card-title">{{ $featured[0]->berita_judul }}</h2> --}}
                            <a href="/detailberita"><h2 class="card-title mb-2">{{ $featured[0]->berita_judul }}</h2></a>
                            {{-- <div class="category mb-3">{{ $featured[0]->kategori->kategori_nama }}</div> --}}
                            <p>{{ $featured[0]->berita_isi }}</p>
                        </div>
                    </div>
                </div>
            </a>
    
            <!-- Right column -->
            <div class="col-md-6 d-flex flex-column">
                <div class="row mb-2">
                    <h3 style="font-size: 24px">Berita Terkini</h3>
                </div>
                @foreach($berita as $b)
                <div class="row mb-3">
                    <div class="d-flex w-100">
                        <div class="image-container-terkini me-3">
                            <img src="{{$b->berita_img}}" class="img-fluid me-3 img-1-1" alt="..." style="">
                        </div>
                        <div class="card flex-grow-1" style="height: 120px">
                            <div class="card-body-terkini d-flex flex-column justify-content-between">
                                <div class="child">
                                    <div>
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                            <p class="mb-1">{{ \Carbon\Carbon::parse($b->created_at)->format('d/m/Y')}}</p>
                                            <p class="mb-0 ms-2 me-2 mb-1" style="font-size: 14px">|</p>
                                            <i class="bi bi-pen me-2 mb-1"></i>
                                            <p class="mb-1">Nama Penulis</p>
                                            <div class="category mb-2 ms-auto">{{ $b->kategori->kategori_nama }}</div>
                                        </div>
                                        <a href="/detailberita"><h2 class="card-title mb-2">{{ $b->berita_judul }}</h2></a>
                                        {{-- <h2 class="card-title mb-1">{{ $b->berita_judul }}</h2> --}}
                                        <p class="card-text mb-1">{{ $b->berita_isi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </div>

    <div class="container mb-3" style="">
        <div class="row">
            <div class="col-md-6 mb-3">
                <select class="form-select">
                    <option value="all">Pilih Kategori Berita</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Cari berita" aria-label="Cari berita" aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Cari</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container" style="">
        @php
            $count = 0;
        @endphp
        @foreach ($berita as $b)
            @if ($count%2==0)
                <div class="row mb-3">
            @endif
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="image-container me-3">
                        {{-- <img src="assets/img/tentangkami/2.png" class="img-fluid img-1-1" alt="..."> --}}
                        <img src="{{ $b->berita_img }}" class="img-fluid me-3 img-1-1" alt="..." style="">
                    </div>
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <div class="d-flex align-items-center mb-1"> 
                                        <i class="bi bi-calendar2 me-2"></i>
                                        <p class="mb-0">{{ \Carbon\Carbon::parse($b->created_at)->format('d/m/Y') }}</p>
                                        <p class="mb-0 ms-2 me-2 mb-1" style="font-size: 14px">|</p>
                                        <i class="bi bi-pen me-2 mb-1"></i>
                                        <p class="mb-1">Nama Penulis</p>
                                        <div class="category mb-2 ms-auto">{{ $b->kategori->kategori_nama }}</div>
                                    </div>
                                    <a href="/detailberita"><h2 class="card-title mb-2">{{ $b->berita_judul }}</h2></a>
                                    {{-- <h2 class="card-title mb-2">{{ $b->berita_judul }}</h2> --}}
                                    <p class="card-text mb-1">{{ $b->berita_isi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if ($count%2==0)
                @php
                    $count++;   
                @endphp
            @else
                </div>
                @php
                    $count = 0;     
                @endphp
            @endif
        @endforeach
            
            {{-- <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="d-flex">
                    <img src="assets/img/tentangkami/1.png" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                    <div class="card flex-grow-1">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="child">
                                <div>
                                    <p class="mb-1">1 Januari 2023</p>
                                    <h2 class="card-title mb-1">Judul Berita</h2>
                                    <div class="category mb-2">Kategori</div>
                                    <p class="card-text mb-1">Deskripsi</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
        </div>
        <br>
        <!-- Pagination-->
        <nav aria-label="Pagination">
            {{-- <hr class="my-0" /> --}}
            <ul class="pagination justify-content-center my-4 mt-6">
                
                <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                <li class="page-item"><a class="page-link" href="#!">15</a></li>
            </ul>
        </nav>
        <!-- More card elements can be added here -->
    </div>

</section>

                
    </main>
@endsection