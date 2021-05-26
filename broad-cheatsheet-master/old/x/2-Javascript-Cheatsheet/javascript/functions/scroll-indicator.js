/**
 *Scroll indicator
 */
window.onscroll = function () {
  let windowScroll = document.body.scrollTop || document.documentElement.scrollTop;
  let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  let scrolled = (windowScroll / height) * 100;

  document.querySelector(".indicator").innerHTML = Math.floor(scrolled) + "%";
};
