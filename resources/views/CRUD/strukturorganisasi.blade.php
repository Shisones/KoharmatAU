@extends('layouts.main')

@section('content')
<main id="main">
  <!-- ======= Team Section ======= -->
    <div class="container-fluid section-bg">
      <div class="row">
        @include('partials.sidemenu')
        <div class="col team overflow-hidden">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                          <h3>Tambahkan Struktur Organisasi Koharmat<span>AU</span></h3>
                          {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">

                    </div>
                    <div class="col-2">
                        <button class="btn btn-success w-100" id="edit-struktur-button">Edit</button>
                    </div>
                </div>
      
                <div class="tree overflow-scroll">
                  <ul id="tree-root">
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
</main>
@endsection
@section('scripts')

<script src="{{ asset('assets/js/sideMenu.js') }}"></script>
<script src="{{ asset('assets/js/strukturOrganisasi.js') }}"></script>
<script>
    const csrf = '@csrf';
    const inputImagePreviewScript = "{{ asset('assets/js/previewInputImage.js') }}";
    const img_path = "{{ asset('assets/img/strukturorganisasi/1.png')}}";
    const css_path = "{{ asset('assets/css/style.css') }}";
    var nodes = {!! $nodes !!};
</script>

@endsection