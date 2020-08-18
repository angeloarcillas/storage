<template>
<header>
  <h1 v-on:click="changeName">{{propName2}}</h1>
</header>
</template>

<script>
export default {
  props: {
    //error handling
    propName2: {
      type: String, //if type == array
      required: true //require type -> if not array = stop
    }
  },
  data() {
    return {

    }
  },
  methods: {
    changeName: function() {
      //$emit vue -> reserver words -> emit data
      //(function-name , value)
      this.$emit('changeName', 'new title');
    }
  }
}
</script>

<style lang="css" scoped>
</style>
