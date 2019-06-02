<?php
include_once 'classes/Mysql.class.php';
$mysql = new Mysql();
$prodexc = $_GET['idtipo'];
$idup = $_GET['idup'];
$preco = $_GET['preco']; //str_replace(",", ".", $_GET['preco']);
$novoPreco = str_replace(',', '.', $preco);

$novoTotal = $_GET['total'];
$idTotal = $_GET['idUpTotal'];

if(isset($categexc)){
    if($categexec <= 0 || $categexec == ""){
        echo "Ocorreu algum erro";
    }else{
        $mysql->excluiCategoria($categexc);
    }
}
?>
