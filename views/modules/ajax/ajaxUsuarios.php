<?php
require_once "../../../controllers/perfil/ctrPerfil.php";
require_once "../../../models/perfil/mdlPerfil.php";
require_once "../../../models/conexion.php";


class AjaxCategorias{

  /*=============================================
  VALIDAR USUARIO
  =============================================*/	



  public $validarCategoria;

  public function ajaxValidaUsuario(){

    $valor = $this->validarCategoria;
    $respuesta = Perfil::ctrListarNombreUsuario($valor);

    echo json_encode($respuesta);
  }

  
  /*=============================================
  ACTIVAR O DESACTIVAR USUARIO
  =============================================*/	



  public $activarUsuario;

  public function ajaxActivarUsuario(){

    $valor = $this->activarUsuario;
    $respuesta = Perfil::ctrActualizarEstadoUsuario($valor);

    echo json_encode($respuesta);
  }

  
  

  
}
if(isset($_POST["usuario"])){

    $valCategoria = new AjaxCategorias();
    $valCategoria -> validarCategoria = $_POST["usuario"];
    $valCategoria -> ajaxValidaUsuario();
  
  }




  if(isset($_POST["userId"])){

    $valCategoria = new AjaxCategorias();
    $valCategoria -> activarUsuario = $_POST["userId"];
    $valCategoria -> ajaxActivarUsuario();
  
  }