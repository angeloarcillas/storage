import Vue from 'vue'
import App from './App.vue'
//create object then import vue-resource
import VueResource from 'vue-resource'
//use VueResource
Vue.use(VueResource);


new Vue({
  //select id app from index
  el: '#app',
  //render from object App
  render: h => h(App)
})
