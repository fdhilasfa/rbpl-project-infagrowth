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
    <link href="https://fonts.bunny.net/css?family=Telex" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="header-container">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #EFE2DA">
                <div class="container">
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                    <img class="" src="{{ asset('/images/logo_infacare_header.png ') }}">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav justify-content-end me-0 my-3 my-lg-0">
                            <li class="nav-item"><a class="nav-link me-lg-3 text-black"
                                    href="/infasolution">Infasolution</a></li>
                            <li class="nav-item"><a class="nav-link me-lg-3 text-black"
                                    href="/infagrowth">Infagrowth</a>
                            </li>
                            <li class="nav-item"><a class="nav-link me-lg-3 text-black" href="/infanurse">Infanurse</a>
                            </li>
                            <li class="nav-item"><a class="nav-link me-lg-3 text-black" href="/infarent">Infarent</a>
                            </li>
                        </ul>

                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>
                        <!--<form class="form-inline my-2 my-lg-0 " style="width: 449px">
                        <input class="form-control mr-sm-2" type="search" placeholder="What lesson do you want to find? " >
                        {{-- <i class="bi bi-search "></i> --}}
                      </form>--!>

                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" style="color: #000000" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profile Picture " class="profile-picture">


                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <!-- Existing dropdown menu items -->

                                        <a class="dropdown-item" href="{{ route('userprofile') }}">Profile</a>
                                        <!-- Modified dropdown menu item -->

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>



                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>



</html>

<style>
    .profile-picture {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 5px;
    }
</style>
