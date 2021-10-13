<!DOCTYPE html>
<?php
include("config.php");
include("session.php");?>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<html>

 


<?php
//include("config.php");
//include("session.php");

 
$sql="delete from teste where 1=1";
$result=mysqli_query($db,$sql);

$sql="delete from cadetes_servico2 where 1=1";
$result=mysqli_query($db,$sql);
$sql="delete from baixados2 where 1=1";
$result=mysqli_query($db,$sql);
$sql="delete from escala2 where 1=1";
$result=mysqli_query($db,$sql);

$sql="insert into escala2 select * from escala";
$result=mysqli_query($db,$sql);
$sql="insert into baixados2 select * from baixados";
$result=mysqli_query($db,$sql);
$sql="insert into cadetes_servico2 select * from cadetes_servico";
$result=mysqli_query($db,$sql);

$todos_os_postos=array();
$sql="select * from postos";
$result=mysqli_query($db,$sql);
foreach($result as $p)
{
 array_push($todos_os_postos,$p);
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
	<title>Escalas</title>
	
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
    
	<link rel="stylesheet" href="../zTree_v3-master/css/zTreeStyle/zTreeStyle.css" type="text/css">
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
<script>
$(document).ready(function() {
	    $('td').css("vertical-align","middle");
        $('td').css("font-size","12px");
        $('th').css("font-size","13px");

	var date_input=$('.data'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        //format: 'mm/dd/yyyy',
		format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	$('input[name="data"]').mask('0000-00-00');
	$('.data').mask('0000-00-00');
	
	
}); 
 
</script>
<script>
function mes(data){
	switch(((data).toString()).split(' ')[1])
  {
	  case 'Jan':
	  var mes='01';
	  break;
	  case 'Feb':
	  var mes='02';
	  break;
	  case 'Mar':
	  var mes='03';
	  break;
	  case 'Apr':
	  var mes='04';
	  break;
	  case 'May':
	  var mes= '05';
	  break;
	  case 'Jun':
	  var mes='06';
	  break;
	  case 'Jul':
	  var mes='07';
	  break;
	  case 'Aug':
	  var mes='08';
	  break;
	  case 'Sep':
	  var mes='09';
	  break;
	  case 'Oct':
	  var mes='10';
	  break;
	  case 'Nov':
	  var mes='11';
	  break;
	  case 'Dec':
	  var mes='12';  
  }   
  return mes
}
 
$(document).ready(function() {
	
	$('.b').css("border-radius","100%");
	$('.b').css("border-color","transparent");
	$('.b').css("margin","1px");
	//$('.b').css("background-color","black");
	$('.vermelho').css("border-radius","100%");
	$('.vermelho').css("border-color","transparent");
	$('.vermelho').css("background-color","red");
	//$('.vermelho').html(" ");
	$('.azul').css("border-radius","100%");
	$('.azul').css("border-color","transparent");
	$('.azul').css("background-color","blue");
	//$('.azul').html(" ");
	$('.preto').css("border-radius","100%");
	$('.preto').css("border-color","transparent");
	$('.preto').css("background-color","white");	
	//$('.preto').html("P");
 
    $('.vermelho').click(function(){
		        id=$(this).attr("id");
				dia="Data"+id.split("_")[0].split("data")[1];
				console.log(id.split("_")[0]);
				data=$('#'+dia).val();
				turma=<?php echo substr($_POST['turma'] ,0,2);?>;
		        var valor="data="+data+"&turma="+turma+"&cor=Vermelha";
				//valor=valor+"&cor=Vermelha";
$.ajax({ 
 type:"POST", 
 url: "mudacor_teste.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    console.log(valor);
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
	
	
    $('.azul').click(function(){
		        id=$(this).attr("id");
				dia="Data"+id.split("_")[0].split("data")[1];
				console.log(id.split("_")[0]);
				data=$('#'+dia).val();
				turma=<?php echo substr($_POST['turma'] ,0,2);?>;
		        var valor="data="+data+"&turma="+turma+"&cor=Azul";
				//valor=valor+"&cor=Vermelha";
$.ajax({ 
 type:"POST", 
 url: "mudacor_teste.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    console.log(valor);
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
    $('.preto').click(function(){
		        id=$(this).attr("id");
				dia="Data"+id.split("_")[0].split("data")[1];
				console.log(id.split("_")[0]);
				data=$('#'+dia).val();
				turma=<?php echo substr($_POST['turma'] ,0,2);?>;
		        var valor="data="+data+"&turma="+turma+"&cor=Preta";
				//valor=valor+"&cor=Vermelha";
$.ajax({ 
 type:"POST", 
 url: "mudacor_teste.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    console.log(valor);
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

 
	<?php
	$sql="select max(id) from postos";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//print_r($row);
	$nova_v=intval($row['max(id)'],10);
	//echo $nova_v;
	$s="";
	for($i=1;$i<=7;$i++)
	{
	$s=$s."$('#data".$i."_v').click(function(){"."\n";
		//$s=$s."for(i=1;i<".(3*count($todos_os_postos)).";i++)"."\n";
		$s=$s."for(i=1;i<=".(($nova_v)).";i++)"."\n";
		$s=$s."{"."\n";
		//$s=$s."console.log	('#td_1_'+i+'_".($i-1)."');";
		$s=$s."$('#td_1_'+i+'_".($i-1)."').css('background-color','#ffc0b3');"."\n";
		$s=$s."$('#td_2_'+i+'_".($i-1)."').css('background-color','#ffc0b3');"."\n";
		$s=$s."$('#td_3_'+i+'_".($i-1)."').css('background-color','#ffc0b3');"."\n";
		$s=$s."}"."\n";
  	  $s=$s."});"."\n";

	$s=$s."$('#data".$i."_a').click(function(){"."\n";
		//$s=$s."for(i=1;i<".(3*count($todos_os_postos)).";i++)"."\n";
		$s=$s."for(i=1;i<=".(($nova_v)).";i++)"."\n";
		$s=$s."{"."\n";
		//$s=$s."console.log	('#td_1_'+i+'_".($i-1)."');";
		$s=$s."$('#td_1_'+i+'_".($i-1)."').css('background-color','#c2c2ff');"."\n";
		$s=$s."$('#td_2_'+i+'_".($i-1)."').css('background-color','#c2c2ff');"."\n";
		$s=$s."$('#td_3_'+i+'_".($i-1)."').css('background-color','#c2c2ff');"."\n";
		$s=$s."}"."\n";
  	  $s=$s."});"."\n";

	$s=$s."$('#data".$i."_p').click(function(){"."\n";
		//$s=$s."for(i=1;i<".(3*count($todos_os_postos)).";i++)"."\n";
		$s=$s."for(i=1;i<=".(($nova_v)).";i++)"."\n";
		$s=$s."{"."\n";
		//$s=$s."console.log	('#td_1_'+i+'_".($i-1)."');";
		$s=$s."$('#td_1_'+i+'_".($i-1)."').css('background-color','white');"."\n";
		$s=$s."$('#td_2_'+i+'_".($i-1)."').css('background-color','white');"."\n";
		$s=$s."$('#td_3_'+i+'_".($i-1)."').css('background-color','white');"."\n";
		$s=$s."}"."\n";
  	  $s=$s."});"."\n";
	  
    }
	//c2c2ff
	  echo $s;
    ?>
	//$('#data4_a').trigger( "click" );
	$('#data5_v').trigger( "click" );
	$('#data6_v').trigger( "click" );
	$("#Data1 , #Data2 , #Data3 , #Data4 , #Data5 , #Data6").change(function(){
		
		//alert($('#Data1').val().split('-').length);
		if ($('#Data1').val().split('-').length == 3 || $('#Data2').val().split('-').length == 3 || $('#Data3').val().split('-').length == 3 || $('#Data4').val().split('-').length == 3 || $('#Data5').val().split('-').length == 3 || $('#Data6').val().split('-').length == 3 ){ 
		//alert("mudou aqui");
		//console.log(date);
      var clicado=$(this).val();
	  
	  var clicado2=new Date(clicado.split("-")[0],(parseInt(clicado.split("-")[1])-1).toString(),clicado.split("-")[2]);
	//  console.log(clicado2);
	//  console.log(clicado2.getDate());
	  terca=new Date(clicado2);
	  terca.setDate(clicado2.getDate() - clicado2.getDay() + 2);
	  if(clicado2.getDay()<2)
	  {
		  terca.setDate(clicado2.getDate() - clicado2.getDay() - 5);
	  }	  
	  
	  //console.log(clicado2);
	//  var url="Dia_da_semana.php?data="+clicado;
	  //$.get(url,function(dia_da_semana){
	  //console.log(dia_da_semana);  
	  //var clicado2= new Date(clicado.split("-")[0],(parseInt(clicado.split("-")[1],10)-1 ).toString(),clicado.split("-")[2]);	  
     // console.log("terca");
    //  console.log(terca);
	  var dia=terca;
	  var terca2=terca.toString();
	  var terca2=terca2.split(" ")[3]+"-"+mes(terca2)+"-"+terca2.split(" ")[2];
	  //dia.setDate(clicado2.getDate()+1);
	  //dia=dia.toString();
	  //dia=dia.split(" ")[3]+"-"+mes(dia)+"-"+dia.split(" ")[2];
      clicado2=terca;
	  
      $("#Data1").val(terca2);
	  dia.setDate(clicado2.getDate()+1);
	  dia=dia.toString();
	  dia=dia.split(" ")[3]+"-"+mes(dia)+"-"+dia.split(" ")[2];	  
	  $("#Data2").val(dia);
	  var dia1=new Date($('#Data1').val().split("-")[0],(parseInt($('#Data1').val().split("-")[1])-1).toString(),$('#Data1').val().split("-")[2]);
	  dia1.setDate(dia1.getDate()+2);
	  dia1=dia1.toString();
	  dia1=dia1.split(" ")[3]+"-"+mes(dia1)+"-"+dia1.split(" ")[2];
	  
	  $("#Data3").val(dia1);
	  var dia2=new Date($('#Data1').val().split("-")[0],(parseInt($('#Data1').val().split("-")[1])-1).toString(),$('#Data1').val().split("-")[2]);
	  dia2.setDate(dia2.getDate()+3);
	  dia2=dia2.toString();
	  dia2=dia2.split(" ")[3]+"-"+mes(dia2)+"-"+dia2.split(" ")[2];

	  $("#Data4").val(dia2);
	  var dia3=new Date($('#Data1').val().split("-")[0],(parseInt($('#Data1').val().split("-")[1])-1).toString(),$('#Data1').val().split("-")[2]);
	  dia3.setDate(dia3.getDate()+4);
	  dia3=dia3.toString();
	  dia3=dia3.split(" ")[3]+"-"+mes(dia3)+"-"+dia3.split(" ")[2];

	  $("#Data5").val(dia3);
	  var dia4=new Date($('#Data1').val().split("-")[0],(parseInt($('#Data1').val().split("-")[1])-1).toString(),$('#Data1').val().split("-")[2]);
	  dia4.setDate(dia4.getDate()+5);
	  dia4=dia4.toString();
	  dia4=dia4.split(" ")[3]+"-"+mes(dia4)+"-"+dia4.split(" ")[2];

	  $("#Data6").val(dia4);
	  var dia5=new Date($('#Data1').val().split("-")[0],(parseInt($('#Data1').val().split("-")[1])-1).toString(),$('#Data1').val().split("-")[2]);
	  dia5.setDate(dia5.getDate()+6);
	  dia5=dia5.toString();
	  dia5=dia5.split(" ")[3]+"-"+mes(dia5)+"-"+dia5.split(" ")[2];

	  $("#Data7").val(dia5);
	  

	 //teste 
	    var terca= $('#Data1').val();
	    terca= new Date(terca.split("-")[0],(parseInt(terca.split("-")[1])-1).toString(),terca.split("-")[2]);
 
		var segunda=new Date(terca);
		segunda.setDate(terca.getDate() + 6);	  	  		
		
     $.getJSON("getEscalas.php", function (data) { 
	  $.getJSON("getCadetes.php", function (cadetes) { 
 
 		
	  for(i=0;i<data.data.length;i++)
	  {
		var ss=data.data[i].data;
		var s=data.data[i].data.split("-");
		var q= new Date(s[0],(parseInt(s[1],10)-1).toString(),s[2]);
		// console.log(q + ' ' + terca);
 
		if(q >= terca  &&   q<=segunda)
		{
		
		    
			$(".tg-c6of").each(function(){
				 horario=($(this).attr("id")).split("_")[1]
				 posto=($(this).attr("id")).split("_")[2]
				 dia=($(this).attr("id")).split("_")[3]
				 
				 if(q.getDay()==0) //domingo
					 qalterado=5;
				 if(q.getDay()==1)
					 qalterado=6;
				 if(q.getDay()==2)
					 qalterado=0;
				 if(q.getDay()==3)
					 qalterado=1;
				 if(q.getDay()==4)
					 qalterado=2;
				 if(q.getDay()==5)
					 qalterado=3;
				 if(q.getDay()==6)
					 qalterado=4;
					 
				 if (dia==qalterado)
				 {  
					 //console.log("lohran");
					if(posto==data.data[i].id_posto)
					{  //console.log("lohran2");
						if(horario==data.data[i].horario)
						{//console.log("lohran3 "+data.data[i].id_cadete);
					         //var td_tabela=this;
							 var id_cadete=data.data[i].id_cadete;
					       
						  	  //$(this).html(data.data[i].id_cadete);
							  for(qq=0;qq<cadetes.data.length;qq++)
							  {
							    if(id_cadete == cadetes.data[qq].id)
								{
								  $(this).html('<button name="dia_'+qalterado+'" style="display:none;" data-toggle="tooltip" title="Deletar"  class="fa fa-trash deletarcadete" id="deletarcadete_'+ss+'_'+posto+'_'+horario+'_'+id_cadete+'" /><button name="dia_'+qalterado+'" style="display:none;" class="fa fa-arrow-down baixar" data-toggle="tooltip2" title="Baixar cadete" id="deletarcadete_'+ss+'_'+posto+'_'+horario+'_'+id_cadete+'"/><button name="dia_'+qalterado+'" style="display:none;" data-toggle="tooltip4" title="Escalar manualmente um cadete"  class="fa fa-edit editarcadete" id="editarcadete_'+ss+'_'+posto+'_'+horario+'_'+id_cadete+'" />' + "<BR>CAD "+cadetes.data[qq].cadetes);
								} 
							  }
						   
						}
					}
				 }
			});
 
		}
		 
	  }
	  
	  });
	  });
	  //teste


		
		}
	});


    $(".tg-c6of").html("XXXXXX");
	 $('[data-toggle="tooltip"]').tooltip(); 
	 $('[data-toggle="tooltip2"]').tooltip(); 
	 $('[data-toggle="tooltip3"]').tooltip(); 
	 $('[data-toggle="tooltip4"]').tooltip(); 
	 $('[data-toggle="tooltip5"]').tooltip(); 
	 $('[data-toggle="tooltip6"]').tooltip(); 
	 $('[data-toggle="tooltip7"]').tooltip(); 

//teste
 $("#data1_deletar, #data2_deletar, #data3_deletar, #data4_deletar, #data5_deletar, #data6_deletar, #data7_deletar ").click(function(){
		 var escala="<?php echo explode(" ",$_POST['turma'])[0]?>";
		 var data=$('#Data'+$(this).attr("id").split("_")[0].split("data")[1]).val();
		 var data_escala="data_escala="+data+"_"+escala;
         $.ajax({ 
 type:"POST", 
 url: "deletar_teste.php", 
 data:data_escala,
  success: function(data){
    //alert("teste");
    console.log(data_escala);
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

//teste
});
	 
	 $("#data1_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<(3*count($todos_os_postos));$wq++)
		 {
			 $s='[name="' . $wq . '0"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	
	 });
	 $("#data2_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '1"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });
	 $("#data3_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '2"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });
	 
	 $("#data4_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '3"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });
	 $("#data5_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '4"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });
	 $("#data6_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '5"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });
	 $("#data7_deletar").click(function(){
		 <?php
		 for($wq=0;$wq<count($todos_os_postos);$wq++)
		 {
			 $s='[name="' . $wq . '6"]';
			 echo "       $('" . $s . "').html('XXXXX');" . "\n";
			 //echo "       console.log($('" . $s . "').html());" . "\n";
		 }?>
	 });	
     $(document).arrive('.deletarcadete',function(){	
         $('.deletarcadete').click(function(){	 
		 $(this).parent().html("XXXXXX");
		 //beatriz mendonca de oliveira
        var valor="valor="+$(this).attr("id");
$.ajax({ 
 type:"POST", 
 url: "deletar_teste.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    console.log(valor);
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
     $(document).arrive('.baixar',function(){	
         $('.baixar').click(function(){	 
         var valor="valor="+$(this).attr("id");
		 if($(this).parent().css("background-color").split('192').length>2)
		 {
			 valor=valor+"&cor=Vermelha";
			 var cor = "Vermelha";
		 }
		 if($(this).parent().css("background-color").split('194').length>2)
		 {
			 valor=valor+"&cor=Azul";
			 var cor = "Azul";
		 }
		 if($(this).parent().css("background-color").split('0').length>2)
		 {
			 valor=valor+"&cor=Preta";		 
			 var cor = "Preta";
		 }
		 //alert($(this).parent().css("background-color")); //vermelho 255 192 179 azul 194 194 255 branco 0 0 0 0
//teste
//console.log(valor);
/*
$.ajax({ 
 type:"POST", 
 url: "baixar_teste.php", 
 data:valor,
  success: function(data){
	  var data3=valor.split("_")[1];
	  //console.log(data3);
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  //console.log(escala);
	  //console.log(valor.split("_")[4].split("&")[0]);
	//  console.log("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala);
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  
		  for(i=0;i<data.data.length;i++)
		  {
			 // console.log(data.data[i].id_cadete);
			  if(valor.split("_")[2]==data.data[i].id_posto && valor.split("_")[3]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   //$('#'+valor.split("&")[0].split("=")[1]).html(data2.data[j].cadetes);
				   $('#'+valor.split("&")[0].split("=")[1]).parent().html("<p style='color:green'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
			  //data.data[i].id_cadete;
		  }
		 // deletarcadete_2020-03-24_31_1_22335
	  });
	  });
	  
	  */
	 // $('#'+valor.split("&")[0].split("=")[1]).parent().html("CAD "+ data);
	  //console.log(data);
	  //console.log(s);
  // alert("Troca realizada com sucesso ");
   // location.reload(true);
  // $("#show_message").fadeIn();

   //},
  //error: function (jqXHR, exception) {
   // var msg = "";
//	console.log("deu ruim");
//    if (jqXHR.status === 0) {
 //     msg = "Not connect.\n Verify Network.";
  //  } else if (jqXHR.status == 404) {
   //  msg = "Requested page not found. [404]";
	//}
    //else if (jqXHR.status == 500) {
    // msg = "Internal Server Error [500].";
    //} else if (exception === "parsererror") {
    // msg = "Requested JSON parse failed.";
    //} else if (exception === "timeout") {
    // msg = "Time out error.";
  //  } else if (exception === "abort") {
  //   msg = "Ajax request aborted.";
   //// } else {
  //   msg = "Uncaught Error.\n" + jqXHR.responseText;
  //  }
//alert(html(msg));
//}, 
//});

//teste

     //teste lohran
	 console.log("getsubstitutos.php?turma=<?php echo substr($_POST['turma'] ,0,2);?>&data1="+$(this).attr("id").split("_")[1]+"&cor="+cor);
	 	 $.getJSON("getsubstitutos.php?turma=<?php echo substr($_POST['turma'] ,0,2);?>&data1="+$(this).attr("id").split("_")[1]+"&cor="+cor, function (data) { 
		 //alert("AQUI");
		 //fa fa-arrow-down 
    // $(document).arrive('.baixar',function(){	
	    
         $('.baixar').click(function(){	 
		 var qws="<select id='select_"+$(this).parent().attr("id")+"' class='form-control manualmente'><option></option>"
		// $(this).parent().html("<select id='select_"+$(this).parent().attr("id")+"' class='form-control'><option></option>"+
         
		 for(i=0;i<data.data.length;i++)
		   {
			//if(data.data[i].antiguidade.substr(0,2)==<?php echo substr($_POST['turma'] ,0,2);?>)
		//	{
				qws=qws+"<option>CAD "+data.data[i].cadetes+"</option>";
		//	}
		   }
		 qws=qws+"</select>";  
		 
		 
		 
		$(this).parent().html(qws);
		});
	//	});
	 });
	 //teste lohran


		   
		 });
	 });
$(document).arrive('.manualmente',function(){	
   //alert("CHEGOU");
   $('.manualmente').change(function(){
	   //var cad=$(this).val().split("CAD ")[1].replace(" ","|");
	   var cad=$(this).val().split("CAD ")[1];
	   var dia=parseInt($(this).attr("id").split("_")[4],10)+1;
	   dia="Data"+dia;
	   dia=$('#'+dia).val();
	   var data=dia;
	   var horario=$(this).attr("id").split("_")[2];
	   var posto=$(this).attr("id").split("_")[3];
	   var valor="data_escala="+cad+"_"+data+"_"+horario+"_"+posto;
	  // console.log("manualmente");
	   //console.log(valor);
	   $.ajax({ 
 type:"POST", 
 url: "editar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
 
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
	 $.getJSON("getCadetes.php", function (data) { 
     $(document).arrive('.editarcadete',function(){	
         $('.editarcadete').click(function(){	 
		 var qws="<select id='select_"+$(this).parent().attr("id")+"' class='form-control manualmente'><option></option>"
		// $(this).parent().html("<select id='select_"+$(this).parent().attr("id")+"' class='form-control'><option></option>"+
         
		 for(i=0;i<data.data.length;i++)
		   {
			if(data.data[i].antiguidade.substr(0,2)==<?php echo substr($_POST['turma'] ,0,2);?>)
			{
				qws=qws+"<option>CAD "+data.data[i].cadetes+"</option>";
			}
		   }
		 qws=qws+"</select>";  
		 
		 
		 
		$(this).parent().html(qws);
		});
		});
	 });	 
	 //var trocas=0;
	 var trocas=[];
	 var trocas_pai=[];
	 var trocas_botao=[];
     $(document).arrive('.trocarcadete',function(){	
         $('.trocarcadete').click(function(){	 
		    trocas_botao.push($(this).attr("id"));
			//console.log($(this).attr("id"));
            trocas.push("CAD "+ $(this).parent().html().split("CAD ")[1].split('"')[0]);
			trocas_pai.push($(this).parent().attr("id"));
			trocas=jQuery.unique(trocas);
			trocas_pai=jQuery.unique(trocas_pai);
			trocas_botao=jQuery.unique(trocas_botao);
  		    //console.log(trocas[0]);
			//console.log(trocas.length);
		    if(trocas.length==2)
		    {
			var a='#'+trocas_pai[0];
			var b='#'+trocas_pai[1];
			var valor="valor="+trocas_botao[0]+"|"+trocas_botao[1];
			$(a).html("<p style='color:#cccc00;'>"+trocas[1]+"</p>");
			$(b).html("<p style='color:#cccc00;'>"+trocas[0]+"</p>");
			trocas=[];
			trocas_pai=[];
			trocas_botao=[];
			
			//beatriz
			console.log("editar");
			console.log(valor);
$.ajax({ 
 type:"POST", 
 url: "editar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
 
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
			//beatriz
			
		    }
			
		 });
		 
	 });	 
	 $('#data1_gerar').click(function(){
	//tesste 
	$("#container_barra1").css("display","inline");
	$("#gerando_escala1").css("display","inline");
	var progressBar = $(".barra1"); 

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 console.log($("[name='00']").css("background-color").split('192').length);
		 if($("[name='00']").css("background-color").split('192').length>=2) 
			 cor="Vermelha";
		 if($("[name='00']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 //if($("[name='00']").css("background-color").split('0').length>2)
			// cor="Preta";
		 console.log("COR");
		 console.log(cor);
		 //lohran
	     var data=$('#Data1').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
		 console.log(valor);
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log("VALOR DA ESCALA");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_1").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });
	 
//todos

	 $('#data2_gerar').click(function(){
	//tesste
	$("#container_barra2").css("display","inline");
	$("#gerando_escala2").css("display","inline");
	var progressBar = $(".barra2");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='01']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='01']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 //if($("[name='01']").css("background-color").split('0').length>=2)
			// cor="Preta";
		 //lohran
	     var data=$('#Data2').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_2").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });

	 $('#data3_gerar').click(function(){
	//tesste
	$("#container_barra3").css("display","inline");
	$("#gerando_escala3").css("display","inline");
	var progressBar = $(".barra3");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='02']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='02']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 //if($("[name='02']").css("background-color").split('0').length>2)
			// cor="Preta";
		 //lohran
	     var data=$('#Data3').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_3").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });

 $('#data4_gerar').click(function(){
	//tesste
	$("#container_barra4").css("display","inline");
	$("#gerando_escala4").css("display","inline");
	var progressBar = $(".barra4");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='03']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='03']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 //if($("[name='03']").css("background-color").split('0').length>2)
			 //cor="Preta";
		 //lohran
	     var data=$('#Data4').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_4").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });

 $('#data5_gerar').click(function(){
	//tesste
	$("#container_barra5").css("display","inline");
	$("#gerando_escala5").css("display","inline");
	var progressBar = $(".barra5");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='04']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='04']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 //if($("[name='04']").css("background-color").split('0').length>2)
			// cor="Preta";
		 //lohran
	     var data=$('#Data5').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_5").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });

 $('#data6_gerar').click(function(){
	//tesste
	$("#container_barra6").css("display","inline");
	$("#gerando_escala6").css("display","inline");
	var progressBar = $(".barra6");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='05']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='05']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 if($("[name='05']").css("background-color").split('0').length>=2)
			 cor="Preta";
		 //lohran
	     var data=$('#Data6').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_6").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });
	 
 $('#data7_gerar').click(function(){
	//tesste
	$("#container_barra7").css("display","inline");
	$("#gerando_escala7").css("display","inline");
	var progressBar = $(".barra7");

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 40;
    progressBar.width(width);
    }
	//tesste
		 var cor="Preta";
		 if($("[name='06']").css("background-color").split('192').length>=2)
			 cor="Vermelha";
		 if($("[name='06']").css("background-color").split('194').length>=2)
			 cor="Azul";
		 if($("[name='06']").css("background-color").split('0').length>=2)
			 cor="Preta";
		 //lohran
	     var data=$('#Data7').val();
		 var escala="<?php echo explode(' ',$_POST['turma'])[0];?>";
		 var postos='';
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
        var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
		postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
		//console.log($(this).attr("id"));
    });
});
//console.log(postos);
		 var valor='data='+data;
		 valor=valor + '&posto='+postos;
		 valor=valor + '&escala='+escala;
		 valor=valor+'&cor='+cor;
$.ajax({ 
 type:"POST", 
 url: "escalar_teste.php", 
 data:valor,
  success: function(data){
	  //alert("deu certo");
	  console.log(valor);
	  var data3=valor.split("data=")[1].split("&")[0];
	  var escala="<?php echo explode(" ",$_POST['turma'])[0];?>";
	  $.getJSON("getCadetes.php", function (data2) { 
	  $.getJSON("getEscalas2.php?inicio="+data3+"&fim="+data3+"&escala="+escala,function(data){
		  $(".dia_7").each(function(){
		  for(i=0;i<data.data.length;i++)
		  {
			  if($(this).attr("id").split("_")[2]==data.data[i].id_posto && $(this).attr("id").split("_")[1]==data.data[i].horario )
			  {
				for(j=0;j<data2.data.length;j++)
				{
                 if(data2.data[j].id==data.data[i].id_cadete)
				 {
				   $(this).html("<p style='color:blue'>CAD "+ data2.data[j].cadetes+"</p>");
				 }
				}					
			  }
		  }
	     });
	  });
	  });
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
		 //lohran
	 });



//todos 	 
	 $("#data1_editar").click(function(){
		 $("[name='dia_0']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."0";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		 //echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>
		       
	 });
	 $("#data2_editar").click(function(){
		 $("[name='dia_1']").css("display","inline");
		 <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."1";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		 //echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>
	 });
	 $("#data3_editar").click(function(){
		 $("[name='dia_2']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."2";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		// echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>		 
	 });
	 $("#data4_editar").click(function(){
		 $("[name='dia_3']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."3";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		// echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>		 
	 });
	 $("#data5_editar").click(function(){
		 $("[name='dia_4']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."4";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		 //echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>		 
	 });
	 $("#data6_editar").click(function(){
		 $("[name='dia_5']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."5";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		// echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>		 
	 });
	 $("#data7_editar").click(function(){
		 $("[name='dia_6']").css("display","inline");
	     <?php 
		 $aspas='"';
		 for($i=0;$i<(3*count($todos_os_postos));$i++)
		 {
	     $nome=$i."6";
		 $nome="name='".$nome."'";
		 $nome='"['.$nome.']"';
		        
		 //echo $("[name='00']").html($("[name='00']").html().split("CAD ")[0] + "<input class='form-control' type='text' id='in_" + $("[name='00']").attr("id") + "' placeholder='CAD " + $("[name='00']").html().split("CAD ")[1] + "'/>");
		 //echo "$(".$nome.").html($(".$nome.").html().split('CAD ')[0]+".$aspas."<input class='form-control' type='text' id='in_'".$aspas."+$(".$nome.").attr('id')+".$aspas."' placeholder='CAD ".$aspas." + $(".$nome.").html().split('CAD ')[1]+".$aspas."'/>".$aspas.");"."\n";
		 }?>		 
	 });	 
	 //$('.trocarcadete .deletarcadete .baixar').css("display","none");
	

	$('#gerar_semana').click(function(){
		var postos=[];
$('.caixa').each(function() {
    $(':checkbox').filter(':checked').each(function() {
   //     var name = this.value;
		//postos.push($(this).attr("id").split("checkbox_posto")[1]);
	//	postos=postos+$(this).attr("id").split("checkbox_posto")[1]+"|";
	postos.push($(this).attr("id"));
		//console.log($(this).attr("id")); 
    });
});
postos=unique(postos);
postos=postos.length;
console.log("postos");
console.log(postos);
//$('data6_gerar').trigger("click");
    //console.log(postos
     if(postos<=5)
	 {
		 jQuery('#data6_gerar')[0].click();
		 setTimeout(
        function() 
        {
		jQuery('#data5_gerar')[0].click();
        //do something special
        }, 15000);
		 //setTimeout(
        //function() 
       // {
		//	jQuery('#data4_gerar')[0].click();
        //do something special
        //}, 30000);		
		setTimeout(
        function() 
        {
			jQuery('#data1_gerar')[0].click();
        //do something special
        }, 45000);	
        setTimeout(		
        function() 
        {
			jQuery('#data2_gerar')[0].click();
        //do something special
        }, 60000);				
		setTimeout(
        function() 
        {
			jQuery('#data3_gerar')[0].click();
        //do something special
        }, 75000);	
        setTimeout(		
        function() 
        {
			jQuery('#data4_gerar')[0].click();
        //do something special
        }, 90000);	
        setTimeout(		
        function() 
        {
			jQuery('#data7_gerar')[0].click();
        //do something special
        }, 105000);			
								
		 //console.log($(".barra6").css("width"));
	//	 $('data5_gerar').trigger("click");
	//	 $('data1_gerar').trigger("click");
	//	 $('data2_gerar').trigger("click");
	//	 $('data3_gerar').trigger("click");
	//	 $('data4_gerar').trigger("click");
	//	 $('data7_gerar').trigger("click");
	 }
	 else{
		 jQuery('#data1_gerar')[0].click();
		 setTimeout(
        function() 
        {
			jQuery('#data2_gerar')[0].click();
        //do something special
        }, 15000);
		 setTimeout(
        function() 
        {
			jQuery('#data3_gerar')[0].click();
        //do something special
        }, 30000);		
		setTimeout(
        function() 
        {
			jQuery('#data4_gerar')[0].click();
        //do something special
        }, 45000);	
        setTimeout(		
        function() 
        {
			jQuery('#data5_gerar')[0].click();
        //do something special
        }, 60000);				
		setTimeout(
        function() 
        {
			jQuery('#data6_gerar')[0].click();
        //do something special
        }, 75000);	
        setTimeout(		
        function() 
        {
			jQuery('#data7_gerar')[0].click();
        //do something special
        }, 90000);	
        //setTimeout(		
        //function() 
        //{
			//jQuery('#data7_gerar')[0].click();
        //do something special
        //}, 84000);			
		 
	 }
		//lohran arraes bentemuller
		//$("#container_barra").css("display","inline");
	//	$("#gerando_escala").css("display","inline");
//	var progressBar = $(".progress-bar");

  //  setInterval(addProgress, 250);
    //addProgress
   //function addProgress() {
    //var width = progressBar.width() + 8;
    //progressBar.width(width);
   // }
	});
	
});
</script> 
<link rel="stylesheet" href="../APMB2/responsive-nao-calendar/aicon/style.css">
<link rel="stylesheet" href="../APMB2/responsive-nao-calendar/css/jquery-nao-calendar.css">
<script src="../APMB2/responsive-nao-calendar/jquery-nao-calendar.js"></script>	
	<style>
.myCalendar.nao-month td {
  padding: 15px;
}


.myCalendar .month-head>div,
.myCalendar .month-head>button {
  padding: 15px;
}
</style>


</head>
<body class="wide comments example dt-example-bootstrap">

  <?php include("menu.php"); ?>

<div class="container"> 
<form method="post">
<h3 id="titulo_turma" style="margin-top:10%;">Turma</h3>
<select id="turma_select" class="form-control" name="turma"/><option></option>

<?php
$sql="select distinct escala from postos";
$result=mysqli_query($db,$sql);
foreach($result as $row)
{
	echo "<option>".$row['escala']."</option>";
}
?>
</select>



<center><button class="btn btn-primary mb-2" type="submit" style="margin:10%;border-color:#212529;background-color:white;color:#212529;" id="enviar22">Enviar</button></center>
</form>
<h3 id="titulo_turma" name="titulo_turma">Turma <?php echo $_POST['turma'];?> </h3>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
$cabecalho='<table class="table" style="margin-top:15%;">';

$cabecalho=$cabecalho.'<tr style="background-color:#212529;color:white;">';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" style="margin-left:0%;background-color:yellow;" class="fa fa-exclamation-triangle" id="pega_intervalo"></button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data1_v" class="vermelho">V</button><button id="data1_a" type="button" class="azul">A</button><button type="button" id="data1_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data2_v" class="vermelho">V</button><button id="data2_a" type="button" class="azul">A</button><button type="button" id="data2_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data3_v" class="vermelho">V</button><button id="data3_a" type="button" class="azul">A</button><button type="button" id="data3_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data4_v" class="vermelho">V</button><button id="data4_a" type="button" class="azul">A</button><button type="button" id="data4_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data5_v" class="vermelho">V</button><button id="data5_a" type="button" class="azul">A</button><button type="button" id="data5_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data6_v" class="vermelho">V</button><button id="data6_a" type="button" class="azul">A</button><button type="button" id="data6_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw" style="backgroud-color:white;"><button type="button" id="data7_v" class="vermelho">V</button><button id="data7_a" type="button" class="azul">A</button><button type="button" id="data7_p" class="preto">P</button></th>';
$cabecalho=$cabecalho.'  </tr>';


$cabecalho=$cabecalho.'<tr style="background-color:#212529;color:white;">';
$cabecalho=$cabecalho.'    <th class="tg-llyw"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data1" name="Data1" placeholder="Data1"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data2" name="Data2" placeholder="Data2"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data3" name="Data3" placeholder="Data3"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data4" name="Data4" placeholder="Data4"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data5" name="Data5" placeholder="Data5"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data6" name="Data6" placeholder="Data6"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><input type="text" autocomplete="off" class="form-control data" id="Data7" name="Data7" placeholder="Data7"></th>';
$cabecalho=$cabecalho.'  </tr>';

$cabecalho=$cabecalho.'<tr style="background-color:#212529;color:white;">';
$cabecalho=$cabecalho.'    <th class="tg-llyw"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Terça-feira</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Quarta-feira</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Quinta-feira</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Sexta-feira</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Sábado</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Domingo</th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw">Segunda-feira</th>';
$cabecalho=$cabecalho.'  </tr>';

$cabecalho=$cabecalho.'<tr style="background-color:#212529;color:white;">';
$cabecalho=$cabecalho.'    <th class="tg-llyw"></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data1_gerar" name="data1_gerar" class="fa fa-cog b"/><button type="button" id="data1_editar" data-toggle="tooltip7" title="Editar cadetes" name="data1_editar" class="fa fa-edit b"/><button type="button" id="data1_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data1_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data2_gerar" name="data2_gerar" class="fa fa-cog b"/><button type="button" id="data2_editar" data-toggle="tooltip7" title="Editar cadetes" name="data2_editar" class="fa fa-edit b"/><button type="button" id="data2_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data2_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data3_gerar" name="data3_gerar" class="fa fa-cog b"/><button type="button" id="data3_editar" data-toggle="tooltip7" title="Editar cadetes" name="data3_editar" class="fa fa-edit b"/><button type="button" id="data3_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data3_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data4_gerar" name="data4_gerar" class="fa fa-cog b"/><button type="button" id="data4_editar" data-toggle="tooltip7" title="Editar cadetes" name="data4_editar" class="fa fa-edit b"/><button type="button" id="data4_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data4_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data5_gerar" name="data5_gerar" class="fa fa-cog b"/><button type="button" id="data5_editar" data-toggle="tooltip7" title="Editar cadetes" name="data5_editar" class="fa fa-edit b"/><button type="button" id="data5_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data5_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data6_gerar" name="data6_gerar" class="fa fa-cog b"/><button type="button" id="data6_editar" data-toggle="tooltip7" title="Editar cadetes" name="data6_editar" class="fa fa-edit b"/><button type="button" id="data6_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data6_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'    <th class="tg-llyw"><button type="button" data-toggle="tooltip6" title="Gerar nova escala para esse dia" id="data7_gerar" name="data7_gerar" class="fa fa-cog b"/><button type="button" id="data7_editar" data-toggle="tooltip7" title="Editar cadetes" name="data7_editar" class="fa fa-edit b"/><button type="button" id="data7_deletar" data-toggle="tooltip5" title="Deletar escala para esse dia" name="data7_deletar" class="fa fa-trash b"/></th>';
$cabecalho=$cabecalho.'  </tr>';

$posto="";
$x=0;
$posto2=$aux_posto;
$sqlposto="select * from postos where escala='".$_POST['turma']."'";
$resultposto =mysqli_query($db,$sqlposto);

foreach($resultposto as $p)
{

	$contador_de_i=1;
	for($i=0;$i<3;$i++)
	{

		for($j=0;$j<7;$j++)
		{
			if($j==0)
			{
			  $posto=$posto.'<tr class="trdoposto_'.$p['id'].'">';
			  if($i==0)
	          $posto=$posto.'<td class="tg-rq3n" rowspan="3" name="posto'.$p['id'].'"><input type="checkbox" class="caixa" checked id="checkbox_posto'.$p['id'].'"/>'.utf8_encode($p['posto']).'</td>';		  
			}
        $posto=$posto.'<td class="tg-c6of dia_'.($j+1).'" name="'.$i.$j.'" id="td_'.($i+1).'_'.$p['id'].'_'.$j.'">'.''.'</td>';
		    if($j==7)
				$posto=$posto.'</tr>';
		}
	//$posto=$posto.'</tr>';
	$contador_de_i=$contador_de_i+1;
	}
$x=$x+1;
}
$fim="";
$fim=$fim.'</table>';
//if (count($posto2)>0)
$tabela="<center>".$cabecalho.$posto.$fim."</center>";
echo $tabela;
}
?>
 
 <BR>
  <h4 class="text-center" id="gerando_escala1" style="display:none;">Gerando Escala de Terça</h4>
  <div class="container" id="container_barra1" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala2" style="display:none;">Gerando Escala de Quarta</h4>
  <div class="container" id="container_barra2" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala3" style="display:none;">Gerando Escala de Quinta</h4>
  <div class="container" id="container_barra3" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra3" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala4" style="display:none;">Gerando Escala de Sexta</h4>
  <div class="container" id="container_barra4" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra4" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala5" style="display:none;">Gerando Escala de Sábado</h4>
  <div class="container" id="container_barra5" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra5" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala6" style="display:none;">Gerando Escala de Domingo</h4>
  <div class="container" id="container_barra6" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra6" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
 <BR>
  <h4 class="text-center" id="gerando_escala7" style="display:none;">Gerando Escala de segunda</h4>
  <div class="container" id="container_barra7" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped barra7" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>  
    <h4 class="text-center" id="gerando_docx" style="display:none;">Gerando Escala em docx</h4>
  <div class="container" id="container_docx" style="display:none;">
    <div class="progress">
      <div class="progress-bar progress-bar-success progress-bar-striped docx" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"></span>
      </div>
    </div>
  </div>
<center><button class="btn btn-primary mb-2" id="gerar_semana" type="button" style="margin:10%;border-color:#212529;background-color:black;color:white;">Gerar Semana</button><button class="btn btn-primary mb-2" type="submit" style="margin:10%;border-color:#212529;background-color:white;color:#212529;" id="salvar_escala" >Salvar Escala</button></center> 

 </div>
 
 

</body>
<script  src="jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src= "../zTree_v3-master/js/jquery.ztree.core.js"></script>

<script>
function unique(array) {
    return $.grep(array, function(el, index) {
        return index == $.inArray(el, array);
    });
}
$(document).ready(function(){
    $('#salvar_escala').click(function(){
		//lohran2
		ddaata=$('#Data1').val();
		var valor="data1="+$('#Data1').val()+"&data2="+$('#Data2').val()+"&data3="+$('#Data3').val()+"&data4="+$('#Data4').val()+"&data5="+$('#Data5').val()+"&data6="+$('#Data6').val()+"&data7="+$('#Data7').val()+"&escala=<?php echo explode(' ',$_POST['turma'])[0]; ?>";
$.ajax({ 
 type:"POST", 
 url: "salvar_teste.php", 
 data:valor,
  success: function(data){
    //alert("teste");
     console.log(valor);
	$("#container_docx").css("display","inline");
	$("#gerando_docx").css("display","inline");
	var progressBar = $(".docx"); 

    setInterval(addProgress, 250);	
	function addProgress() {
    var width = progressBar.width() + 8; //40
    progressBar.width(width);
    }

	     
    	setTimeout(
        function() 
        {
		window.location.href = 'SERVICO INTERNO TURMA <?php echo explode(" ",$_POST["turma"])[0];?>data '+ddaata+'.docx';
        //do something special
        }, 60000);	
    
	
	
    console.log(valor);
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
		//lohran2
	});
	$('#pega_intervalo').click(function(){
		$('.alert').css("display","none");
		var cadete=[];
		var dia=[];
		$('.tg-c6of').each(function(){
			
		  if($(this).html().split("CAD ").length>1)
		  {
		   //console.log($(this).html().split("CAD ")[1].split("<")[0]);
		   //console.log($(this).attr("id").split("_")[3]);
		   cadete.push($(this).html().split("CAD ")[1].split("<")[0]);
		   dia.push($(this).attr("id").split("_")[3]);
		  }			  
		});
		//$('#titulo_turma').append();
		var cadete2=unique(cadete); //lohran arraes bentemuller
		var dia2=[];
		for(j=0;j<cadete2.length;j++)
		{
		q="";
		 	for(i=0;i<cadete.length;i++)
			{
			   if(cadete2[j]==cadete[i]) 
			   {
                q=q+dia[i]+"|";			   
		       }
			}
		dia2.push(q);	
		}
		var alerts=[];
		var dia22=['terça','quarta','quinta','sexta','sabado','domingo','segunda'];
		for(i=0;i<dia2.length;i++)
		{
			var ordem=dia2[i].split("|").sort();
			ordem.shift();
			for(j=0;j<ordem.length;j++)
			{
			  if(j>0)
			  {
			   if(parseInt(ordem[j],10)-parseInt(ordem[j-1],10)<=1) // se tem dias seguidos
			   {
				  alerts.push('<div class="alert alert-danger" role="alert">'+ cadete2[i] +' trabalhando seguido entre  '+ dia22[parseInt(ordem[j-1])] +' e '+ dia22[parseInt(ordem[j])]+'</div>');
			   }
			   if(parseInt(ordem[j],10)-parseInt(ordem[j-1],10)==2) // se tem menos de 24 horas de servico
			   {
				  alerts.push('<div class="alert alert-warning" role="alert">'+ cadete2[i] +' com apenas 24 horas de descanso entre '+ dia22[parseInt(ordem[j-1])] +' e '+ dia22[parseInt(ordem[j])]+'</div>');
			   }			   
			   if(parseInt(ordem[j],10)-parseInt(ordem[j-1],10)==3) // se tem menos de 48 horas de servico
			   {
				  alerts.push('<div class="alert alert-success" role="alert">'+ cadete2[i] +' com apenas 48 horas de descanso entre '+ dia22[parseInt(ordem[j-1])] +' e '+ dia22[parseInt(ordem[j])]+'</div>');
			   }			   
			  }
			}
	        //console.log(ordem);
		}
		for(i=0;i<alerts.length;i++)
		{
			$('#titulo_turma').append(alerts[i]);
		}
		//console.log(cadete);
		//console.log(dia);
		console.log(cadete2);
		console.log(dia2);
		//ordena o vetor
		//subtrai 1 pelo outro
		//pega a diferenca, subtrai 1 e multiplica por 24
	    /*
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
<div class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>
<div class="alert alert-warning" role="alert">
  This is a warning alert—check it out!
</div>
     */		
    });

});
</script>

</html>

