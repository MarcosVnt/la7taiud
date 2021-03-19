<template>
   <div class="">
                <div class="tab__header m-3">

                 
                    <a href="#" class="tab__link bg-green-500 text-red p-4 block bg-blue-dark hover:bg-blue-darker no-underline  border-b-2 border-red flex justify-between" @click.prevent="active = !active">
                        <strong>{{title}}</strong>
                        <span class="down-Arrow" v-show="!active">&#9660;</span>
                        <span class="up-Arrow" v-show="active">&#9650;</span>
                    </a>
                </div>
                <div class="tab__content p-2" v-show="active"><slot /></div>            
            </div>
</template>
<script>
export default {
     props: [
    'title'
  ],
  data() {
    return {
      active: false,
    }
  },
    
}
</script>