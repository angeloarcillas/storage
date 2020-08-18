// @close           # custom event
// $emit('close')   # emit/call event

Vue.component('modal', {
  template: `
  <div>
  <h2>{{ title }}  <button @click="$emit('close')"> &times;</button></h2>
  <p>{{ body }}</p>
  </div>
  `,
  props: ['title','body']
})

new Vue({
  el: "#app",
  data: {
    showModal: false
  }
})