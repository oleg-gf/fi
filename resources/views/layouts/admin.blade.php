<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') - Admin's panel @show</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
    
    <link href="{{ asset('css/tailwind.min.css')}}" rel="stylesheet">
    
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

        <!-- AUTH -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>
    
<x-admin.header></x-admin.header>

<div class="container-fluid">
  <div class="row">

    <x-admin.sidebar></x-admin.sidebar>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')




    </main>
  </div>
</div>

  <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>

  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/custom.js')}}"></script>
    
    <script src="{{ asset('js/dashboard.js')}}"></script>
     
  </body>
</html>