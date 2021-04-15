<template>

 <div class="">
        <img
          class="object-contain md:object-scale-down"
          :src="imagen"


        />

<!--      <img src="{{imagen}}" class="w-40 mt-10">
 -->

      </div>


</template>
<script>


export default {
  name: "publicidad",
  props: ["tipo","Seccion"],
  components: {
  },

  data() {
    return {
       imagen: '',
    
    };
  },
  methods: {
      inicializarPublicidad() {


          let me = this;

      var params = {
            tipos: this.tipo,
            seccions: this.seccion,
           // _method: "delete"
          }; // Enviar petición a axios

          console.log(this.tipo,this.seccion);

          axios.get("/publi/", params).then(function (respuesta) {
             console.log(respuesta,respuesta.data.publicidads.imagen);
             me.imagen = '/storage/publicidad/'+respuesta.data.publicidads.imagen;

                          console.log(me.imagen);



            /*  this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode); */

          })["catch"](function (error) {
            console.log(error);
          });
 }


  },
  created() {
    console.log("CREATED PUBLIDIDAD ");
    // this.familiaPlatos(this.id);
    this.inicializarPublicidad();
  },
};
</script>