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
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">ID</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>

                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Username</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                        <a class="stop_propagation">
                            <i class="bi bi-search search_button1 stop_propagation search_icon"></i>
                            <div class="search_group1">
                                <input type="text" class="form-control col-search-input search_table1 stop_propagation" placeholder="Search" />
                                <div class="search_group_bottom stop_propagation">
                                    <button class="btn btn-sm btn-primary text-white stop_propagation table_search_button">Search</button>
                                    <button class="btn btn-sm border stop_propagation table_search_reset" style="border-color: #ced4da !important;">Reset</button>
                                    <button class="btn text-primary stop_propagation">Filter</button>
                                    <button class="btn text-primary stop_propagation table_search_close">Close</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </th>
                
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Name</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                        <a class="stop_propagation">
                            <i class="bi bi-search search_button2 stop_propagation search_icon"></i>
                            <div class="search_group2">
                                <input type="search" class="form-control col-search-input search_table2 stop_propagation";  placeholder="Search" />
                                <div class="search_group_bottom stop_propagation">
                                    <button type="submit" class="btn btn-sm btn-primary text-white stop_propagation table_search_button">Search</button>
                                    <button class="btn btn-sm border stop_propagation table_search_reset" style="border-color: #ced4da !important;">Reset</button>
                                    <button class="btn text-primary stop_propagation">Filter</button>
                                    <button class="btn text-primary stop_propagation table_search_close">Close</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </th>
                
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Role</label>
                    <div class="float-right">
                        <a class="stop_propagation">
                            <i class="bi bi-search search_button3 stop_propagation search_icon"></i>
                            <div class="search_group3">
                                <input type="text" class="form-control col-search-input search_table3 stop_propagation" placeholder="Search" />
                                <div class="search_group_bottom stop_propagation">
                                    <button class="btn btn-sm btn-primary text-white stop_propagation table_search_button">Search</button>
                                    <button class="btn btn-sm border stop_propagation table_search_reset" style="border-color: #ced4da !important;">Reset</button>
                                    <button class="btn text-primary stop_propagation">Filter</button>
                                    <button class="btn text-primary stop_propagation table_search_close">Close</button>
                                </div>
                            </div>
                        </a>
                    </div>
                </th>

                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Updated At</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Created At</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Status</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Action</label>
                </th>
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
            @if ( $each_user->status == 'Active' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_user->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_user->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td id="update_modal_button_{{ $each_user->id }}" onclick="update_open_modal('{{ $each_user->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            Edit
            </td>

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
                                <input name="password" type="password" class="form-control" value="{{ $each_user->password }}" required>
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
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-3 form-check-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Status:</label>
                                </div>
                                <div class="col-sm-9">
                                    @if ($each_user->status == "Active")
                                <input type="checkbox" name="status" class="form-check-input" id="check_count_down" checked>
                                    @else
                                <input type="checkbox" name="status" class="form-check-input" id="check_count_down">
                                    @endif
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_user->id }}" 
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
        <script src="{{asset('assets/admin/js/table/user_table_display.js')}}"></script>

    </div>

@endsection
