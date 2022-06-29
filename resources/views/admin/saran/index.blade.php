<div class="card">
<div class="card-body">

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/saran" class="btn btn-info btn-flat tombol-hapus"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th width="30px">#</th>
      <th>Nama</th>
      <th class="100px">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($saran as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td><a href="/admin/saran/{{$row->id}}"><b>{{$row->name}}</a></b> </td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/admin/saran/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                <form action="/admin/saran/{{$row->id}}" method="post" id="form-delete" class="tombol-hapus">
                  @method('delete')
                  @csrf
                  <button type="submit" id="delete" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
          </div>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

  <div class="float-right">
    {{$saran->links()}}
  </div>
</div>
</div>
<!-- /.card-body -->


