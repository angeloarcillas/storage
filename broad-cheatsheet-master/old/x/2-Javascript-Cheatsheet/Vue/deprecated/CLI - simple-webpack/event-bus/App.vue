<template>
  <div>
    <app-header
      v-bind:propName2="title"
      v-on:changeName="updateTitle($event)"
    ></app-header>
    <app-footer v-bind:propName2="title"></app-footer>
  </div>
</template>

<script>
//create object
import Header from "./components/header.vue";
import Footer from "./components/footer.vue";

export default {
  //create components
  components: {
    "app-info": Info,
    "app-header": Header,
    "app-footer": Footer,
  },
  data() {
    return {
      title: "foo bar",
    };
  },
  methods: {
    //updatedTitle -> $event -> value
    updateTitle: function (updatedTitle) {
      //change updatedTitle value
      this.title = updatedTitle;
    },
  },
};
</script>

<style></style>
