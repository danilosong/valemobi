<?php 
require 'conexao.php';
//captura o valor da caixa de texto e deposita na variável
        $id="";
		
		if (isset($_POST['cod_produto'])){
		$id =  $_POST['cod_produto'];}
		

function consultaProduto($conn,$id){
$consulta_produto = mysqli_query($conn, "select * from produto where COD_PROD = '".$id."'");

return $consulta_produto;

}
		
?>
