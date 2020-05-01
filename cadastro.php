<?php 
	require_once 'header.php';
 ?>
 <?php 
 	require_once 'action/db_connect.php';
 	if (isset($_POST['nome'])) {
 		# code...
 		$nome = mysqli_escape_string($connect, $_POST['nome']);
 		$email = mysqli_escape_string($connect, $_POST['email']);
 		$senha = mysqli_escape_string($connect, $_POST['senha']);
 		$nomeUsuario = mysqli_escape_string($connect, $_POST['someUsuario']);
 		$senha = password_hash($senha, PASSWORD_DEFAULT);
 		
 		$sql = "INSERT INTO usuarios (nome, email, nomeUsuario, senha) VALUES ('$nome', '$email', '$nomeUsuario' , '$senha')";
 		//verifica se deu tudo certo
 		if (mysqli_query($connect, $sql)) {
 			# code...
 			echo "<p>Cadastro realizado com sucesso</p>";
 			header("Location: login.php");
 		}else{
 			echo "<p>Erro ao cadastrar</p>";
 		}
 	}
  ?>
 	<title>Cadastrar</title>
 	<script src="scripts/validaCadastro.js"></script>
 </head>
<body>
	<div class="main">
		<div class="container">
			<div class="login">
				<form id="Form" name="Form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<p>Nome</p><input type="text" name="nome" id="nome">
					<p>email</p><input type="email" name="email" id="email">
					<p>Repita o email</p><input type="email" id="emailr">
					<p>Nome De Usuario</p><input type="text" name="someUsuario" id="nomeUsuario" onclick="validaEmail()">
					<p>senha</p><input type="password" name="senha" id="senha">
					<p>Repita senha</p> <input type="password" id="senhar" onclick="">
					<button  type="button" onclick="validaSenha()">Cadastrar</button>
				</form>
			</div>
		</div>
		
	</div>
</body>

 <?php 
 	require_once 'footer.php';
  ?>