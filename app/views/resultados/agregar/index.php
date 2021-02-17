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
                          			<?php if(isset($data['operacion'])){ 
                          					if($data['operacion']==1){ ?>
											<div class="alert alert-success alert-dismissible " role="alert">Se ha Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php }elseif($data['operacion']==0){ ?>
										<div class="alert alert-danger alert-dismissible " role="alert">Error al Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php } }?>
                          		</div>    
                            	<form method="post"  class="new" name="new" role="form" action="<?php echo ROUTE_URL;?>resultadosAgregar/create"  enctype="multipart/form-data">
							        <div class='modal-body'>
							            <div class='row'>

							                <div class='col-md-12'>
						                        <div class='form-group row'>
						                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='type'>Paciente <span class="required" >(*)</span></label>
						                        	<div class="col-md-8 col-sm-9 form-group has-feedback">
														     <select class="form-control selectpicker" name="user" data-live-search="true" required>
										                    <?php foreach ($data['users'] as $key ) {
										                    	if($key->idrol!=4){?>
						                                        <option value='<?php echo $key->iduser; ?>'><?php echo $key->dni; ?> : <?php echo $key->name; ?></option>
										                    <?php } } ?>
						                            	</select>
						                        	</div>
						                        </div>
						                        <div class='form-group row'>
						                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='type'>Empresa <span class="required" >(*)</span></label>
						                        	<div class="col-md-8 col-sm-9 form-group has-feedback">
														     <select class="form-control selectpicker" name="company" data-live-search="true" required>
						                                        <option value='0' selected>Particular</option>
										                    	<?php foreach ($data['users'] as $key ) {
										                    	if($key->idrol==4){?>
						                                        <option value='<?php echo $key->iduser; ?>'><?php echo $key->dni; ?> : <?php echo $key->name; ?></option>
										                    <?php } }?>
						                            	</select>
						                        	</div>
						                        </div> 

						                        <div class='form-group row'>
						                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='description'>Descripcion <span  >(Opcional)</span></label>
						                        	<div class="col-md-8 col-sm-9 ">
						                            	<textarea class='form-control form-control-user' name='description' id='new_description'></textarea>
						                        	</div>
						                        </div>
						                        <div class='form-group row'>
						                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='pdf'>PDF <span  >*</span></label>
						                        	<div class="col-md-121 col-sm-9 ">
						                            	<input type='file' accept=".pdf" class='form-control form-control-user' name='pdf' id='pdf' required>
						                            </div>
						                        </div>
						                       
							                </div>
							            </div>
							           	<div class="text-center">
							           		<hr>
							           		<p class="text-danger">(*) Campo Obligatorio
							           		<br><span class="text-danger">(Opcional) Estos campos puedes dejarlos vacios</span>
							           	</p>
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
<?php require_once ROUTE_APP . '/views/layouts/select-buscadorjs.php'; ?>

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<script src="<?php echo ROUTE_URL; ?>js/route/results_agregar.js"></script>
    <script src="<?php echo ROUTE_URL; ?>vendors/tinymce/tinymce.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>js/edit.js"></script>
<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>