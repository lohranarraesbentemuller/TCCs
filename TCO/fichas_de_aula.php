<?php
include("config.php");
include("session.php"); 
?>
<!doctype html>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
//include("config.php");
//include("session.php");
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

if($_SERVER['REQUEST_METHOD']=="POST")
{
 
}
?>

 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Todas as fichas de aula</title>

    <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <!-- datatables -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <!-- datatables -->  
<style>
.col-1{ 
cursor: pointer; 
}


</style>	


	
  </head>

  <body>
  
<?php include("menu.php");?> 	    
<div  class="container">
<h1 style='margin-top:10%;'>Fichas de aula</h1>

<canvas id="pie-chart" width="800" height="450"></canvas>

<?php 
$sql= "select id from login where nome='".$_SESSION['login_user']."'";
$result = mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql= "select matricula_esfo from login_esfo where id_login=".$row['id'];
$result = mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="select * from informacoes1 where matricula_esfo=".$row['matricula_esfo'];
$result = mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$turma=substr($row['turma'],0,2);
$pelotao=$row['pelotao'];


?>


				<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
<thead>
   <tr>
                       <!-- <th>ID</th>-->
						<th>Dia</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Disciplina</th>
                        <th>Faltas</th>
                        <th>Instrutor</th>
                        <th>Assunto</th>
                        <th>Xerife</th>
						<th>Pelotao</th>
						<th>Cia</th>

   </tr>
</thead> 
</table>

	
</div> 
<script>
$(document).ready(function() {
	
	var table = $('#example').DataTable( {
	 responsive: true,
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
         // { data: "id"},
		  { data: "dia"},
	  { data: "data"},
	  { data: "hora"},
          { data: "disciplina"},
          { data: "faltas"},
          { data: "professor"},
          { data: "assunto"},
          { data: "xerife"},
		  { data: "pelotao"},
		  { data: "cia"} 
	],
        "ajax": <?php echo '"getFichas.php?turma='.$turma.'&pelotao='.$pelotao.'"';?>,
        "processing" : true,
        "serverSide": true,

        "columnDefs": [
           // {
            //    "render": function ( data, type, row ) { 
            //        return " <a class =\"fancy\" data-fancybox-type=\"iframe\" href=\"entrada_usuario?id=" + row['id'] + " \">"  + data  + "</a>";//data +' ('+ row[3]+')';
            //    },
             //   "targets": 1
            //},
			//{ "visible": false,  "targets": [ 0 ] },
			{ "visible": false,  "targets": [ 8 ] },
			{ "visible": false,  "targets": [ 9 ] }
        ],

	 
	"initComplete": function(settings, json) {
		//teste
$.getJSON( "getOcorrencia.php?pelotao=<?php echo $pelotao; ?>&turma=<?php echo $turma; ?>", function( data ) {
  var ocorrencia = [];
  var disciplina = [];
  var cor=[]
  //console.log(data.data["ocorrencia"]);
  //console.log(data.data["disciplina"]);
  var j=0;
  var lixo=0;
  $.each( data.data, function( key, val ) {
	  //console.log(data.data[j]['disciplina']);
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
//teste
	}		
	} );
	//new $.fn.dataTable.FixedHeader( table );
	 //filtro por coluna
	$('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Procurar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
//    var table = $('#example').DataTable( {
 //       orderCellsTop: true,
  //      fixedHeader: true
   // } );
	 //filtro por coluna




        
} );
//} );

	</script>
 </div>
 <script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
/*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */

.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  line-height: 1.42857143;
  text-decoration: none;
  color: #337ab7;
  background-color: #fff;
  border: 1px solid #ddd;
  margin-left: -1px;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-bottom-left-radius: 4px;
  border-top-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-bottom-right-radius: 4px;
  border-top-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eeeeee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  background-color: #337ab7;
  border-color: #337ab7;
  cursor: default;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777777;
  background-color: #fff;
  border-color: #ddd;
  cursor: not-allowed;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-bottom-left-radius: 6px;
  border-top-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-bottom-right-radius: 6px;
  border-top-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-bottom-left-radius: 3px;
  border-top-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-bottom-right-radius: 3px;
  border-top-right-radius: 3px;
}
.pager {
  padding-left: 0;
  margin: 20px 0;
  list-style: none;
  text-align: center;
}
.pager li {
  display: inline;
}
.pager li > a,
.pager li > span {
  display: inline-block;
  padding: 5px 14px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 15px;
}
.pager li > a:hover,
.pager li > a:focus {
  text-decoration: none;
  background-color: #eeeeee;
}
.pager .next > a,
.pager .next > span {
  float: right;
}
.pager .previous > a,
.pager .previous > span {
  float: left;
}
.pager .disabled > a,
.pager .disabled > a:hover,
.pager .disabled > a:focus,
.pager .disabled > span {
  color: #777777;
  background-color: #fff;
  cursor: not-allowed;
}
.label {
  display: inline;
  padding: .2em .6em .3em;
  font-size: 75%;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: .25em;
}
a.label:hover,
a.label:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
.label:empty {
  display: none;
}
.btn .label {
  position: relative;
  top: -1px;
}
.label-default {
  background-color: #777777;
}
.label-default[href]:hover,
.label-default[href]:focus {
  background-color: #5e5e5e;
}
.label-primary {
  background-color: #337ab7;
}
.label-primary[href]:hover,
.label-primary[href]:focus {
  background-color: #286090;
}
.label-success {
  background-color: #5cb85c;
}
.label-success[href]:hover,
.label-success[href]:focus {
  background-color: #449d44;
}
.label-info {
  background-color: #5bc0de;
}
.label-info[href]:hover,
.label-info[href]:focus {
  background-color: #31b0d5;
}
.label-warning {
  background-color: #f0ad4e;
}
.label-warning[href]:hover,
.label-warning[href]:focus {
  background-color: #ec971f;
}
.label-danger {
  background-color: #d9534f;
}
.label-danger[href]:hover,
.label-danger[href]:focus {
  background-color: #c9302c;
}
.badge {
  display: inline-block;
  min-width: 10px;
  padding: 3px 7px;
  font-size: 12px;
  font-weight: bold;
  color: #fff;
  line-height: 1;
  vertical-align: middle;
  white-space: nowrap;
  text-align: center;
  background-color: #777777;
  border-radius: 10px;
}
.badge:empty {
  display: none;
}
.btn .badge {
  position: relative;
  top: -1px;
}
.btn-xs .badge,
.btn-group-xs > .btn .badge {
  top: 0;
  padding: 1px 5px;
}
a.badge:hover,
a.badge:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {
  color: #337ab7;
  background-color: #fff;
}
.list-group-item > .badge {
  float: right;
}
.list-group-item > .badge + .badge {
  margin-right: 5px;
}
.nav-pills > li > a > .badge {
  margin-left: 3px;
}


</style>
</html>