<?php
	session_start();
	if(isset($_SESSION['usuario'])){

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Principal | Estoque</title>
    <link rel="stylesheet" href="../libs/bootstrap-theme.css">
    <link rel="stylesheet" href="../libs/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row-main">
    
    
	<h3>Bem Vindo <?php echo $_SESSION['usuario']['nome']?></h3>
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group col-xs-4">
                <a href="registroProd.php" class="btn btn-primary btn-lg btn-block login-button">Cadastrar um produto</a><br>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group col-xs-4">
                <a href="listProd.php" class="btn btn-primary btn-lg btn-block login-button">Verificar estoque</a><br>
            </div>
        </div>
    </div>
	<div class="form-group">
        <div class="cols-sm-10">
            <div class="input-group col-xs-4">
                <a href="registroCat.php" class="btn btn-primary btn-lg btn-block login-button">Cadastrar Categoria</a><br>
            </div>
        </div>
    </div>
	 <div class="form-group">
        <div class="cols-sm-10 ">
            <div class="input-group col-xs-2">
                <a href="sair.php?var=sair" class="btn btn-primary btn-lg btn-block login-button">Sair</a>
            </div>
        </div>
    </div>

        </div>
    </div>
</body>
</html>

<?php 
}else{
	header("Location: ../../index.html");
}
?>