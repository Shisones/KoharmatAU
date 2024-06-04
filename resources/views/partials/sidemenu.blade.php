
<div id="side-menu" class="col-3 h-100 shadow-lg sticky-top side-menu-container bg-white" style="top:70px;z-index:1">
                <div class="side-menu my-3" style="height:calc(100vh - 70px);">
                    <button id="toggle-button" class="btn background-primary toggle-button"><i class='bx bx-chevron-left'></i></button>
                    <div id="menu-content">
                        <div class="container mt-4">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-between">
                                    <i class="bi bi-person-circle fs-3 me-3"></i>
                                    <a href="/CRUD/resetpassword" style="font-weight: 700">Ubah Password</a>
                                    <button class="btn background-primary ms-auto">Log out</button>
                                </li>
                            </ul>
                        </div>
                        
                        {{-- <ul><i class="bi bi-person-circle fs-3"></i> <a href="" style="font-weight: 700">Ubah Password</a></ul> --}}
                        <hr>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Pertanyaan</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="/admin" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang belum dibalas") ? "active" : "link-black" }}">Pertanyaan yang belum dibalas</a></li>
                                    <li><a href="/admin/pesan/dibalas" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang sudah dibalas") ? "active" : "link-black" }}">Organisasi Koharmat</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <ul><a class="nav-link" href="/CRUD/viewfaq">FAQ</a></ul>
                        <hr>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="/admin/pesan/dibalas" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang sudah dibalas") ? "active" : "link-black" }}">Daftar Berita</a></li>
                                    <li><a href="/CRUD/createberita" class="">Tambah Berita</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="" class="text-decoration-none">Foto</a></li>
                                    <li><a href="" class="text-decoration-none">Video</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Kasau dan Wakau</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="" class="text-decoration-none">Kasau</a></li>
                                    <li><a href="" class="text-decoration-none">Wakasau</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <ul>
                            <li class="dropdown"><a href="#"><span>Organisasi</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="/admin/strukturorganisasi" class="text-decoration-none {{ ($title == "Admin | Struktur Organisasi") ? "active" : "link-black" }}">Struktur Organisasi KoharmatAU</a></li>
                                    <li><a href="" class="text-decoration-none">Organisasi KoharmatAU</a></li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <ul><a class="nav-ulnk" href="/asetkoharmat">Aset Koharmat</a></ul>
                        {{-- <a href="/admin" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang belum dibalas") ? "active" : "link-black" }}">Pertanyaan yang belum dibalas</a>
                        <hr>
                        <a href="/admin/pesan/dibalas" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang sudah dibalas") ? "active" : "link-black" }}">Pertanyaan yang sudah dibalas</a>
                        <hr> --}}
                        {{-- <a href="" class="text-decoration-none {{ ($title == "Admin | Berita") ? "active" : "link-black" }}">Berita</a> --}}
                        {{-- <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Kasau") ? "active" : "link-black" }}">Kasau</a>
                        <hr>
                        <a href="/admin/strukturorganisasi" class="text-decoration-none {{ ($title == "Admin | Struktur Organisasi") ? "active" : "link-black" }}">Struktur Organisasi</a>
                        <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Galeri") ? "active" : "link-black" }}">Galeri</a>
                        <hr> --}}
                    </div>
                </div>
</div>