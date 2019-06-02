<?php
if(isset($_POST)){
	if(file_exists("classes/Usuario.class.php") 
		&& file_exists("classes/Mysql.class.php")){

	    include_once "classes/Mysql.class.php";
	    include_once "classes/Usuario.class.php";

	    $mysql = new Mysql();
	    $email = $_POST['email'];
	    $senha = $_POST['senha'];  
	    $resultado = $mysql->validaLogin($email, $senha);

	   if(!$resultado){
	   	echo "
	   		<script language='javascript'>
	   			alert('O login não esta correto, tente novamente.');
	   			window.location.replace('../index.html');
			</script>";
	   }else{
	   		session_start();
	   		$_SESSION['usuario'] = $resultado;
	   		header("Location: ../frontend/pgsUsuario/home.php");
	   }
	   
	}
}
