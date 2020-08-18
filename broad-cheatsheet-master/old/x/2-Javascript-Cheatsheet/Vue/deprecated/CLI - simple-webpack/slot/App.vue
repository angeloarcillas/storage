<template>
  <form-helper>
    <div slot="form-header">
      <h2>Register Here</h2>
      <p>* - required</p>
    </div>

    <div slot="form-inputs">
      <input type="text" name placeholder="username.." />
      <input type="password" name placeholder="password.." />
    </div>

    <div slot="form-controls">
      <button type="button" name="button">Submit</button>
    </div>

    <div class="f-app" slot="form-links">
      <a href="#">link</a>
      <a href="#">link</a>
      <a href="#">link</a>
    </div>
  </form-helper>
</template>

<script>
// let FormHelper: './components/form.helper.vue';
import form from "./components/form.helper.vue";

export default {
  components: {
    "form-helper": form
  }
};
</script>

<style>
/* can customize h1 but not slot elements */
h1 {
  color: #e1a1e1;
}
li {
  float: left;
  list-style: none;
  padding: 20px;
}
</style>
