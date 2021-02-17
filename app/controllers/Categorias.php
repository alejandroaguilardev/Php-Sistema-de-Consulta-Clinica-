<?php

  class Categorias extends Controller{

	    public function __construct(){
        $this->modelModel = $this->model('Category'); 
      }

      public function index(){
        $model = $this->modelModel->getRecords(['fetch' => 0]); 
        $data = [
          'title' => 'Categorías - Productos/Servicios',
          'routeTitle' => 'Información de la Categorías',
          'routeSubTitle' => 'Lista de Categorías',
          'routeparagraph' => 'Visualiza las categorías activas y desactivadas del sitio.',
          'model'=> $model 
        ];
        $this->view('categorias/index',$data);
      } 

      public function list()
      {
        $model = $this->modelModel->getRecords(['fetch' => 0]); 
        alertMessage(1,'success',"", $model);
      }


      public function create()
      {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['name' => trim($_POST['name']),'fetch' => 1];
            if(!$record=$this->modelModel->getRecord($data)){ 
                $data=[
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'img' => $_FILES['img']['name'],
                'rand' =>RNUMBER,
              ];

              $this->modelModel->insertRecord($data);
              $destiny = ROUTE_APP_PROJECT."img/category/"; 
              imgCompress(basename(RNUMBER.$_FILES["img"]["name"]),$_FILES['img']['tmp_name'],$destiny,null,600,600,70);
              $data=$this->modelModel->getRecord(['name' => trim($_POST['name']),'fetch' => 1]);
              $data['view']='category';
              alertMessage(1,'success','Se ha Insertado el registro', $data);
            }else{
              alertMessage(0,'danger','Esta categoría ya fue creada',$record);
            }
        }else{
          redirect(ROUTE_URL."categorias");
        }
      }

      public function update()
       {
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['name' => trim($_POST['name']),'fetch' => 1];
            $record=$this->modelModel->getRecord($data);
            if(empty($record) || $record['name']==trim($_POST['name'])){
                $data=[
                'idcategory' => trim($_POST['id']),
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'img' => $_FILES['img']['name'],
                'rand' =>RNUMBER,
              ];
              $this->modelModel->updateRecord($data);

              $destiny = ROUTE_APP_PROJECT."img/category/";
              $img_old = ROUTE_APP_PROJECT."img/".$record['img'];
              imgCompress(basename(RNUMBER.$_FILES["img"]["name"]),$_FILES['img']['tmp_name'],$destiny,$destiny.$img_old,600,600,70);

              $data=$this->modelModel->getRecord(['name' => trim($_POST['name']),'fetch' => 1]);
              $data['view']='category';
              alertMessage(1,'success','Se ha actualizado con éxito el registro', $data);
            }else{
              alertMessage(0,'danger','Esta categoría ya fue creada',$record);
            }

        }else{
          redirect(ROUTE_URL."categorias");
        }
      }

      public function delete()
       {

        if($_SERVER['REQUEST_METHOD']=='POST'){
          $record=$this->modelModel->getRecordId(['idcategory' => trim($_POST['delete_id']),'fetch'=> 1]);
           $data=[
                'idcategory' => trim($_POST['delete_id']),
                'status' => $record['status'],
              ];
          if(!$this->modelModel->deleteRecord($data)){
            alertMessage(0,'danger','No se encontro el registro');
          }              
          alertMessage(1,'warning','Se ha desactivado con éxito la categoría', "param");
        }else{
          redirect(ROUTE_URL."categorias");
        }
      }
  }