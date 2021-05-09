<template>
    <div>
        
         <div class="ml-4 pt-10 pb-10">
                    <div class="font-bold"> Alergenos </div>
                    <div class="mt-1 text-xs text-gray-500">
                    Seleccione qué Alergenos contiene el plato , si es que los tiene. 
                    </div>
                  </div>

        <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-1 py-1 mb-1 rounded"
                :class="verificarClaseActiva(alergeno)"
                v-for="(alergeno, i )  in this.alergenos"
                v-bind:key="i"
              
                
            >
            <div class="h-24 w-24" v-bind:id="i"
              @click="activar($event,i,alergeno)"
            >
                    <img
          class="object-center md:object-scale-down imagen"
          :src="'../storage/'+alergeno.imagen" 


        />
        <span class="text-center" style="font-size: 0.838rem; ">{{alergeno.nombre}}</span>


            </div>
            
            
        </li>

            <!--   <img
          class="object-contain md:object-scale-down"
          :src="alergeno"


        /> -->

            
        </ul>

        <input type="hidden" name="alergenos" id="alergenos" >
    </div>
</template>


<script>
    export default {
      //  props: ['alergenos', 'oldalergenos'],
      name: "alergenoslista",
        data: function() {
            return {
                habilidades: new Set(),// array pero no permite registros duplicados
                alergenos: {},
                image: "",

            }
        },

        created: function() {
           if(this.oldalergenos) {
               const alergenosArray = this.oldalergenos.split(',');
               alergenosArray.forEach( alergeno => this.habilidades.add(alergeno) );
           }

                       this.inicializarAlergenos();

        },
        mounted: function() {
            document.querySelector('#alergenos').value = this.oldalergenos;
        },
        methods: {
            activar(e,i,a) {
                console.log('ACTIVAR',e.target,i,a);
                let elemento = document.getElementById(i);

                console.log('ACTIVAR,dd333',document.getElementById(i));
                


                if( elemento.classList.contains('bg-green-100') ) {
                    // el alergeno esta en activo
                   elemento.classList.remove('bg-green-100');

                    // Eliminar del set de habilidades
                    this.habilidades.delete(elemento.textContent);
                } else {
                    // No esta activo, añadirlo
                   elemento.classList.add('bg-green-100');
                    // Agregar al set de habilidades
                    this.habilidades.add(elemento.textContent);
                }

                // agregar las habilidades al input hidden
                const stringHabilidades = [...this.habilidades];
                document.querySelector('#alergenos').value = stringHabilidades;

                 this.$emit("alergenosMarcados", this.habilidades);
                
            },
            verificarClaseActiva(alergeno) {
                console.log('verificarClaseActiva',alergeno,'habilidaddes',this.habilidades);
                return this.habilidades.has(alergeno) ? 'bg-green-400' : '';
            },

             inicializarAlergenos() {


        let me = this;

        var params = {
            tipos: this.tipo,
            seccions: this.seccion,
           
          }; 

          console.log(this.tipo,this.seccion);

          axios.get("/alergenos/").then(function (respuesta) {
             console.log(respuesta,respuesta.data.alergenos.imagen);
             me.imagen = '/storage/'+respuesta.data.alergenos.imagen;
             me.alergenos= respuesta.data.alergenos;
             

                          console.log(me.imagen);

          })["catch"](function (error) {
            console.log(error);
          });
 }
       
       
       
       
       
       },

       

    }

</script>

<style>
.imagen{
        margin-right: 10px;
    height: 25px;
    vertical-align: middle;
    text-align: center;
    border-style: none;


}

</style>