/**
 * Pounce top
 */
function goTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/**
 * Show/hide scroll top
 */
window.onscroll = function () {
  let btn = document.querySelector(".scroll-top");

  if (
    document.body.scrollTop > 350 ||
    document.documentElement.scrollTop > 350
  ) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
};

/**
 * Show on scroll up
 */
let prev = window.pageYOffset;
window.onscroll = function () {
  let current = window.pageYOffset;

  if (prev > current) {
    document.querySelector("nav").style.top = "0";
  } else {
    document.querySelector("nav").style.top = "-50px";
  }
  prev = current;
};

/**
 * Show/hide header + scroll top
 */
window.onscroll = function (e) {
  let btn = document.querySelector(".go-top");
  let header = querySelector("header");

  if (
    document.body.scrollTop > 350 ||
    document.documentElement.scrollTop > 350
  ) {
    btn.style.display = "block";

    if (this.oldScroll > this.scrollY) {
      header.style.display = "block";
    } else {
      header.style.display = "none";
    }

    this.oldScroll = this.scrollY;
  } else {
    btn.style.display = "none";
  }
};
