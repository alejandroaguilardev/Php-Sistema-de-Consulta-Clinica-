<?php

  	class Login extends Controller{

	  	public function __construct(){
	    	$this->usersModel = $this->model('Users'); 
	    	$this->tokenModel = $this->model('Token'); 
	  	}

	   	public function sesion()
		{
		    if($_SERVER['REQUEST_METHOD']=='POST'){
		        $data=[
		        'dni' => trim($_POST['dni']),
		        'password' => trim($_POST['password']),
		        'rol' => trim($_POST['rols']),
		        'fetch' => 1,
		      ];
		      if($data=$this->usersModel->login($data)){
		        session_start();
		        $_SESSION['sesion_id']=$data['iduser'];
		        $_SESSION['sesion_dni']=$data['dni'];
		        $_SESSION['sesion_email']=$data['email'];
		        $_SESSION['sesion_name']=$data['name'];
		        $_SESSION['sesion_rol']=$data['rol'];
		        $_SESSION['sesion_idrol']=$data['idrol'];
		        alertMessage(1,'success','Te damos la Bienvenida '.$data['name']);
		      }else{
		        alertMessage(0,'danger','Identificación o/y Contraseña Incorrecta');
		      }
		    }else{
		      alertMessage(0,'danger','Solicitud mal empleada');
		    }
		}


		public function logout()
		{
			session_start();
			$sesion=  $_SESSION['sesion_idrol'];
			session_destroy();
			switch ($sesion) {
				case '1':
					redirect(ROUTE_URL."admin/");
				break;
				case '3':
					redirect(ROUTE_URL."medicos/");
				break;
				case '4':
					redirect(ROUTE_URL."referencias/");
				break;
				default:
					redirect(ROUTE_URL);
				break;
			}
		}
 


 	//REcuperar cuenta

	  public function recuperarCuenta()
	  {
	    $data = [
	      'title' => 'Recuperar Password',
	    ];
	    $this->view('login/recuperar/index',$data);
	  }



	 public function recuperarCuentaData()
	  {
		$data=[
		        'dni' => trim($_POST['dni']),
		        'fetch' => 1,
		        'token' => base64_encode(RTOKEN),
		 ];
		 if($user=$this->usersModel->getRecord($data)){
		 	$token=$this->tokenModel->insertRecord($data);
		 	$title="Dafft - Recuperar Contraseña";
          	prepare_mail_token($title,$user['email'],$data['token']);
	    	switch ($user['idrol']) {
				case '1':
					redirect(ROUTE_URL."admin/");
				break;
				case '3':
					redirect(ROUTE_URL."medicos/");
				break;
				case '4':
					redirect(ROUTE_URL."referencias/");
				break;
				default:
					redirect(ROUTE_URL);
				break;
				}
			}else{
			 redirect(ROUTE_URL."login/recuperarCuenta/");
			}
		}


      public function token($token)
	  {
        $data=['fetch' => 1, 'token' => $token];
        $record=$this->tokenModel->getRecord($data);
   		$data = [
          'title' => 'Cambiar Contraseña',
          'token' => $record,
        ];
        $this->view('login/token/index',$data);
      }


	  public function restore()
	  {
	  	 if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=['fetch' => 1, 'token' => trim($_POST['token'])];
            if($record=$this->tokenModel->getRecord($data)){
             	$this->tokenModel->updateRecord($record);
            	$data=[
	                'dni' => $record['dni'],
	                'password' => trim($_POST['password']),
	                'fetch' => 1,
	            ];
	           $this->usersModel->updateRecordPassword($data);
	           $user=$this->usersModel->getRecord($data);
		    		switch ($user['idrol']) {
					case '1':
						redirect(ROUTE_URL."admin/");
					break;
					case '3':
						redirect(ROUTE_URL."medicos/");
					break;
					case '4':
						redirect(ROUTE_URL."referencias/");
					break;
					default:
						redirect(ROUTE_URL);
					break;
				}
            
            }else{
				redirect(ROUTE_URL);
            }
        }else{
			redirect(ROUTE_URL);
        }
      }


  	}