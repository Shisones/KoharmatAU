@extends('layouts.main')

@section('content')
    <main id="main">
        <section id="detailberita" class="detailberita section-bg">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <!-- Main Content -->
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="image-container-current me-3">
                                <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                            </div>
                            {{-- <img src="assets/img/tentangkami/3.png" class="card-img-top" alt="Berita Image"> --}}
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar2 me-2"></i>
                                    <p class="mb-0">21/02/2024</p>
                                    <p class="mb-0 ms-2 me-2" style="font-size: 14px">|</p>
                                    <i class="bi bi-pen me-2"></i>
                                    <p class="mb-0">Nama Penulis</p>
                                    <p class="mb-0 ms-2 me-2" style="font-size: 14px">|</p>
                                    <i class="bi bi-eye-fill me-2"></i>
                                    <p class="mb-0">Dibaca: 1900 kali</p>
                                    <div class="category ms-auto">kategori</div>
                                </div>
                                <h2 class="card-title mb-3">Judul Berita</h2>
                                <p class="card-text">
                                    TNI AU. Guna meningkatkan minat kedirgantaraan, Lanud Halim Perdanakusuma menerima kunjungan ratusan siswa-siswi dari SD Angkasa 5, TK Cendikia Pasir Putih Depok, Kembangi Kidz Club Jakarta, TKIT Kreasi Insani Madani dan TK Ceria, Rabu (22/5/2024).

                                    Dalam kunjungan ini, para siswa sangat antusias mendengarkan penjelasan tentang perkembangan dan tugas-tugas Lanud Halim Perdanakusuma, yang disampaikan oleh staf Pembinaan Potensi Dirgantara (Binpotdirga) Lanud Halim P. Para siswa juga diberikan kesempatan mengunjungi sebagian alutsista yang ada seperti kunjungan ke Skadron Udara 2, Monumen Fokker F-28, dan Museum Lanud Halim Perdanakusuma.

                                    “Dengan adanya kunjungan wisata ke Lanud Halim P., kami berharap dapat menumbuhkan minat kedirgantaraan sejak dini kepada para siswa serta mengenalkan pesawat yang dimiliki TNI Angkatan Udara dan berada di Lanud Halim P,” ujar Ibu Yuliani salah satu guru pendamping.

                                    “Kami sangat senang bisa melihat secara langsung pesawat TNI AU dan dapat naik pesawat secara bergantian. Hal ini menjadi kebanggaan bagi anak didik,” tambahnya.
                                </p>
                                <div class="tags">
                                    <h5>Tag:</h5>
                                    <span class="badge">#Tag1</span>
                                    <span class="badge">#Tag2</span>
                                    <span class="badge">#Tag3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="row mb-2">
                            <h3 style="font-size: 26px">Berita Populer</h3>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row mt-4">
                            <h3 style="font-size: 26px">Berita Terkini</h3>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="image-container me-3">
                                    <img src="assets/img/tentangkami/3.png" class="img-fluid img-1-1 me-3" alt="..." style="">
                                </div>
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <h3 style="font-size: 26px">Tag</h3>
                        </div>
                        <div class="row mb-3">
                            <div class="d-flex">
                                <div class="card flex-grow-1">
                                    <div class="card-body-populer d-flex flex-column justify-content-between">
                                        <div class="tags">
                                            {{-- <h5>Tags:</h5> --}}
                                            <span class="badge">#Tag1</span>
                                            <span class="badge">#Tag2</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                            <span class="badge">#Tag3</span>
                                        </div>
                                        {{-- <div class="child">
                                            <div>
                                                <div class="d-flex align-items-center mb-1">
                                                    <i class="bi bi-calendar2 me-2 mb-1" style="font-size: 14px"></i>
                                                    <p class="mb-1">Tanggal</p>
                                                    <div class="category mb-1 ms-auto">Kategori</div>
                                                </div>
                                                <h2 class="card-title mb-1">Judul</h2>
                                                <p class="card-text mb-1">Deskripsi</p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
