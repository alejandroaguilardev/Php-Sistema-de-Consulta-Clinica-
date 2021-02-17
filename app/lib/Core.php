<?php 
	/*
		Mapear url 1-controlador 2-metodo 3-parametro
	*/

	class Core{
		protected $controllerCurrent ='Pages';
		protected $methodsCurrent ='index';
		protected $parameters = [];

		public function __construct(){
			// print_r($this->getUrl());
			$url = $this->getUrl();
			if (isset($url)) {
				if(file_exists('../app/controllers/'. ucwords($url[0]).'.php')) {
				//si existe se setea como controlador por defecto
				$this->controllerCurrent = ucwords($url[0]);
				//unset indice 0
				unset($url[0]);	
				}
			}
			//requerir controlador
			require_once '../app/controllers/' . $this->controllerCurrent . '.php';
			$this->controllerCurrent = new $this->controllerCurrent;

			//validar metodo
			if(isset($url[1])){
				if(method_exists($this->controllerCurrent, $url[1])){
					$this->methodsCurrent = $url[1];
					unset($url[1]);	
				}
			}
			//probar
			//echo $this->methodsCurrent;

			//Obtener Parametros
			$this->parameters = $url ? array_values($url) :[];

			//llamar callback con parametros array
			call_user_func_array([$this->controllerCurrent, $this->methodsCurrent], $this->parameters);
		}

		public function getUrl(){
			// echo $_GET['url'];

			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}