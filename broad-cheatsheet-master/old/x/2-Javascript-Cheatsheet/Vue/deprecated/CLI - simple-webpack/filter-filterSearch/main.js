import Vue from 'vue'
import App from './App.vue'
//create object then import vue-resource
import VueResource from 'vue-resource'
//use VueResource
Vue.use(VueResource);

//filters
Vue.filter('to-uppercase',function(value){ // to-uppercase -> filter name | value -> var value 
  return value.toUpperCase(); //return uppercase string
});
Vue.filter('snippet',function(value){
  return value.slice(0,100) + '...';
})

new Vue({
  //select id app from index
  el: '#app',
  //render from object App
  render: h => h(App)
})
