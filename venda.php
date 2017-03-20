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

<script language="javascript">
//-----------------------------------------------------
//Funcao: MascaraMoeda
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}

//mascara para aceitar apenas numerico

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

</script>

<?php
require 'conexao.php';
$seleciona_produto = mysqli_query ($conn,"SELECT * FROM tipo_produto");
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
<form class="form-horizontal" action="inserir_produto.php" method ="post">
<fieldset>

<!-- Nome do formulario -->
<legend align="center">Negociação de mercadorias</legend>

<!-- Multiplo Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="compra_venda_produto">Tipo do Negócio</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="compra_venda_produto-0">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-0" value="compra" onClick="location.href='compra.php'">
      Compra
    </label>
	</div>
  <div class="radio">
    <label for="compra_venda_produto-1">
      <input type="radio" name="compra_venda_produto" id="compra_venda_produto-1" value="venda" onClick="location.href='venda.php'" checked="true">
      Venda
    </label>
	</div>
  </div>
</div>

<!-- Texto input cod da mercadoria auto encremento-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_produto">Código da Mercadoria</label>  
  <div class="col-md-4">
  <input id="cod_produto" name="cod_produto" type="text" placeholder="Digite o código da Mercadoria" class="form-control input-md" readonly> 
  </div>
</div>

<!-- Select Basic pega tipo produto no banco -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipo_produto">Tipo da Mercadoria</label>
  <div class="col-md-4">
    <select id="tipo_produto" name="tipo_produto" class="form-control" required><option></option>
    <?php 
        while($venda = mysqli_fetch_array($seleciona_produto)){
	?>
 			<option value="<?php echo $venda['TIPO_PROD']?>">
				<?php echo $venda['TIPO_PROD']?>
            </option>
                <?php }?>
    </select>
  </div>
</div>

<!-- Texto input nome da mercadoria-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome_produto">Nome da Mercadoria</label>  
  <div class="col-md-4">
  <input id="nome_produto" name="nome_produto" placeholder="Ex. Regata Decote Costas Nadador Estampada (M)" type="text" class="form-control input-md" maxlength="100" required>
    
  </div>
</div>

<!-- Texto input Quantidade-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qtd_produto">Quantidade</label>  
  <div class="col-md-2">
  <input id="qtd_produto" name="qtd_produto" type="text" placeholder="Quantidade" class="form-control input-md" onKeyPress="return SomenteNumero(event)" required>
    
  </div>
</div>

<!-- Texto input preco-->
<div class="form-group">
  <label class="col-md-4 control-label" for="preco_produto">Preço</label>  
  <div class="col-md-2">
  <input id="preco_produto" name="preco_produto" type="text" placeholder="R$00,00" class="form-control input-md" onKeyPress="return(MascaraMoeda(this,'.',',',event))" required>
    
  </div>
</div>

<!-- Botao (Double) confirmar ou apagar-->
<div class="form-group">
  <label class="col-md-4 control-label" for="confirmar_produto"></label>
  <div class="col-md-8">
    <button id="confirmar_produto" name="confirmar_produto" class="btn btn-success" type="submit" value="Cadastrar">Confirmar</button>
    <button id="resetar_produto" name="resetar_produto" class="btn btn-inverse" type="reset">Limpar</button>
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
