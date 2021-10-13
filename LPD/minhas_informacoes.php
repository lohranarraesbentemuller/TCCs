<!DOCTYPE html>
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml"
	>
<?php include("config.php"); 
 include("session.php");
?>
<head>
    <title>SGPol | Sistema de Gestão Policial</title>
    <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" type="image/png" href="/favicon.ico" />

    
	<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
	<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <!-- Toastr style - Notificações -->
    <link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/vendors/css/plugins/toastr/toastr.min.css" />

    <!-- Gritter - Notificações -->
    <link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/vendors/js/plugins/gritter/jquery.gritter.css" />

	<link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/vendors/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/vendors/css/style.css" />
	<link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/css/sgpol.css" />
	 <link href="https://sgpol.pm.df.gov.br/vendors/css/style.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="https://sgpol.pm.df.gov.br/vendors/css/plugins/chosen/bootstrap-chosen.css" />
<!-- 	<link rel="stylesheet" href="https://code.jquery.com/ui/1.8.23/themes/base/jquery-ui.css"> -->
	<link rel="stylesheet" type="text/css"
	href="https://sgpol.pm.df.gov.br/vendors/css/plugins/sweetalert/sweetalert.css" />
	
	<style>

#idCursoFormacao_chosen{
 width: 100% !important;
}
#idInstituicaoEnsino_chosen{
 width: 100% !important;
}

.js-fildset > fieldset{
	background-color: #fff !important;
}

.js-fildset-interno {
	background-color: red !important;
}
.js-invisivel {
	display: none;
}

a{
	text-decoration: none;
}
 
.painel_arredondado{
	border-radius: 10px;
	background-color:#fafbff;
	font-family: Verdana,Geneva,sans-serif; 
	padding:20px;
}
.titulo{
	font-weight: bold;
	font-size:14px;
	margin-left:5%;
}

.form-control{
	 width:70%;
	 margin-left:5%;
}
h2{
	font-weight: bold;
	color:#1ab394;
}

.cont-items-monitor {
  position: absolute;

  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  /*font-family: 'Roboto','sans-serif';*/
  line-height: 30px;
  padding-left: 10px;
  overflow:visible;
  height:auto;
  width:auto;
  
  
  -moz-border-radius:7px;-webkit-border-radius:7px; border-radius:7px;
}
.badge-warning{
	background-color:#d1dade;
	margin:2%;
	width:230px;
	height:20px;
	color:black;
    box-shadow:0 8px 6px -6px black;
}
 
 
</style>
	
<style type="text/css">
  .notification-bubble{
    	    right: 0px;
    top: 0px;
    background-color: #f55b4a;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
    height: 22px;
    line-height: 20px;
    min-width: 22px;
    position: absolute;
    text-align: center;
    text-shadow: none;
    padding: 1px 5px;
    }
</style>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script>
        function remover_formacao(id)
		{
			d=confirm("Tem certeza de que deseja remover essa formação acadêmica?");
			if(d==true)
			{
			$('#tudoformacao_'+id).html('');
			alert("Ainda será necessário clicar em 'Salvar Alterações' para remover o elemento do banco de dados");
			}
		}
        function remover_profissao (id)
		{
			d=confirm("Tem certeza de que deseja remover essa experiência profissional?");
			if(d==true)
			{
			$('#tudoprofissional_'+id).html('');
			alert("Ainda será necessário clicar em 'Salvar Alterações' para remover o elemento do banco de dados");
			}
		}
		function remover_conhecimento(id)
		{
			d=confirm("Tem certeza de que deseja remover essa área de conhecimento?");
			if(d==true)
			{
			$('#tudoconhecimento_'+id).html('');
			alert("Ainda será necessário clicar em 'Salvar Alterações' para remover o elemento do banco de dados");
			}			
		}
</script>
	
</head>

<body>
	<input type="hidden" name="_csrf" value="d8e13555-ffda-4706-b8bb-36a0bba3fa7c"/>
	<input type="hidden" name="_csrf_header" value="X-CSRF-TOKEN"/>
	
	
    <input type="hidden" data-url="/mensagem/responsavel" id="js-mensagem-responsavel" />
	<input type="hidden" data-url="/mensagem/modal" id="js-mensagem-alerta" />
	<input type="hidden" data-url="/mensagem/alerta/ler" id="js-mensagem-alerta-ler" />
	<input type="hidden" data-url="/mensagem/marcarlidapopup" id="js-url-marcar-lida" />
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
            
            	<!-- Cabeçalho do menu lateral - Logo SGPol -->
            	
                <ul class="nav metismenu" id="side-menu">
                	<li>
<!--                 		<img th:src="@{/img/LogoSGPol.png}" class="img-responsive" alt ="Imagem Responsiva" /> -->
                	</li>
                    <li class="nav-header text-center">
                        <div class="dropdown profile-element">
                         
                        	<!-- Foto do usuário e perfil -->
 							<span>
	
	
	
		<img alt="image" class="img-thumbnail"  width="90" src="https://sgpol.pm.df.gov.br/img/semfoto.jpg" />
	
<!-- 		<img alt="image" class="img-thumbnail" width="90" th:src="@{/arquivo/{id}(id=${#authentication.pessoa.foto.id})}" /> -->
</span>
<a data-toggle="dropdown" class="dropdown-toggle collapse-link" href="#">
	<span class="clear">
		<span class="block m-t-xs"> 
          	<i class="fa fa-chevron-up"></i>
		</span> 
		
		    <?php $sql="select * from login where id=".$_GET['id'];
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
        	<!--<span class="text-muted text-xs block "  style="color:#ffffff;">CAD 2º ANO Esp BENTEMULLER</span> -->
            <span class="text-muted text-xs block "  style="color:#ffffff;"><?php echo $row['nome'];?></span>
        
        
        
        
        
        
        
         
        
	</span>
</a>
                            
<!-- Menu do perfil do usuário -->
<ul class="dropdown-menu animated fadeInRight m-t-xs">
    <li>	
    	<a href="#">
    		<i class="fa fa-cogs"></i> &nbsp; Sistema
    	</a>
    </li>
    <li class="divider"></li>
    <li><a href="logout.php"><i class="fa fa-sign-out"></i> &nbsp; Sair</a></li> 
</ul>
<!-- Fim do menu do perfil do usuário -->
 							
                        </div>
                        
                        <!-- Logo no menu encolhido -->
                        <input type="hidden" name="idmensagens" id="idmensagens" class="js-idmensagens" value="0" >
                         <input type="hidden" name="msg" id="msg" value="" >
                      
                       
                       
                    </li>
                    
                    <!-- Menu lateral esquerdo -->
                    
<!--                     <div th:replace="layout/fragments/MenuSisSaude"></div> -->
                    <li>
					
    <a href="#">
    	<i class="fa fa-user"></i> 
   		<span class="nav-label">Pessoal</span> 
   		<span class="fa arrow"></span>
    </a>
	    
    <ul class="nav nav-second-level">
        
        
        
        	
        	
	        <li >
				<a href="/policial/mostrar/23456">
		    		<i class="fa fa-newspaper-o"></i> &nbsp; Ficha de Cadastro
		    	</a>
			</li>

						
					<li ><a href="/vistoria/viatura"><i class="fa fa-cab"></i>&nbsp;Motorista / Vistoria</a></li>
			
			
			
		        <li >
					<a href="/sistaf/status">
			    		<i class="fa fa-code-fork"></i> &nbsp; Agende seu TAF
			    	</a>
				</li>
					
			
			
				<li >
					<a href="/temposervico/23456">
			    		<i class="fa fa-code-fork"></i> &nbsp; Tempo de Serviço
			    	</a>
				</li>
				
			
			
				<li >
					<a href="/endereco/contatos/104357">
			    		<i class="fa fa-code-fork"></i> &nbsp; Atualizar Contatos
			    	</a>
				</li>
			
			
			
	<!-- 		<li > -->
	<!-- 			<a th:href="@{'/policial/foto/' + ${#authentication.pessoa.id}}"> -->
	<!-- 	    		<i class="fa fa-code-fork"></i> &nbsp; Alterar Foto -->
	<!-- 	    	</a> -->
	<!-- 		</li> -->
			
			
				<li >
					<a href="/epi2/medidas/incluir">
			    		<i class="fa fa-code-fork"></i> &nbsp; Medidas Corporais
			    	</a>
				</li>
					
			
			
