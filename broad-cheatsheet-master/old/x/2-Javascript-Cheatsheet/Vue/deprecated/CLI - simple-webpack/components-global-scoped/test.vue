<template>
  <ul>
    <li v-for="hero in heros" :key="hero.id">{{ hero }}</li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      heros: ["qwe", "qwe2", "qwe3"],
    };
  },
};
</script>