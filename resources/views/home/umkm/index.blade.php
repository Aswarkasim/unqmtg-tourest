<style>

    
</style>

<div class="container my-5">
  <div class="text-center">
    <h1 class="brush-font text-orange">{{$title}}</h1>
    <h3>{{$desc}}</h3>

    @foreach ($kecamatan as $item)
      <a href="/{{$link}}?kecamatan_id={{$item->id}}" class="btn {{$item->id == request('kecamatan_id') ? 'btn-filter-active' : 'btn-filter'}} my-1">{{$item->name}}</a>
    @endforeach
  </div>
  <div class="row">

    @if (count($umkm) >= 1)
        
      @foreach($umkm as $row)
      
      <div class="col-md-4 mt-3" data-aos="fade-up"  data-aos-delay="{{$loop->iteration * 200}}">
        <div class="wrapper-card-wisata">
          <div class="img-wrapper-wisata">
            <img src="/{{$row->cover}}" width="100%" class="zoom-in" alt="">
          </div>
          <div class="content-wrapper-wisata p-4">
            <span class="text-muted"><i class="fas fa-map-marker-alt"></i> Kec. {{$row->kecamatan->name}}</span>
            <h6 class="py-2"><b>{{ Illuminate\Support\Str::limit($row->name,30)}}</b></h6>
            <div class="d-flex">
              {{-- <h6 class="price-wisata text-primary"><b>Rp 5.000</b></h6>
              <h6 class="text-muted">/Per Orang</h6>  --}}
            </div>
            
            <a href="/umkm/detail/{{$row->id}}" class="btn btn-wisata mt-3">Lihat</a>
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