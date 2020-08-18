<template lang="html">
  <div id="heros">
    <ul>
      <li v-for="hero in heros" v-on:click="hero.show = !hero.show">
        <h2>{{ hero.name }}</h2>
        <h3 v-show="hero.show">{{ hero.skills }}</h3>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      heros: [
        { name: "thor", skills: "thunder", show: false },
        { name: "zues", skills: "dark", show: false },
        { name: "ironman", skills: "light", show: false },
        { name: "spiderman", skills: "fire", show: false },
        { name: "loki", skills: "ice", show: false },
      ],
    };
  },
};
</script>

<style lang="css" scoped>
#heros {
  width: 100%;
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
  box-sizing: border-box;
}
ul {
  display: flex;
  flex-wrap: wrap;
  list-style-type: none;
  padding: 0;
}
li {
  flex-grow: 1;
  flex-basis: 300px;
  text-align: center;
  padding: 30px;
  border: 1px solid #222;
  margin: 10px;
}
</style>
