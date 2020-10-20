
<?php
 session_start();
    if(!$respuesta["validar"]){
  header("location:index.php");
  exit();
}
  ?>


<div class="d-flex " id="wrapper">
<?php 
include "menuBar.php";
$editarPerfil=new Perfil();
$editarPerfil->ctrEditarPerfil();
$editarPerfil->ctrCambiarContraseña();



$respuesta = MdlPerfil::mdlCargarPerfil("usuarios");
?>
  <div class="container-fluid">
  	<br />
  		<div class="row">
			<div class="col-md-12 col-xs-12 text-center"><h2>Tu Perfil de Usuario</h2></div>
		</div>
		<br /><br />
		<form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo $respuesta['photo']?>" alt="" id="imgFotoPerfil" name="imgFotoPerfil"/>
							<div class="file btn btn-lg btn-primary pointer">
                                Cambiar Foto
                                <input type="file" class="" onchange="mostarImagen(event, 'imgFotoPerfil')" id="subirFotoPerfil" name="subirFotoPerfil"/>
                            </div>
                        </div>
                    </div>
	
                    <div class="col-md-6">
                        <div class="profile-head">
							<h3><?php echo $respuesta['nombre']?></h3>
						      
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mi Perfil</a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar Contraseña</a>
									<!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-todosUsuarios" role="tab" aria-controls="nav-profile" aria-selected="false">Todos los Usuarios</a> -->
						
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								
									<div class="row">
										<div class="col-md-6">
											<label>User Id</label>
										</div>
										<div class="col-md-6">
											<input type="caja" class="cajasEditar" id="ctUsuario" name="ctUsuario" value="<?php echo $respuesta['usuario']?>" readonly required>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Nombre</label>
										</div>
										<div class="col-md-6">
											<input type="caja" class="cajasEditar" id="ctNombre" name="ctNombre" value="<?php echo $respuesta['nombre']?>" required>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Email</label>
										</div>
										<div class="col-md-6 ">
											<input type="caja" class="cajasEditar" id="ctEmail" name="ctEmail" value="<?php echo $respuesta['email']?>" required>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6 col-sm-12 float-left"></div>
										<div class="col-md-6 col-sm-12">
											<a type="button" class="btn btn-danger" href="index.php?action=inicio">Cancelar</a>
											<button type="submit" class="btn btn-primary">Guardar Cambios</button>
										</div>
									</div>
								</form>
								<br>
								
								</div><!-- tab mi perfil -->
								

								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="row">
								<div class="col-md-12">
									<form action="" method="post" id="enviarFormularioCambiarContraseña">
									
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<label>Contraseña Antigua</label>
														</div>
														<div class="col-md-6">
															<input type="password" class="cajasEditar" id="ctContraseñaAntigua" name="ctContraseñaAntigua" value="" required>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<label>Nueva Contraseña</label>
														</div>
														<div class="col-md-6">
															<input type="password" class="cajasEditar" id="ctNuevaContraseña" name="ctNuevaContraseña" value="" required>
														</div>
													</div>

													<div class="row">
														<div class="col-md-6">
															<label>Nueva Contraseña</label>
														</div>
														<div class="col-md-6">
															<input type="password" class="cajasEditar" id="ctNuevaNuevaContraseña" name="ctNuevaNuevaContraseña"onblur="confirmarContrsena()" value="" required>
														</div>
													</div>
													<br>
														<div class="row">
															<div class="col-md-6 col-sm-12"></div>
															<div class="col-md-6 col-sm-12">
																<a type="button" class="btn btn-danger" href="index.php?action=inicio">Cancelar</a>
																<button type="submit" class="btn btn-primary" id="enviarCambiarContraseña">Cambiar</button>
															</div>
														</div>
													</div>
											</div><!-- row -->
											</form>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2"></div>
									<div class="col-md-8"><div id="" class="mensajes"></div></div>
									<div class="col-md-2"></div>
								</div>
								</div><!-- tab cambiar contrase;a usuario -->

								
							</div>
                        </div>
                    </div>
                </div>
			
</div>


