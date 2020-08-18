Vue.component('message',{
  template: `
  <div v-show="isVisible">
  <h2>{{ title }}  <button @click="isVisible = false"> &times;</button></h2>
  <p>{{ body }}</p>
  </div>`,
  props: ['title','body'],
  data() {
    return {
      isVisible: true
    }
  }
})

new Vue({
  el:"#app"
})