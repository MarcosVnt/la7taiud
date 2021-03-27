<template>
  <div class="flex flex-wrap">
    <!--  <modal v-if="modalAlta" ></modal> -->

    <div class="w-full">
      <!--    <span class="plus-circle" >
                
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Alta Carta
              </span> -->

      <a href="#" class="" @click.prevent="modalCarta">
        <strong>Alta Carta</strong>

        <span v-if="modalAlta" class="minus-circle">
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

      <establecimientoCartasAlta v-if="modalAlta"></establecimientoCartasAlta>

      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li
          class="-mb-px mr-2 last:mr-0 flex-auto text-center pb-4"
          v-for="(carta, i) in this.cartas"
          v-bind:key="i"
        >
          <!--   {{carta.nombre}} -->
          <a
            class="text-xs font-bold uppercase px-5 py-3 pb-2 shadow rounded block leading-normal bg-green-100"
            v-on:click="toggleTabs(i + 1, carta.id)"
            v-bind:class="{
              'text-green-600 bg-white': openTab !== i + 1,
              'text-white bg-green-600': openTab === carta.id,
            }"
          >
            {{ carta.nombre }}
            <!--  NOmbre: {{carta.nombre}}--id1-{{i+1}}-cartaid-{{carta.id}}-- -->
            editar carta
          </a>
        </li>

        <!--   <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg 
          rounded block leading-normal" v-on:click="toggleTabs(1)" 
          v-bind:class="{'text-green-600 bg-white': openTab !== 1,
           'text-white bg-green-600': openTab === 1}">
            Datos
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(2)" v-bind:class="{'text-green-600 bg-white': openTab !== 2, 'text-white bg-green-600': openTab === 2}">
            Cartas
          </a>
        </li>
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(3)" v-bind:class="{'text-green-600 bg-white': openTab !== 3, 'text-white bg-green-600': openTab === 3}">
            QR
          </a>
        </li> -->
      </ul>

      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
      >
        <div class="px-4 py-5 flex-auto">
           <a href="#" class="" @click.prevent="modalAltaSubcarta = !modalAltaSubcarta">
        <strong>Alta SubCarta</strong>

        <span v-if="modalAltaSubcarta" class="minus-circle">
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

            <establecimientoCartasAlta v-if="modalAltaSubcarta"></establecimientoCartasAlta>

          <div class="tab-content tab-space">
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion>
            </div>
            <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion>
            </div>
            <div v-bind:class="{ hidden: openTab !== 3, block: openTab === 3 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--      DEL ESTABLECIMIENTO EN CUESTION 
TRAIGO LAS CARTAS DISPONIBLES
LAS SUBCARTAS 
 -->
  </div>
</template>


<script>
import accordion from "../accordion";

import modal from "../Modal.vue";

import establecimientoCartasAlta from "./EstablecimientoCartasAlta.vue";

export default {
  name: "cartas",
  props: ["esta"],
  components: {
    accordion,
    modal,
    establecimientoCartasAlta,
  },

  data() {
    return {
      openTab: 1,
      cartas: {},
      familias: {},
      platos: {},
      modalAlta: false,//carta
      modalAltaSubcarta: false,
    };
  },
  methods: {
     modalSubCartaAlta(event) {
      
      this.modalAlta = !this.modalAlta;
    
    },
   

    modalCarta(event) {
      console.log("modalCarta : ", event);
      console.log("modalCarta : ", this.modalAlta);

      this.modalAlta = !this.modalAlta;
      console.log("modalCarta : ", this.modalAlta);

      //this.$emit('altaCarta',true);
    },
    toggleTabs: function (tabNumber, cartaId) {
      this.openTab = tabNumber;
      console.log("toggleTabs", tabNumber, this.openTab, cartaId);

      axios
        .get(`/cartas/familias/${cartaId}`)
        .then((respuesta) => {
          console.log(respuesta);

          this.familias = respuesta.data.familias;
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    console.log("created : ESTABLECIMIENTO CARTAS ", this.esta, this.esta.id);
    const id = this.esta.id;
    const params = {
      estado: this.esta,
    };

    console.log(this.esta.id);
    //  axios.post(`/cartas/${this.esta.id}`, params)
    axios
      .get(`/cartas/${id}`)
      .then((respuesta) => {
        console.log(respuesta);

        this.cartas = respuesta.data.cartas;
        this.toggleTabs(1,this.openTab);
        // Eliminar del DOM  simpre borra del padre hacia el hijo
        //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>