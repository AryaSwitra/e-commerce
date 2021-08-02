<section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
          </thead>
          <tbody>
            @foreach($kategoris as $kat)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <th scope="row">{{$kat->nama_kategori}}</th>
              <td>
                <a href="" class="badge badge-success">edit</a>
                <a href="" class="badge badge-danger">delete</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
    </section>