<template>
  <div>


    <button
      v-if="isDisabled"
      href="javascript:void(0)"
      @click="editar = true"
      class="text-xs font-bold uppercase px-5 py-3 hover:bg-green-800 shadow-lg rounded block leading-normal text-white bg-green-600"
    >
      EDITAR
    </button>

    <button
      v-else
      href="javascript:void(0)"
      @click="guardarDatos()"
      class="text-xs font-bold uppercase px-5 py-3 hover:bg-green-800 shadow-lg rounded block leading-normal text-white bg-green-600"
    >
      GUARDAR
    </button>


    <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
      <div class="mb-4">
        <label class="block uppercase tracking-wide text-xs font-bold"
          >Nombre Comercial</label
        >
        <input
          :disabled="isDisabled"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          v-model="esta.nombre_comercial"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="nombre_comercial"
          placeholder="Nombre Comercial"
        />
      </div>

      <div class="md:flex mb-4">
        <div class="md:flex-1 md:pr-3">
          <label
            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
            >CIF</label
          >
          <input
            :disabled="isDisabled"
            v-model="esta.cif"
            :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
            class="w-full shadow-inner p-4 border-0"
            type="text"
            name="cif"
            placeholder="CIF"
          />
          <span class="text-xs mb-4 font-thin">Campo Obligatorio.</span>
        </div>

        <div class="md:flex-1 md:pl-3">
          <label
            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
            >Nombre Fiscal</label
          >
          <input
            :disabled="isDisabled"
            :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
            v-model="esta.nombre_fiscal"
            class="w-full shadow-inner p-4 border-0"
            type="text"
            name="nombre_fiscal"
            placeholder="Nombre Fiscal"
          />
        </div>
      </div>

      <div class="mb-4">
        <label class="block uppercase tracking-wide text-xs font-bold"
          >Dirección</label
        >
        <input
          :disabled="isDisabled"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          v-model="esta.direccion"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="direccion"
          placeholder="Dirección"
        />
      </div>

      <div class="md:flex mb-4">
        <div class="md:flex-1 md:pr-3">
          <label
            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
            >Código Postal</label
          >
          <input
            :disabled="isDisabled"
            v-model="esta.codigo_postal"
            :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
            class="w-full shadow-inner p-4 border-0"
            type="text"
            name="lat"
            placeholder="codigo_postal"
          />
        </div>
        <div class="md:flex-1 md:pr-3">
          <label
            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
            >Poblacion</label
          >
          <input
            :disabled="isDisabled"
            v-model="esta.poblacion"
            :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
            class="w-full shadow-inner p-4 border-0"
            type="text"
            name="lat"
            placeholder="poblacion"
          />
        </div>
        <div class="md:flex-1 md:pl-3">
          <label
            class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
            >Provincia</label
          >
          <input
            :disabled="isDisabled"
            v-model="esta.provincia"
            :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
            class="w-full shadow-inner p-4 border-0"
            type="text"
            name="lon"
            placeholder="provincia"
          />
        </div>
      </div>
    </div>


    <div class="md:flex mb-4">
      <div class="md:flex-1 md:pr-3">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >WEB</label
        >
        <input
          :disabled="isDisabled"
          v-model="esta.web"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="WEB"
          placeholder="WEB"
        />
      </div>

      <div class="md:flex-1 md:pl-3">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Email</label
        >
        <input
          :disabled="isDisabled"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          v-model="esta.email"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="email"
          placeholder="Email"
        />
      </div>
    </div>


    <div class="md:flex mb-4">
      <div class="md:flex-1 md:pr-3">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Teléfono</label
        >
        <input
          :disabled="isDisabled"
          v-model="esta.telefono"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="telefono"
          placeholder="Teléfono"
        />
      </div>

      <div class="md:flex-1 md:pl-3">
        <label
          class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold"
          >Móvil</label
        >
        <input
          :disabled="isDisabled"
          :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
          v-model="esta.movil"
          class="w-full shadow-inner p-4 border-0"
          type="text"
          name="movil"
          placeholder="Móvil"
        />
      </div>
    </div>


    <div class="mb-4">
      <label class="block uppercase tracking-wide text-xs font-bold"
        >Contacto</label
      >
      <input
        :disabled="isDisabled"
        :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
        v-model="esta.contacto"
        class="w-full shadow-inner p-4 border-0"
        type="text"
        name="contacto"
        placeholder="Contacto"
      />
    </div>


    <div class="mb-4">
      <label class="block uppercase tracking-wide text-xs font-bold"
        >Observaciones</label
      >
      <input
        :disabled="isDisabled"
        :class="{ 'opacity-25 cursor-not-allowed': isDisabled }"
        v-model="esta.observaciones"
        class="w-full shadow-inner p-4 border-0"
        type="text"
        name="observaciones"
        placeholder="observaciones"
      />
    </div>


    <div class="">
      <div class="">
        <img v-if="imagenEstablecimiento"
          class="object-contain md:object-scale-down"

         :src="'../storage/establecimiento/'+esta.id+'/'+imagenEstablecimiento" 
        />
          <img v-else
          class="object-contain md:object-scale-down"

         :src="'../img/Vile_m.JPG'" 
        />

      </div>
 <!-- :src="'../img/Vile_m.JPG'" -->
