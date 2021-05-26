<template>
  <div>
    <!-- COMPONETS -->
    <app-header></app-header>
    <app-info></app-info>
    <app-footer></app-footer>
  </div>
</template>

<script>
//create object
import Header from "./components/header.vue";
import Footer from "./components/footer.vue";
import Info from "./components/info.vue";

export default {
  components: {
    //create components
    "app-header": Header,
    "app-footer": Footer,
    "app-info": Info,
  },
  data() {
    return {};
  },
};
</script>
