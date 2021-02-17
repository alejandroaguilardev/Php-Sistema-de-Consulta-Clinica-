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
                          		<div id="alert"></div>    
                            	<div class='card-box table-responsive'>
				                     <div class='text-right mx-4'>
										<a href='#' data-toggle='modal' data-target='.new' class='btn btn-primary'><i class='fa  fa-edit'></i> Agregar</a>
									</div>
				                    <table id='datatable-buttons' class='table table-striped table-bordered table-full  td-acciones'>
				                      	<thead>
					                        <tr>
					                          	<th>Dni</th>
					                          	<th>Nombre</th>
					                          	<th>Email</th>
					                          	<th>Rol</th>
					                          	<th>Creado</th>
					                          	<th>Acciones</th>
					                        </tr>
				                      	</thead>

					                    <tbody >
					                    <?php foreach ($data['users'] as $key ) {?>
					                          	<td ><?php echo $key->dni; ?></td>
					                          	<td ><?php echo $key->name; ?></td>
					                          	<td ><?php echo $key->email; ?></td>
					                          	<td ><?php echo $key->rol; ?></td>
					                          	<td ><?php echo $key->create_at; ?></td>
					                          	 <td ><div style="white-space: nowrap">
				                                    <a href='#' data-toggle='modal' data-target='.update' class='btn btn-info mb-4' onclick="updateUser(<?php echo $key->iduser; ?>,'<?php echo $key->name; ?>','<?php echo $key->dni; ?>','<?php echo $key->email; ?>',<?php echo $key->idrol; ?>,'<?php echo $key->avatar; ?>')"><i class='fa  fa-edit'></i> </a>
				                                    <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('<?php echo $key->dni; ?>', '<?php echo $key->name; ?>')"><i class='fa  fa-minus-square'></i> </a>
				                                    </div>
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

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<script src="<?php echo ROUTE_URL; ?>js/route/users.js"></script>

<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>