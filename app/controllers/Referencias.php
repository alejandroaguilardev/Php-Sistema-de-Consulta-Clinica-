<?php

  class Referencias extends Controller{

	    public function __construct(){
        $this->usersModel = $this->model('Users'); 
        activeSession();
      }

      public function index(){
          $data = [
          'title' => 'Identifícate'];
           $this->view('login/referencias/index',$data);
        }


      
  } 
