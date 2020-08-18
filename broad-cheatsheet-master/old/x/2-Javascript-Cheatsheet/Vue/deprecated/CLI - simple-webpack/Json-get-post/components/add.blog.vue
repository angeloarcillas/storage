<template lang="html">
<div class="add-blog">
  <form v-if="!submitted">
    <h1>Add blog</h1>
    <div class="form-inputs">
      <input type="text" name="" v-model.lazy="blog.title" placeholder="Title..">
      <input type="text" name="" v-model.lazy="blog.info" placeholder="Info..">
    </div>
    <div class="form-checkbox">
      <label>Hero 1:</label>
      <input type="checkbox" value="hero 1" v-model="blog.hero">
      <label>Hero 2:</label>
      <input type="checkbox" value="hero 2" v-model="blog.hero">
      <label>Hero 3 :</label>
      <input type="checkbox" value="hero 3" v-model="blog.hero">
    </div>
    <div class="form-selecbox">
      <select v-model="blog.author">
        <option v-for="x in authors">{{x}}</option>
      </select>
    </div>
    <button v-on:click.prevent="post">Send</button>
  </form>
  <div class="" v-if="submitted">
    <h3>submitted</h3>
  </div>
  <div class="form-data">
    <h1>Preview blog</h1>
    <p>Title:{{blog.title}}</p>
    <p>Info:</p>
    <p>{{blog.info}}</p>
    <p>Heros:</p>
    <ul>
      <li v-for="x in blog.hero">{{x}}</li>
    </ul>
    <p>Author:{{blog.author}}</p>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      blog:{
        title:"",
        info:"",
        hero:[],
        author:""
      },
        authors:['one','two','three'],
        submitted:false
    }
  },
  methods:{
    post:function(){
      // htttp.{type}(json-url),{data}.then(function(data){
      //   action
      // });
      this.$http.post('https://jsonplaceholder.typicode.com/posts',{
        title:this.blog.title,
        body:this.blog.info,
        userId:1
      }).then(function(data){
        //log data -> or do action here
        console.log(data);
        this.submitted = true;
      });
    }
  }
}
</script>

<style lang="css" scoped>
</style>
