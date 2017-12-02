<template>
  <div class="" style="width:100%">
    <div class="text-xs-left">
      Account Information Changed!
    </div>
    <div v-html="content" style="width:100%">
    </div>
  </div>
</template>

<script>
    import axios from 'axios';
    export default {
      data (){
        return{
          content : null
        }
      },
      created: function() {
        axios.get('/ajax/get_email_content',{
          params: {

            message_id: this.$route.params.id
          }
        })
        .then(response => {
          // JSON responses are automatically parsed.
          console.log(response);
          this.content = response.data
        })
        .catch(e => {
          // this.errors.push(e)
          console.log(e);
        });
      },
      mounted() {

      },
      props: {

      },
      computed:{
        //
      },
      watch:{
        //
      },
      methods: {
        //
      }
    }
</script>

<style media="screen" scoped>

</style>
