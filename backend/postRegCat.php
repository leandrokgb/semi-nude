<?php 
session_start();
if(isset($_POST)){
    if(file_exists("classes/Mysql.class.php")){
		
        include_once "classes/Mysql.class.php";
		
        $tipo = ($_GET['tipo']);
        $usuario = $_SESSION['usuario'];
        $mysql = new Mysql();
		
		
		
        
       
         $mysql->cadastroCategoria($tipo);
        }
    }   
