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
                          			<?php if(isset($_GET['operacion'])){ 
                          			$operacion=$_GET['operacion'];
                          			if($operacion==1){ ?>
											<div class="alert alert-success alert-dismissible " role="alert">Se ha Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php }elseif($operacion==2){ ?>
										<div class="alert alert-warning alert-dismissible " role="alert">Se actualizo el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                          			<?php }elseif($operacion==3){ ?>
										<div class="alert alert-danger alert-dismissible " role="alert">Error al Insertado el registro <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
									<?php } }?>
                          		</div>    
                            	<div class='card-box table-responsive'>
				                     <div class='text-right mx-4'>
										<a href='#' data-toggle='modal' data-target='.new' class='btn btn-primary'><i class='fa  fa-edit'></i> Agregar</a>
									</div>
				                    <table id='datatable-buttons' class='table table-striped table-bordered table-full  td-acciones'>
				                      	<thead>
					                        <tr>
					                          	<th>Dni</th>
					                          	<th>Nombre</th>
					                          	<th>Pertenece</th>
					                          	<th>PDF</th>
					                          	<th>Creado</th>
					                          	<th>Acciones</th>
					                        </tr>
				                      	</thead>

					                    <tbody >
					                    <?php foreach ($data['model'] as $key ) {?>
					                          	<td ><?php echo $key->dni; ?></td>
					                          	<td ><?php echo $key->name; ?></td>
					                          	<td ><?php echo $key->company_name; ?></td>
					                          	<td ><a href='pdf/vista/<?php echo $key->idresult ?>'  target="_blank" class='btn btn-info'><i class='fa  fa-file-pdf-o'></i> </a>  </td>
					                          	<td ><?php echo $key->create_at; ?></td>
					                          	<td>

				                                    <a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateInfo(<?php echo $key->idresult; ?>,<?php echo $key->iduser; ?>,<?php echo $key->company; ?>,'<?php echo $key->pdf; ?>')"><i class='fa  fa-edit'></i> </a>
				                                   <textarea id="description_info<?php echo $key->idresult; ?>" hidden><?php echo $key->description; ?></textarea>
				                                    <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName(<?php echo $key->idresult; ?>, '<?php echo $key->name; ?>')"><i class='fa  fa-minus-square'></i> </a>
				                                </td>
					                        </tr>
					                    <?php } ?>
					                    </tbody>
				                    </table>
				                </div>
                  			</div>
                		</div>
			        </div>
	 		 	</div>
			</div>
		</div>
	</div>
</div>
<?php include "modal.php" ?>
<?php require_once ROUTE_APP . '/views/layouts/select-buscadorjs.php'; ?>

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<script src="<?php echo ROUTE_URL; ?>js/route/results.js"></script>
    <script src="<?php echo ROUTE_URL; ?>vendors/tinymce/tinymce.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>js/edit.js"></script>
<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>