<template>
  <div>
    <add-blog></add-blog>
    <hr />
    <show-blog></show-blog>
  </div>
</template>

<script>
import ShowBlog from "./components/show.blog.vue";
export default {
  components: {
    "show-blog": ShowBlog,
  },
  data() {
    return {};
  },
};
</script>

<style scoped></style>
