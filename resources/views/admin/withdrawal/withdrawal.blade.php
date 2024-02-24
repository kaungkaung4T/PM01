@extends('admin.dashboard')

@section('content')

    <div class="page-content">

<div class="mb-2">Withdrawal</div>
  

        <div class="table-responsive">
                <!-- <table  id="dataTableExample" class="table table-dark table-image mb-2"> -->
                <table id="" class="display table table-image mb-2">

            <thead>
                <tr>
                <th scope="col" class="text-start text-dark">ID</th>
                <th scope="col" class="text-start text-dark">Username</th>
                <th scope="col" class="text-start text-dark">Code</th>
                <th scope="col" class="text-start text-dark">Request Amount</th>
                <th scope="col" class="text-start text-dark">Remarks</th>
                <th scope="col" class="text-start text-dark">Created At</th>
                <th scope="col" class="text-start text-dark">Completed At</th>
                <th scope="col" class="text-start text-dark">Rejected At</th>
                <th scope="col" class="text-start text-dark">Status</th>
                <th scope="col" class="text-start text-dark">Action</th>
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
                    <li class="text-primary">{{ $each_withdrawal->system_user_data->username }}</li>
                </ul>
            </td>
                @if ($each_withdrawal->complete_date == NULL || $each_withdrawal->complete_date == "0000-00-00 00:00:00")
            <td class="text-start" style="color: #495057;"> - </td>
                @else
            <td class="text-start" style="color: #495057;"> {{ $each_withdrawal->complete_date }} </td>
                @endif

                @if ($each_withdrawal->reject_date == NULL || $each_withdrawal->reject_date == "0000-00-00 00:00:00")
            <td class="text-start" style="color: #495057;"> - </td>
                @else
            <td class="text-start" style="color: #495057;"> {{ $each_withdrawal->reject_date }} </td>
                @endif

            @if ( $each_withdrawal->status == 'Completed' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_withdrawal->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_withdrawal->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td id="update_modal_button_{{ $each_withdrawal->id }}" onclick="update_open_modal('{{ $each_withdrawal->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            View
            </td>

            <!-- Modal -->
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body table_deposit_view">
                            <ul>
                                <li> Username: <span> {{ $each_withdrawal->customer_name }} </span></li>
                                <li> Code: <span> {{ $each_withdrawal->code }} </span></li>
                                <li> Request Amount: <span> {{ $each_withdrawal->amount }} </span></li>
                                <li> Remarks: <span> {{ $each_withdrawal->remark }} </span></li>
                                <li> Created At: <span> {{ $each_withdrawal->system_user_data->created_at }} </span></li>
                                <li> Created By: <span> {{ $each_withdrawal->system_user_data->username }} </span></li>

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
                            <button type="button" class="btn btn-sm border" id="update_close_modal_{{ $each_withdrawal->id }}" 
                            onclick="update_close_modal('{{ $each_withdrawal->id }}')" data-dismiss="modal">Back</button>
                            <!-- <button type="submit" class="btn btn-sm btn-primary">Update</button> -->
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

        <!-- display table -->
        <script src="{{asset('assets/admin/js/table_display.js')}}"></script>

    </div>

@endsection
