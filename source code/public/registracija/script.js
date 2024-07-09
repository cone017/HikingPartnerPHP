function homepage() {
  window.location.href = "../public/home.php";
}

function login() {
  window.location.href = "../prijava/index.php";
}

window.addEventListener("load", () => {
  document.getElementById("registrationForm").reset();
});

document.addEventListener("DOMContentLoaded", function () {
  var img = new Image();
  img.src = "../images/prijavareg.jpg";
  img.onload = function () {
    document.body.style.backgroundImage = 'url("../images/prijavareg.jpg")';
  };
});

document.addEventListener("DOMContentLoaded", function () {
  var navToggle = document.getElementById("nav-toggle");
  var navMenu = document.querySelector(".nav-menu");

  navToggle.addEventListener("click", function () {
    navMenu.classList.toggle("active");
  });
});

//Validacija
//prvo uzimamo sve inpute
let inputs = document.querySelectorAll("input");
// pravimo niz za greske
let errors = {
  imePrezime: [],
  mejl: [],
  telefon: [],
  sifra: [],
};

inputs.forEach((element) => {
  element.addEventListener("change", (e) => {
    let currentInput = e.target;
    let inputValue = currentInput.value;
    let inputName = currentInput.getAttribute("name");

    if (inputValue.length > 4) {
      errors[inputName] = []; //praznimo greske
      switch (inputName) {
        case "imePrezime":
          let validation = inputValue.trim();
          validation = validation.split(" ");
          if (validation.length < 2) {
            errors[inputName].push("Morate napisati puno ime i prezime!");
          }
          break;

        case "mejl":
          if (!validationEmail(inputValue)) {
            errors[inputName].push(
              "Uneli ste neispravnu email adresu! Pokušajte ponovo."
            );
          }
          break;

        case "telefon":
          let phoneError = validationPhoneNumber(inputValue);
          if (phoneError) {
            errors[inputName].push(phoneError);
          }
          break;

        case "sifra":
          let passwordError = passwordValidation(inputValue);
          if (passwordError) {
            errors[inputName].push(passwordError);
          }
          break;
      }
    }
    //ovde se poziva funkcija populateErrors
    populateErrors();
  });
});

const populateErrors = () => {
  for (let element of document.querySelectorAll("ul")) {
    element.innerHTML = "";
  }
  for (let key of Object.keys(errors)) {
    let input = document.querySelector(`input[name = "${key}"]`);
    let parentElement = input.parentElement;
    let errorsElement = document.createElement("ul");
    parentElement.appendChild(errorsElement);

    errors[key].forEach((error) => {
      let li = document.createElement("li");
      li.innerText = error;
      errorsElement.appendChild(li);
    });
  }
};

//Validacija grupe radio button-a za odabir pola
document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    let radioButtons = document.querySelectorAll('input[name="group1"]');
    let isChecked = false;

    for (let i = 0; i < radioButtons.length; i++) {
      if (radioButtons[i].checked) {
        isChecked = true;
        break;
      }
    }

    let radioErrors = document.getElementById("radioErrors");
    radioErrors.innerHTML = "";
    if (!isChecked) {
      event.preventDefault();
      let li = document.createElement("li");
      li.innerText = "Morate odabrati jednu opciju!";
      radioButtons.appendChild(li);
    }
  });

//Regex funkcije za validaciju email adrese, broja telefona, lozinke,...
const validationEmail = (email) => {
  const reg_pattern = /^\w+(\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return reg_pattern.test(email);
};

const validationPhoneNumber = (broj_telefona) => {
  brTel = /^0\d{1,2}[-\/]?\d{3}[-\/]?\d{3,4}$/;
  if (brTel.test(broj_telefona)) {
    const cleanedPhoneNumber = broj_telefona.replace(/[-\/]/g, "");

    if (/^0\d{9}$/.test(cleanedPhoneNumber)) {
      return ""; //ako nema gresaka...
    } else {
      return "Broj telefona mora imati tačno 10 cifara!";
    }
  } else {
    return "Broj telefona nije u ispravnom formatu!";
  }
};

const passwordValidation = (password) => {
  var pass_pattern =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (pass_pattern.test(password)) {
    return "";
  } else {
    return "Lozinka mora imati najmanje 8 karaktera, uključujući mala i velika slova, brojeve i specijalne karaktere!";
  }
};
