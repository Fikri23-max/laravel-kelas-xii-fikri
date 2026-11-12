@extends('templates.index')

@section('content')
<div class="general-agileits-w3l">
  <div class="w3l-medile-movies-grids">
    <div class="movie-browse-agile">
      <div class="browse-agile-w3ls general-w3ls">
        <div class="tittle-head">
          <h4 class="latest-text w3_faq_latest_text">Frequently Asked Questions</h4>
          <div class="container">
            <div class="agileits-single-top">
              <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">FAQ</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            {{-- FAQ 1 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Apa itu OneMovies?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  OneMovies adalah website informasi film yang menyediakan database lengkap tentang berbagai film dari berbagai genre. Anda dapat menelusuri koleksi film, melihat sinopsis, informasi cast, serta memberikan rating dan ulasan untuk film favorit Anda.
                </div>
              </div>
            </div>

            {{-- FAQ 2 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Bagaimana cara mencari film?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                  Anda bisa menggunakan kolom pencarian di bagian atas halaman. Ketik judul film yang ingin dicari, lalu tekan tombol <strong>Go</strong>. Selain itu, Anda juga bisa menelusuri film berdasarkan genre melalui menu <strong>Genres</strong> di navbar atau melalui link genre di bagian footer.
                </div>
              </div>
            </div>

            {{-- FAQ 3 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Apakah saya harus mendaftar untuk menggunakan website ini?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  Tidak. Anda dapat menjelajahi daftar film, melihat detail film, dan menelusuri genre tanpa perlu mendaftar. Namun, jika Anda ingin memberikan rating dan komentar pada film, Anda perlu membuat akun terlebih dahulu melalui tombol <strong>Login</strong> di pojok kanan atas, lalu pilih tab <strong>Register</strong>.
                </div>
              </div>
            </div>

            {{-- FAQ 4 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Bagaimana cara memberikan rating dan komentar pada film?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  Setelah login, buka halaman detail film yang ingin Anda ulas. Scroll ke bagian komentar, isi kolom komentar dan pilih rating bintang (1–5), lalu klik tombol <strong>Send</strong>. Komentar Anda akan langsung muncul di halaman tersebut.
                </div>
              </div>
            </div>

            {{-- FAQ 5 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Apa saja genre film yang tersedia?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                  Kami menyediakan beragam genre seperti Action, Adventure, Comedy, Drama, Horror, Romance, Thriller, Biography, Crime, Fantasy, Animation, dan masih banyak lagi. Anda bisa melihat semua genre yang tersedia melalui menu <strong>Genres</strong> di navbar.
                </div>
              </div>
            </div>

            {{-- FAQ 6 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingSix">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Bagaimana cara berlangganan newsletter?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="panel-body">
                  Scroll ke bagian bawah halaman (footer) dan masukkan alamat email Anda pada kolom <strong>Subscribe to us</strong>, lalu klik tombol <strong>Send</strong>. Anda akan menerima notifikasi jika ada film terbaru atau update dari kami.
                </div>
              </div>
            </div>

            {{-- FAQ 7 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingSeven">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Apakah OneMovies menyediakan layanan streaming?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="panel-body">
                  Saat ini, OneMovies berfokus sebagai platform informasi dan database film. Kami menyediakan sinopsis, detail cast dan peran, serta fitur rating dan ulasan dari pengguna. Layanan streaming belum tersedia untuk saat ini.
                </div>
              </div>
            </div>

            {{-- FAQ 8 --}}
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingEight">
                <h4 class="panel-title">
                  <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    <span class="fa fa-plus" aria-hidden="true"></span>
                    <label>Bagaimana jika saya lupa password akun saya?</label>
                  </a>
                </h4>
              </div>
              <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                <div class="panel-body">
                  Saat ini fitur reset password belum tersedia. Silakan hubungi administrator melalui email untuk bantuan pemulihan akun Anda.
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