<!--       <img class="object-contain md:object-scale-down" :src="esta.imagen" />-->   
    </div>

    <button
      v-if="isDisabled"
      href="javascript:void(0)"
      @click="editar = true"
      class="text-xs font-bold uppercase px-5 py-3 hover:bg-green-800 shadow-lg rounded block leading-normal text-white bg-green-600"
    >
      EDITAR
    </button>

    <button
      v-else
      href="javascript:void(0)"
      @click="guardarDatos()"
      class="text-xs font-bold uppercase px-5 py-3 hover:bg-green-800 shadow-lg rounded block leading-normal text-white bg-green-600"
    >
      GUARDAR
    </button>

   <!--  <img
      class="w-full h-56 object-cover object-center"
      :src="esta.imagen"
      alt="avatar"
    /> -->


 <foto-obra-dropzone
                    @finalizar="finalizarSubirFotos"              
                    :establecimiento ="esta">
                </foto-obra-dropzone>



<!--     <div class="flex items-center px-6 py-3 bg-gray-900">
      <svg class="h-6 w-6 text-white fill-current" viewBox="0 0 20 20">
        <path
          d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"
        ></path>
      </svg>
      <h1 class="mx-3 text-white font-semibold text-lg">
        {{ esta.codigo_postal }} Public Repos
      </h1>
    </div>

 

    <div class="py-4 px-6">
      <h1 class="text-2xl font-semibold text-gray-800">
        {{ esta.nombre_comercial }}
      </h1>
      <p class="py-2 text-lg text-gray-700">{{ esta.nombre_fiscal }}</p>
      <div class="flex items-center mt-4 text-gray-700">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path
            d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"
          ></path>
        </svg>
        <h1 class="px-2 text-sm">{{ esta.movil }} Telf.Móvil</h1>
      </div>
      <div class="flex items-center mt-4 text-gray-700">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path
            d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"
          ></path>
        </svg>
        <h1 class="px-2 text-sm">{{ esta.direccion }}</h1>
      </div>
      <div class="flex items-center mt-4 text-gray-700">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path
            d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825"
          ></path>
        </svg>
        <h1 class="px-2 text-sm">{{ esta.email }}</h1>
      </div>
      <div class="bg-indigo-300 ...">
        <img
          class="object-contain md:object-scale-down"
          :src="'../img/Vile_m.JPG'"
        />
      </div>
    </div>

    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">Nombre Comercial</div>
      <p class="text-grey-darker text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus
        quia, nulla! Maiores et perferendis eaque, exercitationem praesentium
        nihil.
      </p>
    </div>

    <div class="mb-5 ml-5">
      <label for="NombreComercial" class="block text-gray-700 text-sm mb-2 mr-2"
        >Nombre Comercial:</label
      >

      <div
        class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"
      ></div>

      <input type="hidden" name="NombreComercial" id="NombreComercial" />
    </div>
    <div class="mb-5 ml-5">
      <label for="nombreFiscal" class="block text-gray-700 text-sm mb-2 mr-2"
        >Nombre Fiscal:</label
      >

      <div
        class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"
      ></div>

      <input type="hidden" name="nombreFiscal" id="nombreFiscal" />
    </div> -->
  </div>
</template>



<script>
import FotosObraDropzone from "../Fotos/FotoObraDropzone.vue";

export default {
  name: "EstablecimientoDatos",
  props: ["esta"],

  components: {},

  data: function () {
    return {
      editar: false,
      imagenEstablecimiento :"",

      user: [
        {
          avatar_url: "../img/Vile_m.JPG",
          name: "nombre",
          followers: "23l",
          location: "locaction",
          bio: "bio",
          public_repos: "public_repos",
          blog: "blog",
        },
      ],
    };
  },
  methods: {

    finalizarSubirFotos(fin,nombre){

        console.log('finalizar Subir Fotos..',this.esta,fin, nombre, this.imagenEstablecimiento);
           this.imagenEstablecimiento= nombre;

            console.log('finalizar subir fotos...',this.imagenEstablecimiento);


    },
    guardarDatos() {
      this.editar = false;
      console.log("guardarDatos", this.esta.id);
      const params = {
        estado: this.esta,
        //ENVIA TODO
      };

      axios

        .post(`/establecimientos/update/${this.esta.id}`, params)

        .then((respuesta) => console.log(respuesta))
        .catch((error) => console.log(error));
    },

    enableEdit: function (index) {
      this.editar = true;
      this.$nextTick(() => {
        let input = this.$refs.nombreC;
        input.focus();
      });
    },
    disableEdit: function (index) {
      this.editar = false;
    },
  },
  computed: {
    isDisabled: function () {
      return !this.editar;
    },
  },
  created() {
    console.log("created : ESTABLECIMIENTO DATOS ", this.esta);
    this.imagenEstablecimiento= this.esta.imagen;
  },
};
</script>
<style>
</style>