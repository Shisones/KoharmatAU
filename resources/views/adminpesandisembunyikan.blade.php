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
                            <div class="row my-2" id="msg-container-{{ $message->pesan_id }}">
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
                                                @if(count($message->balasan) > 0)
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
                                                @endif
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn reply-btn" data-message-id="{{ $message->pesan_id }}">
                                                            <i class='bx bx-message-add' style="font-size:20px;" title="Tambahkan balasan"></i>
                                                        </button>
                                                        <button class="btn show-msg-btn" data-message-id="{{ $message->pesan_id }}">
                                                            <i class='bx bx-archive-out' style="font-size:20px;" title="Munculkan pesan"></i>
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
@endsection
@section('scripts')
<script src="{{ asset('assets/js/sideMenu.js') }}"></script>
<script src="{{ asset('assets/js/pesan.js') }}"></script>
<script>
    const csrf = '@csrf';
</script>

@endsection