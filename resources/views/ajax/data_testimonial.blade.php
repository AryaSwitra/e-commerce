<section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Komentar</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dts as $dt)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$dt->nama}}</td>
              <td>{{$dt->email}}</td>
              <td>{{$dt->komentar}}</td>
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