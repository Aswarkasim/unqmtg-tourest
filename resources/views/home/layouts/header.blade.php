<div class="">
  <div style="width: 100%; background-color: #3d3d3d">
    <div class="container text-primary py-2">
      <div class="d-flex">
        <span class="px-2">
          <i class="fas fa-phone"></i> 085 000 0000 0000
        </span>

         <span class="px-2">
          <i class="fas fa-at"></i> uniquemateng@gmail.com
        </span>

        <div class="float-right">
          a
        </div>

      </div>
    </div>
  </div>
</div>
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
    <div class="container">
      <a class="navbar-brand" href="/">
       <img src="/img/logo.png" alt="Logo" width="150px" class="" style="opacity: .8"></b>
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
            <a class="nav-link font-weight-bold text-secondary" href="/rental">Rental Mobil</a>
          </li>

           <li class="nav-item {{Request::is('jajanan*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/jajanan">Jajanan</a>
          </li>

           <li class="nav-item {{Request::is('kuliner*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/kuliner">Kuliner</a>
          </li>

           <li class="nav-item {{Request::is('kontak*') ? 'active-menu' : ''}}">
            <a class="nav-link font-weight-bold text-secondary" href="/kontak">Kontak</a>
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