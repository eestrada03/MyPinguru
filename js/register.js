//Recojo elementos.

var formRegister = document.forms["formRegister"];
const user = document.getElementById("user");
const email = document.getElementById("email");
const password = document.getElementById("password");
const rpassword = document.getElementById("rpassword");
const terms = document.getElementById("terms");
const tyc = document.getElementById("tyc");
const pingu = document.getElementById("pinguregister");

//Borrado de espacios en blanco.

user.value.trim();
password.value.trim();
email.value.trim();
rpassword.value.trim();

//Expresiones regulares.
const expmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

//Elementos dinámicos.
let msg = document.getElementById("h1Register");

//Validación de los valores.

formRegister.addEventListener("submit", (event) => {
  // Prevenir la acción predeterminada del formulario
  event.preventDefault();

  // Control de datos:

  //En caso de que los campos estén vacíos.

  if (
    user.value === "" ||
    email.value === "" ||
    password.value === "" ||
    rpassword.value === ""
  ) {
    //Mensaje de error.
    msg.innerHTML = "¡Rellena todos los campos!";

    //Placeholder en rojo.
    user.classList.add("errorRegister");
    email.classList.add("errorRegister");
    password.classList.add("errorRegister");
    rpassword.classList.add("errorRegister");

    //Reinicio animación
    msg.classList.remove("h1Register");
    pingu.classList.remove("pingushake");
    void msg.offsetWidth;
    void pingu.offsetWidth;
    pingu.classList.add("pingushake");
    msg.classList.add("h1Register");
  } else {
    //Si el email no es válido.

    if (expmail.test(email.value) == false) {
      //Mensaje de error.
      msg.innerHTML = "¡Email no válido!";

      //Reinicio animación
      pingu.classList.remove("pingushake");
      msg.classList.remove("h1Register");
      void msg.offsetWidth;
      void pingu.offsetWidth;
      msg.classList.add("h1Register");
      pingu.classList.add("pingushake");

      //Placeholder en rojo.
      email.classList.add("errorRegister");

      //Borro el contenido de email.
      document.getElementById("email").value = "";
    } else {
      //En caso de que los passwords no coincidan.

      if (password.value !== rpassword.value) {
        //Mensaje de error.
        msg.innerHTML = "¡Las contraseñas no coinciden!";

        //Reinicio animación
        pingu.classList.remove("pingushake");
        msg.classList.remove("h1Register");
        void msg.offsetWidth;
        void pingu.offsetWidth;
        msg.classList.add("h1Register");
        pingu.classList.add("pingushake");

        //Placeholder en rojo.
        password.classList.add("errorRegister");
        rpassword.classList.add("errorRegister");

        //Borro el contenido de los passwords.
        document.getElementById("password").value = "";
        document.getElementById("rpassword").value = "";
      } else {
        //Si el checkbox no está seleccionado.
        if (terms.checked == false) {
          //Mensaje de error.
          msg.innerHTML = "Debes aceptar los términos y condiciones";

          //Reinicio animación
          pingu.classList.remove("pingushake");
          msg.classList.remove("h1Register");
          void msg.offsetWidth;
          void pingu.offsetWidth;
          msg.classList.add("h1Register");
          pingu.classList.add("pingushake");

          //Terms en rojo + shake.
          tyc.classList.remove("termsnotcheck");
          void tyc.offsetWidth;
          tyc.classList.add("termsnotcheck");
        } else {
          formRegister.submit();
        }
      }
    }
  }
});