<!-- 			<th:block th:if="${#authentication.pessoa.ativo} or ${#authentication.pessoa.inativo}" > -->
<!-- 				<li > -->
<!-- 					<a th:href="@{'/portearma/relatorio/pdf/certidaonegativa/' + ${#authentication.pessoa.id}}"> -->
<!-- 			    		<i class="fa fa-code-fork"></i> &nbsp; Certidão Negativa - Porte de Arma -->
<!-- 			    	</a> -->
<!-- 				</li> -->
<!-- 			</th:block>	 -->
			
			
				<li >
					<a href="/si/portearma/solicitarcertidaonegativaportearma/0">
			    		<i class="fa fa-code-fork"></i> &nbsp; Certidão Negativa - Porte de Arma
			    	</a>
				</li>
				
			
			<li>
				<a	href="/relatorios/declaracaoDependentes" target="_blank">
		    		<i class="fa fa-file-pdf-o"></i> &nbsp; Declaração de Dependentes
		    	</a>
			</li>
			
			
	 		 <li >
	 		 	<a href="/pessoal/mensagem">
	 		 	<i class="fa fa-envelope"></i> &nbsp; Mensagens</a>
	 		 </li>
			
	<!-- 		<li sgp:menu="@{/pessoal/pesquisa/efetivo}" sec:authorize="hasRole('ROLE_VISUALIZAR_PESSOA')"> -->
	<!-- 			<a th:href="@{/pessoal/pesquisa/efetivo}"> <i class="fa fa-search"></i> -->
	<!-- 					Pesquisa -->
	<!-- 			</a> -->
	<!-- 		</li> -->
			
	<!-- 		<li > -->
	<!-- 			<a th:href="@{/sistaf/status}"><i class="fa fa-child"></i> &nbsp; TAF</a> -->
	<!-- 		</li> -->
			
			
			
	<!-- 		<li  sec:authorize="!hasRole('DESIGNACAO_SERVICO_ATIVO')"> -->
	<!--     		<a th:href="@{/sisper/status}"><i class="fa fa-stethoscope"></i> &nbsp; Periódico</a> -->
	<!--     	</li> -->
	<!--     	<li  sec:authorize="!hasRole('DESIGNACAO_SERVICO_ATIVO')"> -->
	<!--     		<a th:href="@{/afastamento/ferias}"><i class="fa fa-suitcase"></i> &nbsp; Férias</a> -->
	<!--     	</li> -->
	<!--     	<li  sec:authorize="!hasRole('DESIGNACAO_SERVICO_ATIVO')"> -->
	<!--     		<a th:href="@{/afastamento/abono}"><i class="fa fa-trophy"></i> &nbsp; Abono</a> -->
	<!--     	</li> -->
	<!--     	<li  sec:authorize="!hasRole('DESIGNACAO_SERVICO_ATIVO')"> -->
	<!--     		<a th:href="@{/svg/status}"><i class="fa fa-dollar"></i> &nbsp; Serviço Voluntário</a> -->
	<!--     	</li> -->
		
		



		

		<li >
			<a href="/sair"><i class="fa fa-sign-out"></i> &nbsp; SAIR</a>
		</li>

	</ul>
</li>
        <li><a href="#">
    	<i class="fa fa-lightbulb-o"></i> 
   		<span class="nav-label">Meu Currículo</span> 
   		
    </a></li>          
<li><a href="cadastrar_usuario.php">
    	<i class="fa fa-file"></i> 
   		<span class="nav-label">Cadastrar Usuário</span> 
   		
    </a></li>                  
			<li><a href="banco_de_talentos.php">
    	<i class="fa fa-database"></i> 
   		<span class="nav-label">Banco de talentos</span> 
   		
    </a></li>  
<!-- <li sec:authorize="hasRole('ROLE_VISUALIZAR_SAD')" > -->
<!--     <a href="#"> -->
<!--     <i class="fas fa-chalkboard-teacher"></i>  -->
<!--     <span class="nav-label">SAd - Patrimônio</span> <span class="fa arrow"></span></a> -->
<!--     <ul class="nav nav-second-level"> -->
<!-- 		<li> -->
<!-- 			<a href="#"><i class="fa fa-taxi" aria-hidden="true"></i>Viaturas</span><span class="fa arrow"></span></a> -->
<!-- 			<ul class="nav nav-third-level collapse" style="height: 0px;"> -->
<!-- 				<li> -->
<!-- 					<a th:href="@{/afastamento/pesquisar/afastamentos}"> -->
<!-- 						<i class="fa fa-search"></i>Pesquisa -->
<!-- 					</a> -->
<!-- 				</li> -->
<!-- 			</ul> -->
<!-- 		</li> -->
<!-- 	</ul> -->
<!-- </li>   -->
     
                    <li >
    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">UPM - SOp</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li >
        	<a href="/sop/dashboard">
        		Painel Resumo
        	</a>
        </li>
        
        <li >
        	<a href="/sop/ordemservico/listar">
        		OS Externa
        	</a>
        </li>
        
        <li >
        	<a href="/sop/ordemservico/listar">
        		OS Interna
        	</a>
        </li>
        
        <li >
        	<a href="/sop/listaraptos">
        		Efetivo Apto
        	</a>
        </li>
        <li >
        	<a href="/sop/planodechamada">
        		Plano Chamada
        	</a>
        </li>
        <li >
        	<a href="/evento/listar">
        		Evento
        	</a>
        </li>
        <li >
        	<a href="/operacao/listar">
        		Operação
        	</a>
        </li>
    </ul>
</li>
                    	
 
                    
<!-- 					<div th:replace="layout/fragments/MenuSistemaPerfil"></div> -->
<!--  					<th:block th:if="${#authentication.pessoa.inativo}"> -->
                    	



<!--                      </th:block>  -->
                    
                    
                    
<!--                    <div th:replace="layout/fragments/MenuSVG-CS"></div> -->
<!--                     <div th:replace="layout/fragments/MenuOrganizacao"></div> -->
                    
  					
	
		<li class=""><a href="#"><i class="fa fa-cab"></i> <span class="nav-label">SGF</span> <span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="height: 0px;">
						
						<!--  <li sec:authorize="hasRole('ROLE_OLD_SGF_SGPOL')  and hasRole('ROLE_OLD_LISTAR_TIPOVEICULO') "><a th:href="@{/tipoveiculo}">Tipo de VeÃƒÆ’Ã‚Â­culos</a></li>-->
						<!--<li sec:authorize="hasRole('ROLE_OLD_SGF_SGPOL')  and hasRole('ROLE_OLD_INCLUIR_MARCAVEICULO') "><a th:href="@{/marcaveiculo}">Marca do VeÃƒÆ’Ã‚Â­culo</a></li>-->
						
						
						
								
						
						
						
						<!-- <li sec:authorize="hasRole('ROLE_OLD_SGF_SGPOL') "><a th:href="@{/viatura}">Pesquisar Viatura UPM</a></li> -->
						
						<li><a href="/vistoria/viatura">Motorista / Vistoria</a></li>
						<!-- <li sec:authorize="hasRole('ROLE_OLD_SGF_SGPOL') "><a th:href="@{/situacaoviatura}">SituaÃƒÆ’Ã‚Â§ÃƒÆ’Ã‚Â£o Viatura </a></li> -->
						
						
		<!-- 				<li sec:authorize="hasRole('ROLE_OLD_SGF_MANUTENCAO') "><a th:href="@{/relatorio/garageiro}">Fiscal de Garagem RelatÃƒÂ³rio</a></li> -->
		<!-- 				<li sec:authorize="hasRole('ROLE_OLD_SGF_DPMT') "><a th:href="@{/viatura/inconsistencia/listar}">Listar Viatura em InconsistÃƒÂªncia</a></li> -->
						
		<!-- 				<li  sec:authorize="hasRole('ROLE_OLD_SGF_DPMT') "><a th:href="@{/auditoriaviatura/agente}">Auditoria Pessoa Pesquisador</a></li> -->
		<!-- 				<li  sec:authorize="hasRole('ROLE_OLD_SGF_DPMT') "><a th:href="@{/auditoriaviatura/paciente}">Auditoria Viatura Pesquisada</a></li> -->
						
						
						
						
						
						
					</ul>
		</li>
		
	


                	  
    
                   	
                   		


<!--                    <div th:replace="layout/fragments/MenuDIPC"></div>-->
                   
                  
<!--                    <div th:replace="layout/fragments/MenuSecaoAdministrativa"></div> -->
<!--                    <div th:replace="layout/fragments/MenuSisTAF"></div>-->
	                    
<!--                    <div th:replace="layout/fragments/MenuSecaoAdministrativa"></div> -->
                   
                   <!-- <li sec:authorize="hasRole('ROLE_OLD_ROLE_SVG')"> -->


                   
                   
<!--                    <div th:replace="layout/fragments/MenuBoletim"></div>-->
<!-- 					<div th:replace="layout/fragments/MenuLateralSGAI"></div> -->

<!-- 					<div th:replace="layout/fragments/MenuMensagens"></div> -->
<!-- 					<div th:replace="layout/fragments/MenuControleEntradaSaida"></div> -->
					
					<ul class="nav metismenu" id="side-menu">

	<li><a href="/"> 
	<i	class="fa fa-home " aria-hidden="true"></i>
			<span class="nav-label">Inicio</span> 
			
	</a></li>
	
	<li > <a href="/sair"><i class="fa fa-sign-out " aria-hidden="true"></i> Sair</a></li>

</ul>
                    <!-- Fim do menu lateral esquerdo -->
                    
                    
                    
                    	<ul class="nav metismenu" id="side-menu">

	<li><a class="download-app"> <i
			class="fa fa-cloud-download" aria-hidden="true"></i>
			<span class="nav-label">Download do Aplicativo SGPOL</span> 
	</a></li>

