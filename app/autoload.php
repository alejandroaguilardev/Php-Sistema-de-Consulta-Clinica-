<?php
	//Cargamos Librerías
	require_once 'config/App.php';
	require_once 'helpers/generalHelper.php';
	require_once 'helpers/imageHelper.php';

	//autoload php 

	spl_autoload_register(function($nameCLass){
		require_once 'lib/' . $nameCLass . '.php';
	});