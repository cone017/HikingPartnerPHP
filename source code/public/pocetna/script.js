document.addEventListener("DOMContentLoaded", (event) => {
  // const passwordField = document.getElementById("password");
  const proba = document.getElementsByName("lozinka")[0];
  const showPasswordCheckbox = document.getElementById("show-password");

  showPasswordCheckbox.addEventListener("change", function () {
    if (showPasswordCheckbox.checked) {
      proba.type = "text";
    } else {
      proba.type = "password";
    }
  });
});

function homepage() {
  window.location.href = "../public/home.php";
}

function register() {
  window.location.href = "../public/registracija.php";
}

window.addEventListener("load", () => {
  document.getElementById("loginForm").reset();
});

document.addEventListener("DOMContentLoaded", function () {
  var img = new Image();
  img.src = "../images/prijavareg.jpg";
  img.onload = function () {
    document.body.style.backgroundImage = 'url("../images/prijavareg.jpg")';
  };
});

//za responsive dugme
document.addEventListener("DOMContentLoaded", function () {
  var navToogle = document.getElementById("nav-toogle");
  var navMenu = document.querySelector(".nav-menu");

  navToogle.addEventListener("click", function () {
    navMenu.classList.toggle("active");
  });
});

//validacija forme za prijavu

//kupimo prvo sve inpute sa forme...
// let inputs = document.querySelectorAll("input");
// let errors = {
//   korisnickoIme: [],
//   lozinka: [],
// };

// inputs.forEach((element) => {
//   element.addEventListener("change", (e) => {
//     let currentInput = e.target;
//     let inputValue = currentInput.value;
//     let inputName = currentInput.getAttribute("name");

//     if (inputValue.length > 4) {
//       errors[inputName] = [];
//       switch (inputName) {
//         case "korisnickoIme":
//           if (!validationEmail(inputValue)) {
//             errors[inputName].push(
//               "Uneli ste neispravnu email adresu! Pokušajte ponovo."
//             );
//           }
//           break;

//         case "lozinka":
//           let passwordError = passwordValidation(inputValue);
//           if (passwordError) {
//             errors[inputName].push(passwordError);
//           }
//       }
//     }
//     populateErrors();
//   });
// });

// const populateErrors = () => {
//   for (let element of document.querySelectorAll("ul")) {
//     element.innerHTML = "";
//   }
//   for (let key of Object.keys(errors)) {
//     let input = document.querySelector(`input[name = "${key}"]`);
//     let parentElement = input.parentElement;
//     let errorsElement = document.createElement("ul");
//     parentElement.appendChild(errorsElement);

//     errors[key].forEach((error) => {
//       let li = document.createElement("li");
//       li.innerText = error;
//       errorsElement.appendChild(li);
//     });
//   }
// };

// //validacija za email
// const validationEmail = (korisnickoIme) => {
//   const reg_pattern = /^\w+(\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//   return reg_pattern.test(korisnickoIme);
// };

// //validacija za password
// const passwordValidation = (lozinka) => {
//   var pass_pattern =
//     /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

//   if (pass_pattern.test(lozinka)) {
//     return "";
//   } else {
//     return "Lozinka mora imati najmanje 8 karaktera, uključujući mala i velika slova, brojeve i specijalne karaktere!";
//   }
// };
