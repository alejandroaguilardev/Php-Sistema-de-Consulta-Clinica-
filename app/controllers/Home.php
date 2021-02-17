<?php

  class Home extends Controller{

	    public function __construct(){
       $this->sesion=requireSession();
      }

      public function index(){
        $data = [
          'title' => 'Bienvenido',
          'sesion' => $this->sesion,

        ];
        $this->view('home/index',$data);
      }
  }