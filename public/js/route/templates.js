const activeTemplate=(id,route)=>{
  let formData = new FormData();
  formData.append("idtemplate", id);
  sendAjax('POST',route,formData,'template',null);
}; 