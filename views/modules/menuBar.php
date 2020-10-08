
      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">

            <div class="card border-0">
                <img src="views/img/u3 grande.png" alt="" style="height:150px;">
            </div>
        </div>
        <div class="list-group list-group-flush">
          <a href="index.php?action=inicio" class="list-group-item list-group-item-action bg-light">Inicio</a>
          <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a> -->

        </div>
        <div class="sidebar-footer">
          <a href="index.php?action=usuarios" class="list-group-item list-group-item-action bg-light">Usuarios</a>

        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <!-- <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button> -->
        <a href=""> <i class="fas fa-bars" id="menu-toggle"></i></a>
        <div class="d-block d-sm-block d-md-none">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <?php echo $_SESSION["usuario"]?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?action=editarPerfil">Mi Perfil</a>
                  <a class="dropdown-item" href="#">Configuracion</a>
                  <a class="dropdown-item" href="#">Ayuda</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="views/modules/salir.php">Cerrar Sesion ( <?php echo $_SESSION["usuario"]?> )</a>
                </div>



        </div>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <?php echo $_SESSION["nombre"]?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?action=editarPerfil">Mi Perfil</a>
                  <a class="dropdown-item" href="#">Configuracion</a>
                  <a class="dropdown-item" href="#">Ayuda</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="views/modules/salir.php">Cerrar Sesion ( <?php echo $_SESSION["usuario"]?> )</a>
                </div>

              </li>
            </ul>
          </div>
        </nav>