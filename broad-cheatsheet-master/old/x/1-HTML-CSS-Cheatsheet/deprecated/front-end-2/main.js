// scroll to top
window.onscroll = function () {
    let btn = document.querySelector(".scroll-top");

    if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
        btn.style.display = "block";
    } else {
        btn.style.display = "none";
    }
};


//banner carousel
let slideIndex2 = 0;

function showSlides2() {
    let i;
    let slides = document.getElementsByClassName("banner-carousel-item");
    let dots = document.getElementsByClassName("banner-carousel-indicators");
    let slideLength = slides.length;
    let dotLength = dots.length;

    for (i = 0; i < slideLength; i++) {
        slides[i].style.display = "none";
    }

    slideIndex2++;

    if (slideIndex2 > slideLength) {
        slideIndex2 = 1
    }

    for (i = 0; i < dotLength; i++) {

        dots[i].className = dots[i].className.replace("active-indicator", "");
    }

    slides[slideIndex2 - 1].style.display = "block";
    dots[slideIndex2 - 1].className += " active-indicator";
    setTimeout(showSlides2, 2000);
}
showSlides2();


// portfolio carousel
let slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("carousel-item");
    let dots = document.getElementsByClassName("carousel-indicators");
    let slideLength = slides.length;
    let dotLength = dots.length;

    if (n > slideLength) {
        slideIndex = 1
    }

    if (n < 1) {
        slideIndex = slideLength;
    }

    for (i = 0; i < slideLength; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dotLength; i++) {
        dots[i].className = dots[i].className.replace(" active-indicator", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active-indicator";
}
showSlides(slideIndex);