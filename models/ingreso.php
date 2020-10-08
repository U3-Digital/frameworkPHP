<?php

require_once "conexion.php";

class IngresoModels{

    public static function ingresoModel($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario AND password=:password");

        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["password"]);
        

        $stmt -> execute();
        return $stmt ->fetch();

        // $stmt->close();
 



    }

}