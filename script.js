$(function(){
	//função main do jquery
	
})
//função para inserir as tags no formulario
function geraEquipe(){
	let i = 0; 
	let select = $('#single').val();//recebe o valor contido na tag em forma de string
	select = parseInt(select, 10); //converte o valor da variavel de string para inteiro
	while(i < select){
		$('#dadosEquipes').append(`<label id="inscrever" class="addDados">Nome Do ${i+1}º Atleta:</label><input type="text" id="nome_equipe" name="nomeAtleta${i+1}"><br>`)
		i++;	
	}
	

}