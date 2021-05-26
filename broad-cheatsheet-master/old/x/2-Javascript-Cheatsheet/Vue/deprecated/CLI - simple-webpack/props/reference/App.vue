<template>
  <div class="">
    <!--  bind object hero to propName-->
    <app-info v-bind:propName="hero"></app-info>
  </div>
</template>

<script>
//object -> reference type -> global change means change the main data
//string -> primitive type

//create object
import Info from "./components/info.vue";
export default {
  //create components
  components: {
    "app-info": Info,
  },
  data() {
    return {
      //create object - reference type
      hero: [
        { name: "thor", skills: "thunder", show: false },
        { name: "zues", skills: "dark", show: false },
        { name: "ironman", skills: "light", show: false },
        { name: "spiderman", skills: "fire", show: false },
        { name: "loki", skills: "ice", show: false },
      ],
    };
  },
};
</script>

<style></style>
