@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 h-100 shadow-lg sticky-top side-menu-container" style="top:70px;z-index:1">
                <div class="side-menu my-3" style="height:100vh;">
                    <button id="toggle-button" class="btn btn-secondary toggle-button"><i class='bx bx-chevron-left'></i></button>
                    <div id="menu-content">
                        <a href="" class="text-decoration-none link-black">Pertanyaan yang belum dibalas</a>
                        <hr>
                        <a href="" class="text-decoration-none link-black">Pertanyaan yang sudah dibalas</a>
                        <hr>
                        <a href="" class="text-decoration-none link-black">Berita</a>
                        <hr>
                        <a href="" class="text-decoration-none link-black">Kasau</a>
                        <hr>
                        <a href="/adminstrukturorganisasi" class="text-decoration-none link-black">Struktur Organisasi</a>
                        <hr>
                        <a href="" class="text-decoration-none link-black">Galeri</a>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col my-5" id="message-container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <button class="btn background-primary">
                                    Filter <i class='bx bx-slider-alt'></i>
                                </button>
                            </div>
                            @for($i = 1;$i <= 10;$i++) <div class="row my-2">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card rounded-4 shadow">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold">Oleh: Muhamad Furqon Al-Haqqi (iniEmail@email.com)</p>
                                    <p>Subjek: El Psy Kongroo</p>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eos nam ipsa, non nihil corrupti at reiciendis, minima obcaecati, enim consectetur dolores iste maiores sint sapiente necessitatibus veniam temporibus quos.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button class="btn reply-btn" data-message-id="{{$i}}">
                                        <i class='bx bx-message-add' style="font-size:20px;"></i>
                                    </button>
                                    <button class="btn">
                                        <i class='bx bx-trash text-danger' style="font-size:20px;"></i>
                                    </button>
                                </div>
                                <!-- Container for the dynamically added form -->
                                <div class="reply-form-container" id="reply-form-container-{{$i}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
    </div>
    @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const navbar = document.querySelector('.navbar'); // Adjust the selector to match your navbar
        const sideMenuContainer = document.querySelector('.side-menu-container');
        const toggleButton = document.getElementById('toggle-button');
        const menuContent = document.getElementById('menu-content');
        const messageContainer = document.getElementById('message-container');

        // Toggle side menu visibility
        toggleButton.addEventListener('click', function() {
            if (menuContent.style.display === 'none') {
                menuContent.style.display = 'block';
                toggleButton.innerHTML = '<i class="bx bx-chevron-left"></i>';
                sideMenuContainer.style.marginLeft = '0';
            } else {
                menuContent.style.display = 'none';
                toggleButton.innerHTML = '<i class="bx bx-chevron-right"></i>';
                sideMenuContainer.style.marginLeft = '-250px'; // Adjust based on the width of your side menu
            }
        });

        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const messageId = this.getAttribute('data-message-id');
                const container = document.getElementById(`reply-form-container-${messageId}`);

                if (!container.querySelector('form')) { // Check if form already exists
                    const form = document.createElement('form');
                    form.innerHTML = `
                        <div class="form-group">
                            <textarea id="reply-${messageId}" class="form-control" rows="3" placeholder="Masukkan balasan"></textarea>
                        </div>
                        <div class="d-flex justify-content-end my-2">
                            <button type="button" class="btn btn-secondary mx-1 cancel-btn">Batal</button>
                            <button type="submit" class="btn background-primary mx-1">Kirim</button>
                        </div>
                    `;
                    container.appendChild(form);

                    // Add event listener to the cancel button
                    form.querySelector('.cancel-btn').addEventListener('click', function() {
                        container.removeChild(form);
                    });
                }
            });
        });
    });
</script>

@endsection