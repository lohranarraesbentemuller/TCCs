<?php 
include('config.php');
include('session.php');



function substituto($cadete,$data,$cor){
	

	//$db = mysqli_connect('localhost','root','B1scoitinho','CFO') ;
    $mysqli = new mysqli("localhost", "USUARIO_DB", "SENHA_DB", "DB");

/* check connection */
   if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
   }
	//$result=mysqli_query($db,$sql);
 
	//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//$escala=$row;
 
	$sql="select antiguidade from cadetes_servico where id=".$cadete;
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$antiguidade=$row['antiguidade'];
	
	$escala=substr($antiguidade,0,2);
	$turma=$escala;
	$data1=$data;
	$sql="SELECT DATE_ADD('".$data."', INTERVAL 1 DAY)";
	
	$result=mysqli_query($mysqli,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//print_r($result);echo "<BR>";
	$data2=array_shift($row);
	//echo $turma;echo "<BR>";
	//echo $data1;echo "<BR>";
	//echo $data2;echo "<BR>";
	//echo $cor;echo "<BR>";
	//exit();
	//teste novo sistema
	$query="update hoje set inicio='".$data1." 07:00:00';";
$query.="update hoje set fim='".$data2." 07:00:00';";
$query.="set @hoje_inicio:=(select inicio from hoje);";
$query.="set @hoje_fim:=(select fim from hoje);";

$query.="delete from escala_externo_horario where 1=1;";
$query.="insert into escala_externo_horario select *,cast(concat(data,' ','07:00:00') as datetime) as inicio,cast( concat(data,' ','19:00:00') as datetime) as fim from escala_externo where data>date_add(@hoje_inicio,interval -30 day);";
$query.="insert into escala_externo_horario select *,cast(concat(data,' ','19:00:00') as datetime) as inicio,cast( concat(date_add(data,interval 1 day),' ','07:00:00') as datetime) as fim from escala_externo where data>date_add(@hoje_inicio,interval -30 day) and horario=4;delete from escala_horario where 1=1;insert into escala_horario select *,cast(concat(data,' ','07:00:00') as datetime) as inicio,cast( concat(date_add(data,interval 1 day),' ','07:00:00') as datetime) as fim from escala where data>date_add(@hoje_inicio,interval -30 day);";
$query.="delete from substitutos where 1=1;";
$query.="insert into substitutos select id_cadete,inicio,fim,escala from escala_externo_horario;insert into substitutos select id_cadete,inicio,fim,escala from escala_horario;";
$query.="delete from resultado123 where 1=1;";

$query2.="insert into resultado123 ";
$query2.="(select q1.* from   (select t1.* from (  SELECT *,TIMESTAMPDIFF(hour, fim,@hoje_inicio) as diferenca  from substitutos   where inicio<=@hoje_inicio ) ";
   $query2.="t1  left join (  SELECT *,TIMESTAMPDIFF(hour, fim,@hoje_inicio) as diferenca   from substitutos ";
       $query2.="where inicio<=@hoje_inicio) t2  on t1.id_cadete=t2.id_cadete and t1.diferenca>t2.diferenca ";
	   $query2.="where t2.diferenca is null and t1.escala=".$turma." order by t1.diferenca) q1  left join ";
	   $query2.="(select t1.* from (  SELECT *,TIMESTAMPDIFF(hour,@hoje_fim,inicio) as diferenca   from substitutos ";
	   $query2.="where inicio>=@hoje_fim) t1  left join (  SELECT *,TIMESTAMPDIFF(hour,@hoje_fim,inicio) as diferenca   from substitutos   where inicio>=@hoje_fim) t2 ";
	   $query2.="on t1.id_cadete=t2.id_cadete and t1.diferenca>t2.diferenca  where t2.diferenca is null and t1.escala=".$turma." order by t1.diferenca) q2 ";
	   $query2.="on q1.id_cadete=q2.id_cadete and q1.diferenca>q2.diferenca  where q2.diferenca is null and q1.diferenca is not null and q1.diferenca>=24 ";
	   $query2.="order by q1.diferenca desc);";
	   $query2.="drop table resultado321;";

$query3.="create table resultado321 select q1.id_cadete,q2.cadetes,q1.inicio,q1.fim,q1.diferenca from ";
	   $query3.="(select t1.*,t2.motivo from (select * from resultado123) t1 left join (select *, timestampdiff(hour,@hoje_inicio,cast(concat(data_inicio,' ','07:00:00') ";
	   $query3.="as datetime)) as diferenca , timestampdiff(hour,@hoje_inicio,cast(concat(data_fim,' ','07:00:00') as datetime)) as diferenca2 from baixados ";
	   $query3.="where  timestampdiff(hour,@hoje_inicio,cast(concat(data_inicio,' ','07:00:00') as datetime))<0 and  timestampdiff(hour,@hoje_inicio,cast(concat(data_fim,' ','07:00:00') as datetime))>0) ";
	   $query3.="t2 on t1.id_cadete=t2.id_cadete where motivo is null) q1 inner join cadetes_servico_externo q2 on q1.id_cadete=q2.id ;";

//$query3.="select t1.*,t2.id_cadete from (select * from resultado321) t1 left join (select * from escala_externo where data=substring_index(@hoje_inicio,' ',1)) t2 on t1.id_cadete=t2.id_cadete where t2.id_cadete is null;";

//$query3.="select qq1.cadetes,qq1.diferenca,qq2.total from (select t1.* from (select * from resultado321) t1 left join (select * from escala_externo where data=substring_index(@hoje_inicio,' ',1)) t2 on t1.id_cadete=t2.id_cadete where t2.id_cadete is null) qq1 inner join (select *,count(id_cadete) as total from escala_externo group by id_cadete) qq2 on qq1.id_cadete=qq2.id_cadete order by total asc,diferenca desc;";

//echo $query2;
//exit();
$sql=" select qq1.id_cadete,qq1.cadetes,qq1.diferenca,qq2.total from (select t1.* from (select * from resultado321) t1 left join (select * from escala_externo where data=substring_index(@hoje_inicio,' ',1)) t2 on t1.id_cadete=t2.id_cadete where t2.id_cadete is null) qq1 inner join (select *,count(id_cadete) as total from escala_externo group by id_cadete) qq2 on qq1.id_cadete=qq2.id_cadete order by total asc,diferenca desc;";
//$query=$query.$query2.$query3.$sql;
//echo $query;

if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
			//print_r($result);echo "<BR>";
            $result->free();
			
        }
        /* print divider */
        if ($mysqli->more_results()) {
            //printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}
$query=$query2;
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
			//print_r($result);echo "<BR>";
            $result->free();
			
        }
        /* print divider */
        if ($mysqli->more_results()) {
            //printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}
$query=$query3;
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
			//print_r($result);echo "<BR>";
            $result->free();
			
        }
        /* print divider */
        if ($mysqli->more_results()) {
            //printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
                printf("%s\n", $row[0]);
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            //printf("-----------------\n");
        }
    } while ($mysqli->next_result());
}

