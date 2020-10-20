<?php
 session_start();
    if(!$_SESSION["validar"]){
  header("location:index.php");
  exit();
}
  ?>



<div class="d-flex " id="wrapper">
<?php 
include "views/modules/menuBar.php";
?>
  <div class="container-fluid">
    contenido
  </div>
</div>




