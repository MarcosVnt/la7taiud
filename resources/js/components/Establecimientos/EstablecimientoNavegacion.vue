<template>
  <div class="flex flex-wrap mx-1 sm:p-10">

<!--      <modal v-if="modalCarta" @altaCarta="altaModalCarta"></modal>
 -->
    <div  class="w-full">
      <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal" v-on:click="toggleTabs(1)" v-bind:class="{'text-green-600 bg-white': openTab !== 1, 'text-white bg-green-600': openTab === 1}">
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
        </li>
      </ul>
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
        <div class="px-4 py-5 flex-auto">
          <div class="tab-content tab-space">
            <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
              <p>
               <!--  Collaboratively administrate empowered markets via
                plug-and-play networks. Dynamically procrastinate B2C users
                after installed base benefits.
                <br />
                <br />
                Dramatically visualize customer directed convergence
                without revolutionary ROI. -->

                <!-- DATOS DEL ESTABLACIMIENTO -->

                <establecimiento-datos 
                :esta="establecimientos"
                
                ></establecimiento-datos>  


              </p>
            </div>
            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">

             <!--  CARTAS DEL ESTABLECIMIENTO 
              TABS CON CARTAS 
              ACORDION CON SUBCARTAS -->

              <establecimiento-cartas 
               :esta="establecimientos"
              ></establecimiento-cartas>
              
            <!--   <p>
                Completely synergize resource taxing relationships via
                premier niche markets. Professionally cultivate one-to-one
                customer service with robust ideas.
                <br />
                <br />
                Dynamically innovate resource-leveling customer service for
                state of the art customer service.
              </p> -->

            </div>
            <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
            
             <establecimiento-qr></establecimiento-qr>

              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>
import EstablecimientoDatos from './EstablecimientoDatos.vue'
import Modal from '../Modal.vue';

export default {
      props:['establecimientos'],

  name: "establecimiento-navegacion",
  components: {
    EstablecimientoDatos,
    Modal,
        
      
    },
  data() {
    return {
      openTab: 1,
      establecimientoD: {},
      //modalCarta:false,
    }
  },
  methods: {
    altaModalCarta(value) {
      console.log('altaModalCarta',value);
      this.modalCarta= true;
    },
    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    }
  },
  created() {
    console.log('ESTABLECIMIENTO -NAVEGACION : created : usuario ',this.establecimientos);

    this.establecimientoD = this.establecimientos;

     /*  axios.get(`establecimientos/${this.establecimiento.id}`)
                .then(response => {
                  console.log('response',response);
                    this.establecimientoD = response.data
                }) */
  },
}
</script>