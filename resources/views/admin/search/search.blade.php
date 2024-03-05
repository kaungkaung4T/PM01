
@extends('admin.dashboard')

@section('content')

    <div class="page-content" style="color: #495057;">

    <h4 style="color: #343a40;">Your search: <span style="color: #495057;">{{ $dates }}</span></h4>
    <p>Result: <span>({{$f}}) - ({{$s}})</span></p> 


    <br><br>



    <div class="today_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">({{$f}}) - ({{$s}})</legend>
        </fieldset>
        <div class="today_body">
            <div class="today_deposit_amount">
                <p class="text-muted mb-2">Search's Deposit Amount</p>
                <h3>{{ number_format($search_deposit_amount_total, 2) }}</h3>
            </div>
            <div class="today_deposit_count">
                <p class="mb-2">Search's Deposit Count</p>
                <h3>{{ $search_deposit }}</h3>
            </div>
            <div class="today_withdrawal_amount">
                <p class="text-muted mb-2">Search's Withdrawal Amount</p>
                <h3>{{ number_format($search_withdrawal_amount_total, 2) }}</h3>
            </div>
            <div class="today_customer">
                <p class="mb-2">Search's New Customer</p>
                <h3>{{ $search_customer }}</h3>
            </div>
        </div>
    </div>

    


    </div>

@endsection




