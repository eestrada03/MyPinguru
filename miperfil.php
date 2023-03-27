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
        <h1><?php if (isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == 007) {
                echo "Contraseña incorrecta.";
            }
        }?></h1>
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
        <a id="popcall" class="popcall" href="update.php?change=user">Cambiar usuario</a>
        <a id="popcall" class="popcall" href="update.php?change=email">Cambiar email</a>
        <a id="popcall" class="popcall" href="update.php?change=password">Cambiar contraseña</a>
    </form>
    </div>
    <a href="menu.php"><div class="retroceder"></div></a>
</body>
</html>