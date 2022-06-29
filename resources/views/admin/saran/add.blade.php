<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/kecamatan/create'))
          <form action="/admin/kecamatan" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/kecamatan/{{$kecamatan->id}}" method="POST" encype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          

          <div class="form-group">
            <label for="">Nama Kecamatan</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kecamatan) ? $kecamatan->name : old('name')}}" placeholder="Nama Kecamatan">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>



          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($kecamatan) ? $kecamatan->cover : old('cover')}}" placeholder="cover">
            {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
             @error('cover')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($kecamatan))
                <img src="/{{$kecamatan->cover}}" width="100%" class="py-3" alt="">
            @endif
          </div>

     
          <a href="/admin/kecamatan" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

