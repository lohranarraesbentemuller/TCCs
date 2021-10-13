<?php
include("config.php");
include("session.php");
?>
ar---
layout: examples
title: Jumbotron Template
extra_css: "jumbotron.css"
---

<?php


$sql="select max(id) as id from livro";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$maior_id=intval($row['id'],10)+1;

?>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
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
<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/datatables.min.js"></script>
			  <script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
include("config.php");
include("session.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	if($_POST['importancia']=="Aviso")
		$importancia=1;
	if($_POST['importancia']=="Relevante")
		$importancia=2;
	if($_POST['importancia']=="Muito Relevante")
		$importancia=3;
	if($_POST['importancia']=="Urgente")
		$importancia=4;
	if($_POST['importancia']=="Extremamente Urgente")	
		$importancia=5;
	//if($_POST['turma']=="Todas")
		
	$sql="insert into avisos (titulo,recado,importancia,data,turma,criador) values ('".$_POST['titulo']."','".$_POST['conteudo']."',".$importancia.",'".date("Y-m-d")."','".$_POST['turma']."','".$_SESSION['login_user']."')";
 
	$result=mysqli_query($db,$sql);


}

?>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<?php echo include("menu.php");?>
<!--<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Avisos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu<span class="sr-only">(current)</span></a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
			      <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/ESCALA/ver_escala.php">Escalas</a>	
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">Celotex Virtual</a>	
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">Fichas de aula</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">QTS</a>				  
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">Documentação</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">Fichas de aula</a>
				</div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Celotex Virtual</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="index.php">Ver avisos</a>
          <a class="dropdown-item" href="criar_recado.php">Cadastrar novo aviso</a>
          <a class="dropdown-item" href="gerenciar_avisos.php">Gerenciar Avisos</a>
        </div>		
      </li>
 
      
    </ul>
	<button class="btn btn-outline-success my-2 my-sm-0" type="button" href="logout.php">Sair</button>
 
  </div>
</nav>-->


<script src="../ckeditor/ckeditor.js"></script>
  <!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container" style="margin-top:10%;">
    <table id="example" class="table table-striped table-bordered nowrap" style="margin-left:2%;" >
	 <thead>
	 <th>ID</th>
	 <th>data</th>
	 <th>Autor</th>
	 <th>Oficial</th>
	 <th>Primeiro tópico do livro</th>
	 <th>Status</th>
	 </thead>
	 </table>

 
</div>
<script> 
function editar(id)
{
	window.location.href ="novo_livro.php?id="+id;
}
function adicionar(id)
{
	   
	 
	var valor='';
	valor+='id='+id;
	
	valor+='&flag=salvar';
	valor+='&autor='+$('#autor').val();
	  $.ajax({ 
 type:"POST", 
 url: "Salavar_livro.php", 
 data:valor,
  success: function(data){
    //alert(valor);
	//alert(data);
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
function remover(id)
{
	   
	 
	var valor='';
	valor+='id='+id;
	
	valor+='&flag=remover';
	  $.ajax({ 
 type:"POST", 
 url: "Salavar_livro.php", 
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
	  { data: "data"}, //1
	  { data: "autor"}, //1
	  { data: "oficial"}, //1
	  { data: "primeiro_topico"}, //2
      { data: "status"}
	  
	],
	
	
    "ajax": 'getLivro.php',
	
		 "columnDefs": [
		             {
				
                "render": function (data, type, row ) { 
		 
				 
			        	 
                   // return s.replace("&Ccedil;","ç");
					return '<button type="button" class="btn btn-warning" class="margin-right:1%;" onclick=editar('+row['id']+')><span class="fa fa-edit"></span></button><button type="button" class="btn btn-danger" onclick=remover('+row['id']+')><span id="r_'+row['id']+'_'+row['status']+'" class="fa fa-trash"></span></button>' ;
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

		$(this).append('<td colspan="4"></td><td><center><button id="plus" type="button" style="border:0px; background-color:transparent;"  ><img src="plus.png" style="width:40px; height:40px;"></image></button></center></td>');
		
		$( "#plus" ).click(function() {
        $("#example").append('<tr><td colspan="4"><input id="autor" name="autor" type="text" class="form-control" placeholder="nome completo" style="width:100%;" autocomplete="off"></input></td><td><button onclick="adicionar('+<?php echo $maior_id;?>+')" id="enviar" class="btn btn-info">Novo Livro</button></td></tr>');
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
 
$(document).arrive('.fa-trash', {
   onceOnly: false
}, function () {
  //$('#example_wrapper').css("overflow-y","scroll");
 // alert($(this).attr("id").split("_")[2]);
  if($(this).attr("id").split("_")[2]=="homologado" && "Usuário"=="<?php echo $_SESSION['papel'];?>" )
  {
	  $(this).css("display","none");
	  $(this).parent().css("display","none");
  }
}); 
 
 
});
</script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<footer class="container">
  <!--<p>&copy; APMB 2020-{{ site.time | date: "%Y" }}</p>-->
</footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
