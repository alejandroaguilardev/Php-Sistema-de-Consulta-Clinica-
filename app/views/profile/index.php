<?php require_once ROUTE_APP . '/views/layouts/header.php' ; ?>
<?php require_once ROUTE_APP . '/views/layouts/sidebar.php' ; ?>

<div class='right_col' role='main'>
  	<div> 
    	<div class='page-title'>
	        <div class='title_left'>
	          	<h3><?php echo $data['routeTitle'] ?> </h3>
	        </div>
    	</div>
    	<div class='clearfix'></div>
    	<div class='row'>
      		<div class='col-md-12 col-sm-12 ' >
      			<div class='x_panel'>
	      			<div class='x_title'>
				        <h2><?php echo  $data['routeSubTitle']?>: <small> <?php echo  $data['routeparagraph']?></small></h2>
				        <ul class='nav navbar-right panel_toolbox'>
				          	<li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
				          	</li>
				          	<li><a class='close-link'><i class='fa fa-close'></i></a></li>
				        </ul>
		        		<div class='clearfix'></div>
	      			</div>
	      			<div class='x_content'>
                     	<div class='row'>
                          	<div class='col-sm-12'>
                          		<div id="alert">
                          			<?php if(isset($_GET['insert'])){ 
                          				$data=$_GET['insert'];
                          					if($data==1){ ?>
											<div class="alert alert-success alert-dismissible " role="alert">Se ha Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php }elseif($data==0){ ?>
										<div class="alert alert-danger alert-dismissible " role="alert">Error al Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php } }?>
                          		</div>
                          		<center><h3>Recuperar Contraseña</h3></center>
                            	<form id ="restorePassword"method="post"  class="new" name="new" role="form" action="<?php echo ROUTE_URL;?>CambiarPassword/cambiar" >
							        <div class='modal-body'>
							            <div class='row'>
							                <div class='col-md-3'></div>
							                <div class='col-md-6'>
						                      <div>
						                      	<label>Contraseña Actual</label>
								                <input type="password" class="form-control" placeholder="Contraseña Actual" id="password_old" name="password_old" minlength="4"  required="required" />
								              </div>
								              <hr>
								              <div>
						                      	<label>Contraseña Nueva</label>
								                <input type="password" class="form-control" placeholder="Contraseña Nueva" id="password" name="password" minlength="4"  required="required" />
								              </div><br>
								              <div>
						                      	<label>Repetir Contraseña</label>
								                <input type="password" class="form-control" onkeyup="passwordRepeat()" placeholder="Repetir Contraseña" id="password2" required='required'>
								                <span id="error_password"></span>
								              </div>
							                </div>
							            </div>
							        </div>
							        <div class='modal-footer'>
							            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
							            <button type='submit' class='btn btn-success'>Guardar</button>
							        </div>
							    </form>
                  			</div>
                		</div>
			        </div>
	 		 	</div>
			</div>
		</div>
	</div>
</div>

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<script src="<?php echo ROUTE_URL; ?>js/route/login.js"></script>
<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>