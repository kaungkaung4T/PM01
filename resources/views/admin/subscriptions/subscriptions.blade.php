@extends('admin.dashboard')

@section('content')

    <div class="page-content">

<div class="mb-2">Deposits</div>
  

        <div class="table-responsive">
                <!-- <table  id="dataTableExample" class="table table-dark table-image mb-2"> -->
                <table id="" class="display table table-image mb-2">

            <thead>
                <tr>
                <th scope="col" class="text-start text-dark">ID</th>
                <th scope="col" class="text-start text-dark">Username</th>
                <th scope="col" class="text-start text-dark">Code</th>
                <th scope="col" class="text-start text-dark">Amount</th>
                <th scope="col" class="text-start text-dark">Package Name</th>
                <th scope="col" class="text-start text-dark">Start At</th>
                <th scope="col" class="text-start text-dark">End At</th>
                <th scope="col" class="text-start text-dark">Status</th>
                <th scope="col" class="text-start text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i=1 ?>

                @foreach ($all_subscriptions as $each_subscriptions)
                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_subscriptions->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->customer_data->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->code }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_subscriptions->amount }}</td>
            <td class="text-start" style="color: #495057;">
                <ul style="list-style: none;margin-left: -30px;">
                    <li> Name: <span> {{ $each_subscriptions->package_data->name }} </span></li>
                    <li> Amount: <span class="text-primary"> {{ $each_subscriptions->package_data->amount }} </span></li>
                    <li> Rate: <span> {{ $each_subscriptions->package_data->rate }} ~ {{ $each_subscriptions->package_data->rate }} </span></li>
                    <li> Rewarded Wallet 1: <span class="text-danger"> {{ $each_subscriptions->package_data->reward_wallet_1 }} </span></li>
                    <li> Rewarded Wallet 2: <span class="text-primary"> {{ $each_subscriptions->package_data->reward_wallet_2 }} </span></li>
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
            <td id="update_modal_button_{{ $each_subscriptions->id }}" onclick="update_open_modal('{{ $each_subscriptions->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            
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
        <script src="{{asset('assets/admin/js/table_display.js')}}"></script>

    </div>

@endsection
