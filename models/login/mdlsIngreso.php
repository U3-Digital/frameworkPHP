<?php

require_once "models/conexion.php";

class Ingreso{

    public static function mdlIngreso($datosModel,$tabla){

    
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario AND password=:password");

        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["password"]);
        

        $stmt -> execute();
        return $stmt ->fetch();
    }
    public static function mdlRecuperarContrasena($email,$tabla){

    
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(email) FROM $tabla WHERE email=:email");

        $stmt -> bindParam(":email",$email);
        $stmt -> execute();
        return $stmt ->fetch();
    }

    public static function mdlCambiarContrasena($email,$tabla,$newPassword){

    
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password=:pass WHERE email=:email");

        $stmt -> bindParam(":email",$email);
        $stmt -> bindParam(":pass",$newPassword);
        
        if($stmt->execute()==true){
            return "succes";
        }
        
    }
    
}