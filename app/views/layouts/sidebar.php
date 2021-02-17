<div class="col-md-3 left_col"> 
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo ROUTE_URL; ?>home"  class="site_title"><img src="img/dafft-white.svg" style="height: 4rem;padding: .5rem"></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo ROUTE_URL; ?>img/users/user.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Bienvenido,</span>
        <h2><?php echo $data['sesion']['sesion_name']; ?></h2>
        <p class="text-white"> <?php echo $data['sesion']['sesion_rol']; ?></p>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="<?php echo ROUTE_URL; ?>home"><i class="fa fa-home"></i> Home</a></li>
          <?php if($data['sesion']['sesion_idrol']== 1){ ?>
            <li><a><i class="fa fa-clone"></i>Resultados <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo ROUTE_URL; ?>ResultadosAgregar/">Agegar Resultados</a></li>
              <li><a href="<?php echo ROUTE_URL; ?>resultados/">Lista de Resultados</a></li>
            </ul>
          </li>
          <?php } ?>
          <?php if($data['sesion']['sesion_idrol']== 3){ ?>
          <li><a href="<?php echo ROUTE_URL; ?>pacientes/"><i class="fa fa-users"></i> Pacientes</a></li>
          <?php }?>
          <?php if($data['sesion']['sesion_idrol']== 4){ ?>
          <li><a href="<?php echo ROUTE_URL; ?>empleados/"><i class="fa fa-bar-chart-o"></i> Empleados</a></li>
          <?php } ?>
          <?php if($data['sesion']['sesion_idrol']== 1){ ?>
          <li><a href="<?php echo ROUTE_URL; ?>usuarios/"><i class="fa fa-user"></i> Usuarios</a></li>
         <?php } ?>
         <?php if($data['sesion']['sesion_idrol']!= 4){ ?>
            <li><a href="<?php echo ROUTE_URL; ?>MisResultados/"><i class="fa fa-clone"></i> Mis Resultados</a></li>
          <?php } ?>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <!-- <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Opciones">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Perfil">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Ayuda">
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Salir" href="#">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div> -->
    <!-- /menu footer buttons -->
  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo ROUTE_URL; ?>img/users/user.png" alt=""><?php echo $data['sesion']['sesion_name']; ?>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="<?php echo ROUTE_URL; ?>cambiarPassword"> Cambiar Contraseña</a>
     <!--            <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Opciones</span>
              </a> -->
<!--           <a class="dropdown-item"  href="javascript:;">Ayuda</a>
 -->            <a class="dropdown-item"  href="<?php echo ROUTE_URL; ?>login/logout"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a>
          </div>
        </li>

 
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->