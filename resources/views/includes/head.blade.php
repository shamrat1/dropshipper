
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   {{-- <meta http-equiv="refresh" content="5" /> --}}
   <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{ config('app.name', 'My Song') }} @yield('title')</title>

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
   <meta name="keywords" content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="pixelstrap">
   <link rel="icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="image/x-icon">
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" type="image/x-icon">
   <title>Pick Bazar</title>

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Font Awesome--> 
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

   <!-- Flag icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">

   <!-- ico-font-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">

   <!-- Prism css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">

   <!-- Chartist css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chartist.css') }}">

   <!-- vector map css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vector-map.css') }}">

   <!-- Themify icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify-icons.css') }}">

   <!-- jsgrid css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">
   
   <!-- Rating css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rating.css') }}">

   <!-- Dropzone css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css') }}">

   <!-- Datatables css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

   <!-- Datepicker css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">

   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
   <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/brands.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/solid.css')}}">
   
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"> --}}

   {{-- hover --}}
   {{-- <link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css"> --}}
   <link rel="stylesheet" href="{{asset('assets/css/bootnavbar.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
   <style>
      #businessMap {
         height: 350px;
         width: 380px;
     }
     .modal-open .main-body {
      -webkit-filter: blur(5px) grayscale(90%);
      }
   </style>