<?php
include("config.php");
include("session.php");
?>
<!doctype html>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php


$cia=$_GET['cia'];
$turma=$cia;
$pelotao=$_GET['pelotao'];


function tirarAcentos($string){
    $a= preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U ç Ç"),$string);
	$a=str_replace("ç","c",$a);
    $a=str_replace("Ç","ç",$a);
	return $a;
}

$sql = "select data from fichas_de_aula where dia=".$_GET['dia'];
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $data=$row['data'];

//$sql= "select id from login where nome='".$_SESSION['login_user']."'";
//$result = mysqli_query($db,$sql);
//$//row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$//sql= "select matricula_esfo from login_esfo where id_login=".$row['id'];
//$result = mysqli_query($db,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

//$sql="select * from informacoes1 where matricula_esfo=".$row['matricula_esfo'];
//$result = mysqli_query($db,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

//$turma=substr($row['turma'],0,2);
//$pelotao=$row['pelotao'];
	  
function retira_caracteres($chave)
{
	$chave=str_replace(",","",$chave);
	$chave=str_replace("'","",$chave);
	$chave=str_replace('"',"",$chave);
	$chave=str_replace(";","",$chave);
	
	return $chave;
}
function getWeekday($date) {
    return date('w', strtotime($date)); //5 eh sexta 6 sabado 0 domingo 1 segunda 2 terca 3 quarta 4 quinta
	//terca = subtrai data por ela mesma (em semanas) e soma 2 (se acima de terca), domingo e segunda, subtrai por 5 e soma o proprio valor 
} //echo date('Y-m-d', strtotime($Date. ' + 2 days'));
function getTerca($date){
	$dia_da_semana=" - ".getWeekDay($date)." days";
 
	$data= date('Y-m-d', strtotime($date. ' + 2 days'));
	$terca= date('Y-m-d', strtotime($data. $dia_da_semana));
	//$terca= $data - $dia_da_semana + " 2 days" ;
	if(getWeekDay($date)<2)
	{
		$dia_da_semana=" + ".getWeekDay($date)." days";
		$data= date('Y-m-d', strtotime($date. ' - 5 days'));
		$terca = date('Y-m-d', strtotime($date. $dia_da_semana));
	}
	return $terca;
}

 
?>

<head>
 <link rel="shortcut icon" type="image/png" href="/favicon.png"/>

	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Relatório</title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	
	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<style type="text/css" class="init">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</style>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
	
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" class="init"></script>
  
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
				  
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/AVISOS">QTS</a>				  
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/DOCUMENTOS_IMPORTANTES">Documentação</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/CADASTRO">Cadastro</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/PROVAS">Provas</a>
				</div>
      </li>      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fichas de Aula</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="index.php">Todas as Fichas</a>
          <a class="dropdown-item" href="menu_fichas.php">Atualizar Ficha</a>
          <a class="dropdown-item" href="index.php">Diário de classe</a>
		  <a class="dropdown-item" href="index.php">Gráficos</a>

        </div>		
      </li>
 
      
    </ul>
	<a href="logout.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button" href="logout.php">Sair</button></a>
 
  </div>
</nav> 	    -->
<center><img src="topo3.png"/></center>
<?php
include ("menu.php");
//include("config.php");
$sql = "select data from fichas_de_aula where dia=".$_GET['dia'];
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $data=$row['data'];
?>
<body>

<div class = "container" style="margin-top:10%">

