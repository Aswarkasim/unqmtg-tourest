<!-- FOOTER -->
      <footer class="container mt-5">
        <a href="#">Back to top</a>
        <a href="/admin/auth" class="mx-5">Login</a>
        <p>&copy; 2022 Karossa Teknologi Center, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>


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
