
<!DOCTYPE html>
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml"
	>
<?php
include("config.php");
include("session.php");
?>
<head>
    <title>SGPol | Sistema de Gestão Policial</title>
    <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" type="image/png" href="/favicon.ico" />
	<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>  -->
	<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <!-- datatables -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!--datatables -->	
	
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
	
</head>

<body>
	<input type="hidden" name="_csrf" value="d8e13555-ffda-4706-b8bb-36a0bba3fa7c"/>
	<input type="hidden" name="_csrf_header" value="X-CSRF-TOKEN"/>
	
	
    <input type="hidden" data-url="/mensagem/responsavel" id="js-mensagem-responsavel" />
	<input type="hidden" data-url="/mensagem/modal" id="js-mensagem-alerta" />
	<input type="hidden" data-url="/mensagem/alerta/ler" id="js-mensagem-alerta-ler" />
	<input type="hidden" data-url="/mensagem/marcarlidapopup" id="js-url-marcar-lida" />
    <div id="wrapper">
         <?php include("menu_lateral.php");?>
		
		
        <div id="page-wrapper" class="gray-bg dashbard-1">
        	
        	<!-- Menu superior -->
        	
        
	        <div class="row border-bottom">
		        <nav class="navbar navbar-static-top gray-bg" role="navigation" style="margin-bottom: 0">
			        <div class="navbar-header">
			            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

			        </div>
		            
		            <div class="navbar-collapse collapse" id="navbar">
		                <ul class="nav navbar-nav ">

		               
		                <ul class="nav navbar-nav ">
		

		

		
		
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

		                
		                
<div style="background-color:#02798d;color:white;height:100px;width:100%;">
    

     
<div class="row" >

  <div class="col" style="margin-top:2%;">
    <img src="./img/dados.png"/>
  </div>
  <div class="col" style="margin-top:2%;">
     <img src="./img/atuacao.png"/>
  </div>
  <div class="col" style="margin-top:2%;">
      <img src="./img/academico.png"/>
  </div>
     
  <div class="col" style="margin-top:2%;">
      <img src="./img/talentos.png"/>
  </div>

 

</div>
        

</div>		                
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

 

<table id="example" class="table table-striped table-bordered nowrap" style="margin-left:2%;" >
	 <thead>
	 <th>ID</th>
	 <th>Login</th>
	 <th>Senha</th>
	 <th>Papel</th>
	 </thead>
	 </table>

<script>

