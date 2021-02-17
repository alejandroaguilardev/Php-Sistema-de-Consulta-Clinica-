/*
*CARGAR REGISTROS
*/
const loadRecordParam=()=>{
  let route_dominio = document.getElementById("route_dominio").value;
  sendAjax('get',route_dominio+"resultados/list","null","loadRecord",null);  
}
const loadRecord=(param)=>{
  $('#datatable-buttons').DataTable().clear().draw();
  let route_dominio = document.getElementById("route_dominio").value;
	let rowRecord;
	let button; 
	let status;
  	for (let i in param) {
    	button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateInfo(${param[i].idresult},${param[i].iduser},${param[i].company},'${param[i].pdf}'})"><i class='fa  fa-edit'></i> </a> 
              <textarea id='description_info${param[i].idproducts}' hidden>${param[i].description}</textarea>
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('${param[i].idresult}','${param[i].name}')"><i class='fa  fa-minus-square'></i> </a>`;
       
       status=`<a href=${route_dominio}${param[i].pdf}  target="_blank" class='btn btn-info'><i class='fa  fa-file-pdf-o'></i> </a> `;

		rowRecord = [param[i].dni,param[i].name,param[i].company_name, status, param[i].create_at, button];      
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
  sendAjax(form.method,form.action,formData,"result1","new");
});


/*
*ACTUALIZAR
*/
$('#update_record').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("update_record");
  let formData = new FormData(document.getElementById("update_record"));
  sendAjax(form.method,form.action,formData,"result2","update");
}); 

const updateInfo=(id,user,company,pdf)=>{
  let route_project = document.getElementById("route_project").value;
  document.getElementById("idresult").value=id;
  let description = document.getElementById("description_info"+id).value;
  // document.getElementById("update_pdf").location.href  = route_project+"pdf/vista/"+id;
  $("#update_pdf").attr("href", route_project+"pdf/vista/"+id);

  tinymce.get('update_description').setContent(description);
  $("#update_user option[value="+ user +"]").attr("selected",true);
  $("#update_company option[value="+ company +"]").attr("selected",true);

 
}

/*
*ELIMINAR
*/
$('#delete_record').submit(function(e){ 
  e.preventDefault(); 
  let form = document.getElementById("delete_record");
  let formData = new FormData(document.getElementById("delete_record"));
  sendAjax(form.method,form.action,formData,"result3","delete");
});


