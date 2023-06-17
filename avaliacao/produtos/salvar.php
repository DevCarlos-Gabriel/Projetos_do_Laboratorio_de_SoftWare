<?php

include('../banco.php');

$nome=filter_input(INPUT_POST, 'nome');
$data=filter_input(INPUT_POST, 'data'); 
$preco_custo=filter_input(INPUT_POST, 'compra');
$preco_venda=filter_input(INPUT_POST, 'Venda'); 
$estoque=filter_input(INPUT_POST, 'estoque'); 
$descricao=filter_input(INPUT_POST, 'descricao');
$nome_empresa=filter_input(INPUT_POST, 'nomeEp');
$cnpj_empresa=filter_input(INPUT_POST, 'cnpjEp');

// ajustando os caracteres do salario
$preco_custo = str_replace('.', "", $preco_custo);
$preco_custo = str_replace(',', ".", $preco_custo);
$preco_venda= str_replace('.', "", $preco_venda);
$preco_venda = str_replace(',', ".", $preco_venda);

$sql = "INSERT INTO `tbproduto`(`cod_pro`, `nome_pro`, `descricao`, `valor_custo`, `valor_venda`, `estoque`, `data_cad`, `nome_empresa`, `cnpj_empresa`) VALUES (null,'$nome','$descricao','$preco_custo','$preco_venda','$estoque','$data','$nome_empresa','$cnpj_empresa')";

    $inserir = $conexao->query($sql); //executa a inser
	if ($inserir) {
			echo '1';
		} 
 	else {
			echo '0';
		}
 

?>