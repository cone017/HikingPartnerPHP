document.addEventListener("DOMContentLoaded", () => {
  let textTag = document.querySelector(".wrapper-heading h1 b");
  let text = textTag.textContent;

  // Split the text by characters
  let splittedText = text.split("");
  textTag.innerHTML = "";

  // Create spans for each character
  for (let i = 0; i < splittedText.length; i++) {
    if (splittedText[i] === " ") {
      textTag.innerHTML += `<span>&nbsp;</span>`;
    } else {
      textTag.innerHTML += `<span>${splittedText[i]}</span>`;
    }
  }

  // Add class to each span one by one
  let spans = textTag.querySelectorAll("span");
  let k = 0;
  let interval = setInterval(() => {
    let singleSpan = spans[k];
    singleSpan.className = "fadeMove";
    k++;
    if (k === spans.length) {
      clearInterval(interval);
    }
  }, 20);
});

function login() {
  window.location.href = "../public/pocetna.php";
}

function register() {
  window.location.href = "../public/registracija.php";
}

document.addEventListener("DOMContentLoaded", function () {
  var img = new Image();
  img.src = "../images/pocetna.jpg";
  img.onload = function () {
    document.body.style.backgroundImage = 'url("../images/pocetna.jpg")';
  };
});

function loginasguest() {
  window.location.href = "../public/gost.php";
}

document.addEventListener("DOMContentLoaded", function () {
  var navToggle = document.getElementById("nav-toggle");
  var navMenu = document.querySelector(".nav-menu");

  navToggle.addEventListener("click", function () {
    navMenu.classList.toggle("active");
  });
});
