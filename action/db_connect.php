<?php
	$serveName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "coliseu_dos_imortais";
	$port = "3308";
	$connect = mysqli_connect($serveName, $userName, $password, $dbName, $port);
	if (mysqli_connect_error()) {
		# code...
		echo "Erro de conexão". mysqli_connect_error();
	}