<!-- Top Navigation Menu -->

 <!--<form method="post" id="escala_form">-->
 <div class="form-group">
  <h1>Relatório do dia <?php echo date("d/m/Y");?> do <?php echo $pelotao;?>º pelotão da <?php echo $cia;?> turma do CFO</h1>
  <div id="chartContainer2" style="height:500px;" ></div>
  <BR><BR>
    <div style="margin-top:40%;" class="alert alert-warning" role="alert">
  
  <?php
  $sql="select distinct(disciplina) from fichas_de_aula where cia=".$cia;
  $result=mysqli_query($db,$sql);
  $disciplinas_iniciadas=array();
  $disciplinas_nao_iniciadas=array();
  foreach($result as $row)
  {
	  if(count(explode("- ",$row['disciplina']))>1)
	  {
		  array_push($disciplinas_iniciadas,$row['disciplina']);
	  }
  }
  $sql="select * from materias where turma=".$cia;
  //echo $sql;
  
  $result=mysqli_query($db,$sql);
  foreach($result as $row)
  {
	  //echo $row['disciplina']."<BR>";
	if(count(explode("- ",$row['materia']))>1 && !(in_array($row['materia'],$disciplinas_iniciadas)))
		array_push($disciplinas_nao_iniciadas,($row['materia']));
  }
  //exit();
  ?>
  <?php echo count($disciplinas_nao_iniciadas);?> disciplinas ainda não iniciadas.<BR>
  <?php foreach($disciplinas_nao_iniciadas as $d)
  {
	 echo "<li>".$d."</li>" ;
  }
  ?>
</div>

    <center><h3 >Progressão x META para terminar em 20/12/2020</h3></center>
    
  <canvas id="line-chart" width="800" height="450"></canvas>
  <BR><BR>
  <center><h3>Percentual de horários ocupados pelas disciplinas</h3></center>
  <canvas id="pie-chart" width="800" height="450"></canvas>
  <BR><BR>
  <!--<center><h3>Progressão do curso por disciplina</h3></center>-->
  
  <BR><BR>
  <center><h3>Percentual de Faltas do pelotão </h3></center>
  <BR><BR>
<!--</form>-->
  <!-- <div class="myCalendar" > 
	  </div> -->
