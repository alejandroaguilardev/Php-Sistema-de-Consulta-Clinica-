<?php
  class Empleados extends Controller{
 
    public function __construct()
    { 
      $this->sesion=requireSession();
      if($this->sesion['sesion_idrol']!=4){
        redirect(ROUTE_URL."home/");
      }
      $this->resultsModel = $this->model('Results'); 
    } 

      
    public function index(){
      $results = $this->resultsModel->getRecordsEmpleados(['fetch' => 0, 'company' => $this->sesion['sesion_id']]); 
      $data = [
        'title' => 'Empleados de' . $this->sesion['sesion_name'],
        'routeTitle' => 'Información de los resultados',
        'routeSubTitle' => 'Lista de Resultados',
        'routeparagraph' => 'Visualiza los resultados ',
        'model'=> $results,
        'sesion' => $this->sesion,
      ];
      $this->view('empleados/index',$data);
    }
  }