import AddBlog from "./components/add.blog.vue";
import ShowBlog from "./components/show.blog.vue";
import ListBlog from "./components/list.blog.vue";

export default [
  //add and create path
  { path: "/", component: AddBlog },
  { path: "/show", component: ShowBlog },
  { path: "/list", component: ListBlog },
];
