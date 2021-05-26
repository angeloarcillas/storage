<template lang="html">
  <div id="heros">
    <ul>
      <!--  LOOP ARRAY propName -> from script props -->
      <li v-for="x in propName" v-on:click="x.show = !x.show">
        <h2>{{ x.name }}</h2>
        <h3 v-show="x.show">{{ x.skills }}</h3>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  //props -> data binding? or simillar
  //props:['propName'], //simple
  props: {
    //error handling
    propName: {
      type: Array, //if type == array
      required: true, //require type -> if not array = stop
    },
  },
  data() {
    return {};
  },
};
</script>

<style></style>
