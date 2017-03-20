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
<legend align="center">Escolha a opção</legend>

<!-- Multiplo Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="compra_venda_produto">Tipo do Negócio</label>
  <div class="col-md-4">
  <div class="field">
    <label for="compra_venda_produto-0">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-0" value="1" onClick="location.href='compra.php'">
      Compra
    </label>
	</div>
  <div class="field">
    <label for="compra_venda_produto-1">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-1" value="2" onClick="location.href='venda.php'">
      Venda
    </label>
	</div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
