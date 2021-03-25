{{-- <a class="text-white text-sm uppercase font-bold p-3 {{Request::is('vacantes') ? 'bg-green-500': ''}}" href="{{route('vacantes.index')}}">Ver Vacantes</a>

<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('vacantes/create') ? 'bg-green-500': ''}}" href="{{route('vacantes.create')}}">Nueva Vacante</a>
 --}}

<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('publicidad') ? 'bg-green-500': ''}}" href="{{route('publicidads.index')}}">Ver Publicidad</a>

{{-- <a class="text-white text-sm uppercase font-bold p-3 {{Request::is('publicidad/create') ? 'bg-green-500': ''}}" href="{{route('publicidads.create')}}">Alta Publicidad</a>
 --}}
 <a class="text-white text-sm uppercase font-bold p-3 {{Request::is('establecimientos') ? 'bg-green-500': ''}}" href="{{route('establecimientos.index')}}">Establecimiento</a>
{{--
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('familias') ? 'bg-green-500': ''}}" href="{{route('familias.index')}}">Familias</a>
<a class="text-white text-sm uppercase font-bold p-3 {{Request::is('platos') ? 'bg-green-500': ''}}" href="{{route('platos.index')}}">Platos</a>
 --}}


 <a class="text-white text-sm uppercase font-bold p-3 {{Request::is('establecimientos/profile') ? 'bg-green-500': ''}}" href="{{route('establecimientos.profile')}}">Profile</a>
{