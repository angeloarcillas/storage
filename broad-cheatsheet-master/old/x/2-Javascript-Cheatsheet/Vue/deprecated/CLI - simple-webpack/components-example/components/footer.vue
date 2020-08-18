<template lang="html">
  <footer>
    <p>{{ copyrights }}</p>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      copyrights: "alright reserver",
    };
  },
};
</script>

<style lang="css" scoped>
footer {
  background-color: #222;
  padding: 6px;
}
p {
  color: #e1a1e1;
  text-align: center;
}
</style>
