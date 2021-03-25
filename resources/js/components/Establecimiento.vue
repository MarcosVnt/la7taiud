  <template>


<!--   LISTA DE SUBCARTAS DE ESTABLECIMIENTO Y CARTA EN CUESTION
 -->
 
 <div id="appvnt" class="container mx-40 bg-white border-grey-light border mt-20">
    <accordion title="Trevor Belmont">
      <p class="pb-5">Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

      <p class="pb-5">Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
    </accordion>
    <accordion title="Alucard">
      <p class="pb-5">Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

      <p class="pb-5">Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
    </accordion>    
        <accordion title="Sypha Belnades">

             <div class="mb-5">
        <label 
            for="descripcion" 
            class="block text-gray-700 text-sm mb-2"
        >Descripcion:</label>

        <input 
            id="descripcion" 
            type="text" 
            class="p-3 bg-gray-100 rounded form-input w-full  @error('password') is-invalid @enderror" 
            name="descripcion"
            placeholder="Descripción de la publicidad"
          
        >

      
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                <strong class="font-bold">Error!</strong>
            </div>
    </div>
      <p class="pb-5">Lorem ipsum dolor sit amet, ut alii voluptaria est, ad illum inimicus deterruisset eam. His eu bonorum adipisci definiebas, no vis nostrud conclusionemque. Ad his virtute accusata, pro habemus singulis temporibus ut, ne bonorum dolores euripidis quo. No nam amet erant intellegebat. Rationibus instructior id pri, vis case abhorreant ea, id sea meis feugiat.</p>

      <p class="pb-5">Ut vel percipit facilisi, sea partem veritus mandamus eu, at debet deleniti eos. Iudico suscipit mel ut. Per ad habeo sadipscing concludaturque. Pri lorem fastidii in, accusam honestatis signiferumque est ut, ea eos omnium senserit reprehendunt. Eu est nibh invenire.</p>
    </accordion>  
  </div><!-- #app -->


</template>



<script>

import accordion from './accordion'

export default {
    name: 'Establecimiento',

    components: {
        accordion
      
    },
  
    data: function() {
        return {
       

        }
    },
    methods: {
         },
    computed: {
          }
}
</script>
<style>

  background-color:#f1f5f8;


</style>