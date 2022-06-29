<style>

</style>
<div class="img-wrapper-cover">
  <img src="/img/1.jpg" alt="">
</div>

<div class="bg-cream py-4">
  <div class="container">
    <h3><strong>{{$umkm->name}}</strong></h3>
     <div class="d-flex">
        <h6 class="price-wisata text-primary"><b>{{format_rupiah($umkm->harga)}}</b></h6>
        <h6 class="text-muted">/Per {{$umkm->satuan}}</h6> 
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
          <li class="breadcrumb-item active" aria-current="page">Detail - {{$umkm->name}} </li>
        </ol>
      </nav>

      <h3><b>Deskripsi</b></h3>
      <p>{!!$umkm->desc!!}</p>

     {!!$umkm->maps!!}

    </div>

    <div class="col-md-5">
      <div class="bg-cream p-3">
        <h4><strong>Akses</strong></h4>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Kecamatan</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-map-marker-alt"></i> {{$umkm->kecamatan->name}}</strong></span>
        </div>
          <hr>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Alamat</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-map-marked-alt"></i> {{$umkm->alamat}}</strong></span>
        </div>
        <hr>
        <div class="form-group mt-2">
          <label for="" class="text-primary"><b>Kontak Person</b></label><br>
          <span class="text-muted"><strong><i class="fas fa-phone"></i> {{$umkm->nohp}}</strong></span>
          <a href="https://wa.me/{{$umkm->nohp}}" target="blank" class="btn btn-wisata mt-3"><i class="fas fa-phone"></i> Hubungi Sekarang</a>
        </div>

      </div>
      
      <div class="mt-5">
        <h4><strong>Saran Destinasi</strong></h4>
      </div>

      @foreach($saran as $item)
          @if ($item->id != $umkm->id)
              
          <div class="wrapper-card-saran p-2 mt-2">
            <div class="d-flex">
              <div class="img-wrapper-saran">
                <img src="/{{$item->cover}}" width="200px" alt="">
              </div>
              <div class="d-block p-3">
                <h6><a href="/wisata/detail/{{$umkm->id}}" class="price-wisata text-primary text-decoration-none"><strong>Name Wisata</strong></a></h6>
                <span><i class="fas fa-map-marker-alt"></i> Kec. Karossa</span>
              </div>
            </div>
          </div>
          
          @endif
          @endforeach

    </div>
  </div>
</div>