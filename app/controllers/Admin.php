<?php

  class Admin extends Controller{

	    public function __construct(){
        $this->usersModel = $this->model('Users'); 
        activeSession();
      }

      public function index()
      {
       $data = [
        'title' => 'Dafft-Administrqador'
       ];
       $this->view('login/admin/index',$data);
      } 
  }