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
            <td class="text-start" style="color: #495057;">{{ $each_deposit->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->code }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->amount }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->system_user_data->username }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->updated_at }}</td>
            <td class="text-start" style="color: #495057;">{{ $each_deposit->created_at }}</td>
            @if ( $each_deposit->status == 'Active' )
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-success" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @else
            <td class="text-start" style="color: #495057;"><i class="bi bi-circle-fill text-danger" 
            style="position: relative;bottom: 3px;font-size: 0.4rem;"></i>&nbsp; {{ $each_deposit->status }}</td>
            @endif

            <!-- Button trigger modal -->
            <td id="update_modal_button_{{ $each_deposit->id }}" onclick="update_open_modal('{{ $each_deposit->id }}')"
            class="text-start" style="color: #495057;cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter">
            Edit
            </td>

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
