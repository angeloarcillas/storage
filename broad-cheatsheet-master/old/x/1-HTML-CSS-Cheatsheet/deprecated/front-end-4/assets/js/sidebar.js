let sidebar = document.querySelector("aside");
let sidebarContainer = document.querySelector(".sidebar");


function hideSideNav() {
  sidebar.style.width = "0";
  sidebarContainer.style.width = "0";
}

function showSideNav() {
  sidebar.style.width = "100%";
  sidebarContainer.style.width = "15em";
}

window.onclick = function(event) {
  if (event.target == sidebar) {
    sidebar.style.width = "0";
    sidebarContainer.style.width = "0";
  }
}

//
// let prev = window.pageYOffset;
//
// window.onscroll = function() {
//   let current = window.pageYOffset;
//
//   if (prev > current) {
//     document.querySelector(".menu").style.top = "0";
//   } else {
//     document.querySelector(".menu").style.top = "-50px";
//   }
//   prev = current;
// }
