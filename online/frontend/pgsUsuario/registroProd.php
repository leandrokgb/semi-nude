<?php
session_start();
if(isset($_SESSION['usuario'])){
    if(file_exists("../../backend/classes/Mysql.class.php")){
        include_once "../../backend/classes/Mysql.class.php";

        $mysql = new Mysql();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name="description" content="Cadastro Produtos">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Cadastre um produto | Estoque</title>
	
	<link rel="stylesheet" type="text/css" href="../libs/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../libs/bootstrap.css">

</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
               <div class="panel-title text-center">
               		<h1 class="title">Cadastro de Produtos</h1>
               		<hr />
               	</div>
            </div>

		<div class="main-login main-center">
			<form class="form-horizontal" action="../../backend/postProduto.php" method="post" name="fprod">
				
				<div class="form-group">
					<label for="nomep" class="cols-sm-2 control-label">Nome</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" name="nomep" class="form-control" placeholder="Nome do produto" id="nomep">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="precop" class="cols-sm-2 control-label">Preço</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-piggy-bank"></i></span>
							<input type="text" name="precop" class="form-control" placeholder="Preço da UNIDADE" id="precop">
						</div>
					</div>
				</div>
                                <div class="form-group">
					<label for="qntp" class="cols-sm-2 control-label">Quantidade</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
							<input type="text" name="qntp" class="form-control" placeholder="Informe a quantidade de produtos" id="qntp">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="tipop" class="cols-sm-2 control-label">Categoria</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
							<select name="tipop" class="form-control">
								<?php
									$mysql->getTipoProduto();
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group ">
                    <button class="btn btn-primary btn-lg btn-block login-button"
                     onclick="return prodChec();" >Registrar</button>

				</div>
			</form>
				</div>
                    <p><a href="home.php"> VOLTAR </a></p>
                </div>
	</div>
	<script src="../js/prodChec.js"></script>
	<script src="../libs/jquery-3.1.1.js"></script>
	<script src="../libs/bootstrap.js"></script>
</body>
</html>
<?php
}
}else{
    header("Location: ../../index.html");
}
?>