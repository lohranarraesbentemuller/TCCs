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
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	
 
 <style>
 
 </style>
  
<!--datatables -->	
<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/datatables.min.js"></script>
			  <script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
			  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
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
	 <thead class="filters">
	 <th id="th1" class="th_example">ID</th>
	 <th  id="th2" class="th_example">AUTOR</th>
	 <th  id="th3" class="th_example">OFICIAL</th>
	 <th  id="th4" class="th_example">PRIMEIRO TÓPICO</th>
	 <th  id="th5" class="th_example">DATA</th>
	 <th  id="th6" class="th_example">PASSAGEM</th>
	 <th  id="th7" class="th_example">MATERIAL INÍCIO</th>
	 <th id="th8" class="th_example">ESCALA</th>
	 <th id="th9" class="th_example">FALTAS</th>
	 <th id="th10" class="th_example">ATRASOS</th>
	 <th id="th11" class="th_example">TROCAS</th>
	 <th id="th12" class="th_example">OUTRAS ALTERAÇÕES SERVIÇO</th>
	 <th id="th13" class="th_example">PRESOS</th>
	 <th id="th14" class="th_example">DETIDOS</th>
	 <th id="th15" class="th_example">AUSENTES</th>
	 <th id="th16" class="th_example">DESERTORES</th>
	 <th id="th17" class="th_example">VIATURAS QUE PERNOITARAM NO QUARTEL</th>
	 <th id="th18" class="th_example">INSTALAÇÕES</th>
	 <th id="th19" class="th_example">EQUIPAMENTOS</th>
	 <th id="th20" class="th_example">MEDIÇÃO INICIAL DO HIDRÔMETRO</th>
	 <th id="th21" class="th_example">MEDIÇÃO FINAL DO HIDRÔMETRO</th>
	 <th id="th22" class="th_example">DIFERENÇA</th>
	 <th id="th23" class="th_example">OUTROS - MATERIAL CARGA</th>
	 <th id="th24" class="th_example">RESERVA DE ARMAMENTO</th>
	 <!--<th>DEMAIS ALTERAÇÕES</th>-->
	 <th id="th25" class="th_example">REMESSA DE DOCUMENTOS</th>
	 <!--<th>PASSAGEM DE SERVIÇO</th>
	 <th>MATERIAIS PASSAGEM DE SERVIÇO</th>
 
	 <th>MATRÍCULA DO CADETE DE DIA</th> -->
	 </thead>
	 </table>

 
</div>
<script> 
document.getHTML= function(who, deep){
    if(!who || !who.tagName) return '';
    var txt, ax, el= document.createElement("div");
    el.appendChild(who.cloneNode(false));
    txt= el.innerHTML;
    if(deep){
        ax= txt.indexOf('>')+1;
        txt= txt.substring(0, ax)+who.innerHTML+ txt.substring(ax);
    }
    el= null;
    return txt;
}
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
	
	$('th').dblclick(function() {
/*		var th=$(this).css("width");
    var index = $(this).index()+1;
    //$('table td:nth-child(' + index + '),table th:nth-child(' + index + ')').hide();
	$('table td:nth-child(' + index + '),table th:nth-child(' + index + ')').css("display","none");
	//$('.container').css("width",$('.container').css("width")-th);
	$('td').css("max-width","150px");
	$('th').css("max-width","150px");
	 $('td').css("overflow","hidden");
	 $('th').css("overflow","hidden");
	 $('td').css("width","100%");
	 $('th').css("width","100%");	 */
    });

