<template>
  <div class="">
    <div class="tab__header m-3">
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
        class="flex bg-green-200 border-b-2 p-2 block m-2"
        v-for="(plato, i) in filteredPlato(id)"
        v-bind:key="i"
      >
        <div class="flex-auto text-left">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.nombre }} - {{ plato.id }} {{ plato.pivot.familia_id }}
          <br />
          <span class="text-xs mb-4 font-thin">{{ plato.observaciones }}.</span>
        </div>
     
        <div class="flex-auto text-right">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.precio }} {{ plato.moneda }}
        </div>

     
     
      </div>
    </div>
  </div>
</template>
<script>


export default {
  name: "accordionfront",
  props: ["title", "id", "familia", "platos"],
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