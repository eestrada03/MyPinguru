<?php

//Esta es la clase que conectará a la base de datos mediante PDO (Un objeto) para añadir una capa de seguridad extra.

class Conexion extends PDO{

//Defino los atributos privados para acceder a la base de datos mediante PDO.

    private $hostbd = "localhost";
    private $bdname = "mypinguru";
    private $username = "edib";
    private $bdpassword = "edib";

//Creo la función construct para que ejecute la conexión y utilizo un try catch en caso de cualquier tipo de error en la conexión.

    public function __construct(){
        try {
            parent::__construct('mysql:host='.$this->hostbd.';dbname='.$this->bdname.';charset=utf8', $this->username, $this->bdpassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
            exit;

        }
    }

}

?>