<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Negociação de mercadorias</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<script language="javascript">
//mascara para aceitar apenas numerico

	function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
//diferentes submit
function Enviar(opc)
{
	if(opc == 1)
	{
  document.form.action = "carrinho.php?acao=add&id='.$ln['id'].'";
	}
	if(opc == 0)
	{
  document.form.action = "compra.php";
	}
}
</script>
</head>
<body>
<?php
require 'conexao.php';
if (isset($_POST['cod_produto']) && $_POST['cod_produto'] != ""){
require 'buscar_produto.php';
$resultadoProduto = consultaProduto($conn,$_POST['cod_produto']);
$resultadoProdutoTela = mysqli_fetch_array($resultadoProduto);
}
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
<form class="form-horizontal" method="POST" target="" id="form" onSubmit="" action="" name="form">
<fieldset>

<!-- Nome do formulario -->
<legend align="center">Negociação de mercadorias</legend>

<!-- Multiplo Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="compra_venda_produto">Tipo do Negócio</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="compra_venda_produto-0">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-0" value="compra" onClick="location.href='compra.php'" checked="true">
      Compra
    </label>
	</div>
  <div class="radio">
    <label for="compra_venda_produto-1">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-1" value="venda" onClick="location.href='venda.php'">
      Venda
    </label>
	</div>
  </div>
</div>
<!-- Texto input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_produto">Código da Mercadoria</label>  
  <div class="col-md-4">
  <input id="cod_produto" name="cod_produto" type="text" placeholder="Digite o código da Mercadoria" class="form-control input-md" value="<?php  if (isset ($_POST['cod_produto'])){ echo $resultadoProdutoTela['COD_PROD'];} ?>" onKeyPress="return SomenteNumero(this.event)" required>
  <input type="submit" name="btnbuscar" value="Buscar" onClick="Enviar(0)" />
  <a href="" onclick="window.open('consulta.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">Ajuda</a></div>
</div>


<!-- Texto input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo_produto">Tipo da Mercadoria</label>  
  <div class="col-md-4">
  <input id="tipo_produto" name="tipo_produto" type="text" readonly  class="form-control input-md" value="<?php  if (isset ($_POST['tipo_produto'])){ echo $resultadoProdutoTela['TIPO_PROD'];} ?>">
</div>
</div>

<!-- Texto input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome_produto">Nome da Mercadoria</label>  
  <div class="col-md-4">
  <input id="nome_produto" name="nome_produto" type="text" readonly class="form-control input-md" value="<?php  if (isset ($_POST['nome_produto'])){ echo $resultadoProdutoTela['NOME_PROD'];} ?>">
    
  </div>
</div>

<!-- Texto input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qtd_produto">Quantidade</label>  
  <div class="col-md-2">
  <input id="qtd_produto" name="qtd_produto" type="text" placeholder="Quantidade" class="form-control input-md" onKeyPress="return SomenteNumero(this.event)" >
    
  </div>
</div>

<!-- Texto input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="preco_produto">Preço</label>  
  <div class="col-md-2">
  <input id="preco_produto" name="preco_produto" type="text" placeholder="R$00,00" readonly  class="form-control input-md" value="<?php  if (isset ($_POST['preco_produto'])){ echo $resultadoProdutoTela['PRECO_PROD'];} ?>">
  </div>
</div>

<!-- Botao (Double) -->
<div class="form-group">																			
  <label class="col-md-4 control-label" for="confirmar_produto"></label>
  <div class="col-md-8">
    <button id="confirmar_produto" name="confirmar_produto" class="btn btn-success" onClick="Enviar(1)" >Confirmar</button>
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