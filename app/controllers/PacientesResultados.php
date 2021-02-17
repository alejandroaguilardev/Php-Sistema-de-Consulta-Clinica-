<?php
  class PacientesResultados extends Controller{
 
	    public function __construct(){
        $this->resultsModel = $this->model('Results'); 
        $this->usersModel = $this->model('Users'); 
      } 

      public function index(){
        if($sesion_rol!=3){
           $data = [
          'title' => 'Bienvenido',

          ];
          $this->view('home/index',$data);
        }
        $results = $this->resultsModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Pacientes',
          'routeTitle' => 'Información de los Pacientes',
          'routeSubTitle' => 'Lista de Pacientes',
          'routeparagraph' => 'Visualiza los resultados de los Pacientes',
          'results'=> $results,
        ];
        $this->view('pacientes/index',$data);
      }
  }