<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Gestor de Fotos .</div>
          <div class="card-body">
            Pincha en el recuadro de abajo para adjuntar las fotos 
            <vue-dropzone
              ref="dropzoneRef"
              id="dropzoneId"
              @vdropzone-complete="afterComplete"
              @vdropzone-removed-file="removeFile"

              :options="dropzoneOptions"
            ></vue-dropzone>
       <!--     <button @click="removeAllFiles">Remove All Files</button> -->
              Espere a que se procesen la foto
<!--               <button  @click="finalizar" class="btn btn-success float-right">Finalizar </button>
 -->            
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
/*   props: ["codigoDeObra", "writtenByMe"],
 */
  props: {
   
    plato: Object,
  
  },

  data: function data() {
    return {

      establecimientoCodigo:"",
      establecimientoNombre: "",
     
      
      dropzoneOptions: {
        url: "/establecimientos/plato/altafoto",
        maxFiles: 1,
        /*  maxFilesize: 2, // MB
                maxFiles: 4,
                chunking: true,
                chunkSize: 500, // Bytes
                thumbnailWidth: 150, // px
                thumbnailHeight: 150, */
        addRemoveLinks: true,
        headers: {
          "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]")
            .content
        }, 
        params: {
          plato: this.plato,
       /*    establecimientoNombre: this.establecimiento.nombre_comercial,
          establecimiento : this.establecimiento,
 */
        }
      }
    };
  },
  computed: {
    //return this.pagination.current_page;ç
    
    
  },
  mounted() {
  
   this.inicio();

      

   
    console.log('FOTOOBRADROPZ<ONE -> me plato inicio',
      this.plato,
      'DROPOPTIONS',this.dropzoneOptions
      
    );

   


  },
  methods: {
    finalizar: function finalizar(){
      console.log('FOTOOBRADROPZONE - FINALIZAR');
      let fin = true;
      this.$emit('finalizar',fin);

    },
    inicio: function inicio() {
      let me = this;

      let miPlato = Object.keys(me.plato).map((key) => {
     return me.plato[key]
   })

      console.log('FOTOOBRADROPZONE -> me plato  ',me.plato,miPlato);

    },
    removeFile(file){
      console.log('removeFile',file);
    },

    removeAllFiles() {
      console.log("FOTOOBRADROPZONE this.$refs.dropzone", "this.$refs.dropzoneRef");
      // this.$refs.dropzone.removeAllFiles();
    },
    afterComplete(file) {
      this.dropzoneOptions.params.slot=this.establecimiento;
        let fin = true;
                this.$emit('finalizar',fin,file.xhr.response);

      console.log( "FOTOOBRADROPZONE",this.dropzoneOptions.params.slot,"CONSOLE.LGO",file.xhr.response);
      //this.establecimiento, file,file.xhr);
    }
  },
  watch: {
    codigoDeObra(value){
      console.log('FOTOOBRADROPZONE->WATCH ',value)
    }
  }
};
</script>
