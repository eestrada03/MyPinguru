//Validación login:

// Obtener los campos de entrada
var formLogin = document.forms["formLogin"];
const userField = document.getElementById("user");
const passwordField = document.getElementById("password");
let msg1 = document.getElementById("h1Login");
let msg2 = document.getElementById("h2Login");
let pingulogin = document.getElementById("pingulogin");
const errorh1 = "¡Ups!";
const errorh2 = "Usuario o contraseña incorrectos";

// Manejar la validación del formulario en el evento submit
formLogin.addEventListener("submit", (event) => {
  // Prevenir la acción predeterminada del formulario
  event.preventDefault();

  // Obtener los valores de los campos de entrada
  const userValue = userField.value.trim();
  const passwordValue = passwordField.value.trim();

  // Validar que los campos de entrada no estén vacíos

  if (userValue === "" && passwordValue === "") {
    userField.placeholder = "Usuario";
    userField.classList.add("errorLogin");
    passwordField.placeholder = "Contraseña";
    passwordField.classList.add("errorLogin");
    msg1.innerHTML = errorh1;
    msg2.innerHTML = errorh2;

    //Reinicio animación
    msg1.classList.remove("h1Login");
    pingulogin.classList.remove("errorLoginPinguBounce");

    void msg1.offsetWidth;
    void pingulogin.offsetWidth;
    pingulogin.classList.add("errorLoginPinguBounce");
    msg1.classList.add("h1Login");
  } else {
    if (userValue === "") {
      userField.placeholder = "Usuario";
      userField.classList.add("errorLogin");
      msg1.innerHTML = errorh1;
      msg2.innerHTML = errorh2;
      //Reinicio animación
      msg1.classList.remove("h1Login");
      pingulogin.classList.remove("errorLoginPinguBounce");

      void msg1.offsetWidth;
      void pingulogin.offsetWidth;
      pingulogin.classList.add("errorLoginPinguBounce");
      msg1.classList.add("h1Login");
    } else {
      if (passwordValue === "") {
        passwordField.placeholder = "Contraseña";
        passwordField.classList.add("errorLogin");
        msg1.innerHTML = errorh1;
        msg2.innerHTML = errorh2;
        //Reinicio animación
        msg1.classList.remove("h1Login");
        pingulogin.classList.remove("errorLoginPinguBounce");

        void msg1.offsetWidth;
        void pingulogin.offsetWidth;
        pingulogin.classList.add("errorLoginPinguBounce");
        msg1.classList.add("h1Login");
      } else {
        // Si los campos de entrada son válidos, enviar el formulario
        formLogin.submit();
      }
    }
  }
});