</ul>
                    	
                    
                    
                    
                    
                </ul>
            </div>
        </nav>

		
		
        <div id="page-wrapper" class="gray-bg dashbard-1">
        	
        	<!-- Menu superior -->
        	
        
	        <div class="row border-bottom">
		        <nav class="navbar navbar-static-top gray-bg" role="navigation" style="margin-bottom: 0">
			        <div class="navbar-header">
			            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
<!-- 			            <form role="search" class="navbar-form-custom" action="search_results.html"> -->
<!-- 			                <div class="form-group"> -->
<!-- 			                    <input type="text" placeholder="Pesquisa rápida..." class="form-control" name="top-search" id="top-search"/> -->
<!-- 			                </div> -->
<!-- 			            </form>  -->
			        </div>
		            
		            <div class="navbar-collapse collapse" id="navbar">
		                <ul class="nav navbar-nav ">
		                    <!-- <li class="dropdown" sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO')"> -->
<!--     <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Dados do QODE <span class="caret"></span></a> -->
<!--     <ul role="menu" class="dropdown-menu"> -->
<!--         <li sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO_POSTOS_GRADUACOES') and hasRole('ROLE_MENU_ORGANIZACAO_POSTOS_GRADUACOES_PESQUISAR')"> -->
<!-- 			<a th:href="@{/sisorg/patente}">Postos/Graduações</a> -->
<!-- 		</li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO') and  hasRole('ROLE_ORGANIZACAO_LISTAR_QUADRO') and hasRole('ROLE_ORGANIZACAO_INCLUIR_QUADRO')" > -->
<!-- 			<a th:href="@{/sisorg/quadro}">Quadros</a> -->
<!-- 		</li> -->
<!-- 		<li class="divider"></li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO') and  hasRole('ROLE_ORGANIZACAO_LISTAR_ATIVIDADE') and hasRole('ROLE_ORGANIZACAO_INCLUIR_ATIVIDADE')" > -->
<!-- 			<a th:href="@{/sisorg/atividade}">Atividades</a> -->
<!-- 		</li> -->
<!-- 		<li sgp:menu="@{/sisorg/funcao/listar}" sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO') and  hasRole('ROLE_MENU_ORGANIZACAO_FUNCOES') and hasRole('ROLE_MENU_ORGANIZACAO_FUNCOES_PESQUISAR')" > -->
<!-- 			<a th:href="@{/sisorg/funcao}">Funções</a> -->
<!-- 		</li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO') and  hasRole('ROLE_ORGANIZACAO_LISTAR_GRATIFICACAO') and hasRole('ROLE_ORGANIZACAO_INCLUIR_GRATIFICACAO')" > -->
<!-- 			<a th:href="@{/sisorg/gratificacao/listar}">Gratificações</a> -->
<!-- 		</li> -->
<!-- 		<li class="divider"></li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_MENU_ORGANIZACAO') and  hasRole('ROLE_MENU_ORGANIZACAO_LOTACAO') and hasRole('ROLE_MENU_ORGANIZACAO_LOTACAO_PESQUISAR')" > -->
<!-- 			<a th:href="@{/sisorg/lotacao/listar}">Estruturas Internas</a> -->
<!-- 		</li> -->
<!--     </ul> -->
<!-- </li> -->
		                    
		
		                </ul>
		               
		                <ul class="nav navbar-nav ">
		
		                    <!-- <li class="dropdown" sec:authorize="hasRole('ROLE_SGF_SGPOL')"> -->
<!--     <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Dados SisPer <span class="caret"></span></a> -->
<!--     <ul role="menu" class="dropdown-menu"> -->
<!--         <li sec:authorize="hasRole('ROLE_SGF_SGPOL') "> -->
<!-- 			<a th:href="@{/sisper/junta/tipo}">Tipo de Junta</a> -->
<!-- 		</li> -->


<!-- 		<li sec:authorize="hasRole('ROLE_SGF_SGPOL')" > -->
<!-- 			<a th:href="@{/tipoviatura}">Função Junta Médica</a> -->
<!-- 		</li> -->
		
<!-- 		<li class="divider"></li> -->
		
<!-- 		<li sec:authorize="hasRole('ROLE_SGF_SGPOL')"> -->
<!-- 			<a th:href="@{/tipo/vistoria}">Tipo Restrição Médica</a> -->
<!-- 		</li> -->
		
<!-- 		<li class="divider"></li> -->
		
<!-- 		<li sec:authorize="hasRole('ROLE_SGF_SGPOL')"> -->
<!-- 			<a th:href="@{/tipo/vistoria}">Tipo Parecer</a> -->
<!-- 		</li> -->

		
		
		
		
<!-- 		<li class="divider"></li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_SGF_SGPOL')" > -->
<!-- 			<a th:href="@{/combustivel}">Tipo de CombustÃƒÂ­vel</a> -->
<!-- 		</li> -->
<!-- 		<li sec:authorize="hasRole('ROLE_SGF_SGPOL')" >
			<a th:href="@{/nivel/combustivel}">NÃƒÂ­vel de CombustÃƒÂ­vel</a>
		</li>	 -->
		
		

		
		
    </ul>
</li>


		                </ul>
		                <ul class="nav navbar-top-links navbar-right">
		                
		                  <li>
                    <a href="/"><span class="m-r-sm text-muted welcome-message">Bem vindo ao SGPol.</span></a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning js-quantidade-mensagens">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages js-mensagens">
                        
                   
                        
                    </ul>
                </li>
                
		                    <li>
		                        <a href="/sair">
		                            <i class="fa fa-sign-out"></i> Sair
		                        </a>
		                    </li>
		                </ul>
		            </div>
		        </nav>     
	        </div>
	        
	        	<!-- Fim do menu superior -->
				<!-- Corpo da página -->
				
				<section class="aw-layout-content  js-content">
	

