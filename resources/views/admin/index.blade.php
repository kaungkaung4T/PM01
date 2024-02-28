@extends('admin.dashboard')

@section('content')

    <div class="page-content">

                
    <div class="today_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">Today's</legend>
        </fieldset>
        <div class="today_body">
            <div class="today_deposit_amount">
                <p class="text-muted mb-2">Today's Deposit Amount</p>
                <h3>{{ $today_deposit_amount_total }}</h3>
            </div>
            <div class="today_deposit_count">
                <p class="mb-2">Today's Deposit Count</p>
                <h3>{{ $today_deposit }}</h3>
            </div>
            <div class="today_withdrawal_amount">
                <p class="text-muted mb-2">Today's Withdrawal Amount</p>
                <h3>101.17</h3>
            </div>
            <div class="today_customer">
                <p class="mb-2">Today's New Customer</p>
                <h3>{{ $today_user }}</h3>
            </div>
        </div>
    </div>



    <div class="month_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">This Month</legend>
        </fieldset>
        <div class="month_body">
            <div class="month_deposit_amount">
                <p class="text-muted mb-2">Month's Deposit Amount</p>
                <h3>{{ $month_deposit_amount_total }}</h3>
            </div>
            <div class="month_deposit_count">
                <p class="mb-2">Month's Deposit Count</p>
                <h3>{{ $month_deposit }}</h3>
            </div>
            <div class="month_withdrawal_amount">
                <p class="text-muted mb-2">Month's Withdrawal Amount</p>
                <h3>5,368.50</h3>
            </div>
            <div class="month_customer">
                <p class="mb-2">Month's New Customer</p>
                <h3>{{ $month_users }}</h3>
            </div>
        </div>
    </div>



    <div class="system_main">
        <fieldset class="border-top mb-3 fieldset-index-title">
        <legend class="float-none w-auto px-3 index-title">System</legend>
        </fieldset>
        <div class="system_body">
            <div class="system1">
                <p class="mb-2">System Profit</p>
                <h3>17,213.27</h3>
            </div>
            <div class="system2">
                <p class="mb-2">Bonus Issued</p>
                <h3>0.00</h3>
            </div>
            <div class="system3">
                <p class="mb-2">Pending Deposit</p>
                <h3>0.00</h3>
            </div>
            <div class="system4">
                <p class="mb-2">Pending Withdrawal</p>
                <h3>171.60</h3>
            </div>
            <div class="system5">
                <p class="text-muted mb-2">Today's Profit</p>
                <h3>98.83</h3>
            </div>
        </div>
    </div>
    
    



    </div>

@endsection