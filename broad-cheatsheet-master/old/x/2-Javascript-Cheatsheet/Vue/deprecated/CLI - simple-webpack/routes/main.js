import Vue from 'vue'
import App from './App.vue'
import resource from 'vue-resource'

//add vue-router | to add route you need to npm install router --save
import router from 'vue-router'

//import route.js
import routes from './route'

//use vue-resource
Vue.use(resource);

//user vue-router
Vue.use(router);

const router = new Router({
routes: routes,
mode: 'history'
});

new Vue({
  el: '#app',
  render: h => h(App),
  router: router //add router to system
})
