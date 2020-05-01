<?php 
	require_once 'header.php';
 ?>
<?php
 	require_once 'action/db_connect.php';
 	session_start();
 	//se não existe a sessão
 	if(!isset($_SESSION['logado'])){
 		header("Location: index.php");
 	}
 	//dados
 	$id = $_SESSION['idUsuario'];
 	$sql = "SELECT * FROM usuarios  WHERE id = '$id'";
 	$resultado = mysqli_query($connect, $sql);
 	//variavel com os dados da tabela
 	$dados = mysqli_fetch_array($resultado);
 	//fecha consulta 
 	if ($dados['id'] == '1' or $dados['id'] == '2') {
 		# code...
 		//parde dos adms
?>
		<title>Home/admin</title>
	</head>
	<body>
		<div class="main">
			<h2 class="printT">Olá ADM(<?php echo $dados['nome']; ?>)</h2>
			<div class="container">
				<div class="login">
					
					<form id="formT" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
						<button name="verTimesC">Ver Times Cadastrados</button>
						<button name="geraTabela">Gerar Tabela</button>
						
				<?php 
					if (isset($_POST['verTimesC'])) {
						# code...
				 ?>	
						<ul>
							<li>Nome Dos Times
								<ul>
								<?php 
									$sqlCode = "SELECT * FROM timess";
									$resultado = mysqli_query($connect, $sqlCode);
									$i = 0;
									if (mysqli_num_rows($resultado) > 0) {
										# code...
										while ($nomeTimes = mysqli_fetch_array($resultado)){
											# code...
								?>
										<li><?php echo $nomeTimes['nomeTime']; ?></li>
								<?php 
										}
									}
								?>
								</ul>
							</li>
						</ul>
				<?php }//fecha o if de ver times cadastrados 
					elseif (isset($_POST['geraTabela'])) {
						$sqlCode = "SELECT * FROM comandos_adm";
						$resultado = mysqli_query($connect, $sqlCode);
						$banco = mysqli_fetch_array($resultado);
						$banco['iniciou_tabela'] = ($banco['iniciou_tabela'] == 'true') ? true: false;
						if ($banco['iniciou_tabela'] == true) {
							# code...
							
				?>
							<script type="text/javascript">
								alert("A tabela ja foi iniciada");
							</script>
				<?php			
						}else{


						# code...
						$sqlCode = "SELECT * FROM times_tabela";
						$resultado = mysqli_query($connect, $sqlCode);
						//para gerar a tabela a quantida de times deve ser maior  ou igual a quatro
				?>
						<!--script com a criação do objeto e salva os dados-->
						<script type="text/javascript">
							alert("Tabela gerada com sucesso!");

							/*objeto criado para salvar os dados para não fazer varias consultas toda hora*/
							var timeDados = {
								grupo: [],
								nomeTime: [],
								p:[],//para pontos
								j:[],//para jogos
								v:[],//para vitoria
								e:[],//para empates
								d:[],//para derrotas
								s:[]//para saldo de kills do time ao total
							}//crio o objeto
							<?php 
								if (mysqli_num_rows($resultado) > 0) {
									# code...
									while ($times = mysqli_fetch_array($resultado)) {
										# code...
								
							 ?>
							 			timeDados.grupo.push("<?php echo $times['grupo']; ?>");
										timeDados.nomeTime.push("<?php echo $times['nomeTime']; ?>");
										timeDados.p.push("<?php echo $times['pontos']; ?>");
										timeDados.j.push("<?php echo  $times['jogos'] ; ?>")
										timeDados.v.push( "<?php echo  $times['vitoria']; ?>");
										timeDados.e.push("<?php echo  $times['empate']; ?>");
										timeDados.d.push("<?php echo  $times['derrota']; ?>");
										timeDados.s.push( "<?php echo  $times['saldokill']; ?>");
							<?php 
							 		}
								
							  ?>
						</script>
								<!--dentro do if das linhas do banco de dados caso exista-->
									<br>
									<label>Grupo</label><select id="selectTeam">
									</select>
									<!--script que chama a função para printrar os times na tabela-->
									<script type="text/javascript">	
										function print_table_team(){
											//remove caso exista o texto
											$('#text').remove();
											//retorna se existe algum time
											function retorn_team(timeSelecionado, timeBanco, inicio, fim){
												if(timeSelecionado == timeBanco[inicio]){
													return true;
												}else{
													if (inicio > fim) {
														return false;
													}else{
														retorn_team(timeSelecionado, timeBanco, inicio + 1, fim)
													}
												}
											}
											if (retorn_team($('#selectTeam').val(),timeDados.grupo, 0, timeDados.grupo.length) == true) {
												//cria a tabela dinamicamente
												$('#formT').append(`<table border="1" id="table"><tr><th>Nome Do Time</th><th>J</th><th>P</th><th>V</th><th>E</th><th>D</th><th>SK</th></tr></table>`);
											}
											
											//for para procurar os grupos e imprimir conforme a seleção
											for(let i in timeDados.grupo){
												//caso acha adiciona na tabela
												if ($('#selectTeam').val() == timeDados.grupo[i]) {
												 	$('#table').append('<tr><td>' + timeDados.nomeTime[i] + '</td><td>' + timeDados.j[i] + '</td><td>' + timeDados.p[i] + '</td><td>' + timeDados.v[i] + '</td><td>' + timeDados.e[i] + '</td><td>' + timeDados.d[i] + '</td><td>' + timeDados.s[i] + '</td></tr>' );
												}else{
													if ($('#selectTeam').val() == '') {
														$('#formT').append(`<p id="text">Selecione algum grupo por favor!</p>`)
														break;
													}else{
														//caso não acha no grupo imprime o texto
														//remove a tabela 
													 	$('#table').remove();
													 	//remove o texto para evitar bags
													 	$('#text').remove();
													 	//e escreve o texto;
													 	$('#formT').append(`<p id="text">Não ha times neste grupo!</p>`)
													}
												}
												
											}
										}
									</script>
									<!--butão para buscar o time-->
									<button type="button" onclick="print_table_team()">Buscar</button>
									
										
								</div>
										<br>
										<label>Deseja iniciar a tabela?</label>
										<br>
										<input type="radio" name="radio" id="sim" value="true">
										<label for="sim">Sim</label>
										<input type="radio" name="radio" id="nao" value="false" checked="">
										<label for="nao">Não</label>
										<br>
										<input type="submit" name="enviar_inicioTabela" value="Confirmar">

									</form>
								</div>
					<?php
						}else{
							echo "<p>Não há times suficientes</p>";
						}
					 ?>
				<?php
						} 
					}
					elseif (isset($_POST['enviar_inicioTabela'])) {
						# code...
						if (isset($_POST['radio'])) {
							# code...
							$op = mysqli_escape_string($connect, $_POST['radio']);
							$op2 = 'false';
							$sqlCode = "UPDATE comandos_adm SET iniciou_tabela = '$op', iniciou_chave = '$op2'";
							
							if (mysqli_query($connect, $sqlCode)) {
								# code...
								if ($op == 'true') {
									# code...
									echo "<p> Tabela iniciada com sucesso!</p>";
								}else{
									echo "<p> Tabela não iniciada!</p>";
								}
							}else{
								echo "<p>Algo deu errado!</p>";
							}
							mysqli_close($connect);
						}
					}
				 ?>
			</div>
		</div>	
	</body>

<?php 

	}else{
 		#code..
 		//caso não seja adm vai para essa home de usuario  comum.
?> 	
 	

	<title>Home</title>
 </head>
<?php 
	require_once 'centerCliente.php';
 ?>
<?php 
	}
 ?>
<?php 
	require_once 'footer.php';

?>