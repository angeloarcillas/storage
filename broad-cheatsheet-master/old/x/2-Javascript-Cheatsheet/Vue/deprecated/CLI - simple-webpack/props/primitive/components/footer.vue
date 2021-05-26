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
      copyrights:'alright reserve'
    }
  }
}
</script>

</style>
