<style>

    
</style>

<div class="container my-5">
  <div class="text-center">
    <h1 class="brush-font text-orange">Destinasi Wisata</h1>
    <h3>Cari destinasi wisata di kecamatan Karossa</h3>

    @foreach ($kecamatan as $item)
      <a href="/wisata?kecamatan_id={{$item->id}}" class="btn {{$item->id == request('kecamatan_id') ? 'btn-filter-active' : 'btn-filter'}} my-1">{{$item->name}}</a>
    @endforeach
  </div>
  <div class="row">

    @if (count($wisata) >= 1)
        
      @foreach($wisata as $row)
      
      <div class="col-md-4 mt-3" data-aos="fade-up"  data-aos-delay="{{$loop->iteration * 200}}">
        <div class="wrapper-card-wisata">
          <div class="img-wrapper-wisata">
            <img src="/{{$row->cover}}" width="100%" class="zoom-in" alt="">
          </div>
          <div class="content-wrapper-wisata p-4">
            <span class="text-muted"><i class="fas fa-map-marker-alt"></i> Kec. {{$row->kecamatan->name}}</span>
            <h4 class="py-2"><b>{{$row->name}}</b></h4>
            <div class="d-flex">
              <h6 class="price-wisata text-primary"><b>{{format_rupiah($row->harga)}}</b></h6>
              <h6 class="text-muted">/Per Orang</h6> 
            </div>
            
            <a href="/wisata/detail/{{$row->id}}" class="btn btn-wisata mt-3">Lihat</a>
          </div>
        </div>
      </div>
      @endforeach
    @else
    <div class="text-center" data-aos="fade-up">
      <img src="/img/no_data.png" width="50%" alt="">
      <h4>Belum ada data</h4>
    </div>
    @endif

  </div>
</div>