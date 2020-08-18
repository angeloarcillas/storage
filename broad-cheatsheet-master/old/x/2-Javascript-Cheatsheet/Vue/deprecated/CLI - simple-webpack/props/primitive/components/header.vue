<template>
  <header>
    <h1 v-on:click="changeName">{{ propName2 }}</h1>
  </header>
</template>

<script>
export default {
  props: {
    //error handling
    propName2: {
      type: String, //if type == array
      required: true, //require type -> if not array = stop
    },
  },
  data() {
    return {};
  },
  methods: {
    //change title
    changeName: function () {
      this.propName2 = "new title";
    },
  },
};
</script>

<style lang="css" scoped>
header {
  background-color: #e1e1e1;
}
h1 {
  color: #222;
  text-align: center;
}
</style>
