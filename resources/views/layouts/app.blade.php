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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white min-h-screen leading-none">
    <div id="app">
        <nav class="bg-white shadow-md py-6">
            <div class="container mx-auto md:px-0">
                <div class="flex items-center justify-around">
                   <a class="text-2xl text-red-900" href="{{ url('/') }}">
                      {{--   {{ config('app.name', 'Laravel') }} --}}
                        <img class="h-8 w-auto"  src="{{ asset('img/Vile_m.JPG') }}" alt="">

                    </a> 
                    
                   
                    <nav class="flex-1 text-right">
                            @guest
                                <a class="text-green-700 no-underline hover:underline hover:text-green-900 p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a class="text-green-700 no-underline hover:underline hover:text-green-900 p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                    <span class="text-gray-300 text-sm pr-4"> {{ Auth::user()->name }}  </span>

                                    <a id="navbarDropdown" 
                                        href="#"
                                        class="bg-green-500 rounded-full mr-2 px-3 py-1 font-bold text-sm text-white"
                                    > {{ Auth::user()->name }} </a>

                                    <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            @endguest
                        </nav>
                </div>
            </div>
        </nav>
        <div class="bg-gray-700">
            <nav class="container mx-auto flex space-x-1">

                @yield('navegacion')

                    
                
            </nav>
        </div>

        <main class="mt-10 container mx-auto">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
