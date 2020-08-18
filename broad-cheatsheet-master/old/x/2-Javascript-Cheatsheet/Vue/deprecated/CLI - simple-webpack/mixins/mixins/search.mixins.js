export default {
  computed:{
    //array value of blogs.filter(value of x) => array {return if any search match x.title}
    filterBlog:function(){
      return this.blogs.filter((x) => {
        return x.title.match(this.search);
      });
    }
  }
}
