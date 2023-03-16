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
    if (strlen($user) > 20) {
        header("Location:../register.php?error=11");
        exit();
    }

    if (strlen($email) > 256) {
        header("Location:../register.php?error=21");
        exit();
    }

    if (strlen($password) > 64) {
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
            header("Location:../login.php?error=14");
            exit();
        }
      }else {
        header("Location:../login.php?error=15");
        exit();
      }
} 

//Cambiar datos del perfil:
$update = $_GET["update"];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $update == ("user"||"email"||"password")) {
    $password = $_POST["password"];
    $param = $_POST["param"];
    //Verifico que la contraseña es correcta.
    session_start();    
    $user = $_SESSION['user'];
    $sql = "SELECT password FROM users WHERE user = '$user'";
    $objpass = $pdo->query($sql);
    $passverify = $objpass->fetchColumn();
    if ($passverify == $password){
        echo "Contraseña correcta";
        //Si la contraseña es correcta, se procede a cambiar el parámetro deseado.
        switch ($update) {
            case 'user':
                $newuser = $param;  
                //Valido el parámetro:
                //Limitación del número de caracteres
                if (strlen($newuser > 20)) {
                header("Location:../miperfil.php?error=11");
                exit();
                }
                //Campo vacío
                if ($newuser == "") {
                    header("Location:../miperfil.php?error=12");
                    exit();
                }

                //Una vez validado, actualizo el usuario en la base de datos.
                $sql = "UPDATE users SET user = '$newuser' WHERE user = '$user'";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $_SESSION['user'] = $newuser;
                //Usuario actualizado.
                header("Location:../miperfil.php");
                break;

                case 'email':
                $newemail = $param;
                $email = $_SESSION['email'];
                //Valido el parámetro:
                //Limitación del número de caracteres
                if (strlen($newemail > 256)) {
                header("Location:../miperfil.php?error=21");
                exit();
                }
                //Campo vacío
                if ($newemail == "") {
                    header("Location:../miperfil.php?error=12");
                    exit();
                }

                //Una vez validado, actualizo el email en la base de datos.
                $sql = "UPDATE users SET email = '$newemail' WHERE email = '$email'";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $_SESSION['email'] = $newemail;
                //Email actualizado.
                header("Location:../miperfil.php");
                break;

                case 'password':
                $newpassword = $param;
                $password = $_SESSION['password'];
                //Valido el parámetro:
                //Limitación del número de caracteres
                if (strlen($newpassword > 64)) {
                header("Location:../miperfil.php?error=31");
                exit();
                }
                //Campo vacío
                if ($newpassword == "") {
                    header("Location:../miperfil.php?error=12");
                    exit();
                }

                //Una vez validado, actualizo el password en la base de datos.
                $sql = "UPDATE users SET password = '$newpassword' WHERE user = '$user'";
                $stmt = $pdo->prepare($sql);
                $stmt -> execute();
                $_SESSION['password'] = $newpassword;
                //Contraseña actualizada.
                header("Location:../miperfil.php");
                break;
               
 
        }
    }else {
        echo "Contraseña incorrecta";
    }
}

//Cerrar sesión:
if (isset($logout) && $logout == "true") {
    session_destroy();
    header("Location:../index.html");
}

?>