<template>
  <div class="">
    <div class="tab__header ">
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

    <div class="tab__content p-2" v-show="active">
      <slot />

      <div class="flex w-full">
       
      </div>

     

      <div
        class="flex bg-green-200 border-b-2 p-2 block "
        v-for="(plato, i) in filteredPlato(id)"
        v-bind:key="i"
      >
     <!--    <div class="flex-auto text-left">
          {{ plato.nombre }} - {{ plato.id }} {{ plato.pivot.familia_id }}
          <br />
          <span class="text-xs mb-4 font-thin">{{ plato.observaciones }}.</span>
        </div>
     
        <div class="flex-auto text-right">
          {{ plato.precio }} {{ plato.moneda }}
        </div> -->

     
       <div class="container w-full">
          <div class="flex block">
            <div class="flex-auto w-3/5 text-left">
              <!-- Will grow and shrink as needed taking initial size into account -->
              {{ plato.nombre }} - {{ plato.id }} {{ plato.pivot.familia_id }}
              <br />
              <span class="text-xs mb-4 font-thin"
                >{{ plato.observaciones }}.</span
              >
            </div>
            <div class="flex-auto w-1/5 text-right">
              <!-- Will grow and shrink as needed taking initial size into account -->
              {{ plato.precio }} {{ plato.moneda }}
            </div>

            <div class=" flex block" v-if="plato.imagen">
            <img
              :src="'../storage/establecimiento/' + plato.establecimiento_id +'/'+plato.imagen"
              :alt="plato.nombre"
              :title="plato.nombre"
              class="w-32 h-32 p-2"
            />

       
          </div>

          
          </div>
          <!--      {{filteredAlergeno(plato.id)}}-->
            <div class="dish-miniature__content__allergens flex inline-block"
           >
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
</template>
<script>


export default {
  name: "accordionfront",
  props: ["title", "id", "familia", "platos","alergenos"],
  components: {
  },

  data() {
    return {
      active: false,
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
        //console.log("filtered plato ", plato);

        const compo = alergeno.pivot.plato_id.toString().toLowerCase();
        console.log("filteredPlato - compo", compo.includes(id));

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

      return this.platos.filter((plato) => {
/*         console.log("filtered plato ", plato);
 */      
  const compo = plato.pivot.familia_id.toString().toLowerCase();
/*         console.log("filteredPlato - compo", compo);
 */
        return compo.includes(id);
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
    console.log("CREATED ACCORDION ", this.title, this.id);
    // this.familiaPlatos(this.id);
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