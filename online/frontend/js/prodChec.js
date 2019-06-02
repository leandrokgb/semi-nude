function prodChec(){

	var nome = document.forms['fprod']['nomep'].value;
	var preco = document.forms['fprod']['precop'].value;
	var tipo = document.forms['fprod']['tipop'].value;

	var num =  /^[+-]?((\d+|\d{1,3}(\.\d{3})+)(\,\d*)?|\,\d+)$/; //regex
    var numNome = /^[0-9]+$/;
        
	if(nome == "" || nome <= 3 || numNome.test(nome)){
            alert('O nome do produto esta correto?');
            return false;
            nome.focus();
	}
	
	if(preco == "" || num.test(preco) != 1){
            alert('O preco esta correto?');
            return false;
            preco.focus();
	}

	if (tipo == "") {
            alert('Por favor, verifique o tipo do produto.');
            return false;
            tipo.focus();
	}
}
