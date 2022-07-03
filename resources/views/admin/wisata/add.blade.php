  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/wisata/create'))
          <form action="/admin/wisata" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/wisata/{{$wisata->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          

          <div class="row">
            <div class="col-md-6">

            
          <div class="form-group">
            <label for="">Nama Wisata</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($wisata) ? $wisata->name : old('name')}}" placeholder="Nama Wisata">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Kecamatan</label>
            <select name="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror" id="">
              <option value="">-- Kecamatan --</option>
              @foreach ($kecamatan as $item)
                  <option value="{{$item->id}}" {{isset($wisata) ? $wisata->kecamatan_id == $item->id ? 'selected' : '' : ''}}>{{$item->name}}</option>
              @endforeach
            </select>
             @error('kecamatan_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">No Hp</label>
            <input type="text" class="form-control  @error('nohp') is-invalid @enderror"  name="nohp"  value="{{isset($wisata) ? $wisata->nohp : old('nohp')}}" placeholder="No Hp">
             @error('nohp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

           <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control  @error('alamat') is-invalid @enderror"  name="alamat"  value="{{isset($wisata) ? $wisata->alamat : old('alamat')}}" placeholder="Alamat">
             @error('alamat')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Maps</label>
            <input type="text" class="form-control  @error('maps') is-invalid @enderror"  name="maps"  value="{{isset($wisata) ? $wisata->maps : old('maps')}}" placeholder="Maps">
             @error('maps')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>
          <p>Buka maps untuk mengambil titik lokasi wisata di <a href="https://www.google.com/maps/place/Kabupaten+Mamuju+Tengah,+Sulawesi+Barat/@-1.9974445,119.3330951,10.78z/data=!4m5!3m4!1s0x2d8d835d790f9719:0x7f1995f6768c5643!8m2!3d-1.9354109!4d119.5107708" target="blank">sini</a></p>

          {{-- <div class="form-group">
            <label for="">Titik</label>
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control  @error('lat') is-invalid @enderror"  name="lat"  value="{{isset($wisata) ? $wisata->lat : old('lat')}}" placeholder="Latitude">
                 @error('lat')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="col-md-6">
                 <input type="text" class="form-control  @error('lng') is-invalid @enderror"  name="lng"  value="{{isset($wisata) ? $wisata->lng : old('lng')}}" placeholder="Longitude">
                 @error('lng')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
            </div>
            <p>Buka maps untuk mengambil titik lokasi wisata di <a href="https://www.google.com/maps/place/Kabupaten+Mamuju+Tengah,+Sulawesi+Barat/@-1.9974445,119.3330951,10.78z/data=!4m5!3m4!1s0x2d8d835d790f9719:0x7f1995f6768c5643!8m2!3d-1.9354109!4d119.5107708" target="blank">sini</a></p>
            
          </div> --}}


          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($wisata) ? $wisata->cover : old('cover')}}" placeholder="cover">
            {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
             @error('cover')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($wisata))
                <img src="/{{$wisata->cover}}" width="100%" class="py-3" alt="">
            @endif
          </div>

          </div>

          <div class="col-md-6">

             <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control  @error('harga') is-invalid @enderror"  name="harga"  value="{{isset($wisata) ? $wisata->harga : old('harga')}}" placeholder="Harga">
             @error('harga')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

           <div class="form-group">
            <label for="">Harga Satuan</label>
            <select name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="">
              <option value="">-- Harga Satuan --</option>
              <option value="Orang"
              <?php 
              if(isset($wisata)) {
                if($wisata->satuan == 'Orang') {
                  echo 'selected';
                  }
              }else{
                if(old('satuan') == 'Orang') {
                  echo 'selected';
                }
              } ?> >Orang</option>
              <option value="Rombongan"
              <?php 
              if(isset($wisata)) {
                if($wisata->satuan == 'Rombongan') {
                  echo 'selected';
                  }
              }else{
                if(old('satuan') == 'Rombongan') {
                  echo 'selected';
                }
              } ?>
              >Rombongan</option>
            </select>
             @error('satuan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Deskripsi">{{isset($wisata) ? $wisata->desc : old('desc')}}</textarea>
                @error('desc')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

            </div>
          </div>

     
          <a href="/admin/wisata" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
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


