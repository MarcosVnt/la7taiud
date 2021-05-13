<template>
  <div class="flex flex-wrap mx-1">






<!--   <vue-qrcode value="https://www.rutasgp.com" />
 -->


  <publicidad
     :tipo="tipos"
     :seccion ="seccions"
     
     >

     </publicidad>


     

<div class="py-24 bg-white">
  <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 flex  sm:items-center">
    
    <div class="sm:pr-6">

     <!--  <div >
         <vue-qrcode :value="ruta" />
       </div> -->

      <p class="mt-4 text-sm leading-7 text-gray-500 font-regular">
        Servicio
      </p>
      <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900">
        Impresión<span class="text-indigo-600"> Qr</span>
      </h3>
      <p class="mt-2 text-base leading-6 text-gray-500">
        Mediante esta opción podrá generar e imprimir un PDF con su Código Qr que le permite el acceso directo a su Carta de Restauración Digital Personalizada .
      </p>
      
      <div class="mt-10">
      <ul class="flex flex-col sm:flex-row">
        <li class="w-1/2 my-10 md:mt-0 p-10">
          <div class="flex flex-col">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-8 w-8 rounded-md text-indigo-500">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
              </div>
            </div>
            <div class="mt-4">
              {{ruta}}
             <vue-qrcode id="qr" :value="ruta" />
            </div>
          </div>
        </li>



        <li class="w-1/2 my-10 md:mt-0 p-10">
          <div class="flex flex-col">
            <div class="flex-shrink-0">
              <div class="flex items-center justify-center h-8 w-8 rounded-md text-indigo-500">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" />
                </svg>
              </div>
            </div>
           <div class="mt-4">
                  <button
                    href="javascript:void(0)"
                    @click="pdfQr()"
                    class="text-xs font-bold uppercase px-5 py-3 hover:bg-green-800 shadow-lg rounded block leading-normal text-white bg-green-600"
                  >
                    Generar Pdf Qr
                  </button>


            </div> 
          </div>
        </li>
        
        
        </ul>
      </div>
      
    </div>
    
  </div>
</div>

  <publicidad
     :tipo="tipos"
     :seccion ="seccions"
     
     >

     </publicidad>







</div>


</template>


<script>

import VueQrcode from 'vue-qrcode'
import publicidad from "./Front/Publicidad.vue";


export default {
  name: "establecimientoQr",

  props: ["esta"],
  components: {
    
        VueQrcode,
        publicidad,
      
    },
  data() {
    return {
      openTab: 1,
      cQr: '',
      cQrr: '',
      tipos: '1',
      seccions:'2',
      ruta:'',


    }
  },
  methods: {


    pdfQr() {
 let me = this;
console.log(me.ruta);

                // let qr = document.getElementById('qr').src;


      setTimeout(function() {
       window.open(
          "/pdfqr?qr="+me.ruta,
          "_blank"
        );

      },2000);
    },


 

    toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    },
     codeQr: function(){

          this.ruta = 'this.esta.id';

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
          //console.log(error);
           if (error.response.status === 401) {
                window.location = "/login";
            }
        });
    }
  },
   created() {
   // this.codeQr();
   this.ruta = 'http://www.rutasgp.com/establecimiento/'+this.esta.id;
   console.log('qr ',this.esta,this.esta.id,this.ruta);


  },
}
</script>