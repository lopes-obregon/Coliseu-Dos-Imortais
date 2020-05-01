//js main

//jquery main
$(function(){
})

function validaEmail(){
	let email = $('#email').val();
	let repetEmail = $('#emailr').val();
	if (email != repetEmail) {
		alert('Email não conferes')
	}
}
function validaSenha(){
	let senha = $('#senha').val();
	let senhar = $('#senhar').val();
	if (senha != senhar) {
		alert('Senha não confere');
	}else{
		document.Form.submit()
	}
	
}