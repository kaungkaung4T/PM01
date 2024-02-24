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
                <th scope="col" class="text-start text-dark">Deposit Amount USD</th>
                <th scope="col" class="text-start text-dark">Created By</th>
                <th scope="col" class="text-start text-dark">Updated At</th>
                <th scope="col" class="text-start text-dark">Created At</th>
                <th scope="col" class="text-start text-dark">Status</th>
                <th scope="col" class="text-start text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i=1 ?>

                @foreach ($all_deposit as $each_deposit)
                <tr>
            <th scope="row" class="text-start" style="color: #495057;font-weight: normal;">{{ $each_deposit->id }}</th>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->customer_name }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->code }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->amount }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->system_user_data->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->updated_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->created_at }}</td>
            @if ( $each_deposit->status == 'Completed' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td id="update_modal_button_{{ $each_deposit->id }}" onclick="update_open_modal('{{ $each_deposit->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            View
            </td>

            <!-- Modal -->
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
                                <li> Created By: <span> {{ $each_deposit->system_user_data->username }} </span></li>
                                <li> Updated At: <span> {{ $each_deposit->system_user_data->updated_at }} </span></li>
                                <li> Created At: <span> {{ $each_deposit->system_user_data->created_at }} </span></li>
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
        <script src="{{asset('assets/admin/js/table_display.js')}}"></script>

    </div>

@endsection
