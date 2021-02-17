/*
*CARGAR REGISTROS
*/
const loadRecordParam=()=>{
  let route_dominio = document.getElementById("route_dominio").value;
  sendAjax('get',route_dominio+"categorias/list","null","loadRecord",null);  
}
const loadRecord=(param)=>{
  $('#datatable-buttons').DataTable().clear().draw();
	let rowRecord;
	let button; 
	let status;
  	for (let i in param) {
    	button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateUser(${param[i].idcategory},'${param[i].name}','${param[i].description}','${param[i].img}')"><i class='fa  fa-edit'></i> </a> 
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('${param[i].idcategory}','${param[i].name}')"><i class='fa  fa-minus-square'></i> </a>`;
        if( param[i].status=='active'){
        	status='<b class="alert alert-success">ACTIVO</b>';
        }else{
        	status='<b class="alert alert-danger">DESACTIVADO</b>';
        }
		rowRecord = [param[i].name, param[i].description,  param[i].create_at, status,button];      
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
  sendAjax(form.method,form.action,formData,"","new");
});


/*
*ACTUALIZAR
*/
$('#update_record').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("update_record");
  let formData = new FormData(document.getElementById("update_record"));
  sendAjax(form.method,form.action,formData,"","update");
});

const updateUser=(id,name,description,img)=>{
  let route_project = document.getElementById("route_project").value;
  document.getElementById("update_id").value  = id;
  document.getElementById("update_name").value  = name
  document.getElementById("update_description").value  = description;
  if(img==null || img=="" || img == 'null'){document.getElementById("update_category_img").src = "img/vacio.jpg";}
  else{document.getElementById("update_category_img").src = route_project+"img/"+img;}
}

/*
*ELIMINAR
*/
$('#delete_record').submit(function(e){ 
  e.preventDefault(); 
  let form = document.getElementById("delete_record");
  let formData = new FormData(document.getElementById("delete_record"));
  sendAjax(form.method,form.action,formData,"","delete");
});


