<template>
            <main class="main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
            </ol>


        
                                
                                


                <foto-lista
                :fotosDelDia="obrasFotosLista"
                ></foto-lista>

            
                <foto-obra-dropzone
                    @finalizar="finalizarSubirFotos"              
                    :obra ="obraRecibida">
                </foto-obra-dropzone>

           


        </main>
</template>

<script>
    export default {
        data() {
            return {
                obrasFotosLista: [],
                obraRecibida : '',
                obraEnviada : '',
                obraMostrarListaFotos: true,
                fotoAnadir : false,
            };
        },
        mounted() {

              //  console.log('MOUUUUUUUUUUUUUUNTED');
                
             this.listarFotosObras();
                
        },
        
        methods: {
        

           
              finalizarSubirFotos: function finalizarSubirFotos(fin){
                  console.log('FOTO GLOBAL 33333 - FINALIZAR ',fin,this.fotoAnadir);
                  this.fotoAnadir = false;
                  this.obraMostrarListaFotos = true;
                console.log('FOTO GLOBAL 33333 - FINALIZAR ',fin,this.obraMostrarListaFotos);

                    this.listarFotosObras();
                    //this.$store.state.anadirFoto = false;

                   

    },
            obraAnadirFotos(obra) {
                let me = this;
                 me.fotoAnadir = true;

        me.obraMostrarListaFotos = true;
                console.log('foto global - obraAnadir fotos ',obra,me.obraMostrarListaFotos);

                me.obraMostrarListaFotos= false;

            },
            obraSeleccionadaRecibida(obraRecibida) {

                //name, nombre, codigo, userid,id 
                this.obraRecibida = obraRecibida;
                this.listarFotosObras(1,this.obraRecibida.id); ///Filtramos por obras??
               console.log('FOTO GLOBAL - obraseleccionadaRecibida', obraRecibida,this.obraRecibida);
              
              // this.getMessages();
               // console.log('Nueva conv seleccionada222', this.messages);

            },
               listarFotosObras: function listarFotosObras(pag, buscar, criterio) {
                    var me = this;
                    
                    
                    var url = '/fotosobras?page=' +pag + '&buscar=' + me.buscar + '&criterio=' + me.criterio;
                    axios.get(url).then(function (response) {
                        //me.hayFotos = 0;
                        var respuesta = response.data;
                        //me.obrasUsuario();
                        me.obrasFotosLista = respuesta.obraFoto.data;
                    console.log('FOTO GLOBAL -listar fotos obras ',me.obrasFotosLista);

                        if (me.obrasFotosLista.length > 0) {
                        // me.hayFotos = 1;
                        } else {
                            };

                    // me.pagination = respuesta.pagination;
                    }).catch(function (error) {
                       /*P  if (error.response.status === 401) {
                            window.location = "/login";
                        }
 */
                    });
            }
        }
      
    }
</script>
<style>    
    
</style>
