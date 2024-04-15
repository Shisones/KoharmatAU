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
            <div class="containerbar">
                <div class="column">
                    <select class="dropdown">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                        <option value="option4">Option 4</option>
                    </select>
                </div>
                <div class="column">
                    <input type="text" class="search-bar" placeholder="Search...">
                </div>
            </div>
            <div class="container" style="padding-left: 25vh; padding-right: 25vh;">
                {{-- 1 --}}
                <div class="row mb-3"> 
                    <div class="col" style="border: 2px solid red; margin-right: 5vh; border-radius: 5px">
                        {{-- kolom --}}
                        <div class="container px-0" style="">
                            <div class="row">
                                <div class="col-4 d-flex justify-content-center align-items-center" style="background-color:rgb(12, 42, 69); height: 23vh">
                                    <!-- Menambahkan gambar dengan properti CSS -->
                                    <img src="assets/img/tentangkami/1.png" alt="Gambar" style="max-height: 100%; max-width: 100%; height: auto;">
                                </div>
                                <div class="col d-flex align-items-center">
                                    <div class="container">
                                        <div class="row">judul berita</div>
                                        <div class="row">
                                            <div class="container"  style="background-color: #898989; border-radius: 5px; width: 15vh;">
                                                kategori
                                            </div>
                                        </div>
                                        <div class="row">deskripsi</div>
                                        <div class="row">tanggal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="border: 2px solid red; border-radius: 5px">
                        {{-- kolom --}}
                        <div class="container px-0" style="">
                            <div class="row">
                                <div class="col-4 d-flex justify-content-center align-items-center" style="background-color:rgb(12, 42, 69); height: 23vh">
                                    <!-- Menambahkan gambar dengan properti CSS -->
                                    <img src="assets/img/tentangkami/1.png" alt="Gambar" style="max-height: 100%; max-width: 100%; height: auto;">
                                </div>
                                <div class="col d-flex align-items-center">
                                    <div class="container">
                                        <div class="row">judul berita</div>
                                        <div class="row">
                                            <div class="container"  style="background-color: #898989; border-radius: 5px; width: 15vh;">
                                                kategori
                                            </div>
                                        </div>
                                        <div class="row">deskripsi</div>
                                        <div class="row">tanggal</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- 2 --}}
                
                
                {{-- 3 --}}
                
                
                {{-- 4 --}}
                
                
                {{-- 5 --}}
                
                
            </div>
        </section>
    </main>
@endsection