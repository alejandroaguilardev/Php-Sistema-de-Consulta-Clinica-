<?php
  class Resultados extends Controller{
 
	    public function __construct(){
        $this->sesion=requireSession();
        if($this->sesion['sesion_idrol']!=1){
          redirect(ROUTE_URL."home/");
        }
        $this->modelModel = $this->model('Results'); 
        $this->userModel = $this->model('Users'); 
      } 

      public function index(){
        $model = $this->modelModel->getRecords(['fetch' => 0]); 
        $users = $this->userModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Resultados',
          'routeTitle' => 'Información de los resultados',
          'routeSubTitle' => 'Lista de Resultados',
          'routeparagraph' => 'Visualiza los resultados de los usuarios',
          'model'=> $model,
          'users'=> $users,
          'sesion'=> $this->sesion,
        ];
        $this->view('resultados/index',$data);
      }
      public function list()
      {
        $model = $this->modelModel->getRecords(['fetch' => 0]); 
        alertMessage(1,'success',"", $model);
      }


      public function create()
      {
        if($_SERVER['REQUEST_METHOD']=='POST'){
              $count = count($_POST);  
               $tags = array_keys($_POST); // obtiene los nombres de las varibles  
               $values = array_values($_POST);// obtiene los valores de las varibles    
                for($i=0;$i<$count;$i++){   
                  $data[$tags[$i]]=$values[$i];   
                }    
                $files=[
                  'pdf' => $_FILES['pdf']['name'],
                  'rand' => RNUMBER,
                ];
              $data=array_merge($data,$files);

              $this->modelModel->insertRecord($data);
              $destiny = ROUTE_APP_PROJECT."pdf/".$data['user']."/"; 
              pdfFun($_FILES['pdf']['tmp_name'],$destiny, RNUMBER.$_FILES["pdf"]["name"]);
              $data['view']='results'; 
          $user = $this->userModel->getRecordID(['fetch' => 1, 'iduser'=>$data['user']]);
          $title="Dafft - Resultados en Linea";
          prepare_mail($title,$user['email']);

          alertMessage(1,'success','Se ha Insertado el registro', $data);
        }else{
          redirect(ROUTE_URL."resultados/");
        }
      }

       public function update()
       {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['idresult' => trim($_POST['idresult']),'fetch' => 1];
            $record=$this->modelModel->getRecord($data);
            if(empty($record) || $record['idresult']==trim($_POST['idresult'])){
               $count = count($_POST);  
               $tags = array_keys($_POST); // obtiene los nombres de las varibles  
               $values = array_values($_POST);// obtiene los valores de las varibles    
                for($i=0;$i<$count;$i++){   
                  $data[$tags[$i]]=$values[$i];   
                }    
                $files=[
                  'pdf' => $_FILES['pdf']['name'],
                  'rand' => RNUMBER,
                ];
              $data=array_merge($data,$files);

             $this->modelModel->updateRecord($data);
              $destiny = ROUTE_APP_PROJECT."pdf/".$data['user']."/"; 
              pdfFun($_FILES['pdf']['tmp_name'],$destiny, RNUMBER.$_FILES["pdf"]["name"]);
              $data['view']='results';

              alertMessage(1,'success','Se ha Actualizado el registro', $data);
            }else{
              alertMessage(0,'danger','Este producto ya fue creado',$record);
            }
        }else{
          redirect(ROUTE_URL."resultados/");
        }
      }


       public function delete()
       {
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $record=$this->modelModel->getRecord(['idresult' => trim($_POST['delete_id']),'fetch'=> 1]);
           $data=[
                'idresult' => trim($_POST['delete_id']),
                'status' => $record['status'],
              ];
          if(!$this->modelModel->deleteRecord($data)){
            alertMessage(0,'danger','No se encontro el registro');
          }              
          alertMessage(1,'warning','Se ha desactivado con éxito ', "param");
        }else{
          redirect(ROUTE_URL."resultados");
        }
      }
  }