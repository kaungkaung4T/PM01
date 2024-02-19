@extends('admin.dashboard')

@section('content')

    <div class="page-content">

                
    <div class="mb-4">
        <fieldset class="border-top px-6 mb-3">
        <legend class="float-none w-auto px-3 index-title">Today's</legend>
        </fieldset>
        <div class="today_body">
            <div class="today_deposit_amount">
                <p class="text-muted mb-2">Today's Deposit Amount</p>
                <h3>200.00</h3>
            </div>
            <div class="today_deposit_count">
                <p class="mb-2">Today's Deposit Count</p>
                <h3>4</h3>
            </div>
            <div class="today_withdrawal_amount">
                <p class="text-muted mb-2">Today's Withdrawal Amount</p>
                <h3>101.17</h3>
            </div>
            <div class="today_customer">
                <p class="mb-2">Today's New Customer</p>
                <h3>3</h3>
            </div>
        </div>
    </div>



    <div class="mb-4">
        <fieldset class="border-top px-6 mb-3">
        <legend class="float-none w-auto px-3 index-title">This Month</legend>
        </fieldset>
        <div class="month_body">
            <div class="month_deposit_amount">
                <p class="text-muted mb-2">Month's Deposit Amount</p>
                <h3>14,671.40</h3>
            </div>
            <div class="month_deposit_count">
                <p class="mb-2">Month's Deposit Count</p>
                <h3>96</h3>
            </div>
            <div class="month_withdrawal_amount">
                <p class="text-muted mb-2">Month's Withdrawal Amount</p>
                <h3>5,368.50</h3>
            </div>
            <div class="month_customer">
                <p class="mb-2">Month's New Customer</p>
                <h3>90</h3>
            </div>
        </div>
    </div>



    <div class="mb-4">
        <fieldset class="border-top px-6 mb-3">
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