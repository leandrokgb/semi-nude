<?php
include_once "Mysql.class.php";

class Usuario{

    private $nome;
    private $email;
    private $senha;
    private $rg;
    private $cpf;
    private $mysql;

    function __construct($nome="", $email="", $senha="", $cpf="", $rg=""){
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setCpf($cpf);
        $this->setRg($rg);
    }

    private function setNome($nome){
        $this->nome = $nome;
    }
    private function setEmail($email){
        $this->email = $email;
    }
    private function setSenha($senha){
        $this->senha = $senha;
    }
    private function setCpf($cpf){
        $this->cpf = $cpf;
    }
    private function setRg($rg){
        $this->rg = $rg;
    }


    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getRg(){
        return $this->rg;
    }

    public function cadastro(){
        $this->mysql = new Mysql($this->getNome(), $this->getEmail(), $this->getSenha(),
                                $this->getCpf(), $this->getRg());
        $this->mysql->cadastroUsuario();
        $this->mysql->fechaConexao();
    }
}