function explode(str, maxLength) {
    var buff = "";
    var numOfLines = Math.floor(str.length/maxLength);
    for(var i = 0; i<numOfLines+1; i++) {
        buff += str.substr(i*maxLength, maxLength); if(i !== numOfLines) { buff += "\n"; }
    }
    return buff;
}
var table = $('#example').DataTable( {
        //"processing": true,
       // "serverSide": true,
	     "search": {
    "regex": true
  },
	 responsive: false,
         dom: 'Blfrtip',
		  stateSave: true,
         buttons: ['excel','colvis'],
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
	  //AQUI
	{data:"id"}, //0 
    //array( 'db' => 'data','dt'=>'data'), 
    {data:"autor"},//1
    {data:"oficial"},//2
    {data:"primeiro_topico"},//3
	{data:"texto_inicial"},//4
	{data:"texto_inicial2"},//5
	{data:"materiais"},//6
	{data:"servico"},//6
	//topico3
	{data:"faltas"},//7
	{data:"atrasos"},//8
	//topico4
	{data:"trocas"},//9
	{data:"outros_troca"},//10
	//topico5
	{data:"presos"},//11
	{data:"detidos"},//12
	{data:"ausentes"},//13
	{data:"desertores"},//14
	//topico6
	{data:"viaturas_pernoite"},//15
	//topico7
	{data:"instalacoes"},//16
	{data:"equipamentos"},//17
	{data:"inicial_hidrometro"},//18
	{data:"final_hidrometro"},//19
	{data:"diferenca_hidrometro"},//20
	{data:"outros_material_carga"},//21
	//topico 8
	{data:"reserva_armamento"},//23
	//topico 9	
	//{data:"demais"},//23
	//topico 10	
	{data:"remessa"},//24
	//topico 11
	//{data:"passagem"},//25
	//{data:"materiais_passagem"},//26
	//{data:"nome_completo_form"},//27
//	{data:"matricula_form"}//28
	  
	  
	 //AQUI 
	  
	  
	],
	
	
    "ajax": 'getPesquisa.php',
	

	
	
		 "columnDefs": [
		 
		 {
				
                "render": function (data, type, row ) { 
		 
					return '<button type="button" class="btn btn-warning" class="margin-right:1%;" onclick=editar('+row['id']+')><span class="fa fa-edit"></span></button>' ;
                },
                "targets": 0
            },
		             {
				
                "render": function (data, type, row ) { 
		 
				id=row['texto_inicial2'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['texto_inicial2'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['texto_inicial2'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['texto_inicial2'].substring((s.length-q),row['texto_inicial2'].length) ;
                },
                "targets": 5
            },
			
			
		    {
				
                "render": function (data, type, row ) { 
		 
				id=row['faltas'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['faltas'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['faltas'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['faltas'].substring((s.length-q),row['faltas'].length) ;
                },
                "targets": 8
            },		{	
                "render": function (data, type, row ) { 
		 
				id=row['atrasos'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['atrasos'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['atrasos'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['atrasos'].substring((s.length-q),row['atrasos'].length) ;
                },
                "targets": 9
            },{
                "render": function (data, type, row ) { 
		 
				id=row['faltas'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['trocas'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['trocas'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['trocas'].substring((s.length-q),row['trocas'].length) ;
                },
                "targets": 10
            },{
                "render": function (data, type, row ) { 
		 
				id=row['outros_troca'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['outros_troca'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['outros_troca'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['outros_troca'].substring((s.length-q),row['outros_troca'].length) ;
                },
                "targets": 11
            },{
                "render": function (data, type, row ) { 
		 
				id=row['presos'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['presos'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['presos'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['presos'].substring((s.length-q),row['presos'].length) ;
                },
                "targets": 12
            },{
                "render": function (data, type, row ) { 
		 
				id=row['detidos'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['detidos'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['detidos'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['detidos'].substring((s.length-q),row['detidos'].length) ;
                },
                "targets": 13
            },{
                "render": function (data, type, row ) { 
		 
				id=row['ausentes'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['ausentes'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['ausentes'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['ausentes'].substring((s.length-q),row['ausentes'].length) ;
                },
                "targets": 14
            },{
                "render": function (data, type, row ) { 
		 
				id=row['desertores'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['desertores'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['desertores'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['desertores'].substring((s.length-q),row['desertores'].length) ;
                },
                "targets": 15
            },	{
                "render": function (data, type, row ) { 
		 
				id=row['ausentes'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['ausentes'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['ausentes'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['ausentes'].substring((s.length-q),row['ausentes'].length) ;
                },
                "targets": 14
            },{
                "render": function (data, type, row ) { 
		 
				id=row['instalacoes'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['instalacoes'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['instalacoes'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['instalacoes'].substring((s.length-q),row['instalacoes'].length) ;
                },
                "targets": 17
            }
			
			,{
                "render": function (data, type, row ) { 
		 
				id=row['equipamentos'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['equipamentos'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['equipamentos'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['equipamentos'].substring((s.length-q),row['equipamentos'].length) ;
                },
                "targets": 18
            },	{
                "render": function (data, type, row ) { 
		 
				id=row['["outros_material_carga"]; '];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['outros_material_carga'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['outros_material_carga'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['outros_material_carga'].substring((s.length-q),row['outros_material_carga'].length) ;
                },
                "targets": 22
            },{
                "render": function (data, type, row ) { 
		 
				id=row['reserva_armamento'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['reserva_armamento'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['reserva_armamento'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['reserva_armamento'].substring((s.length-q),row['reserva_armamento'].length) ;
                },
                "targets": 23
            }	,	{
                "render": function (data, type, row ) { 
		 
				id=row['remessa'];
				var x=0;
				var s="";
				var q=0;
                    for (i = 0; i < row['remessa'].length; i++) 
					{
					if(x!=0)
					{
					  if(x%45==0)
				   	  {
					   s=s+row['remessa'].substring(x-45,x).replace("&Ccedil;","ç")+"<br>";	
					   	   q=q+4;
					  }
					}
					x=x+1	
					}
                   // return s.replace("&Ccedil;","ç");
					return s+row['remessa'].substring((s.length-q),row['remessa'].length) ;
                },
                "targets": 24
            }		
			], 
	
		"initComplete": function(settings, json) {
		//$('#example_filter').css('margin-left','78%');
		//$('input[tabindex="0"]').parent().css('display','none'); 
		//$('td[html="controle"]').parent().css('display','none');
	//	$('th').css('background-color','#2f4050');
	//	$('th').css('font-size','10px');
	  //  $('th').css('max-width','200px');
		//$('td').css('max-width','200px');
	//	$('th').css('color','white');
	//	$('td').css("white-space", "normal");

		
    $('a').each(function(){
		//alert("aqui");
		  var myClass = $(this).attr("class");
		  if(myClass=="btn btn-default buttons-excel buttons-html5")
		  {
	       $(this).attr("id","excel");		  
		  }
		  if(myClass=="btn btn-default buttons-collection buttons-colvis" )
		  {
			$(this).attr("id","colvis"); 
   	   
	        $(this).children().each(function(){
	           $(this).html("Ocultar colunas");	
			   
	         });

			
	      }
		  if(myClass=="btn btn-default buttons-excel buttons-html5" || myClass=="btn btn-default buttons-collection buttons-colvis" )
		  {
			  //teste css
    $(this).css("background-color"," #dadada");
    $(this).css("background"," -webkit-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $(this).css("background"," -moz-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $(this).css("background"," -ms-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $(this).css("background"," -o-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $(this).css("background"," linear-gradient(to bottom, #f0f0f0 0%, #dadada 100%)");

    $(this).css("box-shadow"," inset 1px 1px 3px #666");
 
    $(this).css("background-color"," rgba(0, 0, 0, 0.1)");
    $(this).css("background"," -webkit-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -moz-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -ms-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -o-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," linear-gradient(to bottom, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");

    $(this).css("box-shadow"," inset 1px 1px 3px #999");
 
    $(this).css("position"," relative");
    $(this).css("left"," 0");
    $(this).css("right"," 0");
    $(this).css("width"," 100%");
    $(this).css("display"," block");
    $(this).css("float"," none");
    $(this).css("margin-bottom"," 4px");
    $(this).css("margin-right"," 0");
 
    $(this).css("border-radius"," 0");
 
    $(this).css("-webkit-column-break-inside"," avoid");
    $(this).css("break-inside"," avoid");
 
    $(this).css("position"," relative");
    $(this).css("display"," inline-block");
    $(this).css("box-sizing"," border-box");
    $(this).css("margin-right"," .333em");
    $(this).css("margin-bottom"," .333em");
    $(this).css("padding"," .5em 1em");
    $(this).css("border"," 1px solid rgba(0, 0, 0, 0.3)");
    $(this).css("border-radius"," 2px");
    $(this).css("cursor"," pointer");
    $(this).css("font-size"," .88em");
    $(this).css("line-height"," 1.6em");
    $(this).css("color"," black");
    $(this).css("white-space"," nowrap");
    $(this).css("overflow"," hidden");
    $(this).css("background-color"," rgba(0, 0, 0, 0.1)");
    $(this).css("background"," -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("background"," linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $(this).css("-webkit-user-select"," none");
    $(this).css("-moz-user-select"," none");
    $(this).css("-ms-user-select"," none");
    $(this).css("user-select"," none");
    $(this).css("text-decoration"," none");
    $(this).css("outline"," none");
    //$(this).css("text-overflow"," ellipsis");
	$(this).css("width","130px");

			  //teste css
			   
			  //teste css2
			  
		  }
        //  alert(myClass);
	});
      
        
		 
		var clicado=-1;	
		
    $('#colvis').click(function(){
	$('.buttons-columnVisibility').css("background-color"," #dadada");
    $('.buttons-columnVisibility').css("background"," -webkit-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $('.buttons-columnVisibility').css("background"," -moz-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $('.buttons-columnVisibility').css("background"," -ms-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $('.buttons-columnVisibility').css("background"," -o-linear-gradient(top, #f0f0f0 0%, #dadada 100%)");
    $('.buttons-columnVisibility').css("background"," linear-gradient(to bottom, #f0f0f0 0%, #dadada 100%)");

    $('.buttons-columnVisibility').css("box-shadow"," inset 1px 1px 3px #666");
 
    $('.buttons-columnVisibility').css("background-color"," rgba(0, 0, 0, 0.1)");
    $('.buttons-columnVisibility').css("background"," -webkit-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -moz-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -ms-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -o-linear-gradient(top, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," linear-gradient(to bottom, rgba(179, 179, 179, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");

    $('.buttons-columnVisibility').css("box-shadow"," inset 1px 1px 3px #999");
 
    $('.buttons-columnVisibility').css("position"," relative");
    $('.buttons-columnVisibility').css("left"," 0");
    $('.buttons-columnVisibility').css("right"," 0");
    $('.buttons-columnVisibility').css("width"," 100%");
    $('.buttons-columnVisibility').css("display"," block");
    $('.buttons-columnVisibility').css("float"," none");
    $('.buttons-columnVisibility').css("margin-bottom"," 4px");
    $('.buttons-columnVisibility').css("margin-right"," 0");
 
    $('.buttons-columnVisibility').css("border-radius"," 0");
 
    $('.buttons-columnVisibility').css("-webkit-column-break-inside"," avoid");
    $('.buttons-columnVisibility').css("break-inside"," avoid");
 
    $('.buttons-columnVisibility').css("position"," relative");
    $('.buttons-columnVisibility').css("display"," inline-block");
    $('.buttons-columnVisibility').css("box-sizing"," border-box");
    $('.buttons-columnVisibility').css("margin-right"," .333em");
    $('.buttons-columnVisibility').css("margin-bottom"," .333em");
    $('.buttons-columnVisibility').css("padding"," .5em 1em");
    $('.buttons-columnVisibility').css("border"," 1px solid rgba(0, 0, 0, 0.3)");
    $('.buttons-columnVisibility').css("border-radius"," 2px");
    $('.buttons-columnVisibility').css("cursor"," pointer");
    $('.buttons-columnVisibility').css("font-size"," .88em");
    $('.buttons-columnVisibility').css("line-height"," 1.6em");
    $('.buttons-columnVisibility').css("color"," black");
    $('.buttons-columnVisibility').css("white-space"," nowrap");
    $('.buttons-columnVisibility').css("overflow"," hidden");
    $('.buttons-columnVisibility').css("background-color"," rgba(0, 0, 0, 0.1)");
    $('.buttons-columnVisibility').css("background"," -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("background"," linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)");
    $('.buttons-columnVisibility').css("-webkit-user-select"," none");
    $('.buttons-columnVisibility').css("-moz-user-select"," none");
    $('.buttons-columnVisibility').css("-ms-user-select"," none");
    $('.buttons-columnVisibility').css("user-select"," none");
    $('.buttons-columnVisibility').css("text-decoration"," none");
    $('.buttons-columnVisibility').css("outline"," none");
    $('.buttons-columnVisibility').css("text-overflow"," ellipsis");
	$('.buttons-columnVisibility').css("width","130px");
	var q=0;
	$('.buttons-columnVisibility').each(function(){
		  $(this).attr("id","colvis_"+q);
	});
	 
	$('.buttons-columnVisibility').click(function(){
		if (clicado==-1)
		{
			 $(this).css("background-color"," rgba(128, 128, 128, 1.0)");
			 $(this).css("color","#000000");
		}
		else
		{
			 $(this).css("background-color"," rgba(0, 0, 0, 0.1)");
		}
		clicado=clicado*-1;
	});		
	});
	
	
	} 
});
    
    
	var vezes=1;
	$('#example tbody').on('click', 'tr', function () {
	vezes=vezes+1	
		//experimento
        var td = $(this).closest('td');
		//td.preppend("<thead><th>1</th><th>2</th></thead>");
		td.attr("id","teste"+vezes);
		var ancestor1 = document.getElementById('teste'+vezes);
		//alert(ancestor1.getElementsByTagName('table').length);
		//if (ancestor1 != null && ancestor1.value == '') {
		 try{
        descendents1 = ancestor1.getElementsByTagName('table');
		 }
		catch{return;}
	 
		//if (descendents1 != null && descendents1.value == '') {

		//ctrl+c ctrl+v
			var i, e, d;
    for (i = 0; i < descendents1.length; ++i) {
    e = descendents1[i];
	e.setAttribute("id","example"+vezes);
 
 
    
    var table = document.getElementById("example"+vezes);
	var s="";
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	   //alert(col.toString());
	   //console.log(col);
	   col=document.getHTML(col, true) ;
	   try{
	   s=s+"<th>"+col.toString().split("<td>")[1].split("</td>")[0]+"</th>";
	   }
	   catch{
		   return;
	   }
     //iterate through columns
	 
     //columns would be accessed using the "col" variable assigned in the for loop
     }
     break;	 
    }
     try{
    s="<thead>"+s+"</thead>";
    
	$('#example'+vezes).prepend(s);
	if(j>=9)
	{
	$('#example'+vezes+' tr:last').attr('id','last');
	$('#last').remove();
	}
	$('#example'+vezes).DataTable( {
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
	 }); }
	 catch{return;}
 
    }
		//}} //fechamento do existe getelemnet
        //experimento
	});
		//colvis
	  $('#exampleCounterparty .filters td').each(function() {
        //alert($(this).index());
        var count = $(this).index();
        var flag = table.column(count).visible();
 
        if (flag && $(this).index() != 0) {
            //var title = $('#tblCounterparty thead td').eq($(this).index()).text();
            $(this).html('<input type="text" />');
        };
 
        if (flag == false) {
            $(this).remove();
        }
    });
 
    //// Apply the search
    table.columns().eq(0).each(function(colIdx) {
        //alert(colIdx);
        if (colIdx != 0 & colIdx < 10) {
 
            $('input', $('.filters td')[colIdx]).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });
 
        };
	});
	//colvis
	//dt-button buttons-columnVisibility
 	$('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
		//if(title=="Data" || title=="Horario" || title=="Escala" || title=="Cor")
		//{
        $(this).html( '<input type="text" placeholder="Procurar" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
				if(this.value.startsWith("#"))
				{
				var a=this.value;
				//alert(a);
				//alert('^(?:(?!'+a.replace('#','')+').)*$');
                //table
                    //.column(i)
                    //.search( '^(?:(?!'+a.replace('#','')+').)*$' )
                    //.draw();

                table.column(i).search('^(?:(?!'+a.replace('#','')+').)*$',true,false).draw();					
				}
				else{
                table
                    .column(i)
                    .search( this.value )
                    .draw();
				}
            }
        } );
	    //}
		//else
		//{
		//	$(this).html('');
		//}
    } ); 
	
	$('a').click(function(){
		//$('.filters').each(function() {
       // alert($(this).parent().attr("class"));
        //var count = $(this).index();
        //var flag = table.column(count).visible();
 
        //if (flag && $(this).index() != 0) {
            //var title = $('#tblCounterparty thead td').eq($(this).index()).text();
          //  $(this).html('<input type="text" />');
       // };
 
        //if (flag == false) {
         //   $(this).remove();
       // }
      // });
	});
});
</script>

<footer class="container">
  <!--<p>&copy; APMB 2020-{{ site.time | date: "%Y" }}</p>-->
</footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
