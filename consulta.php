<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Negociação de mercadorias</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
	require 'conexao.php';
	$consulta_prod = mysqli_query($conn, "SELECT COD_PROD, NOME_PROD FROM vendas;")
?>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="index.php">Início</a></div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<form class="form-horizontal" method="post" enctype="multipart/form-data" name="escolha_form">
<fieldset>

<!-- Nome do formulario -->
<legend align="center">Lista dos produtos</legend>

<!-- Select Multiple -->



<div class="form-group">
  <div class="col-md-4 col-lg-8 col-lg-offset-2">
    <label class="control-label" for="consulta_produto" >Codigo</label>
    <label class="control-label" for="consulta_produto">&nbsp Descrição</label>
    <select id="consulta_produto" name="consulta_produto" class="form-control" multiple="multiple">
      <?php 
        while($consulta = mysqli_fetch_array($consulta_prod))
		{
	?>
      <option value="consulta">
        <?php
					echo $consulta['COD_PROD'],'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', $consulta['NOME_PROD']
				?>
      </option>
      <?php 
		}
				?>
    </select>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