<?php
$media_semanal=0;
if($turma==22)
{
	$media_semanal=28;
}
if($turma==23)
{
	$media_semanal=27;
}
if($turma==24)
{
	$media_semanal=28;
}
//echo($turma);
//exit();
?>
<script>
$(document).ready(function() {
//grafico3
 $.getJSON( "getDisciplina.php?cia=<?php echo $cia;?>&pelotao=<?php echo $pelotao;?>", function( data ) {

  numero=[];
  faltas=[];
  tudo=[];
  //console.log(data.data["ocorrencia"]);
  //console.log(data.data["disciplina"]);
  for(i=0;i<data.data.length;i++)
  {
  //numero.push(data.data[i].disciplina);
  //console.log(data.data[i].disciplina);//decodeURIComponent(escape(
  if(data.data[i].disciplina!=null)
  {
  if(data.data[i].disciplina.split("- ").length>1)
  {
	  var total_de_horas=data.data[i].disciplina.split("- ")[1].split("H")[0];
	  var percentual=100*(parseInt(data.data[i].ocorrencia,10)/parseInt(total_de_horas,10)).toFixed(2);
	  tudo.push({y: percentual,label:percentual+'%',indexLabel:data.data[i].disciplina});
  }
  }
  //var percentual = data.data[i].ocorrencia/
  
  }
 
    // });
	//console.log(tudo);

  var options = {
	animationEnabled: true,
	height: (1200/36)*(tudo.length),
	title: {
		text: "Percentual já concluído por disciplina",                
		fontColor: "#212529"
	},	
	axisY: {
		tickThickness: 0,
		lineThickness: 0,
		valueFormatString: " ",
		gridThickness: 0                    
	},
	axisX: {
		tickThickness: 0,
		lineThickness: 0,
		labelFontSize: 18,
		labelFontColor: "#212529"				
	},
	data: [{
		indexLabelFontSize: 12,
		toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		indexLabelFontWeight: 600,
		indexLabelFontFamily: "Verdana",
		//color: "#62C9C3",
		color: "#152238",
		type: "bar", 
  dataPoints: tudo }]
  };
  //console.log(tudo);
  
  $("#chartContainer2").CanvasJSChart(options);
  
  });
//grafico3
//grafico2
$.getJSON( "getOcorrencia.php?pelotao=<?php echo $pelotao; ?>&turma=<?php echo $turma; ?>", function( data ) {
  var ocorrencia = [];
  var disciplina = [];
  var cor=[]
  //console.log(data.data["ocorrencia"]);
  //console.log(data.data["disciplina"]);
  var j=0;
  var lixo=0;
  $.each( data.data, function( key, val ) {
     if((data.data[j]['disciplina'].split('-')).length>1)
	 {
    ocorrencia.push(  data.data[j]['ocorrencia']);
	//disciplina.push(  data.data[j]['disciplina']);
	disciplina.push(decodeURIComponent(escape(data.data[j]['disciplina']))); 
	cor.push('#' + Math.random().toString(16).slice(2, 8).toUpperCase());
		 
	 } 
	 else{
	  if(data.data[j]['disciplina']!='')
	  {
	    console.log(data.data[j]['disciplina']);
        lixo=lixo+parseInt(data.data[j]['ocorrencia'],10);
	    console.log(lixo);
	  }

	 }	  
	  
	  
    //ocorrencia.push(  data.data[j]['ocorrencia']);
	//disciplina.push(  data.data[j]['disciplina']);
	//cor.push('#' + Math.random().toString(16).slice(2, 8).toUpperCase());
	j=j+1;
  });
  ocorrencia.push(lixo);
  console.log(j);
  disciplina.push('disciplinas que não contabilizam para a formação ISCP');
  ocorrencia.shift();
  disciplina.shift();
  var total = 0;
  for (var i = 0; i < ocorrencia.length; i++) {
    total += ocorrencia[i] << 0;
  }
  ocorrencia=jQuery.map( ocorrencia, function(n) {
  return ( 100*(n/total));
  });
		//teste
		
    //alert( 'DataTables has finished its initialisation.' );
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: disciplina,
      datasets: [{
        label: "Percentual de disciplinas",
        backgroundColor: cor,//["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: ocorrencia
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Percentual de disciplinas CFO 23 turma'
      }
    }
});
//teste
});
//grafico2

	
//grafico
  $.getJSON( "getMES.php?pelotao=<?php echo $pelotao;?>&turma=<?php echo $turma;?>", function( data ) {

  saida=[];
  labels2=[];
  labels3=[];
  tudo5=[];
  var somahoras=0;
  var somaocorrencia=0;
  var j=0;
  $.each( data.data, function( key, val ) {
	labels3.push(<?php echo $media_semanal;?>);
    saida.push(data.data[j]["dia"]);
    labels2.push(parseInt(data.data[j]["horas_uteis"]));
	j=j+1;
  });

  //saida=['10/02/2020','17/02/2020','24/02/2020','02/03/2020','09/03/2020','16/03/2020','23/03/2020','30/03/2020','06/04/2020','13/04/2020','20/04/2020','27/04/2020','04/05/2020','11/05/2020','18/05/2020','25/05/2020','01/06/2020','08/06/2020','15/06/2020','22/06/2020','29/06/2020','06/07/2020','13/07/2020','20/07/2020','27/07/2020','03/08/2020','10/08/2020','17/08/2020','24/08/2020','31/08/2020','07/09/2020','14/09/2020','21/09/2020','28/09/2020','05/10/2020','12/10/2020','19/10/2020','26/10/2020','02/11/2020','09/11/2020','16/11/2020','23/11/2020','30/11/2020','07/12/2020','14/12/2020',];
  //labes2=[<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>,<?php echo $media_semanal; ?>];


  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: saida,
    datasets: [{ 
        data: labels2,
        label: "Média Semanal",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: labels3,
        label: "Média recomendada",
        borderColor: "#8e5ea2",
        fill: false
      },// { 
      //  data: [168,170,178,190,203,276,408,547,675,734],
       // label: "Europe",
        //borderColor: "#3cba9f",
        //fill: false
      //}, { 
      //  data: [40,20,10,16,24,38,74,167,508,784],
       // label: "Latin America",
       // borderColor: "#e8c3b9",
       // fill: false
      //}, { 
       // data: [6,3,2,2,7,26,82,172,312,433],
        //label: "North America",
        //borderColor: "#c45850",
        //fill: false
     // }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Média semanal'
    }
  }
});
  //grafico


	
});	
});
</script>
<!--<h3>Turma</h3>
<input type="text" class="form-control" id="turma" name="turma"></input>
<h3>Pelotão</h3>
<input type="text" class="form-control" id="pelotao" name="pelotao"></input>
<button name="pelotao" id="pelotao">Gerar Relatório</button>
-->
<?php 
function get_faltas($antiguidade,$disciplina)
{
	$db = mysqli_connect("localhost","USUARIO_DB","SENHA_DB","DB") ;
    
$faltoso=$antiguidade;
//$faltoso=17;
$sql="select disciplina,count(disciplina) from fichas_de_aula where substring_index(substring_index(faltas,';',1),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',2),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',3),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',4),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',5),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',6),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',7),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',8),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',9),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',10),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',11),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',12),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',13),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',14),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',15),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',16),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',17),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',18),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',19),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',20),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',21),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',22),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',23),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',24),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',25),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',26),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',27),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',28),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',29),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',30),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',31),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',32),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',33),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',34),';',-1)=".$faltoso. " or substring_index(substring_index(faltas,';',35),';',-1)=".$faltoso. " group by disciplina;";	
//echo $sql;

$result=mysqli_query($db,$sql);
$flag=False;
$s="";
foreach($result as $row)
{
	$s=$s.($row['disciplina'])."|".$row['count(disciplina)']."<BENTER>";
}

return $s;
}
//$cia=23;
//$pelotao=2;
$sql="select distinct(disciplina) from fichas_de_aula where cia=".$cia." and pelotao=".$pelotao;
$result=mysqli_query($db,$sql);
//echo $sql;
//$numeros=ceil(mysqli_num_rows($result)/5);
//echo $numeros;
//exit();


