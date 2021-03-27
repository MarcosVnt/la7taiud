<template>
    <div>
     <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" 
        fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100" />
        </svg>
  
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">

          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
                  <span class="sr-only">Vile</span>
                  <img class="h-8 w-auto sm:h-10" src="{{ asset('img/Vile_m.JPG') }}">
                </a>
                <div class="-mr-2 flex items-center ">

                    <button type="button" class="bg-white rounded-md p-2 inline-flex items-center 
                    justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 
                    focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"   aria-expanded="false" >
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                      
                  {{-- <button type="button" class="bg-white rounded-md p-2 inline-flex items-center 
                  justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none 
                  focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Abrir Menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                  </button> --}}
                </div>
              </div>
            </div>
            
            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8 text-right" >
                @guest
                  <a class="font-medium text-green-700 hover:text-green-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                  @if (Route::has('register'))
                      <a class="font-medium text-green-700 hover:text-green-900" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
                @else
<!--                     <span class="text-green-700 text-sm pr-4"> {{ Auth::user()->name }}  </span>
 -->
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
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
          <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
             <div class="px-5 pt-4 flex items-center justify-between">
              <div>
                <img class="h-8 w-auto"  src="{{ asset('img/Vile_m.JPG') }}" alt="">
              </div>
              <div class="-mr-2">
                <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-green-700 hover:text-green-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Cerrar Menu</span>
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
            <a class="block w-full px-5 py-3 text-center font-medium text-green-700 bg-gray-50 hover:bg-red-900"
            href="{{ route('login') }}">{{ __('Login') }}   
            </a>

          </div>
        </div>    
    </div>
</template>


<script>
export default {
    
}
</script>