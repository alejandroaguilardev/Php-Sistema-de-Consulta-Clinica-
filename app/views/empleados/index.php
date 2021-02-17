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
									</div>
				                    <table id='datatable-buttons' class='table table-striped table-bordered table-full  td-acciones'>
				                      	<thead>
					                        <tr>
					                          	<th>Dni</th>
					                          	<th>Nombre</th>
					                          	<th>Pertenece</th>
					                          	<th>Creado</th>
					                          	<th>PDF</th>
					                        </tr>
				                      	</thead>

					                    <tbody >
					                    <?php foreach ($data['model'] as $key ) {?>
					                          	<td ><?php echo $key->dni; ?></td>
					                          	<td ><?php echo $key->name; ?></td>
					                          	<td ><?php echo $key->company_name; ?></td>
					                          	<td ><?php echo $key->create_at; ?></td>
					                          	<td ><a href='<?php echo ROUTE_URL ?>pdf/vistaEmpleados/<?php echo $key->idresult ?>'  target="_blank" class='btn btn-danger'><i class='fa  fa-file-pdf-o'></i> </a>  </td>

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

<?php require_once ROUTE_APP . '/views/layouts/select-buscadorjs.php'; ?>

<?php require_once ROUTE_APP . '/views/layouts/scripts.php'; ?>
<script src="<?php echo ROUTE_URL; ?>js/route/results.js"></script>
    <script src="<?php echo ROUTE_URL; ?>vendors/tinymce/tinymce.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>js/edit.js"></script>
<?php require_once ROUTE_APP . '/views/layouts/footer.php'; ?>