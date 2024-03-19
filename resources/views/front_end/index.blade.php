
@extends('front_end.dashboard')

@section('content')


<div class="index-body">



    <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 1150px;">
                <h1 class="fw-bold text-primary text-uppercase">Stable Investment Plan</h1>
                <h4 class="mb-0"> Stable Investment plans are structured financial strategies aimed at providing consistent and reliable returns over a specified period, minimizing risks and volatility. </h4>
            </div>
            <div class="row g-0">



            @foreach ($packages as $each_package)

                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s" style="width: 450px;">
                    <div class="bg-light rounded">
                        <div class="border-bottom py-4 px-5 mb-4">
                            <h4 class="text-primary mb-1">{{ $each_package->name }}</h4>
                        </div>
                        <div class="p-5 pt-1">
                            <h1 class="display-5 mb-5">
                                {{ number_format($each_package->amount, 2) }}
                                <span style="font-size: 1.4rem;">MMK</span>
                            </h1>
                            
                                
                            <div class="d-flex justify-content-between mb-4"><span> Reward Percent: </span> <h5 style="font-weight: 600">{{ number_format($each_package->reward_percent, 0) }}% </label></div>
                            <div class="d-flex justify-content-between mb-4"><span> Reward Amount:  </span> <h5 style="font-weight: 600">{{ number_format($each_package->reward_amount, 2) }} MMK </label></div>
                            <div class="d-flex justify-content-between mb-3"><span>Available Days:  </span> <h5 style="font-weight: 600">{{ $each_package->days }} </label></div>

                            <a href="" class="btn btn-primary py-2 px-4 mt-4 justify-content-center">Subscribe</a>
                        </div>
                    </div>
                </div>

                        @endforeach
                
            </div>
        </div>



</div>


@endsection

