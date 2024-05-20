@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidemenu')
            <div class="col my-5" id="message-container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <button class="btn background-primary">
                                    Filter <i class='bx bx-slider-alt'></i>
                                </button>
                            </div>
                            @foreach($messages as $message)
                            <div class="row my-2">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="card rounded-4 shadow">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-end">{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y h:m:s')}} </p>
                                                        <p class="fw-bold">Oleh: {{ $message->pesan_nama }} ({{$message->pesan_email }})</p>
                                                        <p>Subjek: {{ $message->pesan_subjek }}</p>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text">{{ $message->pesan_isi }}</p>
                                                    </div>
                                                </div>
                                                <div class="reply-section border border-2 rounded px-3 py-2">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="fw-bold">Balasan:</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            @foreach($message->balasan as $balasan)
                                                            <p class="text">{{ $balasan->balasan_isi }} <span class="fw-bold">({{ \Carbon\Carbon::parse($balasan->created_at)->format('d/m/Y h:m:s')}})</span></p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn reply-btn" data-message-id="{{ $message->pesan_id }}">
                                                            <i class='bx bx-message-add' style="font-size:20px;" title="Tambahkan balasan"></i>
                                                        </button>
                                                        <button class="btn">
                                                            <i class='bx bx-archive-in text-danger' style="font-size:20px;" title="Sembunyikan pesan"></i>
                                                        </button>
                                                    </div>
                                                    <!-- Container for the dynamically added form -->
                                                    <div class="reply-form-container" id="reply-form-container-{{ $message->pesan_id }}"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                            @endforeach
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