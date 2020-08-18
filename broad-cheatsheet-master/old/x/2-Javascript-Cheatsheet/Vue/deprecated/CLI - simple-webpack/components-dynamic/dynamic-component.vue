<template>
  <div>
    <keep-alive>
      <!-- is - special attribute for dynamic component)
           keep-alive - cache components -->
    <component v-bind:is="form"></component>
    </keep-alive>

    <button @click="form = 'form-1'">Form one</button>
    <button @click="form = 'form-2'">Form two</button>
    <button @click="form = ''">none</button>
  </div>
</template>

<script>
import form1 from "./components/form.one.vue";
import form2 from "./components/form.two.vue";

export default {
  components: {
    "form-1": form1,
    "form-2": form2,
  },
  data() {
    return {
      form: "",
    };
  },
};
</script>

<style scoped></style>
