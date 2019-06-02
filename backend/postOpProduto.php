<?php
include_once 'classes/Mysql.class.php';
$mysql = new Mysql();
$prodexc = $_GET['idprod'];
$idup = $_GET['idup'];
$preco = $_GET['preco']; //str_replace(",", ".", $_GET['preco']);
$categexc = $_GET['idcat'];
$novoPreco = str_replace(',', '.', $preco);

$novoTotal = $_GET['total'];
$idTotal = $_GET['idUpTotal'];

if(isset($prodexc)){
    if($prodexc <= 0 || $prodexc == ""){
        echo "Ocorreu algum erro";
    }else{
        $mysql->excluiProduto($prodexc);
    }
}
if(isset($preco) && isset($idup)){
    if($novoPreco > 0){
        $mysql->alteraPrecoProduto($idup, $novoPreco);
    }
}

if(isset($novoTotal) && isset($idTotal)){
    if($novoTotal > 0){
        $mysql->alteraTotalProduto($novoTotal, $idTotal);
    }
}
if(isset($categexc)){
    if($categexc <= 0 || $categexc == ""){
        echo "Ocorreu algum erro";
    }else{
        $mysql->excluiCategoria($categexc);
    }
}
?>
