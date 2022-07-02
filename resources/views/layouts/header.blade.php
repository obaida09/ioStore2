<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  {{-- <meta name="robots" content="all,follow"> --}}

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon-->
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  {{-- Frontend link --}}

  <!-- gLightbox gallery-->
  <link rel="stylesheet" href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css')}}">
  <!-- Range slider-->
  <link rel="stylesheet" href="{{ asset('frontend/vendor/nouislider/nouislider.min.css')}}">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="{{ asset('frontend/vendor/choices.js/public/assets/styles/choices.min.css')}}">
  <!-- Swiper slider-->
  <link rel="stylesheet" href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css')}}">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.default.css')}}" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">

  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/slick/slick/slick.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/slick/slick/slick-theme.css')}}"/> --}}

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

  <!-- livewire Styles -->
  @livewireStyles


  <style>
    .swiper {
      /* width: 600px; */
      /* height: 300px; */
    }

    .swiper-slide {
      background-color: rgb(255, 255, 255);
    }
    .fl-l{
      float: left;
    }

    .swiper .swiper-button-prev,
    .swiper .swiper-button-next{
      display: none;
      color: #dcb14a;
    }
    .swiper:hover .swiper-button-prev,
    .swiper:hover .swiper-button-next{
      display: inline-flex;
      width: 5%;
      height: 97%;
      margin-top: -227px;
      background-color: rgba(0, 0, 0, 0.05);
      transition: .3s;
    }


  </style>

</head>
<body>
  <div id="app" class='page-holder'>

    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="fw-bold text-uppercase text-dark">Boutique</span></a>
          <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link active" href="{{ route('frontend.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="{{ route('frontend.shop') }}">Shop</a>
              </li>
              <li class="nav-item">
                {{-- <!-- Link--><a class="nav-link" href="{{ route('frontend.product/1' ) }}">Product detail</a> --}}
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item border-0 transition-link" href="{{ route('frontend.index') }}">Homepage</a>
                  <a class="dropdown-item border-0 transition-link" href="{{ route('frontend.shop') }}">Category</a>
                  {{-- <a class="dropdown-item border-0 transition-link" href="{{ route('frontend.detail') }}">Product detail</a> --}}
                  <a class="dropdown-item border-0 transition-link" href="{{ route('frontend.cart') }}">Shopping cart</a>
                  <a class="dropdown-item border-0 transition-link" href="{{ route('frontend.checkout') }}">Checkout</a>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <livewire:frontend.carts />
              @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
              @endguest
              @auth
                <li class="nav-item nav-link">{{ auth()->user()->username  }}</li>
                <li class="nav-item nav-link">
                  <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    <button type="submit">logout</button>
                  </form>
                </li>
              @endauth
            </ul>
          </div>
        </nav>
      </div>
    </header>
