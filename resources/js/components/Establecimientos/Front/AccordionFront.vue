<template>
  <div class="">
    <div class="tab__header">
      <a
        href="#"
        class="tab__link bg-green-500 text-red p-4 block bg-blue-dark hover:bg-blue-darker no-underline border-b-2 border-red flex justify-between"
        @click.prevent="muestraPlatos(id)"
      >
        <strong>{{ title }} </strong>

        <span class="down-Arrow" v-show="!active">&#9660;</span>
        <span class="up-Arrow" v-show="active">&#9650;</span>
      </a>
    </div>


<!-- <div class="flex">
<div class="flex w-3 wrapper bg-gray-400 antialiased text-gray-900"
 v-for="(plato, i) in filteredPlato(id)"
        v-bind:key="i"
>
<div>
    
    <img src="https://source.unsplash.com/random/350x350" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">    
    
 <div class="relative px-4 -mt-16  ">
   <div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex items-baseline">
      <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
        New
      </span>
      <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
    2 baths  &bull; 3 rooms
  </div>  
    </div>
    
    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>
 
  <div class="mt-1">
    $1800
    <span class="text-gray-600 text-sm">   /wk</span>
  </div>
  <div class="mt-4">
    <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
    <span class="text-sm text-gray-600">(based on 234 ratings)</span>
  </div>  
  </div>
 </div>
  
</div>
  </div>

  </div>

 -->




<div class="container container rounded  m-auto flex flex-wrap flex-col md:flex-row items-center justify-start" v-show="active">
  
  <div class="w-full  p-3"
    v-for="(plato, i) in filteredPlato(id)"
        v-bind:key="i">
    <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg-auto border shadow shadow-lg">
      <img v-if="plato.imagen" class="block h-auto w-full lg:w-48 flex-none bg-cover h-24  lg:h-48 p-6 rounded-full border border-gray-100 shadow-sm" 
       :src="
                  '../storage/establecimiento/' +
                  plato.establecimiento_id +
                  '/' +
                  plato.imagen
                "
                :alt="plato.nombre"
                :title="plato.nombre"
      >
     
<div class="bg-white p-4 rounded-lg shadow-lg w-full">
    <div class="flex items-baseline">
         <!--  <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
            New
          </span> -->
          <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider truncate">
        {{plato.observaciones}}
         </div>  
    </div>
    
    <h4 class="mt-1 text-xl font-semibold uppercase leading-tight ">{{plato.nombre}}</h4>
 
    <div class="mt-1">
      {{plato.precio}}
      <span class="text-gray-600 text-sm">  {{plato.moneda}}</span>
    </div>
    <div class="mt-4" v-if="filteredAlergeno(plato.id)">
      <span class="text-teal-600 text-md font-semibold">Alérgenos </span>
      <span class="text-sm text-gray-600">(En plato)</span>
    </div>  


     <div class="dish-miniature__content__allergens flex inline-block">
            <img
              v-for="(alergeno, i) in filteredAlergeno(plato.id)"
              v-bind:key="i"
              :src="'../storage/' + alergeno.imagen"
              :alt="alergeno.nombre"
              :title="alergeno.nombre"
              class="w-12 h-12 p-2 mb-2"
            />
          </div>
</div>

      
    </div>








  </div>
</div>





   

    
  </div>
</template>
<script>
export default {
  name: "accordionfront",
  props: ["title", "id", "familia", "platos", "alergenos", "alergenosMarcados"],
  components: {},

  data() {
    return {
      active: true,
      platosFiltro: {},
      modalAltaPlato: false,
    };
  },
  methods: {
    filteredAlergeno(id) {
      // TODO : AL GUARDAR  plato nuevo no existe pivot y por tanto no exite familia_id..
      // como volvemos a cargar platos .. se soluciona pero da error ..

      console.log("filteredAlergeno - id", id);

      return this.alergenos.filter((alergeno) => {
        const compo = alergeno.pivot.plato_id.toString().toLowerCase();
        console.log("filteredAlergeno - compo", compo.includes(id));

        return compo.includes(id);
      });
    },

    muestraPlatos(id) {
      this.active = !this.active;
      //this.platos = {};

      this.filteredPlato(id);

      console.log("muestraPlatos", this.filteredPlato(id));
      console.log("muestraPlatos3", this.platos);

      if (this.active) {
        // this.familiaPlatos(this.id);
      }
    },

    filteredPlato(id) {
      // TODO : AL GUARDAR  plato nuevo no existe pivot y por tanto no exite familia_id..
      // como volvemos a cargar platos .. se soluciona pero da error ..

      /* console.log("filteredPlato - id", id); */

      let flag = false; // false añade, true no añade
      console.log("filteredPlato - 1  flag", flag, id);

      return this.platos.filter((plato) => {
        console.log("filteredPlato - 2 flag", flag, id);

        if (this.alergenosMarcados.size > 0) {
          console.log("filteredPlato - 3  flag", flag, id);

          this.alergenosMarcados.forEach((element) => {
            const compo2 = plato.alergenos;
            const compo3 = JSON.stringify(compo2);

            const e = '"' + element.substr(1) + '"';

            flag = compo3.includes(e);
            console.log("filteredPlato - 4  flag", flag, compo3, e);
          });
        }

        console.log("filteredPlato - 5  flag", flag);

        if (!flag) {
          const compo = plato.pivot.familia_id.toString().toLowerCase();
          console.log(
            "filteredPlato - 666666b SI AÑADO",
            id,
            compo,
            plato.nombre
          );
          return compo.includes(id);
        } else {
          console.log("filteredPlato - 77777777 NO AÑADO", plato.nombre);
        }
      });
    },

    familiaPlatos(familia) {
      console.log("familaPlatos", familia);

      axios
        .get(`/carta/familias/platos/${familia}`)
        .then((respuesta) => {
          console.log(respuesta);

          this.platos = respuesta.data.platos;
          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created() {
    console.log(
      "CREATED ACCORDION alergenosMarcados ",
      this.alergenosMarcados,
      this.id
    );
    // this.familiaPlatos(this.id);
    /*  if(!this.alergnosMarcados){this.alergenosMarcados = []}*/
  },
};
</script>

<style scoped>
.dish-miniature__content__allergens {
  display: flex;
  flex-flow: row wrap;
  margin-top: 8px;
  min-height: 36px;
  /* max-height: 36px; */
  overflow: hidden;
}
</style>