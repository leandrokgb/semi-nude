function formChec(){
   
    //form vars
    var nome = document.forms['fregistro']['nome'].value;
    var email = document.forms['fregistro']['email'].value;
    var senha = document.forms['fregistro']['senha'].value;
    var confSenha = document.forms['fregistro']['confSenha'].value;
    var rg = document.forms['fregistro']['rg'].value;
    var cpf = document.forms['fregistro']['cpf'].value;
    //fim form

    var arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    var especialArr = ["!", "@", "#", "$", "%", "¨", "&", "*", "(", ")", "-", "+", "=", ";"];
    var num = /^[0-9]+$/;
    nome = nome.replace(/\s/gi, '');

    if(nome == "" || nome.length < 3){ //nome
        alert('Nome muito pequeno.')
        return false;
        nome.focus();
    }
    var i = 0;
    var j = 0;
    while(i < nome.length){
        if(nome[i] != arr[j] && nome[i] != especialArr[j]){
            j++;
            if(j > especialArr.length){
                j = 0;
                i++;
            }
        }else{
            alert('Seu nome contém caracteres ilegais, por favor, verifique!');
            return false;
            break;
        }
    }//fim nome

    if(email == "" || email.length <= 10){ //exemplo@hotmail.com -> 19 caracteres
        alert('Seu E-mail esta correto?');
        return false;
        email.focus();
    }
    if(email.indexOf("@") == -1){
        alert("Você digitou seu E-mail corretamente?");
        return false;
        email.focus();
    } //fim email

    if(senha == "" || senha.length <= 5){ //senha
        alert("Sua senha é muito pequena.");
        return false;
        senha.focus();
    }else if (senha != confSenha) {
        alert("As senhas estão diferentes.");
        return false;
        confSenha.focus();
    }//fim senha

    if(rg == "" || rg.length < 9 || num.test(rg) != 1){ //RG e CPF
        alert("Verifique o seu RG.");
        return false;
        rg.focus();
    }
    if(cpf == "" || cpf.length < 9 || num.test(cpf) != 1){
        alert("Verifique o seu CPF.");
        return false;
        cpf.focus();
    }//fim RG e CPF
}