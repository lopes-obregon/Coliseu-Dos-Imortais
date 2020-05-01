var team = ['', 'A','B', 'C', 'D', 'E', 'F', 'G', 'H'];

//inicia o jquery
$(function(){
	for(let i in team){
		$('#selectTeam').append(`<option> ${team[i]}</option>`);
	}
})