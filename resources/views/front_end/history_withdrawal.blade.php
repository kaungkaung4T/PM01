
@extends('front_end.dashboard')

@section('content')

<!-- Bootstrap modal dialog external -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- End Bootstrap modal dialog -->
  
  <!-- Table Search and pagination -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  
  <!-- <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" rel="stylesheet">
  <!-- End Table  -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
  
  <!-- core:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/core/core.css')}}">
  <!-- endinject -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/feather-font/css/iconfont.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/demo2/style.css')}}">
  <!-- End layout styles -->

    <link rel="stylesheet" href="{{asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">

  <link rel="shortcut icon" href="{{asset('assets/ui/img/foodlifesavers LOGO v1.png')}}" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


  <script src="{{asset('assets/admin/vendors/core/core.js')}}"></script>

    <script src="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/apexcharts/apexcharts.min.js')}}"></script>

    <script src="{{asset('assets/admin/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/template.js')}}"></script>

    <script src="{{asset('assets/admin/js/dashboard-dark.js')}}"></script>

    <script src="https://kit.fontawesome.com/27dabc0c76.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{asset('assets/admin/js/code/code.js')}}"></script>
    <script src="{{asset('assets/admin/js/code/validate.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/data-table.js')}}"></script>


    <script src="{{asset('assets/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>

    <script src="{{asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>

    
    <div class="page-content">
        <div class="mb-2">Withdrawal</div>
  

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
                    <label class="stop_propagation" style="max-width: 53px !important;">Request Amount</label>
                    <div class="float-right table_top_right" style="margin-top: 16px;">
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
                    <label class="stop_propagation">Remarks</label>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Created At</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Completed At</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Rejected At</label>
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

                @foreach ($all_withdrawal as $each_withdrawal)
                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_withdrawal->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_withdrawal->customer_name }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_withdrawal->code }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_withdrawal->amount }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_withdrawal->remark }}</td>
            <td class="text-start" style="color: #495057;">
                <ul style="list-style: none;margin-left: -30px;">
                    <li>{{ $each_withdrawal->created_at }}</li>
                    <li class="text-primary">{{ $each_withdrawal->customer_name }}</li>
                </ul>
            </td>
                @if ($each_withdrawal->complete_date == NULL || $each_withdrawal->complete_date == "0000-00-00 00:00:00")
            <td class="text-start" style="color: #495057;"> - </td>
                @else
            <td class="text-start" style="color: #495057;"> 
                <ul style="list-style: none;margin-left: -30px;">
                    <li>{{ $each_withdrawal->complete_date }}</li>
                        @if ($each_withdrawal->completed_rejected_user_user_data)
                    <li class="text-primary">{{ $each_withdrawal->completed_rejected_user_user_data->username }}</li>
                        @else
                    <li class="text-primary"></li>
                        @endif
                </ul>
            </td>
                @endif

                @if ($each_withdrawal->reject_date == NULL || $each_withdrawal->reject_date == "0000-00-00 00:00:00")
            <td class="text-start" style="color: #495057;"> - </td>
                @else
            <td class="text-start" style="color: #495057;">
                <ul style="list-style: none;margin-left: -30px;">
                    <li>{{ $each_withdrawal->reject_date }}</li>
                        @if ($each_withdrawal->completed_rejected_user_user_data)
                    <li class="text-primary">{{ $each_withdrawal->completed_rejected_user_user_data->username }}</li>
                        @else
                    <li class="text-primary">{{ $each_withdrawal->completed_rejected_user_user_data->username }}</li>
                        @endif
                </ul>
            </td>
                @endif

            @if ( $each_withdrawal->status == 'Completed' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_withdrawal->status }}</td>
            @elseif ( $each_withdrawal->status == 'Rejected' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_withdrawal->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-warning" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_withdrawal->status }}</td>
            @endif

            <!-- Button trigger modal -->
            @if ( $each_withdrawal->status == 'Completed' || $each_withdrawal->status == 'Rejected' )
            <td id="cr_modal_button_{{ $each_withdrawal->id }}" onclick="cr_open_modal('{{ $each_withdrawal->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            View
            </td>
            @else
            <td id="update_modal_button_{{ $each_withdrawal->id }}" onclick="update_open_modal('{{ $each_withdrawal->id }}')"
            class="text-start" style="color: #000;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                <button class="text-start btn btn-sm btn-info" style="margin-left: -13px;">View</button>
            </td>
            @endif
            

            <!-- Completed and Rejecteed Modal -->
            <div class="modal fade" id="cr_exampleModalCenter_{{ $each_withdrawal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Withdrawal</h5>
                    <button type="button" class="close" data-dismiss="modal" id="cr_top_close_modal_{{ $each_withdrawal->id }}" 
                    onclick="cr_top_close_modal('{{ $each_withdrawal->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> Username: <span> {{ $each_withdrawal->customer_name }} </span></li>
                                <li> Code: <span> {{ $each_withdrawal->code }} </span></li>
                                <li> Request Amount: <span> {{ number_format($each_withdrawal->amount, 2) }} </span></li>
                                <li> Remarks: <span> {{ $each_withdrawal->remark }} </span></li>
                                <li> Created At: <span> {{ $each_withdrawal->customer_name }} </span></li>
                                <li> Created By:
                                @if (!is_null($each_withdrawal->system_user_data))
                                    <span>{{ $each_withdrawal->system_user_data->username }}</span>
                                @else
                                    <span></span>
                                @endif
                                </li>
                                    @if ($each_withdrawal->complete_date == NULL || $each_withdrawal->complete_date == "0000-00-00 00:00:00")
                                <li> Completed At: <span> - </span></li>
                                    @else
                                <li> Completed At: <span> {{ $each_withdrawal->complete_date }} </span></li>
                                    @endif
                                
                                    @if ($each_withdrawal->reject_date == NULL || $each_withdrawal->reject_date == "0000-00-00 00:00:00")
                                <li> Rejected At: <span> - </span></li>
                                    @else
                                <li> Rejected At: <span> {{ $each_withdrawal->reject_date }} </span></li>
                                    @endif

                                <li> Status: <span> {{ $each_withdrawal->status }} </span></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="cr_close_modal_{{ $each_withdrawal->id }}" 
                            onclick="cr_close_modal('{{ $each_withdrawal->id }}')" data-dismiss="modal">Back</button>
                            <!-- <button type="submit" class="btn btn-sm btn-primary">Update</button> -->
                        </div>
                    </form>
                    <script>
                        function cr_open_modal(deposit_id){
                            $(`#cr_exampleModalCenter_${deposit_id}`).modal('show');
                        }

                        function cr_close_modal(deposit_id){
                            $(`#cr_exampleModalCenter_${deposit_id}`).modal('hide');
                        }

                        function cr_top_close_modal(deposit_id){
                            $(`#cr_exampleModalCenter_${deposit_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>
            
            <!-- Pending Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_withdrawal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Withdrawal</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_withdrawal->id }}" 
                    onclick="update_top_close_modal('{{ $each_withdrawal->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{ route('admin.update_withdrawal', $each_withdrawal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> Username: <span> {{ $each_withdrawal->customer_name }} </span></li>
                                <li> Code: <span> {{ $each_withdrawal->code }} </span></li>
                                <li> Request Amount: <span> {{ number_format($each_withdrawal->amount, 2) }} </span></li>
                                <li> Remarks: <span> {{ $each_withdrawal->remark }} </span></li>
                                <li> Created At: <span> {{ $each_withdrawal->customer_name }} </span></li>
                                <li> Created By:
                                @if (!is_null($each_withdrawal->system_user_data))
                                    <span>{{ $each_withdrawal->system_user_data->username }}</span>
                                @else
                                    <span></span>
                                @endif
                                </li>
                                    @if ($each_withdrawal->complete_date == NULL || $each_withdrawal->complete_date == "0000-00-00 00:00:00")
                                <li> Completed At: <span> - </span></li>
                                    @else
                                <li> Completed At: <span> {{ $each_withdrawal->complete_date }} </span></li>
                                    @endif
                                
                                    @if ($each_withdrawal->reject_date == NULL || $each_withdrawal->reject_date == "0000-00-00 00:00:00")
                                <li> Rejected At: <span> - </span></li>
                                    @else
                                <li> Rejected At: <span> {{ $each_withdrawal->reject_date }} </span></li>
                                    @endif

                                <li> Status: <span> {{ $each_withdrawal->status }} </span></li>
                                <li> Completed: 
                                    <span class="ml-4">
                                        
                                        @if ($each_withdrawal->status == "Completed")
                                    <input type="checkbox" id="com_check_{{ $each_withdrawal->id }}" name="completed" onchange="com(this, '{{ $each_withdrawal->id }}')" class="form-check-input" checked>
                                        @else
                                    <input type="checkbox" id="com_check_{{ $each_withdrawal->id }}" name="completed" onchange="com(this, '{{ $each_withdrawal->id }}')" class="form-check-input">
                                        @endif
          
                                    </span>
                                </li>
                                <li> Rejected: 
                                    <span class="ml-4">
                                            @if ($each_withdrawal->status == "Rejected")
                                        <input type="checkbox" id="rej_check_{{ $each_withdrawal->id }}" name="rejected" onchange="rej(this, '{{ $each_withdrawal->id }}')" class="form-check-input" checked>
                                            @else
                                        <input type="checkbox" id="rej_check_{{ $each_withdrawal->id }}" name="rejected" onchange="rej(this, '{{ $each_withdrawal->id }}')" class="form-check-input">
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
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_withdrawal->id }}" 
                            onclick="update_close_modal('{{ $each_withdrawal->id }}')" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </div>
                    </form>
                    <script>
                        function update_open_modal(withdrawal_id){
                            $(`#update_exampleModalCenter_${withdrawal_id}`).modal('show');
                        }

                        function update_close_modal(withdrawal_id){
                            $(`#update_exampleModalCenter_${withdrawal_id}`).modal('hide');
                        }

                        function update_top_close_modal(withdrawal_id){
                            $(`#update_exampleModalCenter_${withdrawal_id}`).modal('hide');
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

        <!-- withdrawal table -->
        <script src="{{asset('assets/admin/js/table/withdrawal_table_display.js')}}"></script>

    </div>



@endsection
