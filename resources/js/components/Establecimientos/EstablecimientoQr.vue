<template>
  <div class="flex flex-wrap mx-1">
<!--     <div class="w-full">
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
             
             </div>
            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">

              
             
            </div>
            <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
            
             
              
            </div>
          </div>
        </div>
      </div>
    </div> -->
    
    
<!--      DEL ESTABLECIMIENTO EN CUESTION 
TRAIGO LAS CARTAS DISPONIBLES
LAS SUBCARTAS 
 -->

<!--  {{QrCode::size(300)->generate('MyNotePaper')
 -->

<div class="bg-indigo-300 ...">
      <div class="bg-indigo-300 ...">
        {{ cQr }}

        <img src="{!!cQrr!!}">



        {!! QrCode::generate('MyNotePaper'); !!}
        </div>
        <div class="bg-indigo-300 ...">
        {{ cQrr }}
        </div>
        <div class="bg-indigo-300 ...">
        
        <img
          class="object-contain md:object-scale-down"
          :src="'../img/qrcode_chrome.png'"
        />
      </div>
</div>


  </div>
</template>


<script>

export default {
  name: "establecimientoQr",
  components: {
    
        
      
    },
  data() {
    return {
      openTab: 1,
      cQr: '',
      cQrr: '',
    }
  },
  methods: {
    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    },
     codeQr: function(){
         axios
        .get("/qrcode")
        .then((respuesta) => {
          console.log('codeQr',respuesta);
          this.cQr= respuesta;
          this.cQrr= respuesta.data;
          
         // this.$emit("on-guardar", respuesta.data.carta);

          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
   created() {
    this.codeQr();
  },
}
</script>