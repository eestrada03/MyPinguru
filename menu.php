<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyPinguru - Home</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div id="sidebar" class="sidebar">
      <section class="logoBar">
        <img
          class="userLogo"
          src="assets/img/svg/avatarsUserLogo.svg"
          alt="LogoUsuario"
        />
        <h2 class="userBar"><?php
          session_start();
          echo $_SESSION['user'];
          ?></h2>
      </section>
      <section class="opcionesBar">
        <ul class="listaSideBar">
          <li><a class="listaSideBarItem" href="miperfil.php">Mi Perfil</a></li>
          <li><a class="listaSideBarItem" href="#">Ayuda</a></li>
          <li><a class="listaSideBarItem" href="php/gestionbdd.php?logout=true">Cerrar Sesión</a></li>
        </ul>
      </section>
    </div>

    <div class="contenedormenu">
      <section class="headermenu">
        <div class="dotscontainer">
          <div id="sidebarcall" class="dotsidebar"></div>
        </div>
        <div class="bienvenidousuario">
          <h1 class="h1menu"><?php
          
          echo "Bienvenido, ".$_SESSION['user'];
          ?></h1>
        </div>
        <div class="pingumenu"></div>
      </section>

      <section class="opcionesmenu">
        <a class="botonmenu" href="audios.php">MEDITACIÓN</a>
        <a class="botonmenu" href="tienda.php">TIENDA</a>
        <a class="botonmenu" href="articulos.php">ARTÍCULOS</a>
      </section>
    </div>
    <script src="js/sidebar.js"></script>
  </body>
</html>
