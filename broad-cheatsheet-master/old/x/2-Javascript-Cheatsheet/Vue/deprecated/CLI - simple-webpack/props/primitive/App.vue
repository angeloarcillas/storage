<template>
  <div>
    <!-- COMPONETS -->
    <app-header v-bind:propName2="title"></app-header>
    <app-footer v-bind:propName2="title"></app-footer>
  </div>
</template>

<script>
//object -> reference type
//string -> primitive type -> scope change means change the scope data not the main data

//create object
import Header from "./components/header.vue";
import Footer from "./components/footer.vue";
import Info from "./components/info.vue";

export default {
  //create components
  components: {
    "app-header": Header,
    "app-footer": Footer,
  },
  data() {
    return {
      title: "evangel laclairs",
    };
  },
};
</script>

<style></style>
