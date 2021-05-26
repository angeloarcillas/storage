<template lang="html">
   <!-- v-theme -> custom directive
   :columm -> args -->
<div class="wrapper" >
  <h1>blogs</h1>
  <input type="text" v-model="search" placeholder="search..">
    <!-- <div v-for="x in blogs" class="single-blog" v-theme:column="''"> "''" -> tell its a string -->
  <div v-for="x in filterBlog" class="single-blog" >
      <!-- x.title | -> to add filters
      to-uppercase -> filter -->
    <h2 v-rainbow>{{x.title | toUppercase}}</h2>
    <article>{{x.body | snippet}}</article>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      blogs:[],
      theme:'narrow',
      search:''
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
  },
  computed:{
    //array value of blogs.filter(value of x) => array {return if any search match x.title}
    filterBlog:function(){
      return this.blogs.filter((x) => {
        return x.title.match(this.search);
      });
    }
  },
  filters:{
    //other
    // 'to-Uppercase':function(value){
    //   return value.toUpperCase();
    // },
    toUppercase(value){
      return value.toUpperCase();
    },
    snippet(value)
    {
        return value.slice(0,100) + '...';
    }
  },
  directives:{
    'rainbow':{
      bind(el,binding,vnode){
        el.style.color = "#" + Math.random().toString().slice(3,9);
      }
    }
  }
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
