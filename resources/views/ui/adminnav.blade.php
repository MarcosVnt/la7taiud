<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('vacantes') ? 'bg-green-500': ''}}" href="{{route('vacantes.index')}}">Ver Vacantes</a>

<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('vacantes/create') ? 'bg-green-500': ''}}" href="{{route('vacantes.create')}}">Nueva Vacante</a>


<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('publicidad') ? 'bg-green-500': ''}}" href="{{route('publicidad.index')}}">Ver Publicidad</a>

<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('publicidad/create') ? 'bg-green-500': ''}}" href="{{route('publicidad.create')}}">Alta Publicidad</a>
