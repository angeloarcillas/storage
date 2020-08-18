<template lang="html">
<div class="add-blog">
  <label>SELECT BOX</label>

  <select v-model="blog.author">
    <!-- loop options to store at v-model -> blog.author
    remove value="" -->
    <option  v-for="x in authors">{{x}}</option>
  </select>

  <p>author:{{blog.author}}</p>
</div>
</template>

<script>
export default {
  data(){
    return {
      blog:{
        // create var to hold options
        author:""
      },
      // create var for options
        authors:['one','two','three']
    }
  }
}
</script>

<style lang="css" scoped>
</style>
