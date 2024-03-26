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


  <body>

 <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end --> 
	
	@include('front_end.includes.header')

	@yield('content')

	@include('front_end.includes.footer')
	
	
	  <script src="{{asset('assets/ui/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	  <!-- <script src="{{asset('assets/ui/bootstrap/js/jquery-3.7.1.min.js')}}"></script> duplicate with data table -->
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
   
  </body>