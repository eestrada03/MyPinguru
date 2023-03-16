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
    <form id="popup" action="php/gestionbdd.php?update=<?php
    //Envío de parámetros dinámico:
    $change = $_GET["change"];
        if (isset($change)) {

        switch ($change) {
            case 'user':
                $msg = "user";
                echo $msg;
                break;

            case 'email':
                $msg = "email";
                echo $msg;
                break;

            case 'password':
                $msg = "password";
                echo $msg;
                break;
        }
    }
    
    ?>" class="changeparam" method="POST">
    <a href="miperfil.php"><div class="retroceder"></div></a>
        <input type="<?php
        //Type dinámico
        $change = $_GET["change"];
        if (isset($change)) {

        switch ($change) {
            case 'user':
                $msg = "text";
                echo $msg;
                break;

            case 'email':
                $msg = "email";
                echo $msg;
                break;

            case 'password':
                $msg = "password";
                echo $msg;
                break;
        }
    }


        ?>" name ="param" class="param" placeholder="<?php
        
        //Place holder dinámico:
        $change = $_GET["change"];
        if (isset($change)) {

        switch ($change) {
            case 'user':
                $msg = "Introduce tu nuevo usuario";
                echo $msg;
                break;

            case 'email':
                $msg = "Introduce tu nuevo email";
                echo $msg;
                break;

            case 'password':
                $msg = "Introduce tu nueva contraseña";
                echo $msg;
                break;
        }
    }
        
        ?>">
        <input name="password" type="password" class="param" placeholder="Introduce tu contraseña">
        <input class="actualiza"type="submit" value="Cambiar">

    </form>
    </div>

</body>
</html>