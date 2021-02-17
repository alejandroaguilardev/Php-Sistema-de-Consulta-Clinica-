<?php
  class Pacientes extends Controller{
 
    public function __construct()
    { 
      $this->sesion=requireSession();
      if($this->sesion['sesion_idrol']!=3){
        redirect(ROUTE_URL."home/");
      }
      $this->usersModel = $this->model('Users'); 
      $this->resultsModel = $this->model('Results'); 
    } 

      
    public function index(){
      $users = $this->usersModel->getRecordsUsers(['fetch' => 0, 'iduser' => $this->sesion['sesion_id']]); 
      $data = [
        'title' => 'Pacientes',
        'routeTitle' => 'Información de los resultados',
        'routeSubTitle' => 'Lista de Resultados',
        'routeparagraph' => 'Visualiza los resultados ',
        'users'=> $users,
        'sesion' => $this->sesion,
      ];
      $this->view('pacientes/index',$data);
    }

    public function resultados($id){ 
      $results = $this->resultsModel->getRecordPacientes(['fetch' => 0, 'iduser' => $id]); 
      $users = $this->usersModel->getRecordID(['fetch' => 1, 'iduser' => $id]); 
      $data = [
        'title' => $users['name']."- Resultados" ,
        'routeTitle' => $users['name'].' Resultados',
        'routeSubTitle' => 'Lista ',
        'routeparagraph' => 'Visualiza los resultados de  '.$users['name'],
        'model'=> $results,
        'users'=> $users,
        'sesion' => $this->sesion,
      ];
      $this->view('pacientes/resultados/index',$data);
    }
  }