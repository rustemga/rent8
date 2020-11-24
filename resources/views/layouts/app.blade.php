<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/848ba07f3a.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="text-right p-8 bg-red-600 text-gray-100 relative">
    <a href="/"><img class="w-1/12 rounded-lg shadow-xl absolute" src="\img\logo.jpg" alt="logo"></a>
    @guest
        @if(Route::currentRouteName()!='login')
            <a class="uppercase mr-6 hover:text-red-200" href="{{ route('login') }}">Войти</a>
        @endif
        @if (Route::has('register')&&Route::currentRouteName()!='register')
            <a class="uppercase hover:text-red-200" href="{{ route('register') }}">Регистрация</a>
        @endif
    @else

        <h3 class="mr-6 inline-block">Привет, {{ Auth::user()->name }} <span class="caret"></span></h3>
        @if (Route::currentRouteName()!='home')
        <a href="{{ route('home') }}"
           alt="Личный кабинет">
            <i class="fas fa-home mr-6 text-xl"></i>
        </a>
        @endif
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"
        alt="Выйти">
            <i class="fas fa-times-circle mr-6 text-xl"></i>
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    @endguest
</div>

<main id="app" class="flex-center position-ref full-height">
    @yield('content')
</main>
</body>
</html>
