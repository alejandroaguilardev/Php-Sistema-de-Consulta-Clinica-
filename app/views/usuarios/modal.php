<div class='modal fade new' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg modal-dialog-centered'>
        <div class='modal-content'>
            <div class='modal-header new-modal'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Nuevo Registro </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        	<form id="new_record" method="post"  name="new" role="form" action="<?php echo ROUTE_URL;?>usuarios/create">
		        <div class='modal-body'>
		            <div class='row'>
		                <div class='col-md-12'>
					        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='new_name'>Nombre y Apellido <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='text' class='form-control form-control-user' name='new_name' id='new_name' required   placeholder='Nombre y Apellido '>
	                        	</div>
	                        </div>
	                         <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='new_dni'>Dni <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='number' class='form-control form-control-user' name='new_dni' id='new_dni' required   placeholder='DNI '>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='new_email'>Email <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='email' class='form-control form-control-user' name='new_email' id='new_email'  required  placeholder='Correo Electrónico'>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='new_password'>Contraseña <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='password' class='form-control form-control-user' name='new_password' id='new_password'required   placeholder='Contraseña del Usuario' minlength='4'>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='new_rol'>Rol <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<select class='form-control' name='new_rol' id='new_rol'>
					                    <?php foreach ($data['rols'] as $key ) {
					                    	if($key->idrol==2){ ?>
	                                        <option value='<?php echo $key->idrol; ?>' selected><?php echo $key->name; ?></option>
					                    	<?php }else{  ?>
	                                        <option value='<?php echo $key->idrol; ?>'><?php echo $key->name; ?></option>
					                    <?php } } ?>
	                            	</select>
	                        	</div>
	                    	</div>
		                </div>
		            </div>
		           	<div class="text-center"><p class="text-danger">(*) Campo Obligatorio</p></div>
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
        	<form id="update_record" method="post"  name="update" role="form" action="<?php echo ROUTE_URL;?>usuarios/update">
		        <div class='modal-body'>
        		<input type="hidden" name="update_id" id="update_id">
		            <div class='row'>
		                <div class='col-md-12'>
					        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='update_name'>Nombre y Apellido <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='text' class='form-control form-control-user' name='update_name' id='update_name' required   placeholder='Nombre y Apellido '>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='update_dni'>DNI<span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='number' class='form-control form-control-user' name='update_dni' id='update_dni' required   placeholder='DNI '>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='update_email'>Email <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='email' class='form-control form-control-user' name='update_email' id='update_email'  required  placeholder='Correo Electrónico'>
	                        	</div>
	                        </div>
	                        <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='update_rol'>Rol <span class="required" >(*)</span></label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<select class='form-control' name='update_rol' id='update_rol'>
					                    <option disabled=>Seleccionar un rol</option>
					                    <?php foreach ($data['rols'] as $key ) {?>
	                                        <option value='<?php echo $key->idrol; ?>'><?php echo $key->name; ?></option>
					                    <?php } ?>
	                            	</select>
	                        	</div>
	                    	</div>
	                    	<hr>
	                    	 <div class='form-group row'>
	                            <label class='col-form-label col-md-3 col-sm-3 label-align' for='update_password'>Contraseña </label>
	                        	<div class="col-md-6 col-sm-6 ">
	                            	<input type='password' class='form-control form-control-user' name='update_password' id='update_password' placeholder='Contraseña del Usuario' minlength='4'>
	                            	<span>Solo si desea cambiar la contraseña del usuario</span>
	                        	</div>
	                        </div>
		                </div>

		                <!-- <div class='col-md-3'>
                            <img class="img-responsive img-users" id="update_avatar_img" src="">
	                        <label  for='update_avatar'>Avatar </label>
                        </div> -->
		            </div>
		           	<div class="text-center"><p class="text-danger">(*) Campo Obligatorio</p></div>
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
            <div class='modal-header delete-modal'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Eliminar Registro </h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
            </div>
        	<form id="delete_record" method="post"  name="delete" role="form" action="<?php echo ROUTE_URL;?>usuarios/delete">
        		<input type="hidden" name="dni" id="delete_id" >
		        <div class='modal-body'>
		            <div class='row'>
		                <div class='col-md-12'>
					        <p>¿Esta Seguro de eliminar el siguiente registro?</p>
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