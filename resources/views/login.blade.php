@extends('layouts.main')

@section('content')
    <main id="main">
        <!-- ======= Login Section ======= -->
        <section id="login" class="login section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="section-title">
                                    <h3>Login</h3>
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

                                    <p style="font-size: 14px">Lupa password? <a href="">Atur Ulang</a></p>
                    
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn background-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
        </section><!-- End Login Section -->
    </main>
@endsection
