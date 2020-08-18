<template lang="html">
  <footer>
    <p>{{copyrights}} {{ propName2 }}</p>
  </footer>

</template>

<script>
//import from main.js
import { bus } from '../main';
export default {
  props:{
    //error handling
    propName2:{
      type:String, //if type == array

    }
  },
  data(){
    return {
      copyrights:'alright reserve'
    }
  },
  created() {
    //its like passing data
    //event from header
    //if emited then on =>event bus(var , value(data) )
    bus.$on('nameChanged',(data) => {
      this.propName2=data;
    })
  }
}
</script>

<style lang="css" scoped>
footer {
  background-color: #222;
  padding: 6px;
}
p {
  color: #e1a1e1;
  text-align: center;
}
</style>
