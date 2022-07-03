
<div class="py-1" style="background-color: #3d3d3d">
  <div class="container">
    <a class="text-primary px-2" href="{{$config_provider->ig}}" target="_blank"><i class="fab fa-instagram"></i></a>
    <a class="text-primary px-2" href="{{$config_provider->fb}}" target="_blank"><i class="fab fa-facebook"></i></a>
    <a class="text-primary px-2" href="{{$config_provider->wa}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
    <a class="text-primary px-2" href="{{$config_provider->tw}}" target="_blank"><i class="fab fa-twitter"></i></a>
  </div>
</div>

<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand" href="/">
       <img src="/{{$config_provider->logo}}" alt="Logo" width="140px" class="" style="opacity: .8"></b>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
           <li class="nav-item {{Request::is('/') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/"> Home</a>
          </li>

           <li class="nav-item {{Request::is('wisata*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/wisata">Destinasi</a>
          </li>

           <li class="nav-item {{Request::is('penginapan*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/penginapan">Penginapan</a>
          </li>

           <li class="nav-item {{Request::is('rental*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/rental">Jasa Transportasi</a>
          </li>

           <li class="nav-item {{Request::is('jajanan*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/jajanan">Jajanan</a>
          </li>

           <li class="nav-item {{Request::is('kuliner*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/kuliner">Kuliner</a>
          </li>

           <li class="nav-item {{Request::is('contact*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/contact">Kontak</a>
          </li>

         
        </ul>

        {{-- @auth
        <a href="/profile" class="btn btn-primary btn-sm mx-2">
          <i class="fas fa-user"></i> Profile
        </a>
       
        @else
          <a href="/admin/auth" class="btn btn-primary btn-sm">
            <i class="fas fa-sign-in-alt"></i> MASUK
          </a>
        @endauth --}}

      </div>
    </div>
  </nav>
</header> 