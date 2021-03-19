@extends('layouts.app')


@section('content')



<h1 class="text-3xl text-center mt-10"> {{$publicidad->descripcion}} </h1>

<div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5">

        <p class="block text-gray-700 font-bold my-2">
            Publicado <span class="font-normal"> {{$publicidad->created_at->diffForHumans() }}  </span>
            Seccion: <span class="font-normal"> {{$publicidad->seccion->nombre}} </span>
        </p>
    </div>
</div>






@endsection