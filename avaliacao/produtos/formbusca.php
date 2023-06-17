<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LABORATORIO DE SOFTWARE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        
        <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-dark text-white"><a href="../index.php" class="jqueryLink" style="text-decoration: none; color: white;">JQUERY</a></div>
                <div class="list-group list-group-flush ">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="formbusca.php">Cadastro</a>
                    
                    
                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">SAIR</a></li>
                                
                            </ul>

                        </div>
                </nav>

                <!-- PAGINA PRINCIPAL-->
                <div class="container-fluid">
                    
                    <h3 class="mt-4">	CADASTRO DE PRODUTOS	</h3>
                 
                  
						
						 <div class="card card-header">
                            <form id="formbusca" class="form-horizontal" method="POST" action="javascript:" >
													<DIV class="row">
                                                          
												         	<div class="col-md-6">
                                                                <input id="texto" type="text" placeholder="Texto da pesquisa" style="background:#fcfce3"class="form-control" required="required" >
                                                               
                                                            </div>
                                                            <div class="col-md-2">
                                                            <span class="input-group-btn"><button class="btn btn-primary" type="submit" id="btnbuscar">
                                                                    <i class='fa fa-search'></i>&nbsp;Buscar</span>
                                                           </div>
                                                           <div class="col-md-4">
													        <a href="formincluir.php" class="btn btn-success " ><i class='fa fa-plus'></i>&nbsp;Novo Produto</a>
                                                           </div>
                                                           
                                                          
                                                        </DIV>	  
														 
												
										</form>
                           </div>
                          
      
                    
                    <div class="card card-header border-2">
                      
                      <table class="table table-stripped table-hover">
                         <thead class="bg-info">
                             <TD>Nome produto</TD>
                             <TD>Descrição</TD>
                             <TD>Valor de Custo</TD>
                             <TD>Valor de Venda</TD>
                             <TD>Estoque</TD>
                             <TD>Data De Cadastro</TD>
                             <TD>Nome do Fornecedor</TD>
                             <TD>CNPJ do Fornecedor</TD>
                             <TD>Opções</TD>

                         </thead> 
                         <tbody id="corpo_tabela">
                         

                         </tbody>

                      </table>

                 
                 </div>

                <!-- FIM TELAS -->
                </div>

            </div>
        </div>
<!--MONTANDO MODAIS -->

<!-- ################  MODAL ALTERAR ############## -->
<div class="modal" id="Alterar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title">ALTERAÇÃO DO CADASTRO</h5>
        <button type="button" class="close" id="fechaModal" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--RODAPE MODAL-->
      <div class="modal-body">
        <form class="card card-body" id="ModalAlterar">
            <div class="card card-body" id="corpoModalEdita">
                                         
            </div>
            
            <div class="modal-footer ">
                <button type="submit" id="gravaAlteracao" class="btn btn-primary">Gravar Alterações</button>
            </div>
        </form>
      </div>
     
     <!--R0DAPE MODAL-->

    </div>
  </div>
</div>

<!-- ################  MODAL MENSAGEM ############## -->
    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
			        <div class="modal-content">
					            <div class="modal-header">
					                <h6 class="modal-title" id="exampleModalLabel">PROCESSANDO DADOS</h6>
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                    <span aria-hidden="true">&times;</span>
					                </button>
				                </div>
                          <!--RODAPE MODAL-->
					            <div class="modal-body">
                                    <center> <img src="../img/aguard.gif">       
									<p align="center" id="message">Aguarde...</p><br>
                                    </center>        
					            </div>
					            
			  </div>
	     </div>
      </div>


    
