/*
*CARGAR REGISTROS
*/
const loadRecordParam=()=>{
  let route_dominio = document.getElementById("route_dominio").value;
  sendAjax('get',route_dominio+"productos/list","null","loadRecord",null);  
}
const loadRecord=(param)=>{
  $('#datatable-buttons').DataTable().clear().draw();
	let rowRecord;
	let button; 
	let status;
  	for (let i in param) {
    	button=`<a href='#' data-toggle='modal' data-target='.update' class='btn btn-info' onclick="updateInfo(${param[i].idproducts},'${param[i].name}','${param[i].code}','${param[i].price}','${param[i].discount}','${param[i].img_1}','${param[i].img_2}','${param[i].img_3}','${param[i].img_4}',${param[i].idcategory},${param[i].idtype})"><i class='fa  fa-edit'></i> </a> 
              <textarea id='description_info${param[i].idproducts}' hidden>${param[i].description}</textarea>
              <a href='#' data-toggle='modal' data-target='.delete' class='btn btn-danger' onclick="deleteElementName('${param[i].idproducts}','${param[i].name}')"><i class='fa  fa-minus-square'></i> </a>`;
        if( param[i].status=='active'){
        	status='<b class="alert alert-success">ACTIVO</b>';
        }else{
        	status='<b class="alert alert-danger">DESACTIVADO</b>';
        }
		rowRecord = [param[i].name,param[i].category,param[i].type, param[i].code, param[i].price, param[i].create_at,status,  button];      
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

const updateInfo=(id,name,code,price, discount, img_1, img_2, img_3, img_4, idcategory, idtype)=>{
  let route_project = document.getElementById("route_project").value;
  let description = document.getElementById("description_info"+id).value;
  document.getElementById("update_id").value  = id;
  document.getElementById("update_name").value  = name
  document.getElementById("update_price").value  = price;
  document.getElementById("update_discount").value  = discount;
  tinymce.get('update_description').setContent(description);
  document.getElementById("update_category").selectedIndex   = idcategory -1 ;
  document.getElementById("update_type").selectedIndex   = idtype -1 ;
  if(img_1==null || img_1=="" || img_1 == 'null'){document.getElementById("update_products_img_1").src = route_project+"img/vacio.jpg";}
  else{document.getElementById("update_products_img_1").src = route_project+"img/"+img_1;}
  if(img_2==null || img_2=="" || img_2 == 'null'){document.getElementById("update_products_img_2").src = route_project+"img/vacio.jpg";}
  else{document.getElementById("update_products_img_2").src = route_project+"img/"+img_2;}
  if(img_3==null || img_3=="" || img_3 == 'null'){document.getElementById("update_products_img_3").src = route_project+"img/vacio.jpg";}
  else{document.getElementById("update_products_img_3").src = route_project+"img/"+img_3;}
  if(img_4==null || img_4=="" || img_4 == 'null'){document.getElementById("update_products_img_4").src = route_project+"img/vacio.jpg";}
  else{document.getElementById("update_products_img_4").src = route_project+"img/"+img_4;}
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


