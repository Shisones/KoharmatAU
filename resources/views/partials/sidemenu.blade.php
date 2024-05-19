<div class="col-3 h-100 shadow-lg sticky-top side-menu-container bg-white" style="top:70px;z-index:1">
                <div class="side-menu my-3" style="height:calc(100vh - 70px);">
                    <button id="toggle-button" class="btn background-primary toggle-button"><i class='bx bx-chevron-left'></i></button>
                    <div id="menu-content">
                        <a href="/admin" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang belum dibalas") ? "active" : "link-black" }}">Pertanyaan yang belum dibalas</a>
                        <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Pertanyaan yang sudah dibalas") ? "active" : "link-black" }}">Pertanyaan yang sudah dibalas</a>
                        <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Berita") ? "active" : "link-black" }}">Berita</a>
                        <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Kasau") ? "active" : "link-black" }}">Kasau</a>
                        <hr>
                        <a href="/adminstrukturorganisasi" class="text-decoration-none {{ ($title == "Admin | Struktur Organisasi") ? "active" : "link-black" }}">Struktur Organisasi</a>
                        <hr>
                        <a href="" class="text-decoration-none {{ ($title == "Admin | Galeri") ? "active" : "link-black" }}">Galeri</a>
                        <hr>
                    </div>
                </div>
            </div>