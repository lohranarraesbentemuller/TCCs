<!DOCTYPE html>
<html lang="pt" xmlns="http://www.w3.org/1999/xhtml"
	>

<?php
include("config.php");
include("session.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$filtro1=$_POST['filtro1'];
	$filtro2=$_POST['filtro2'];
	$filtro3=$_POST['filtro3'];
	$filtro4=$_POST['filtro4'];
	$filtro5=$_POST['filtro5'];
	$filtro6=$_POST['filtro6'];
	$filtro7=$_POST['filtro7'];
	
	if($filtro1=="Instituição em que formou") $filtro1="instituicao";
	if($filtro1=="Cargo Público/Privado") $filtro1="PB";
    if($filtro1=="Resumo da experiência") $filtro1="resumo";
	if($filtro1=="Curso") $filtro1="curso";
	 
	if($filtro2=="Instituição em que formou") $filtro2="instituicao";
	if($filtro2=="Cargo Público/Privado") $filtro2="PB";
	if($filtro2=="Resumo da experiência") $filtro2="resumo";
	if($filtro2=="Curso") $filtro2="curso";
	

	if($filtro3=="Instituição em que formou") $filtro3="instituicao";
	if($filtro3=="Cargo Público/Privado") $filtro3="PB";
    if($filtro3=="Resumo da experiência") $filtro3="resumo";
	if($filtro3=="Curso") $filtro3="curso";

	if($filtro4=="Instituição em que formou") $filtro4="instituicao";
	if($filtro4=="Cargo Público/Privado") $filtro4="PB";
    if($filtro4=="Resumo da experiência") $filtro4="resumo";
	if($filtro4=="Curso") $filtro4="curso";

	if($filtro5=="Instituição em que formou") $filtro5="instituicao";
	if($filtro5=="Cargo Público/Privado") $filtro5="PB";
    if($filtro5=="Resumo da experiência") $filtro5="resumo";
    if($filtro5=="Curso") $filtro5="curso";

	if($filtro6=="Instituição em que formou") $filtro6="instituicao";
	if($filtro6=="Cargo Público/Privado") $filtro6="PB";
    if($filtro6=="Resumo da experiência") $filtro6="resumo";
	if($filtro6=="Curso") $filtro6="curso";
	
	if($filtro7=="Instituição em que formou") $filtro7="instituicao";
	if($filtro7=="Cargo Público/Privado") $filtro7="PB"	;
	if($filtro7=="Resumo da experiência") $filtro7="resumo";
	if($filtro7=="Curso") $filtro7="curso";
	
	//exit();
}
?>

<head>
    <title>SGPol | Sistema de Gestão Policial</title>
    <meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" type="image/png" href="/favicon.ico" />
	<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
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
	

<!--<section class="container features" style="overflow:visible;overflow-y: scroll;">-->
<section>
<h1>Notificações</h1>
<table class="table" id="table_float">
<button id="ver_notificacoes" class="fa fa-bell"></button>
</table>


 <h1>Pessoas</h1>

<table id="example" class="table table-striped table-bordered nowrap" style="margin-left:2%;overflow-y:scroll;" >
	 <thead>

     <th>Nome</th> 
	 <th>Equipe</th> 
	 <th>Curso</th> 
	 <th>Inicio</th> 
	 <th>Fim</th> 
	 <th>Data de Validade</th> 
	 <th>Duração</th> 
	 
	 </thead>


</table>

<h1>Cursos</h1>

<table id="example2" class="table table-striped table-bordered nowrap" style="margin-left:2%;overflow-y:scroll;" >
	 <thead>

     <th>Curso</th>
	<!-- <th>Equipe</th>-->
	 <th>Total</th>
	 
	 </thead>


</table>


<h1>Linha temporal dos cursos ao longo do ano</h1>
    
  <canvas id="line-chart" width="400" height="250"></canvas>

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
$('.container').css("overflow","visible");

 

$(document).arrive('#example_wrapper', {
   onceOnly: false
}, function () {
  $('#example_wrapper').css("overflow-y","scroll");
});


