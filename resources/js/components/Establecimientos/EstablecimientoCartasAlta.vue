<template>











<div>
   <div class="md:flex mb-4 bg-green-50 m-4">
      <div class="md:flex-1 md:pr-3">
        <label class="block uppercase tracking-wide text-xs font-bold"
          >Nombre </label
        >
        <input
         
        
          v-model="carta.nombre"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="nombre"
          placeholder="Da un nombre a la carta. "
        />
      </div>

      <div class="mb-4 max-width-1">
        <label class="block uppercase tracking-wide text-xs font-bold"
          >Orden Nº </label
        >
        <input
        
          v-model="carta.orden"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="orden"
          placeholder="que posición? "
        />
      </div>

        </div>
        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <a  href="#"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-700 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                  Comienza Ya !!
                </a>
              </div>
              <div class="mt-3 sm:mt-0 sm:ml-3">
                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-700 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                  Ver Demostración
                </a>
              </div>
            </div>

</div>


</template>

<script>
export default {
    data() {
        return {
            carta: {},

        }
    },
    
}
</script>