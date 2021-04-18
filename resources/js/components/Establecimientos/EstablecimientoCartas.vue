<template>
  <div class="flex flex-wrap">
    <!--  <modal v-if="modalAlta" ></modal> -->

    <div class="w-full">
      <!--    <span class="plus-circle" >
                
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Alta Carta
              </span> -->

      <div class="flex justify-between">
        <div class="flex">
          <div>
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
          </div>

          <div class="ml-4"></div>
        </div>
        <a href="#" class="" @click.prevent="modalCartaEditar(cartaId)">
          <div class="text-yellow-400 flex items-center">
            Editar

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="{2}"
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
              />
            </svg>
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
              ></path></svg
            ><span class="text-xl font-bold ml-2"></span>
          </div>
        </a>
        <a href="#" class="" @click.prevent="modalCartaEliminar(cartaId)">
          <div class="text-yellow-400 flex items-center">
            Eliminar

            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
            </svg>
            <svg
              class="h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="currentColor"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              ></path>
            </svg>
            <span class="text-xl font-bold ml-2"></span>
          </div>
        </a>
      </div>

      <!--   <listaDraggable></listaDraggable> -->

      <establecimientoCartasAlta
        v-if="modalAlta"
        :cartaEdit="cartaEdit"
        :modalEdit="modalEdit"
        @on-guardar="onGuardar"
        @on-cancelar="onCancelar"
      >
      </establecimientoCartasAlta>

      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li
          class="-mb-px mr-2 last:mr-0 flex-auto text-center pb-4"
          v-for="(carta, i) in this.cartas"
          v-bind:key="i"
        >
          <!--   {{carta.nombre}} -->

          <a
            class="text-xs font-bold uppercase px-5 py-3 pb-2 shadow rounded block leading-normal bg-green-100"
            v-on:click="toggleTabs(i + 1, carta.id, carta)"
            v-bind:class="{
              'text-green-600 bg-white': openTab !== i + 1,
              'text-white bg-green-600': openTab === i + 1,
            }"
          >
            {{ carta.nombre }} 

            <!-- {{openTab}} {{carta.id}} -->
            <!--  NOmbre: {{carta.nombre}}--id1-{{i+1}}-cartaid-{{carta.id}}-- -->
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

      <div
        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
      >
        <div v-if="cartaId>0" class="px-4 py-5 flex-auto">
          <a href="#" class="" @click.prevent="modalSubCarta">
            <strong>Alta SubCarta</strong>

            <span v-if="modalAltaSubCarta" class="minus-circle">
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

          <establecimientoCartasAltaSubCarta
            v-if="modalAltaSubCarta"
            :cartaId="cartaId"
            @on-guardarSC="onGuardarSubCarta"
            @on-cancelarSC="onCancelarSubCarta"
          >
          </establecimientoCartasAltaSubCarta>

          <div class="tab-content tab-space">

            <!--  <draggable
                tag="ul"
                group="all-users"
                class="draggable-list"
                ghost-class="moving-card"
                filter=".action-button"
                :list="familiasNew"
                :animation="200"
                :move ="onMove"
                 @change="update"
              > -->
           <accordion
              v-for="(familia, i) in this.familiasNew"
              v-bind:key="i"
              :familia="familia"
              :title="familia.nombre"
              :id="familia.id"
              :platos="platos"
              :alergenos="alergenos"
              @on-guardarPlatos="onGuardarPlatos"
            >
            </accordion>
<!--           </draggable>
 -->
            <!--     
            <div v-bind:class="{ hidden: openTab !== 1, block: openTab === 1 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                 :familia="familia"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion>
            </div>
             <div v-bind:class="{ hidden: openTab !== 2, block: openTab === 2 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                 :familia="familia"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion>
            </div>
            <div v-bind:class="{ hidden: openTab !== 3, block: openTab === 3 }">
              <accordion
                v-for="(familia, i) in this.familias"
                v-bind:key="i"
                :familia="familia"
                :title="familia.nombre"
                :id="familia.id"
              >
              </accordion> 
            </div> -->
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
import establecimientoCartasAltaSubCarta from "./EstablecimientoCartasAltaSubCarta.vue";
import Draggable from "vuedraggable";

/* import listaDraggable from "../ListaDraggable.vue";
 */
