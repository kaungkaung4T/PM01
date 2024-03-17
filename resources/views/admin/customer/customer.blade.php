@extends('admin.dashboard')

@section('content')

<script>
    
</script>

    <div class="page-content">

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert" style="margin-left: 30px;width: 500px;margin-top: 10px;margin-bottom: 20px;">
                        <b class="" role="alert">{{ $errors->first() }}</b>
                    </div>
                    @endif

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
        <form action="{{ route('admin.create_customer') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body customer_modal_form pb-5">
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Username:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Password:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="password" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Phone:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="phone" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>NRIC:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="nric" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Name:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="name" type="text" id="create_name" class="form-control" required>
                    </div>
                    <script>
                        $("#create_name").keypress(function(event) {
                            var character = String.fromCharCode(event.keyCode);
                            return isValid(character);
                        });

                        function isValid(str) {
                            return !/[1234567890]/g.test(str);
                        }
                    </script>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Bank Type:</label>
                    </div>
                    <div class="col-sm-9">
                    <select name="bank_type" class="form-select" required>
                        <option disabled selected value>  </option>
                        <option  value="kpay">KPAY</option>
                        <option  value="wave_pay"> WavePay </option>
                        <option  value="kbz_bank"> KBZ Bank </option>
                        <option  value="uab_bank"> UAB Bank </option>
                        <option  value="yoma_bank"> YOMA Bank </option>
                        <option  value="aya_bank"> AYA Bank </option>
                        <option  value="cb_bank"> CB Bank </option>
                        <option  value="agd_bank"> AGD Bank </option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1"> * </span><label>Bank Number:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="bank_number" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                    <span class="mr-1">  </span><label>Remarks:</label>
                    </div>
                    <div class="col-sm-9">
                    <textarea name="remark" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-4 col-form-label modal_form_group_word">
                    <span class="mr-1">  </span><label>Parent User:</label>
                    </div>
                    <div class="col-sm-9">
                    <input name="parent_user" type="text" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row modal_form_group">
                    <div class="col-sm-3 form-check-label mr-3 modal_form_group_word">
                    <span class="mr-1">  </span><label>Fake:</label>
                    </div>
                    <div class="col-sm-9">
                    <input type="checkbox" name="fake" class="form-check-input" id="check_count_down"><label class="fake_label">FAKE</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm border" id="close_modal" data-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
            <div>
                <form action="" class="customer_modal_form_reset_password">
                    <div class="row g-3 align-items-center modal_form_group">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">Reset Password:</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text">
                            <button class="btn btn-sm border text-danger">Reset Here</button>
                        </span>
                    </div>
                    </div>
                </form>
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
                <table id="tbl-contact" class="display table table-image mb-2">

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
                    <label class="stop_propagation">Phone</label>
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
                    <label class="stop_propagation">Name</label>
                    <div class="float-right">
                        <a class="stop_propagation">
                            <i class="bi bi-search search_button3 stop_propagation search_icon"></i>
                            <div class="search_group3">
                                <input type="search" class="form-control col-search-input search_table3 stop_propagation" placeholder="Search" />
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
                    <label class="stop_propagation">Amount(s)</label>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Created By</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
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

                @foreach ($all_customer as $each_customer)
                <tr>
            <th scope="row" class="text-start align-middle" style="color: #495057;font-weight: normal;"> {{ $each_customer->id }} </th>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->username }} </td>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->phone }} </td>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->name }} </td>
            <td class="text-start align-middle" style="color: #495057;"> 
 
                <div class="main_amount_group">
                    @if (!empty($each_customer->deposit_data))
                        <ul>
                            <?php $total = $each_customer->deposit_data->wallet + $each_customer->deposit_data->wallet2 + $each_customer->deposit_data->wallet3 ?>
                            
                            <li>Total Amount: <span> {{ number_format($total, 2) }} </span></li>
                            <li>Wallet 1 Amount: <span>{{ number_format($each_customer->deposit_data->wallet, 2) }}</span></li>
                            <li>Wallet 2 Amount: <span>{{ number_format($each_customer->deposit_data->wallet2, 2) }}</span></li>
                            <li>Wallet 3 Amount: <span>{{ number_format($each_customer->deposit_data->wallet3, 2) }}</span></li>
                            <li>Pending Withdrawal Amount: <span>0.00</span></li>
                            <li>Stacked Amount: <span>0.00</span></li>
                        </ul>
                    @else
                    <ul>
                        <li>Total Amount: <span>0.00</span></li>
                        <li>Wallet 1 Amount: <span>0.00</span></li>
                        <li>Wallet 2 Amount: <span>0.00</span></li>
                        <li>Wallet 3 Amount: <span>0.00</span></li>
                        <li>Pending Withdrawal Amount: <span>0.00</span></li>
                        <li>Stacked Amount: <span>0.00</span></li>
                    </ul>
                    @endif
                </div>
            </td>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->system_user_data->username }} </td>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->updated_at }} </td>
            <td class="text-start align-middle" style="color: #495057;"> {{ $each_customer->created_at }} </td>
            
            
            @if ( $each_customer->status == 'Active' )
            <td class="text-start align-middle" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_customer->status }}</td>
            @else
            <td class="text-start align-middle" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_customer->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td class="text-start align-self-start" style="color: #495057;">
                <div class="align-self-start main_action_group">
                    <div class="top_action_group">
                        <ul>
                            <li><a id="deposit_modal_button_{{ $each_customer->id }}" onclick="deposit_open_modal('{{ $each_customer->id }}')" class="btn btn-sm btn-success text-white">Deposit</a></li>
                            <li><a id="deduct_modal_button_{{ $each_customer->id }}" onclick="deduct_open_modal('{{ $each_customer->id }}')" class="btn btn-sm btn-danger text-white">Deduct</a></li>
                            <li><a class="btn btn-sm border">Add Downline</a></li>
                            <li><a id="update_modal_button_{{ $each_customer->id }}" onclick="update_open_modal('{{ $each_customer->id }}')" class="edit_action btn btn-sm border text-danger"
                                style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                                Edit
                            </a></li>
                            <li><a id="package_modal_button_{{ $each_customer->id }}" onclick="package_open_modal('{{ $each_customer->id }}')" class="btn btn-sm border">Buy Package</a></li>
                        </ul>
                    </div>

                    <!-- <div class="bottom_action_group">
                        <ul>
                            <li><a class="btn btn-sm btn-primary text-white">Add|Deduct Reinvest Wallet</a></li>
                            <li><a class="btn btn-sm btn-primary text-white">Add|Deduct Referral Wallet</a></li>
                            <li><a class="btn btn-sm btn-primary text-white">Withdraw Referral Wallet</a></li>
                            <li><a class="claim_action btn btn-sm border text-danger">Claim Wallet 2</a></li>
                        </ul>
                    </div> -->
                </div>
            </td>
            
            <!-- Modal of Customer Package -->
            <div class="modal fade" id="package_exampleModalCenter_{{ $each_customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Package</h5>
                    <button type="button" class="close" data-dismiss="modal" id="package_top_close_modal_{{ $each_customer->id }}" 
                    onclick="package_top_close_modal('{{ $each_customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.subscribe') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- To get Customer ID -->
                        <input name="userid" type="hidden" class="form-control" value="{{ $each_customer->id }}">

                        <div class="modal-body customer_package_modal_form pb-5">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="username" type="text" class="form-control" value="{{ $each_customer->username }}" readonly required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Wallet:</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="wallet" class="form-select" required>
                                    <option disabled selected value>  </option>
                                    <option  value="wallet_1"> Wallet 1 </option>
                                    <option  value="wallet_2"> Wallet 2 </option>
                                    <option  value="wallet_3"> Wallet 3 </option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Package:</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="package" class="form-select" required>
                                    <option disabled selected value>  </option>
                                        @foreach ($all_package as $each_package)
                                    <option  value="{{ $each_package->id }}"> {{ $each_package->name }} ({{ number_format($each_package->amount, 2) }}) </option>
                                        @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Amount MMK:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="amount" type="number" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm border" id="package_close_modal_{{ $each_customer->id }}" 
                        onclick="package_close_modal('{{ $each_customer->id }}')" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                    </form>
                    <script>
                        function package_open_modal(customer_id){
                            $(`#package_exampleModalCenter_${customer_id}`).modal('show');
                        }

                        function package_close_modal(customer_id){
                            $(`#package_exampleModalCenter_${customer_id}`).modal('hide');
                        }

                        function package_top_close_modal(customer_id){
                            $(`#package_exampleModalCenter_${customer_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>

            <!-- Modal of Customer Deduct -->
            <div class="modal fade" id="deduct_exampleModalCenter_{{ $each_customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deduct Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" id="deduct_top_close_modal_{{ $each_customer->id }}" 
                    onclick="deduct_top_close_modal('{{ $each_customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.deduct', $each_customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- To get Customer ID -->
                        <input name="userid" type="hidden" class="form-control" value="{{ $each_customer->id }}">

                        <div class="modal-body customer_deduct_modal_form pb-5">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="username" type="text" class="form-control" value="{{ $each_customer->username }}" readonly required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Wallet:</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="wallet" class="form-select" required>
                                    <option disabled selected value>  </option>
                                    <option  value="wallet_1"> Wallet 1 </option>
                                    <option  value="wallet_2"> Wallet 2 </option>
                                    <option  value="wallet_3"> Wallet 3 </option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Deduct Amount MMK:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="amount" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Remarks:</label>
                                </div>
                                <div class="col-sm-8">
                                <textarea name="remark" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm border" id="deduct_close_modal_{{ $each_customer->id }}" 
                        onclick="deduct_close_modal('{{ $each_customer->id }}')" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-sm btn-primary">Deduct</button>
                    </div>
                    </form>
                    <script>
                        function deduct_open_modal(customer_id){
                            $(`#deduct_exampleModalCenter_${customer_id}`).modal('show');
                        }

                        function deduct_close_modal(customer_id){
                            $(`#deduct_exampleModalCenter_${customer_id}`).modal('hide');
                        }

                        function deduct_top_close_modal(customer_id){
                            $(`#deduct_exampleModalCenter_${customer_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>

            <!-- Modal of Customer Deposit -->
            <div class="modal fade" id="deposit_exampleModalCenter_{{ $each_customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deposit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" id="deposit_top_close_modal_{{ $each_customer->id }}" 
                    onclick="deposit_top_close_modal('{{ $each_customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.create_deposit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- To get Customer ID -->
                        <input name="userid" type="hidden" class="form-control" value="{{ $each_customer->id }}">

                        <div class="modal-body customer_deposit_modal_form pb-5">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="username" type="text" class="form-control" value="{{ $each_customer->username }}" readonly required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Deposit Amount MMK:</label>
                                </div>
                                <div class="col-sm-5">
                                    <input name="amount" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Remarks:</label>
                                </div>
                                <div class="col-sm-8">
                                <textarea name="remark" type="text" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Wallet:</label>
                                </div>
                                <div class="col-sm-8">
                                <select name="wallet" class="form-select" required>
                                    <option disabled selected value>  </option>
                                    <option  value="wallet_1"> Wallet 1 </option>
                                    <option  value="wallet_2"> Wallet 2 </option>
                                    <option  value="wallet_3"> Wallet 3 </option>
                                </select>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm border" id="deposit_close_modal_{{ $each_customer->id }}" 
                        onclick="deposit_close_modal('{{ $each_customer->id }}')" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-sm btn-primary">Deposit</button>
                    </div>
                    </form>
                    <script>
                        function deposit_open_modal(customer_id){
                            $(`#deposit_exampleModalCenter_${customer_id}`).modal('show');
                        }

                        function deposit_close_modal(customer_id){
                            $(`#deposit_exampleModalCenter_${customer_id}`).modal('hide');
                        }

                        function deposit_top_close_modal(customer_id){
                            $(`#deposit_exampleModalCenter_${customer_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>

            <!-- Modal of Customer Update -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_customer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_customer->id }}" 
                    onclick="update_top_close_modal('{{ $each_customer->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.update_customer', $each_customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body customer_modal_form pb-5">
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Username:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="username" type="text" class="form-control" value="{{ $each_customer->username }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Password:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="password" type="password" class="form-control" value="{{ $each_customer->password }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Phone:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="phone" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" value="{{ $each_customer->phone }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>NRIC:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="nric" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" value="{{ $each_customer->nric }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Name:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="name" type="text" id="update_name" class="form-control" value="{{ $each_customer->name }}" required>
                                </div>
                                <script>
                                    $("#update_name").keypress(function(event) {
                                        var character = String.fromCharCode(event.keyCode);
                                        return isValid(character);
                                    });

                                    function isValid(str) {
                                        return !/[1234567890]/g.test(str);
                                    }
                                </script>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Bank Type:</label>
                                </div>
                                <div class="col-sm-9">
                                <select name="bank_type" class="form-select" required>
                                    <!-- <option disabled selected value>  </option> -->
                                    <option selected value="{{ $each_customer->bank_type }}"> {{ $each_customer->bank_type }} </option>
                                    <option  value="kpay">KPAY</option>
                                    <option  value="wave_pay"> WavePay </option>
                                    <option  value="kbz_bank"> KBZ Bank </option>
                                    <option  value="uab_bank"> UAB Bank </option>
                                    <option  value="yoma_bank"> YOMA Bank </option>
                                    <option  value="aya_bank"> AYA Bank </option>
                                    <option  value="cb_bank"> CB Bank </option>
                                    <option  value="agd_bank"> AGD Bank </option>
                                </select>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1"> * </span><label>Bank Number:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="bank_number" type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control" value="{{ $each_customer->bank_number }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Remarks:</label>
                                </div>
                                <div class="col-sm-9">
                                <textarea name="remark" type="text" class="form-control">{{ $each_customer->remark }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-4 col-form-label modal_form_group_word">
                                <span class="mr-1">  </span><label>Parent User:</label>
                                </div>
                                <div class="col-sm-9">
                                <input name="parent_user" type="text" class="form-control" value="{{ $each_customer->parent_user }}">
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-3 form-check-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Fake:</label>
                                </div>
                                <div class="col-sm-9">
                                    @if ($each_customer->fake)
                                <input type="checkbox" name="fake" class="form-check-input" id="check_count_down" checked><label class="fake_label">FAKE</label>
                                    @else
                                <input type="checkbox" name="fake" class="form-check-input" id="check_count_down"><label class="fake_label">FAKE</label>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row modal_form_group">
                                <div class="col-sm-3 form-check-label mr-3 modal_form_group_word">
                                <span class="mr-1">  </span><label>Status:</label>
                                </div>
                                <div class="col-sm-9">
                                    @if ($each_customer->status == "Active")
                                <input type="checkbox" name="status" class="form-check-input" id="check_count_down" checked>
                                    @else
                                <input type="checkbox" name="status" class="form-check-input" id="check_count_down">
                                    @endif
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_customer->id }}" 
                        onclick="update_close_modal('{{ $each_customer->id }}')" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                    </form>
                        <div class="customer_modal_form_reset_password">
                            <form action="">
                                <div class="row g-3 align-items-center modal_form_group">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Reset Password:</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                                </div>
                                <div class="col-auto">
                                    <span id="passwordHelpInline" class="form-text">
                                        <button class="btn btn-sm border text-danger">Reset Here</button>
                                    </span>
                                </div>
                                </div>
                            </form>
                        </div>
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

                @endforeach

                </tbody>
            </table>
        </div>

        <script>

        </script>

        <!-- display table -->
        <script src="{{asset('assets/admin/js/table/customer_table_display.js')}}"></script>

    </div>

@endsection
