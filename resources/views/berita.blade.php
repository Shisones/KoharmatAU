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
                                <p class="mb-1">{{ $featured[0]->penulis_nama }}</p>
                                <div class="category mb-2 ms-auto">{{ $featured[0]->kategori->kategori_nama }}</div>
                            </div>
                            {{-- <p class="mb-1">{{ \Carbon\Carbon::parse($featured[0]->created_at)->format('d/m/Y')}}</p> --}}
                            {{-- <h2 class="card-title">{{ $featured[0]->berita_judul }}</h2> --}}
                            <a href="/detailberita/{{$featured[0]->berita_slug}}"><h2 class="card-title mb-2">{{ $featured[0]->berita_judul }}</h2></a>
                            {{-- <div class="category mb-3">{{ $featured[0]->kategori->kategori_nama }}</div> --}}
                            <p>{!! $featured[0]->berita_isi !!}</p>
                        </div>
                    </div>
                </div>
            </a>
    
            <!-- Right column -->
            <div class="col-md-6 d-flex flex-column">
                <div class="row mb-2">
                    <h3 style="font-size: 24px">Berita Terkini</h3>
                </div>
                @foreach($terkini as $b)
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
                                            <p class="mb-1">{{ $b->penulis_nama }}</p>
                                            <div class="category mb-2 ms-auto">{{ $b->kategori->kategori_nama }}</div>
                                        </div>
                                        <a href="/detailberita/{{$b->berita_slug}}"><h2 class="card-title mb-2">{{ $b->berita_judul }}</h2></a>
                                        {{-- <h2 class="card-title mb-1">{{ $b->berita_judul }}</h2> --}}
                                        <p class="card-text mb-1">{!! $b->berita_isi !!}</p>
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
        <form action="{{ route('berita.filter') }}" method="GET">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <select class="form-select" id="kategori" name="kategori">
                        <option value="all" {{ ($request->kategori == "all") ? 'selected' : '' }}>Semua Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{$item->kategori_id}}" {{ ($request->kategori == $item->kategori_id) ? 'selected' : '' }}>{{$item->kategori_nama}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-4">
                        
                        <div class="input-group">
                            <input class="form-control" id="kata_kunci" name="kata_kunci" type="text" placeholder="Cari berita" value="{{ $request->kata_kunci }}" aria-label="Cari berita" aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    
    <div class="container" style="">
        @php
            $count = 0;
        @endphp
        {{-- @if (Route::is('/berita-filter'))
            <div id="newsItems">

            </div>
        @else --}}
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
                                            <p class="mb-1">{{ $b->penulis_nama }}</p>
                                            <div class="category mb-2 ms-auto">{{ $b->kategori->kategori_nama }}</div>
                                        </div>
                                        <a href="/detailberita/{{$b->berita_slug}}"><h2 class="card-title mb-2">{{ $b->berita_judul }}</h2></a>
                                        {{-- <h2 class="card-title mb-2">{{ $b->berita_judul }}</h2> --}}
                                        <p class="card-text mb-1">{!! $b->berita_isi !!}</p>
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
        {{-- @endif --}}
            
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

    {{-- <script>
        $(document).ready(function() {
            $('#searchForm').submit(function(event) {
                event.preventDefault();
                var kata_kunci = $('#kata_kunci').val();
                var kategori = $('#kategori').val();
                console.log(kategori);
    
                $.ajax({
                    url: '{{ route("berita.filter") }}',
                    method: 'GET',
                    datatype: 'json',
                    data: {kategori: kategori, kata_kunci: kata_kunci},
                    success: function(data) {
                        var newsItems = $('#newsItems');
                        newsItems.empty();
                        
                        if (data.length > 0) {
                            data.forEach(function(news) {
                                var newsItem = `<div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="d-flex">
                                            <div class="image-container me-3">
                                                <img src="${news.berita_img}" class="img-fluid me-3 img-1-1" alt="...">
                                            </div>
                                            <div class="card flex-grow-1">
                                                <div class="card-body d-flex flex-column justify-content-between">
                                                    <div class="child">
                                                        <div>
                                                            <div class="d-flex align-items-center mb-1"> 
                                                                <i class="bi bi-calendar2 me-2"></i>
                                                                <p class="mb-0">${news.created_at}</p>
                                                                <p class="mb-0 ms-2 me-2 mb-1" style="font-size: 14px">|</p>
                                                                <i class="bi bi-pen me-2 mb-1"></i>
                                                                <p class="mb-1">Nama Penulis</p>
                                                                <div class="category mb-2 ms-auto">${news.kategori_nama}</div>
                                                            </div>
                                                            <a href="/detailberita/${news.berita_slug}"><h2 class="card-title mb-2">${news.berita_judul}</h2></a>
                                                            <p class="card-text mb-1">${news.berita_isi}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                                newsItems.append(newsItem);
                            });
                        } else {
                            newsItems.append('<p>No results found.</p>');
                        }
    
                        // Update the URL with the search keyword
                        // var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?query=' + encodeURIComponent(query) + '&category=' + encodeURIComponent(category);
                        // history.pushState({path: newUrl}, '', newUrl);
                    }
                });
            });
    
            // Trigger search if there's a query in the URL on page load
            var initialQuery = $('#query').val();
            if (initialQuery) {
                $('#searchForm').submit();
            }
        });
    </script> --}}
@endsection