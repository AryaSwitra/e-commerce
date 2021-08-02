<section class="content">
      <div class="container-fluid">
       
          <!-- table -->
      
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Kategori</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Harga</th>
              <th scope="col">Gambar</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($produks as $prd)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$prd->title}}</td>
              <td>{{$prd->deskripsi}}</td>
              <td>{{$prd->kategori}}</td>
              <td>{{$prd->jumlah}}</td>
              <td>{{$prd->harga}}</td>
              <td><img width="80px" src="{{ url('../images/'.$prd->gambar) }}"></td>
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