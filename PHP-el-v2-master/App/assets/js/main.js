function x(value) {
  // document.querySelector('.password-meter').innerHTML = value;
  if (value.length < 8) {
    document.querySelector(".password-meter").innerHTML = "weak";
  } else if (value.length < 16) {
    document.querySelector(".password-meter").innerHTML = "average";
  } else {
    document.querySelector(".password-meter").innerHTML = "strong";
  }
}

document.querySelector(".nav-burger").addEventListener("click", () => {
  let nav = document.querySelector(".menu-main");
  let burger = document.querySelector(".nav-burger");

  if (nav.style.display === "none") {
    nav.style.display = "block";
    burger.classList.add("active");
  } else {
    nav.style.display = "none";
    burger.classList.remove("active");
  }
});
