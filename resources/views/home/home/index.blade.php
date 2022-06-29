
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($banner as $key => $item)
    <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$item->urutan == '1' ? 'active' : ''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">

    @foreach ($banner as $item)
        
    <div class="carousel-item {{$item->urutan == '1' ? 'active' : ''}}">
      <img class="first-slide image-zoom" src="{{$item->image}}" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1 class="brush-font text-warning  " style="font-size: 100px">{{$item->topik}}</h1>
          <p>{{$item->desc}}</p>
        </div>
      </div>
    </div>
    @endforeach

  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container">
    <div class="row">
      <div class="text-center mb-5">
        <h1 class="brush-font text-primary">List Destinasi</h1>
        <h2>Cari Tempat Terbaik di Mateng</h2>
      </div>

      @foreach ($kecamatan as $item)
          
      <div class="{{$loop->iteration == 1 ? 'col-md-12' : 'col-md-6'}} mb-3" data-aos="zoom-in" data-aos-delay="{{$loop->iteration * 200}}">
        <div class="wrapper-dest">
          <img src="/{{$item->cover}}" alt="..." class="image-dest image-zoom">
          <h3 class="title-kecamatan"><i class="fas fa-map-marker-alt"></i> {{$item->name}}</h3>
          <div class="overlay">
            <a href="/wisata?kecamatan_id={{$item->id}}"> <h2 class="title-kecamatan text-dest text-warning"><i class="fas fa-map-marker-alt"></i> {{$item->name}}</h2></a>
            <h3 class="text-dest brush-font text-primary">Wisata</h3>
          </div>
        </div>
      </div>
      
      @endforeach

      

  </div>
</div>

  {{-- <div class="col-md-12 bg-primary py-5 my-5">
    <div class="container">
      <p class="text-white">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta officia, consequuntur quod explicabo eaque a! Temporibus, soluta, quam quo dignissimos, nobis quibusdam sed laborum nisi illum perspiciatis odio pariatur laboriosam.
      </p>
    </div>
  </div> --}}



{{-- <div class="container">
    <div class="row">
      <div class="text-center mb-5">
        <h1 class="brush-font text-primary">Kuliner</h1>
        <h2>Jangan Lupa Coba Jajanan Kuliner</h2>
      </div>

      @foreach ($kuliner as $item)
          
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="{{$loop->iteration*200}}" data-aos-anchor-placement="top-bottom">
        <div class="card">
          <img src="/img/food.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pasta Sederhana</h5>
            <p class="card-text"><i class="fas fa-home"></i> Warung Makan Lotu</p>
            <i class="fas fa-map-marker-alt"></i> Kec. Karossa
          </div>
        </div>
      </div>
      
      @endforeach
      

      <div class="text-center">
        <a href="" class="btn btn-danger px-5">Selengkapnya</a>
      </div>

      
  </div>
</div> --}}

