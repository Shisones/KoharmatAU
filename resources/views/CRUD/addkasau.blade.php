@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            {{-- @include('partials.sidemenu') --}}
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambahkan Kasau</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="nama">Nama Kasau</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Kasau">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama">Masa Jabatan</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Masa Jabatan Kasau">
                            </div>
                            <div class="form-group mb-3">
                                <label for="imageUpload">Upload Foto Kasau</label>
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="file" class="form-control-file" id="imageUpload" name="">
                                    </div>
                                </div>
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

    // Initialize CKEditor
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
        // Sidebar ditutup
        menuContent.style.display = 'block';
        toggleButton.innerHTML = '<i class="bx bx-chevron-left"></i>';
        sideMenuContainer.style.marginLeft = '0';
        // Geser konten utama
        mainContent.classList.add('shifted-content');
    } else {
        // Sidebar dibuka
        menuContent.style.display = 'none';
        toggleButton.innerHTML = '<i class="bx bx-chevron-right"></i>';
        sideMenuContainer.style.marginLeft = (sideMenuContainer.offsetWidth * -1 + 15) + "px"; // Adjust based on the width of your side menu
        // Reset geser konten utama
        mainContent.classList.remove('shifted-content');
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