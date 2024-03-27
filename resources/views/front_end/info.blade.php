
@extends('front_end.dashboard')

@section('content')


    <div class="page-content">

                
    <div class="setting_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">My Setting</legend>
        </fieldset>
        <div class="setting_body">
            <form action="{{ route('change_info') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body setting_modal_form">
                    <div class="mb-4 row modal_form_group">
                        <a href="{{ route('bank') }}" class="text-primary">Edit Bank <i class="bi bi-arrow-up-right-circle"></i></a>
                    </div>
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-2 col-form-label modal_form_group_word">
                        <span class="mr-1"> * </span><label>Name:</label>
                        </div>
                        <div class="col-sm-7">
                        <input name="username" type="text" class="form-control" style="color: #6c757d;" value="{{ $customer->username }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-2 col-form-label modal_form_group_word">
                        <span class="mr-1"> * </span><label>Phone:</label>
                        </div>
                        <div class="col-sm-7">
                        <input name="phone" type="number" class="form-control" style="color: #6c757d;" value="{{ $customer->phone }}" onkeydown="javascript: return event.keyCode == 69 ? false : true" required>
                        </div>
                    </div>
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-2 col-form-label modal_form_group_word">
                        <span class="mr-1"> * </span><label>NRIC:</label>
                        </div>
                        <div class="col-sm-7">
                        <input name="nric" type="text" class="form-control" style="color: #6c757d;" value="{{ $customer->nric }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row modal_form_group">
                        <div class="col-sm-2 col-form-label modal_form_group_word">
                        <span class="mr-1">  </span><label>Password:</label>
                        </div>
                        <div class="col-sm-7">
                        <button type="button" id="update_modal_button_{{ $customer->id }}" onclick="update_open_modal('{{ $customer->id }}')"
                         class="btn btn-sm border" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                            Change Password
                        </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm border submit_change">Submit Changes</button>
                </div>

            </form>


            <!-- Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Admin/CS</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $customer->id }}" 
                    onclick="update_top_close_modal('{{ $customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('change_password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body setting_modal_form_password">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label modal_form_group_word">
                                <span class="mr-1"> * </span><label>New Password:</label>
                                </div>
                                <div class="col-sm-7">
                                <input name="password" type="password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $customer->id }}" 
                            onclick="update_close_modal('{{ $customer->id }}')" data-dismiss="modal">Back</button>
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
