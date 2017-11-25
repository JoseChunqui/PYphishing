/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
window.Vuetify = require('vuetify');
window.VueScrollTo = require('vue-scrollto');

window.VeeValidate = require('vee-validate');
 const config = {
  errorBagName: 'vee_errors', // change if property conflicts.
  fieldsBagName: 'fields',
  delay: 0,
  locale: 'en',
  dictionary: null,
  strict: true,
  classes: false,
  classNames: {
    touched: 'touched', // the control has been blurred
    untouched: 'untouched', // the control hasn't been blurred
    valid: 'valid', // model is valid
    invalid: 'invalid', // model is invalid
    pristine: 'pristine', // control has not been interacted with
    dirty: 'dirty' // control has been interacted with
  },
  events: 'input|blur',
  inject: true,
  validity: false,
  aria: true
};


Vue.use(VeeValidate, config);
Vue.use(VueScrollTo);
Vue.use(Vuetify);

Vue.component('example', require('./components/Example.vue'));
Vue.component('vue-navbar', require('./components/navbar.vue'));
Vue.component('vue-dockmail', require('./components/dockmodal-gmail.vue'));
Vue.component('vue-mailbox-content', require('./components/mailbox-content.vue'));
import moment from 'moment'

Vue.filter('formatDate', function(value) {
  // if (value) {
  //   return moment(String(value)).format('MM/DD/YYYY hh:mm')
  // }
  if (value) {
    var datei = moment(new Date(), 'MM/DD/YYYY')
    var iscurrentDate = datei.isSame(moment(new Date(), 'MM/DD/YYYY'), "day");
    if(iscurrentDate)
    {
      return moment(String(value)).format('hh:mm')
    }else{
      return moment(String(value)).format('MM/DD/YYYY')
    }
  }
});

const app = new Vue({
    el: '#app'
});
