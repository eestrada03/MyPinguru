<?php 
include "conexion.php";
$pdo = new Conexion();
//0 1
$form = $_GET["form"];
$logout = $_GET["logout"];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form == "register") {

    //Recojo los datos de los inputs del registro:

    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $terms = $_POST["terms"];

    //Validación de datos:

    //Limitación del número de caracteres
    if (strlen($user > 20)) {
        header("Location:../register.php?error=11");
        exit();
    }

    if (strlen($email > 256)) {
        header("Location:../register.php?error=21");
        exit();
    }

    if (strlen($password > 64)) {
        header("Location:../register.php?error=31");
        exit();
    }

    //Campos vacíos
    if ($user == "" || $email == "" || $password == "" || $rpassword == "") {
        header("Location:../register.php?error=12");
        exit();
    }

    //Términos y condiciones
    if (!isset($terms)) {
        header("Location:../register.php?error=13");
        exit();
    }
    
    //Control de correos duplicados
    $ismailset = "SELECT COUNT(*) FROM users WHERE email = '$email'";
    $stmt = $pdo->query($ismailset);

    if (($stmt->fetchColumn()) >= 1) {
        header("Location:../register.php?error=14");
        exit();
      }

    // //Encriptación de la contraseña
    // $securepass = password_hash($password, PASSWORD_BCRYPT);

    //Registro del nuevo usuario en la base de datos:
    
    // echo $user;
    // echo $email;
    // echo $password;
    
    $sql = "INSERT INTO users (user, email, password) VALUES (:user, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue(':user', $user);
    $stmt -> bindValue(':email', $email);
    $stmt -> bindValue(':password', $password); 
    $stmt -> execute();

    //Redirijo al login:
    header("Location:../login.php");
    exit();

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $form == "login"){

    $user = $_POST["user"];
    $password = $_POST["password"];
    
    //Compruebo si el usuario existe en la bdd
    $isuserset = "SELECT COUNT(*) FROM users WHERE user = '$user'";
    $stmt = $pdo->query($isuserset);

    if (($stmt->fetchColumn()) >= 1) {
        //Compruebo si el usuario existe en la base de datos.
        echo "El usuario existe";
        
        //Si existe compruebo que las contraseñas coincidan.
        $sql = "SELECT password FROM users WHERE user = '$user'";
        $objpass = $pdo->query($sql);
        $passverify = $objpass->fetchColumn();
        if ($passverify == $password) {
            //Si las contraseñas coinciden, el usuario se logea.
            echo "Usuario logeado.";
            //Recojo el email para almacenarlo en una variable de sesión.
            $sql = "SELECT email FROM users WHERE user = '$user'";
            $objmail = $pdo->query($sql);
            $email = $objmail->fetchColumn();
            //Inicio la sesión.
            session_start();
            //Almaceno variables de sesión para luego poder actualizarlas.
            $_SESSION['user'] = $user;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            //Redirijo al menú.
            header("Location:../menu.php");
            exit();
        }else {
            echo "Contraseña incorrecta";
        }
      }else {
        echo "El usuario no existe";
      }
} 

if ($logout == "true") {
    session_destroy();
    header("Location:../index.html");
}

?>