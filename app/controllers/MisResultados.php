<?php
  class MisResultados extends Controller{
 
	    public function __construct(){
        $this->sesion=requireSession();
        if($this->sesion['sesion_idrol']==4){
          redirect(ROUTE_URL."home/");
        }
        $this->resultsModel = $this->model('Results'); 
      } 

      public function index(){
        $results = $this->resultsModel->getRecordUserDias(['fetch' => 0, 'iduser' => $this->sesion['sesion_id']]); 
        $data = [
          'title' => 'Mis Resultados',
          'routeTitle' => 'Información de mis resultados',
          'routeSubTitle' => 'Lista de Resultados',
          'routeparagraph' => 'Visualiza tus resultados ',
          'model'=> $results,
          'sesion' => $this->sesion,
        ];
        $this->view('mis_resultados/index',$data);
      }
  }