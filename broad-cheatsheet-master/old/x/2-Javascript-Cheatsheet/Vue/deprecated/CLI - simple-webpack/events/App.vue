  <template>
  <div>
    <!--
    PRIMITIVE GLOBAL CHANGE

    $event -> reserver word
    v-on:changeName -> on function execute do function-name($event)
    -->

    <app-header v-bind:propName2 = "title" v-on:changeName="updateTitle($event)"></app-header>
    <app-footer v-bind:propName2 = "title"></app-footer>
  </div>
  </template>

  <script>
  //create object
  import Header from './components/header.vue';
  import Footer from './components/footer.vue';

export default {
  //create components
  components:{
    'app-info':Info,
    'app-header':Header,
    'app-footer':Footer
  },
  data() {
    return {
      title:"evangel laclairs"
      }
    },
    methods:{
      updateTitle:function(updateData){
        this.title = updatedTitle;
      }
    }
  }

</script>

<style>

</style>
