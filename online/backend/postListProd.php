<?php
session_start();
if(file_exists("classes/Mysql.class.php") && isset($_SESSION['usuario'])){
	
    include_once "classes/Mysql.class.php";
    $mysql = new Mysql();
    $botao = $_POST["botao"];
    $usuario = $_SESSION['usuario'];
    
    $resultado = $mysql->getListaProduto($botao, $usuario['idusuario']);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <script src="../js/ajaxListProd.js"></script>
    </head>
    <body>

    <?php
    if(!$resultado){
        echo "Não há registros";
    }else{
        while($row = $resultado->fetch_assoc()){?>
            <p><table class="table table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th width="200">Produto</th>
                        <th width="100">Preço Unidade</th>
                        <th width="100">Preço Total Unidades</th>
                        <th width="60">Quantidade</th>
                        <th width="50"><a href="?e=<?php echo $row['idproduto']?>" class="excl" >Excluir Estoque</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['nomeProd']?></td>
                        <td>R$ <?php echo $row['preco']?> <a href="?m=<?php echo $row['idproduto']?>" class="modf">Modificar</a></td>
                        <td> R$ <?php echo $row['valorTotal']?></td>
                        <td><?php echo $row['quantidade']?> <a href="?t=<?php echo $row['idproduto']?>" class="modtotal"> Modificar</a></td>
                    </tr>
                </tbody>
                </table></p>
                <style>
                    .excl, .modf, .modtotal{
                        float: right;
                    }
                </style>
                          
<?php 
        }
    }
}else{
    header("Location: ../index.html");
}
?>
</body>
</html>
