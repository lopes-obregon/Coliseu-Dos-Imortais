<!DOCTYPE html>
<html>
	<head>
		<title>Inscrever O time</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="jquery.js"></script>
		<script src="script.js"></script>
	</head>
	<body>
		<header>
			<div class="contender">
				<div id="logo">
					<a href="index.php"><img src="fotos/dota2-logo.jpg"></a>
				</div>
			</div>
		</header>
			<form id="form" action="action/trataFormIncrever.php" method="post">
				<label id="inscrever">Nome Da Equipe:</label>
				<input type="text" id="nome_equipe" name="nomeEquipe">
				<br>
				<label>Contato</label>
				<input type="text" name="contact" required>
				<br>
				<label>Número De Membros Da Equipe:</label>
				<select id="single" name="numeroMenbro">
					<option></option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
				</select>
				<button type="button" onclick="geraEquipe()">Gerar equipe</button>
				<div id="dadosEquipes">
					
				</div>
				<input type="submit" name="submit" value="Cadastrar Equipe">
			</form>
		<footer>Desenvolvido Por Renan Lopes Obregon</footer>
	</body>
</html>