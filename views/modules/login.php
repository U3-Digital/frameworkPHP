
<?php
$login = new Login();
$login -> ctrIngreso();
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="views/img/u3 grande.png" class="d-inline-block align-top" id="icon" alt="Empresa Logo" style="height:150px; width:150px;"/>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="usuarioIngreso" class="fadeIn second" name="usuarioIngreso" placeholder="Usuario">
      <input type="password" id="passwordIngreso" class="fadeIn third" name="passwordIngreso" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">¿Olvidaste la Contraseña?</a>
    </div>

  </div>
</div>