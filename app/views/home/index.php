<?php require_once ROUTE_APP . '/views/layouts/header.php' ; ?>
<?php require_once ROUTE_APP . '/views/layouts/sidebar.php' ; ?>

<!--page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6">
                      <i class="fa fa-calendar"></i>
                      <span><?php echo date("d/m/Y", time()) ?></span> <b class="caret"></b>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6  ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Instrucciones <small></small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <ul class="list-unstyled timeline">
                        <li>
                          <div class="block">
                            <div class="tags">
                              <a href="javascript:void()" class="tag">
                                <span>Pre N°1</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a>¿Como puedo ver mis resultados?</a>
                                          </h2>
                              <div class="byline">
                              </div>
                              <p class="excerpt">Puedes visualizar tus resultados  en el panel a tu izquierda en la opción "Mis Resultados". Estarán Ordenados de acuerdo a la fecha de emisión y podrán ser descargado en formato PDF (Puedes visualizarlo en el navegador de tu preferencia).
                              </p>
                            </div>
                          </div>
                        </li>
                        <?php if($data['sesion']['sesion_idrol']== 3){ ?>
                        <li>
                          <div class="block">
                            <div class="tags">
                              <a href="javascript:void()" class="tag">
                                <span>Pre N°2</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a>¿Como puedo ver a mis pacientes?</a>
                            </h2>
                              <div class="byline">
                              </div>
                              <p class="excerpt">Puedes visualizar tus resultados  en el panel a tu izquierda en la opción "Pacientes". Dispondrás de un buscador mediante el cual cada paciente tendrá su historial de análisis
                              <br>Estarán Ordenados de acuerdo a la fecha de emisión y podrán ser descargado en formato PDF (Puedes visualizarlo en el navegador de tu preferencia).
                            </div>
                          </div>
                        </li>
                      <?php } ?>
                      <?php if($data['sesion']['sesion_idrol']== 4){ ?>
                        <li>
                          <div class="block">
                            <div class="tags">
                              <a href="javascript:void()" class="tag">
                                <span>Pre N°2</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a>¿Como puedo ver a mis empleados?</a>
                            </h2>
                              <div class="byline">
                              </div>
                              <p class="excerpt">Puedes visualizar tus resultados  en el panel a tu izquierda en la opción "Empleados". Dispondrás de un buscador mediante el cual cada paciente tendrá su historial de análisis
                              <br>Estarán Ordenados de acuerdo a la fecha de emisión y podrán ser descargado en formato PDF (Puedes visualizarlo en el navegador de tu preferencia).
                            </div>
                          </div>
                        </li>
                      <?php } ?>
                      <?php if($data['sesion']['sesion_idrol']== 1){ ?>
                        <li>
                          <div class="block">
                            <div class="tags">
                              <a href="javascript:void()" class="tag">
                                <span>Pre N°2</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a>¿Como puedo Agregar Resultados?</a>
                            </h2>
                              <div class="byline">
                              </div>
                              <p class="excerpt">Como Administrador puedes agregar, editar y eliminar resultados. Para ello, debes dirigirte al panel a tu izquierda en la opción "Resultados". Se desplegará una tabla con todos los resultados emitidos.
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="block">
                            <div class="tags">
                              <a href="javascript:void()" class="tag">
                                <span>Pre N°3</span>
                              </a>
                            </div>
                            <div class="block_content">
                              <h2 class="title">
                                <a>¿Como puedo Agregar Nuevos Usuarios?</a>
                            </h2>
                              <div class="byline">
                              </div>
                              <p class="excerpt">Como Administrador puedes agregar, editar y eliminar usuarios. Para ello, debes dirigirte al panel a tu izquierda en la opción "Lista de Usuarios". Se desplegará una tabla con todos los usuarios actuales.
                            </div>
                          </div>
                        </li>
                      <?php } ?>
                      </ul>

                    </div>
                  </div>
                </div>
                <div class="bs-example col-sm-6" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Buen día, <?php echo $data['sesion']['sesion_name'] ?>!</h1>
                      <p>Bienvenido al panel administrativo de la página web, desde este panel tienes el control de editar, agregar y eliminar aspectos importantes del sitio web. Cualquier consulta o problema debera ponerse en contacto con el <a href="mail:alexaguilar281@gmail.com">webmaster</a>.</p>
                    </div>
                  </div>



          </div>
        </div>
      </div>

         

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>