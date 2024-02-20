<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
  <meta name="author" content="NobleUI">
  <meta name="keywords"
    content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <title>@yield('title','PM01')</title>

  <!-- Bootstrap modal dialog external -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- End Bootstrap modal dialog -->

  <!-- Table Search and pagination -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
  
  <!-- <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css" rel="stylesheet">
  <!-- End Table  -->



  <!-- Date input extension -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- End Date -->



  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/core/core.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/demo1/style.css')}}">
  <!-- endinject -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/feather-font/css/iconfont.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/demo2/style.css')}}">
  <!-- End layout styles -->

    <link rel="stylesheet" href="{{asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">

  <link rel="shortcut icon" href="{{asset('assets/ui/img/foodlifesavers LOGO v1.png')}}" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body>
  <div class="main-wrapper">

  @include('admin.includes.sidebar')

    <div class="page-wrapper">

      @include('admin.includes.header')

      @yield('content')

     @include('admin.includes.footer')

    </div>
  </div>

  <script src="{{asset('assets/admin/vendors/core/core.js')}}"></script>

  <script src="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('assets/admin/vendors/apexcharts/apexcharts.min.js')}}"></script>

  <script src="{{asset('assets/admin/vendors/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/template.js')}}"></script>

  <script src="{{asset('assets/admin/js/dashboard-dark.js')}}"></script>

  <script src="https://kit.fontawesome.com/27dabc0c76.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <script src="{{asset('assets/admin/js/code/code.js')}}"></script>
   <script src="{{asset('assets/admin/js/code/validate.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/data-table.js')}}"></script>


  <script src="{{asset('assets/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>

  <script src="{{asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','success') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

</body>

</html>