<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Eastwood Medical Centre</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
  /* Navbar Contents */
  .navbar {
    background-color: #262626;
  }

  .vertDivider {
    color:  #b8860b !important;
  }

  .logo {
    color: #7851a9 !important;
    text-shadow: 1px 1px 10px black;
  }

  .loginReg {
    color: #b8860b !important;
    text-shadow: 1px 1px 10px black;
  }

  .navlink {
    color: #b8860b !important;
    text-shadow: 1px 1px 3px black;
  }

  /* Dropdown */
  .name {
    color: #b8860b !important;
    text-shadow: 1px 1px 3px black;
  }

  .dropdown-toggler {
    color: #dddd;
  }

  .dropdown-menu {
    background-color: #4e4e4e;
    color: #dddd;
  }

  .dropdown-item {
    color: #dddd;
  }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">

                {{-- Logo --}}
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    Eastwood Medical Centre
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <h1 class="vertDivider">|</h1>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      {{-- ADMIN ACCOUNT --}}
                      @if(Auth::user() && Auth::user()->hasRole('admin'))
                        {{-- Doctors --}}
                        <a class="navbar-brand navlink" href="{{ route('admin.doctors.index') }}">
                            Doctors
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        {{-- Patients --}}
                        <a class="navbar-brand navlink" href="{{ route('admin.patients.index') }}">
                            Patients
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        {{-- Visits --}}
                        <a class="navbar-brand navlink" href="{{ route('admin.visits.index') }}">
                            Visits
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                      {{-- DOCTOR ACCOUNT --}}
                      @elseif (Auth::user() && Auth::user()->hasRole('doctor'))
                        {{-- Patients --}}
                        <a class="navbar-brand navlink" href="{{ route('doctor.patients.index') }}">
                            Patients
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        {{-- Visits --}}
                        <a class="navbar-brand navlink" href="{{ route('doctor.visits.index') }}">
                            Visits
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        {{-- PATIENT ACCOUNT --}}
                      @elseif (Auth::user() && Auth::user()->hasRole('patient'))
                          {{-- Visits --}}
                          <a class="navbar-brand navlink" href="{{ route('patient.visits.index') }}">
                              Visits
                          </a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                              <span class="navbar-toggler-icon"></span>
                          </button>
                      @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link loginReg" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link loginReg" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle name" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                {{-- Dropdown Contents --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                  {{-- Dashboard --}}
                                  <a class="dropdown-item" href="{{ route('home') }}">
                                      {{ __('Profile') }}
                                  </a>

                                  {{-- Github --}}
                                  <a class="dropdown-item" href="https://github.com/N00172468">
                                      Github
                                  </a>

                                  {{-- LinkedIn --}}
                                  <a class="dropdown-item" href="https://www.linkedin.com/in/john-carlo-ramos-1a587b195/">
                                      LinkedIn
                                  </a>

                                  {{-- Instagram --}}
                                  <a class="dropdown-item" href="https://www.instagram.com/jc_ramos_photography/">
                                      Instagram
                                  </a>

                                  {{-- About Us --}}
                                  <a class="dropdown-item" href="{{ route('about') }}">
                                      About Us
                                  </a>

                                    {{-- Logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
