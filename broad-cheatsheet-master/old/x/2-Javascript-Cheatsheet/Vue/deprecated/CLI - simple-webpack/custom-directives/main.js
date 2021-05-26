import Vue from "vue";
import App from "./App.vue";

import resource from "vue-resource";
Vue.use(resource);

//custom directives
Vue.directive("rainbow", {
  //bind(select,bind,virtual node )
  bind(el, binding, vnode) {
    //select.style.color
    el.style.color = "#" + Math.random().toString().slice(3, 9); // random color
  },
});

Vue.directive("theme", {
  bind(el, binding, vnode) {
    //binding.value -> v-theme="value"
    if (binding.value == "wide") {
      //maxWidth -> max-width
      el.style.maxWidth = "1200px";
    } else if (binding.value == "narrow") {
      el.style.maxWidth = "500px";
    }
    //.args - argument (like :oclick)
    if (binding.arg == "column") {
      el.style.background = "#e1e1e1";
      el.style.padding = "20px";
    }
  },
});

new Vue({
  el: "#app",
  render: (h) => h(App),
});
