<template>
  <div>
    <!-- header -->
    <app-header></app-header>

    <!-- show route component -->
    <router-view></router-view>
  </div>
</template>

<script>
import AddBlog from "./components/add.blog.vue";
import ShowBlog from "./components/show.blog.vue";
import ListBlog from "./components/list.blog.vue";
import Header from "./components/header.vue";

export default {
  components: {
    "add-blog": AddBlog,
    "show-blog": ShowBlog,
    "list-blog": ListBlog,
    "app-header": Header,
  },
};
</script>
