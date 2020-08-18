/**
 * Prevent <a href="#"> events
 */
document.addEventListener("click", function (e) {
  if (e.target.tagName === "A" && e.target.attributes.href.value === "#") {
    e.preventDefault();
  }
});
