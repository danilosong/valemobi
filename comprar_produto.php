<html>
<head>
<title>Produtos</title>
</head>
<body>   
<?php header("Content-Type: text/html; charset=ISO-8859-1", true); ?>
<?php
require 'conexao.php';
        $cod_produto="";
		$tipo_produto="";
		$nome_produto="";
		$qtd_produto="";
		$preco_produto="";

if (isset($_POST[''])){
$cod_produto = $_POST[''];}

if (isset($_POST['tipo_produto'])){
$tipo_produto = $_POST['tipo_produto'];}

if (isset($_POST['nome_produto'])){
$nome_produto = $_POST['nome_produto'];}

$qtd_produto = $_POST['qtd_produto'];}
if (isset($_POST['qtd_produto'])){
$preco_produto = $_POST['preco_produto'];}

$preco_produto = str_replace(",", ".", $preco_produto);

mysqli_query($conn,"INSERT INTO vendas (COD_PROD, TIPO_PROD, NOME_PROD, QTD_PROD, PRECO_PROD) VALUES('".$cod_produto."', '".$tipo_produto."' , '".$nome_produto."' , '".$qtd_produto."' , '".$preco_produto."')");
?>
    
<?php
echo '<meta http-equiv="refresh" content="0, URL=index.php">';
?>
</body>
</html>