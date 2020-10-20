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

    public static function ctrRecuperarContrasena(){
        if(isset($_POST["emailRecuperar"])){

            $email=$_POST["emailRecuperar"];

        $respuesta = Ingreso::mdlRecuperarContrasena($email,"usuarios");
    
        // print_r($respuesta);
        // echo"<script>console.log('password respuesta -->".$respuesta[0]."<--')</script>";
        if($respuesta[0]==0){
            echo "<script> 
            Swal.fire({
                icon: 'warning',
                title: 'No existe en la Base de Datos',
                allowOutsideClick: false,
                allowEscapeKey:false,
                text: 'Este correo no esta asociado a ninguna cuenta',
            });
            </script>";
        }
        else{

            // $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            // $Nuevapassword = "";
            // //Reconstruimos la contraseña segun la longitud que se quiera
            // for($i=0;$i<10;$i++) {
            //    //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            //    $Nuevapassword .= substr($str,rand(0,60),1);
            // }
            
        //    $Nuevapassword = "haou231hnhh";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // Output: 54esmdr0qf
        $Nuevapassword= substr(str_shuffle($permitted_chars), 0, 10);
    
            $newPassword = crypt($Nuevapassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $respuesta = Ingreso::mdlCambiarContrasena($email,"usuarios",$newPassword);

            if($respuesta=="succes"){


            

    $recipient = $email;

    // Set the email subject.
    $subject = "Recuperar Contraseña ";

    // Build the email content.
    // Build the email content.
    $email_content ='
    <html>
        <style>
            font-family: "Arial", sans-serif;
            font-size: 16px;

            .espacio {
                display:flex;
                width:100%;
                justify-content: space-between;  
            }
            h1 {
                color: #6c2eb9;
                font-weight: normal;
                font-size: 40px;
                font-family: Arial;
                text-transform: uppercase;
              }
              h2 {
                color: #3c1b66;
                font-weight: normal;
                font-size: 35px;
                font-family: Arial;
                text-transform: uppercase;
              }
              h3 {
                color: #443963;
                font-weight: normal;
                font-size: 30px;
                font-family: Arial;
                text-transform: lowercase;
              }
              h4 {
                color: #4f4866;
                font-weight: normal;
                font-size: 25px;
                font-family: Arial;
                text-transform: lowercase;
              }
              h5 {
                color: #656172;
                font-weight: normal;
                font-size: 30px;
                font-family: Arial;
                text-transform: uppercase;
              }

            .element1 { margin-right : 20px; float:left; }
            .element2 { float:left; }
        </style>
        <body>';
    $email_content .='<img src="www.dineraliahm.com/views/img/u3%20mediano.jpg" alt="U3">';
    $email_content.='
    <p width = 100% class="text-justify">
        <h5>Solicitud de Reestablecimiento de contraseña</h5>
    <p>
    
    <p>
    Inicia sesion con tu mismo usuario y con esta contraseña:
    </p>

    <h4 class="text-justify"><strong>'.$Nuevapassword.'<strong><h4>
    

    
    <hr></br>';
    


        // Build the email headers.
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From:info@U3Digital.com" . "\r\n";
       
       // print_r($email_content); 
        // Send the email.
        if (mail($recipient, $subject, $email_content, $headers)) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Exito',
                text: 'La Contraseña se envio a Su Correo',
                footer: ''
               });</script>";
        } else {
            echo "<script> 
            Swal.fire({
                icon: 'warning',
                title: 'Upps!',
                allowOutsideClick: false,
                allowEscapeKey:false,
                text: 'Algo Salio Mal',
            });
            </script>";
        }

        }//else
    }//if succes
    }//emailRecuperar
        
    
        }//ctrrecuperar
    
}