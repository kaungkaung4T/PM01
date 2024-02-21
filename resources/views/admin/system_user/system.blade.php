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
        <h5 class="modal-title" id="exampleModalLongTitle">Create Admin/CS</h5>
        <button type="button" class="close" data-dismiss="modal" id="top_close_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('admin.create_system_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body system_modal_form">
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Username:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Password:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Name:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1">  </span><label>Email:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="email" type="email" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Role:</label>
                    </div>
                    <div class="col-sm-9">
                    <select name="role" class="form-select" required>
                        <option disabled selected value> --select role-- </option>
                        <option value="admin">Admin</option>
                        <option value="service">Service</option>
                    </select>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm border" id="close_modal" data-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
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
                <th scope="col" class="text-start text-dark">ID</th>
                <th scope="col" class="text-start text-dark">Username</th>
                <th scope="col" class="text-start text-dark">Name</th>
                <th scope="col" class="text-start text-dark">Role</th>
                <th scope="col" class="text-start text-dark">Updated At</th>
                <th scope="col" class="text-start text-dark">Created At</th>
                <th scope="col" class="text-start text-dark">Status</th>
                <th scope="col" class="text-start text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i=1 ?>

                @foreach ($all_user as $each_user)

                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_user->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_user->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_user->name }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_user->role }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_user->updated_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_user->created_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_user->status }}</td>
            <td class="text-start" style="color: #495057;"> Edit </td>
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
