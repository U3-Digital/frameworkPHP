<?php

class Perfil{
    
    public static function ctrEditarPerfil(){


    if(isset($_POST["ctUsuario"])){


            ///////////////////FOTO DE PERFIL ///////////////////////////////////////
              $url="views/uploads/usuariosPerfil";
  
              list($ancho, $alto) = getimagesize($_FILES["subirFotoPerfil"]["tmp_name"]);
                      $nuevoAncho = 1000;
                      $nuevoAlto = 700;
                      $foto2 = "";
                      $nombreCredencial=$_POST["ctUsuario"];
  
                      if($_FILES["subirFotoPerfil"]["type"] == "image/jpeg"){
  
                          $ruta = "".$url."/".$nombreCredencial.".jpg";
  
                          $origen = imagecreatefromjpeg($_FILES["subirFotoPerfil"]["tmp_name"]);
  
                          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
                          imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
                          imagejpeg($destino, $ruta);

                      }
  
                      if($_FILES["subirFotoPerfil"]["type"] == "image/png"){
  
                          $ruta = "".$url."/".$nombreCredencial.".jpg";

                          $origen = imagecreatefrompng($_FILES["subirFotoPerfil"]["tmp_name"]);
  
                          $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
  
                          imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  
                          imagepng($destino, $ruta);
                      }
                
                      $rutaImagen=($ruta=="")?$_SESSION['foto']:$ruta;
             $datosController = array(
                                         "nombre"=>$_POST["ctNombre"],
                                         "email"=>$_POST["ctEmail"],
                                          "foto"=>$rutaImagen,
                                          "usuario"=>$_POST["ctUsuario"]
                                     );
          
                           
  
               $respuesta = MdlPerfil::mdlEditarPerfil($datosController, "usuarios");
      
               if($respuesta=="succes"){
  
                   echo "<script>Swal.fire({
                       icon: 'success',
                       title: 'Buen trabajo',
                       text: 'El Usuario ha sido Actualizado',
                       footer: ''
                      });</script>";
  
                  // header("location:index.php?action=inicio");
  
               }
              
  
          
          
 
        }
    }//ctrEditarPerfil

    public static function ctrCambiarContraseña(){


        if(isset($_POST["ctContraseñaAntigua"])){
            //echo"<script>console.log('entra')</script>";
            
           $encriptarAntigua = crypt($_POST["ctContraseñaAntigua"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
           $encriptarNueva = crypt($_POST["ctNuevaNuevaContraseña"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $datosController = array(
                                            "passwordAntigua"=>$encriptarAntigua,
                                            "passwordNueva"=>$encriptarNueva,
                                             "usuario"=>$_SESSION["usuario"]
                                        );

                                      //  echo"<script>console.log('".$datosController["passwordAntigua"]."')</script>";
                                       // echo"<script>console.log('".$datosController["passwordNueva"]."')</script>";
                                       // echo"<script>console.log('".$datosController["usuario"]."')</script>";
                //$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                               
      
                  $respuesta = MdlPerfil::mdlLeerContraseña($datosController, "usuarios");
                  echo"<script>console.log('respuessta ".$respuesta."')</script>";
                    if($respuesta==""){
      
                        echo "<script>Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'Contraseña Incorrecta',
                            footer: ''
                           });</script>";
      
                       // header("location:index.php?action=inicio");
      
                    }
                    else if($respuesta==true){
                        $respuesta = MdlPerfil::mdlUpdateContraseña($datosController, "usuarios");
                        if($respuesta=="succes"){
      
                            echo "<script>Swal.fire({
                                icon: 'success',
                                title: 'Buen trabajo',
                                text: 'La Contraseña ha sido Actualizada',
                                footer: ''
                               });</script>";
          
                           // header("location:index.php?action=inicio");
          
                        }
                    }
            }
        }//ctrValidarContraseña


        public static function ctrListarRoles(){

            $respuesta = MdlPerfil::mdlListarRoles("usuarios");
    
            foreach ($respuesta as $row => $item){
                echo  '<option value="'.$item["rol"].'">'.$item["rol"].'</option>';
            }
         }//ctrListarRoles


         public static function ctrListarNombreUsuario($valor)
         {
     
             $tabla = "usuarios";
     
             $respuesta = MdlPerfil::mdlListarNombreUsuario($tabla, $valor);
     
             return $respuesta;
         }
     
        

            
    public static function  ctrAgregarPerfil(){


        if(isset($_POST["ctNuevoUsuario"])){
    
    
                ///////////////////FOTO DE PERFIL ///////////////////////////////////////
                  $url="views/uploads/usuariosPerfil";
      
                  list($ancho, $alto) = getimagesize($_FILES["subirFotoPerfilNuevoUsuario"]["tmp_name"]);
                          $nuevoAncho = 1000;
                          $nuevoAlto = 700;
                          $nombrePerfil=$_POST["ctNuevoUsuario"];
      
                          if($_FILES["subirFotoPerfilNuevoUsuario"]["type"] == "image/jpeg"){
      
                              $ruta = "".$url."/".$nombrePerfil.".jpg";
      
                              $origen = imagecreatefromjpeg($_FILES["subirFotoPerfilNuevoUsuario"]["tmp_name"]);
      
                              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
      
                              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
      
                              imagejpeg($destino, $ruta);
    
                          }
      
                          if($_FILES["subirFotoPerfilNuevoUsuario"]["type"] == "image/png"){
      
                              $ruta = "".$url."/".$nombrePerfil.".jpg";
    
                              $origen = imagecreatefrompng($_FILES["subirFotoPerfilNuevoUsuario"]["tmp_name"]);
      
                              $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
      
                              imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
      
                              imagepng($destino, $ruta);
                          }
                    
                          $rutaImagen=($ruta=="")?$_SESSION['foto']:$ruta;

                          $encriptar = crypt($_POST["ctNuevoUsuarioContraseña"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                 $datosController = array(   "usuario"=>$_POST["ctNuevoUsuario"],
                                             "password"=>$encriptar,
                                              "nombre"=>$_POST["ctNuevoUsuarioNombre"],
                                              "email"=>$_POST["ctNuevoUsuarioEmail"],
                                              "rol"=>$_POST["inputGroupSelect01"],
                                              "foto"=>$rutaImagen
                                         );
              
                               
      
                   $respuesta = MdlPerfil::mdlAgregarPerfil($datosController, "usuarios");
          
                   if($respuesta=="succes"){
      
                       echo "<script>Swal.fire({
                           icon: 'success',
                           title: 'Buen trabajo',
                           text: 'El Usuario ha sido Agregado',
                           footer: ''
                          }).then(function() {
                            window.location = ' index.php?action=inicio';										
                        });</script>";
                         
      
                       //header("location:index.php?action=inicio");
      
                   }
            }
        }//ctrEditarPerfil

        public static function ctrListarUsuarios()
        {
    
            $tabla = "usuarios";
    
            $respuesta = MdlPerfil::mdlListarUsuario($tabla);
    
            foreach($respuesta as $row => $item){
                $switch=$item["activo"]=='S'?"checked":"";
                echo'
        
                 <tr>
                         <td>'.$item["usuario"].'</td>
                        <td>'.$item["nombre"].'</td>
                        <td>'.$item["email"].'</td>
                        <td>'.$item["rol"].'</td>
                       
                        <td>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" '.$switch.' class="custom-control-input" id="'.$item["usuario"].'">
                                    <label class="custom-control-label" name="'.$item["usuario"].'" for="'.$item["usuario"].'"></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="delete deletebtn text-danger" data-toggle="modal">
                                <i class="fa fa-fw fa-trash" data-toggle="tooltip"
                                title="Eliminar">
                                </i>
                                </a>
                            </div>
                        </div>
                     </td>
        
                    </tr>';
                    }    
        
        }//ctrListarUsuarios


       
        public static function  ctrActualizarEstadoUsuario($valor)
        {
    
            $tabla = "usuarios";
    
            $respuesta = MdlPerfil::mdlActualizarEstadoUsuario($tabla, $valor);
    
            return $respuesta;
        }//ctrActualizaEstadoUsuario


        public static function ctrEliminarCliente(){
			if(isset($_POST["delete_id"])){

                $datosController = $_POST["delete_id"];

				$respuesta = MdlPerfil::mdlEliminarCliente($datosController, "usuarios");
				if($respuesta=="success"){
					$sweetA="<script> 
				Swal.fire({
					icon: 'success',
					title: 'Operación completa',
					allowOutsideClick: false,
					allowEscapeKey:false,
					text: 'Se eliminó el cliente con éxito!',
				}).then(function() {
					window.location = 'index.php?action=inicio';										
				});
				</script>";
				echo $sweetA;
				}
				else {
					$sweetA="<script> 
				Swal.fire({
					icon: 'error',
					title: 'Operación incompleta',
					text: 'No se eliminó el cliente con éxito!',
				  });
				</script>";
				echo $sweetA;
				}

		}
	}//ctrEliminarCliente


    
}//perfil
  
