<section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Password</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $data)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$data->nama}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->password}}</td>
              <td>
                <a href="/superadmin/edit_data_admin/{{$data->id}}" class="badge badge-success">edit</a>
                <a href="/superadmin/delete_data_admin/{{$data->id}}" class="badge badge-danger">delete</a>
                <!-- <button data-id="{{$data->id}}" class="deleteRecord" data-token="{{ csrf_token() }}">delete</button> -->
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
</section>