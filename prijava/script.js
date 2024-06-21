function homepage() {
  window.location.href = "../pocetna/index.html";
}

function register() {
  window.location.href = "../registracija/index.html";
}

document.addEventListener("DOMContentLoaded", function () {
  var img = new Image();
  img.src = "../images/prijavareg.jpg";
  img.onload = function () {
    document.body.style.backgroundImage = 'url("../images/prijavareg.jpg")';
  };
});
