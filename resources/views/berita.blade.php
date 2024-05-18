@extends('layouts.main')

@section('content')
    <main id="main">
        <section id="berita" class="berita section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Berita</h2>
            <h3>Berita <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>
    </div>

    <div class="container mb-5 mt-4" style="padding-left: 50px; padding-right: 80px;" data-aos="fade-up">
        <div class="row">
            <!-- Left column -->
            <div class="col-md-6 mb-md-0 mb-4">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{ $featured->berita_img }}" alt="..." style="height: 353px"/></a>
                    <div class="card-body">
                        <p class="mb-1">{{ \Carbon\Carbon::parse($featured->created_at)->format('d/m/Y')}}</p>
                        <h2 class="card-title">{{ $featured->berita_judul }}</h2>
                        <div class="category mb-3">{{ $featured->kategori_nama }}</div>
                        <p>{{ $featured->berita_isi }}</p>
                        <a class="button" href="" style="text-align: right">Read more →</a>
                    </div>
                </div>
            </div>


            <!-- Right column -->
            <div class="col-md-6">
                <div class="row mb-2">
                    <h3 style="font-size: 38px">Berita Terkini</h3>
                </div>
                @foreach($berita as $b)
                <div class="row mb-3">
                    <div class="d-flex">
                        <img src="{{$b->berita_img}}" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="child">
                                    <div>
                                        <p class="mb-1">{{ \Carbon\Carbon::parse($b->created_at)->format('d/m/Y')}}</p>
                                        <h2 class="card-title mb-1">{{ $b->berita_judul }}</h2>
                                        <div class="category mb-2">{{ $b->kategori_nama }}</div>
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

    

    <div class="container mb-3" style="padding-left: 120px; padding-right: 120px;">
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

    
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        @php
            $count = 0;
        @endphp
        @foreach ($berita as $b)
            @if ($count%2==0)
                <div class="row mb-3">
            @endif
                <div class="col-md-6">
                    <div class="d-flex">
                        <img src="{{ $b->berita_img }}" class="img-fluid me-3" alt="..." style="max-width: 130px; height: auto;">
                        <div class="card flex-grow-1">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="child">
                                    <div>
                                        <p class="mb-1">{{ \Carbon\Carbon::parse($b->created_at)->format('d/m/Y')}}</p>
                                        <h2 class="card-title mb-1">{{ $b->berita_judul }}</h2>
                                        <div class="category mb-2">{{ $b->kategori_nama }}</div>
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

    <!-- Page content-->
    {{-- <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="assets/img/tentangkami/1.png" alt="..." style="height: 400px"/></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2023</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <div class="badge bg-secondary mb-1" style="font-size: 12px">Kategori</div>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="assets/img/tentangkami/1.png" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <div class="badge bg-secondary mb-1" style="font-size: 10px">Kategori</div>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="assets/img/tentangkami/1.png" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <div class="badge bg-secondary mb-1" style="font-size: 10px">Kategori</div>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="assets/img/tentangkami/1.png" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <div class="badge bg-secondary mb-1" style="font-size: 10px">Kategori</div>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="assets/img/tentangkami/1.png" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2023</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <div class="badge bg-secondary mb-1" style="font-size: 10px">Kategori</div>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Web Design</a></li>
                                    <li><a href="#!">HTML</a></li>
                                    <li><a href="#!">Freebies</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">JavaScript</a></li>
                                    <li><a href="#!">CSS</a></li>
                                    <li><a href="#!">Tutorials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div> --}}
</section>

                
    </main>
@endsection