$disciplinas=array();

	  foreach($result as $row)
	  {
		  //if(strlen($row['disciplina'])>0)
			if(count(explode("-",$row['disciplina']))>1) 
		  {
			  array_push($disciplinas,($row['disciplina']));
		  }
	  }
$numeros=ceil(count($disciplinas)/5);//ceil(mysqli_num_rows($result)/5);	  
	  $k=0;
$sql="select * from informacoes1 where turma=".$turma." and matricula_esfo like '".$turma."%' and pelotao=".$pelotao;
//echo $sql;
$result=mysqli_query($db,$sql);
$cadetes=array();
$cadetes_numero=array();
$cadetes_falta=array();
foreach($result as $row)
{
	array_push($cadetes,strtoupper($row['nome_de_guerra']));
	$teste=substr($row['matricula_esfo'],2,3);
	if(substr($teste,0,1)=="0")
    {
		$teste=substr($teste,1,2);
	}
	if(substr($teste,0,1)=="0")
    {
		$teste=substr($teste,1,1);
	}	
	array_push($cadetes_numero,$teste);
	//foreach(explode("<BENTER>",get_faltas($teste,"")) as $falta)
	//{
		
		
//	}
	
}


for($i=0;$i<$numeros;$i++)
{
	$k=$k+5;
	$s="";
	$s=$s."<table class='table'>";
	$s=$s."<thead class='thead-dark'>";
	$s=$s."<tr>";
	$s=$s."<th scope='col'>Cadetes</th>";
	 
	  for($j=$k-5;$j<$k;$j++)
	  {
      $s=$s."<th scope='col'>" .$disciplinas[$j] . "</th>";
	  }
    $s=$s."</tr>";
  $s=$s."</thead>";
  $s=$s."<tbody>";
    for($z=0;$z<count($cadetes);$z++)
	{
    $s=$s."<tr>";
      $s=$s."<th scope='row'>". ($cadetes[$z]) . "</th>";
	   for($qq=$k-5;$qq<$k;$qq++)
	   {
	  
	   $s=$s. "<td id='".$cadetes_numero[$z].str_replace(" ","_",tirarAcentos($disciplinas[$qq]))."'>0%</td>";
	   //echo $s;
	   } 
	  
    $s=$s."</tr>";
	//$s=$s."</tbody>";
	//$s=$s."</table>";
	}
  echo $s;
}
 //echo "<div id='fim'></div>";
