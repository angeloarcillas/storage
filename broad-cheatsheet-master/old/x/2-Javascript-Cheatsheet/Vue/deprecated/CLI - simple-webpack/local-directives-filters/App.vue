
  <template>
    <div>
        <add-blog></add-blog>
        <hr>
      <show-blog></show-blog>
    </div>
  </template>

  <script>
  import AddBlog from './components/add.blog.vue'
  import ShowBlog from './components/show.blog.vue'
export default {
  components:{
    'add-blog':AddBlog,
    'show-blog':ShowBlog
  },
  data() {

    return {
    }
  }
    }
</script>

<style scoped>
</style>
