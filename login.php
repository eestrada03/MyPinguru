<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyPinguru - Login</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="contenedorLogin">
      <section class="blueback">
        <div id="pingulogin" class="pingulogin"></div>
        <h1 id="h1Login" class="h1Login">¡Hola!</h1>
        <h2 id="h2Login" class="h2Login">
        <?php
        $msg = "¡Accede a tu cuenta!";

        if (isset($_GET["error"])){

          $error = $_GET["error"];

          switch ($error) {
            case '14':
              echo "Contraseña incorrecta.";
              break;
            case '15':
              echo "El usuario no existe.";
              break;
            
            default:
              echo $msg;
              break;
          }

        }else {
          echo $msg;
        }
        
        ?></h2>
        <form name="formLogin" class="formLogin" method="POST" action="php/gestionbdd.php?form=login">
          <input class="inputLogin"type="text" name="user" id="user" placeholder="Usuario"></input>
          <input class="inputLogin" type="password" name="password" id="password" placeholder="Contraseña" />
          <p class="forgotpass">¿Has olvidado la contraseña?</p>
          <button class="buttonLogin" type="submit"><a class="logintomenu">ACCEDER</a></button>
          <p class="pLogin">¿Todavía no tienes cuenta? <a class="linkregister" href="register.php"><b>Crear</b></a></p>
        </form>
      </section>
    </div>
    <script src="js/login.js"></script>
  </body>
</html>
