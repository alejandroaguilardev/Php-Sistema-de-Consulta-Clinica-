<?php 

  class Usuarios extends Controller{
 
	    public function __construct(){
        $this->sesion=requireSession();
        if($this->sesion['sesion_idrol']!=1){
          redirect(ROUTE_URL."home/");
        }
        $this->usersModel = $this->model('Users'); 
      }

      public function index()
      {
         $users = $this->usersModel->getRecords(['fetch' => 0]); 
         $rols = $this->usersModel->getRecordsRols(['fetch' => 0]); 
          $data = [
          'title' => 'Lista Usuarios',
          'routeTitle' => 'Información de la Usuarios',
          'routeSubTitle' => 'Lista de Usuarios',
          'routeparagraph' => 'Visualiza el perfil de los Usuarios del Sistema.',
          'users'=> $users,
          'sesion'=> $this->sesion,
          'rols'=> $rols
        ];
        $this->view('usuarios/index',$data);
      }

      public function list()
      {
         $users = $this->usersModel->getRecords(['fetch' => 1]); 
        alertMessage(1,'success',"", $users);
      }


      public function create()
      {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['dni' => trim($_POST['new_dni']),'fetch' => 1];
            if(!$this->usersModel->getRecord($data)){ 
                $data=[
                'name' => trim($_POST['new_name']),
                'email' => trim($_POST['new_email']),
                'dni' => trim($_POST['new_dni']),
                'password' => trim($_POST['new_password']),
                'idrol' => trim($_POST['new_rol'])
              ];
              $this->usersModel->insertRecord($data);
              $user=$this->usersModel->getRecord(['dni' => trim($_POST['new_dni']),'fetch' => 1]);
              
              $title="Dafft - Se ha Generado Su Cuenta";
              prepare_mail_cuenta($title,$data['email'],$data['dni'], $data['password']);

              alertMessage(1,'success','Se ha Insertado el registro', $user);
            }else{
              alertMessage(0,'danger','DNI  ya registrado');
            }
        }else{
          alertMessage(0,'danger','Solicitud mal empleada');
        }
      }

      public function update()
       {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['dni' => trim($_POST['update_dni']),'fetch' => 1];
            $record=$this->usersModel->getRecord($data);
            if(empty($record) || $record['dni']==trim($_POST['update_dni'])){
                $data=[
                'iduser' => trim($_POST['update_id']),
                'name' => trim($_POST['update_name']),
                'dni' => trim($_POST['update_dni']),
                'email' => trim($_POST['update_email']),
                'password' => trim($_POST['update_password']),
                'idrol' => trim($_POST['update_rol']),
              ];
              $this->usersModel->updateRecord($data);
              $data=$this->usersModel->getRecord(['dni' => trim($_POST['update_dni']),'fetch' => 1]);
              $data['view']='users';
              alertMessage(1,'success','Se ha actualizado con éxito el registro', $data);
            }else{
              alertMessage(0,'danger','Correo  ya registrado');
            }

        }else{
          alertMessage(0,'danger','Solicitud mal empleada');
        }
      }
 
      public function delete()
       {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['dni' => trim($_POST['dni']),'fetch' => 1];
            $record=$this->usersModel->getRecord($data);
            if(empty($record) || $record['status']=='active'){
                $data=[
                'dni' => trim($_POST['dni']),
              ];
              $this->usersModel->deleteRecord($data);
              $data=$this->usersModel->getRecord(['dni' => trim($_POST['dni']),'fetch' => 1]);
              $record['view']='users';
              alertMessage(1,'warning','Se ha desactivado con éxito el usuario', $record);
            }else{
              alertMessage(0,'danger','No se encontro el registro');
            }

        }else{
          alertMessage(0,'danger','Solicitud mal empleada');
        }
      }
  }