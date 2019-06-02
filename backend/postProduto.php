<?php 
session_start();
if(isset($_POST)){
    if(file_exists("classes/Mysql.class.php")){

        include_once "classes/Mysql.class.php";
        
        $usuario = $_SESSION['usuario'];
        $mysql = new Mysql();
        $preco = str_replace(",", ".", $_POST['precop']);

        $registroProd = array($nome = $_POST['nomep'],
                            $preco,
                            $qnt = $_POST['qntp'],
                            $tipo = $_POST['tipop']);

        $boo = False;	
        foreach ($registroProd as $key => $value){
            if ($registroProd[$key] == ""){
                header("Location: ../frontend/pgsUsuario/registroProd.php");
                break;
            }else{
                $boo = True;
            }
        }

        if($boo){
            $mysql->cadastroProduto($nome, $preco, $qnt, $tipo, $usuario['idusuario']);
        }
    }   
}