
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

        <div class="bank-top-add">
            <h4><a href="{{ route('bank') }}"><i class="bi bi-arrow-left"></i> Add Back Account</h4></a>
        </div>

        <div class="bank-add-info">
            <p>Bank</p>
        </div>

        <form action="{{ route('bank_add_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="all-bank-group-add">
            <input type="checkbox" name="bank_name" value="AGD Bank" id="agd_bank" style="display: none;" />
            <label class="each-bank" id="bank1">
                <img src="{{asset('assets/ui/img/agd-bank.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="AYA Bank" id="aya_bank" style="display: none;" />
            <label class="each-bank" id="bank2">
                <img src="{{asset('assets/ui/img/aya-bank.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="CB Bank" id="cb_bank" style="display: none;" />
            <label class="each-bank" id="bank3">
                <img src="{{asset('assets/ui/img/cb-bank.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="KBZ Bank" id="kbz_bank" style="display: none;" />
            <label class="each-bank" id="bank4">
                <img src="{{asset('assets/ui/img/kbz-bank.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="KBZ Pay" id="kbz_pay" style="display: none;" />
            <label class="each-bank" id="bank5">
                <img src="{{asset('assets/ui/img/kbz-pay.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="OK Pay" id="ok_pay" style="display: none;" />
            <label class="each-bank" id="bank6">
                <img src="{{asset('assets/ui/img/ok-pay.jpg')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="Wave Pay" id="wave_pay" style="display: none;" />
            <label class="each-bank" id="bank7">
                <img src="{{asset('assets/ui/img/wave-pay.png')}}" alt="">
            </label>
            <input type="checkbox" name="bank_name" value="Yoma Bank" id="yoma_bank" style="display: none;" />
            <label class="each-bank" id="bank8" >
                <img src="{{asset('assets/ui/img/yoma-bank.png')}}" alt="">
            </label>
        </div>

        <div class="bank-footer">
                <div class="mb-3" style="width: 210px;">
                    <label class="form-label">Account Name</label>
                    <input type="text" name="account_name" class="form-control" required>
                </div>
                <div class="mb-3 " style="width: 210px;" id="bank-footer-accnumber">
                    <label class="form-label">Account Number</label>
                    <input id="bank-footer-accnumber-input" type="number" name="account_number" class="form-control" placeholder="xxxx xxxx xxxx xxxx" onkeydown="javascript: return event.keyCode == 69 ? false : true" required>
                </div>
                <div class="mb-3 bank-footer-phone" id="bank-footer-phone" style="width: 210px;">
                    <label class="form-label">Phone Number</label>
                    <input id="bank-footer-phone-input" type="number" name="phone_number" class="form-control" placeholder="09xxxxxxxxx" onkeydown="javascript: return event.keyCode == 69 ? false : true" disabled required>
                </div>

                <div class="bank-footer-add">
                    <button type="submit" class="btn btn-warning" id="add_submit">Add Bank Account</button>
                    <a href="{{ route('bank') }}" class="btn text-white border">Cancel</a>
                </div>
        </div>
        <script>
                let bank1 = document.querySelector("#bank1");
                let agd_bank = document.querySelector("#agd_bank");

                let bank2 = document.querySelector("#bank2");
                let aya_bank = document.querySelector("#aya_bank");

                let bank3 = document.querySelector("#bank3");
                let cb_bank = document.querySelector("#cb_bank");

                let bank4 = document.querySelector("#bank4");
                let kbz_bank = document.querySelector("#kbz_bank");

                let bank5 = document.querySelector("#bank5");
                let kbz_pay = document.querySelector("#kbz_pay");

                let bank6 = document.querySelector("#bank6");
                let ok_pay = document.querySelector("#ok_pay");

                let bank7 = document.querySelector("#bank7");
                let wave_pay = document.querySelector("#wave_pay");

                let bank8 = document.querySelector("#bank8");
                let yoma_bank = document.querySelector("#yoma_bank");
                
                bank1.addEventListener("click", function () {
                    bank1.style.border = "1px solid #ffffff";
                    agd_bank.checked = true;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "block";
                    bank_number_input.disabled = false;

                    bank_phone.style.display = "none";
                    bank_phone_input.disabled = true;
                })
                
                bank2.addEventListener("click", function () {
                    bank2.style.border = "1px solid #ffffff";
                    aya_bank.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "block";
                    bank_number_input.disabled = false;

                    bank_phone.style.display = "none";
                    bank_phone_input.disabled = true;
                })

                bank3.addEventListener("click", function () {
                    bank3.style.border = "1px solid #ffffff";
                    cb_bank.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "block";
                    bank_number_input.disabled = false;

                    bank_phone.style.display = "none";
                    bank_phone_input.disabled = true;
                })

                bank4.addEventListener("click", function () {
                    bank4.style.border = "1px solid #ffffff";
                    kbz_bank.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "block";
                    bank_number_input.disabled = false;

                    bank_phone.style.display = "none";
                    bank_phone_input.disabled = true;
                })

                bank5.addEventListener("click", function () {
                    bank5.style.border = "1px solid #ffffff";
                    kbz_pay.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "none";
                    bank_number_input.disabled = true;

                    bank_phone.style.display = "block";
                    bank_phone_input.disabled = false;
                })

                bank6.addEventListener("click", function () {
                    bank6.style.border = "1px solid #ffffff";
                    ok_pay.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "none";
                    bank_number_input.disabled = true;

                    bank_phone.style.display = "block";
                    bank_phone_input.disabled = false;
                })

                bank7.addEventListener("click", function () {
                    bank7.style.border = "1px solid #ffffff";
                    wave_pay.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank8.style.border = "1px solid #000";
                    yoma_bank.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "none";
                    bank_number_input.disabled = true;

                    bank_phone.style.display = "block";
                    bank_phone_input.disabled = false;
                })

                bank8.addEventListener("click", function () {
                    bank8.style.border = "1px solid #ffffff";
                    yoma_bank.checked = true;

                    bank1.style.border = "1px solid #000";
                    agd_bank.checked = false;

                    bank2.style.border = "1px solid #000";
                    aya_bank.checked = false;

                    bank3.style.border = "1px solid #000";
                    cb_bank.checked = false;

                    bank4.style.border = "1px solid #000";
                    kbz_bank.checked = false;

                    bank5.style.border = "1px solid #000";
                    kbz_pay.checked = false;

                    bank6.style.border = "1px solid #000";
                    ok_pay.checked = false;

                    bank7.style.border = "1px solid #000";
                    wave_pay.checked = false;

                    let bank_number = document.querySelector("#bank-footer-accnumber");
                    let bank_number_input = document.querySelector("#bank-footer-accnumber-input");
                    let bank_phone = document.querySelector("#bank-footer-phone");
                    let bank_phone_input = document.querySelector("#bank-footer-phone-input");

                    bank_number.style.display = "block";
                    bank_number_input.disabled = false;

                    bank_phone.style.display = "none";
                    bank_phone_input.disabled = true;
                })
            </script>
        </form>

    </div>
</body>

<footer style="height: 200px;">

</footer>