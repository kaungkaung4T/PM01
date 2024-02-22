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
        <h5 class="modal-title" id="exampleModalLongTitle">Create Customer</h5>
        <button type="button" class="close" data-dismiss="modal" id="top_close_modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('admin.create_system_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body customer_modal_form">
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Username:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Password:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Phone:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="phone" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>NRIC:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="nric" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Name:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Bank Type:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="bank_type" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Bank Number:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="bank_number" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1">  </span><label>Remarks:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="remark" type="text" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label modal_form_group_word">
                    <span class="mr-1">  </span><label>Parent User:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="parent_user" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 form-check-label mr-3 modal_form_group_word">
                    <span class="mr-1">  </span><label>Fake:</label>
                    </div>
                    <div class="col-sm-9">
                    <input type="checkbox" name="fake" class="form-check-input" id="check_count_down">
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

                @foreach ($all_customer as $each_customer)
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
            
            @if ( $each_customer->status == 'Active' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_customer->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_customer->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td id="update_modal_button_{{ $each_customer->id }}" onclick="update_open_modal('{{ $each_customer->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            Edit
            </td>

            <!-- Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Admin/CS</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_customer->id }}" 
                    onclick="update_top_close_modal('{{ $each_customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.update_system_user', $each_customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body system_modal_form">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="username" type="text" class="form-control" value="" required>
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
                                <input name="name" type="text" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Email:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" value="">
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
                        function update_open_modal(customer_id){
                            $(`#update_exampleModalCenter_${customer_id}`).modal('show');
                        }

                        function update_close_modal(customer_id){
                            $(`#update_exampleModalCenter_${customer_id}`).modal('hide');
                        }

                        function update_top_close_modal(customer_id){
                            $(`#update_exampleModalCenter_${customer_id}`).modal('hide');
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
