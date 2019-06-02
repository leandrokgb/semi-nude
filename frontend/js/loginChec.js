function loginChec(){

    var email = document.forms['flogin']['email'].value;
    var senha = document.forms['flogin']['senha'].value;


    if(email == "" && senha == ""){
        alert("Você digitou algo?");
        return false;
        email.focus();
    }

    if(email == "" || email.length < 4){
        alert("Verifique seu e-mail.");
        return false;
        email.focus();
    }
    if(senha == "" || senha.length < 4){
        alert("Verifique sua senha.");
        return false;
        senha.focus();
    }
}