export default {
  name: "EstablecimientoCartas",
  props: ["esta"],
  components: {
    accordion,
    modal,
    establecimientoCartasAlta,
    establecimientoCartasAltaSubCarta,
    Draggable,
/*     listaDraggable,
 */  },

  data() {
    return {

      //familiasNew: this.familias,
      familiasNew : [],
      openTab: 1,
      cartas: {},
      familias: {},
      platos: {},
      alergenos: {},
      establecimientoId: "",
      cartaId: 0,
      cartaEdit: {},
      modalEdit: false,

      modalAlta: false,
      modalAltaSubCarta: false,
    };
  },
  methods: {

     update() {
       console.log('update',this.familias,this.familiasNew);

                this.familiasNew.map((familia, index) => {
                    familia.orden = index + 1;
                })
       console.log('update22',this.familias,this.familiasNew);


                axios.put('/familias/reordenar', {
                    familias: this.familiasNew
                }).then((response) => {
                    // success message
                })
            },

      onMove ({relatedContext, draggedContext}) {
        const relatedElement = relatedContext.element;
        const draggedElement = draggedContext.element;
        
        console.log('re',relatedContext.index, 'dra',draggedContext);

        return (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
      },

    onGuardarPlatos() {
      this.toggleTabs(this.openTab, this.cartaId, 1);
    },

    /* SUBCARTA */

    onGuardarSubCarta(subCarta) {
      console.log("onGuardarSubCarta", subCarta);
      this.familias.push(subCarta);
           
           this.toggleTabs(this.openTab, this.cartaId, 1);

      this.onCancelarSubCarta();
    },
    onCancelarSubCarta() {
      console.log("onCancelarSubCarta ....");
      this.modalAltaSubCarta = false;
            this.toggleTabs(this.openTab, this.cartaId, 1);

    },

    modalSubCarta() {
      this.modalAltaSubCarta = !this.modalAltaSubCarta;
    },

    /* CARTA */

    onGuardar(carta) {
      console.log("onGuardar", carta);
      this.cartas.push(carta);
      this.cartaId = carta.id;
      this.toggleTabs(this.openTab, this.cartaId, 1);

      
      this.onCancelar();
    },
    onCancelar() {
      console.log("onCancelar ....");
      this.modalAlta = false;
    },
    /*  modalSubCartaAlta(event) {
      
      this.modalAlta = !this.modalAlta;
    
    },  */

    modalCartaEliminar(cartaId) {
      console.log("modalCartaEliminar", cartaId);

      this.$swal
        .fire({
          title: "¿Deseas eliminar la Carta Y todos sus componentes?",
          text: "Una vez eliminada no se puede recuperar!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si",
          cancelButtonText: "No",
        })
        .then((result) => {
          if (result.value) {
            const params = {
              id: cartaId,
              _method: "delete",
            };

            // Enviar petición a axios
            axios
              .post(`/cartas/${cartaId}`, params)
              .then((respuesta) => {
                // console.log(respuesta)
                this.$swal.fire(
                  "Carta  Eliminada",
                  respuesta.data.mensaje,
                  "success"
                );
                this.cartaId=1;
                this.inicializarCartas();

                // Eliminar del DOM  simpre borra del padre hacia el hijo
                /*  this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode); */
              })
              .catch((error) => {
                console.log(error);
              });
          }
        });
    },

    modalCartaEditar(cartaId) {
      console.log("modalCartaEditar : ", cartaId);
      console.log("modalCartaEditar : ", this.modalAlta);

      this.modalAlta = !this.modalAlta;
      this.modalEdit = true;
      console.log("modalCartaEditar : ", this.modalAlta, this.cartaEdit);
      //this.cartaEdit = this.carta;
      //this.$emit('altaCarta',true);
    },

    modalCarta(event) {
      console.log("modalCarta : ", event);
      console.log("modalCarta : ", this.modalAlta);
      this.modalEdit = false;

      this.modalAlta = !this.modalAlta;
      console.log("modalCarta : ", this.modalAlta);
      this.cartaEdit = {};

      //this.$emit('altaCarta',true);
    },

    toggleTabs: function (tabNumber, cartaId, carta) {
      this.openTab = tabNumber;
      console.log("toggleTabs", tabNumber, this.openTab, cartaId);
      this.cartaId = cartaId;
      this.cartaEdit = carta;
      this.modalAlta = false;

      axios
        .get(`/cartas/familias/${cartaId}`)
        .then((respuesta) => {
          console.log(respuesta);

          this.familias = respuesta.data.familias;
          this.familiasNew = respuesta.data.familias;
          
          this.platos = respuesta.data.platos;
          this.alergenos = respuesta.data.alergenos;
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    inicializarCartas() {
      console.log("created : inicializar  CARTAS ",this.cartas,this.cartaId,
       this.esta, this.esta.id);

       let me = this;
      const id = this.esta.id;
      const params = {
        estado: this.esta,
      };

       let c1 = 1 ; 
        let c2 = 1 ; 

    

      console.log(me.esta.id);
      //  axios.post(`/cartas/${this.esta.id}`, params)
      axios
        .get(`/cartas/${id}`)
        .then((respuesta) => {
          console.log("respuesta", respuesta);

          me.cartas = respuesta.data.cartas;
       
            if (me.cartas[0]){

              c1 = me.cartas[0]["id"];
              c2 = me.cartas[0];

            }     
          //me.toggleTabs(1, me.cartas[0]["id"], me.cartas[0]);
           me.toggleTabs(1, c1, c2);


          //todo
          //this.establecimientoId = this.cartas[0]['establecimiento_id'];

          console.log("todo", me.establecimientoId);
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    this.inicializarCartas();
    console.log('CREATED -->', this.familiasNew, this.familias);

    //this.familiasNew = this.familias;
  },
};
</script>


<style>
.draggable-list {
  min-height: 100px;
}

</style>