var table = $('#example2').DataTable( {
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
 
	  { data: "nome"}, //3
	 // { data: "equipe"}, //2
      
	  { data: "total"}, //4
	  
	],
	
	
    "ajax": 'getBanco2.php',
	
 
	
	
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
  
	  
      
	  { data: "nome"}, //1
	  { data: "equipe"}, //2
	  { data: "curso"}, //2
      { data: "inicio"}, //3
	  { data: "fim"}, //4
	  { data: "data_validade"},//5
      { data: "duracao"} //6
	  //{ data: "curso"} //7
	 
	],
	
	
    "ajax": 'getBanco.php',
	
			   "columnDefs": [
            {
                "render": function ( data, type, row ) {
                    return row['inicio'].split("-")[2]+"/"+row['inicio'].split("-")[1]+"/"+row['inicio'].split("-")[0];
                },
                "targets": 3
            },
            {
                "render": function ( data, type, row ) {
                    return row['fim'].split("-")[2]+"/"+row['fim'].split("-")[1]+"/"+row['fim'].split("-")[0];
                },
                "targets": 4
            },
			            {
                "render": function ( data, type, row ) {
                    return row['data_validade'].split("-")[2]+"/"+row['data_validade'].split("-")[1]+"/"+row['data_validade'].split("-")[0];
                },
                "targets": 5
            },
        //              { "visible": false,  "targets": [ 0 ] }
        ], 
	
	
	
	
	});
	
	
	$('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
		//if(title=="Data" || title=="Horario" || title=="Escala" || title=="Cor")
		//{
        $(this).html( '<input type="text" placeholder="Procurar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
	    //}
		//else
		//{
		//	$(this).html('');
		//}
    } ); 
	
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
                <div style="display:none;" class="footer">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

