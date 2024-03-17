@extends('admin.dashboard')

@section('content')

    <div class="page-content">

<div class="mb-2">Subscriptions</div>
  

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
                    <label class="stop_propagation">Amount</label>
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
                    <label class="stop_propagation">Package Name</label>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">Start At</label>
                    <div class="float-right table_top_right">
                        <i class="bi bi-arrow-down-up arrow_icon"></i>
                    </div>
                </th>
                <th scope="col" class="text-start text-dark">
                    <label class="stop_propagation">End At</label>
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

                @foreach ($all_subscriptions as $each_subscriptions)
                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_subscriptions->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->customer_data->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->code }}</td>
            <td class="text-start" style="color: #495057;">{{ number_format($each_subscriptions->amount, 2) }}</td>
            <td class="text-start" style="color: #495057;">
                <ul style="list-style: none;margin-left: -30px;">
                    <li> Name: <span> {{ $each_subscriptions->package_data->name }} </span></li>
                    <li> Amount: <span class="text-primary"> {{ number_format($each_subscriptions->package_data->amount, 2) }} </span></li>
                    <!-- <li> Rate: <span> {{ $each_subscriptions->package_data->rate }} ~ {{ $each_subscriptions->package_data->rate }} </span></li> -->
                    
                        @if ($each_subscriptions->reward_wallet_1)
                    <li> Rewarded Wallet 1: <span class="text-danger"> {{ number_format($each_subscriptions->reward_wallet_1) }}% </span></li>
                        @else
                    <li> Rewarded Wallet 1: <span class="text-danger"> 0.00 </span></li>
                        @endif

                        @if ($each_subscriptions->reward_wallet_2)
                    <li> Rewarded Wallet 2: <span class="text-primary"> {{ number_format($each_subscriptions->reward_wallet_2) }}% </span></li>
                        @else
                    <li> Rewarded Wallet 2: <span class="text-primary"> 0.00 </span></li>
                        @endif

                        @if ($each_subscriptions->reward_wallet_3)
                    <li> Rewarded Wallet 3: <span class="text-primary"> {{ number_format($each_subscriptions->reward_wallet_3) }}% </span></li>
                        @else
                    <li> Rewarded Wallet 3: <span class="text-primary"> 0.00 </span></li>
                        @endif

                    <li> Days: <span> {{ $each_subscriptions->package_data->days }} </span></li>
                </ul>
            </td>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->start_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->end_at }}</td>
            @if ( $each_subscriptions->status == 'Active' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_subscriptions->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_subscriptions->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <!-- <td id="update_modal_button_{{ $each_subscriptions->id }}" onclick="update_open_modal('{{ $each_subscriptions->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter"> -->
            <td id="update_modal_button_{{ $each_subscriptions->id }}"
            class="text-start" style="color: #495057;" data-toggle="modal" data-target="#exampleModalCenter">
            
            </td>

            <!-- Modal -->
            <div class="modal fade" id="update_exampleModalCenter_{{ $each_subscriptions->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deposits</h5>
                    <button type="button" class="close" data-dismiss="modal" id="update_top_close_modal_{{ $each_subscriptions->id }}" 
                    onclick="update_top_close_modal('{{ $each_subscriptions->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                                <li> <span> </span></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_subscriptions->id }}" 
                            onclick="update_close_modal('{{ $each_subscriptions->id }}')" data-dismiss="modal">Back</button>
                            <!-- <button type="submit" class="btn btn-sm btn-primary">Update</button> -->
                        </div>
                    </form>
                    <script>
                        function update_open_modal(subscriptions_id){
                            $(`#update_exampleModalCenter_${subscriptions_id}`).modal('show');
                        }

                        function update_close_modal(subscriptions_id){
                            $(`#update_exampleModalCenter_${subscriptions_id}`).modal('hide');
                        }

                        function update_top_close_modal(subscriptions_id){
                            $(`#update_exampleModalCenter_${subscriptions_id}`).modal('hide');
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
        <script src="{{asset('assets/admin/js/table/subscriptions_table_display.js')}}"></script>

    </div>

@endsection
