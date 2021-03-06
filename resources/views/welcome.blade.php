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
<body class=" min-h-screen leading-none ">





    <div id="app" class="mx-1">




<!-- This example requires Tailwind CSS v2.0+ -->

<div class="relative bg-white overflow-hidden">

  <div class="max-w-7xl mx-auto">
    
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>
    <div>

    <div class="relative pt-6 px-4 sm:px-6 lg:px-8 bg-white">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                  <span class="sr-only">Vile</span>
                  <img class="h-8 w-auto sm:h-10" src="{{ asset('img/Vile_m.JPG') }}">
                 {{--  <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"> --}}
                </a>
                <div class="-mr-2 flex items-center md:hidden" >
                  <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400
                   hover:text-gray-500 hover:bg-gray-100 
                   focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false"
                   
                  
                  onclick="openNav()"
                  
                  
                  >
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
              @guest
              <a class="font-medium text-green-700 hover:text-green-900" href="{{ route('login') }}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                  <a class="font-medium text-green-700 hover:text-green-900" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
            @else
                <span class="text-green-700 text-sm pr-4"> {{ Auth::user()->name }}  </span>

                <a id="navbarDropdown" 
                    href="#"
                    class="bg-green-500 rounded-full mr-2 px-3 py-1 font-bold text-sm text-white"
                > {{ Auth::user()->name }} </a>

                <a class="no-underline hover:underline text-green-700 text-sm p-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
            </div>
          </nav>
        </div>

        <!--
          Mobile menu, show/hide based on menu open state.

          Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div id="open" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" style="display:none;">
          <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <img class="h-8 w-auto sm:h-10" src="{{ asset('img/Vile_m.JPG') }}">
              </div>
              <div class="-mr-2">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400
                 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                 
                 onclick="closeNav()"
                 
                 >
                  <span class="sr-only">Close main menu</span>
                  <!-- Heroicon name: outline/x -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="px-2 pt-2 pb-3 space-y-1">
              @guest
                              <a class="block px-3 py-2 rounded-md text-base font-medium text-green-700 hover:text-green-900 hover:bg-gray-50" href="{{ route('login') }}">{{ __('Login') }}</a> 

                                @if (Route::has('register'))
                                    <a class="block px-3 py-2 rounded-md text-base font-medium text-green-700 hover:text-green-900 hover:bg-gray-50" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif

                            @else
                                <span class="text-green-700 text-sm pr-4"> {{ Auth::user()->name }}  </span>
            
                                <a id="navbarDropdown" 
                                    href="#"
                                    class="bg-green-500 rounded-full mr-2 px-3 py-1 font-bold text-sm text-white"
                                > {{ Auth::user()->name }} </a>
            
                                <a class="no-underline hover:underline text-green-700 text-sm p-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
            
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
            </div>
          {{--   <a href="#" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
              Log in
            </a> --}}

          {{--   <a class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
          </div>
        </div>
      </div>

      <main class="mt-10 mx-auto max-w-5xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-green-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Crea tu Carta de Restauración</span>
            <span class="block text-green-700 xl:inline">online para tu negocio</span>
          </h1>
          <p class="mt-3 text-base text-black sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Comienza con el registro o interactúa con una carta de restauración visionando una demo
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a  href="{{ route('register') }}"
              class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-700 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                Comienza Ya !!
              </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="{{ url('/establecimiento/1') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-700 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                Ver Demostración
              </a>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:top-20 lg:w-1/2">
    <img class="h-56 w-full object-contain sm:h-72 md:h-96 lg:w-full lg:h-full" 
    src="{{ asset('img/c2.jpg') }}" alt="">
  </div>


</div>



           
    </div>    
</body>
</html>


@section('scripts')
{{-- 
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" crossorigin="anonymous"></script> 
 --}}



@endsection
<script>
  function openNav() {
    document.getElementById("open").removeAttribute('style');   
  }
  
  function closeNav() {
    document.getElementById("open").style.display = "none";
  
  }
  </script>
