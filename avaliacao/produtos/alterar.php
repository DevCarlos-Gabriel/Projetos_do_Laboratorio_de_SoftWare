<?php

include('../banco.php');


$codpro = filter_input(INPUT_POST, 'codpro');

$nome = filter_input(INPUT_POST, 'nome');

$descricao = filter_input(INPUT_POST, 'descricao');

$valc = filter_input(INPUT_POST, 'valcusto');

$valv = filter_input(INPUT_POST, 'valvende');

$estoque = filter_input(INPUT_POST, 'estoque');

$data = filter_input(INPUT_POST, 'data');

$nemp = filter_input(INPUT_POST, 'nemp');

$cnpjp = filter_input(INPUT_POST, 'cnpjp');

//alrando os campos de custo!!

$val_custo = str_replace('.', "", $valc);
$valc = str_replace(',', ".", $val_custo);

$val_venda = str_replace('.', "", $valv);
$valv = str_replace(',', ".", $val_venda);

$sql = "UPDATE `tbproduto` SET `nome_pro`='$nome',`descricao`='$descricao',`valor_custo`='$valc',`valor_venda`='$valv',`estoque`='$estoque',`data_cad`='$data',`nome_empresa`='$nemp',`cnpj_empresa`='$cnpjp' WHERE cod_pro = $codpro";

$update = $conexao->query($sql);

if ($update) {
  echo '1';
} 
else
{
   echo '0';
   echo ' Erro: ' . mysqli_errno($conexao) . ' - ' . mysqli_error($conexao);
}
?>