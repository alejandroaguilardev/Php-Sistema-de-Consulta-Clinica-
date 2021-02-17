<?php

  class Pages extends Controller{

	    public function __construct(){
        $this->usersModel = $this->model('Users'); 
        activeSession();
      }

      public function index()
      {
       $data = [
        'title' => 'Dafft-Paciente identifícate'
       ];
       $this->view('login/pacientes/index',$data);
      } 
  }