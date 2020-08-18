"use strict";
// scroll to top
window.onscroll = function () {
    let btn = document.querySelector(".scroll-top");

    if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};

let menuToggle = function() {
  document.querySelector(".sidebar").style.display = "block";
  // window.onclick = function(e) {
  //   if (e.target == document.querySelector('.sidebar')) {
  //     document.querySelector('.sidebar').style.display = "none";
  //   }
  // }
};
