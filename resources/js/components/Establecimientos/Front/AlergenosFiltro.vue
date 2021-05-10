<template>
    <div>
        
         <div class="ml-4 pt-10 pb-10">
                    <div class="font-bold"> Alergenos </div>
                    <div class="mt-1 text-xs text-gray-500">
                    Seleccione qué Alergenos quiere que NO CONTENGAN los platos mostrados. 
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
   
   
    <!-- <div class="mb-2">
        <a
            class="text-green-600 bg-green-100 text-xs font-bold uppercase px-5 py-3 pb-2 shadow rounded block leading-normal bg-green-100"
            v-on:click="aplicarFiltroAlergenos()"
          
          >
            <span >
APLICAR Filtro Alérgenos {{alergenosFiltro.size}} --
          </span>
            
          </a>
      </div> -->
   
    </div>
</template>


<script>
    export default {  
        name: "accordionfront",
  props: ["alergenosMarcados"],


      //  props: ['alergenos', 'oldalergenos'],
        data: function() {
            return {
                alergenosFiltro: new Set(),// array pero no permite registros duplicados
                alergenos: {},
                image: "",

            }
        },

        created: function() {
           if(this.oldalergenos) {
               const alergenosArray = this.oldalergenos.split(',');
               alergenosArray.forEach( alergeno => this.alergenosFiltro.add(alergeno) );
           }

                       this.inicializarAlergenos();

        },
        mounted: function() {
            document.querySelector('#alergenos').value = this.oldalergenos;
        },
        methods: {

            aplicarFiltroAlergenos(){

                console.log('aplicarFiltroAlergenos',this.alergenosFiltro,
                'alergenos',this.alergenos,
                'alergenosArray',this.alergenosArray,
                'oldalergenos',this.oldalergenos);

                let filtro = Array.from(this.alergenosFiltro);

            let res = this.alergenos.filter(item => !filtro.includes(item));
console.log('res',res,
'filtro',filtro

);

            
                

            },
            activar(e,i,a) {
                console.log('ACTIVAR compo 3',e.target,i,a);
                let elemento = document.getElementById(i);

                


                if( elemento.classList.contains('bg-green-100') ) {
                    // el alergeno esta en activo
                   elemento.classList.remove('bg-green-100');

                    // Eliminar del set de alergenosFiltro
                    this.alergenosFiltro.delete(elemento.textContent);
                } else {
                    // No esta activo, añadirlo
                   elemento.classList.add('bg-green-100');
                    // Agregar al set de alergenosFiltro
                    this.alergenosFiltro.add(elemento.textContent);
                }

           

                // agregar las alergenosFiltro al input hidden
                const stringHabilidades = [...this.alergenosFiltro];
           
                document.querySelector('#alergenos').value = stringHabilidades
                

           
                 this.$emit("alergenosMarcado", this.alergenosFiltro);
                
            },
            verificarClaseActiva(alergeno) {
                console.log('verificarClaseActiva',alergeno,'habilidaddes',this.alergenosFiltro);
                return this.alergenosFiltro.has(alergeno) ? 'bg-green-400' : '';
            },

             inicializarAlergenos() {


                 this.alergenosFiltro = new Set(this.alergenosMarcados);

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