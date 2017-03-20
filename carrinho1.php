<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Negociação de mercadorias</title>
<?php
	require 'conexao.php';
	$sql = "SELECT * FROM produtos";
?>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="index.php">Início</a></div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<form class="form-horizontal" method="POST" action="compra.php">
<fieldset>

<!-- Nome do formulario -->
<legend align="center">Carrinho</legend>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="produto_cesta">Cesta</label>
  <div class="col-md-5">                     
    <textarea class="form-control" id="produto_cesta" name="produto_cesta"  readonly>produtos...</textarea>
  </div>
</div>
</fieldset>
</form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>