<template lang="html">
  <div class="wrapper" >
    <h1>blogs</h1>
    <input type="text" v-model="search" placeholder="search..">
    <div v-for="blog in filterBlog" class="single-blog" >
      <h2 >{{ blog.title }}</h2>
    </div>
  </div>
</template>

<script>
import SearchMixins from '../mixins/search.mixins'

export default {
  data(){
    return {
      blogs:[],
      search:''
    }
  },
  created(){
    this.$http.get('https://jsonplaceholder.typicode.com/posts').then(function(data){
      console.log(data);
      this.blogs = data.body.slice(0,5);
    })
  },
  mixins:[SearchMixins]
}
</script>

<style lang="css" scoped>
.wrapper {
  width: 80%;
  margin: 0 auto;
  text-align: center;
}
.single-blog{
  background-color: #e1e1e1;
  max-width: 80%;
  margin: 0 auto;
}
</style>
