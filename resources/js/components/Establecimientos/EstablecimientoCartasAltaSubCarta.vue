<template>
  <div>


    <div class="p-4 mb-3 flex justify-between items-center bg-green-200
     bg-white border border-white shadow rounded-lg cursor-move">

       <div class="flex-auto w-full">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Nombre SubCarta : </label
        >
        <input
          v-model="subCarta.nombre"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="nombre"
          placeholder="nombre"
        />
      </div>

     



      <div class="md:flex-auto md:pr-3 md:ml-2 pl-3">
        <a href="#" class="" @click.prevent="guardar">

          <span class="minus-circle">
             <svg xmlns="http://www.w3.org/2000/svg" 
              class="h-6 w-6" 
              fill="none" 
              viewBox="0 0 24 24" 
              stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
           <!--  <svg
              class="w-6 h-6 p6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"
              />
            </svg> -->
          </span>
        </a>
      </div>
      <div class="md:flex-auto md:pr-3 pl-3">
        <a href="#" class="" @click.prevent="cancelar">
          <span class="minus-circle">

             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>
           <!--  <svg
              class="w-6 h-6 p6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg> -->
          </span>
        </a>
      </div>
    </div>

    <!--  <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <a  href="#"
                @click.prevent="guardar"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-500 hover:bg-green-800 md:py-4 md:text-lg md:px-10">
                  Guardar !!
                </a>
              </div>

              <div class="mt-3 sm:mt-0 sm:ml-3">
                <a href="#" 
                @click.prevent="cancelar"
                class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-red-100 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                  Cancelar
                </a>
              </div>
            </div> -->
  </div>
</template>

<script>
export default {
   name: "EstablecimientoCartasAltaSubCarta",
  props: ["cartaId"],
 
  data() {
    return {
      subCarta: {},
    };
  },
  methods: {
      cancelar() {
                  this.$emit("on-cancelarSC");

          
      },
    guardar() {
      console.log("guardar", this.subCarta);

      if(!this.subCarta.nombre){
         
          this.$swal.fire(
          {
            title: 'Error',
                      text: "Nombre sub Carta Obligatorio",
                      icon: 'warning',
            }
          );
          return ; 
      }

      // Enviar a axios
      const params = {
        nombre: this.subCarta.nombre,
        orden: this.subCarta.orden,
        cartaId: this.cartaId,
      };

      axios
        .put("/subcartas/store/", params)
        .then((respuesta) => {
          console.log(respuesta);

          this.$emit("on-guardarSC", respuesta.data.subCarta);

          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>