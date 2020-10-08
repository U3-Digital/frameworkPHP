<?php
 session_start();
    if(!$_SESSION["validar"]){
  header("location:index.php");
  exit();
}
  ?>



<div class="d-flex " id="wrapper">
<?php 
include "views\modules\menuBar.php";
$editarPerfil=new Perfil();
$editarPerfil->ctrAgregarPerfil();
$editarPerfil->ctrEliminarCliente();
?>
  <div class="container-fluid">
  <br />
  <form action="" method="post" enctype="multipart/form-data">
  		<div class="row">
			<div class="col-md-12 col-xs-12 text-center"><h2>Usuarios</h2></div>
		</div>
		<br />
		<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Agregar Usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ver Todos</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  
	<div class="container">
		<br>
	
		<div class="row">
			<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 ">
					<label>User Id</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="text" id="ctNuevoUsuario" name="ctNuevoUsuario" value="" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Contraseña</label>
				</div>
				<div class="col-md-6">
					<input type="password" class="text" id="ctNuevoUsuarioContraseña" name="ctNuevoUsuarioContraseña" value="" required>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<label>Confirmar Contraseña</label>
				</div>
				<div class="col-md-6">
					<input type="password" class="text" id="ctNuevoUsuarioConfirmarContraseña" name="ctNuevoUsuarioConfirmarContraseña" value="" onblur="revisarContraseña()" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Nombre</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="text" id="ctNuevoUsuarioNombre" name="ctNuevoUsuarioNombre" value="" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Email</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="text" id="ctNuevoUsuarioEmail" name="ctNuevoUsuarioEmail" value="" required>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Rol</label>
				</div>
				<div class="col-md-4">
				<select class="custom-select" id="inputGroupSelect01" name="inputGroupSelect01" required>
					<option disabled selected>Seleccionar</option>
					<?php 
						$editarPerfil=new Perfil();
						$editarPerfil->ctrListarRoles();
					?>
				</select>
				</div>
			</div>
			<br>
	
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="profile-img">
						<img src="views\img\user.png" alt="" id="imgFotoPerfilNuevo" name="imgFotoPerfilNuevo" style="max-width:250px;max-height:250px; "/>
						<div class="file btn btn-lg btn-primary pointer">
							Cambiar Foto
							<input type="file" class="" onchange="mostarImagen(event, 'imgFotoPerfilNuevo')" id="subirFotoPerfilNuevoUsuario" name="subirFotoPerfilNuevoUsuario" required/>
						</div>
					</div>
				</div>
			</div>
		</div>	<!-- col-md-6-->
<br>
		<div class="row">
				<div class="col-md-6 col-sm-12 float-left"></div>
				<div class="col-md-6 col-sm-12">
					<a type="button" class="btn btn-danger" href="index.php?action=inicio">Cancelar</a>
					<button type="submit" class="btn btn-primary">Agregar Usuario</button>
				</div>
			</div>
		

	</div>
	</form>
	<br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"><div id="" class="mensajes"></div></div>
		<div class="col-md-4"></div>
	</div>
  </div><!-- AGREGAR USUARIO -->

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <div class="row">
            <div class="col-md-12">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12  overflow-auto">
							<table id="example" class="table table-bordered table-striped">
								<thead>
								<tr>
									
									<th>Usuario</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Rol</th>
									<th style="width:2.5em;">Acciones</th>
								
								</tr>
								</thead>
									<tbody>
									<?php 
										$listarUsuarios=new Perfil();
										$listarUsuarios->ctrListarUsuarios();
									?>
								</tbody>

								</table>
						</div>
					</div>
				</div> 
            </div>
        </div>
  </div><!-- tab ver todos -->




</div>



  </div>
</div>
<!-- Delete Modal HTML -->
<div id="deletemodal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST">
						<div class="modal-header">
							<input type="hidden" name="delete_id" id="delete_id">
							<h4 class="modal-title">Eliminar Cliente</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>¿Estás seguro que deseas eliminar este cliente?</p>
							<p class="text-warning"><small>Esta acción no podrá regresarse.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="submit" name="deletedata" class="btn btn-danger" value="Eliminar">
						</div>
					</form>
				</div>
			</div>
		</div>
<script src="views\js\usuarios.js"></script>

