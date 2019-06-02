<?php
session_start();
if(isset($_SESSION['usuario'])){
	if(isset($_GET['var'])){
		
		$var = $_GET['var'];

		if($var == 'sair'){
			unset($_SESSION['usuario']);
			session_destroy();
			header('Location: ../../index.html');
		}

	}else{
		unset($_SESSION['usuario']);
		session_destroy();
		header('Location: ../../index.html');
	}
}else{
	unset($_SESSION['usuario']);
	session_destroy();
	header('Location: ../../index.html');
}