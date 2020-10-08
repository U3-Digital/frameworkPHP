<?php
error_reporting(0);
class Login{

    public static function ctrIngreso(){
    if(isset($_POST["usuarioIngreso"])){

        echo"<script>console.log('Post Paswword ingreso -->".$_POST['passwordIngreso']."<--')</script>";
        $encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        echo"<script>console.log('encriptada ingreso -->".$encriptar."<--')</script>";

        
    //    $datosController = array("usuario"=> $_POST["usuarioIngreso"],
    //                             "password"=>$_POST["passwordIngreso"]);

    $datosController = array("usuario"=> $_POST["usuarioIngreso"],
                                 "password"=>$encriptar);
    $respuesta = Ingreso::mdlIngreso($datosController,"usuarios");

    echo"<script>console.log('password respuesta -->".$respuesta["password"]."<--')</script>";

    if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar){
    // if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
                        session_start();
                        // echo "<script>console.log('".$respuesta["usuario"]."')</script>";
						$_SESSION["validar"] = true;
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["rol"] = $respuesta["rol"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["sistema"] = $respuesta["sistema"];
                        $_SESSION["foto"] = $respuesta["photo"];
                        $_SESSION["id"] = $respuesta["id_usuario"];

       
      header("location:index.php?action=inicio");
    
    }
    else{

     echo '<div class="alert alert-danger">Verifique Usuario/Contraseña</div>';

       // echo "error al ingresar";
    }
}
    

    }
}