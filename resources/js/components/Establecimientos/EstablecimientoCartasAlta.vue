<template>
  <div>


    <div class="p-4 mb-3 flex justify-between items-center bg-green-100
     bg-white border border-white shadow rounded-lg cursor-move">

       <div v-if="modalEdit"
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Editar Carta </div>

       <div class="flex-auto w-full">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Nombre Carta : </label
        >
        <input
          v-model="carta.nombre"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="nombre"
          placeholder="nombre"
        />
      </div>

     



      <div class="flex-auto w-1/4 mb:pl-20">
        <a href="#" class="" @click.prevent="guardar">

          <span class="minus-circle">
            <svg
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
            </svg>
          </span>
        </a>
      </div>
      <div class="md:flex-auto md:pr-3">
        <a href="#" class="" @click.prevent="cancelar">
          <span class="minus-circle">
            <svg
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
            </svg>
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
  name: "EstablecimientoCartasAlta",
  props: ["establecimiento_id","cartaEdit","modalEdit"],
  
  data() {
    return {
      carta: {},
      
    };
  },
   created() {
    console.log("CREATED CARTAS ALTA 222", this.cartaEdit,this.modalEdit);
    if(this.cartaEdit.nombre){
      this.carta['nombre']=this.cartaEdit.nombre;
      this.modalEdit = true;
    }
  },
  methods: {
      cancelar() {
                  this.$emit("on-cancelar");

          
      },
    guardar() {
      console.log("guardar", this.carta);

      if(!this.carta.nombre){
         
          this.$swal.fire(
          {
            title: 'Error',
                      text: "Nombre Carta Obligatorio",
                      icon: 'warning',
            }
          );
          return ; 
      }

      // Enviar a axios
      const params = {
        nombre: this.carta.nombre,
        orden: this.carta.orden,
      };

      if(this.modalEdit){
         axios
        .post("/cartas/update/", params)
        .then((respuesta) => {
          console.log(respuesta);

          this.$emit("on-guardar", respuesta.data.carta);

          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });

      }else{

      axios
        .post("/cartas/store/", params)
        .then((respuesta) => {
          console.log(respuesta);

          this.$emit("on-guardar", respuesta.data.carta);

          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
      }
    },
  },
};
</script>