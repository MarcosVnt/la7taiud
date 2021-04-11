<template>
  <div>
    <div
      class="mb-3 content-start md:content-around justify-between items-center bg-green-200 bg-white border border-white shadow rounded-lg cursor-move"
    >
      <!--   <div class="flex-auto w-full">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Nombre Plato : </label
        >
        <input
          v-model="plato.nombre"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="nombre"
          placeholder="Nombre Plato"
        />
   
        <label
          class="pt-10 block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Descripción : </label
        >
        <input
          v-model="plato.descripcion"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="descripcion"
          placeholder="Descripcion Plato"
        />
      </div> -->

      <section class="my-8 pr-4">
        <div class="m-2 w-full">
          <div class="component flex max-auto p3">
            <div class="w-full rounded bg-gray-100 relative p-4">
              <div class="flex justify-between">
                <div class="flex">
                  <div>
                    <div
                      class="h-12 w-12 rounded-full bg-cover"
                      style="background-image: url(../img/Vile_m.JPG)"
                    ></div>
                  </div>

                  <div class="ml-4">
                    <div class="font-bold">Indique Nombre del Plato</div>
                    <div class="mt-1 text-xs text-gray-500">
                      y Observaciones si es necesario {{familia_id}}
                    </div>
                  </div>
                </div>
                <div class="text-yellow-400 flex items-center">
                  <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M12 2L15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2z"
                    ></path></svg
                  ><span class="text-xl font-bold ml-2"></span>
                </div>
              </div>
              <div class="my-6 border-b"></div>
              <div class="flex-auto w-full">
                <label
                  class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
                  >Nombre Plato :
                </label>
                <input
                  v-model="plato.nombre"
                  class="w-full shadow-inner p-4 border-0 text-xs"
                  type="text"
                  name="nombre"
                  placeholder="nombre"
                />
              </div>

              <div class="flex-auto w-full">
                <label
                  class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
                  >Descripcion :
                </label>
                <input
                  v-model="plato.descripcion"
                  class="w-full shadow-inner p-4 border-0 text-xs"
                  type="text"
                  name="descripcion"
                  placeholder="descripcion"
                />
              </div>

              <div class="flex-auto w-full">
                <label
                  class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
                  >Precio :
                </label>
                <input
                  v-model="plato.precio"
                  class="w-full shadow-inner p-4 border-0 text-xs"
                  type="number"
                  placeholder="1.0"
                  step="0.50"
                  min="0"
                  max="10"
                  name="descripcion"
                />
                <label
                  class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
                  >Moneda :
                </label>
                <input
                  v-model="plato.moneda"
                  class="w-full shadow-inner p-4 border-0 text-xs"
                  type="text"
                  name="descripcion"
                  placeholder="descripcion"
                />
              </div>

              <div class="max-w-md mx-auto shadow-xl rounded my-8">
                <div class="flex justify-center mb-10">
                  <button
                    class="flex items-center bg-green-100 shadow-md border border-gray-200 rounded px-4 py-2 mr-10"
                    @click.prevent="guardar"
                  >
                    <div class="text-indigo-700">Aceptar</div>
                  </button>
                  <button
                    class="flex items-center bg-red-100 shadow-md border border-gray-200 rounded px-4 py-2 mr-2"
                    @click.prevent="cancelar"
                  >
                    <div class="text-indigo-700">Cancelar</div>
                  </button>
                </div>
              </div>

              <!--    <div class="text-sm">A Review card written completely with utlities from Tailwind CSS. This is just some filler text to make the card look populated. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat !</div>-->
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- inicio -->
</template>

<script>
export default {
   name: "EstablecimientoCartasAltaPlato",
  props: ["familia_id"],
  
  data() {
    return {
      plato: {},
    };
  },
  methods: {
    cancelar() {
      this.$emit("on-CancelarPlato");
    },
    guardar() {
      console.log("guardar", this.plato);

      if (!this.plato.nombre) {
        this.$swal.fire({
          title: "Error",
          text: "Nombre Plato Obligatorio",
          icon: "warning",
        });
        return;

        if (!this.plato.precio) {
          this.$swal.fire({
            title: "Error",
            text: "Nombre Precio Obligatorio",
            icon: "warning",
          });
          return;
        }
      }

      // Enviar a axios
      const params = {
        nombre: this.plato.nombre,
        orden: this.plato.orden,
        descripcion: this.plato.descripcion,
        precio: this.plato.precio,
        moneda: this.plato.moneda,
        familia_id: this.familia_id,
      };

      axios
        .post("/platos/store/", params)
        .then((respuesta) => {
          console.log("respuesta alta plato store", respuesta);

          this.$emit("on-GuardarPlato", respuesta.data.plato);

          // Eliminar del DOM  simpre borra del padre hacia el hijo
          //this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>