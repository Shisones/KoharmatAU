@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            {{-- @include('partials.sidemenu') --}}
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="section-title">
                    <h3><span>Daftar FAQ</span></h3>
                  </div>
                
                <div class="card mt-4">
                    <div class="d-flex justify-content-end">
                        <a href="/CRUD/addfaq" class="btn background-primary">+ Tambahkan</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 40%">Pertanyaan</th>
                                    <th style="width: 40%">Jawaban</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($faq as $item)
                                    <form id="delete-form-{{ $item->faq_id }}" action="/CRUD/deletefaq/{{ $item->faq_id }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->faq_pertanyaan }}</td>
                                        <td>{{ $item->faq_jawaban }}</td>
                                        <td>
                                            <a href="/CRUD/updatefaq/{{ $item->faq_id }}" style="color: rgb(115, 209, 123); margin-right: 10px;">Update</a>
                                            <a href="#" onclick="submitDeleteForm({{ $item->faq_id }})" style="color: rgb(217, 55, 55);">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/sideMenu.js') }}"></script>
<script>
    function submitDeleteForm(faqId) {
        event.preventDefault();
        document.getElementById('delete-form-' + faqId).submit();
    }
</script>
@endsection