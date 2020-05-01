<?php 
	require_once 'db_connect.php';
	session_start();
	$erro = array();
	//dados
 	$id = $_SESSION['idUsuario'];
 	$sql = "SELECT * FROM usuarios  WHERE id = '$id'";
 	$resultado = mysqli_query($connect, $sql);
 	//variavel com os dados da tabela
 	$dados = mysqli_fetch_array($resultado);
	//se o evento existe
	if (isset($_POST['submit'])) {
		# code...
		if (empty($_POST['nomeEquipe'])) {
			# code...
			$erro[] = "Nome Da Equipe vazio por favor insira algo.";
		}
		if (empty($_POST['numeroMenbro'])) {
				# code...
			$erro[] = "Numéro de equipes invalido por favor selecione um numero de equipe valido.";
		}
	}
	$_POST['nomeAtleta5</label>'] = (isset($_POST['nomeAtleta5</label>'])) ? $_POST['nomeAtleta5</label>'] : '';
	$_POST['nomeAtleta6</label>'] = (isset($_POST['nomeAtleta6</label>'])) ? $_POST['nomeAtleta6</label>'] : '';
	$_POST['nomeAtleta7</label>'] = (isset($_POST['nomeAtleta7</label>'])) ? $_POST['nomeAtleta7</label>'] : '';
	echo "<hr>";
	//se não estiver vazio
	if (!empty($erro)) {
		# code...
		foreach ($erro as $erros) {
			# code...
			echo $erros."<br>";
		}
	}else{
		$id = $dados['id'];
		$nomeTime = mysqli_escape_string($connect, $_POST['nomeEquipe']);
		$contact = mysqli_escape_string($connect, $_POST['contact']);
		$at1 = isset($_POST['nomeAtleta1</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta1</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta1']);
		$at2 = isset($_POST['nomeAtleta2</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta2</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta2']);
		$at3 = isset($_POST['nomeAtleta3</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta3</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta3']);
		$at4 = isset($_POST['nomeAtleta4</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta4</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta4']);
		$at5 = isset($_POST['nomeAtleta5</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta5</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta5']);
		$at6 = isset($_POST['nomeAtleta6</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta6</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta6']);
		$at7 = isset($_POST['nomeAtleta7</label>']) ? mysqli_escape_string($connect, $_POST['nomeAtleta7</label>']) :  mysqli_escape_string($connect, $_POST['nomeAtleta7']);
		$grupo = geraGrupo($connect);
		$sql = "INSERT INTO timess (id, nomeTime, nomeat1, nomeat2, nomeat3, nomeat4, nomeat5, nomeat6, nomeat7, contact) VALUES ('$id','$nomeTime', '$at1', '$at2', '$at3', '$at4', '$at5', '$at6', '$at7', '$contact')";
		//verifica se deu tudo certo
 		if (mysqli_query($connect, $sql)) {
 			# code...
 			echo "<p>Cadastro realizado com sucesso!</p>";
 			echo "<a href='../increver.php'>Voltar</a>";
 		}else{
 			echo "<p>Erro ao cadastrar!</p>";
 			echo "<a href='../home.php'>Voltar</a>";

 		}
 		$sql = "INSERT INTO times_tabela (nomeTime, pontos, jogos, vitoria, empate, derrota, saldokill, grupo) VALUES ('$nomeTime', 0, 0, 0, 0, 0, 0, '$grupo')";
 		if (mysqli_query($connect, $sql)) {
 			# code...
 			echo "Todos Cadastros realizado com sucesso!";
 		}
 		else{
 			echo "Erro algun Cadastro não foi realizado com sucesso!";
 		}
 		mysqli_close($connect);
	}
	#echo "<a href='../increver.php'>Voltar</a>";
//função que gera qual grupo o time vai estar
function geraGrupo($connect){
	$sql = "SELECT * FROM times_tabela";
	$resultado = mysqli_query($connect, $sql);
	$grupos  = array('A','B', 'C', 'D', 'E', 'F', 'G', 'H');
	if (mysqli_num_rows($resultado) > 0) {
		# code...
		//variavel que conta a quantida que vai de 1 até 4
		$gp = 0; 
		$qntGrupoTimes = array('A' => 0 , 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 0, 'H' => 0 );
		//parte que conta quantos times tem em cada grupo
		for ($i=0; $i < 8; $i++) { 
			# code...
			while ($times = mysqli_fetch_array($resultado)) {
			# code...
				if ($grupos[$i] == $times['grupo']) {
					# code...
					$gp +=1;
				}
			}
			saveTeam($qntGrupoTimes, $i, $gp);
		}
		//parte que gera os times
		foreach ($qntGrupoTimes as $key => $value) {
			# code...
			if ($key and ($value < 4)) {
				# code...
				//grava o banco a chave
				return $key;
				break;
			}
		}
	}
}
//função que armazena
function saveTeam($array, $index, $valor){
	
	if ($index == 0) {
		# code...
		$array['A'] = $valor;
	}elseif ($index == 1) {
		# code...
		$array['B'] = $valor;
	}elseif ($index == 2) {
		# code...
		$array['C'] = $valor;
	}elseif ($index == 3) {
		# code...
		$array['D'] = $valor;
	}elseif ($index == 4) {
		# code...
		$array['E'] = $valor;
	}elseif ($index == 5) {
		# code...
		$array['F'] = $valor;
	}elseif ($index == 6) {
		# code...
		$array['G'] = $valor;
	}else{
		# code...
		$array['H'] = $valor;
	}
}
