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
        <div class="flex w-full pl-4">
          <a
            href="#"
            class=""
            @click.prevent="modalAltaPlato = !modalAltaPlato"
          >
            <strong>Alta Plato :</strong>

            <span v-if="modalAltaPlato" class="minus-circle">
              <svg
                class="w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </span>

            <span v-else class="plus-circle">
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
              </svg>
            </span>
          </a>
        </div>

        <div class="flex w-full pr-4">
          <a href="#" class="" @click.prevent="modalFamiliaEliminar(id)">
            <strong>Eliminar SubCarta</strong>

              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg>

            <!-- <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
            </svg> -->
          </a>
        </div>
      </div>

      <establecimientoCartasAltaPlato
        v-if="modalAltaPlato"
        :familia_id="familia.id"
        @on-GuardarPlato="onGuardarPlato"
        @on-CancelarPlato="onCancelarPlato"
      ></establecimientoCartasAltaPlato>

      <div
        class="flex bg-green-200 border-b-2 p-2 block m-2"
        v-for="(plato, i) in filteredPlato(id)"
        v-bind:key="i"
      >
        <div class="container w-full">
          <div class="flex block">
            <div class="flex-auto w-3/5 text-left font-bold">
              <!-- Will grow and shrink as needed taking initial size into account -->
              {{ plato.nombre }}
              <!-- - {{ plato.id }} {{ plato.pivot.familia_id }} -->
              <br />
              <span class="text-xs mb-4 font-thin"
                >{{ plato.observaciones }}.</span
              >
            


            </div>
            <div class="flex-auto w-1/5 text-right font-bold">
              <!-- Will grow and shrink as needed taking initial size into account -->
              {{ plato.precio }} {{ plato.moneda }}
            </div>

           <!--  <div class="flex block w-1 bg-green-200 p-4 text-right">
              <a
                href="#"
                class=""
                @click.prevent="modalPlatoEliminar(plato, i)"
              >
                <div class="text-yellow-400 flex items-center">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                  </svg>
                </div>
              </a>
            </div> -->

            <div class="flex block" v-if="plato.imagen">
              <img
                :src="
                  '../storage/establecimiento/' +
                  plato.establecimiento_id +
                  '/' +
                  plato.imagen
                "
                :alt="plato.nombre"
                :title="plato.nombre"
                class="w-32 h-32 p-2 rounded-full h-24 w-24 flex items-center justify-center"
              />
            </div>
          </div>
          <!--      {{filteredAlergeno(plato.id)}}-->
          <div class="dish-miniature__content__allergens flex block">
            <img
              v-for="(alergeno, i) in filteredAlergeno(plato.id)"
              v-bind:key="i"
              :src="'../storage/' + alergeno.imagen"
              :alt="alergeno.nombre"
              :title="alergeno.nombre"
              class="w-12 h-12 p-2 mb-2"
            />
          </div>
            
            <div class="font-bold text-yellow-400 text-right ">
               
                  <a
                href="#"
                class=""
                @click.prevent="modalPlatoEliminar(plato, i)">
                Eliminar Plato 
                </a>
              
              
              
              </div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>
import establecimientoCartasAltaPlato from "./Establecimientos/establecimientoCartasAltaPlato.vue";
import Draggable from "vuedraggable";

export default {
  name: "EstablecimientoCartaLista",
  props: ["title", "id", "familia", "platos", "alergenos"],
  components: {
    establecimientoCartasAltaPlato,
    Draggable,
  },

  data() {
    return {
      active: false,
      platosFiltro: {},
      alergenosFiltro: {},
      modalAltaPlato: false,
    };
  },
  methods: {
    modalFamiliaEliminar(id) {
      console.log("modalFamiliaEliminar", id);

      this.$swal
        .fire({
          title: "¿Deseas quitar Subcarta y todos sus Platos ?",
          text: "Una vez eliminada no se puede recuperar!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si",
          cancelButtonText: "No",
        })
        .then((result) => {
          if (result.value) {
            const params = {
              id: id,
              _method: "delete",
            };

            // Enviar petición a axios
            axios
              .post(`/familias/${id}`, params)
              .then((respuesta) => {
                // console.log(respuesta)
                this.$swal.fire(
                  "Subcarta y Platos Asociados Eliminados de Carta",
                  respuesta.data.mensaje,
                  "success"
                );
                //this.inicializarCartas();
                // this.familias.splice(i, 1);

                //TODO aprovecho guardar platos para recargar la carta y no ver lo borrado
                this.$emit("on-guardarPlatos");

                // Eliminar del DOM  simpre borra del padre hacia el hijo
                /*  this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode); */
              })
              .catch((error) => {
                console.log(error);
              });
          }
        });
    },
    modalPlatoEliminar(plato, i) {
      console.log("modalPlatoEliminar", plato);
      let me = this;

      me.$swal
        .fire({
          title: "¿Deseas quitar Plato de la Carta ?",
          text: "Una vez eliminada no se puede recuperar!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si",
          cancelButtonText: "No",
          timer: 3000,
        })
        .then((result) => {
          if (result.value) {
            const params = {
              id: plato.id,
              familia_id: plato.pivot.familia_id,
              _method: "delete",
            };

            // Enviar petición a axios
            axios
              .post(`/platos/${plato.id}`, params)
              .then((respuesta) => {
                // console.log(respuesta)
                /*   me.$swal.fire(
                  "Plato  Eliminado de Carta",
                  respuesta.data.mensaje,
                  "success"
                ); */

                me.$swal.fire({
                  icon: "success",
                  title: "Eliminado Correctamente",
                  showConfirmButton: false,
                  timer: 1500,
                });

                /*    me.$swal('Congratulation!', 'You successfully copy paste this code', 'success', 3000, false); */

                //this.inicializarCartas();
                console.log("modalPlatoEliminar", plato);

                me.platos.splice(i, 1);
                console.log(me.$el, me.$el.parentNode);
                // Eliminar del DOM  simpre borra del padre hacia el hijo
                /*  me.$el.parentNode.parentNode.parentNode.removeChild(me.$el.parentNode.parentNode);  */
              })
              .catch((error) => {
                console.log(error);
              });
          }
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

      console.log("filteredPlato - id", id);

      return this.platos.filter((plato) => {
        //console.log("filtered plato ", plato);

        const compo = plato.pivot.familia_id.toString().toLowerCase();
        console.log("filteredPlato - compo", compo.includes(id));

        //  this.filteredAlergeno(plato);

        return compo.includes(id);
      });
    },

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

    /* plato */

    onGuardarPlato(plato) {
      console.log("onGuardarPlato", this.familia.id);

      /*      plato.pivot["familia_id"] = this.familia.id;

      console.log("onGuardarPlato", plato, plato.pivot.familia_id); */
      this.platos.push(plato);
      this.onCancelarPlato();
      this.$emit("on-guardarPlatos");
    },
    onCancelarPlato() {
      console.log("onCancelarPlato ....");
      this.modalAltaPlato = false;
    },

    modalPlato() {
      this.modalAltaPlato = !this.modalAltaPlato;
    },

    familiaPlatos(familia) {
      // OJO SIN USO
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
  /*   max-height: 36px;
 */
  overflow: hidden;
}
</style>