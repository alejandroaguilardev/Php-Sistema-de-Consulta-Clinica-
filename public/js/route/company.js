/*
*Información
*/

const send=(event)=> {
  let form = document.getElementById("information_company");
  let name = document.getElementById("name").value ;
  let business = document.getElementById("business").value  ;
  let color_primary = document.getElementById("color_primary").value ;
  let color_secundary = document.getElementById("color_secundary").value ;
  let color_tertiary = document.getElementById("color_tertiary").value ;
  let formData = new FormData(document.getElementById("information_company"));
  formData.append("name", name);
  formData.append("business", business);
  formData.append("color_primary", color_primary);
  formData.append("color_secundary", color_secundary);
  formData.append("color_tertiary", color_tertiary);

  sendAjax(form.method,form.action,formData,form.name,null);
}

/*
*Contacto
*/
$('#information_contact').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("information_contact");
  let formData = new FormData(document.getElementById("information_contact"));
  let data=  $("#information_contact").serialize();
  sendAjax(form.method,form.action,formData,form.name,null);
});

/*
*Redes
*/
$('#information_red').submit(function(e){ 
  e.preventDefault();
  let form = document.getElementById("information_red");
  let formData = new FormData(document.getElementById("information_red"));
  let data=  $("#information_red").serialize();
  sendAjax(form.method,form.action,formData,form.name,null);
});