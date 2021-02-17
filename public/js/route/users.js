/*
*CARGAR REGISTROS
*/
const loadRecordParam=()=>{
  let route_dominio = document.getElementById("route_dominio").value;
  sendAjax('get',route_dominio+"usuarios/list","null","loadRecord",null);  
}

const loadRecord=(param)=>{
  $('#datatable-buttons').DataTable().clear().draw();
	let rowRecord;
	let button;
  	for (let i in param) {
    	button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateUser(${param[i].iduser},'${param[i].name}','${param[i].dni}','${param[i].email}',${param[i].idrol},'${param[i].avatar}')"><i class='fa  fa-edit'></i> </a> 
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('${param[i].dni}','${param[i].name}')"><i class='fa  fa-minus-square'></i> </a>`;

		rowRecord = [param[i].name,param[i].dni, param[i].email, param[i].rol, param[i].create_at, button];      
		$('#datatable-buttons').DataTable().row.add(rowRecord).draw( );
	}
}

/*
*NUEVO
*/
$('#new_record').submit(function(e){ 
  e.preventDefault(); 
  let form = document.getElementById("new_record");
  let formData = new FormData(document.getElementById("new_record"));
  sendAjax(form.method,form.action,formData,"user1",form.name)
});


/*
*ACTUALIZAR
*/
$('#update_record').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("update_record");
  let formData = new FormData(document.getElementById("update_record"));
  sendAjax(form.method,form.action,formData,"user2",form.name);
});

const updateUser=(id,name,dni,email,rol,avatar)=>{
  let route_dominio =  document.getElementById("route_dominio").value;
  document.getElementById("update_id").value  = id;
  document.getElementById("update_name").value  = name
  document.getElementById("update_dni").value  = dni
  document.getElementById("update_email").value  = email;
  document.getElementById("update_rol").selectedIndex   = rol;
//   if(avatar==null || avatar=="" || avatar == 'null'){document.getElementById("update_avatar_img").src = route_dominio+"img/users/user.png";}
//   else{document.getElementById("update_avatar_img").src = route_dominio+"img/users/"+avatar;}
}

/*
*ELIMINAR
*/
$('#delete_record').submit(function(e){ 
  e.preventDefault(); 
  let form = document.getElementById("delete_record");
  let formData = new FormData(document.getElementById("delete_record"));
  sendAjax(form.method,form.action,formData,"user3",form.name)
});



/*
const newRow=(param)=>{
  let rowRecord;
  let button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateUser(${param['iduser']},'${param['name']}','${param['email']}',${param['idrol']}})"><i class='fa  fa-edit'></i> </a> 
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('${param['email']}','${param['name']}')"><i class='fa  fa-minus-square'></i> </a>`;
      rowRecord = [param['name'],param['email'],param['rol'],param['create_at'],button];      
 $('#datatable-buttons').DataTable().row.add(rowRecord).draw( );
}


const deleteRow=(param)=>{
  let id=param['iduser'] - 1;
  let tr = $('#datatable-buttons tbody tr:eq('+id+')');
  let rowRecord;
  $('#datatable-buttons').DataTable().row(tr).remove().draw();

}


const updateRow=(param)=>{
  let id=param['iduser'] - 1;
  let tr = $('#datatable-buttons tbody tr:eq('+id+')');
  let rowRecord;
  let button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateUser(${param['iduser']},'${param['name']}','${param['email']}',${param['idrol']})"><i class='fa  fa-edit'></i> </a> 
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName(${param['iduser']},'${param['name']}')"><i class='fa  fa-minus-square'></i> </a>`;
  tr.find('td:eq(0)').html( param['name'] );
  tr.find('td:eq(1)').html( param['email'] );
  tr.find('td:eq(2)').html( param['rol'] );
  tr.find('td:eq(4)').html( button);
   $('#datatable-buttons').DataTable().row(tr).invalidate().draw();
}

*/
