Vue.component("greeting", {
  // <greeting></greeting>
  template:
    '<p>component {{ title }} <button :click="changeName">change</button></p>',
  data: function () {
    return {
      name: "greeting",
    };
  },
  methods: {
    changeName: function () {
      this.name = "changed greeting";
    },
  },
});
