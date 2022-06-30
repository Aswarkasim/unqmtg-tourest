<style>

</style>
<div class="img-wrapper-cover">
  <img src="/img/1.jpg" alt="">
</div>

<div class="bg-cream py-4">
  <div class="container">
    <h3><strong>{{$wisata->name}}</strong></h3>
     <div class="d-flex">
        <h6 class="price-wisata text-primary"><b>{{format_rupiah($wisata->harga)}}</b></h6>
        <h6 class="text-muted">/Per {{$wisata->satuan}}</h6> 
      </div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <div class="col-md-7">
      
       <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/wisata">Wisata</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail - {{$wisata->name}} </li>
        </ol>
      </nav>

      <h3><b>Deskripsi</b></h3>
      <p>{!!$wisata->desc!!}</p>

     {{-- {!!$wisata->maps!!} --}}

     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510379.0869031895!2d119.50183855!3d-2.02096395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d8d835d790f9719%3A0x7f1995f6768c5643!2sKabupaten%20Mamuju%20Tengah%2C%20Sulawesi%20Barat!5e0!3m2!1sid!2sid!4v1656569854830!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

    <div class="col-md-5">
      <div class="bg-cream p-3">
        <h4><strong>Akses</strong></h4>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Kecamatan</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-map-marker-alt"></i> {{$wisata->kecamatan->name}}</strong></span>
        </div>
          <hr>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Alamat</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-map-marked-alt"></i> {{$wisata->alamat}}</strong></span>
        </div>
        <hr>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Kontak Person</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-phone"></i> {{$wisata->nohp}}</strong></span>
          <a href="https://wa.me/{{$wisata->nohp}}" target="blank" class="btn btn-wisata mt-3"><i class="fas fa-phone"></i> Hubungi Sekarang</a>
        </div>

      </div>
      
      <div class="mt-5">
        <h4><strong>Saran Destinasi</strong></h4>
      </div>

      @foreach($saran as $item)
          @if ($item->id != $wisata->id)
              
          <div class="wrapper-card-saran p-2 mt-2">
            <div class="d-flex">
              <div class="img-wrapper-saran">
                <img src="/{{$item->cover}}" width="200px" alt="">
              </div>
              <div class="d-block p-3">
                <h6><a href="/wisata/detail/{{$wisata->id}}" class="price-wisata text-primary text-decoration-none"><strong>Name Wisata</strong></a></h6>
                <span><i class="fas fa-map-marker-alt"></i> Kec. Karossa</span>
              </div>
            </div>
          </div>
          
          @endif
          @endforeach

    </div>
  </div>
</div>