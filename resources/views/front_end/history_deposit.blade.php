
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


    <div class="history-subscribe-chose-feature">
        <a href="{{ route('history_deposit') }}" class="history-subscribe-chose-feature-each">
            <div class="logo"><i class="bi bi-download"></i></div>
            <p class="">Deposit</p>
        </a>

        <a href="{{ route('history_withdrawal') }}" class="history-subscribe-chose-feature-each">
            <div class="logo"><i class="bi bi-upload"></i></div>
            <p class="">Withdrawal</p>
        </a>
    </div>


    <div class="mb-2">Deposits History</div>
  

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
                    <div class="float-right table_top_right">
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


                <td id="update_modal_button_{{ $each_deposit->id }}" onclick="update_open_modal('{{ $each_deposit->id }}')"
                class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
                View
                </td>
            
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