<!--  ##############  FIM MODAIS ###########-->
        
        <!-- incluindo biliotecas do template  -->
        <script src="../js/jquery3.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../mascaras/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="../js/sweetalert2.js"></script>
        <script src="../js/sweetalert.js"></script> 

        <script>
        
           $(document).ready(function() {
        
            //*******  fazendo a pesquisa  ***********
            $('#btnbuscar').click(function(){
            let texto = $("#texto").val();
	        	
             $('#modalAlert').modal('show')
                    $.post('busca.php', {pesquisa: texto}, function(resposta) {
                        //$(".modal").modal('hide');
                        if(resposta!='0'){
                          $('#corpo_tabela').html(resposta);    
                          setTimeout(function(){$('#modalAlert').modal('hide')}, 1000);
                         }
                        else {
                        swal('Sem dados para pesquisa',{icon:error})
                        }
                    })// fim post
         
   }) // fim click

   //*******  fazendo a alterar e exclui  ***********
   $('#corpo_tabela').on('click','a', function(){
     let vetor = $(this).attr("id");
     let elemento = vetor.split("|");
     let id = elemento[0];
     let letra = elemento[1] ;

    if(letra=='A')   {      
        //executa codigo ao chamar modal
         $('#Alterar').on('shown.bs.modal', function() {
            $.post('montaModal.php',{codpro:id},function(resposta){
               $('#corpoModalEdita').html(resposta);
            }); // FIM POST 
         });
         $('#Alterar').modal('show');// chama o modal
        
     } // fim alterar

    if(letra=='E')   {
        swal({
                        title: "EXCLUIR",
                        text: "Deseja realmente EXCLUIR esse registro?",
                        icon: "info",   buttons: ["Não", "Sim"],   dangerMode: true,
                        }).then((willDelete) => {
                        if (willDelete){
                            
                                $.post('excluir.php',{id:id},function(resposta){
                                   let respost = parseInt(resposta);
                                if(respost != 0){
                                    Swal.fire({
                                        title: "EXCLUIR",
                                        text: "Produto excluido com sucesso",
                                        icon: 'success',
                                        timer: 2000, 
                                        showConfirmButton: false
                                    })                                 
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2000);                            
                                    
                                }else{
                                    swal('Algo deu errado',{icon:danger})
                                }
                                }) // fim post

                        }
                      });// fim mensagem swall
    } // fim excluir


   }) // fim ON tabela

  // clicando no salvar dentro do MODAL
  
            $("#ModalAlterar").submit(function(event){
                event.preventDefault();
              // VARIAVEIS DENTRO DO MODAL ALTERAR
             
              let codpro=$('#idalt').val();
              let nome=$('#nomealt').val();
              let descricao=$('#descalt').val();
              let valcusto=$('#vcalt').val();
              let valvende=$('#vvalt').val();
              let estoque=$('#estoquealt').val();
              let data=$('#dataalt').val();
              let nomeEmpre=$('#nomeEmpresa').val();
              let cnpjEmpre=$('#cnpjEmpresa').val();
              
              $.post('alterar.php', {codpro:codpro,nome:nome,descricao:descricao,valcusto:valcusto,valvende:valvende,estoque:estoque,data:data,nemp:nomeEmpre,cnpjp:cnpjEmpre}, function(retorno) {
               
                let ret = parseInt(retorno);
               
                if (ret == 1){
                    Swal.fire({
                        title: "ALTERADO",
                        text: "Produto alterado com sucesso",
                        icon: 'success',
                        timer: 1000, 
                        showConfirmButton: false
                    })
                 }else{
                    swal("Erro ao ALTERAR!", {	icon: "danger",});
                 } 
             })// fim do post  
            })// fim alterar

        $('#fechaModal').click(function(){
            setTimeout(function() {
                window.location.reload();
            }, 500);
        });

  }) // FIM DOM
        </script>
        
        <script>
            function formatCNPJ(input) {
                var value = input.value.replace(/\D/g, '');

                if (value.length > 14) {
                value = value.slice(0, 14);
                }

                value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
                value = value.replace(/(\d{4})(\d)/, '$1-$2');

                input.value = value;
            }
        </script>

        <script>
                function validarCNPJ() {

                var cnpjesp = $('#cnpjEmpresa').val();
                /*console.log(cnpjesp);*/
                
                cnpj = cnpjesp.replace(/[^\d]+/g,'');
                

                if(cnpj === '') return false;
                
                if (cnpj.length != 14)
                    return false;

                // Elimina CNPJs invalidos conhecidos
                if (cnpj == "00000000000000" || 
                    cnpj == "11111111111111" || 
                    cnpj == "22222222222222" || 
                    cnpj == "33333333333333" || 
                    cnpj == "44444444444444" || 
                    cnpj == "55555555555555" || 
                    cnpj == "66666666666666" || 
                    cnpj == "77777777777777" || 
                    cnpj == "88888888888888" || 
                    cnpj == "99999999999999")
                    return false;
                    
                // Valida DVs
                tamanho = cnpj.length - 2
                numeros = cnpj.substring(0,tamanho);
                digitos = cnpj.substring(tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(0))
                    return false;
                    
                tamanho = tamanho + 1;
                numeros = cnpj.substring(0,tamanho);
                soma = 0;
                pos = tamanho - 7;
                for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                        pos = 9;
                }
                resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                if (resultado != digitos.charAt(1))
                    return false;
                        
                return true;

                }

                function mostra_verificacao(){
                    var resultado = validarCNPJ();
                    /*console.log(resultado);*/
                    if (resultado != false){
                        $('#gravaAlteracao').prop('disabled', false);
                        Swal.fire({
                            title: "VERIFICADO",
                            text: "CNPJ verificado e aprovado.",
                            icon: 'success',
                            timer: 2000, 
                            showConfirmButton: false
                        });
                    }else{
                        $('#gravaAlteracao').prop('disabled', true);
                        Swal.fire({
                            title: "VERIFICADO",
                            text: "CNPJ verificado e negado.",
                            icon: 'error',
                            timer: 2000, 
                            showConfirmButton: false
                        });
                    }
                }
            
        </script>
    </body>
</html>