<section class="container features">


    <!-- <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div><br>
            <br><br><br>
           	<br><br><br>
           	<br><br><br>
        </div>
    </div> -->
    
     <?php
	 $sql="select * from dados where id=".$_GET['id'];
	 $result=mysqli_query($db,$sql);
	 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $data=explode("-",$row['nascimento'])[2]."/".explode("-",$row['nascimento'])[1]."/".explode("-",$row['nascimento'])[0];
 
	// print_r($result);
	 ?>
	<h1>Meu currículo</h1> <br>
    <h2>Dados Pessoais</h2>
	<div class="painel_arredondado">
	<div class="row"><span class="titulo">Nome</span></div>
	<div class="row"><input id="nome" class="form-control" value="<?php echo $row['nome'];?>"></input></div>
	<div class="row"><span class="titulo">Data de nascimento</span></div>
	<div class="row"><input id="nascimento"  class="form-control"  value="<?php echo $data;?>"></input></div>
	<div class="row"><span class="titulo">País</span></div>
	<div class="row"><input id="pais"  class="form-control"  value="<?php echo $row['pais'];?>"></input></div>
	<div class="row"><span class="titulo">Gênero</span></div>
	<div class="row"><input id="genero"  class="form-control"  value="<?php echo $row['genero'];?>"></input></div>
	<div class="row" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button type="button" id="salvar_dados" class="btn btn-primary">Salvar Alterações</button></div>
	</div>
	
	<?php
	 $sql="select * from endereco where id=".$_GET['id'];
	 $result=mysqli_query($db,$sql);
	 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// $data=explode("-",$row['nascimento'])[2]."/".explode("-",$row['nascimento'])[1]."/".explode("-",$row['nascimento'])[0];
 
	// print_r($result);
	 ?>
	
    </div>
    <h2>Endereço Profissional</h2>
	<div class="painel_arredondado">
	<div class="row"><span class="titulo">País</span></div>
	<div class="row"><input class="form-control" id="pais" value="<?php echo $row['pais'];?>"></span></div>
	<div class="row"><span class="titulo">CEP</span></div>
	<div class="row"><input class="form-control" id="cep" value="<?php echo $row['cep'];?>"></span></div>
	<div class="row"><span class="titulo">Estado</span></div>
	<div class="row"><input class="form-control" id="estado" value="<?php echo $row['estado'];?>"></span></div>
	<div class="row"><span class="titulo">Cidade</span></div>
	<div class="row"><input class="form-control" id="cidade" value="<?php echo $row['cidade'];?>"></span></div>
	<div class="row"><span class="titulo">Telefone de Contato</span></div>
	<div class="row"><input class="form-control" id="telefone" value="<?php echo $row['telefone'];?>"></span></div>
	<div class="row"><span class="titulo">Celular</span></div>
	<div class="row"><input class="form-control" id="celular" value="<?php echo $row['celular'];?>"></span></div>
	<div class="row"><span class="titulo">Email de Contato</span></div>
	<div class="row"><input class="form-control" id="email" value="<?php echo $row['email'];?>"></span></div>
	<div class="row" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button type="button" id="salvar_endereco" class="btn btn-primary">Salvar Alterações</button></div>
	</div>	
	</div>
	    <h2>Áreas de atuação</h2>
	<div class="painel_arredondado">
	<span id="atuacao_soprater" style="display:inherit;">
	<?php
		$sql="select * from atuacao where id=".$_GET['id'];
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $marcados=explode("|",$row['atuacao']);
		
		
		$i=0;
		$div="";
		foreach($marcados as $marcado)
		{
        // badges_atuacao+=1;
        // if($marcado!="")
		 // {
		  if ($i%4==0)
	  	  {
			$div.='<div class="row"><div class="col"><span class="badge badge-warning  atuacao-badge">'.$marcado.'</span></div>';
		  }
		  if ($i%4==1)
		  {
			$div.='<div class="col"><span class="badge badge-warning atuacao-badge">'.$marcado.'</span></div>' ;
		  }		
		  if ($i%4==2)
		  {
			$div.='<div class="col"><span class="badge badge-warning atuacao-badge">'.$marcado.'</span></div>';
		  }
		  if ($i%4==3)
		  {
			$div.='<div class="col"><span class="badge badge-warning atuacao-badge">'.$marcado.'</span></div></div>' ;
		  }
		 //}
		 $i=$i+1;
		}
		
		 if (($i-1)%4!=3)
		{$div.='</div>';
 
		}
 
		 
		echo $div;
		
     ?>
	</span>
	<button id="adicionar_atuacao" type="button" class="btn btn-info">+</button>
	<div class="row"  id="row5" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button  style="display:none;" type="button" id="salvar_atuacao" class="btn btn-primary">Salvar Alterações</button></div></div>
	
	</div>  

	    <h2>Experiência profissional</h2>
	<div class="painel_arredondado">
    <button id="adicionar_experiencia" type="button" class="btn btn-info">+</button>
	<span id="profissioan_soprater">
	<?php
	$sql = "select * from profissional where id_usuario=".$_GET['id'];
	$result =mysqli_query($db,$sql);
	$i=0;
	$div="";
	foreach($result as $row)
	{
		$publico='';
		$privado='';
		if($row['PB']=='Cargo Público')
		   $publico='selected';
		if($row['PB']=='Cargo em iniciativa privada')
		   $privado='selected';
		$div.='<div id="tudoprofissional_'.$i.'">';
		$div.='<center><table><tr><td><h3>Experiência profissional</h3></td><td><button class="btn btn-danger" type="button" onclick=remover_profissao('.$i.')><span class="fa fa-trash"></span></button></td></tr></table></center>';
		$div.='<div class="row"><span class="titulo">Publico/Privado</span></div>';
		$div.='<div class="row"><select class="form-control profissaoprofissional" id="profissaoprofissional_'.$i.'"><option '.$publico.'>Cargo Público</option><option '.$privado.'>Cargo em iniciativa privada</option></select></div>';
		$div.='<div class="row"><span class="titulo">Início do contrato</span></div>';
		$div.='<div class="row"><input class="form-control data inicioprofissional" id="inicioprofissional_'.$i.'" maxlength="10" value="'.explode("-",$row['inicio'])[2]."/".explode("-",$row['inicio'])[1]."/".explode("-",$row['inicio'])[0].'"></div>';
		$div.='<div class="row"><span class="titulo">Final do contrato</span></div>';
		$div.='<div class="row"><input class="form-control data fimprofissional" id="fimprofissional_'.$i.'" maxlength="10" value="'.explode("-",$row['fim'])[2]."/".explode("-",$row['fim'])[1]."/".explode("-",$row['fim'])[0].'"></div>';
		$div.='<div class="row"><span class="titulo">Resumo de atividades e Resultados</span></div>';
		$div.='<div class="row"><textarea class="form-control resumoprofissional" id="resumoprofissional_'.$i.'" rows="5">'.$row['resumo'].'</textarea></div>';
		$div.='</div>';
		$i=$i+1;
	}
	$conta_atuacao=$i;
	echo $div;
	?>
	
	</span>
	<div class="row" id="row6" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button type="button" id="salvar_experiencia" class="btn btn-primary">Salvar Alterações</button></div>
	</div>	</div>

	 <h2>Áreas de conhecimento</h2>
	<div class="painel_arredondado">
	<?php
	$sql="select * from conhecimento where id=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$conhecimentos=explode("|",$row['conhecimento']);
	//echo "AQUI";
	//echo $row['conhecimento'];
	//echo $sql;
	//print_r( $conhecimentos);
	$i=0;
	$div='';
	foreach($conhecimentos as $conhecimento)
	{
		//echo "AQUI";
		$div.='<div id="tudoconhecimento_'.$i.'">';;
	    $div.='<div class="row"><span class="titulo"><table><tr><td>Área de conhecimento</td><td><button class="btn btn-danger" type="button" onclick=remover_conhecimento('.$i.')><span class="fa fa-trash"></span></button></td></tr></table></span></div>';
	    $div.='<div class="row"><input class="form-control conhecimento" id="conhecimento_'.$i.'" value="'.$conhecimento.'"></div>';
		$div.='</div>';
		$i=$i+1;
	}
	$conta_conhecimento=$i;
	
	?>
	<button id="adicionar_areadeconhecimento" type="button" class="btn btn-info">+</button>
	<?php echo $div;?>
	<div class="row" id="row1" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button  style="display:inherit;" type="button" id="salvar_conhecimento" class="btn btn-primary">Salvar Alterações</button></div></div>
	</div>	 
	
	<h2>Formação Acadêmica ou Complementar</h2>
	<div class="painel_arredondado">
	
	<?php
	$sql="select * from formacao where id_usuario=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$i=0;
	$div='';
	foreach($result as $row)
	{
		$doutordo='';
		$mestrado='';
		$posgraduacao='';
		$superior_completo='';
		$superior_incompleto='';
		$ensino_medio='';
		$ensino_fundamental='';
		if($row['escolaridade']=='Doutorado')
		   $doutorado="selected";
		if($row['escolaridade']=='Mestrado')
		   $mestrado='selected';
		if($row['escolaridade']=='Pós Graduação')
		   $posgraduacao='selected';
		if($row['escolaridade']=='Superior Completo')
		   $superior_completo='selected';
		if($row['escolaridade']=='Superior Incompleto')
		   $superior_incompleto='selected';
		if($row['escolaridade']=='Ensino Médio')
		   $ensino_medio='selected';
		if($row['escolaridade']=='Ensino Fundamental')
		   $ensino_fundamental='selected';
		$div.='<div id="tudoformacao_'.$i.'">';
		$div.='<center><table><tr><td><h3>Formação</h3></td><td><button class="btn btn-danger" type="button" onclick=remover_formacao('.$i.')><span class="fa fa-trash"></span></button></td></tr></table></center>';
		$div.='<div class="row"><span class="titulo">Escolaridade</span></div>';
		$div.='<div class="row"><select class="form-control escolaridade" id="escolaridade_'.$i.'"><option '.$doutorado.'>Doutorado</option><option '.$mestrado.'>Mestrado</option><option '.$posgraduacao.'>Pós Graduação</option><option '.$superior_completo.'>Superior Completo</option><option '.$superior_incompleto.'>Superior Incompleto</option><option '.$ensino_medio.'>Ensino Médio</option><option '.$ensino_fundamental.'>Ensino Fundamental</option></select></div>';
		$div.='<div class="row"><span class="titulo">Instituição</span></div>';
	    $div.='<div class="row"><input class="form-control instituicao" id="instituicao_'.$i.'" value="'.$row['instituicao'].'"></span></div>';
		$div.='<div class="row"><span class="titulo">Curso</span></div>';
		$div.='<div class="row"><input class="form-control curso" id="curso_'.$i.'" value="'.$row['curso'].'"></span></div>';
		$div.='<div class="row"><span class="titulo">Data de inicio</span></div>';
		$inicio_data=explode("-",$row['inicio'])[2]."/".explode("-",$row['inicio'])[1]."/".explode("-",$row['inicio'])[0];
		$div.='<div class="row"><input class="form-control data inicioformacao" id="inicioformacao_'.$i.'"  value="'.$inicio_data.'"></span></div>';
		$div.='<div class="row"><span class="titulo">Data de Término</span></div>';
		$fim_data=explode("-",$row['fim'])[2]."/".explode("-",$row['fim'])[1]."/".explode("-",$row['fim'])[0];
		$div.='<div class="row"><input class="form-control data fimformacao" id="fimformacao_'.$i.'"   value="'.$fim_data.'" ></span></div>';		
		$div.='</div>';
		$i=$i+1;
	}
	$conta_formacao2=$i;

	?>
	
	<button id="adicionar_formacao" type="button" class="btn btn-info">+</button>
	<?php 	echo $div; ?>
	<div class="row"  id="row2" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button  style="display:inherit;" type="button" id="salvar_formacao" class="btn btn-primary">Salvar Alterações</button></div></div>
	</div>	


	
	<h2>Aptidões</h2>
	<div class="painel_arredondado" style="margin-bottom:10%;">
	<span id="aptidao_soprater" style="display:inherit;">
	
	<?php
		$sql="select * from aptidao where id=".$_GET['id'];
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $marcados=explode("|",$row['aptidao']);
		
		
		$i=0;
		$div="";
		foreach($marcados as $marcado)
		{
        // badges_atuacao+=1;
         if($marcado!="")
		  {
		  if ($i%4==0)
	  	  {
			$div.='<div class="row"><div class="col"><span class="badge badge-warning aptidao-badge">'.$marcado.'</span></div>';
		  }
		  if ($i%4==1)
		  {
			$div.='<div class="col"><span class="badge badge-warning aptidao-badge">'.$marcado.'</span></div>' ;
		  }		
		  if ($i%4==2)
		  {
			$div.='<div class="col"><span class="badge badge-warning aptidao-badge">'.$marcado.'</span></div>';
		  }
		  if ($i%4==3)
		  {
			$div.='<div class="col"><span class="badge badge-warning aptidao-badge">'.$marcado.'</span></div></div>' ;
		  }
		 }
		 $i=$i+1;
		}
		if($i-1>0){
        if (($i-1)%4!=3)
		{$div.='</div>';
 
		}
		}
		//if($i-1==0)
		//{$div.='</div>';
	//	}			
		echo $div;
	 
     ?>
	

	</span>


	
	<button id="adicionar_aptidao" type="button" class="btn btn-info">+</button>
	<div class="row"  id="row4" style="margin-top:1%;"><div class="col"></div><div class="col"></div><div class="col"><button  style="display:none;" type="button" id="salvar_aptidao" class="btn btn-primary">Salvar Alterações</button></div></div>
 
	</div>	 
		<div class="painel_arredondado" style="margin-top:-10%;margin-bottom:20%;">
	<div class="row"><div class="col"></div><div class="col"><button class="btn btn-primary" type="button" id="Gerar_PDF">Gerar Currículo em PDF</button></div><div class="col"></div></div>
	</div>
