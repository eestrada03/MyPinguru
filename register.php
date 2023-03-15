<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyPinguru - Registro</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="contenedorRegister">
      <section class="blueback">
        <div id="pinguregister" class="pinguregister"></div>
        <h1 id="h1Register" class="h1Register"><?php
        $msg = "¡Encantado de conocerte!";

        if (isset($_GET["error"])) {
          
          $error = $_GET["error"];

          switch ($error) {

            case '11':
              echo "El usuario no puede tener más de 20 caracteres";
              break;
  
            case '21':
              echo "El email no puede tener más de 256 caracteres";
              break;
  
            case '31':
              echo "El email no puede tener más de 256 caracteres";
              break;
  
            case '21':
              echo "La contraseña no puede tener más de 64 caracteres";
              break;
  
            case '12':
              echo "¡Rellena todos los campos!";
              break;
  
            case '13':
              echo "Debes aceptar los términos y condiciones";
              break;
  
            case '14':
              echo "¡Correo ya registrado!";
              break;
  
            default:
              echo $msg;
              break;
          }
        }else {
          echo $msg;
        }
        

       

        ?></h1>
        <form
          name="formRegister"
          class="formRegister"
          method="POST"
          action="php/gestionbdd.php?form=register"
        >
          <input
            class="inputRegister"
            type="text"
            name="user"
            id="user"
            placeholder="Usuario"
          />
          <input
            class="inputRegister"
            type="email"
            name="email"
            id="email"
            placeholder="Email"
          />
          <input
            class="inputRegister"
            type="password"
            name="password"
            id="password"
            placeholder="Contraseña"
          />
          <input
            class="inputRegister"
            type="password"
            name="rpassword"
            id="rpassword"
            placeholder="Repetir contraseña"
          />
          <article class="terminosRegister">
            <input class="terms" type="checkbox" name="terms" id="terms" />
            <p id="tyc" class="tyc">Acepto los Términos y Condiciones</p>
          </article>
          <button class="buttonRegister" type="submit">CREAR</button>
          <p class="pRegister">
            ¿Ya tienes una cuenta?
            <a class="registertologin" href="login.php"><b>Accede</b></a>
          </p>
        </form>
      </section>
    </div>
    <script src="js/register.js"></script>
  </body>
</html>
