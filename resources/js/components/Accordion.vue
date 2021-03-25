<template>
  <div class="">
    <div class="tab__header m-3">
      <a
        href="#"
        class="tab__link bg-green-500 text-red p-4 block bg-blue-dark hover:bg-blue-darker no-underline border-b-2 border-red flex justify-between"
        @click.prevent="active = !active"
      >
        <strong>{{ title }}</strong>
        <span class="down-Arrow" v-show="!active">&#9660;</span>
        <span class="up-Arrow" v-show="active">&#9650;</span>
      </a>
    </div>
    <div class="tab__content p-2" v-show="active">
      <slot />

      <div
        class="flex bg-green-200 border-b-2 p-4 block m-6"
        v-for="(plato, i) in platos"
        v-bind:key="i"
      >
        <div class="flex-auto text-left">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.nombre }} <br />
          <span class="text-xs mb-4 font-thin">{{ plato.observaciones }}.</span>
        </div>
        <div class="flex-auto text-right">
          <!-- Will grow and shrink as needed taking initial size into account -->
          {{ plato.precio }} {{ plato.moneda }}
        </div>
      </div>

      <!--   <div class="tab__link bg-green-200  p-4 block   border-b-2 border-red flex justify-between"
                 v-for="( plato ,i) in platos"
                 v-bind:key="i"
                 >       
                 {{plato.nombre}} - {{plato.precio}}             
                </div>
 -->
    </div>
  </div>
</template>
<script>
export default {
  props: ["title", "id"],
  data() {
    return {
      active: false,
      platos: {},
    };
  },
  methods: {
    familiaPlatos(familia) {
      console.log("familaPlatos", familia);

      axios
        .get(`/cartas/familias/platos/${familia}`)
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
    this.familiaPlatos(this.id);
  },
};
</script>