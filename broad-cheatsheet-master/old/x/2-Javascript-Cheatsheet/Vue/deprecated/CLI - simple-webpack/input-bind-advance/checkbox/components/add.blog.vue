<template lang="html">
<div class="add-blog"><div class="checkboxes">
  <!-- v-model -> binds input value data -->
      <label>Hero 1</label>
      <input type="checkbox" value="1" v-model="blog.categories">
      <label>hero 2</label>
      <input type="checkbox" value="2" v-model="blog.categories">
      <label>hero 3</label>
      <input type="checkbox" value="3" v-model="blog.categories">
    </div>
    <p>blog categories: </p>
    <ul>
      <li v-for="x in blog.categories">{{x}}</li>
    </ul>
  </div>
</div>
</template>

<script>
export default {
  data(){
    return {
      blog:{
          categories:[]
      }
    }
  }
}
</script>

<style lang="css" scoped>
</style>
