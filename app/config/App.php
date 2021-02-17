<?php

	define('NAME_SPACE', 'Administrador');
	//configuracion de la base de datos
	define('DB_HOST','localhost');
	define('DB_NAME','dafft_en_linea');
	define('DB_USER','root');
	define('DB_PASSWORD',''); 
	define('DB_PORT','3306');
	//Ruta de la Aplicación
	define('ROUTE_APP',dirname(dirname(__FILE__)));

	//Ruta url Ejemplo:http://localhost/
	define('ROUTE_URL','http://localhost/yvon/dafft/dafft-en-linea/');
	define('ROUTE_APP_PROJECT',$_SERVER["DOCUMENT_ROOT"].'/yvon/dafft/dafft-en-linea/public/');
	define('ROUTE_URL_PROJECT','http://localhost/yvon/dafft/dafft-en-linea');

	date_default_timezone_set("America/Lima");
	define('FECHA', time());
	define('FECHA_TOKEN', FECHA + 86000);
	define('RNUMBER', rand(1,1000));
	define('RTOKEN', rand(1,1000000));
