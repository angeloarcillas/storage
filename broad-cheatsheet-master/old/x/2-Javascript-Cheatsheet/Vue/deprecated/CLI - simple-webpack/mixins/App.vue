<template>
  <div>
    <add-blog></add-blog>
    <hr />
    <show-blog></show-blog>
    <hr />
    <list-blog></list-blog>
  </div>
</template>

<script>
import AddBlog from "./components/add.blog.vue";
import ShowBlog from "./components/show.blog.vue";
import ListBlog from "./components/list.blog.vue";
export default {
  components: {
    "add-blog": AddBlog,
    "show-blog": ShowBlog,
    "list-blog": ListBlog,
  },
  data() {
    return {};
  },
};
</script>

<style scoped></style>
