<template lang="html">
<div class="add-blog">
  <h2>Register here!</h2>
  <form class="" action="index.html" method="post">
    <label>Blog Title:</label><br>

    <!-- v-model bind -> input-value (.lazy -> not auto show /shows data when finished typing) -->
    <input type="text"placeholder="Title.." v-model.lazy="blog.title"><br>
    <label> Blog Area:</label><br>
    <textarea placeholder="This is a pharagraph" rows="8" cols="80" v-model.lazy="blog.info"></textarea><br>
    <button type="button" name="button">Save</button>
  </form>
  <div class="">
    <h3>Preview blog</h3>
    <p>Blog Title:{{blog.title}}</p>
    <p>Blog Info: {{blog.info}}</p>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      blog:{
          title:'',
          info:''
      }
    }
  }
}
</script>

<style lang="css" scoped>
</style>
