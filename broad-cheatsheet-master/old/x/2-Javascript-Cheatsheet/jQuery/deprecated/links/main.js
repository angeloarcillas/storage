$(document).ready(function() {

  //gets the url
  let page_url = window.location.href;

  //lastIndexOf("selector")+1 -> gets the position then move 1 letter
  let page_id = page_url.substring(page_url.lastIndexOf("#") + 1);

  //check if url is "section3"
  if (page_id == "section3") {

    //  select htlm and body
    $("html, body").animate({

      //scrolls to #scroll-section3 for 1sec
      //  + 100 / - 100 -> 100px before/after page target
      scrollTop: $("#scroll-" + page_id).offset().top + 100
    }, 1000);

    //check if url is "post"
  } else if (page_id == "post") {

    //  select htlm and body
    $("html, body").animate({
      
      //scrolls to #scroll-post for 1sec
      scrollTop: $("#scroll-" + page_id).offset().top
    }, 1000);
  }

});
