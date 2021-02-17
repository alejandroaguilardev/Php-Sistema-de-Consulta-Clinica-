<?php
	function redirect($page){
		header("Location:".$page);
	}	


	function generetePassword($longitud) {
	 $password=null;
	   $param = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	   for($i=0;$i<$longitud;$i++) {
	      $password .= substr($param,rand(0,62),1);
	   }
	   return $password;
	}	

	function prepare_mail($title,$from){
		$img =ROUTE_URL.'img/logo.png';
		include ("mail/restore.php");
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($from, $title, $body, $header);
	}

	function prepare_mail_token($title,$from,$token){
		$token=ROUTE_URL."login/token/".$token;
		$img =ROUTE_URL.'img/logo.png';
		include ("mail/token.php");
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($from, $title, $body, $header);
	}

	function prepare_mail_cuenta($title,$from,$dni,$password){
		$img =ROUTE_URL.'img/logo.png';
		include ("mail/password.php");
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($from, $title, $body, $header);
	}

	function alertMessage($code,$color,$message,$param=null){
		 if($message!=null){
		 	$data=['alert' =>'<div class="alert alert-'.$color.' alert-dismissible " role="alert">'.$message.' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button></div>'];
		 }else{
		 	$data=['alert' =>$message];
		 }
         echo json_encode(['success' => $code, 'data' => $data, 'param' => $param]);
	}


	/*
	*OBTIENES LOS TODOS LOS $_POST
	*/
	function getPost(){
		$count = count($_POST);  
	    $tags = array_keys($_POST); // obtiene los nombres de las varibles  
	    $values = array_values($_POST);// obtiene los valores de las varibles    
	    for($i=0;$i<$count;$i++){   
	        $data[$tags[$i]]=$values[$i];   
	    }
	    return $data;
	}

	/*
	*OBTIENES LOS TODOS LOS $_POST
	*/
	function requireSession(){
	    session_start();
	    if (!isset($_SESSION['sesion_id'])) {
	        header("Location:".ROUTE_URL);
	    }else{
	        if(empty($_SESSION['sesion_id'])){
	            header("Location:".ROUTE_URL);
	        }else{
	           return $sesion = [
		            'sesion_id'=>htmlspecialchars($_SESSION['sesion_id']),
		            'sesion_name'=>htmlspecialchars($_SESSION['sesion_name']),
		            'sesion_email'=>htmlspecialchars($_SESSION['sesion_email']),
		            'sesion_dni'=>htmlspecialchars($_SESSION['sesion_dni']),
		            'sesion_rol'=>htmlspecialchars($_SESSION['sesion_rol']),
		            'sesion_idrol'=>htmlspecialchars($_SESSION['sesion_idrol']),
		             ];
	        }
	    }
	}
	function activeSession(){
	  session_start();
	  if (isset($_SESSION['sesion_id'])) {
	    header("Location:".ROUTE_URL."home");
	  }
	}


	function pdfFun($file,$destiny, $name){
		 if(empty($file)){
            return false;
        }
		if (!file_exists($destiny)) {
            mkdir($destiny, 0777);
        }
		copy($file, $destiny.$name);	
	}

