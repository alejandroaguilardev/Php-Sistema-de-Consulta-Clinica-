<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $data['title']; ?>  </title>

    <!-- Bootstrap -->
    <link href="<?php echo ROUTE_URL; ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo ROUTE_URL; ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo ROUTE_URL; ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo ROUTE_URL; ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo ROUTE_URL; ?>css/custom.css" rel="stylesheet">
    <link rel="icon" href="<?php echo ROUTE_URL; ?>img/dafft.ico" type="image/ico" />
  </head>

  <body class="login" >
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="container-fluid">
	 	  <div class="row">
	 		<div class="col-md-6" >
	 			<div  style="background: url(<?php echo ROUTE_URL; ?>img/login/referencias.jpg);background-size: cover;height: 100vh;width: 100%;"></div>
	 		</div>
    <div class=" col-md-6  col-lg-4 offset-lg-1">

		      <div class="login_wrapper">
		        <div class="animate form login_form">
		          <section class="login_content">
		          	<img src="<?php echo ROUTE_URL; ?>img/dafft.svg" style="width: 70%;"><hr>
		            <form id="login" role="form" onsubmit="referencias('<?php echo ROUTE_URL; ?>login/sesion');return false">
		              <h2>Resultados en Línea</h2>
		              <h1 class="title-login">Referencias</h1>
		              <p>Acceder  a la plataforma con tu cuenta de usuario</p>
		              <div id="alertLogin"></div>
		              <div>
		                <input type="number" class="form-control" placeholder="RUC" id="dni" name="dni" required="" />
		              </div>
		              <div>
		                <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password"required="" />
		                <input type="hidden" name="rols" value="4">
		              </div>
		              <div>
		                <button class="btn btn-success submit" >Iniciar Sesión</button>
		              </div>

		              <div class="clearfix"></div>

		              <div class="separator">
		                <p class="change_link">
		                  <a href="<?php echo ROUTE_URL."login/recuperarCuenta/" ?>" class="to_register"> ¿Olvidaste tu Contraseña? </a>
		                </p>

		                <div class="clearfix"></div>
		                <br />

		                <div>
		                  <h1><i class="fa fa-gear"></i>  Dafft ¡Tu Laboratorio Clínico !</h1>
		                  <p>©2020 Todos los derechos Reservados.  <br><a href="#" target="_blank" >Terminos y Condiciones</a></p>
		                </div>
		              </div>
		            </form>
		          </section>
		        </div>

		      </div>
		  </div>
		</div>
	</div>
    </div>
<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
  <script src="<?php echo ROUTE_URL; ?>js/route/login.js"></script>
  </body>
</html>
