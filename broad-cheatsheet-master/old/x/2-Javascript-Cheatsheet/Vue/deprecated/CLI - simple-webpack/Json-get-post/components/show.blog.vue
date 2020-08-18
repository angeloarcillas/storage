<template lang="html">
<div class="">
  <h1>blogs</h1>
  <div v-for="x in blogs" class="single-blog">
    <h2>{{x.title}}</h2>
    <article>{{x.body}}</article>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      blogs:[]
    }
  },
  methods:{

  },
  created(){
    // htttp.{type}(json-url),{data}.then(function(data){
    //   action
    // });
    this.$http.get('https://jsonplaceholder.typicode.com/posts').then(function(data){
      console.log(data);
      // blogs -> json data slice(0,5) -> limit to 5 data
      this.blogs = data.body.slice(0,5);
    })
    ///////////// OTHER METHOD /////////////
    // fetch('https://jsonplaceholder.typicode.com/posts')
    // .then(response => response.json())
    // .then(data)=>
    // {
    //   console.log(data)
    // }
  }
}
</script>

<style lang="css" scoped>
.single-blog{
  background-color: #e1e1e1;
  max-width: 80%;
  margin: 0 auto;
}
</style>
