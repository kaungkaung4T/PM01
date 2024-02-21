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
                        <option disabled selected value>  </option>
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
                <th scope="col" class="text-start text-dark">Phone</th>
                <th scope="col" class="text-start text-dark">Name</th>
                <th scope="col" class="text-start text-dark">Amount(s)</th>
                <th scope="col" class="text-start text-dark">Created By</th>
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
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">  </th>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            <td class="text-start" style="color: #495057;">  </td>
            

            <td class="text-start" style="color: #495057;">  </td> <!-- TESTING -->
            <td class="text-start" style="color: #495057;">  </td> <!-- TESTING -->
            
            <!-- @if ( $each_user->status == 'Active' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp;  </td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp;  </td>
            @endif -->

            <!-- Button trigger modal -->
            <!-- <td id="update_modal_button_{{ $each_user->id }}" onclick="update_open_modal('{{ $each_user->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            Edit
            </td> -->

            <!-- Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Admin/CS</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_user->id }}" 
                    onclick="update_top_close_modal('{{ $each_user->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.update_system_user', $each_user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body system_modal_form">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="username" type="text" class="form-control" value="{{ $each_user->username }}" required>
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
                                <input name="name" type="text" class="form-control" value="{{ $each_user->name }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Email:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" value="{{ $each_user->email }}">
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Role:</label>
                                </div>
                                <div class="col-sm-9">
                                <select name="role" class="form-select" value required>
                                    <option disabled value>  </option>
                                    @if ( $each_user->role == 'admin' )
                                    <option value="admin" selected>Admin</option>
                                    <option value="service">Service</option>
                                    @else
                                    <option value="admin">Admin</option>
                                    <option value="service" selected>Service</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_user->id }}s" 
                            onclick="update_close_modal('{{ $each_user->id }}')" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                    <script>
                        function update_open_modal(user_id){
                            $(`#update_exampleModalCenter_${user_id}`).modal('show');
                        }

                        function update_close_modal(user_id){
                            $(`#update_exampleModalCenter_${user_id}`).modal('hide');
                        }

                        function update_top_close_modal(user_id){
                            $(`#update_exampleModalCenter_${user_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>
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
