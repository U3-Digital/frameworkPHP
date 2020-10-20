<?php



class MdlPerfil{

    public static function mdlEditarPerfil($datosModel,$tabla){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email,photo=:foto WHERE usuario=:usuario");
        $stmt -> bindParam(":nombre",$datosModel["nombre"]);
        $stmt -> bindParam(":email",$datosModel["email"]);
        $stmt -> bindParam(":foto",$datosModel["foto"]);
        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
      
        if($stmt -> execute()==true){
            return "succes";
        }
        else{
            return "falied";
        }
        
    }

    public static function mdlCargarPerfil($tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario");
        $stmt -> bindParam(":usuario",$_SESSION['usuario']);
      
        $stmt -> execute();
        return $stmt->fetch();
        
    }
    public static function mdlListarRoles($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT distinct rol FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
	}


    
	static public function mdlListarNombreUsuario($tabla, $valor)
	{

        $stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario=:usuario");
        $stmt -> bindParam(":usuario",$valor);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public static function mdlAgregarPerfil($datosModel,$tabla){
        // echo "<script>console.log('".$datosModel["usuario"]."');</script>";
        // echo "<script>console.log('".$datosModel["password"]."');</script>";
        // echo "<script>console.log('".$datosModel["nombre"]."');</script>";
        // echo "<script>console.log('".$datosModel["email"]."');</script>";
        // echo "<script>console.log('".$datosModel["foto"]."');</script>";
        // echo "<script>console.log('".$datosModel["rol"]."');</script>";

        $activo='S';
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario,password,nombre,email,photo,rol,activo)
        VALUES(:usuario,:password,:nombre,:email,:photo,:rol,:activo)");
        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["password"]);
        $stmt -> bindParam(":nombre",$datosModel["nombre"]);
        $stmt -> bindParam(":email",$datosModel["email"]);
        $stmt -> bindParam(":photo",$datosModel["foto"]);
        $stmt -> bindParam(":rol",$datosModel["rol"]);
        $stmt -> bindParam(":activo",$activo);

      
        if($stmt -> execute()==true){
            return "succes";
        }
        else{
            return "falied";
        }
        
    }

    public static function mdlVerificarEmail($email,$tabla){
        // echo "<script>console.log('".$datosModel["usuario"]."');</script>";
        // echo "<script>console.log('".$datosModel["password"]."');</script>";
        // echo "<script>console.log('".$datosModel["nombre"]."');</script>";
        // echo "<script>console.log('".$datosModel["email"]."');</script>";
        // echo "<script>console.log('".$datosModel["foto"]."');</script>";
        // echo "<script>console.log('".$datosModel["rol"]."');</script>";

        $stmtVerificarContrasena = Conexion::conectar()->prepare("SELECT COUNT(email) FROM $tabla WHERE email=:email");
        $stmtVerificarContrasena -> bindParam(":email",$email );
        $stmtVerificarContrasena -> execute();
        return $stmtVerificarContrasena->fetch();
    
        
    }











    
    static public function mdlLeerContraseña($datosModel, $tabla)
	{
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario AND password=:password");
        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["passwordAntigua"]);
        $stmt->execute();
        // return $stmt->fetch();

        if($stmt->fetch()==true){
            return true;
        }
        else{
            return
            false;
        }
        
    }

    
    static public function mdlUpdateContraseña($datosModel, $tabla)
	{
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password=:password WHERE usuario=:usuario");
        $stmt -> bindParam(":usuario",$datosModel["usuario"]);
        $stmt -> bindParam(":password",$datosModel["passwordNueva"]);
     
        // return $stmt->fetch();

        if($stmt->execute()==true){
            return "succes";
        }
        else{
            return "falied";
        }
        
    }
    

    static public function mdlListarUsuario($tabla)
	{

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();

    }//mdl listar usuario


    static public function mdlActualizarEstadoUsuario($tabla, $valor)
	{
        
        $palabras  =strval($valor) ;//convierte a string

        // Divido el string de nombre de personas por los espacios
        $palabras = explode("-", $palabras);
        $usuario=$palabras[0]; 
        $estadoAnterior=$palabras[1]; 
        $activo= $estadoAnterior=='true'?"N":"S";
    
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla set activo=:activo WHERE usuario=:usuario");
        $stmt -> bindParam(":usuario",$usuario);
        $stmt -> bindParam(":activo",$activo);
         if($stmt->execute()==true){
             return "succes";
         }
       

    }//mdlActualizarEstadoUsuario

    public static function mdlEliminarCliente($datosModel,$tabla){
        echo "<script>console.log('".$datosModel."');</script>";
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE usuario = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";
			//$print= $stmt->errorInfo();
			// print_r ($print);
		}

		else{
			$print= $stmt->errorInfo();
			 print_r ($print);
			return $print;


		}

		$stmt->close();


	}//mdlEliminarCliente

}