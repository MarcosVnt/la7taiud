<template>
  <div class="">



    
    <div class="tab__header m-3">
      <a
        href="#"
        class="tab__link bg-green-500 text-red p-4 block bg-blue-dark hover:bg-blue-darker no-underline border-b-2 border-red flex justify-between"
        @click.prevent="active = !active"
      >
        <strong>{{ title }}</strong>
        <span class="down-Arrow" v-show="!active">&#9660;</span>
        <span class="up-Arrow" v-show="active">&#9650;</span>
      </a>
    </div>
    <div class="tab__content p-2" v-show="active">
      <slot />

       <a href="#" class="" @click.prevent="modalAltaPlato = !modalAltaPlato">
        <strong>Alta Plato</strong>

        <span v-if="modalAltaPlato" class="minus-circle">
          <svg
            class="w-6 h-6"
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

        <span v-else class="plus-circle">
          <svg
            class="w-6 h-6"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
        </span>
      </a>

            <establecimientoCartasAltaPlato 
            v-if="modalAltaPlato"
                :familia_id="familia.id"
                @on-guardarPlato="onGuardarPlato"
                @on-cancelarPlato="onCancelarPlato"
          
            
            
            ></establecimientoCartasAltaPlato>


      <div
        class="flex bg-green-200 border-b-2 p-4 block m-6"
        v-for="(plato, i) in platos"
        v-bind:key="i"
      >
        <div class="flex-auto text-left">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.nombre }} <br />
          <span class="text-xs mb-4 font-thin">{{ plato.observaciones }}.</span>
        </div>
        <div class="flex-auto text-right">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.precio }} {{ plato.moneda }}
        </div>
      </div>

      <!--   <div class="tab__link bg-green-200  p-4 block   border-b-2 border-red flex justify-between"
                 v-for="( plato ,i) in platos"
                 v-bind:key="i"
                 >       
                 {{plato.nombre}} - {{plato.precio}}             
                </div>
 -->
    </div>
  </div>
</template>
<script>

import establecimientoCartasAltaPlato from "./Establecimientos/establecimientoCartasAltaPlato.vue";

export default {
  props: ["title", "id", "familia"],
    components: {
  
    establecimientoCartasAltaPlato,
  },

  data() {
    return {
      active: false,
      platos: {},
      modalAltaPlato: false,
      
    };
  },
  methods: {

    
    
/* plato */ 

  onGuardarPlato(plato){
      console.log('onGuardarPlato', plato);
      this.platos.push(plato);
      this.onCancelarPlato();

    },
    onCancelarPlato(){
      console.log('onCancelarPlato ....');
      this.modalAltaPlato = false;

    },


    modalPlato() {

      this.modalAltaPlato = !this.modalAltaPlato;
    },




     
    familiaPlatos(familia) {
      console.log("familaPlatos", familia);

      axios
        .get(`/cartas/familias/platos/${familia}`)
        .then((respuesta) => {
          console.log(respuesta);

          this.platos = respuesta.data.platos;
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    console.log("CREATED ACCORDION ", this.title, this.id);
    this.familiaPlatos(this.id);
  },
};
</script>