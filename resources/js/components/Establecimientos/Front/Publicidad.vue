<template>

 <div class="">
        <img v-if="img"
          class="object-contain md:object-scale-down"
          :src="'/storage/publicidad/'+img"


        />
 <img v-else
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
  props: ["tipo","Seccion","img"],
  components: {
  },

  data() {
    return {
       imagen: '',
    
    };
  },
  methods: {
      inicializarPublicidad() {

        if(this.img){

        //  this.imagen = '/storage/publicidad/'+this.$parent.img1;

          console.log('initImagen',this.img,this.imagen);

          return ;
        }else{
          console.log('initImagen22222',this.img,this.imagen);
          
        }


          let me = this;

      var params = {
            tipos: this.tipo,
            seccions: this.seccion,
           // _method: "delete"
          }; // Enviar petición a axios

          console.log(this.tipo,this.seccion);

          axios.get("/publi/", params).then(function (respuesta) {
             console.log('publicidad',respuesta,respuesta.data.publicidads.imagen);
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