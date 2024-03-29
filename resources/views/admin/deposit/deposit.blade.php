@extends('admin.dashboard')

@section('content')

    <div class="page-content">

<div class="mb-2">Deposits</div>
  

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
                    <label class="stop_propagation">Reference number</label>
                    <div class="float-right table_top_right">
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
                    <label class="stop_propagation">Deposit Amount</label>
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

                @foreach ($all_deposit as $each_deposit)
                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_deposit->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->customer_name }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->code }}</td>
            <td class="text-start" style="color: #495057;">{{ number_format($each_deposit->amount, 2) }}</td>
            <td class="text-start" style="color: #495057;">
                @if ($each_deposit->system_user_data)
                    {{ $each_deposit->system_user_data->username }}
                @else
                    -
                @endif
            </td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->updated_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->created_at }}</td>
            @if ( $each_deposit->status == 'Completed' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-warning" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @endif

            <!-- Button trigger modal -->
            @if ( $each_deposit->status == 'Completed' || $each_deposit->status == 'Rejected' )
                <td id="update_modal_button_{{ $each_deposit->id }}" onclick="update_open_modal('{{ $each_deposit->id }}')"
                class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                View
                </td>
            @else
                <td id="change_modal_button_{{ $each_deposit->id }}" onclick="change_open_modal('{{ $each_deposit->id }}')"
                class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                View
                </td>
            @endif

            <!-- Pending Modal -->
            <div class="modal fade" id="change_exampleModalCenter_{{ $each_deposit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deposits</h5>
                    <button type="button" class="close" data-dismiss="modal" id="change_top_close_modal_{{ $each_deposit->id }}" 
                    onclick="change_top_close_modal('{{ $each_deposit->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.update_deposit', $each_deposit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> Username: <span> {{ $each_deposit->customer_name }} </span></li>
                                <li> Code: <span> {{ $each_deposit->code }} </span></li>
                                <li> Deposit Amount USD: <span> {{ $each_deposit->amount }} </span></li>
                                <li> Created By: 
                                @if (!is_null($each_deposit->system_user_data))
                                    <span>{{ $each_deposit->system_user_data->username }}</span>
                                @else
                                    <span></span>
                                @endif
                                </li>
                                <li> Updated At: <span> {{ $each_deposit->updated_at }} </span></li>
                                <li> Created At: <span> {{ $each_deposit->created_at }} </span></li>
                                <li> Status: <span> {{ $each_deposit->status }} </span></li>
                                <li> Completed: 
                                    <span class="ml-4">
                                        
                                        @if ($each_deposit->status == "Completed")
                                    <input type="checkbox" id="com_check_{{ $each_deposit->id }}" name="completed" onchange="com(this, '{{ $each_deposit->id }}')" class="form-check-input" checked>
                                        @else
                                    <input type="checkbox" id="com_check_{{ $each_deposit->id }}" name="completed" onchange="com(this, '{{ $each_deposit->id }}')" class="form-check-input">
                                        @endif
          
                                    </span>
                                </li>
                                <li> Rejected: 
                                    <span class="ml-4">
                                            @if ($each_deposit->status == "Rejected")
                                        <input type="checkbox" id="rej_check_{{ $each_deposit->id }}" name="rejected" onchange="rej(this, '{{ $each_deposit->id }}')" class="form-check-input" checked>
                                            @else
                                        <input type="checkbox" id="rej_check_{{ $each_deposit->id }}" name="rejected" onchange="rej(this, '{{ $each_deposit->id }}')" class="form-check-input">
                                            @endif
                                    </span>
                                </li>
                                <script>
                                    function com (event, id) {
                                        if($(event).prop('checked')) {
                                            $(`#rej_check_${id}`).prop('checked', false);
                                            $(`#rej_check_${id}`).hide();
                                        } else {
                                            $(`#rej_check_${id}`).show();
                                        }
                                    }
                                    function rej (event, id) {
                                        if($(event).prop('checked')) {
                                            $(`#com_check_${id}`).prop('checked', false);
                                            $(`#com_check_${id}`).hide();
                                        } else {
                                            $(`#com_check_${id}`).show();
                                        }
                                    }
                                </script>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="change_close_modal_{{ $each_deposit->id }}" 
                            onclick="change_close_modal('{{ $each_deposit->id }}')" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                    <script>
                        function change_open_modal(deposit_id){
                            $(`#change_exampleModalCenter_${deposit_id}`).modal('show');
                        }

                        function change_close_modal(deposit_id){
                            $(`#change_exampleModalCenter_${deposit_id}`).modal('hide');
                        }

                        function change_top_close_modal(deposit_id){
                            $(`#change_exampleModalCenter_${deposit_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>
            
            <!-- Completed or Rejected Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_deposit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deposits</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_deposit->id }}" 
                    onclick="update_top_close_modal('{{ $each_deposit->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> Username: <span> {{ $each_deposit->customer_name }} </span></li>
                                <li> Code: <span> {{ $each_deposit->code }} </span></li>
                                <li> Deposit Amount USD: <span> {{ $each_deposit->amount }} </span></li>
                                <li> Created By: 
                                @if (!is_null($each_deposit->system_user_data))
                                    <span>{{ $each_deposit->system_user_data->username }}</span>
                                @else
                                    <span></span>
                                @endif
                                </li>
                                <li> Updated At: <span> {{ $each_deposit->updated_at }} </span></li>
                                <li> Created At: <span> {{ $each_deposit->created_at }} </span></li>
                                <li> Status: <span> {{ $each_deposit->status }} </span></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_deposit->id }}" 
                            onclick="update_close_modal('{{ $each_deposit->id }}')" data-dismiss="modal">Back</button>
                            <!-- <button type="submit" class="btn btn-sm btn-primary">Update</button> -->
                        </div>
                    </form>
                    <script>
                        function update_open_modal(deposit_id){
                            $(`#update_exampleModalCenter_${deposit_id}`).modal('show');
                        }

                        function update_close_modal(deposit_id){
                            $(`#update_exampleModalCenter_${deposit_id}`).modal('hide');
                        }

                        function update_top_close_modal(deposit_id){
                            $(`#update_exampleModalCenter_${deposit_id}`).modal('hide');
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
        <script src="{{asset('assets/admin/js/table/deposit_table_display.js')}}"></script>

    </div>

@endsection
