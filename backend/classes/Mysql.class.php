<?php

class Mysql{

    private $host = "localhost";
    private $user = "root";
    private $senha = "";
    private $banco = "estoque";
    //Fim MySQL

    private $nome;
    private $email;
    private $senhaUser;
    private $cpf;
    private $rg;
    //fim usuario

    function __construct($nome="", $email="", $senhaUser="", $cpf="", $rg=""){
        $this->conexao();
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setSenha($senhaUser);
        $this->setCpf($cpf);
        $this->setRg($rg);

    }
    private function setNome($nome){
        $this->nome = $nome;
    }
    private function setEmail($email){
        $this->email = $email;
    }
    private function setSenha($senhaUser){
        $this->senhaUser = $senhaUser;
    }
    private function setCpf($cpf){
        $this->cpf = $cpf;
    }
    private function setRg($rg){
        $this->rg = $rg;
    }

    public function conexao(){
        $this->mysqli = new mysqli($this->host, $this->user, $this->senha, $this->banco);
        if ($this->mysqli->connect_errno) {
            echo "Falha ao se conectar ao banco de dados: " . $this->mysqli->connect_error;
            $this->fechaConexao();
        }
    }

    public function cadastroUsuario(){
        $sql = "INSERT INTO usuarios(nome, email, senha, cpf, rg)
        VALUES('$this->nome', '$this->email', '$this->senhaUser', '$this->cpf', '$this->rg')";
        if($this->mysqli->query($sql)){
            sleep(2);
            header('Location: ../index.html');
        }else{
            echo "Falha ao se cadastrar, o CPF, RG ou E-mail em questão já esta cadastrado: ". $this->mysqli->error;
            echo "<p><a href='../index.html' > VOLTAR </a></p>";
        }
    }

    public function validaLogin($email, $senha){
        if($email != "" && $senha != ""){
            $sql = "SELECT * FROM usuarios WHERE email = '".$email."' AND senha = '".$senha."' ";
            $resultado = $this->mysqli->query($sql);

            if($resultado->num_rows == 1){
               $row = $resultado->fetch_array(MYSQLI_ASSOC);
               return $row;
            }else{
               return false;
            }
        }
    }


    public function cadastroProduto($nome, $preco, $qnt, $tipo, $idusuario){
        $valorTotal = $preco * $qnt;

        if($nome != "" && $preco != "" && $tipo != ""){
        $sql = "INSERT INTO produtos(nomeProd, preco, quantidade, valorTotal, fktipo) "
                           ."VALUES('$nome', '$preco', '$qnt', '$valorTotal', '$tipo')";

            $resultado = $this->mysqli->query($sql);
            $idproduto = mysqli_insert_id($this->mysqli);
            $cadUsu = $this->cadastroUsuarioProduto($idusuario, $idproduto);

            if($resultado && $cadUsu){
                echo "<script language='javascript'>
                     alert('Produto cadastrado.');
                   </script>";
                 echo "<META HTTP-EQUIV='refresh' CONTENT=0; URL='../../frontend/pgsUsuario/registroProd.php'>";
            }
        }
    }

	public function cadastroCategoria($tipo){

        if($tipo != "" ){
        $sql = "INSERT INTO tipoprodutos(idtipo, tipo) "
                           ."VALUES(0,'$tipo')";

            $resultado = $this->mysqli->query($sql);
            $idproduto = mysqli_insert_id($this->mysqli);


            if($resultado){
                echo "<script language='javascript'>
                     alert('Categoria cadastrada.');
                   </script>";
                 echo "<META HTTP-EQUIV='refresh' CONTENT=0; URL='../../frontend/pgsUsuario/registroCat.php'>";
				header("Location: ../frontend/pgsUsuario/registroCat.php");
            }
        }
    }

    public function cadastroUsuarioProduto($idusuario, $idproduto){
        if($idusuario >= 0 && $idproduto >= 0){
            $sql = "INSERT INTO usuariosProdutos(fkusuario, idproduto)"
                                    . "VALUES('$idusuario', '$idproduto')";
            $resultado = $this->mysqli->query($sql);

            if(!$resultado){
                echo "<script language='javascript'>
                    alert('Houve algum erro com o cadastro, por favor, tente novamente. 2');
                  </script>";
                echo "<META HTTP-EQUIV='refresh' CONTENT=0; URL='../../frontend/pgsUsuario/registroProd.php'>";
                return false;
            }else{
                return true;
            }
        }else{
            echo "<script language='javascript'>
                    alert('Houve algum erro com o cadastro, por favor, tente novamente.');
                  </script>";
            echo "<META HTTP-EQUIV='refresh' CONTENT=0; URL='../../frontend/pgsUsuario/registroProd.php'>";
            return false;
        }
    }

