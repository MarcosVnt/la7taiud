<template>
    <span
        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full "
        :class="claseEstadoPublicidad()"
        @click="cambiarEstado"
        :key="estadoPublicidadData"
    >
       {{ estadoPublicidad }}
    </span>
</template>

<script>
export default {
    props:['estado', 'publicidadId'],
    mounted() {
        this.estadoPublicidadData = Number(this.estado)
    },
    data: function() {
        return {
            estadoPublicidadData: null
        }
    },
    methods: {
        claseEstadoPublicidad() {
            return this.estadoPublicidadData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        },
        cambiarEstado() {
            if(this.estadoPublicidadData === 1) {
                this.estadoPublicidadData = 0;
            } else {
                this.estadoPublicidadData = 1;
            }

            // Enviar a axios
            const params = {
                estado: this.estadoPublicidadData
            }
            axios
                .post('/publicidad/' + this.publicidadId, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(error))
        }
    },
    computed: {
        estadoPublicidad() {
            return this.estadoPublicidadData === 1 ? 'Activa' : 'Inactiva'
        }
    }
}
</script>
