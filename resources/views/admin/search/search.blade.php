
@extends('admin.dashboard')

@section('content')

    <div class="page-content" style="color: #495057;">

    <h4 style="color: #343a40;">Your search: <span style="color: #495057;">{{ $dates }}</span></h4>
    <p>Result: </p> 
    
    {{$f}}
    <br>
    {{$s}}

    <br><br>

    {{ $search_deposit_amount }}

    


    </div>

@endsection




