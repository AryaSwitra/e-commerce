<section class="content">
      <div class="container-fluid">
       
          <!-- table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Title</th>
              <th scope="col">Foto</th>
              <th scope="col">Active</th>
              <th scope="col">Uploader</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($datas as $dt)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$dt->title}}</td>
              <td><img width="80px" src="{{ url('../images/'.$dt->foto) }}"></td>
              <td>{{$dt->active}}</td>
              <td>{{$dt->uploader}}</td>
              <td>
                <a href="{{url('/superadmin/active_slider/'.$dt->id)}}" class="badge badge-primary">On</a>
                <a href="{{url('/superadmin/unactive_slider/'.$dt->id)}}" class="badge badge-warning">Off</a>
                <a href="" class="badge badge-success">Edit</a>
                <a href="" class="badge badge-danger">Delete</a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <!-- /.table -->
       
      </div><!-- /.container-fluid -->
    </section>