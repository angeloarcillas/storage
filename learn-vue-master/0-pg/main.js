// $emit   # emit event
// $on     # call emited event

window.Event = new Vue();

Vue.component('coupon',{
  template: `
  <input placeholder="enter coupon code" @blur="onCouponApplied">
  `,
  methods: {
    onCouponApplied(){
      Event.$emit('applied');
        }
  }
})

new Vue({
  el: "#app",
  methods: {
    onCouponApplied(){
      alert("It was applied")
    }
  },
  created() {
    Event.$on('applied', () => {
      alert("success")
    })
  }
})