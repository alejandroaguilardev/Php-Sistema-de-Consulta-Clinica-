<?php 
	//Class Controllers principal
	// se encargas de poder cargar los modales y las vista
	class Controller{

		public function model($model){
			//carga
			require_once '../app/models/' . $model . '.php';
			//instanciar el modelo
			return new $model();
		}

		//cargar vista
		public function view($view, $data = []){
			//Validar
			if (file_exists('../app/views/' . $view . '.php')) {
				require_once '../app/views/' . $view . '.php';
			}else{
				//no existe
				die('la vista no existe');
			}
		}
	}
