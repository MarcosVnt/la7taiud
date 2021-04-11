<template>
  <div class="flex flex-wrap mx-1">






  <vue-qrcode value="https://www.rutasgp.com" />




</div>


</template>


<script>

import VueQrcode from 'vue-qrcode'


export default {
  name: "establecimientoQr",
  components: {
    
        VueQrcode,
      
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
   // this.codeQr();
  },
}
</script>