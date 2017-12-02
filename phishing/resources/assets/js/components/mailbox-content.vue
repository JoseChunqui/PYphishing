<template>
  <table class="mailbox-table">
    <tbody>
      <router-link v-for="(message,index) in dataMessages" tag="tr" style="cursor:pointer" :key="message.id" :to="`/all/${message.id}`">
        <td style="padding-left : 11px">
          <div class="g-checkbox" role="checkbox"  aria-checked="false" tabindex="-1" @click="emails_checkbox.splice(index, 1, ! emails_checkbox[index])">
            <div v-if="emails_checkbox[index]" class="g-checkbox-in">
            </div>
          </div>
        </td>
        <td>
        </td>
        <td style="width:12%;padding-top: 10px;padding-bottom:10px; ">
          {{ email_from(message.from) }}
        </td>
        <td style="width:78%;">
          {{ message.subject }}
          <strong class="red" v-if="phishing(message.is_phishing)" dark>Es pishing</strong>
          <strong class="green" v-if="! phishing(message.is_phishing)" dark>Es Ham</strong>
        </td>
        <td>
          {{ message.processed | formatDate}}
        </td>
      </router-link>
    </tbody>
  </table>
</template>

<script>
    export default {
      data (){
        return{
          emails_checkbox: []
        }
      },
      created: function() {
        const vm = this;
        vm.dataMessages.forEach(function(elem){
          vm.emails_checkbox.push(false);
        })
      },
      mounted() {
        console.log(this.dataMessages);
      },
      props: {
        dataMessages: Array
      },
      computed:{
      },
      watch:{
        //
      },
      methods: {
        phishing: function(veredict){
          if (veredict == 'ham') {
            return false
          }else {
            return true
          }
        },
        email_from: function(from_header){
          return from_header.split('<')[0].replace(/['"]+/g, '')
        },
        routeGoTo: function(message_id){
          return '/all/'+ message_id
        }

      }
    }
</script>

<style media="screen" scoped>
.regular-checkbox {
  background-color: #fafafa;
  border: 1px solid #cacece;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
  padding: 7px;
  border-radius: 3px;
  display: inline-block;
  position: relative;
}
.g-checkbox{
  -webkit-border-radius: 0;
  border-radius: 0;
  background-color: rgba(255,255,255,.05);
  border: 1px solid #c6c6c6;
  border: 1px solid rgba(155,155,155,.57);
  font-size: 1px;
  height: 13px;
  margin: 0 4px 0 1px;
  outline: 0;
  vertical-align: text-bottom;
  width: 13px;
  cursor: default;
}
.g-checkbox-in{
  background: url(//ssl.gstatic.com/ui/v1/menu/checkmark.png) no-repeat -5px -3px;
  height: 15px;
  width: 15px;
  left: 0px;
  position: relative;
  top: -3px;
  outline: 0px;
}
</style>
