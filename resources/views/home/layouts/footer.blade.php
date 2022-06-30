

<!-- FOOTER -->

  </main>


<footer class="footer mt-auto py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="d-block">
          <h5 class="text-orange"><strong>Kontak Kami</strong></h5>
          <p class="text-white"><i class="fas fa-map-marker-alt"></i> {{$config_provider->alamat}}</p>
          <p class="text-white"><i class="fas fa-phone"></i> {{$config_provider->no_telp}}</p>
          <p class="text-white"><i class="fas fa-envelope"></i> {{$config_provider->email}}</p>
        </div>
      </div>
      <div class="col-md-6 text-right">
        <h5 class="text-orange"><strong>Temukan kami</strong></h5>
        <a class="text-white px-2" href="{{$config_provider->ig}}" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
        <a class="text-white px-2" href="{{$config_provider->fb}}" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
        <a class="text-white px-2" href="{{$config_provider->wa}}" target="_blank"><i class="fab fa-whatsapp fa-2x"></i></a>
        <a class="text-white px-2" href="{{$config_provider->tw}}" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
      </div>
    </div>
    <div class="pull-right">
      <a href="#">Back to top</a>
      <a href="/admin/auth" class="mx-5">Login admin</a>
    </div>
    <p>&copy; 2022 Karossa Teknologi Center, Inc. &middot;</p>
  </div>
</footer>

<!-- Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- AdminLTE App -->
<script src="/vendor/sweetalert/sweetalert2.all.min.js"></script>

<script>

  AOS.init()
    // Tommbol hapus
  $('.tombol-hapus').on('click', function (e) {
    // Mematikan href
    e.preventDefault();
    // const href = $(this).attr('href');
    // const action = $(this).attr('action');

    let id = $(this).data('id');

    Swal({
      title: 'Apakah anda yakin ingin menghapus?',
      text: "data akan dihapus",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Data!'
    }).then((result) => {
      if (result.value) {
        // document.location.href = href;
        // document.location.action = action;
        // document.getElementById("#delete").setValue('Adakah');
        // console.log(result);
        $('#form-delete').submit();
      }
    })
})
</script>


</body>
</html>
