<body>
	
	<div class="main">
		<h2 class="printT">Olá <?php echo $dados['nome']; ?></h2>
		<div class="container">
			<div class="login">
				<a href="increver.php">Inscrever time</a>
				<a href="action/logout.php">Sair</a>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
					<button type="submit" name="verTime">Ver Time Cadastrado</button>
				</form>
			</div>
		</div>
		<div>
		</div>
		<div class="container">
			<div>
				<?php 
					if (isset($_POST['verTime'])) {
						# code...
						$sqlCode = "SELECT * FROM timess WHERE id = '$id'";
						$resultado = mysqli_query($connect, $sqlCode);
						$dadosTime = mysqli_fetch_array($resultado);
		 			?>
				<ul>
					<li>
						<b>Nome Do Time: <?php echo $dadosTime['nomeTime']; ?></b>	
					</li>
					<li>
						Nome Atletas:
					</li>
					<ul>
						<?php 
							for ($i=0; $i < 8 ; $i++) { 
								# code...
								if($i != 0){
									$aux = (string) $i;
									if ($dadosTime['nomeat'.$aux] == '') {
										# code...
									}else{
										echo "<li>".$dadosTime['nomeat'.$aux]."</li>";		
									}
									
								}
							
							}

						 ?>
					</ul>
					
				</ul>
		

		 		<?php 
		 			//final do if
		 			}
		 			mysqli_close($connect);
		  		?>
			</div>
		</div>	
	</div>
</body>