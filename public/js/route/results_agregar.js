/*
*NUEVO
*/
$('#new_record').submit(function(e){ 
  e.preventDefault(); 
  let form = document.getElementById("new_record");
  let formData = new FormData(document.getElementById("new_record"));
  sendAjax(form.method,form.action,formData,"result_agregar","new");
});
