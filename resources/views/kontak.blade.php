@extends('layouts.main')

@section('content')
    <main id="main">
        <!-- ======= About Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Kontak</h2>
            <h3>Kontak <span>KoharmatAU</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>

        <div class="container" data-aos="fade-up">
            <div class="row">
                <!-- Kolom kiri dengan peta -->
                <div class="col-lg-6">
                    <!-- Tambahkan peta Google Maps di sini -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9474333147546!2d107.57982731074769!3d-6.896891067464551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d486fc6aa3%3A0xcb48502e2ac3e8c!2sKoharmatau!5e0!3m2!1sid!2sid!4v1713417571328!5m2!1sid!2sid" width="550" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
                <div class="col-lg-6">
                    <form action="#" method="post" role="form" class="php-email-form">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="isi-pesan" rows="5" placeholder="Isi Pesan" required></textarea>
                        </div>
                        <div class="text-center"><button type="submit">Kirim</button></div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    </main>
@endsection