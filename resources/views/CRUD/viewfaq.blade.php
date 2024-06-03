@extends('layouts.main')

@section('content')
<main id="main">
    <div class="container-fluid">
        <div class="row">
            {{-- @include('partials.sidemenu') --}}
            <div class="col-md-8 offset-md-2 mt-4">
                
                <!-- Table to display the FAQ data -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Daftar Faq</h3>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="/CRUD/addfaq" class="btn background-primary">+ Tambahkan</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>pertanyaan1</td>
                                        <td>jawaban1</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
