<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('message.dir') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- CSS -->
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.css') }}">
</head>

<body>

            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href=" {{ route('home') }} "><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href=" {{ route('home') }} ">{{ __('user_message.Home') }}
                  <span class="sr-only">(current)</span>
                </a>
              </li>
                <li class="nav-item">
                 @if(app()->getLocale()=="ar")
                <a class="nav-link" href="{{ url('change/en') }}"> {{ __('user_message.English') }} </a>
              </li>
              @else
                <li class="nav-item">
                <a class="nav-link" href="{{ url('change/ar') }}">{{ __('user_message.Arabic') }}</a>
              </li>
              @endif
 </li class="nav-link" href="{{ route('user.cart') }}"{{ __('user_message.Carts') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.orders.index') }}">{{ __('user_message.Orders') }}</a>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.cart') }}">{{ __('user_message.Carts') }}</a>
              </li>
                          <li class="nav-item">
                <a class="nav-link" href="{{ route('user.wishlist') }}">{{ __('user_message.Wishlist') }}</a>
              </li>
              
                <!-- Authentication Links -->
@if(auth()->check())
    <!-- لو عامل login -->
    <li class="nav-item">
       <a class="nav-link mb-0">
            {{__('user_message.Welcome')}} {{ auth()->user()->name }}
       </a>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link btn mb-0"
                    style="padding:5px 15px; border:none; background-color:red; color:white; border-radius:4px; font-weight:bold;">
                {{ __('user_message.Logout') }}
            </button>
        </form>
    </li>
@else
    <!-- لو مش عامل login -->
    <li class="nav-item">
        <a class="nav-link mb-0" href="{{ route('login') }}">{{__('user_message.Login')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link mb-0" href="{{ route('register') }}">{{__('user_message.Register')}}</a>
    </li>
@endif

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