$sql="select qq1.id_cadete,qq1.cadetes,qq1.diferenca,qq2.total from (select t1.* from (select * from resultado321) t1 left join (select * from escala_externo where data=substring_index(@hoje_inicio,' ',1)) t2 on t1.id_cadete=t2.id_cadete where t2.id_cadete is null) qq1 inner join (select *,count(id_cadete) as total from escala_externo group by id_cadete) qq2 on qq1.id_cadete=qq2.id_cadete order by total asc,diferenca desc limit 1";
//echo $sql;echo "<BR>";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	//teste novo sistema

 //print $row['id_cadete'];
 //exit();
 return $row['id_cadete'];
//return $tudo[0][8];
}
//echo '<script src="https://code.jquery.com/jquery-3.3.1.js"></script>';
echo '<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>';
echo '<script  src="jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>';
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $antiguidade=$_POST['antiguidade'];
   $data_inicio=$_POST['data_inicio'];
   $data_fim=$_POST['data_fim'];
   $motivo=$_POST['motivo'];
   
   if($antiguidade!="" && $data_inicio!="" && $data_fim!="" && $motivo!="")
   {
     $motivo=utf8_decode($motivo);
     
	 $sql="select * from cadetes_servico where antiguidade='".$antiguidade."'"; 
	 $result=mysqli_query($db ,$sql);
	 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//	 print_r($row);
//	 echo "<BR>";
     $id_cadete=$row['id'];
	 
	 $sql="select * from baixados where id_cadete=".$row['id'];
	 
	 $result=mysqli_query($db,$sql);
	 //print_r($result);
	 //echo "<BR>";
	 $flag=True;
	 foreach($result as $row2)
	 {
		 
		// print_r($row2);echo $id_cadete==$row2['id_cadete'];echo " ";echo $data_inicio==$row2['data_inicio']; echo " "; echo $data_fim==$row2['data_fim'];
		 //echo "<BR>";
		// echo "<BR>";
		 if($row2['id_cadete']==$id_cadete)
	  	   { 
	        if ($row2['data_inicio']==$data_inicio) 
			 { 
		 //echo 	'<script>alert("AQUI");</script>';
		      if ($row2['data_fim']==$data_fim)	   
		      {
			    //echo 	'<script>alert("AQUI");</script>';
			     $alerta="<div class='alert alert-warning'>";
                 $alerta=$alerta. 'Uma mesma baixa com essa data de inicio e fim já está cadastrada para o cadete '.$row['cadetes'].'</div>';
                 echo '<script>$(document).ready(function() {'."\n".'$("#titulo").append("'.$alerta.'");'."\n".'});</script>';
			     $flag=False;
		     }
			 }
		   }
	 }
	 
	 if($flag==True)
	 { 
       $sql="insert into baixados(id_cadete,data_inicio,data_fim,motivo) values('".$id_cadete."','".$data_inicio."','".$data_fim."','".$motivo."')";
	   ///echo $sql;
       $result=mysqli_query($db ,$sql);
	   //teste
	   //retirando o cadete da reserva, visto que ele não poderá ser puxado
	   //$sql="delete from reserva where id_cadete =".$id_cadete;
	   //$result=mysqli_query($db ,$sql);
	   //verificando se o cadete estava na escala
	   $sql ="select * from escala where id_cadete=".$id_cadete." and data>='".$data_inicio."' and data <='".$data_fim."'";
	   
	   $result=mysqli_query($db,$sql);
	   foreach($result as $row)
	   {
		   $sql="delete from escala where id_cadete=".$row['id_cadete']." and data='".$row['data']."'";
		   $result2=mysqli_query($db,$sql);
		   $substituidor=substituto($id_cadete,$row['data'],$row['cor']);
		   $sql="insert into escala(id_cadete,data,horario,id_posto,cor,escala) values(".$substituidor.",'".$row['data']."',".$row['horario'].",".$row['id_posto'].",'".$row['cor']."',".$row['escala'].")";
		   $result3=mysqli_query($db,$sql);
		   $sql="select cadetes from cadetes_servico where id =". $substituidor;
		   $result3=mysqli_query($db,$sql);
		   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
		   $substituidor=$row3['cadetes'];

		   $sql="select cadetes from cadetes_servico where id =". $row['id_cadete'];
		   $result3=mysqli_query($db,$sql);
		   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
		   $substituido=$row3['cadetes'];
		   
		   $sql="insert into auditoria(id_cadete,aviso,data,escalante) values(".$row['id_cadete'].",'Cadete ". $substituido." substituido por Cadete ".$substituidor."','".$row['data']."','".$_SESSION['login_user']."')"; 
		   $result3=mysqli_query($db,$sql);
		   
		   $inicio="$(document).ready(function() {";
		   $sucesso='<div class="alert alert-success" role="alert">Cadete '. utf8_encode($substituido).' substituido por Cadete '.utf8_encode($substituidor).' no dia '. $row['data'].'</div>';
		   echo "<script>".$inicio."$('#titulo').prepend('".$sucesso."')});</script>";
	   }
	   
	 }
   }
}


