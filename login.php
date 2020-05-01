<?php 
	require_once 'header.php';
 ?>
<?php 
	require_once 'action/db_connect.php';
	session_start();
	if (isset($_POST['submit'])) {
		# code...
		$login = mysqli_escape_string($connect, $_POST['username']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
//empety vazio
		if (empty($login) or empty($senha)) {
			# code...
			echo "Nome De Usuario ou senha vazio";
		}else{
			//verifica se existe o login
			$sql = "SELECT * FROM usuarios";
			$resultado = mysqli_query($connect, $sql);
			if (mysqli_num_rows($resultado) > 0) {
				# code...
				while ($dados = mysqli_fetch_array($resultado)) {
					# code...
					if ($login == $dados['nomeUsuario']) {
						# code...
						$senha_db = $dados['senha'];
						if (password_verify($senha, $senha_db)) {
							# code...
							mysqli_close($connect);
							$_SESSION['logado'] = true;
							$_SESSION['idUsuario'] = $dados['id'];
							header("Location: home.php");
						}else{
							echo "<p class='print'>Senha invalida</p>";
						}
					}else{
						echo "<p class='print'>Nome de usuario invalido</p>";
					}
				}
			}
		}
	}

 ?>

 	<title>Login</title>
 </head>
 <body>
 	<div class="main">
 		<div class="container">
 			<div class="login">
 				<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
 				<p>Nome De Usuario</p><input type="text" name="username">
 				<p>Senha</p><input type="password" name="senha"><br><br>
 				<input type="submit" name="submit" value="Entrar">
 			</form>
 			<a href="cadastro.php">Cadastrar</a>
 			<a href="">Esqueci senha</a>
 			</div>
 		</div>
 	</div>

 </body>
 <?php 
 	require_once 'footer.php';
  ?>