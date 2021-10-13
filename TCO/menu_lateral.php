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
		
		
        	<!--<span class="text-muted text-xs block "  style="color:#ffffff;">CAD 2º ANO Esp BENTEMULLER</span> -->
         <span class="text-muted text-xs block "  style="color:#ffffff;"> <?php echo $row['nome'];?></span>
        
        
        
        
        
        
        
         
        
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
        <li><a href="minhas_informacoes.php?id=1">
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