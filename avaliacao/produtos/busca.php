<?php
   include('../banco.php');
   $texto=$_POST['pesquisa'];
   $sql = "select nome_pro,descricao,valor_custo,valor_venda,estoque,date_format(data_cad,'%d/%m/%Y') as data,cod_pro, nome_empresa, cnpj_empresa from tbproduto where nome_pro like  '%".$texto."%' limit 0,30"; //gera o codigo sql.
	 
   $consulta = $conexao->query($sql);//executa a consulta
	
	if ($consulta->num_rows > 0) {
	
		while($row=$consulta->fetch_array(MYSQLI_ASSOC)){
			$valor_custo = number_format($row['valor_custo'], 2, ',', '.');
            $valor_venda = number_format($row['valor_venda'], 2, ',', '.');
			echo '<tr class="odd gradeX">
                  <td class="left">'.$row['nome_pro'].'</td>
				  <td class="left">'.$row['descricao'].'</td>
				  <td class="left">'.$valor_custo.'</td>
				  <td class="left">'.$valor_venda.'</td>
				  <td class="left">'.$row['estoque'].'</td>
				  <td class="left">'.$row['data'].'</td>
				  <td class="left">'.$row['nome_empresa'].'</td>
				  <td class="left">'.$row['cnpj_empresa'].'</td>
				  <td class="left">
				   <a href="#" id="'.$row['cod_pro'].'|A" title="Alterar" class="btn btn-tbl-edit btn-sm bg-info">
					  <i class="fa fa-pencil"></i>
				    </a>
				    <a href="#" id="'.$row['cod_pro'].'|E" title="Excluir" class="btn btn-tbl-delete btn-sm bg-warning" >
					  <i class="fa fa-trash-o "></i>
				    </a>
			     </td>
				 </tr>';			
			
		}
		
	}else{ 
			echo "0";
	}




?>