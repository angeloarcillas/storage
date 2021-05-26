<template lang="html">
  <div class="add-blog">
    <form v-if="!submitted">
      <h1>Add blog</h1>
      <div class="form-inputs">
        <input v-model.lazy="blog.title" type="text" placeholder="Title.." />
        <input v-model.lazy="blog.info" type="text" placeholder="Info.." />
      </div>

      <div class="form-checkbox">
        <label>
        <input type="checkbox" value="hero 1" v-model="blog.heros" />
        Hero 1:</label>

        <label>
        <input type="checkbox" value="hero 2" v-model="blog.heros" />
        Hero 2:</label>

        <label>
        <input type="checkbox" value="hero 3" v-model="blog.heros" />
        Hero 3:</label>
      </div>

      <div class="form-selecbox">
        <select v-model="blog.author">
          <option v-for="author in authors">{{ author }}</option>
        </select>
      </div>

      <button v-on:click.prevent="post">Send</button>
    </form>

    <div class="" v-if="submitted">
      <h3>submitted</h3>
    </div>

    <div class="form-data">
      <h1>Preview blog</h1>
      <p>Title:{{ blog.title }}</p>
      <p>Info:</p>
      <p>{{ blog.info }}</p>
      <p>Heros:</p>
      <ul>
        <li v-for="hero in blog.heros">{{ hero }}</li>
      </ul>
      <p>Author:{{ blog.author }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      blog: {
        title: "",
        info: "",
        heros: [],
        author: "",
      },
      authors: ["one", "two", "three"],
      submitted: false,
    };
  },
  methods: {
    post: function () {
      // htttp.method(url),{data}.then(function(data){
      //   success
      // });
      this.$http
        .post("https://jsonplaceholder.typicode.com/posts", {
          title: this.blog.title,
          body: this.blog.info,
          userId: 1,
        })
        .then(function (data) {
          console.log(data);
          this.submitted = true;
        });
    },
  },
};
</script>
