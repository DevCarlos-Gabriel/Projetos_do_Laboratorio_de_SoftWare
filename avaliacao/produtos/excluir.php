<?php

include('../banco.php');

$codpro=$_POST['id']; 

$sql = "DELETE FROM `tbproduto` WHERE cod_pro = $codpro";
      

    $excluir = $conexao->query($sql); //executa a inser褯
	if ($excluir) {
			echo '1';
		} 
 	else {
			echo '0';
		}
 

?>