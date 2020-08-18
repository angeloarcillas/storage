// lists => component name
// template => component template
// slot => placeholder

Vue.component("lists", {
  template: `
  <div>
    <ul>
      <item v-for="list in lists" v-text="list"></item>
    </ul>
  </div>`,
  data() {
    return {
      lists: ["one", "two", "three", "four", "five"],
    };
  },
});

Vue.component("item", {
  template: "<li><slot></slot></li>",
});

new Vue({
  el: "#app",
});
