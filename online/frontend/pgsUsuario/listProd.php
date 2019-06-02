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

    <title>Listagem | Estoque</title>

    <script src="../libs/jquery-3.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="../libs/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../libs/bootstrap.css">

    <script language="javascript"> //Ajax para listar os produtos
            $(function($){
                $('#btnenv').click(function(){
                    var select = $('#selectBtn').val();

                    $.post("../../backend/postListProd.php", {botao:select}, 
                        function(retorno){
                            $('.resultado').html(retorno);
                    });
                    return false;
                });
            });
    </script>

</head>
<body>
        <h3>Bem vindo <?php echo $_SESSION['usuario']['nome']; ?></h3>	

        <div class="form-group col-xs-4">
            <label for="tipop" class="cols-sm-2 control-label">Categoria</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <select id="selectBtn" class="form-control">
                        <?php  $mysql->getTipoProduto(); ?>
                    </select>
                </div>
            </div>
        </div>
        <a id="voltar" href="home.php">VOLTAR</a></p>
        <div class="form-group"><p>
            <button id="btnenv" class="btn btn-primary btn-lg btn-block login-button">Listar</button>
        </div>

        <div class="resultado"></div>

</body>
</html>

<style>
    .btfunc{
        margin-top: 30px;  
    }
</style>
<?php
    }
}else{
    header("Location: ../../index.html");
}
?>