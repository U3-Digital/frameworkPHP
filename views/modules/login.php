
<?php
$login = new Login();
$login -> ctrIngreso();
$login->ctrRecuperarContrasena();
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
      <a class="underlineHover" href="#squarespaceModal" data-toggle="modal">¿Olvidaste la Contraseña?</a>
    </div>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="col-md-4">     
                <label for="usuarioRecuperar" class="col-form-label">Email</label><br>
                <input type="text" class="form-control cajas-login" id="emailRecuperar" name="emailRecuperar">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Recuperar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- line modal -->
<!-- 
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Recuperar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
      <div class="container">
     
        <div class="row">
            <div class="form-group">
                <label for="usuarioRecuperar" class="col-form-label">Nombre de Usuario</label><br>
                <input type="text" class="form-control" id="usuarioRecuperar">
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                <label for="emailRecuperar" class="col-form-label">Email</label><br>
                <input type="text" class="form-control" id="emailRecuperar">
              </div>
              </div>
              </div>
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div> -->