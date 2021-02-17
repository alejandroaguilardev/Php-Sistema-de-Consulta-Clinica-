<?php
  class CambiarPassword extends Controller{
 
	  public function __construct(){
	    $this->sesion=requireSession();
	    $this->usersModel = $this->model('Users'); 
	  } 

	  public function index(){
	    $users = $this->usersModel->getRecordID(['fetch' => 1, 'iduser' => $this->sesion['sesion_id']]); 
	    $data = [
	      'title' => 'Mis Resultados',
	      'routeTitle' => 'Información de mis resultados',
	      'routeSubTitle' => 'Lista de Resultados',
	      'routeparagraph' => 'Visualiza tus resultados ',
	      'model'=> $users,
	      'sesion' => $this->sesion,
	    ];
	    $this->view('profile/index',$data);
	  }

	  public function cambiar()
	  {
	  	 if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['fetch' => 1, 'iduser' => $this->sesion['sesion_id']];
            if($record=$this->usersModel->getRecordIDPass($data)){ 
            	if($record['password']==trim($_POST['password_old'])){
            		$data=[
	                'password' => trim($_POST['password']),
	                'iduser' => $this->sesion['sesion_id'],
	              ];
	               $this->usersModel->updateRecordPasswordID($data);
	              $data['view']='users';
	              alertMessage(1,'success','Contraseña Actualizada', null);
            	}else{
              		alertMessage(0,'danger','Contraseña Actualizada actual erronea');
            	}
                
            
            }else{
              alertMessage(0,'danger','Usuario no encontrado');
            }
        }else{
          alertMessage(0,'danger','Solicitud mal empleada');
        }
      }
  }