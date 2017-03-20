<?php 

	//Seta informações de banco de dados
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn, "loja") or die(mysqli_error('Até Logo'));
?>