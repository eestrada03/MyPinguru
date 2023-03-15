<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPinguru - Mi Perfil</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="contenedorPerfil">
    <form class="formPerfil" action="">
        <label for="user">Usuario: 
        <?php 
        session_start();
        echo $_SESSION['user'];
        ?></label>
        <label for="email">Email: 
        <?php 
        echo $_SESSION['email'];
        ?></label>
        <button class="botonperfil">Cambiar usuario</button>
        <button class="botonperfil">Cambiar contraseña</button>
        <button class="botonperfil">Cambiar email</button>
    </form>
    </div>
    
</body>
</html>