@extends('admin.dashboard')

@section('content')

    <div class="page-content">

                
    <div class="setting_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">My Setting</legend>
        </fieldset>
        <div class="setting_body">
            <form action="{{ route('admin.update_name', $each_user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body setting_modal_form">
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-1 col-form-label mr-3 modal_form_group_word">
                        <span class="mr-1"> * </span><label>Name:</label>
                        </div>
                        <div class="col-sm-9">
                        <input name="username" type="text" class="form-control" value="{{ $each_user->username }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-1 col-form-label mr-3 modal_form_group_word">
                        <span class="mr-1">  </span><label>Password:</label>
                        </div>
                        <div class="col-sm-9">
                        <button type="button" id="update_modal_button_{{ $each_user->id }}" onclick="update_open_modal('{{ $each_user->id }}')"
                         class="btn btn-sm border" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                            Change Password
                        </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm border submit_change">Submit Changes</button>
                </div>

            </form>


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
                    <form action="{{ route('admin.update_password', $each_user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body setting_modal_form_password">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-2 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>New Password:</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="password" type="password" class="form-control" required>
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


        </div>
    </div>


    </div>

@endsection