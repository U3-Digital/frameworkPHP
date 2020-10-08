
<?php

class EnlacesModels{

	public static function enlacesModel($enlaces){

		if($enlaces == "inicio" ||
		    $enlaces == "ingreso" ||
		   $enlaces == "lostPassword"){
		   //$enlaces == "usuarios" ||
		   //$enlaces == "galeria" ||
		   //$enlaces == "videos" ||
		   //$enlaces == "suscriptores" ||
		   //$enlaces == "mensajes" ||
		   //$enlaces == "perfil" ||
		   //$enlaces == "nuevoItem"){

			$module = "views/modules/".$enlaces.".php";
		}

		else if($enlaces == "index"){
			$module = "views/modules/login.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}else if($enlaces == "editarPerfil"){
			$module = "views/modules/editarPerfil.php";
			// echo "<script>console.log('".$module."')</script>";
		}
		else if($enlaces == "usuarios"){
			$module = "views\modules\usuarios.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		else if($enlaces == "registrar"){
			$module = "views/modules/templateB/registar.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		else if($enlaces == "buscarB"){
			$module = "views/modules/templateB/buscarB.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		else if($enlaces == "mientras"){
			$module = "views/modules/templateB/mientras.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		else if($enlaces == "cachito"){
			$module = "views/modules/templateB/cachito.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		//////////////////////////////// CLIENTES ////////////////////////////////////
		else if($enlaces == "nuevo_cliente"){
			$module = "views/modules/templateB/registar.php";
			//echo "<script>console.log('".$enlaces."')</script>";
		}
		

		else{
			$module = "views\modules\login.php";
		}

		return $module;

	}


}
