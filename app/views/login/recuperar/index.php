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
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
 	  <div class="col-md-3"></div>
 	  <div class="col-md-6">
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="POST" action="<?php echo ROUTE_URL; ?>login/recuperarCuentaData/"  >
              <h1>Recuperar Contraseña</h1>
              <div id="alert"><?php if(isset($data)) ?></div>
              <div>
              	<label>DNI</label>
                <input type="number" class="form-control" placeholder="DNI" id="dni" name="dni" required="" /><br>
              </div>
              <div>
                <button class="btn btn-success submit"  id="button">Enviar Correo</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
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
    <?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
  <script src="<?php echo ROUTE_URL; ?>js/route/login.js"></script>
  </body>
</html>
