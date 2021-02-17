/*
*Administrar
*/
$('#administrar_seo').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("administrar_seo");
  let description = document.getElementById("description").value ;
  let keywords = document.getElementById("tags_1").value ;
  let formData = new FormData(document.getElementById("administrar_seo"));
   formData.append("keywords", keywords);
  formData.append("description", description);
  sendAjax(form.method,form.action,formData,form.name,null);
});

/*
*Redes
*/
$('#estadisticas_seo').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("estadisticas_seo");
  let formData = new FormData(document.getElementById("estadisticas_seo"));
  let data=  $("#estadisticas_seo").serialize();
  sendAjax(form.method,form.action,formData,form.name,null);
});