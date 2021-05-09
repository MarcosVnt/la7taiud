<template>
  <div class="flex flex-wrap  mx-1 sm:p-10">
    <!--  <modal v-if="modalAlta" ></modal> -->








    <div class="w-full">
     


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

    
      </ul>
      <div>
        <a
            class="text-green-600 bg-green-100 text-xs font-bold uppercase px-5 py-3 pb-2 shadow rounded block leading-normal bg-green-100"
            v-on:click="mostrarFiltroAlergeno()"
            
          >
          <span v-if="mostrarFiltroAlergenos">
Ocultar Filtro Alérgenos
          </span>
            <span v-else>
Mostrar Filtro Alérgenos
          </span>
            
          </a>
      </div>
    
      <alergenosfiltro v-if="mostrarFiltroAlergenos"
              :alergenosMarcados="alergenosMarcados"
               @alergenosMarcado="alergenosM"
              ></alergenosfiltro>

     <publicidad
     :tipo="tipos"
     :seccion ="seccions"
     >

     </publicidad>

      <div
        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
      >
        <div class="px-4 py-5 flex-auto">


          <div class="tab-content tab-space">

           
           <accordionfront
              v-for="(familia, i) in this.familiasNew"
              v-bind:key="i"
              :familia="familia"
              :title="familia.nombre"
              :id="familia.id"
              :platos="platos"
              :alergenos="alergenos"
              :alergenosMarcados="alergenosMarcados"
            >
            </accordionfront>

              <publicidad
                :tipo="tipos"
                :seccion ="seccions"
                >

                </publicidad>
                  

          </div>
        </div>
      </div
      >
    </div>

    <!--      DEL ESTABLECIMIENTO EN CUESTION 
TRAIGO LAS CARTAS DISPONIBLES
LAS SUBCARTAS 
 -->
  </div>
</template>


<script>
import accordionfront from "./AccordionFront.vue";
import publicidad from "./Publicidad.vue";
import alergenosfiltro from "./AlergenosFiltro.vue";



/* import listaDraggable from "../ListaDraggable.vue";
 */
export default {
  name: "EstablecimientoCartaFront",
  props: ["esta"],
  components: {
    accordionfront,
    publicidad,
    alergenosfiltro,
    
/*     listaDraggable,
 */  },

  data() {
    return {
      mostrarFiltroAlergenos: false,

      //familiasNew: this.familias,
      familiasNew : [],
      openTab: 1,
      cartas: {},
      familias: {},
      platos: {},
      alergenos: {},
      establecimientoId: "",
      cartaId: "",
      cartaEdit: {},
      modalEdit: false,

      alergenosMarcados: [],

      modalAlta: false,
      modalAltaSubCarta: false,

       tipos:1,
        seccions:1,
    };
  },
  methods: {

    mostrarFiltroAlergeno(){

      this.mostrarFiltroAlergenos =! this.mostrarFiltroAlergenos;
      this.alergenosMarcados = [];

    },

    alergenosM(alergenos){
      console.log('alergenosM',alergenos);
      this.alergenosMarcados = alergenos;
      this.toggleTabs(this.openTab, this.cartaId, this.cartaId)
    },

   

    toggleTabs: function (tabNumber, cartaId, carta) {
      this.openTab = tabNumber;
      console.log("toggleTabs", tabNumber, this.openTab, cartaId);
      this.cartaId = cartaId;
      this.cartaEdit = carta;
      this.modalAlta = false;

      axios
        .get(`/carta/familias/${cartaId}`)
        .then((respuesta) => {
          console.log(respuesta);

          this.familias = respuesta.data.familias;
          this.familiasNew = respuesta.data.familias;
          
          this.platos = respuesta.data.platos;
          this.alergenos = respuesta.data.alergenos;
          this.tipos =2;
          this.seccions = 2;
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    inicializarCartas() {
      console.log("created : ESTABLECIMIENTO CARTAS ", this.esta, this.esta.id);
      const id = this.esta.id;
      const params = {
        estado: this.esta,
      };

      console.log(this.esta.id);
      //  axios.post(`/cartas/${this.esta.id}`, params)
      axios
        .get(`/carta/${id}`)
        .then((respuesta) => {
          console.log("respuesta", respuesta);

          this.cartas = respuesta.data.cartas;
          this.toggleTabs(1, this.cartas[0]["id"], this.cartas[0]);

          //todo
          //this.establecimientoId = this.cartas[0]['establecimiento_id'];

          console.log("todo", this.establecimientoId);
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