<?php

require_once "models\conexion.php";

class Ingreso{

    public static function mdlIngreso($datosModel,$tabla){

    
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario AND password=:password");

        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["password"]);
        

        $stmt -> execute();
        return $stmt ->fetch();
    }


}