?>
 
<script>

function retira_acentos(palavra) { 
    com_acento = 'áàãâäéèêëíìîïóòõôöúùûüÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜ'; 
    sem_acento = 'aaaaaeeeeiiiiooooouuuuAAAAAEEEEIIIIOOOOOUUUU'; 
    nova=''; 
    for(i=0;i<palavra.length;i++) { 
        if (com_acento.search(palavra.substr(i,1))>=0) { 
            nova+=sem_acento.substr(com_acento.search(palavra.substr(i,1)),1); 
        } 
        else { 
            nova+=palavra.substr(i,1); 
        } 
    } 
    return nova; 
}
$(document).ready(function() {
	$('.table').find('td').each (function() {
		if($(this).attr("id").length<6)
		{
			$(this).html("");
		}
    });  
});
</script>
<?php echo "<script>"."\n";
echo "$(document).ready(function() {"."\n";
	//$(document).arrive('#fim', function () {
	 foreach($cadetes_numero as $matricula_esfo){
    //$.getJSON("getPelotao.php?turma=23&pelotao=2", function (data) {
	 // for(i=0;i<data.data.length;i++)
	  //{		
      //var antiguidade="";
	  //antiguidade=(data.data[i].matricula_esfo).toString().substring(2,5);
	  
	 // if(antiguidade.substring(0,1)=="0")
	  //{
	//	  antiguidade=antiguidade.substring(1,3);
	 // }
	  //if(antiguidade.substring(0,1)=="0")
	  //{
	//	  antiguidade=antiguidade.substring(1,2);
	 // }
	  
	 // var url="faltas_por_aluno.php?antiguidade="+antiguidade+"&cia=23";
	  //console.log(url);
	  echo "$.getJSON('faltas_por_aluno.php?antiguidade=".$matricula_esfo."&cia=".$cia."', function (data2) {"."\n";
		  //console.log(url);
	  echo "for(j=0;j<data2.data.length;j++)"."\n";
		  echo "{"."\n";
		      echo "var antiguidade=".$matricula_esfo.";"."\n";
			  echo "var disciplina=data2.data[j].disciplina;"."\n";
			  echo "disciplina=retira_acentos(disciplina);"."\n";
			  echo "var s='';"."\n";
			  echo "for(qq=0;qq<disciplina.split(' ').length;qq++)"."\n";
			  echo "{"."\n";
				  echo "s=s+disciplina.split(' ')[qq]+'_';"."\n";
			  echo "}"."\n";
			  echo "s=s.substring(0, s.length - 1);"."\n";
              echo "disciplina=s;"."\n";
			  echo "var faltas=data2.data[j].faltas;"."\n";
			  //echo "var total_da_disciplina="";";
			  echo "if(disciplina.split('-_').length>1)"."\n";
			  //echo "var tamanho=disciplina.split('-_');"."\n";
			  //echo "console.log(tamanho.length);";
			  echo "{var tamanho=(disciplina.split('-_')[1].split('H')[0]);";
			  echo "faltas=(faltas/parseInt(tamanho,10)).toFixed(2);";
			  //echo "$('#'+antiguidade+disciplina).html(data2.data[j].faltas);"."\n";
			  echo "$('#'+antiguidade+disciplina).html(100*faltas+'%');}"."\n";
			  //if(antiguidade=="119')
			 // {
				  //console.log(disciplina+"|"+data2.data[j].faltas);
			  //}
		  echo "}"."\n";
	  echo "}	);"."\n";
	 // echo "}"."\n";
    }
    //echo "});"."\n";
	//});
echo "});"."\n";
echo "</script>"."\n";
?>
</body>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</html>

