<?php
	// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
	// O return-path deve ser ser o mesmo e-mail do remetente.
	//$_POST['receberNovidade'] = (isset($_POST['receberNovidade']))? true : false;
	require_once 'db_connect.php';
	if(isset($_POST['submit'])){
		$erros = array();
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$assunto = mysqli_escape_string($connect, $_POST['assunto']);
		$msg = mysqli_escape_string($connect, $_POST['mensagem']);
		$recebeNovi = retorneCheck();
		$sql = "INSERT INTO comentario (nome, email, assunto, mensagem, recebenovi) VALUES ('$nome', '$email', '$assunto', '$msg', '$recebeNovi') ";
		//verifica se deu tudo certo
		if (mysqli_query($connect, $sql)) {
			# code...
			echo "<p>Enviando com sucesso</p>";
			header("Location: ../index.php");
		}else{
			echo "<p>erro</p>";
			header("Location: ../index.php");
		}

		mysqli_close($connect);
	}

function retorneCheck(){
	$aux;
	if (isset($_POST['receberNovidade'])) {
		# code...
		$aux = $_POST['receberNovidade'];
	}else{
		$aux = 'false';
	}
	return $aux;
}
 