?>

<!doctype html>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<html lang="en">

  <head>
  <style>

  #titulo{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  padding:10px;
	  text-align: center;
  }
  label{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  font-size:12px;
  }
  #datatables_length{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  font-size:12px;
  }
  #example_info{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  font-size:12px;
  }
  #input{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  font-size:12px;
  }
  #example{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	  font-size:12px;
  }
  label{
	  font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  }
  .paginate_button{
	    background-color: white;
        color: black;
        border: 2px solid black; /* Green */
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
		font-size:12px;
		margin:2%;
  }
    .paginate_button:hover{
	    background-color: black;
        color: white;
        border: 1px solid black; /* Green */
		font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
		font-size:14px;
  }
  </style>
    <!-- Required meta tags -->
	<!--<meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	
	
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	
    <title>Atualizar Baixas</title>
  </head>
  <body>
  <!--<div id="topo"  ><!--<center><img id="policia-comunitaria" src="TOPO_ROOSEVELT4.png"></img></center></div>  -->
    <?php include("menu.php"); ?>
  <h3 id='titulo' style="margin-top:10%;">Baixados</h3>
	<script type="text/javascript" class="init">
	

$.getJSON( "id_nome.php", function( data2 ) {
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
		 { data: "id"},
          { data: "id_cadete"},
	  { data: "data_inicio"},
	  { data: "data_fim"},
	  { data: "motivo"}
	],
        "ajax": 'getBaixados.php',
     //   "columnDefs": [
      //      {
       //         "render": function ( data, type, row ) { 
        //            return " <a class =\"fancy\" data-fancybox-type=\"iframe\" href=\"entrada_usuario?id=" + row['id'] + " \">"  + data  + "</a>";//data +' ('+ row[3]+')';
       //         },
       //         "targets": 0
        //    },
	//		{ "visible": false,  "targets": [ 0 ] }
     //   ],
	
	 "columnDefs": [
            {
				
                "render": function ( data, type, row ) { 
				obj=data2;
				id=row['id_cadete'];
					for(i=0;i<obj.data.length;i++)		
	{
		//console.log(obj.data[i].id== id);
		if(obj.data[i].id== id )
		{
			//alert("aqui");
			cadete=obj.data[i].cadetes;
			break;
		}
	}
				
				
                    return "<table style='background-color:transparent border:none;'><tbody style='border:none; background-color:transparent'><tr style='border:none; background-color:transparent'><td style='font-size:10px;border:0px; background-color:transparent'><button style='border:none;' class='fa fa-trash' onclick=remover(" + row['id']+") type='button' ></button></td><td style='font-size:10px;border:0px; background-color:transparent'>CAD "+cadete+"</td></tr></tbody></table>"  ;
                },
                "targets": 0
            },
			//teste 2
			{"render":function(data,type,row){
				obj=data2;
				id=row['id_cadete'];
			    for(i=0;i<obj.data.length;i++)
				{
					if(obj.data[i].id==id)
					{
						esfo=obj.data[i].esfo;
						break;
					}
				}
				return esfo;//"<table style='background-color:transparent; border:none;'><tbody style='border:none; background-color:transparent;'><tr style='border:none; background-color:transparent;'><td style='font-size:10px;border:0px; background-color:transparent'><button style='border:none;' class='fa fa-trash' onclick=remover(" + row['id']+") type='button' ></button></td><td style='border:0px; background-color:transparent'>"+cadete+"</td></tr></tbody></table>"  ;
			},"targets":1},
			//teste 2
			//{ "visible": false,  "targets": [ 1 ] }
			],
	"initComplete": function(settings, json) {
		//$('#example_filter').css('margin-left','78%');
		//$('input[tabindex="0"]').parent().css('display','none'); 
		//$('td[html="controle"]').parent().css('display','none');
		$('th').css('background-color','#212529');
		$('th').css('font-size','10px');
		$('th').css('color','white');
		$('#example tr').each(function() {
        var customerId = $(this).find("td:first").html();
        if (customerId=="controle")
		  {
		   $(this).css("display","none");
          }			  
        });
		$(this).append('<td colspan="4"></td><td><center><button id="plus" type="button" style="border:0px; background-color:transparent;"  ><img src="plus.png" style="width:40px; height:40px;"></image></button></center></td>');
		
		$( "#plus" ).click(function() {
      //  $("#example").prepend('<form method="post" id="Cancoes" autocomplete="off">');
	   //alert("AQUI");
        $("#example").append('<tr><td colspan="2"><input id="antiguidade" name="antiguidade" type="text" class="form-control" placeholder="matricula esfo" style="width:100%;" autocomplete="off"></input></td><div class="form-group"><td><input class="form-control" id="data_inicio" name="data_inicio" placeholder="YYYY-MM-DD" type="text" autocomplete="off"/></td><td><input class="form-control" id="data_fim" name="data_fim" placeholder="YYYY-MM-DD" type="text" autocomplete="off"/></td></div><td><input name="motivo" type="text" class="form-control" placeholder="motivo" style="width:100%; autocomplete="off""></input></td><td><button type="submit" class="btn btn-primary" style="width:100%;background-color:black;">enviar</submit></td></tr> ');
		$("#plus").css("display","none");
		
		//data
		      var date_input=$('input[name="data_inicio"]'); //our date input has the name "date"
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
	  $('#antiguidade').mask('00000');
	  
		//data
		
		
});
		
		
	}

	
	} );
});//teste
	 //$("#example").append('<td colspan="3"></td><td><center><button id="plus" type="button" style="border:0px; background-color:transparent;"  ><img src="plus.png" style="width:40px; height:40px;"></image></button></center></td>');
	
 	//new $.fn.dataTable.FixedHeader( table );


   } );

</script>
<script>


function remover(id) {
       var r = confirm('deseja remover o posto selecionado? '+id);
       if(r==true) { 
            window.location.href = "deletar_baixa.php?id="+id;
			// window.location.href = "inicio.php";
       }
       }
	   
function mudar_nome(id){
 return "lohran";
}	
id=90;
$.getJSON( "id_nome.php", function( data ) {
	obj=data;
	for(i=0;i<obj.data.length;i++)		
	{
		//console.log(obj.data[i].id== id);
		if(obj.data[i].id== id )
		{
			//alert("aqui");
			cadete=obj.data[i].cadetes
			break;
		}
	}
	console.log(cadete)
 
});
 

	</script>

<form method="post" id="cancoes">
 <div style="width:60%; margin-left:20%;">
 				<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
<thead>
   <tr>
                        <th >Nome</th>
                        <th >Matrícula ESFO</th>  
                        <th >Data inicio</th>
                        <th >Data fim</th>						
                        <th >Motivo</th>


   </tr>
</thead> 
</table>
 </div>
</form>

  
  </body>
  
<!--  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>