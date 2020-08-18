<template lang="html">
  <nav class="">
    <ul>
      <!-- exact - for router-link-active -> unique active class
           to="path" -->
      <li><router-link to="/" exact>add</router-link></li>
      <li><router-link to="/show" exact>show</router-link></li>
      <li><router-link to="/list" exact>list</router-link></li>
    </ul>
  </nav>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
ul {
  list-style: none;
  text-align: center;
  margin: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #e131e1;
  text-decoration: none;
  padding: 6px 8px;
  border-radius: 10px;
}
nav {
  background-color: #e1e1e1;
  padding: 14px 0;
  margin-bottom: 40px;
}
/* router reserve word -> use inspect */
.router-link-active {
  background-color: #000;
  color: #fff;
}
</style>
