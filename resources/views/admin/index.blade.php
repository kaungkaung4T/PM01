@extends('admin.dashboard')

@section('content')

    <div class="page-content">

                
    <div class="mb-3">
        <p class="mb-2">Today's</p>
        <div class="today_body">
            <div class="today_deposit_amount">
                <p class="text-muted">Today's Deposit Amount</p>
                <h3>200.00</h3>
            </div>

            <div class="today_deposit_count">
                <p>Today's Deposit Count</p>
                <h3>4</h3>
            </div>

            <div class="today_withdrawal_amount">
                <p class="text-muted">Today's Withdrawal Amount</p>
                <h3>101.17</h3>
            </div>

            <div class="today_customer">
                <p>Today's New Customer</p>
                <h3>3</h3>
            </div>

        </div>

    </div>



    <div class="mb-3">
        <p class="mb-3 mb-md-0">This Month</p>
        <div class="month_body">

        </div>
    </div>



    <div class="mb-3">
        <p class="mb-3 mb-md-0">System</p>
        <div class="system_body">

        </div>
    </div>
    
    



    </div>

@endsection