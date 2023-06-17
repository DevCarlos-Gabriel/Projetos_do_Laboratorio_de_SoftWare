<?php
       include('../banco.php');
       $codpro=$_POST['codpro'];
       $sql = "select * from tbproduto where cod_pro = '$codpro'"; 
              
       $consulta = $conexao->query($sql);//executa a consulta
              
              if ($consulta->num_rows > 0) {
              
                     while($row=$consulta->fetch_array(MYSQLI_ASSOC)){
                            $valor_custo = number_format($row['valor_custo'], 2, ',', '.');
                            $valor_venda = number_format($row['valor_venda'], 2, ',', '.');
                            
                            echo '
              <!--LINHA 1-->	
              <div class="row">
                     <div class="form-group col-md-2">
                            <label> COD</label>	
                            <input type="text" name="idalt" id="idalt" value="'.$row['cod_pro'].'" class="form-control" disabled>
                     </div>

                     <div class="form-group col-md-7">
                            <label> Nome</label>	
                            <input type="text" name ="nomealt" id="nomealt" value="'.$row['nome_pro'].'" class="form-control" >
                     </div>

                     <div class="form-group col-md-3">
                            <label>Valor Custo</label>	
                            <input type="text" name="vcalt" id="vcalt" value="'.$valor_custo.'" class="form-control money">
                     </div>

                     <div class="form-group col-md-3">
                            <label>Valor Venda</label>	
                            <input type="text" name="vvalt" id="vvalt" value="'.$valor_venda.'" class="form-control money">
                     </div>

                     <div class="form-group col-md-3">
                            <label>Estoque</label>	
                            <input type= "number"name="estoquealt" id="estoquealt" value="'.$row['estoque'].'" class="form-control">
                     </div>

                     <div class="form-group col-md-3">
                            <label>Data de Cadastro</label>	
                            <input type="date" name="dataalt" id="dataalt" value="'.$row['data_cad'].'" class="form-control">
                     </div>
                     </div>
                     
                     <!--LINHA 2-->	
                     <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                   <label>DESCRIÇÃO</label>	
                                   <textarea name="descalt" id="descalt" value="'.$row['descricao'].'" cols="30" rows="10">'.$row['descricao'].'</textarea>
                            </div>

                            <div class="col-md-5">
                                   <div class="form-group">
                                   <label>Nome da Empresa</label>
                                   <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-control" value="'.$row['nome_empresa'].'">
                                   </div>

                                   <div class="form-group">
                                   <label>CNPJ da Empresa</label>	
                                   <input type="text" name="cnpjEmpresa" id="cnpjEmpresa" class="form-control" value="'.$row['cnpj_empresa'].'" onblur="mostra_verificacao()">
                                   </div>
                            </div>
                     </div>
              ';			
              
                     }
                     
              }else{ 
                     echo "0";
              }
       ?>

<script src="../js/jquery3.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../mascaras/jquery.maskMoney.js" type="text/javascript"></script>
        
        <script>
    
    $(function(){
        $("#vcalt").maskMoney({thousands:'.', decimal:','});
        $("#vvalt").maskMoney({thousands:'.', decimal:','});
       });
       </script>
