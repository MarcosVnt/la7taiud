@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/basic.css" integrity="sha512-+Vla3mZvC+lQdBu1SKhXLCbzoNCl0hQ8GtCK8+4gOJS/PN9TTn0AO6SxlpX8p+5Zoumf1vXFyMlhpQtVD5+eSw==" crossorigin="anonymous" />


    
@endsection


@section('navegacion')
    
   @include('ui.adminnav') 
@endsection

@section('content')

<h1 class="text-2xl text-center mt-10">Editar Publicidad</h1>
    
<form class="max-w-lg mx-auto my-10" 
        action="{{ route('publicidads.store') }}"
        method="POST"
        class="max-w-lg mx-auto my-10"
        >
        @csrf

    <div class="mb-5">
        <label 
            for="descripcion" 
            class="block text-gray-700 text-sm mb-2"
        >Descripcion:</label>

        <input 
            id="descripcion" 
            type="text" 
            class="p-3 bg-gray-100 rounded form-input w-full  @error('password') is-invalid @enderror" 
            name="descripcion"
            placeholder="Descripción de la publicidad"
            value="{{ $publicidad->descripcion }}"
        >

        @error('descripcion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="establecimiento_tipo" 
            class="block text-gray-700 text-sm mb-2"
        >Tipo de Establecimiento:</label>

        <select
            id="establecimiento_tipo"
            class="block appearance-none w-full 
                    border border-gray-200 text-gray-700 rounded leading-tight 
                    focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                    w-full"
            name="establecimiento_tipo"
        >
            <option disabled selected>- Selecciona -</option>

            @foreach ($establecimiento_tipos as $establecimiento_tipo)
                <option 
                    {{ $publicidad->establecimiento_tipo_id == $establecimiento_tipo->id ? 'selected' : '' }}
                    value="{{ $establecimiento_tipo->id }}"
                >
                    {{$establecimiento_tipo->nombre}}
                </option>
            @endforeach
        </select>

        @error('establecimiento_tipo')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
    </div>

    <div class="mb-5">
        <label 
            for="seccion" 
            class="block text-gray-700 text-sm mb-2"
        >Seccion:</label>

        <select
            id="seccion"
            class="block appearance-none w-full 
                    border border-gray-200 text-gray-700 rounded leading-tight 
                    focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                    w-full"
            name="seccion"
        >
            <option disabled selected>- Selecciona -</option>

            @foreach ($seccions as $seccion)
                <option 
                    {{ $publicidad->seccion_id== $seccion->id ? 'selected' : '' }}
                    value="{{ $seccion->id }}"
                >
                    {{$seccion->nombre}}
                </option>
            @endforeach
        </select>

        @error('seccion')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
    </div>


    <div class="mb-5">
        <label 
            for="tamano" 
            class="block text-gray-700 text-sm mb-2"
        >Tamaño de la imagen:</label>

        <select
            id="tamano"
            class="block appearance-none w-full 
                    border border-gray-200 text-gray-700 rounded leading-tight 
                    focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                    w-full"
            name="tamano"
        >
            <option disabled selected>- Selecciona -</option>

            @foreach ($tamanos as $tamano)
                <option 
                    {{ $publicidad->tamano_id == $tamano->id ? 'selected' : '' }}
                    value="{{ $tamano->id }}"
                >
                    {{$tamano->nombre}}
                </option>
            @endforeach
        </select>

        @error('tamano')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
    </div>

    
    <div class="mb-5">
        <label 
            for="descripcion" 
            class="block text-gray-700 text-sm mb-2"
        >Imagen Vacante:</label>

        <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>

        <input type="hidden" name="imagen" id="imagen" value="{{ $publicidad->imagen }}" >
        @error('imagen')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block"> {{$message}}</span>
            </div>
        @enderror
        <p id="error"></p>
    </div>

{{-- {{$seccions}}
<br>
{{$establecimiento_tipos}}
<br>
{{$tamanos}}
 --}}
    <button 
    type="submit"
    class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
>Guardar Publicidad</button>


</form>
@endsection


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha256-R0a97wz9RimQA9BJEMqcwuOckEMhIQcdtij32P5WpuI=" crossorigin="anonymous"></script> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js" integrity="sha512-KgeSi6qqjyihUcmxFn9Cwf8dehAB8FFZyl+2ijFEPyWu4ZM8ZOQ80c2so59rIdkkgsVsuTnlffjfgkiwDThewQ==" crossorigin="anonymous"></script>

    <script>



Dropzone.autoDiscover = false;


        document.addEventListener('DOMContentLoaded', () => {

            
 


// Medium Editor
const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',  'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            });

            // Agrega al input hidden lo que el usuario escribe en medium editor
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            });


              // Dropzone
              const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/publicidad/imagen",
                dictDefaultMessage: 'Sube aquí tu archivo',
                acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar Archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if(document.querySelector('#imagen').value.trim() ) {
                       let imagenPublicada = {};
                       imagenPublicada.size = 1234;
                       imagenPublicada.name = document.querySelector('#imagen').value;
                       
                       this.options.addedfile.call(this, imagenPublicada);
                     // this.options.thumbnail.call(this, imagenPublicada, `/storage/publicidad/${publiciad.imagen}`);

                       imagenPublicada.previewElement.classList.add('dz-sucess');
                       imagenPublicada.previewElement.classList.add('dz-complete');
                    } 
                },
                success: function(file, response) {
                    // console.log(file);
                    // console.log(response);
                    console.log('dropzone imagen',response.correcto);
                    document.querySelector('#error').textContent = '';

                    // Coloca la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value = response.correcto;

                    // Añadir al objeto de archivo el nombre del servidor
                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded: function(file) {
                    if( this.files[1] != null ) {
                        this.removeFile(this.files[0]); // eliminar el archivo anterior
                        this.addFile(file); // Agregar el nuevo archivo 
                    }
                }, 
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }
                    console.log(file,params);

                    axios.post('/publicidad/borrarimagen', params )
                        .then(respuesta => console.log(respuesta))
                }
            });






        })


    </script>



@endsection

