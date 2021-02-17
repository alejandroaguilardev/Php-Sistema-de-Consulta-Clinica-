const noneElement=(element)=>{
    document.getElementById(element).style.display  = "none";
}


const deleteElementName=(id, name)=>{
    document.getElementById("delete_id").value  = id;
    document.getElementById("delete_name").innerHTML  = name;
}
/*
* Impide que Bootstrap bloquee todos los eventos de enfoque en los contenidos dentro del diálogo 
*script que permite  hacer clic dentro del editor.
*/
$('.new').on('shown.bs.modal', function() {
    $(document).off('focusin.modal');
});
$('.update').on('shown.bs.modal', function() {
    $(document).off('focusin.modal');
});
/*
* AJAX
*/
const sendAjax=(type,url,data,ejecute,name) => {
  let route_dominio = document.getElementById("route_dominio").value;
  $.ajax({
 		type:type,
	  url:url,
		data: data,
    dataType: "html",
    cache: false,
    contentType: false,
    processData: false,
  	success: function (data) {
       let jsonData = JSON.parse(data);
          if (jsonData.success == "1"){
            if(jsonData['data']['alert']==""){
            }else{
              document.getElementById("alert").innerHTML = jsonData['data']['alert'];
            }
            switch (ejecute) {
              /*
              *COMPANY
              */
              case "result1":
                window.location=route_dominio+"resultados?operacion=1/";
              break;
              case "result2":
                window.location=route_dominio+"resultados?operacion=2/";
              break;
              case "result3":
                window.location=route_dominio+"resultados?operacion=3/";
              break;
              case "user1":
                window.location=route_dominio+"usuarios?operacion=1/";
              break;
              case "user2":
                window.location=route_dominio+"usuarios?operacion=2/";
              break;
              case "user3":
                window.location=route_dominio+"usuarios?operacion=3/";
              break;
             /*
              *COMPANY
              */
              case "result_agregar":
                  $('.'+name).find('input').val('');
                  $('.'+name).find('textarea').val('');
              break;
              default:
                if(jsonData['param']!=null){loadRecordParam(jsonData['param']);}
              break;
            }
          }
          else{document.getElementById("alert").innerHTML = jsonData['data']['alert'];}
      },
      error: function (data) {
          console.log('An error occurred server.');
  			document.getElementById("alert").innerHTML = jsonData['data']['alert'];
      },
   });
  if(name!=null){
    $('.'+name).modal('hide')
    $('.'+name).find('input').val('');
    $('.'+name).find('textarea').val('');
  }
}

