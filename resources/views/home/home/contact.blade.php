{{-- 
<div class="img-wrapper-cover">
  <img src="/img/3.jpg" alt="">
</div> --}}

<div class="container my-5">
  <div class="text-center mb-4">
    <h1 class="brush-font text-orange">Kontak Kami</h1>
    <h3>Anda dapat menghubungi kami dengan mudah</h3>
  </div>
{{-- <hr> --}}
  <div class="row">

    <div class="col-md-6">
      <div class="card p-4 shadow rounded">
        <h3 class=""><strong>Kirim Saran</strong></h3>
        <hr>
        <form action="/contact/send" method="POST">
          @csrf
          <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" style="height: 50px" name="name" placeholder="Nama Anda">
          @error('name')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror

          <input type="text" class="form-control mb-3 @error('nohp') is-invalid @enderror" style="height: 50px" name="nohp" placeholder="No. Hp/ WA">
           @error('nohp')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror


          <input type="text" class="form-control mb-3 @error('subjek') is-invalid @enderror" style="height: 50px" name="subjek" placeholder="Subjek">
           @error('subjek')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror

          <textarea name="desc" class="form-control @error('name') is-invalid @enderror" placeholder="Pesan Anda" id="" cols="30" rows="10"></textarea>
           @error('desc')
            <div class="invalid-feedback">
              {{$message}}
            </div>
          @enderror

          <button class="btn btn-wisata mt-3"><i></i><i class="fas fa-paper-plane"></i> Kirim</button>
        </form>
      </div>
    </div>
    <div class="col-md-6">
      
      <div class="d-flex mt-4">
        <i class="far fa-map fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Alamat</strong></h5>
          <p>Jl. Raya Cikarang No.1, Cikarang Barat, Cikarang, Bekasi, Jawa Barat, Indonesia</p>
        </div>
      </div>

      <div class="d-flex mt-4">
        <i class="fas fa-phone fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Telepon</strong></h5>
          <p>085 000 000 000 </p>
        </div>
      </div>

       <div class="d-flex mt-4">
        <i class="fas fa-envelope fa-3x text-orange"></i>
        <div class="px-3">
          <h5 class="text-orange"><strong>Email</strong></h5>
          <p>disparporamateng@gmail.com</p>
        </div>
      </div>


      
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7974.166839894313!2d119.19415068484723!3d-2.1215664469438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8d62e550cfc62f%3A0xcb00c4df48799d78!2sBudungbudung%2C%20Kire%2C%20Kec.%20Budong-Budong%2C%20Kabupaten%20Mamuju%2C%20Sulawesi%20Barat!5e0!3m2!1sid!2sid!4v1655905363482!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
    </div>
    </div>
</div>

