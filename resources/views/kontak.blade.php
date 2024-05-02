@extends('layouts.main')

@section('content')
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
      
              <div class="section-title">
                {{-- <h2>Contact</h2> --}}
                <h3>Kirimkan Pesan untuk <span>KoharmatAU</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
              </div><br>
      
              {{-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                  <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>
      
                <div class="col-lg-3 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>contact@example.com</p>
                  </div>
                </div>
      
                <div class="col-lg-3 col-md-6">
                  <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                  </div>
                </div>
      
              </div> --}}
      
              <div class="row" data-aos="fade-up" data-aos-delay="100">
      
                <div class="col-lg-6 ">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9474333147546!2d107.57982731074769!3d-6.896891067464551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d486fc6aa3%3A0xcb48502e2ac3e8c!2sKoharmatau!5e0!3m2!1sid!2sid!4v1713417571328!5m2!1sid!2sid" width="550" height="485" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
      
                <div class="col-lg-6">
                  <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                      <div class="col form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama" required>
                      </div>
                      <div class="col form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Subjek</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan subjek pesan" required>
                    </div>
                    <div class="form-group">
                      <label>Pesan</label>
                      <textarea class="form-control" name="message" rows="5" placeholder="Ketikkan pesan Anda" required></textarea>
                    </div>
                    <div class="my-3">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                  </form>
                </div>
      
              </div>
      
            </div>
          </section>
    </main>
@endsection