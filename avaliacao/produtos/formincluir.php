<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LABORATORIO DE SOFTWARE</title>
        <!-- Favicon-->
        <link rel="icon" type="../image/x-icon" href="../assets/favicon.ico" />
        
        <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-dark text-white">JQUERY</div>
                <div class="list-group list-group-flush ">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="frombusca.php">Cadastro</a>
                    
                    
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
                    <!-- MONTE SUAS TELAS AQUI-->
                    <h3 class="mt-4">	CADASTRO DE PRODUTOS	</h3>
                    
                    <nav class="navbar navbar-light bg-light">
                        <form class="card card-body" id="gravar">
						<!--LINHA 1-->	
						 <div class="row">
                            <div class="form-group col-md-7">
                                    <label> Nome do Produto</label>	
                                    <input type="text" name="nome" id="nome" class="form-control" >
                             </div>

							  <div class="form-group col-md-3">
                                    <label> Data de Cadastro</label>	
                                    <input type="date" name="data" id="data" class="form-control" >
                             </div>
						  </div>
						   
						   <!--LINHA 2-->	
						 <div class="row">
                            <div class="form-group col-md-3">
                                    <label> Preço de Custo</label>	
                                    <input type="text" name= "precoComp"id="precoComp" class="form-control" >
                             </div>
                            <div class="form-group col-md-3">
                                    <label> Preço de Venda</label>	
                                    <input type="text" name="precoVend" id="precoVend" class="form-control" >
                             </div>

                             <div class="form-group col-md-3">
                                    <label> Estoque</label>	
                                    <input type="number" name="estoque" id="estoque" class="form-control" >
                             </div>
							 
						  </div>

                          <div class="row col-md-12">
                            <label> Descrição </label>
                                <div class="form-group col-md-4">
                                    <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nome da Empresa</label>
                                        <input type="text" name="nomeEmp" id="nomeEmp" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>CNPJ da Empresa</label>	
                                        <input type="text" name="cnpjEmp" id="cnpjEmp" class="form-control" onblur="mostra_verificacao()">
                                    </div>
                                </div>

                                
                          </div>

                           <!--LINHA 4-->	
						 <div class="row">
						    	  <div class=" col-md-2 mt-2"> 
                                    <button id="bot_gravar" type="submit" class="btn btn-info "><i class="fa fa-save "></i>&nbsp;GRAVAR</button> 
                                   </div>

                                   <div class=" col-md-2 mt-2"> 
									<a href="formbusca.php" class="btn btn-warning"><i class="fa fa-undo "></i>&nbsp;Retornar</a>
                                   </div> 
                            </div>
                        </form>
                    
                    </nav>


                <!-- FIM TELAS -->
                </div>

            </div>
        </div>


        
        <!-- Core theme JS-->
        <script src="../js/jquery3.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../mascaras/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="../js/sweetalert.js"></script>
        <script src="../js/sweetalert2.js"></script>
      
       
        
   <script>
    
    $(function(){
        $("#precoComp").maskMoney({thousands:'.', decimal:','})
        $("#precoVend").maskMoney({thousands:'.', decimal:','})
        $('#cnpjEmp').mask('00.000.000/0000-00');



        $("#gravar").submit(function(event){
          event.preventDefault();
          
              let nome=$('#nome').val();
              let descricao=$('#desc').val();
              let compra=$('#precoComp').val();
              let Venda=$('#precoVend').val();
              let data=$('#data').val();
              let estoque=$('#estoque').val();
              let nomeEmp=$('#nomeEmp').val();
              let cnpjEmp=$('#cnpjEmp').val();
              
           $.post('./salvar.php', {nome:nome,descricao:descricao,compra:compra,Venda:Venda,estoque:estoque,data:data,nomeEp:nomeEmp,cnpjEp:cnpjEmp}, function(data) {
             let resp = parseInt(data);
             
            if (resp==1)
              {
                Swal.fire({
                title: 'Sucesso!',
                text: 'Cadastro efetuado com êxito!',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
              }).then(function() {
                window.location.href = 'formbusca.php';
              });
              }
              else {
                alert('Algo deu errado')
              }
              
            })// fim do post
        })// fim gravar
      
    })// fim jquery

    </script> 

        <script>
                function validarCNPJ() {

                var cnpjesp = $('#cnpjEmp').val();
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
                        $('#bot_gravar').prop('disabled', false);
                        Swal.fire({
                            title: "VERIFICADO",
                            text: "CNPJ verificado e aprovado.",
                            icon: 'success',
                            timer: 2000, 
                            showConfirmButton: false
                        });
                    }else{
                        $('#bot_gravar').prop('disabled', true);
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
