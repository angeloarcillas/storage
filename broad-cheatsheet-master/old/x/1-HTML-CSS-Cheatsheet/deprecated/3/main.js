let showLogin = function() {
  let modal = document.querySelector('.login-modal');

  modal.style.display = "block";

  window.onclick = function(e) {
    if (e.target == modal) {
      modal.style.display = "none";
    }
  }
};

/****************************
      CAROUSEL
****************************/
let slideIndex = 0;
showSlides();

function showSlides() {

  var slides = document.getElementsByClassName("carousel-item");
  var dots = document.getElementsByClassName("dot");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for ( let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
