@extends('admin.dashboard')

@section('content')

    <div class="page-content">

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm border mb-2" id="modal_button" data-toggle="modal" data-target="#exampleModalCenter">
  Create
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" id="top_close_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>

    $('#modal_button').click( function () {
        $('#exampleModalCenter').modal('show');
    });
    
    $('#close_modal').click( function () {
        $('#exampleModalCenter').modal('hide');
    });

    $('#top_close_modal').click( function () {
        $('#exampleModalCenter').modal('hide');
    });

</script>

        <div class="table-responsive">
                <!-- <table  id="dataTableExample" class="table table-dark table-image mb-2"> -->
                <table id="" class="display table table-image mb-2">

            <thead>
                <tr>
                <th scope="col" class="text-dark">ID</th>
                <th scope="col" class="text-dark">Username</th>
                <th scope="col" class="text-dark">Name</th>
                <th scope="col" class="text-dark">Role</th>
                <th scope="col" class="text-dark">Updated At</th>
                <th scope="col" class="text-dark">Created At</th>
                <th scope="col" class="text-dark">Status</th>
                <th scope="col" class="text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i=1 ?>

                @foreach ($all_user as $each_user)

                <tr>
            <th scope="row">{{ $i }}</th>
            <td class="text-secondary">{{ $each_user->username }}</td>
            <td class="text-secondary">{{ $each_user->name }}</td>
            <td class="text-secondary">{{ $each_user->role }}</td>
            <td class="text-secondary">{{ $each_user->updated_at }}</td>
            <td class="text-secondary">{{ $each_user->created_at }}</td>
            <td class="text-secondary">{{ $each_user->status }}</td>
            <td class="text-secondary">{{ Str::limit($each_services->text, 25, $end='...') }}</td>
            <td class="text-secondary"><a href="" class="btn btn-sm btn-outline-primary">Edit</a></td>
            </tr>
                
            <?php $i++ ?>

                @endforeach

                </tbody>
            </table>
        </div>

        <!-- display table -->
        <script src="{{asset('assets/admin/js/table_display.js')}}"></script>

    </div>

@endsection
