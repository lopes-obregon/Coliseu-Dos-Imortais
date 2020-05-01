<?php 
	require_once 'headeri.php';
 ?>	
		<title>Coliseu Dos Imortais</title>
	</head>
	<body>
			
		<div id="principal">
			<figure>
				<img src="fotos/primeira.jpg">
				<figcaption><em>No dia que ja se passou deste ano foi realizado o coliseu dos imortais 	onde teve uma grande campeam que nao sei o nome neste momento.</em><br>
					<p>Primeira Edição Do Coliseu Dos Imortais.</p>

				 </figcaption>	
			</figure>
			<h3 class="titulo-artigo">Previa rapida do coliseu dos imortais</h3>
			<figure>
				<img src="fotos/cdi.jpg" alt="erro2">
				<figcaption>um convite simples</figcaption>
			</figure>
			<p>Foi Realizado um pequeno torneio de forma gratuita apenas para testes de plataforma, mas para muitos não se pareceia apenas um teste parecia uma competição verdadeira, teve em torno de 30 equipes inscritas, foi um grande espetaculo de torneio alpha.</p>
			<h4>Noticías</h4>
			<p>Sem noticias no momento</p>
			<ul><!--para construção de lincks ou bolinhas para marcar intens <ul> e //<li> -> li para fazer as bolinhas ou <ol> para fazer ordem com numeros-->
				<li><a href="#logo">click aqui para voltar para o topo</a></li>
				
			</ul>				
			<p><strong>Inicio do conteudo</strong></p><!-- <strong> deixa o texto em negrito -->
			<p><em>Vamos ter diversas coisa neste site de muito interese</em></p><!--<p> e <\p> usados para escrever no site sendo assim colocar cada paragrafo-->
			<!-- deixa o texto em italico <em>-->
			<p> deixe seu comentario para saber oque está  achando do nosso site</p>
			<form action="action/enviaEmail.php" method="post">
				<p>
					<label>Nome:</label> <br>
					<input type="text" id="nome" required name="nome">
				</p>
				<p>
					<label>Email:</label><br>
					<input type= "email" name= "email" required>
				</p>
				<p>
					<label>Assunto</label> <br>
					<input type="text" name="assunto">
				</p>
				<p>
					<label> Mensagem</label><br>
					<textarea name= "mensagem" cols="100" rows="8"></textarea>
				</p>
				<p><input type="checkbox" name="receberNovidade" value="true">Aceita receber nossas novidades?</p>
				<p><input id="submit" type ="submit" name="submit" value="Enviar"></p>
		</form>	
		</div>
<?php 
	require_once 'footer.php';
 ?>		