  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/umkm/produk/create'))
          <form action="/admin/umkm/produk" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/umkm/produk/{{$produk->id}}" method="POST" encype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          
          {{-- show all error --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="row">
            <div class="col-md-6">

              <input type="hidden" name="umkm_id" value="{{isset($produk) ? $produk->umkm_id : $umkm->id}}">
              <input type="hidden" name="kecamatan_id" value="{{isset($produk) ? $produk->kecamatan_id : $umkm->kecamatan_id}}">
              <input type="hidden" name="kategori_id" value="{{isset($produk) ? $produk->kategori_id : $umkm->kategori_id}}">
            
          <div class="form-group">
            <label for="">Nama Produk</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($produk) ? $produk->name : old('name')}}" placeholder="Nama Produk">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control  @error('harga') is-invalid @enderror"  name="harga"  value="{{isset($produk) ? $produk->harga : old('harga')}}" placeholder="Harga">
             @error('harga')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($produk) ? $produk->cover : old('cover')}}" placeholder="cover">
            {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
             @error('cover')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($produk))
                <img src="/{{$produk->cover}}" width="100%" class="py-3" alt="">
            @endif
          </div>

          </div>

          <div class="col-md-6">

          

           
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Deskripsi">{{isset($produk) ? $produk->desc : old('desc')}}</textarea>
                @error('desc')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

            </div>
          </div>

     
          <a href="/admin/umkm/{{request('umkm_id')}}" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>


{{-- <script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/summernote/summernote-bs4.min.js"></script> --}}
{{-- <script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script> --}}


