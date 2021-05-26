<template>
  <header>
    <h1>{{ title }}</h1>
  </header>
</template>

<script>
export default {
  data() {
    return {
      title: "Foobar Inc.",
    };
  },
};
</script>
<style lang="css" scoped>
header {
  background-color: #e1e1e1;
}
h1 {
  color: #222;
  text-align: center;
}
</style>
