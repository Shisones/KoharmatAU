@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <!-- ======= Ubah Password Section ======= -->
        <section id="resetpassword" class="resetpassword section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="section-title">
                                    <h3>Atur Ulang Password</h3>
                                </div>
                    
                                <form action="" method="POST" role="form" class="php-email-form">
                    
                                    <div class="form-group">
                                        <label for="username" class="mb-3">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" required>
                                    </div>
                    
                                    <div class="form-group mt-3 mb-2">
                                        <label for="password" class="mb-3">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                                    </div>
                                    <div class="form-group mt-3 mb-2">
                                        <label for="konfirmasipassword" class="mb-3">Konfirmasi Password</label>
                                        <input type="konfirmasipassword" class="form-control" name="konfirmasipassword" id="konfirmasipassword" placeholder="Konfirmasi Password" required>
                                    </div>
                    
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn background-primary">Ubah Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
        </section><!-- End Ubah Password Section -->
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