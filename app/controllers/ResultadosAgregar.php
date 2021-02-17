<?php
  class ResultadosAgregar extends Controller{
 
	  public function __construct(){
        $this->sesion=requireSession();
        if($this->sesion['sesion_idrol']!=1){
          redirect(ROUTE_URL."home/");
        }
        $this->modelModel = $this->model('Results'); 
        $this->userModel = $this->model('Users'); 
      } 

      public function index(){
        $users = $this->userModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Resultados',
          'routeTitle' => 'Información de los resultados',
          'routeSubTitle' => 'Lista de Resultados',
          'routeparagraph' => 'Visualiza los resultados de los usuarios',
          'users'=> $users,
          'sesion'=> $this->sesion,
        ];
        $this->view('resultados/agregar/index',$data);
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


        $users = $this->userModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Resultados',
          'routeTitle' => 'Información de los resultados',
          'routeSubTitle' => 'Lista de Resultados',
          'routeparagraph' => 'Visualiza los resultados de los usuarios',
          'users'=> $users,
          'sesion'=> $this->sesion,
          'operacion' => 1
        ];
        $this->view('resultados/agregar/index',$data);
        }else{
                 $users = $this->userModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Resultados',
          'routeTitle' => 'Información de los resultados',
          'routeSubTitle' => 'Lista de Resultados',
          'routeparagraph' => 'Visualiza los resultados de los usuarios',
          'users'=> $users,
          'sesion'=> $this->sesion,
          'operacion' => 0
        ];
        }
      }


  }