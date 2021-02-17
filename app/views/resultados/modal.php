


<div class='modal fade new' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>  
    <div class='modal-dialog modal-lg modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header new-modal'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Nuevo Registro </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        	<form id="new_record" method="post"  name="new" role="form" action="<?php echo ROUTE_URL;?>resultados/create">
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
					                    <?php } } ?>
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
 

<div class='modal fade update' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header update-modal'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Actualizar Registro </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <form id="update_record" method="post"  name="update" role="form" action="<?php echo ROUTE_URL;?>resultados/update">
                <div class='modal-body'>
                <input type="hidden" name="idproducts" id="update_id">
                    <div class='row'>
                        <div class='col-md-12'>
							<div class='form-group row'>
								<input type="hidden" name="idresult" id="idresult">
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='type'>Paciente <span class="required" >(*)</span></label>
	                        	<div class="col-md-8 col-sm-9 form-group has-feedback">
									     <select class="form-control selectpicker" name="user" id="update_user" data-live-search="true" required>
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
									     <select class="form-control selectpicker" name="company"  id="update_company"data-live-search="true" required>
	                                        <option value='0' selected>Particular</option>
					                    <?php foreach ($data['users'] as $key ) {
										    if($key->idrol==4){?>
	                                        <option value='<?php echo $key->iduser; ?>'><?php echo $key->dni; ?> : <?php echo $key->name; ?></option>
					                    <?php } } ?>
	                            	</select>
	                        	</div>
	                        </div> 
                        
                            <div class='form-group row'>
                                <label class='col-form-label col-md-3 col-sm-3 label-align' for='description'>Descripcion <span  >(Opcional)</span></label>
                                <div class="col-md-8 col-sm-9 ">
                                    <textarea class='form-control form-control-user' name='description' id='update_description'  ></textarea>
                                </div>
                            </div>
						<div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='pdf'>PDF <span  >*</span></label>
	                        	<div class="col-md-121 col-sm-9 ">
	                        		<a href="#" target="_blank" class='btn btn-info' id="update_pdf"><i class='fa  fa-file-pdf-o' ></i> </a> 
	                            	<input type='file' accept=".pdf" class='form-control form-control-user' name='pdf' id='pdf'>
	                            </div>
	                        </div>
                           
                        </div>
                    </div>
                 	<div class="text-center">
		           		<hr>
		           		<p class="text-danger">(*) Campo Obligatorio
			           		<br><span class="text-danger">(Opcional) Estos campos puedes dejarlos vacios</span>
			           		<hr><span class="text-info">(Nota) Solo se visualizan las imagenes seleccionadas no es necesario subirlas todas pero si en orden</span>
		           		</p>
		           </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                    <button type='submit' class='btn btn-success'>Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class='modal fade delete' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header  delete-modal'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Desactivar Registro </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        	<form id="delete_record" method="post"  name="delete" role="form" action="<?php echo ROUTE_URL;?>resultados/delete">
        		<input type="hidden" name="delete_id" id="delete_id" >
		        <div class='modal-body'>
		            <div class='row'>
		                <div class='col-md-12'>
					        <p>¿Esta Seguro de Desactivar el siguiente registro?</p>
					        <p><b id="delete_name"></b></p>
		                </div>
		            </div>
		        </div>
		        <div class='modal-footer'>
		            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
		            <button type='submit' class='btn btn-danger'>Eliminar</button>
		        </div>
		    </form>
        </div>
    </div>
</div>