    public function getTipoProduto(){
        $sql = "SELECT * FROM tipoProdutos";
        $resultado = $this->mysqli->query($sql);

        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
               echo "<option value='".$row['idtipo']."'>".$row['tipo']."</option>";
            }
        }else{
            return false;
        }
    }
	public function getTipoProduto2(){
        $sql = "SELECT tipo,idtipo from tipoProdutos";
        $resultado = $this->mysqli->query($sql);

        if($resultado->num_rows <= 0){
            return false;
        }else{
            return $resultado;
        }
    }

    public function getListaProduto($tipo, $usuario){
        $sql = "SELECT * FROM produtos"
                . " INNER JOIN usuariosProdutos ON produtos.idproduto = usuariosProdutos.idproduto"
                . " INNER JOIN usuarios ON usuarios.idusuario = usuariosProdutos.fkusuario"
                . " WHERE produtos.fktipo =". $tipo. " AND usuarios.idusuario = ". $usuario;

        $resultado = $this->mysqli->query($sql);

        if($resultado->num_rows < 0){
            $this->fechaConexao();
        }else{
            return $resultado;
        }
    }

    public function excluiProduto($id){
        $sql1 = "DELETE FROM usuariosProdutos WHERE idproduto = ".$id;
        $result1 = $this->mysqli->query($sql1);

        $sql2 = "DELETE FROM produtos WHERE idproduto = ".$id;
        $resul2 = $this->mysqli->query($sql2);

        if(!$result1 && !$result2){
            $this->fechaConexao();
        }else{
            return true;
        }
    }

    //excluir categorias
    public function excluiCategoria($id){
        $sql1 = "DELETE FROM tipoprodutos WHERE idtipo = ".$id;
        $result1 = $this->mysqli->query($sql1);

        /*$sql2 = "DELETE FROM produtos WHERE idproduto = ".$id;
        $resul2 = $this->mysqli->query($sql2);*/

        if(!$result1){
            $this->fechaConexao();
        }else{
            return true;
        }
    }

    public function alteraPrecoProduto($id, $valorUnidade){
        $sqlpreco = "UPDATE produtos SET preco = ".$valorUnidade." WHERE idproduto = ".$id;
        $this->mysqli->query($sqlpreco);

        $sqlqnt = "SELECT quantidade FROM produtos WHERE idproduto = ". $id;
        $resQnt = $this->mysqli->query($sqlqnt);
        $row = $resQnt->fetch_array(MYSQLI_ASSOC);

        $valorTotal =  $row['quantidade'] * $valorUnidade;

        $sqlinsert = "UPDATE produtos SET valorTotal = ".$valorTotal." WHERE idproduto = ".$id;
        $this->mysqli->query($sqlinsert);
    }

    public function alteraTotalProduto($novoTotal, $id){
        $sqlNovoTotal = "UPDATE produtos SET quantidade = ".$novoTotal." WHERE idproduto = ".$id;
        $this->mysqli->query($sqlNovoTotal);

        $sqlTotal = "SELECT quantidade FROM produtos WHERE idproduto = ".$id;
        $execTotal = $this->mysqli->query($sqlTotal);
        $total = $execTotal->fetch_array(MYSQLI_ASSOC);

        $sqlPreco = "SELECT preco FROM produtos WHERE idproduto = ". $id;
        $execPreco = $this->mysqli->query($sqlPreco);
        $preco = $execPreco->fetch_array(MYSQLI_ASSOC);

        $totalEstoque =  $preco['preco'] * $total['quantidade'];

        $sqlInsertTotal = "UPDATE produtos SET valorTotal = ".$totalEstoque." WHERE idproduto = ".$id;
        $this->mysqli->query($sqlInsertTotal);
    }

    public function fechaConexao(){
        if($this->mysqli->close()){
            return true;
        }
    }
}
