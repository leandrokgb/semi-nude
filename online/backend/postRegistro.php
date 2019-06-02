<?php

if(isset($_POST)){
    if (file_exists("classes/Usuario.class.php")){
        include_once "classes/Usuario.class.php";

        $form = array($nome = $_POST['nome'],
                      $email = $_POST['email'],
                      $senha = $_POST['senha'],
                      $rg = $_POST['rg'],
                      $cpf = $_POST['cpf'],
                      $senha2 = $_POST['confSenha']);


        $boo = False;
        foreach($form as $key => $value){
            if($form[$key] == "" || !is_numeric($form[3])){
                $form[3] = "";
                echo "Há algum campo vazio";
                $boo = False;
                break;
            }else
                $boo = True;
        }
        if($senha != $senha2){
            echo "As senhas estão diferentes!";
            exit();
        }else{
            if($boo){
                
                $usuario = new Usuario($nome, $email, $senha, $cpf, $rg);
                $usuario->cadastro();

                unset($senha2);
                unset($usuario);
            }
        }

    }else{
        echo "Error 404. Classe não encontrada.";
    }
}