function remover(id)
{
	   
	 
	var valor='';
	valor+='id='+id;
	
	valor+='&flag=remover';
	  $.ajax({ 
 type:"POST", 
 url: "Salavar_usuario.php", 
 data:valor,
  success: function(data){
    //alert(valor);
   // console.log(valor);
     location.reload();
 	//alert("Dados Atualizados");
	
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
}

	


$(document).ready(function(){


$(document).arrive('#enviar', {
   onceOnly: false
}, function () {
   $('#enviar').click(function(){
	//alert("TESTE");
	var valor='';
	valor+='nome='+$('#nome').val();
	valor+='&senha='+$('#senha').val();
	valor+='&papel='+$('#papel option:selected').text();
	valor+='&flag=salvar';
	  $.ajax({ 
 type:"POST", 
 url: "Salavar_usuario.php", 
 data:valor,
  success: function(data){
    //alert(valor);
   // console.log(valor);
     location.reload();
 	//alert("Dados Atualizados");
	
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

});






var table = $('#example').DataTable( {
	 responsive: false,
         dom: 'Blfrtip',
         buttons: ['excel'],
        "iDisplayLenght": 100,
        "aLengthMenu":[[10,25,50,100,500,1000,10000],[10,25,50,100,500,1000,'10mil']],
	       "language": {
                        "sProcessing":   "",
                        "sLengthMenu":   "_MENU_ por página",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "_START_ até _END_ de _TOTAL_ elementos",
                        "sInfoEmpty":    "0 registros",
                        "sInfoFiltered": "",
                        "sInfoPostFix":  "",
                        "sSearch":       "Buscar:",
                        "sUrl":          "",
                        "oPaginate": {
                                "sFirst":    "Primeiro",
                                "sPrevious": "Anterior",
                                "sNext":     "Seguinte",
                                "sLast":     "Último"
                        }
                 },

         columns: [
          { data: "id"}, //0
	  { data: "nome"}, //1
	  { data: "senha"}, //2
	  { data: "papel"} //2
	  
	],
	
	
    "ajax": 'getBaixados.php',
	
		 "columnDefs": [
		             {
				
                "render": function (data, type, row ) { 
		 
				 
				 
                   // return s.replace("&Ccedil;","ç");
					return '<button type="button" class="btn btn-danger" onclick=remover('+row['id']+')><span class="fa fa-trash"></span></button>' ;
                },
                "targets": 0
            }
			],/*,
            {
				
                "render": function (data, type, row ) { 
		 
				 
				id=row['historico_inicial'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['historico_inicial'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['historico_inicial'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['historico_inicial'].substring((s.length-q),row['historico_inicial'].length) ;
                },
                "targets": 13
            },
            {
				
                "render": function (data, type, row ) { 
		 
				 
				id=row['endereco'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['endereco'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%8==0)
				   	  {
					   s=s+row['endereco'].substring(x-8,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return '<table style="border:none;" ><tr style="border:none;"><td style="border:none;">'+s+row['endereco'].substring((s.length-q),row['endereco'].length)+'</td><td style="border:none;"><button style="border:none;color:inherit;background-color:inherit;" onclick=gps('+row['lat']+','+row['lng']+') ><img class="gps"  src="gps.png" style="width:25px;height:25px;"/></button></td></tr></table>' ;
                },
                "targets": 9
            },		
            {
				
                "render": function (data, type, row ) { 
		 
				 
				id=row['bairro'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['bairro'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%12==0)
				   	  {
					   s=s+row['bairro'].substring(x-12,x).replace("&Ccedil;","ç")+"<br>";	
					   q=q+4;
					  }
					}
					x=x+1	
					}
                    //return s.replace("&Ccedil;","ç");
					return s+row['bairro'].substring((s.length-q),row['bairro'].length) ;
                },
                "targets": 8
            },
			{			
                "render": function (data, type, row ) { 
		 
				 
				id=row['cidade'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['cidade'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%6==0)
				   	  {
					   s=s+row['cidade'].substring(x-6,x).replace("&Ccedil;","ç")+"<br>";
						q=q+4;					   
					  }
					}
					x=x+1	
					}
                    //return s.replace("&Ccedil;","ç");
					return s+row['cidade'].substring((s.length-q),row['cidade'].length) ;
                },
                "targets": 7
            },		
			{
                "render": function (data, type, row ) { 
		 
				 
				id=row['natureza'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['natureza'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%15==0)
				   	  {
					   s=s+row['natureza'].substring(x-15,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   return s+row['natureza'].substring((s.length-q),row['natureza'].length) ;
                },
                "targets": 4
            },	
			{
                "render": function (data, type, row ) { 
		 
				 
				id=row['comandante'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['comandante'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%15==0)
				   	  {
					   s=s+row['comandante'].substring(x-15,x)+"<br>";	
					   q=q+4;
					  }
					  
					}
					x=x+1	
					}
					//console.log(row['comandante'].length);
					//console.log(s.length-q);
                    return s+row['comandante'].substring((s.length-q),row['comandante'].length) ;
					//return s;
                },
                "targets": 3
            },	
{
                "render": function (data, type, row ) { 
		 
				 
				id=row['solicitante'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['solicitante'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%15==0)
				   	  {
					   s=s+row['solicitante'].substring(x-15,x)+"<br>";	
					   q=q+4;
					  }
					  
					}
					x=x+1	
					}
					//console.log(row['solicitante'].length);
					//console.log(s.length-q);
                    return s+row['solicitante'].substring((s.length-q),row['solicitante'].length) ;
					//return s;
                },
                "targets": 5
            },			
			{
                "render": function (data, type, row ) { 
		 
				 
				id=row['data'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['data'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%10==0)
				   	  {
					   s=s+row['data'].substring(x-10,x)+"<br>";	
					   q=q+4;
					  }
					  
					}
					x=x+1	
					}
					//console.log(row['data'].length);
					//console.log(s.length-q);
                    return s+row['data'].substring((s.length-q),row['data'].length) ;
					//return s;
                },
                "targets": 1
            },	
			{
                "render": function (data, type, row ) { 
		             var flag=false;
				 
				    <?php
					if($row['papel']=="copom")
					{
						echo 'flag=true;';
					}
					?>
					if(!flag)
					{
                    return "<button class='btn btn-primary numer' id='"+row['numero']+"' onclick=dialogo("+row['numero']+")>"+row['numero']+"</button>" ;
					}
					else
					{
					return "<table><tr><td><button class='btn btn-primary numer' id='"+row['numero']+"' onclick=dialogo("+row['numero']+")>"+row['numero']+"</button></td></tr><tr><td><button class='btn-danger btn' type=button onclick=deletar('"+row['numero']+"')><span class='fa fa-trash'></span></button></td></tr></table>";	
					}
					//return s;
                },
                "targets": 0
            },	
            { "visible": false,  "targets": [ 10 ] }	,		
			{ "visible": false,  "targets": [ 11 ] }	,		
            { "visible": false,  "targets": [ 12 ] }	,		
			
            { "width": "150px", "targets": 13 },

			]*/
	
		"initComplete": function(settings, json) {
		//$('#example_filter').css('margin-left','78%');
		//$('input[tabindex="0"]').parent().css('display','none'); 
		//$('td[html="controle"]').parent().css('display','none');
		$('th').css('background-color','#2f4050');
		$('th').css('font-size','10px');
		$('th').css('color','white');

		$(this).append('<td colspan="2"></td><td><center><button id="plus" type="button" style="border:0px; background-color:transparent;"  ><img src="plus.png" style="width:40px; height:40px;"></image></button></center></td>');
		
		$( "#plus" ).click(function() {
        $("#example").append('<tr><td colspan="1"><input id="nome" name="nome" type="text" class="form-control" placeholder="nome" style="width:100%;" autocomplete="off"></input></td><td><input class="form-control" id="senha" type="password" name="senha" placeholder="senha" type="text" autocomplete="off"/></td><td><select class="form-control" id="papel"><option>Usuário</option><option>Coordenador</option></select></td><td><button id="enviar" class="btn btn-info">Cadastrar</button></td></tr>');
		$("#plus").css("display","none");
		
		//data
	/*	      var date_input=$('input[name="data_inicio"]'); //our date input has the name "date"
	  var date2_input=$('input[name="data_fim"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        //format: 'mm/dd/yyyy',
		format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	  date2_input.datepicker(options);
	  $('#data_inicio').mask('0000-00-00');
	  $('#data_fim').mask('0000-00-00');
	  $('#antiguidade').mask('00000');*/
	  
		//data
		
		
})
		
		
	}
	
	
	});
});
	
</script>

        <div class="col-lg-12 text-center wow fadeDownTop">
            <div class="navy-line"></div>
            
 
				
									
						
				
			
			
  
            
            
            
            
            	<div class="modal inmodal fade" id="pdfTermo" tabindex="-1"
											role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span><span
										class="sr-only">Close</span>
								</button>
								<h4 class="modal-title">Recibo de Conclusão da Fase Virtual</h4>
							</div>
							<div class="modal-body js-pdf text text-center"></div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger"
									data-dismiss="modal">Fechar</button>

							</div>
						</div>
					</div>
				</div>
            
            
        </div>
    </div>
</section>

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
  
  	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
</body>
</html>