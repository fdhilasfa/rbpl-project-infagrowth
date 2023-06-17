<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #EFE2DA;height: 80px">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <a href="{{ route('home') }}">
                    <img class="" src="{{ asset('/images/logo_infacare_header.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @guest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link border rounded border-dark text-body"
                                        style="height:40px; width:100px; text-align:center;"
                                        href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>

                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link border rounded border-dark bg-dark text-white"
                                            style="margin-left: 10px; height:40px; width:100px; text-align:center;"
                                            href="{{ route('login') }}">{{ __('Log in') }}</a>
                                    </li>
                                @endif
                            @endif
                        @else
                        <a id="userDropdown" class="nav-link dropdown-toggle rounded-circle"
                        style="width: 30px; height: 30px; background-color: #FFFFFF" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person"></i> <!-- Menggunakan ikon person dari Bootstrap Icons -->
                    </a>
                    @endguest

                            <li class="nav-item dropdown ">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
