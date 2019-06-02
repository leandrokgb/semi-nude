<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['usuario'])){
    if(file_exists("../../backend/classes/Mysql.class.php")){
        include_once "../../backend/classes/Mysql.class.php";

        $mysql = new Mysql();

		$resultado = $mysql->getTipoProduto2();


?>

<!DOCTYPE html>
<html>
<head>


	<meta name="description" content="Cadastro Produtos">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Cadastre uma Categoria | Estoque</title>
  <script src="../js/ajaxListProd.js"></script>
	<link rel="stylesheet" type="text/css" href="../libs/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../libs/bootstrap.css">
<script src="../js/ajaxListProd.js"></script>
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
               <div class="panel-title text-center">
               		<h1 class="title">Cadastro de Categorias</h1>
               		<hr />
               	</div>
            </div>

		<div class="main-login main-center">
			<form class="form-horizontal" action="../../backend/postRegCat.php" method="get" name="fprod">

				<div class="form-group">
					<label for="nomep" class="cols-sm-2 control-label">Nome da categoria</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" name="tipo" class="form-control" placeholder="Nome da categoria" id="tipo">
						</div>
					</div>
				</div>
				<!--<div class="form-group">
					<label for="precop" class="cols-sm-2 control-label">Descricao da categoria</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-piggy-bank"></i></span>
							<input type="text" name="precop" class="form-control" placeholder="Descricao da categoria" id="precop">
						</div>
					</div>
				</div>-->

				<div class="form-group ">
                    <button class="btn btn-primary btn-lg btn-block login-button"
                     onclick="return prodChec();" >Registrar</button>

				</div>
			</form>
				</div>
                    <p><a href="home.php"> VOLTAR </a></p>
                </div>
				</div>

                </div>
				<?php
				if(!$resultado){
					echo "N�o h� registros";
				}
				else
				{
				 while($row = $resultado->fetch_assoc()){

           ?>
            <p>
			<table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
						<th width="200">Categoria</th>
                        <th width="50"><a href="?c=<?php echo $row['idtipo'] ?>" class="exclCat" >Excluir Categoria</a></th>


	               </tr>
                </thead>
				<tbody>
					<tr>
						<td><?php echo $row['tipo'] ?> </td>
			</table>
				</p>
				<style>
                    .excl, .modf, .modtotal, .exclCat{
                        float: right;
                    }
                </style>

				<?php }} ?>


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
