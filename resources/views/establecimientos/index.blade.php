@extends('layouts.app')


@section('navegacion')
    
   @include('ui.adminnav') 
@endsection



@section('content')


<h1 class="text-2xl text-center mt-10">Establecimiento</h1>



<navegacion></navegacion>










{{-- 
<establecimiento-datos></establecimiento-datos>

<publicidad-cab></publicidad-cab>

<establecimiento-filtros></establecimiento-filtros>
<establecimiento-cartas></establecimiento-cartas>
<establecimiento-subcartas></establecimiento-subcartas>
<establecimiento-platos></establecimiento-platos> 


--}}







    @endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" crossorigin="anonymous"></script> 

<script>


    </script>
@endsection

  