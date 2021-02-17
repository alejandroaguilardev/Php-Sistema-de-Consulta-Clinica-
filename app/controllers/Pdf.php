<?php

  class Pdf extends Controller{

	 public function __construct(){
        $this->modelModel = $this->model('Results'); 
        $this->sesion=requireSession();
      } 

      public function vista($id){
        if($this->sesion['sesion_idrol']==2 ){
           $model = $this->modelModel->getRecordVeriId(['fetch' => 1, 'idresult' =>$id, 'sesion' => $this->sesion['sesion_id']]);
            if($model){echo '<embed src="'.ROUTE_URL.$model['pdf'].'" type="application/pdf" width="100%" height="100%" />';}
            else{ redirect(ROUTE_URL."home/");}


        }else if($this->sesion['sesion_idrol']==1){
           $model = $this->modelModel->getRecord(['fetch' => 1, 'idresult' =>$id]);
            if($model){echo '<embed src="'.ROUTE_URL.$model['pdf'].'" type="application/pdf" width="100%" height="100%" />';}
            else{ redirect(ROUTE_URL."home/");}


        }else{
          redirect(ROUTE_URL."home/");
        }
      }

      public function vistaMedico($id){
        $model = $this->modelModel->getRecord(['fetch' => 1, 'idresult' =>$id]);
        if($this->sesion['sesion_idrol']==3){
          echo '<embed src="'.ROUTE_URL.$model['pdf'].'" type="application/pdf" width="100%" height="100%" />';
        } else{
          redirect(ROUTE_URL."home/");
        }
      }

       public function vistaEmpleados($id){
        if($this->sesion['sesion_idrol']==4){

            $model = $this->modelModel->getRecordVeriIdRef(['fetch' => 1, 'idresult' =>$id, 'sesion' => $this->sesion['sesion_id']]);

            if($model){
              header('Content-type: application/pdf');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize($model['pdf']));
              header('Accept-Ranges: bytes');
              readfile($model['pdf']);
            }
            else{ redirect(ROUTE_URL."home/");}     

          } else{
            redirect(ROUTE_URL."home/");
        }
      }
  }