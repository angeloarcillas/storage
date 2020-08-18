<template lang="html">
  <!-- v-theme - custom directive
   :columm - args -->
  <div class="" v-theme:column="theme">
    <h1>blogs</h1>
    <div v-for="blog in blogs" class="single-blog">
      <!-- custom directives -->
      <h2 v-rainbow>{{ blog.title }}</h2>
      <article>{{ blog.body }}</article>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      blogs: [],
      theme: "narrow",
    };
  },
  methods: {},
  created() {
    this.$http
      .get("https://jsonplaceholder.typicode.com/posts")
      .then(function (data) {
        console.log(data);
        this.blogs = data.body.slice(0, 5);
      });
  },
};
</script>

<style lang="css" scoped>
.single-blog {
  background-color: #e1e1e1;
  max-width: 80%;
  margin: 0 auto;
}
</style>