</section>
<script>


$('#Gerar_PDF').click(function(){
           window.print();
           return false;
});

//SCRIPTS LOHRAN BENTEMULLER
var conta_conhecimento=<?php echo $conta_conhecimento?>;
var conta_formacao=<?php echo $conta_formacao2;?>;
var conta_aptidao=0;
var conta_atuacao=<?php echo $conta_atuacao;?>;
var conta_experiencia=0;
$(document).ready(function() {
 
	    //mascaras
        $('#nascimento').mask('00/00/0000');
        $('#cep').mask('00000-000'); 
		$('#telefone').mask('+00 (00) 0 0000-0000');
		$('#celular').mask('+00 (00) 0 0000-0000');
         
$(document).arrive('.data', {
   onceOnly: false
}, function () {
    	$('.data').mask('00/00/0000');
});
		 
	
	
	$('#salvar_dados').click(function(){
		var nome=$('#nome').val();
		var nascimento=$('#nascimento').val();
		var pais=$('#pais').val();
		var genero=$('#genero').val();
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&nome="+nome+"&nascimento="+nascimento+"&pais="+pais+"&genero="+genero+"&flag=dados";
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
     //location.reload();
 	alert("Dados Atualizados");
	
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});	

		
		
	});
	
	
		$('#salvar_endereco').click(function(){
		var pais=$('#pais').val();
		var cep=$('#cep').val();
		var estado=$('#estado').val();
		var cidade=$('#cidade').val();
		var telefone=$('#telefone').val();
		var celular=$('#celular').val();
		var email=$('#email').val();
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&pais="+pais+"&cep="+cep+"&estado="+estado+"&cidade="+cidade+"&telefone="+telefone+"&celular="+celular+"&email="+email+"&flag=endereco";
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
     //location.reload();
 	alert("Endereço Atualizado");
	
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});	

		
		
	});
	
	
		$('#salvar_atuacao').click(function(){
		var atuacao_badge=[];
		$('.atuacao-badge').each(function(){
			//console.log($(this).html());
			atuacao_badge.push($(this).html());
		});
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&flag=atuacao";
		for(i=0;i<atuacao_badge.length;i++)
		{
         valor+="&atuacao_"+i+"="+atuacao_badge[i];
		}			
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
     //location.reload();
	// alert(valor);
 	alert("Área de atuação atualizada");
	
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});	

});


		$('#salvar_experiencia').click(function(){
			
		var profissaoprofissional=[];
        var inicioprofissional=[];
        var fimprofissional=[];
        var resumoprofissional=[];
		
		
		$('.profissaoprofissional option:selected').each(function(){
			//console.log($(this).html());
			profissaoprofissional.push($(this).text());
		});
		$('.inicioprofissional').each(function(){
			//console.log($(this).html());
			inicioprofissional.push($(this).val());
		});
		$('.fimprofissional').each(function(){
			//console.log($(this).html());
			fimprofissional.push($(this).val());
		});
		$('.resumoprofissional').each(function(){
			//console.log($(this).html());
			resumoprofissional.push($(this).val());
		});		
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&flag=profissional";
		for(i=0;i<profissaoprofissional.length;i++)
		{
         valor+="&PB_"+i+"="+profissaoprofissional[i];
		}			
		for(i=0;i<inicioprofissional.length;i++)
		{
         valor+="&inicio_"+i+"="+inicioprofissional[i];
		}			
		for(i=0;i<fimprofissional.length;i++)
		{
         valor+="&fim_"+i+"="+fimprofissional[i];
		}			
		for(i=0;i<resumoprofissional.length;i++)
		{
         valor+="&resumo_"+i+"="+resumoprofissional[i];
		}					
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
     //location.reload();
	// alert(valor);
 	alert("Experiência profissional atualizada");
	
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});	

});

		$('#salvar_conhecimento').click(function(){
			
		var conhecimento=[];
		
		$('.conhecimento').each(function(){
			//console.log($(this).html());
			conhecimento.push($(this).val());
		});
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&flag=conhecimento";
		for(i=0;i<conhecimento.length;i++)
		{
         valor+="&conhecimento_"+i+"="+conhecimento[i];
		}			

		if (conhecimento.length==0)	
		  valor+="&conhecimento_0=";
			
		//var conhecimento=[];
        
		
        	
		//var id='<?php echo$_GET["id"];?>'
		//	 valor="id="+id+"&flag=conhecimento";
		//var i=0;
		//var conhecimento='';
		//$('.conhecimento').each(function(){
			//valor+='&conhecimento_'+i+'='+$(this).val();
		//	conhecimento+=$(this).val()+"|";
		//	i=i+1;
		//});			
		//valor+="&conhecimento="+conhecimento;
		//for(i=0;i<profissaoprofissional.length;i++)
		//{
        // valor+="&PB_"+i+"="+profissaoprofissional[i];
	//	}					
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
     //location.reload();
	 //alert(valor);
 	alert("área de conhecimento atualizada");
	
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});	

});

		$('#salvar_formacao').click(function(){
			
		var escolaridade=[];
		var instituicao=[];
		var curso=[];
		var inicioformacao=[];
		var fimformacao=[];
		$('.escolaridade option:selected').each(function(){
			//console.log($(this).html());
			escolaridade.push($(this).val());
		});
        $('.instituicao').each(function(){
			//console.log($(this).html());
			instituicao.push($(this).val());
		});		
		$('.curso').each(function(){
			//console.log($(this).html());
			curso.push($(this).val());
		});
		$('.inicioformacao').each(function(){
			//console.log($(this).html());
			inicioformacao.push($(this).val());
		});
		$('.fimformacao').each(function(){
			//console.log($(this).html());
			fimformacao.push($(this).val());
		});
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&flag=formacao";
		for(i=0;i<escolaridade.length;i++)
		{
         valor+="&escolaridade_"+i+"="+escolaridade[i];
		}			
		for(i=0;i<instituicao.length;i++)
		{
         valor+="&instituicao_"+i+"="+instituicao[i];
		}			
		for(i=0;i<curso.length;i++)
		{
         valor+="&curso_"+i+"="+curso[i];
		}			
		for(i=0;i<inicioformacao.length;i++)
		{
         valor+="&inicioformacao_"+i+"="+inicioformacao[i];
		}			
		for(i=0;i<fimformacao.length;i++)
		{
         valor+="&fimformacao_"+i+"="+fimformacao[i];
		}					

		 
			
 				
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
 
 	alert("formação acadêmica atualizada");
	//alert(valor);
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
 
}, 
});	

});


		$('#salvar_aptidao').click(function(){
			
		var aptidao_badge=[];
		$('.aptidao-badge').each(function(){
			//console.log($(this).html());
			aptidao_badge.push($(this).html());
		});
		var id='<?php echo$_GET["id"];?>'
			 valor="id="+id+"&flag=aptidao";
		for(i=0;i<aptidao_badge.length;i++)
		{
         valor+="&aptidao_"+i+"="+aptidao_badge[i];
		}	
		 
			
 				
  $.ajax({ 
 type:"POST", 
 url: "Salvar_alteracoes.php", 
 data:valor,
  success: function(data){
 
 	alert("Aptidões atualizadas");
	//alert(valor);
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
 
}, 
});	

});
	
	$('#adicionar_areadeconhecimento').click(function(){
		
		$('#salvar_conhecimento').css("display","inherit");
		var div='';
		
		div+='<div id="tudoconhecimento_'+conta_conhecimento+'">';;
	    div+='<div class="row"><span class="titulo"><table><tr><td>Área de conhecimento</td><td><button class="btn btn-danger" type="button" onclick=remover_conhecimento('+conta_conhecimento+')><span class="fa fa-trash"></span></button></td></tr></table></span></div>';
		
//		var div='<div class="row"><span class="titulo">Área de conhecimento</span></div>';
	    div+='<div class="row"><input class="form-control conhecimento" id="conhecimento_'+conta_conhecimento+'"></span></div>';
		div+='</div>';
		$('#row1').before(div);
		conta_conhecimento+=1;
		
	});
	$('#adicionar_formacao').click(function(){
		$('#salvar_formacao').css("display","inherit");
		div='';
		//div+='<h3>Formação</h3>';
		div+='<div id="tudoformacao_'+conta_formacao+'">';
		div+='<center><table><tr><td><h3>Formação</h3></td><td><button class="btn btn-danger" type="button" onclick=remover_formacao('+conta_formacao+')><span class="fa fa-trash"></span></button></td></tr></table></center>';
		div+='<div class="row"><span class="titulo">Escolaridade</span></div>';
		div+='<div class="row"><select class="form-control escolaridade" id="escolaridade_'+conta_formacao+'"><option>Doutorado</option><option>Mestrado</option><option>Pós Graduação</option><option>Superior Completo</option><option>Superior Incompleto</option><option>Ensino Médio</option><option>Ensino Fundamental</option></select></div>';
		div+='<div class="row"><span class="titulo">Instituição</span></div>';
	    div+='<div class="row"><input class="form-control instituicao" id="instituicao_'+conta_formacao+'"></span></div>';
		div+='<div class="row"><span class="titulo">Curso</span></div>';
		div+='<div class="row"><input class="form-control curso" id="curso_'+conta_formacao+'"></span></div>';
		div+='<div class="row"><span class="titulo">Data de inicio</span></div>';
		div+='<div class="row"><input class="form-control data inicioformacao" id="inicioformacao_'+conta_formacao+'"></span></div>';
		div+='<div class="row"><span class="titulo">Data de Término</span></div>';
		div+='<div class="row"><input class="form-control data fimformacao" id="fimformacao_'+conta_formacao+'"></span></div>';		
		div+='</div>';

		$('#row2').before(div);
		conta_formacao+=1;
	});

	$('#adicionar_aptidao').click(function(e){
		$('#salvar_aptidao').css("display","inherit");
		//var div='<div class="row"><span class="titulo">Aptidão</span></div>';
		//div+='<div class="row"><input class="form-control" id="aptidao_'+conta_aptidao+'"></span></div>';
		//$('#row4').before(div);
		$('#floating-panel2').css("display","inherit");
				 $("#floating-panel2").show(2000);
         $("#floating-panel2").offset({left:e.pageX,top:e.pageY});
		conta_aptidao+=1;
	});	
	
	$('#adicionar_atuacao').click(function(e){
		$('#salvar_atuacao').css("display","inherit");
		//var div='<div class="row"><span class="titulo">Área de atuação</span></div>';
		//div+='<div class="row"><input class="form-control" id="atuacao_'+conta_atuacao+'"></span></div>';

		$('#floating-panel').css("display","inherit");
				 $("#floating-panel").show(2000);
         $("#floating-panel").offset({left:e.pageX,top:e.pageY});
		 //$('#floating-panel').ofsset({left:event.clientX,top:event.clientY});
		//$('#row5').before(div);
		conta_atuacao+=1;
	});	
	
		$('#adicionar_experiencia').click(function(){
		$('#salvar_experiencia').css("display","inherit");
		var div='';

		div+='<div id="tudoprofissional_'+conta_atuacao+'">';
		div+='<center><table><tr><td><h3>Experiência profissional</h3></td><td><button class="btn btn-danger" type="button" onclick=remover_profissao('+conta_atuacao+')><span class="fa fa-trash"></span></button></td></tr></table></center>';
		div+='<div class="row"><span class="titulo">Publico/Privado</span></div>';
		div+='<div class="row"><select class="form-control profissaoprofissional" id="profissaoprofissional_'+conta_atuacao+'"><option>Cargo Público</option><option>Cargo em iniciativa privada</option></select></span></div>';
		div+='<div class="row"><span class="titulo">Início do contrato</span></div>';
		div+='<div class="row"><input class="form-control data inicioprofissional" id="inicioprofissional_'+conta_atuacao+'"></span></div>';
		div+='<div class="row"><span class="titulo">Final do contrato</span></div>';
		div+='<div class="row"><input class="form-control data fimprofissional" id="fimprofissional_'+conta_atuacao+'"></span></div>';		
		div+='<div class="row"><span class="titulo">Resumo de atividades e Resultados</span></div>';
		div+='<div class="row"><textarea class="form-control resumoprofissional" id="resumoprofissional_'+conta_atuacao+'" rows="5"></textarea></span></div>';		
		div+='</div>';
		$('#row6').before(div);
		conta_atuacao+=1;
	});	
	//EVENTOS DE CHECKBOX
	
	$('.atuacao').click(function(){
		$('#atuacao_soprater').html('');
		//alert ($(this).attr("id"));
		var div='';
		var i=0;
		//$("'.atuacao:checked").each(function(){
		$(':checkbox:checked').each(function () {
			
        // badges_atuacao+=1;
           if( $(this).hasClass("atuacao"))
		   {
		  if (i%4==0)
	  	  {
			div+='<div class="row"><div class="col"><span class="badge badge-warning atuacao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }
		  if (i%4==1)
		  {
			div+='<div class="col"><span class="badge badge-warning atuacao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }		
		  if (i%4==2)
		  {
			div+='<div class="col"><span class="badge badge-warning atuacao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }
		  if (i%4==3)
		  {
			div+='<div class="col"><span class="badge badge-warning atuacao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div></div>'
		  }
		  //if (i%5==4)
		 // {
			
		  	
		  i=i+1;
		  } 
		});
        if(i%4!=3)
		{div+='</div>';}
		//alert(div);
		$('#atuacao_soprater').append(div);
		$('.badge-warning').css("background-color","#d1dade");
		$('.badge-warning').css("margin","2%");
		$('.badge-warning').css("width","230px");
		$('.badge-warning').css("height","20px");
		$('.badge-warning').css("color","black");
       	$('.badge-warning').css("box-shadow","0 8px 6px -6px black");	
   
		//}
		
	});
	
		$('.aptidao').click(function(){
		$('#aptidao_soprater').html('');
		//alert ($(this).attr("id"));
		var div='';
		var i=0;
		//$("'.atuacao:checked").each(function(){
		$(':checkbox:checked').each(function () {
			
        // badges_atuacao+=1;
           if( $(this).hasClass("aptidao"))
		   {
		  if (i%4==0)
	  	  {
			div+='<div class="row"><div class="col"><span class="badge badge-warning aptidao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }
		  if (i%4==1)
		  {
			div+='<div class="col"><span class="badge badge-warning aptidao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }		
		  if (i%4==2)
		  {
			div+='<div class="col"><span class="badge badge-warning aptidao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div>'
		  }
		  if (i%4==3)
		  {
			div+='<div class="col"><span class="badge badge-warning aptidao-badge">'+$("label[for='"+$(this).attr("id")+"']").html()+'</span></div></div>'
		  }
		  //if (i%5==4)
		 // {
			
		  //}	
		  i=i+1;
		   }
		});
        if(i%4!=3)
		{div+='</div>';}
		//alert(div);
		$('#aptidao_soprater').append(div);
		$('.badge-warning').css("background-color","#d1dade");
		$('.badge-warning').css("margin","2%");
		$('.badge-warning').css("width","230px");
		$('.badge-warning').css("height","20px");
		$('.badge-warning').css("color","black");
 
 
//		$('.badge-warning').css("-moz-box-shadow","inset 0 0 10px #000000");
	//    $('.badge-warning').css("-webkit-box-shadow","inset 0 0 10px #000000");
      //  $('.badge-warning').css("box-shadow","inset 0 0 10px #000000");
       	$('.badge-warning').css("box-shadow","0 8px 6px -6px black");	
   
		//}
		
	});
	
	
	
});
</script>
	<input type="hidden" class="js-corrida" data-ativo="true" data-inativo="false" url="/corrida" url2="/corrida/verificar"/>

</section>
            	<!-- Fim do corpo da página -->
            	
            	<!-- Rodapé -->
                <div class="footer">
                    <div class="pull-right">
                        <strong>DiTel</strong> - Diretoria de Telemática &copy; 2017
                        <strong>
                        &nbsp &nbsp &nbsp
<!--                         <a id="download-app" href="/app/app-debug.apk" download="appSgpol.apk"> <i -->
						<a class="download-app"> <i
								class="fa fa-cloud-download" aria-hidden="true"></i>Download do Aplicativo SGPOL
						</a></strong>
                    </div>
                    <div>
                        SGPol
                    </div>
                </div>
                
             
				<div class="modal fade bd-example-modal-sm" id="modalapp" tabindex="-1"
	role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Aplicativo SGPOL</h2>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="text-center">
					<div class="row">
						<div class="col">
							<i class="fa fa-download" aria-hidden="true"
								style="font-size: 150px;"></i>
						</div>
					</div>
					<div class="progress">
						<div
							class="progress-bar progress-bar-striped progress-bar-animated"
							role="progressbar" aria-valuemin="0" aria-valuenow="0"
							aria-valuemax="100" style="width: 0%;"></div>
					</div>
					<p class="text-center">Caso já tenha instalado esse aplicativo é recomendado que primeiro se desinstale a versão anterior e posteriormente instale essa nova versão.</p>
				</div>
			</div>


			<div class="modal-footer">
				<a style="decoration: none" id="save-file"><button id="save"
						type="button" class="btn btn-primary">Download</button></a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>


<script>
	document.querySelector('#save').addEventListener(
			'click',
			function() {
				var ajax = new XMLHttpRequest();
				ajax.responseType = "blob";
				ajax.open("GET", "/app/app-debug.apk", true);
				ajax.send();

				var progress = document.getElementsByClassName("progress-bar");
				var start = new Date().getTime();

				console.log('Entrando aq')
				document.getElementById('save-file').setAttribute('href',
						"/app/app-debug.apk");
				document.getElementById('save-file').setAttribute('download',
						"app-debug.apk");

				setTimeout(function() {
					window.URL.revokeObjectURL(obj);
				}, 60 * 1000);

				ajax.onprogress = function(e) {

					console.log(progress[0].style.width)

					var percent = (e.loaded / e.total) * 100;
					percent = Math.floor(percent);

					progress[0].style.width = percent + "%";
					progress[0].setAttribute("aria-valuenow", percent);

				};
			});
</script>
                <!-- Fim do rodapé -->
		</div>
	</div>
	
	<!-- Mainly scripts -->
	<!-- 
	<script th:src="@{/vendors/js/jquery-3.1.1.min.js}"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	 -->
  
  	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/popper.min.js"></script>
	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/bootstrap.min.js"></script> 
	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/inspinia.js"></script>
	
	<!-- Custom and plugin javascript -->
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/toastr/toastr.min.js"></script>
	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/pace/pace.min.js"></script>

	<script src="https://sgpol.pm.df.gov.br/vendors/js/jquery.maskMoney.min.js"></script>
	
	<script  type="text/javascript" src="https://sgpol.pm.df.gov.br/vendors/js/plugins/chosen/chosen.jquery.js"></script>
	<!-- iCheck -->
    <script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/iCheck/icheck.min.js"></script>
    
    <!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
	<script src="https://sgpol.pm.df.gov.br/vendors/js/bootstrap-notify.js"></script>
	
	<!-- javascript padrão do SGPol -->
	<script src="https://sgpol.pm.df.gov.br/js/sgpol.js"></script>
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/sweetalert/sweetalert.min.js"></script>
	
	<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/datatables.min.js"></script>
			  <script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
        
	
	<script type="text/javascript">
	
	
	
	
  $(document).ready(function() {
	  
	  getMensagens();
	  
	  alertaPrincipal();
	  
// 		window.setInterval(function() {
// 			alertaPrincipal();
// 		}, 30000);//30 segundos
		
// 		window.setInterval(function() {
// 			getMensagens();
// 		}, 30000);//30 segundos

	  $(".download-app").click(function(){
		 
			$("#modalapp").modal("show");

		});		
      
	});
  	
	function marcarLida(idMensagem){
		$.ajax({
			url: $("#js-url-marcar-lida").attr("data-url")+"/"+idMensagem,
			method:'GET',
			contentType:'application/json'
		});
		
		$('.js-alerta-'+idMensagem).fadeOut(500);
	}
	
	function getMensagens(){
		
		$.ajax({
				url: $("#js-mensagem-responsavel").attr("data-url"),
				method:'GET',
				contentType:'application/json',
				success: function( mensagens ) {
	                var cont = 0;
	                var options = [];
	               // var ids='0'
					mensagens.forEach(function(msg){
						cont++;
						//ids+=','+msg.id;
						options.push('<li>'+
                        '<div class="dropdown-messages-box">'+
                            '<div class="media-body">'+
                            '<a href="'+msg.acao+'" class="pull-left">'+
                                '<strong>'+msg.assunto+'</strong> <br/><small class="text-muted">'+msg.mensagem+'</small> <br/><small class="text-muted">@'+msg.remetente+'</small>. <br>'+
                               ' <small class="text-muted">'+msg.data+'</small>'+
                               '</a>'+
                            '</div>'+
                        '</div>'+
                    '</li>'+
                    '<li class="divider"></li>');
						
						
						
					});
					
					if(cont==0){
						
						options.push('<li>'+
		                        '<div class="dropdown-messages-box">'+
		                            '<div class="media-body">'+
		                            '<a href="/mensagem" class="pull-left">'+
		                                '<strong>Caixa de Entrada</strong> <br/>Não tem mensagens novas. <br>'+
		                               ' <small class="text-muted">'+getHoje()+'</small>'+
		                               '</a>'+
		                            '</div>'+
		                        '</div>'+
		                    '</li>'+
		                    '<li class="divider"></li>');
					}
					
					
					$(".js-mensagens").html(options.join(''));
	                $('.js-quantidade-mensagens').html(cont);
	            }
			});

		}
	
	function getHoje(){
	var data = new Date();

	// Guarda cada pedaço em uma variável
	var dia     = data.getDate();           // 1-31
	var dia_sem = data.getDay();            // 0-6 (zero=domingo)
	var mes     = data.getMonth();          // 0-11 (zero=janeiro)
	var ano2    = data.getYear();           // 2 dígitos
	var ano4    = data.getFullYear();       // 4 dígitos
	var hora    = data.getHours();          // 0-23
	var min     = data.getMinutes();        // 0-59
	var seg     = data.getSeconds();        // 0-59
	var mseg    = data.getMilliseconds();   // 0-999
	var tz      = data.getTimezoneOffset(); // em minutos

	// Formata a data e a hora (note o mês + 1)
	var str_data = dia + '/' + (mes+1) + '/' + ano4;
	var str_hora = hora + ':' + min + ':' + seg;

	// Mostra o resultado
	return( str_data + ' às ' + str_hora);
	}
	
	function alertaPrincipal(){
		
		
		$.ajax({
//				url : "/mensagem/alerta",
			url: $("#js-mensagem-alerta").attr("data-url")+"/"+$(".js-idmensagens").val(),
			method:'GET',
			contentType:'application/json',
			success: function( mensagens ) {
				
                var cont = 0;
                var options = [];
                
                if(mensagens.length > 0){
                	var indexmsg = 0;
					var mensagem = mensagens[0] ;
					 var idsatuais = $(".js-idmensagens").val().split(",");
					 var isok = false;
					 for (var i = 0; i < mensagens.length; i++) {
						 for (var j = 0; j < idsatuais.length; j++) {
							if((mensagens[i].id != idsatuais[j]) && idsatuais[j]!=0){
								mensagem = mensagens[i];
								isok = true;
							}
							 if(isok){
								 break;
							 }
						 }
						 if(isok){
							 break;
						 }
					 }
					 
	    		 	//type = ['', 'card card-stats', 'success', 'warning', 'danger', 'rose', 'primary'];
	    	       // color = Math.floor((Math.random() * 6) + 1);
	    	        
	    	        var adiciona = true;
	    	        for (var j = 0; j < idsatuais.length; j++) {
	    	        	if(idsatuais[j]==mensagem.id){
	    	        		adiciona = false;
	    	        	}
	    	        }
	    	        
	    	        if(adiciona){
	    	        	//marcarLida(mensagem.id);
	    	        	$(".js-idmensagens").val($(".js-idmensagens").val()+","+mensagem.id);
					 }		    	         	 
	    	        
	    	       if(adiciona){
	    	        	
		    	        $.notify({
// 		    	            icon: "notifications",
		    	            message: 
								  "<div class=\"ibox float-e-margins js-alerta-"+mensagem.id+"\">"
								+ "		<div class=\"ibox-title\">"
								+ "			<h5>Novas Mensagens</h5>"
								+ "			<div class=\"ibox-tools\">"
								+ " 			<span class=\"label label-warning-light pull-right\"><span >"+mensagens.length+"</span> Mensagens</span>"
								+ "			</div>"
								+ "		</div>"
								+ " 	<div class=\"ibox-content\">"
								+ " 		<div>"
								+ " 			<div class=\"feed-activity-list\">"
								+ "   				<div class=\"feed-element\">"

								+ "  					<div class=\"media-body \">"
								+ "      					<small class=\"pull-right\">5m ago</small>"
								+ "     					<strong>"+mensagem.assunto+"</strong> <br>"
								+ "  				 		<small class=\"text-muted\">"+mensagem.mensagem+"</small><br>"
								+ "  				 		<small class=\"text-muted\"><b>"+mensagem.data+"</b></small><br>"
								+ "  				 		<small class=\"link\"><b><a href='#'  onClick='marcarLida("+mensagem.id+");'> Marcar como lida</a></b></small>"
								+ " 					</div>"
								+ " 				</div>"
								+ " 				</div>"
								+ "    			<a href="+mensagem.acao+" class=\"btn btn-primary btn-block m-t\"><i class=\"fa fa-arrow-down\"></i> Leia Mais</a>"
								+"</div>"
								+"</div>"
		    	        }, {
		    	            type: "card card-stats",
		    	            delay: 10000,
		    	            timer: 10000,
		    	            z_index: mensagem.id,
		    	            placement: {
		    	                from: 'bottom',
		    	                align: 'right'
		    	            }
						});
	    	       }
                }
            }//fim ajax
		
		});
	}
	

		//fim ajax
	</script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-38109798-3"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-38109798-3');
		</script>
	
	
	<section>
		
		
		<script type="text/javascript" >
	/*<![CDATA[*/
			
			 $(document).ready(function() {
				 var msg = $("#msg").val();
				 var tipo = 0;
				 tipo =  0;
		
				 if(false ){ //somente exibir mensagem
				swal(
						{
							html:true,
							title : '',
							text : msg+"<br/><div class=\"row\" ><div class=\"col-md-10 col-md-offset-1\" ><a class=\"btn btn-danger btn-block\"  href=\"/sair\"> SAIR DO SISTEMA </a></div></div><p>&nbsp;</p>",
							type : "warning",
							 showCancelButton: true,
							  showConfirmButton: false
							  //allowEscapeKey: false,
							 
							
						}
				)
			}
			
			 });
			 /*]]>*/
			</script>
		
		
		
		
		
			<script type="text/javascript">
				 $(document).ready(function() {
					 
					 
					function adicionarCsrfToken(xhr) {
						var token = $('input[name=_csrf]').val();
						xhr.setRequestHeader('x-csrf-token', token);
					}
				 })
				 
				 $(".js-btn-imprimir").on("click", function(){
	        	
	              $(".js-pdf").html("<iframe src=\"/pttc/imprimirAdm/"+$(this).attr("data-pessoa")+"\"style=\"width:95%; height:600px; align:center;\" frameborder=\"0\"></iframe>")
	              
	    		});
				 
			</script>
	
	</section>
	
<script>
// Make the DIV element draggable:
$(document).ready(function(){
dragElement(document.getElementById("floating-panel"));
dragElement(document.getElementById("floating-panel2"));
	 $( "#x" ).click(function() {
      $('#floating-panel').css("display","none");
      });
$( "#x2" ).click(function() {
      $('#floating-panel2').css("display","none");
      });
});
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id).onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

</script>	
 <script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
 
 
	 <div id="floating-panel" class="cont-items-monitor" style="text-align: left;display:none;">
	         <button id = "x" class="btn btn-warning">
            X
        </button>
		
		<!--<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"><label class="form-check-label" for="flexCheckDefault">Default checkbox</label></div>-->
    
		<?php 
		echo '		<table class="table">';
		

		$atuacao=array();
		
		array_push($atuacao,'Apoio administrativo');
		array_push($atuacao,'Assessoria parlamentar');
		array_push($atuacao,'Cultura');
		array_push($atuacao,'Desenvolvimento agrário e rural');
		array_push($atuacao,'Desenvolvimento regional e territorial');
		array_push($atuacao,'Esporte e lazer');
		array_push($atuacao,'Gestão da informação e do conhecimento');
		array_push($atuacao,'Gestão de processos');
		array_push($atuacao,'Habilitação e saneamento');
		array_push($atuacao,'indústria, comércio e serviços');
		array_push($atuacao,'Justiça');
		array_push($atuacao,'Meio ambiente');
		array_push($atuacao,'Orçamento e finanças');
		array_push($atuacao,'Ouvidoria');
		array_push($atuacao,'Políticas Públicas');
		array_push($atuacao,'Previdência social');
		array_push($atuacao,'Relações exteriores');
		array_push($atuacao,'Tecnologia da informação e da comunicação');
		array_push($atuacao,'Trabalho');
		array_push($atuacao,'Turismo');
		array_push($atuacao,'Assessoria Internacional');
		array_push($atuacao,'Comunicações');
		array_push($atuacao,'Desenvolvimento social');
		array_push($atuacao,'Direitos humanos e cidania');
		array_push($atuacao,'Educação');
		array_push($atuacao,'Energia e mineração');
		array_push($atuacao,'Gestão de pessoas');
		array_push($atuacao,'Gestão de projetos');
		array_push($atuacao,'Logística');
		array_push($atuacao,'Planejamento estratégico ou setorial');
		array_push($atuacao,'Convênios');
		array_push($atuacao,'Corregedoria');
		array_push($atuacao,'Desenvolvimento econômico');
		array_push($atuacao,'Assessoria de comunicação');
		array_push($atuacao,'Assessoria jurídica');
		array_push($atuacao,'Atendimento ao público');
		array_push($atuacao,'Ciência, tecnologia e inovação');
		array_push($atuacao,'Defesa nacional');
		//$s='<div class="form-check"><input class="form-check-input atuacao" type="checkbox" value="" id="flexCheckDefault_1"><label class="form-check-label" for="flexCheckDefault">';
		//$s2='</label></div>';
		$sql="select * from atuacao where id=".$_GET['id'];
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $marcados=explode("|",$row['atuacao']);
		
		for($i=0;$i<=count($atuacao)-1;$i++)
		{
			if( in_array($atuacao[$i],$marcados))
			{
				$flag="checked";
			}
			else{
				$flag="";
			}
			$s='<div class="form-check"><input class="form-check-input atuacao" type="checkbox" value="" id="flexCheckDefault_'.$i.'" '.$flag.'><label class="form-check-label" for="flexCheckDefault_'.$i.'">';
			echo $s.$atuacao[$i].'</label></div>';
		}
		
		echo '</table>';
		?>
		
	<!-- <div class="row r1"><div class="col"><h7>Viatura</h7></div><div class="col"><input id="vtr" class="form-control form-control-sm" type="text" ></input></div></div>
	 <div class="row r1"><div class="col"><h7>Comandante</h7></div><div class="col"><input id="cmt" class="form-control form-control-sm" type="text" ></input></div></div>
	 <div class="row r1"><div class="col"><h7>Contato do Comandante</h7></div><div class="col"><input id="tel_cmt" class="form-control form-control-sm" type="text" ></input></div></div>
	 -->
	 </div>
	 
	  <div id="floating-panel2" class="cont-items-monitor" style="text-align: left;display:none;">
	         <button id = "x2" class="btn btn-warning">
            X
        </button>
		
		<!--<div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"><label class="form-check-label" for="flexCheckDefault">Default checkbox</label></div>-->
    
		<?php 
		echo '		<table class="table">';
		

		$aptidao=array();
		
		array_push($aptidao,'Liderança');
		array_push($aptidao,'Articulação');
		array_push($aptidao,'Capacidade de análise');
		array_push($aptidao,'Capacidade de síntese');
		array_push($aptidao,'Comunicação');
		array_push($aptidao,'Criatividade');
		array_push($aptidao,'Escuta ativa');
		array_push($aptidao,'Flexibilidade');
		array_push($aptidao,'Gestão de conflitos');
		array_push($aptidao,'Gestão de tempo');
		array_push($aptidao,'Negociação');
		array_push($aptidao,'Oratória');
		array_push($aptidao,'Proatividade');
		array_push($aptidao,'Raciocínio lógico');
		array_push($aptidao,'Redação');
		array_push($aptidao,'Tomada de decisões');
		array_push($aptidao,'Visão sistêmica');
		array_push($aptidao,'Relacionamento interpessoal');
		array_push($aptidao,'Resiliência');
		
		
		$sql="select * from aptidao where id=".$_GET['id'];
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $marcados=explode("|",$row['aptidao']);
		for($i=0;$i<=count($aptidao)-1;$i++)
		{
			if( in_array($aptidao[$i],$marcados))
			{
				$flag="checked";
			}
			else{
				$flag="";
			}
			$s='<div class="form-check"><input class="form-check-input aptidao" type="checkbox" value="" id="aptidaocheckbox_'.$i.'" '.$flag.'><label class="form-check-label" for="aptidaocheckbox_'.$i.'">';
			echo $s.$aptidao[$i].'</label></div>';
		}
		
		echo '</table>';
		?>
		
	<!-- <div class="row r1"><div class="col"><h7>Viatura</h7></div><div class="col"><input id="vtr" class="form-control form-control-sm" type="text" ></input></div></div>
	 <div class="row r1"><div class="col"><h7>Comandante</h7></div><div class="col"><input id="cmt" class="form-control form-control-sm" type="text" ></input></div></div>
	 <div class="row r1"><div class="col"><h7>Contato do Comandante</h7></div><div class="col"><input id="tel_cmt" class="form-control form-control-sm" type="text" ></input></div></div>
	 -->
	 </div>

	 <script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
</body>
</html>