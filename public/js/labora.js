//REGISTER
function registrar(){
let nombre = $('#nombre').val();
let apellido = $('#apellido').val();
let email = $('#email').val();
let password = $('#password').val();
let telefono = $('#telefono').val();
$.ajax({
    url:'php/register.php',
    type:'POST',
    data:'nombre='+nombre+'&apellido='+apellido+'&email='+email+'&password='+password+'&telefono='+telefono
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("error").innerHTML   = '<div class="alert alert-danger" role="alert"><p>Error al Registrarse</p></div> '
    }else{
          window.location="perfil";
          console.log("enviado")
    }
});
}

function password_veri(){
let password = $('#password').val();
let password2 = $('#password2').val();
if(password!=password2){
    document.getElementById("error_password").innerHTML   = "<span class='fa fa-exclamation-triangle  '> la contraseña no es la misma </span> "
    document.getElementById("boton").disabled    = true
}else{
    document.getElementById("error_password").innerHTML   = ""
    document.getElementById("boton").disabled   = false
}
}
function email_veri(){
let email = $('#email').val();
 $.ajax({
    url:'php/email_veri.php',
    type:'POST',
    data:'email='+email
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("error_email").innerHTML   = "<span class='fa fa-exclamation-triangle  '> El correo ya fue registrado</span> "
     }else{
    document.getElementById("error_email").innerHTML   = ""
	}
});
}

//LOGIN

function confirmar(){
let email = $('#email').val();
let password = $('#password').val();
$.ajax({
    url:'php/sesion.php',
    type:'POST',
    data:'email='+email+'&password='+password+"&boton=ingresar"
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("error").innerHTML   = '<div class="alert alert-danger" role="alert"><p>Email o/y Contraseña Incorrecta</p></div> '
    }else{
          window.location="dashboard";
    }
});
}


//Reset
function recuperar(){
let email = $('#email').val();
$.ajax({
    url:'php/reset.php',
    type:'POST',
    data:'email='+email
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("enviado").innerHTML   = '<div class="alert alert-danger" role="alert"><p>Correo no encontrado</p></div>'
    }else{
      document.getElementById("form").style.display  = "none"
      document.getElementById("enviado").innerHTML   = '<div class="alert alert-success" role="alert"><p>Se ha enviado un mensaje a tu correo</p></div>'

    }
});
}

//cambiar
function cambiar(){
let token = $('#token').val();
let password = $('#password').val();
$.ajax({
    url:'php/cambiar_password.php',
    type:'POST',
    data:'token='+token+'&password='+password
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("error").innerHTML   = '<div class="alert alert-danger" role="alert"><p>Solicite un nuevo cambio de contraseña</p></div>'
    }else{
      document.getElementById("form").style.display  = "none"
      document.getElementById("enviado").innerHTML   = '<div class="alert alert-success" role="alert"><p>Se ha actualizado su contraseña</p><a href="login"><button class="btn btn2 btn_hover_clr1"  style="margin: 0;margin-top:0.3rem;width: 100%!important">Ingresar</button></a></div>'
    }
});
}



function confirmar_pedido(){
$.ajax({
    url:'php/enviar_pedido.php',
    type:'POST',
}).done(function(resp){
    if(resp=='0'){
        document.getElementById("error").innerHTML   = '<div class="alert alert-danger" role="alert"><p>Email intentar de nuevo</p></div> '
    }else{
      document.getElementById("form").style.display  = "none"
      document.getElementById("enviado").innerHTML   = '<div class="alert alert-success" role="alert"><p>En breve nos comunicaremos con usted</p><a href="index"><button class="btn btn2 btn_hover_clr1"  style="margin: 0;margin-top:0.3rem;width: 100%!important">Volver a Inicio</button></a></div>'
    }
});
}
