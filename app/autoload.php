<?php

	require_once __DIR__.'/config/paths.php' ;

	require_once __DIR__.'/config/config.php' ;


	function loadModelFiles($file_name){
		$fullpath = APP.'models'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	function loadBeanFiles($file_name){
		$fullpath = APP.'beans'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	function loadControllerFiles($file_name){
		$fullpath = APP.'controllers'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	function loadHelperFiles($file_name){
		$fullpath = APP.'helpers'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	function loadAuthFiles($file_name){
		$fullpath = APP.'auth'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	function loadDataBaseFiles($file_name){
		$fullpath = APP.'database'.DS. $file_name . '.php' ;
		if( file_exists($fullpath) ) {
			include_once $fullpath;
		}
	}

	spl_autoload_register("loadModelFiles");
	spl_autoload_register("loadBeanFiles");
	spl_autoload_register("loadControllerFiles");
	spl_autoload_register("loadHelperFiles");
	spl_autoload_register("loadAuthFiles");
	spl_autoload_register("loadDataBaseFiles");



