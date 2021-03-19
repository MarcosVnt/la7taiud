@extends('layouts.app')


@section('navegacion')
    
   @include('ui.adminnav') 
@endsection

@section('content')

<h1 class="text-2xl text-center mt-10">Administrar Publicidad</h1>
{{$publicidads}}
 

@if( count($publicidads) > 0 )
    <div class="flex flex-col mt-10">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
            <thead class="bg-gray-100 ">
                <tr>
                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Título Publicidad
                </th>
                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Tipo de Establecimiento
                </th>
             
                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                  Imagen
              </th>
              <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
               Estado
           </th>
                <th class="px-6 py-3 border-b border-gray-200  text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                    Acciones
                </th>
                </tr>
            </thead>
            <tbody class="bg-white">



                    @foreach ($publicidads as $publicidad)
                    <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">

                           <div class="ml-4">
                              <div class="text-sm leading-5 font-medium text-gray-900"> {{ $publicidad->descripcion }} </div>
                              <div class="text-sm leading-5 text-gray-500">Sección: {{  $publicidad->seccion->nombre }}  </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                     <div class="flex items-center">

                     <div class="ml-4">
                             <div class="text-sm leading-5 font-medium text-gray-900"> {{ $publicidad->establecimientoTipo->nombre }} </div>
                     </div>
                 </td>
                
              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
               <div class="flex items-center">

               <div class="ml-4">
{{--                        <img class="h-8 w-auto"  src="{{ asset('img/Vile_m.JPG') }}" alt=""> --}}
                       <img src="/storage/publicidad/{{ $publicidad->imagen }}" class="w-40 mt-10">

               </div>
           </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                      {{--  <span class="px-2 inline-flex text-xs leading-s font-semibold rounded-full
                       {{ $publicidad->activa ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}}
                       ">
                       {{ $publicidad->activa ? 'Activa' : 'Inactiva'}}

                       </span> --}}
                         <estado-publicidad
                            estado="{{$publicidad->activa}}"
                            publicidad-id="{{$publicidad->id}}"
                        ></estado-publicidad>  
                    </td>  
                   {{--  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                         <a
                            href="{{ route('candidatos.index', ['id' => $vacante->id])}} "
                            class="text-gray-500 hover:text-gray-600"
                        > {{ $vacante->candidatos->count() }}   Candidatos</a> 
                    </td> --}}
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                           <a
                                href="{{route('publicidads.edit', ['publicidad' => $publicidad->id ]) }}"
                                class="text-teal-600 hover:text-teal-900 mr-5"
                            >Editar</a> 

                           <eliminar-publicidad
                                publicidad-id="{{$publicidad->id}} "
                            ></eliminar-publicidad>  

                            <a href=" {{route('publicidads.show', ['publicidad' => $publicidad->id])}} " class="text-blue-600 hover:text-blue-900">Ver</a>
                    </td> 
                    </tr>
                    @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>

    {{$publicidads->links() }}


@else
    <p class="text-center mt-10 text-gray-700">No tienes publicidad aún</p>

@endif









@endsection