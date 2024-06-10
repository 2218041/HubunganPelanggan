var navLinks = document.getElementById("navLinks");
function showMenu() {
  navLinks.style.right = "0";
}
function hideMenu() {
  navLinks.style.right = "-200px";
}

var btn = document.getElementsByClassName("btn");
var slide = document.getElementById("slide");

btn[0].onclick = function () {
  slide.style.transform = "translateX(0)";
  for (var i = 0; i < btn.length; i++) {
    btn[i].classList.remove("active");
  }
  this.classList.add("active");
};
btn[1].onclick = function () {
  slide.style.transform = "translateX(-800px)";
  for (var i = 0; i < btn.length; i++) {
    btn[i].classList.remove("active");
  }
  this.classList.add("active");
};
btn[2].onclick = function () {
  slide.style.transform = "translateX(-1600px)";
  for (var i = 0; i < btn.length; i++) {
    btn[i].classList.remove("active");
  }
  this.classList.add("active");
};
btn[3].onclick = function () {
  slide.style.transform = "translateX(-2400px)";
  for (var i = 0; i < btn.length; i++) {
    btn[i].classList.remove("active");
  }
  this.classList.add("active");
};
