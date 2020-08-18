<template>
  <div>
    <h1>{{ title }}</h1>
    <test></test>
  </div>
</template>

<script>
import test from "test.vue";

export default {
  components: {
    test: test,
  },
};
</script>

<style></style>
