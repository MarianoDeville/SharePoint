<?php

    $host="localhost";
    $bd="sharepoint";
    //$usuario="mycolabora";
    $usuario="root";
    //$contraseña="b0tMjbxz";
    $contraseña="";

    try {
        
        $conexion=new PDO("mysql:host=$host;dbname=$bd", $usuario, $contraseña);

    } catch (Exception $ex) {
        
        echo $ex->getMessage();
    }
?>
