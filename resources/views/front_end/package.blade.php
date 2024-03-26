
@extends('front_end.dashboard')

@section('content')


<div class="package-body">

    <div class="package-main">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 1150px;">
                <h3 class="fw-bold text-primary text-uppercase">Stable Investment Plan</h1>
                <h5 class="mb-0" style="color: 343a40;"> Stable Investment plans are structured financial strategies aimed at providing consistent and reliable returns over a specified period, minimizing risks and volatility. </h4>
            </div>
            <div class="row g-0">

            @foreach ($packages as $each_package)

                <div class="col-lg-4 slideInUp" data-wow-delay="0.6s" style="width: 390px;margin-bottom: 20px;">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">{{ $each_package->name }}</h4>
                        </div>
                        <div class="p-5 pt-1">
                            <h2 class="mb-4">
                                {{ number_format($each_package->amount, 2) }}
                                <span style="font-size: 1.4rem;">MMK</span>
                            </h2>
                            
                                
                            <div class="d-flex justify-content-between mb-3"><span> Reward Percent: </span> <label style="font-weight: 600">{{ number_format($each_package->reward_percent, 0) }}% </label></div>
                            <div class="d-flex justify-content-between mb-3"><span> Reward Amount:  </span> <label style="font-weight: 600">{{ number_format($each_package->reward_amount, 2) }} MMK </label></div>
                            <div class="d-flex justify-content-between mb-2"><span>Available Days:  </span> <label style="font-weight: 600">{{ $each_package->days }} </label></div>

                            <a href="" data-toggle="modal" data-target="#subscribe_exampleModalCenter_{{ $each_package->id }}" 
                            id="subscribe_modal_button_{{ $each_package->id }}" onclick="subscribe_open_modal('{{ $each_package->id }}')" class="btn btn-primary py-2 px-4 mt-4">
                                Subscribe
                            </a>
                        </div>
                    </div>
                </div>
                
            <!-- Modal -->
            <div class="modal fade" id="subscribe_exampleModalCenter_{{ $each_package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <div class="subscribe-top-group">
                            @if ($customer)
                        <h5 class="modal-title" id="exampleModalLongTitle">Wallet Amount ({{ $customer->username }})</h5>
                            @else
                        <h5 class="modal-title" id="exampleModalLongTitle">Wallet Amount</h5>
                            @endif
                        <div class="subscribe-top-group-amount"> 
                            <i class="logo bi bi-cash"></i>

                            @if ($customer)
                                @if ($customer->deposit_amount)
                            <p>{{ number_format($customer->deposit_data->wallet + $customer->deposit_data->wallet2 + $customer->deposit_data->wallet3, 2) }}</p>
                                @else
                            <p>{{ number_format(0, 2) }}</p>
                                @endif
                            @else
                                <p>{{ number_format(0, 2) }}</p>
                            @endif

                                <div class="logo2-hover">
                                    <i class="logo2 bi bi-info-circle text-primary"></i>
                                    <span class="info-amount">Total wallet amounts!</span>
                                </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" id="subscribe_top_close_modal_{{ $each_package->id }}" 
                    onclick="subscribe_top_close_modal('{{ $each_package->id }}')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                        <div class="subscribe-chose-feature">
                            <div class="subscribe-chose-feature-each" id="package-feature_{{ $each_package->id }}"
                            onclick="package_page('{{ $each_package->id }}')">
                                <div class="logo"><i class="bi bi-stack"></i></div>
                                <p class="">Package</p>
                            </div>

                            <div class="subscribe-chose-feature-each" id="deposit-feature_{{ $each_package->id }}"
                            onclick="deposit_page('{{ $each_package->id }}')">
                                <div class="logo"><i class="bi bi-download"></i></div>
                                <p class="">Deposit</p>
                            </div>

                            <div class="subscribe-chose-feature-each" id="withdrawal-feature_{{ $each_package->id }}"
                            onclick="withdrawal_page('{{ $each_package->id }}')">
                                <div class="logo"><i class="bi bi-upload"></i></div>
                                <p class="">Withdrawal</p>
                            </div>
                        </div>


                        <!-- Package page -->
                        <div class="package-modal-page" id="package-modal-page-{{ $each_package->id }}">
                            <form action="{{ route('customer_package') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <h5>Package</h5>

                            <div class="modal-body subscribe_package_modal_form">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Package</label>
                                    <input name="package_name" type="text" class="form-control" value="{{ $each_package->id }}" hidden readonly required>
                                    <input name="package_info_no_need" type="text" class="form-control" value="{{ $each_package->name }} ({{ number_format($each_package->amount, 2) }}MMK)" readonly required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Select Wallet</label>
                                    <select name="wallet" class="form-select" required>
                                        <option disabled selected value> Select Wallet </option>
                                        <option  value="wallet_1"> Wallet 1 </option>
                                        <option  value="wallet_2"> Wallet 2 </option>
                                        <option  value="wallet_3"> Wallet 3 </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Bank</label>
                                    <select name="bank_type" class="form-select" required>
                                        <option disabled selected value> Select Bank </option>

                                            @if(Auth::guard('customer')->check())
                                        @foreach ($customer_banks as $each_customer_bank)
                                    <option  value="{{ $each_customer_bank->bank_name }}">{{ $each_customer_bank->bank_name }}</option>
                                        @endforeach
                                            @else
                                        <option  value="kpay">KBZ Pay</option>
                                        <option  value="wave_pay"> Wave Pay </option>
                                        <option  value="ok_pay"> OK Pay </option>
                                        <option  value="kbz_bank"> KBZ Bank </option>
                                        <option  value="uab_bank"> UAB Bank </option>
                                        <option  value="yoma_bank"> Yoma Bank </option>
                                        <option  value="aya_bank"> AYA Bank </option>
                                        <option  value="cb_bank"> CB Bank </option>
                                        <option  value="agd_bank"> AGD Bank </option>
                                            @endif

                                    </select>
                                    <div class="form-text">Add new Bank? <a href="{{ route('bank') }}" class="text-primary">New</a></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                                    <div class="form-text">Available: -- MMK</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-5 w-100">Submit</button>
                            </div>
                            </form>
                        </div>

                        <!-- deposit page -->
                        <div class="deposit-modal-page" id="deposit-modal-page-{{ $each_package->id }}">
                            <form action="{{ route('customer_deposit') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <h5>Deposit</h5>

                            <div class="modal-body subscribe_package_modal_form">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Select Wallet</label>
                                    <select name="wallet" class="form-select" required>
                                        <option disabled selected value> Select Wallet </option>
                                        <option  value="wallet_1"> Wallet 1 </option>
                                        <option  value="wallet_2"> Wallet 2 </option>
                                        <option  value="wallet_3"> Wallet 3 </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Bank</label>
                                    <select name="bank_type" class="form-select" required>
                                        <option disabled selected value> Select Bank </option>
                                        <option  value="kpay">KPAY</option>
                                        <option  value="wave_pay"> WavePay </option>
                                        <option  value="kbz_bank"> KBZ Bank </option>
                                        <option  value="uab_bank"> UAB Bank </option>
                                        <option  value="yoma_bank"> YOMA Bank </option>
                                        <option  value="aya_bank"> AYA Bank </option>
                                        <option  value="cb_bank"> CB Bank </option>
                                        <option  value="agd_bank"> AGD Bank </option>
                                    </select>
                                    <div class="form-text">Add new Bank? <a href="{{ route('bank') }}" class="text-primary">New</a></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                                    <div class="form-text">Available: -- MMK</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-5 w-100">Submit</button>
                            </div>
                            </form>
                        </div>

                        <!-- Withdrawal page -->
                        <div class="withdrawal-modal-page" id="withdrawal-modal-page-{{ $each_package->id }}">
                            <form action="{{ route('customer_withdrawal') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <h5>Withdrawal</h5>

                            <div class="modal-body subscribe_package_modal_form">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Select Wallet</label>
                                    <select name="wallet" class="form-select" required>
                                        <option disabled selected value> Select Wallet </option>
                                        <option  value="wallet_1"> Wallet 1 </option>
                                        <option  value="wallet_2"> Wallet 2 </option>
                                        <option  value="wallet_3"> Wallet 3 </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Bank</label>
                                    <select name="bank_type" class="form-select" required>
                                        <option disabled selected value> Select Bank </option>
                                        <option  value="kpay">KPAY</option>
                                        <option  value="wave_pay"> WavePay </option>
                                        <option  value="kbz_bank"> KBZ Bank </option>
                                        <option  value="uab_bank"> UAB Bank </option>
                                        <option  value="yoma_bank"> YOMA Bank </option>
                                        <option  value="aya_bank"> AYA Bank </option>
                                        <option  value="cb_bank"> CB Bank </option>
                                        <option  value="agd_bank"> AGD Bank </option>
                                    </select>
                                    <div class="form-text">Add new Bank? <a href="{{ route('bank') }}" class="text-primary">New</a></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true">
                                    <div class="form-text">Available: -- MMK</div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-5 w-100">Submit</button>
                            </div>
                            </form>
                        </div>

                        <script>
                            function withdrawal_page (feature_id) {
                                let package_modal_page = document.querySelector(`#package-modal-page-${ feature_id }`);
                                let deposit_modal_page = document.querySelector(`#deposit-modal-page-${ feature_id }`);
                                let withdrawal_modal_page = document.querySelector(`#withdrawal-modal-page-${ feature_id }`);

                                package_modal_page.style.display = "none";
                                deposit_modal_page.style.display = "none";
                                withdrawal_modal_page.style.display = "block";
                            }

                            function deposit_page (feature_id) {
                                let package_modal_page = document.querySelector(`#package-modal-page-${ feature_id }`);
                                let deposit_modal_page = document.querySelector(`#deposit-modal-page-${ feature_id }`);
                                let withdrawal_modal_page = document.querySelector(`#withdrawal-modal-page-${ feature_id }`);

                                package_modal_page.style.display = "none";
                                deposit_modal_page.style.display = "block";
                                withdrawal_modal_page.style.display = "none";
                            }

                            function package_page (feature_id) {
                                let package_modal_page = document.querySelector(`#package-modal-page-${ feature_id }`);
                                let deposit_modal_page = document.querySelector(`#deposit-modal-page-${ feature_id }`);
                                let withdrawal_modal_page = document.querySelector(`#withdrawal-modal-page-${ feature_id }`);

                                package_modal_page.style.display = "block";
                                deposit_modal_page.style.display = "none";
                                withdrawal_modal_page.style.display = "none";
                            }
                        </script>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm border" id="subscribe_close_modal_{{ $each_package->id }}" 
                            onclick="subscribe_close_modal('{{ $each_package->id }}')" data-dismiss="modal">Back</button>
                        </div>
   
                    <script>
                        function subscribe_open_modal(package_id){
                            $(`#subscribe_exampleModalCenter_${package_id}`).modal('show');
                        }

                        function subscribe_close_modal(package_id){
                            $(`#subscribe_exampleModalCenter_${package_id}`).modal('hide');
                        }

                        function subscribe_top_close_modal(package_id){
                            $(`#subscribe_exampleModalCenter_${package_id}`).modal('hide');
                        }
                    </script>
                </div>
            </div>
            </div>
            

                        @endforeach
                
            </div>
        </div>
    </div>




</div>


@endsection

