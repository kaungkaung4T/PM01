
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','PM01')</title>

    <!-- scroll motion api -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- web icon -->
    <link class="favicon" rel="icon" sizes="48x48" type="image/x-icon" href="">

  
	 <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/ui/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <!-- Libraries Stylesheet with pubic folder -->
    <link href="{{asset('ui/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/ui/css/bootstrap.min.css')}}" rel="stylesheet">	
    <link href="{{asset('assets/ui/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet with public folder -->
    <link href="{{asset('ui/css/bootstrap.min.css')}}" rel="stylesheet">	
    <link href="{{asset('ui/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


	    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
	<link href="{{asset('assets/ui/lib/animate/animate.min.css" rel="stylesheet')}}">
    <!-- Icon Font Stylesheet with public folder -->
	<link href="{{asset('ui/lib/animate/animate.min.css" rel="stylesheet')}}">
	

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/ui/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/ui/css/style2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/ui/css/style3.css')}}" rel="stylesheet">
    <!-- Template Stylesheet with public folder -->
    <link href="{{asset('ui/css/style.css')}}" rel="stylesheet">
	
	  <script src="{{asset('assets/ui/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	  <script src="{{asset('assets/ui/bootstrap/js/jquery-3.7.1.min.js')}}"></script>
      <!-- JS script with public folder -->
      <script src="{{asset('ui/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	  <script src="{{asset('ui/bootstrap/js/jquery-3.7.1.min.js')}}"></script>
	

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	

    <!-- JavaScript Libraries -->
    <script src="{{asset('assets/ui/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/ui/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/ui/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/ui/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/ui/lib/counterup/counterup.min.js')}}"></script>
    <!-- JavaScript Libraries with public folder -->
    <script src="{{asset('ui/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('ui/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('ui/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('ui/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ui/lib/counterup/counterup.min.js')}}"></script>


    <!-- Template Javascript -->
    <script src="{{asset('assets/ui/js/utils.js')}}"></script>
    <!-- Template Javascript with public folder -->
    <script src="{{asset('ui/js/utils.js')}}"></script>

	{{-- Google Font Link --}}
    <script src="{{asset('assets/ui/js/main.js')}}"></script>
    <!-- Template Javascript with public folder -->
    <script src="{{asset('ui/js/main.js')}}"></script>

	{{-- Google Font Link --}}
	 <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<body class="special-bank">
    <div class="bank-body">

        <div class="bank-top">
            <h4><a href="{{ route('index') }}"><i class="bi bi-arrow-left"></i> Back</h4></a>
        </div>

        <div class="all-bank-group">

            @foreach ($banks as $each_bank)
            <div class="each-bank">
                @if ($each_bank->bank_name === "AGD Bank")
                <img src="{{asset('assets/ui/img/agd-bank.png')}}" alt="">
                @elseif ($each_bank->bank_name === "AYA Bank")
                <img src="{{asset('assets/ui/img/aya-bank.png')}}" alt="">
                @elseif ($each_bank->bank_name === "CB Bank")
                <img src="{{asset('assets/ui/img/cb-bank.png')}}" alt="">
                @elseif ($each_bank->bank_name === "KBZ Bank")
                <img src="{{asset('assets/ui/img/kbz-bank.png')}}" alt="">
                @elseif ($each_bank->bank_name === "KBZ Pay")
                <img src="{{asset('assets/ui/img/kbz-pay.png')}}" alt="">
                @elseif ($each_bank->bank_name === "OK Pay")
                <img src="{{asset('assets/ui/img/ok-pay.jpg')}}" alt="">
                @elseif ($each_bank->bank_name === "Wave Pay")
                <img src="{{asset('assets/ui/img/wave-pay.png')}}" style="object-fit: cover;" alt="">
                @elseif ($each_bank->bank_name === "Yoma Bank")
                <img src="{{asset('assets/ui/img/yoma-bank.png')}}" alt="">

                @endif
                <div class="each-bank-text">
                    <p>{{ $each_bank->account_name }}</p>
                        @if ($each_bank->account_number)
                    <span>{{ $each_bank->account_number }}</span>
                        @else
                    <span>{{ $each_bank->phone_number }}</span>
                        @endif
                </div>
            </div>
            @endforeach
            
            
            <a href="{{ route('bank_add') }}" class="add-bank">
                <p>+</p>
                <p>Add Bank Account</p>
            </a>

        </div>

        <div class="bank-footer">
            <p> Finishing adding your bank? <a href="{{ route('package') }}">Deposit now!</a></p>
        </div>

    </div>
</body>

