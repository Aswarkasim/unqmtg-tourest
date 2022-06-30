<div class="card">
<div class="card-body">

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/saran" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th width="30px">#</th>
      <th>Nama</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($saran as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td><a href="/admin/saran/show/{{$row->id}}"><b>{{$row->name}}</a></b> </td>
      <td>
       
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


