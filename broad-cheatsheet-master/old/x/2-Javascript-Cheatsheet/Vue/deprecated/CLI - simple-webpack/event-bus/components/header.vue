<template>
<header>
  <h1 v-on:click="changeName">{{propName2}}</h1>
</header>
</template>

<script>
//import from main.js
import { bus } from '../main';
export default {
  props: {
    //error handling
    propName2: {
      type: String, //if type == array
    }
  },
  data() {
    return {
      title:"evange zxcxz"
    }
  },
  methods: {
    changeName: function() {
      //$emit vue -> reserver words -> emit data
      //(function-name , value)
      //this.$emit('changeName', 'new title');
      this.propName2='new title';
      //event bus
      bus.$emit('nameChanged', 'new title')
    }
  }
}
</script>

<style lang="css" scoped>
header{
  background-color: #e1e1e1;
}
h1{
  color: #222;
  text-align: center;
}
</style>
