<template>
  <table class="mailbox-table">
    <tbody>
      <tr v-for="message in dataMessages">
        <td>
          <input type="checkbox" name="">
        </td>
        <td>
        </td>
        <td style="width:12%;padding-top: 10px;padding-bottom:10px; ">
          {{ message.from }}
        </td>
        <td style="width:78%;">
          {{ message.subject }}
        </td>
        <td>
          {{ message.processed | formatDate}}
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
    export default {
      data (){
        return{
          //
        }
      },
      created: function() {
        //
      },
      mounted() {
        console.log(this.dataMessages);
      },
      props: {
        dataMessages: Array
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
