@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            {{-- @include('partials.sidemenu') --}}
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambahkan Berita Baru</h3>
                    </div>
                    <div class="card-body">
                        <form action="/CRUD/createberita" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="berita_slug" id="berita_slug">
                            <div class="form-group mb-3">
                                <label for="penulis_nama">Nama Penulis</label>
                                <input type="text" class="form-control" name="penulis_nama" id="penulis_nama" placeholder="Masukkan Nama Penulis">
                            </div>
                            <div class="form-group mb-3">
                                <label for="berita_judul">Judul Berita</label>
                                <input type="text" class="form-control" name="berita_judul" id="berita_judul" placeholder="Masukkan Judul Berita">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kategori_id">Kategori Berita</label>
                                <div class="custom-select">
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        <option selected disabled hidden>Pilih...</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item['kategori_id'] }}">{{ $item['kategori_nama'] }} </option>
                                        @endforeach
                                    </select>
                                    <div class="select-arrow">
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="berita_type">Jenis Berita</label>
                                <div class="custom-select">
                                    <select name="berita_type" id="berita_type" class="form-control">
                                        <option selected disabled hidden>Pilih...</option>
                                        <option value="Utama">Berita Utama</option>
                                        <option value="Koharmat">Berita Koharmat</option>
                                        <option value="Lainnya">Berita Lainnya</option>
                                    </select>
                                    <div class="select-arrow">
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="wysiwyg">Isi Berita</label>
                                <textarea id="wysiwyg" name="berita_isi"></textarea>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="berita_img">Upload Gambar</label>
                                <input type="file" class="form-control" id="berita_img" name="berita_img">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn background-primary">Tambahkan</button>
                            </div>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>
<script>
    CKEDITOR.replace('wysiwyg');
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
                sideMenuContainer.style.marginLeft = (sideMenuContainer.offsetWidth * -1 + 15) + "px"; // Adjust based on the width of your side menu
            }
        });

        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const messageId = this.getAttribute('data-message-id');
                const container = document.getElementById(`reply-form-container-${messageId}`);

                if (!container.querySelector('form')) { // Check if form already exists
                    const form = document.createElement('form');
                    form.setAttribute("action", "/admin/kirimbalasan");
                    form.setAttribute("method", "POST");
                    form.setAttribute("class", "php-email-form")
                    form.setAttribute("role", "form");
                    form.innerHTML = `
                <div class="form-group">
                    @csrf
                    <input type="hidden" name="pesan_id" value="${messageId}">
                    <textarea id="reply-${messageId}" class="form-control" name="balasan_isi" rows="3" placeholder="Masukkan balasan"></textarea>
                </div>
                <div class="my-3">
                <div class="loading d-none">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message d-none d-block">Pesan anda berhasil dikirim!.</div>
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

                    refreshScript("{{ asset('assets/vendor/php-email-form/validate.js') }}");
                }
            });
        });
        
        function refreshScript(src) {
            // Remove the existing script if it exists
            const existingScript = document.querySelector(`script[src="${src}"]`);
            if (existingScript) {
                existingScript.remove();
            }

            // Create a new script element
            const script = document.createElement('script');
            script.src = src;
            script.type = 'text/javascript';

            // Append the new script element to the head
            document.head.appendChild(script);
        }
    });
</script>

@endsection