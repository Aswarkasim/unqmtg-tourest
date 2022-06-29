  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-12">
    <div class="p-2  card">
      <div class="card-body">
       <div class="row">
        <div class="col-md-6">
            <h5><strong>{{$umkm->name}}</strong></h5>
            <i class="fas fa-map-marker-alt"></i> Kec. {{$umkm->kecamatan->name. ', '.$umkm->alamat}} |
            <i class="fas fa-phone"></i> {{$umkm->nohp}}
            <img src="/{{$umkm->cover}}" width="100%" alt="">
            <p>{!!$umkm->desc!!}</p>
            {!!$umkm->maps!!}
        </div>

        <div class="col-md-6">
           <h5><strong>Produk</strong></h5>
          <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Nama</th>
            </tr>
          </table>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>



