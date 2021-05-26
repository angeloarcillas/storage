<template lang="html">
  <footer>
    <p>{{copyrights}} {{propName2}}</p>
  </footer>

</template>

<script>
export default {
  props:{
    //error handling
    propName2:{
      type:String, //if type == array
      required:true //require type -> if not array = stop
    }
  },
  data(){
    return {
      copyrights:'alright reserver'
    }
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
