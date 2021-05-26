<script>

export default {
components:{
},
data() {
  return {

    }
  },
  methods:{
  },
  //lifecycle hooks
  beforeCreated(){
    alert('beforeCreated');
  },
  created(){
    alert('created');
  },
  beforeMount(){
    alert('beforeMount');
  },
  mounted(){
    alert('mounted');
  },
  beforeUpdate(){
    alert('beforeUpdate');
  }
}


</script>
