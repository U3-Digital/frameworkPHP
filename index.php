<?php
// Modifiqué los links del menú de Administrador
require_once "models/enlaces.php";
require_once "models/login/mdlsIngreso.php";
require_once "models/perfil/mdlPerfil.php";

require_once "controllers/enlaces.php";
require_once "controllers/perfil/ctrPerfil.php";
require_once "controllers/template.php";
require_once "controllers/login/ctrLogin.php";


$template = new TemplateController();
$template -> template();
?>