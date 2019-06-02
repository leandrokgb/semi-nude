$(function($){
    $('.excl').click(function(){
        var ancora = $(this).attr('href');
        var valor = ancora.split("=")[1];

        var teste = confirm('Deseja excluir o estoque do produto?');
        if(teste === true){
            $.get("../../backend/postOpProduto.php", {idprod:valor});
        }else{
            return false;
        }
    });
	
	$('.exclCat').click(function(){
        var ancora = $(this).attr('href');
        var valor = ancora.split("=")[1];

        var teste = confirm('Deseja excluir o estoque do produto?');
        if(teste === true){
            $.get("../../backend/postOpProduto.php", {idprod:valor});
        }else{
            return false;
        }
    });

    $('.modf').click(function(){

        var mod = $(this).attr('href');
        var valMod = mod.split("=")[1];
        var confirma = confirm('Dejesa alterar o valor da UNIDADE?');
        var novoPreco;

        if(confirma){
            do{
               novoPreco = prompt('Digite o novo valor do produto:');
            }while(novoPreco == null || novoPreco == "");
            if(novoPreco != "" || novoPreco.length > 0){
                $.get("../../backend/postOpProduto.php", {preco:novoPreco, idup: valMod});
            }
        }else{
            return false;
        }
    });
    
    $('.modtotal').click(function(){

       var link = $(this).attr('href');
       var valLink = link.split("=")[1];
       var conf = confirm('Dejesa alterar o valor da UNIDADE?');
       var novoTotal;

       if(conf){
           do{
              novoTotal = prompt('Digite o novo valor do produto:');
           }while(novoTotal == null || novoTotal == "");
           if(novoTotal != "" || novoTotal.length > 0){
               $.get("../../backend/postOpProduto.php", {total:novoTotal, idUpTotal: valLink});
           }
       }else{
           return false;
       }
    });
});