<script>
$(document).ready(function(){
$('#ver_notificacoes').click(function(){
	valor="";
//TESTE NOTIFICACOES
$.ajax({ 
 type:"POST", 
 url: "notificacoes.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
    // console.log(data);
 	//alert(data);
	$('#table_float').html('');
	$('#table_float').append('<thead class="thead-dark">');
    $('#table_float').append('<thead class="thead-dark"><tr><th scope="col"><span class="fa fa-bell"></span></th><th scope="col">Notificação</th></tr></thead>');
    $('#table_float').append('<tr id="tr1"></tr>');
	
	for (var i = 0; i < data.split('#').length; i++)  
		{
			//alert(data.split("#")[i]);
			if (data.split("#")[i].length>2)
			{
				//if((data.split("#")[i].split(".")[1].toLowerCase() =="jpg" ) || (data.split("#")[i].split(".")[1].toLowerCase() =="png" ) || (data.split("#")[i].split(".")[1].toLowerCase() =="bmp" ))
				  // $('#tr1').after('<tr><td><img style="width:75px;" src="./uploads/<?php echo $_GET["id"] ;?>/'+data.split("#")[i]+'"></img></td><td class="td_url"><a href="./uploads/<?php echo $_GET['id'] ;?>/'+data.split("#")[i]+'">'+"./uploads/<?php echo $_GET["id"] ;?>/"+data.split("#")[i]+'</a></td></tr>');
				//else
				    $('#tr1').after('<tr><td><span class="fa fa-bell"></span></td><td class="td_url">'+data.split("#")[i]+'</td></tr>');
			}      
		}
	//$('#URLS').css("display","inherit");
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
//TESTE NOTIFICACOES
});
});

//teste grafico
$(document).ready(function(){
	
	var ctx = document.getElementById("line-chart").getContext('2d');
var j=0
var data2=[];
 
console.log(data2);

var departments = [];
var annees = [];
var data = {
	 <?php 
     $labels="";
	 $atual=array();
	 $nome=array();
	 $data=array();
	 $total=array();
	 for ($antecedencia = -365; $antecedencia <= 365; $antecedencia=$antecedencia+1) {
      //$sql="(select equipe,cqurso.nome,count(cq2urso.curso) as total,limiar from (select * from curso)cqurso left join (select equipe,curso,count(curso) as cursados from (select oo.nome as equipe,op.nome as curso, inicio,fim,data_validade from (select * from equipes)oo left join (select * from (select id_pessoa,t1.nome,inicio,fim,date_add(fim,interval validade day) as data_validade from (select * from cursos_feitos)t1 inner join (select * from curso)t2 on t1.nome =t2.nome where date_add(fim,interval validade day)>=date_add(curdate(),interval ".$antecedencia." day) and date_add(curdate(),interval  ".$antecedencia." day)>inicio )r1 inner join (select * from minhas_equipes)r2 on r1.id_pessoa=r2.id)op on locate(oo.nome,op.equipe)>0)qwe group by curso,equipe) cq2urso on cqurso.nome=cq2urso.curso group by cqurso.nome,equipe)";	
	  $sql="(select equipe,cqurso.nome,count(cq2urso.curso) as total,limiar from (select * from curso)cqurso left join (select equipe,curso,count(curso) as cursados from (select oo.nome as equipe,op.nome as curso, inicio,fim,data_validade from (select * from equipes)oo left join (select * from (select id_pessoa,t1.nome,inicio,fim,date_add(fim,interval validade day) as data_validade from (select * from cursos_feitos)t1 inner join (select * from curso)t2 on t1.nome =t2.nome where date_add(fim,interval validade day)>=date_add(curdate(),interval ".$antecedencia." day) and date_add(curdate(),interval  ".$antecedencia." day)>inicio )r1 inner join (select * from minhas_equipes)r2 on r1.id_pessoa=r2.id)op on locate(oo.nome,op.equipe)>0)qwe group by curso,equipe) cq2urso on cqurso.nome=cq2urso.curso group by cqurso.nome)";	
       $result=mysqli_query($db,$sql);
       foreach($result as $row)
       {
	   $sql="select date_add(curdate(),interval ".$antecedencia." day) as essa";
	   $result2=mysqli_query($db,$sql);
	   $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
	   //echo $row2['essa']."|".$row['nome']."|".$row['total']."#";
	    $temp=array();
        array_push($temp,$row['nome']);
		array_push($temp,$row2['essa']);
		array_push($temp,$row['total']);
		
		array_push($nome,$row['nome']);
		array_push($data,$row2['essa']);
		array_push($total,$row['total']);
		//$labels=$labels."'".$row2['essa']."',";
		//echo $labels;
		array_push($atual,$temp);
       }
     }
     $unicos=array_unique($nome);
	 $datas=array_unique($data);
	 foreach($datas as $d)
	 {
		 $labels=$labels."'".$d."',";
	 }
	 //$datas=array_unique($data);
	 $s="";
	 foreach($unicos as $unico)
	  {
		$s.="'".$unico."': [ \n"; 
		
        for($i=0;$i<=count($atual);$i=$i+(count($unicos)-1))
 	    {
		   if ($atual[$i][0]==$unico)
		   {
			   $s.="{ \n";
			   $s.="annee: '".$atual[$i][1]."', \n";
			   $s.="totalnaissance: '".$atual[$i][2]."', \n";
			   $s.="}, \n";
		   }
	    }
		$s.="],";
	  }
	  echo $s;
     /*
 
	 $s="";
       for ($i = 0; $i <= count($atual); $i++) 
	   
	   {
		  
		   //if($array[i]==array[i+1])
		   if($i==0) 
		   {
			 
			$s=$s."'".$atual[$i][0]."' : [ \n";
			 $s=$s."{ \n";
			 $s=$s."annee: '".$atual[$i][1]."' ,\n";
             $s=$s."totalnaissance: '".$atual[$i][2]."' ,\n";
             $s=$s."}, \n";  
		   }
		   else
		   {
			   
			  
			   
			   if($atual[$i][0]!=$atual[$i-1][0])
			   {
			$s=$s."],";	   
			$s=$s."'".$atual[$i][0]."' : [ \n";
			 $s=$s."{ \n";
			 $s=$s."annee: '".$atual[$i][1]."' ,\n";
             $s=$s."totalnaissance: '".$atual[$i][2]."' ,\n";
             $s=$s."}, \n";  
			   }
			   else{
			 
			 $s=$s."{ \n";
			 $s=$s."annee: '".$atual[$i][1]."' ,\n";
             $s=$s."totalnaissance: '".$atual[$i][2]."' ,\n";
             $s=$s."}, \n";  				   
			   }
		   }
	   }
	   
 
	   
	  
	   
	   echo $s."]"; */
 
	 ?>
      
    };
 

for (var department in data) {
    if (data.hasOwnProperty(department)) {
        var departmentData = data[department];
        getYears(departmentData);
    }
}

//annees.sort();

for (var department in data) {
    if (data.hasOwnProperty(department)) {
        var departmentData = data[department];//getDataForDepartment(i);
        var totalnaissanceData = getTotalNaissanceDataForDep(departmentData);

        var departmentObject = prepareDepartmentDetails(department, totalnaissanceData);
        departments.push(departmentObject);
    }
}

var chartData = {
    labels: <?php echo "[".$labels."]";?>,
    datasets : departments
};

var chart = new Chart(ctx, {
   type: "line",
   data: chartData,
   options: {}
 });


function getDataForDepartment(index){
    return data[i][Object.keys(data[i])[0]];
}

function getYears(departmentData){
    for (var j = 0; j< departmentData.length; j++){
        if (!annees.includes(departmentData[j].annee)){
            annees.push(departmentData[j].annee);
        }
    }
}

function getTotalNaissanceDataForDep(departmentData){
    var totalnaissanceData = [];
    for (var j = 0; j < annees.length; j++){
        var currentAnnee = annees[j];
        var currentTotalNaissance = null;
        for (var k = 0; k< departmentData.length; k++){
            if (departmentData[k].annee === currentAnnee){
                currentTotalNaissance = departmentData[k].totalnaissance;
                break;
            }
        }
        totalnaissanceData.push(currentTotalNaissance);
    }
    return totalnaissanceData;
}

function prepareDepartmentDetails(departmentName, totalnaissanceData){
    var dataColor = getRandomColor();
    return {
        label : departmentName,
        data : totalnaissanceData,
        backgroundColor: 'transparent',
        borderColor: dataColor,//"#3e95cd",
        pointBackgroundColor : dataColor,
        fill: false,
        lineTension: 0,
        pointRadius: 5
    }
}

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

  


	
	

	
});

//teste grafico


</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>