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
          <a href="/admin/umkm/produk/create?umkm_id={{$umkm->id}}" class="btn btn-primary mb-1"><i class="fas fa-plus"></i> Tambah</a>
          <table class="table">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>#</th>
            </tr>
            @foreach ($umkm->produk as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->name}}</td>
                  <td>
                     <div class="btn-group">
                        <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                          <a class="dropdown-item" href="/admin/umkm/produk/{{$item->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                            <div class="dropdown-divider"></div>
                            <form action="/admin/umkm/produk/{{$item->id}}" method="post" id="form-delete" class="tombol-hapus">
                              @method('delete')
                              @csrf
                              <button type="submit" id="delete" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                      </div>

                  </td>
                </tr>
            @endforeach
          </table>
        </div>
       </div>
      </div>
    </div>
  </div>
</div>



