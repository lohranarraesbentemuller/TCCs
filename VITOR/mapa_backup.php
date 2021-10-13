<?php include("config.php");
$sql="select * from mapa where id=".$_GET['id']." order by id";
//echo $sql;
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<html>
<head>
<style>
 .table2{
  width:1250px !important;
 }
 
</style>
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script> 
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<body id="pdf-iframe">
<div class="row" id="header" style="margin-top:0%;" >
    <table class="table"   > <!--style="background-color:#04336B;"#2E8B57#FFFFE0-->
	<tr>
    <div class="col-md-3 col-md-offset-9">
     <td style="margin-left:10%;">
	   <img id="pmdf" src="../ZEDES/RIV_PMDF_2017_Marca_PMDF_vertical_colorida_logotipo_branco.png" style="margin-left:25%;width:150px;height:auto;"  />
	 </td>
	 <td>
	 
 
	 
	   <div style="text-align:center; " id="texto_topo"  > <!--#708090-->
	   <h5 style="margin-right:10%;"><b>GOVERNO DO DISTRITO FEDERAL</b></h5>
	   <h5 style="margin-right:10%;"><i>POLÍCIA MILITAR DO DISTRITO FEDERAL</i></h5>
	   <h5 style="margin-right:10%;" id="batalhao"><?php echo $row['batalhao'];?></h5>
	   <!--<h5 style="margin-right:10%;"><b>Departamento de Educação e Cultura</b></h5>
	   <h5 style="margin-right:10%;"><b>Academia de Polícia Militar do Distrito Federal</b></h5>
	   <h5 style="margin-right:10%;"><b>Escola de Formação de Oficiais</b></h5><br>-->
	   <h5 style="margin-right:10%;"> <b>MAPA DE POLICIAMENTO DAS VIATURAS DO SERVIÇO</b></h5> <BR>
	   <?php
	   
	   $mes=array();
	   array_push($mes,'');
	   array_push($mes,'janeiro');
	   array_push($mes,'fevereiro');
	   array_push($mes,'março');
	   array_push($mes,'abril');
	   array_push($mes,'maio');
	   array_push($mes,'junho');
	   array_push($mes,'julho');
	   array_push($mes,'agosto');
	   array_push($mes,'setembro');
	   array_push($mes,'outubro');
	   array_push($mes,'novembro');
	   array_push($mes,'dezembro');
       $data=explode("-",$row['data'])[2]." de ".$mes[intval(explode("-",$row['data'])[1],10)]." de ".explode("-",$row['data'])[0];
	   
	   ?>
	   <h5 style="margin-right:10%;" id="data" class="data"> <b><?php echo $data;?></b> </h5> <button class="fa fa-check btn btn-info" id="data3" style="display:none;"></button> 
	   <h5 style="margin-right:10%;"> <b>DIURNO/NOTURNO</b> </h5>
	   <!--<h5 style="color:black;margin-right:10%;"><b> </b></h5>
	   <h5 style="color:black;margin-right:10%;"><b> </b></h5>
	   <h5 style="color:black;margin-right:10%;"><b> </b></h5>
	   <h5 style="color:black;margin-right:10%;"><b> </b></h5><br>
	   <h5 style="color:white;margin-right:10%;"><u><b>Formulário de Fato Observado</b></u></h5>-->	   
	   </div>
	 </td>
	 <td>
	   <img id="apmb" src="https://www.cfo2019.com/VITOR/MAPA%20DE%20VIATURAS%20DIURNO%20E%20NOTURNO%2006-07-2021_arquivos/image004.jpg" style="width:80px;height:auto;"  />
	 </td>
    </div>
	</tr>
	</table>
</div>
<center>
<table cellspacing="0" class="table2" style="border-collapse:collapse;margin-top:5%;">
	<tbody>
		<tr>
			<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:54px">
			<p>Prefixo</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:114px">
			<p>Comandante</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:132px">
			<p>Motorista</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:94px">
			<p>Patrulheiro</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:66px">
			<p>Telefone</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:238px">
			<p>Setor</p>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:22px; vertical-align:top; width:65px">
			<p>Hor&aacute;rio</p>
			</td>
		</tr>
		<?php 
		$sql="select * from mapa_categoria where  id_mapa=".$_GET['id']." order by nome";
		//echo $sql;
		//exit();
		$result=mysqli_query($db,$sql);
		$i=1;
		foreach($result as $row)
		{ //echo "AQUI";
			echo '<tr id="titulo'.$i.'" class="titulo">';
			echo '<td colspan="7" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:20px; vertical-align:top; width:764px">';
			echo '<center><p><strong>'.$row['nome'].'</strong><span style="margin-left:5px;font-size:11px" class="fa fa-plus btn btn-success"></span><span style="margin-left:5px;font-size:11px" class="fa fa-edit btn btn-warning"></span><span style="margin-left:5px;font-size:11px" class="fa fa-trash btn btn-danger"></span></p></center>';
			echo '</td>';
		echo '</tr>';
		   $sql="select * from mapa_categoria_vtr where id_categoria=".$row['id']." order by horario"; 
		   $result2=mysqli_query($db,$sql);
		   $j=1;
		   foreach($result2 as $row2)
		   {
		    echo '<tr id="titulo'.$i.'_'.$j.'" class="titulo'.$i.'">';
			echo '<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:54px">';
			echo '<p>'.$row2['prefixo'].'</p>';
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:114px">';
			echo '<p>'.$row2['comandante'].'</p>';	
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:132px">';
			echo '<p>'.$row2['motorista'].'</p>';
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:94px">';
			echo '<p>'.$row2['patrulheiro'].'</p>';
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:66px">';
			echo '<p>'.$row2['telefone'].'</p>';
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:238px">';
			echo '<p>'.$row2['setor'].'</p>';
			echo '</td>';
			echo '<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:12px; vertical-align:top; width:65px">';
			echo '<p>'.$row2['horario'].'</p>';
			echo '</td>';
		    echo '</tr>';
           $j=$j+1;		
		   }
		 $i=$i+1;
		}
 
 ?>
		 
	
        <tr style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:764px">
		<td colspan="7"><center><button class="btn btn-success" id="inserir_categoria">INSERIR CATEGORIA</button></center></td>
		</tr>
 
 
 
        <tr style="border:none;">
			<td colspan="3" style="text-align:center;height:157px; vertical-align:top; width:641px">
			<?php $sql="select * from mapa where id=".$_GET['id']." order by id";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			?>
			<BR><BR><BR><BR><p>__________________________________________</p><p id="nome_posto1"><?php echo $row['nome_posto1']?></p><p id="chefe1"><?php echo $row['chefe1']?></p><p>&nbsp;</p>			</td>
			<td colspan="4" style="text-align:center;height:157px; vertical-align:top; width:641px">
			<BR><BR><BR><BR><p>__________________________________________</p><p id="nome_posto2"><?php echo $row['nome_posto2']?></p><p id="chefe2"><?php echo $row['chefe2']?></p><p>&nbsp;</p>			</td>
		</tr>
	</tbody>
</table>
<button class="btn btn-primary" id="salvar">SALVAR MAPA <span class="fa fa-save"></span></button>
<button id="imprimir" style="margin-left:5%;" class="btn btn-secondary">IMPRIMIR MAPA<span class="fa fa-print"></span></button>
</center>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<script>
function confirmar(contadorr,contadorr2,titulo)
{
			 //var id=$(this).parent().parent().parent().attr("id");
			 //id="titulo"+id.split("contador")[1];
			 id="titulo"+contadorr;
			 numero=id.split("contador")[1];
             //console.log($('#prefixo'+id+'_'+contadorr2).parent().html());
			 //alert('#prefixo'+id+'_'+contadorr2);
			 $('#prefixo'+id+'_'+contadorr2).parent().html('<p>'+$('#prefixo'+id+'_'+contadorr2).val()+'</p>'); 
			 $('#COMANDANTE'+id+'_'+contadorr2).parent().html('<p>'+$('#COMANDANTE'+id+'_'+contadorr2).val()+'</p>');
			 $('#MOTORISTA'+id+'_'+contadorr2).parent().html('<p>'+$('#MOTORISTA'+id+'_'+contadorr2).val()+'</p>');
			 $('#PATRULHEIRO'+id+'_'+contadorr2).parent().html('<p>'+$('#PATRULHEIRO'+id+'_'+contadorr2).val()+'</p>');
			 $('#TELEFONE'+id+'_'+contadorr2).parent().html('<p>'+$('#TELEFONE'+id+'_'+contadorr2).val()+'</p>');
			 $('#SETOR'+id+'_'+contadorr2).parent().html('<p>'+$('#SETOR'+id+'_'+contadorr2).val()+'</p>');
			 $('#HORARIO'+id+'_'+contadorr2).parent().html('<p>'+$('#HORARIO'+id+'_'+contadorr2).val()+'</p>');
			 if(titulo)
			 {
				// alert('#titulo'+contadorr);
				 //alert($('#titulo'+contadorr).html());
				 //$('#titulo'+contadorr).html("lohran");
			 $('#tituloo'+contadorr).parent().html('<p><strong>'+$('#tituloo'+contadorr).val()+'</strong><span style="margin-left:5px;font-size:11px" class="fa fa-plus btn btn-success"></span><span style="margin-left:5px;font-size:11px" class="fa fa-edit btn btn-warning"></span><span style="margin-left:5px;font-size:11px" class="fa fa-trash btn btn-danger"></span></p>')
			 }
			
			//$(this).parent().parent().remove();
			 $('#confirmar'+contadorr+contadorr2).parent().parent().remove();
			 $('#cancelar'+contadorr+contadorr2).parent().remove();
			 //$('#confirmar').parent().parent().remove();
			 $('#inserir_categoria').css("display","inherit");	
}
function cancelar(contadorr,contadorr2,titulo)
{
	 //alert('#titulo'+contadorr+"_"+contadorr2);
	 if(!titulo)
	 {
	$('#titulo'+contadorr+"_"+contadorr2).remove();
	 }
	 else
	 {
		 $('#titulo'+contadorr+"_"+contadorr2).remove();
		 $('#titulo'+contadorr).remove();
		 $('#inserir_categoria').css("display","inherit");
	 }
}
var contador=6;
$(document).ready(function(){
	var titulo="";
	var prefixo="";
	var comandante="";
	var motorista="";
	var patrulheiro="";
	var telefone="";
	var setor="";
	var horario="";
	$('#imprimir').click(function(){
 
		$('.btn').css("display","none");
		//$('#inserir_categoria').parent().css("display","none");
		           window.print();
           
		   setTimeout(
  function() 
  {
    $('.btn').css("display","inline-block");
	$('#data3').css("display","none");
		//$('#inserir_categoria').parent().css("display","block");
  }, 5000);
		   return false;
	});
	$('#salvar').click(function(){
		$('.titulo').each(function(){
			id=$(this).attr("id");
			titulo+=($(this).find("strong").html())+"|";
			titulo2=$(this).find("strong").html();
			$("."+id).each(function(){
				//$(this).find("td").each(function(){
				//	alert($(this).find("p").html());
				//});
				prefixo+=titulo2+";"+$(this).find("td").eq(0).find("p").html()+"|";
				comandante+=titulo2+";"+$(this).find("td").eq(1).find("p").html()+"|";
				motorista+=titulo2+";"+$(this).find("td").eq(2).find("p").html()+"|";
				patrulheiro+=titulo2+";"+$(this).find("td").eq(3).find("p").html()+"|";
				telefone+=titulo2+";"+$(this).find("td").eq(4).find("p").html()+"|";
				setor+=titulo2+";"+$(this).find("td").eq(5).find("p").html()+"|";
				horario+=titulo2+";"+$(this).find("td").eq(6).find("p").html()+"|";
				//alert(horario);
			});
		});
		valor="titulo="+titulo;
		valor+="&prefixo="+prefixo;
		valor+="&comandante="+comandante;
		valor+="&motorista="+motorista;
		valor+="&patrulheiro="+patrulheiro;
		valor+="&telefone="+telefone;
		valor+="&setor="+setor;
		valor+="&horario="+horario;
		valor+="&id=<?php echo $_GET['id']?>";
		valor+="&batalhao="+$('#batalhao').html();
		valor+="&nome_posto1="+$('#nome_posto1').html();
		valor+="&nome_posto2="+$('#nome_posto2').html();
		valor+="&chefe1="+$('#chefe1').html();
		valor+="&chefe2="+$('#chefe2').html();
		var data=$('#data').find("b").html();
		var mes=[];
		mes.push("");
		mes.push("janeiro");
		mes.push("fevereiro");
		mes.push("março");
		mes.push("abril");
		mes.push("maio");
		mes.push("junho");
		mes.push("julho");
		mes.push("agosto");
		mes.push("setembro");
		mes.push("outubro");
		mes.push("novembro");
		mes.push("dezembro");
		
		mes2=$.inArray(data.split(" de ")[1],mes);
		 
		//alert(mes2.length);
		complemento="";
		if(mes2<10)
			complemento="0";
		data=data.split(" de ")[2]+"-"+complemento+mes2+"-"+data.split(" de ")[0]
		valor+="&data="+data;
		$.ajax({ 
 type:"POST", 
 url: "setmapa.php", 
 data:valor,
  success: function(data){
	    //alert(valor);
        alert("mapa salvo com sucesso");
		alert(data);
		console.log(data);
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
	$('#nome_posto1').dblclick(function(){
		s="<table><tr><td><input  id='posto1_input' class='form-control' value='"+$(this).html()+"'></input></td><td><button class='btn btn-info fa fa-check' id='salvar_posto1'></button></td></tr></table>";
		$(this).html(s)
	});
	$('#nome_posto2').dblclick(function(){
		s="<table><tr><td><input id='posto2_input' class='form-control' value='"+$(this).html()+"'></input></td><td><button class='btn btn-info fa fa-check' id='salvar_posto2'></button></td></tr></table>";
		$(this).html(s)
	});	
	$('#chefe1').dblclick(function(){
		s="<table><tr><td><input id='chefe1_input' class='form-control' value='"+$(this).html()+"'></input></td><td><button class='btn btn-info fa fa-check' id='salvar_chefe1'></button></td></tr></table>";
		$(this).html(s)
	});
	$('#chefe2').dblclick(function(){
		s="<table><tr><td><input id='chefe2_input' class='form-control' value='"+$(this).html()+"'></input></td><td><button class='btn btn-info fa fa-check' id='salvar_chefe2'></button></td></tr></table>";
		$(this).html(s)
	});		
	$(document).arrive('#salvar_posto1',function(){
		$('#salvar_posto1').click(function(){
			$('#nome_posto1').html($('#posto1_input').val());
			$(this).remove();
		});
	});
	$(document).arrive('#salvar_posto2',function(){
		$('#salvar_posto2').click(function(){
			$('#nome_posto2').html($('#posto2_input').val());
			$(this).remove();
		});
	});
	$(document).arrive('#salvar_chefe1',function(){
		$('#salvar_chefe1').click(function(){
			$('#chefe1').html($('#chefe1_input').val());
			$(this).remove();
		});
	});
	$(document).arrive('#salvar_chefe2',function(){
		$('#salvar_chefe2').click(function(){
			$('#chefe2').html($('#chefe2_input').val());
			$(this).remove();
		});
	});	
	
	  $('#batalhao').dblclick(function(){
		  s="";
s+="<select class='form-control' id='batalhoes'>";
s+="<option>1º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>2º BATALHÃO DE POLÍCIA MILITARa</option>";
s+="<option>3º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>4º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>5º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>6º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>7º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>8º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>9º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>10º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>11º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>12º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>13º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>14º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>15º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>16º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>17º BPM BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>19º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>20º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>21º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>24º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>25º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>26º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>27º BATALHÃO DE POLÍCIA MILITAR</option>";
s+="<option>28º BATALHÃO DE POLÍCIA MILITAR</option>";
s+='</select>';
$(this).html(s);
	  });
	$(document).arrive('#batalhoes',function(){
		$('#batalhoes').change(function(){
			var batalhao = $('#batalhao').find(":selected").text();
			//alert("AQUI");
			$('#batalhao').html(batalhao);
		});
	});
	  $('#data').dblclick(function(){
		  $('#data3').css("display","inherit");
		  var s="";
		  s+='<input class="form-control" name="data" id="data2" placeholder="01/01/1990" autocomplete="off"></input>';
		  $(this).html(s);
	  });
	  $(document).arrive('#data2',function(){	
		var date_input=$('input[name="data"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
		//format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	$('input[name="data"]').mask('00/00/0000');
	//$(document).arrive('#data3',function(){	
	
 
	
	 $('#data3').on("click keyup focusout",function(){
		 if($('#data2').val().length==10)
		 {
			// alert($('#data2').val().split("/")[1]);
			 if(parseInt($('#data2').val().split("/")[1])==1) mes="janeiro";
			 if(parseInt($('#data2').val().split("/")[1])==2) mes="fevereiro";
			 if(parseInt($('#data2').val().split("/")[1])==3) mes="março";
			 if(parseInt($('#data2').val().split("/")[1])==4) mes="abril";
			 if(parseInt($('#data2').val().split("/")[1])==5) mes="maio";
			 if(parseInt($('#data2').val().split("/")[1])==6) mes="junho";
			 if(parseInt($('#data2').val().split("/")[1])==7) mes="julho";
			 if(parseInt($('#data2').val().split("/")[1])==8) mes="agosto";
			 if(parseInt($('#data2').val().split("/")[1])==9) mes="setembro";
			 if(parseInt($('#data2').val().split("/")[1])==10) mes="outubro";
			 if(parseInt($('#data2').val().split("/")[1])==11) mes="novembro";
			 if(parseInt($('#data2').val().split("/")[1])==12) mes="dezembro";
			 s=$('#data2').val().split("/")[0]+" de " + mes + " de "+ $('#data2').val().split("/")[2];
			 //$("#data2").parent().parent().parent().parent().parent().html(' <b>'+s+'</b> ');
			 $("#data2").parent().html(' <b>'+s+'</b> ');
			 $('#data3').css("display","none");
		 }
	 });
	// });
	  });
	$('.fa-plus').click(function(){
		//alert($(this).parent().parent().parent().parent().attr("id"));
		var id=($(this).parent().parent().parent().parent().attr("id"));
		var contador2=1;
		$('.'+id).each(function(){
			//alert($(this).attr("id"));
			contador2=parseInt($(this).attr("id").split("_")[1]);
			//alert(contador2);
		});
		contador2=contador2+1;
		var s="";
		s+='<tr id="'+id+'_'+contador2+'" class="'+id+'">';
		s+='<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:54px">';
		s+='	<input class="form-control" id="prefixo'+id+'_'+contador2+'" placeholder="prefixo"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:114px">';
		s+='	<input class="form-control" id="COMANDANTE'+id+'_'+contador2+'" placeholder="COMANDANTE"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:132px">';
		s+='	<input class="form-control" id="MOTORISTA'+id+'_'+contador2+'" placeholder="MOTORISTA"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:94px">';
		s+='	<input class="form-control" id="PATRULHEIRO'+id+'_'+contador2+'" placeholder="PATRULHEIRO"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:66px">';
		s+='	<input class="form-control" id="TELEFONE'+id+'_'+contador2+'" placeholder="TELEFONE"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:238px">';
		s+='	<input class="form-control" id="SETOR'+id+'_'+contador2+'" placeholder="SETOR"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:65px">';
		s+='	<input class="form-control" id="HORARIO'+id+'_'+contador2+'" placeholder="HORARIO"></input>';
		s+='	</td>';
		//s+='</tr>	';
		//s+='<tr id="contador'+id.split("titulo")[1]+'">';
		s+='<td colspan=7><center><button class="btn btn-info fa fa-check" id="confirmar'+id.split("titulo")[1]+contador2+'" onclick="confirmar('+id.split("titulo")[1]+','+contador2+',false)"></button></center></td><td><button id="cancelar'+id.split("titulo")[1]+contador2+'" class="btn btn-danger fa fa-times" onclick="cancelar('+id.split("titulo")[1]+','+contador2+',false)"></button></td>'
		s+='</tr>';		
		
		$('#'+id+"_"+(contador2-1)).after(s);
		//alert('#'+id+"_"+(contador2-1)); 
	});
	$('.fa-trash').click(function(){
		var id=($(this).parent().parent().parent().parent().attr("id"));
		$('#'+id).remove();
		$('.'+id).each(function(){
			$(this).remove();
		});
		//contador=contador-1;
	});	
	$('.fa-edit').click(function(){
		var id=($(this).parent().parent().parent().parent().attr("id"));
		var contador2=1;
		$('.'+id).each(function(){
			//alert($(this).attr("id"));
			//contador2=parseInt($(this).attr("id").split("_")[1]);
			 
			$(this).find("td").eq(0).html('<input class="form-control" id="prefixo'+id+'_'+contador2+'" value="'+$(this).find("td").eq(0).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(1).html('<input class="form-control" id="COMANDANTE'+id+'_'+contador2+'" value="'+$(this).find("td").eq(1).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(2).html('<input class="form-control" id="MOTORISTA'+id+'_'+contador2+'" value="'+$(this).find("td").eq(2).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(3).html('<input class="form-control" id="PATRULHEIRO'+id+'_'+contador2+'" value="'+$(this).find("td").eq(3).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(4).html('<input class="form-control" id="TELEFONE'+id+'_'+contador2+'" value="'+$(this).find("td").eq(4).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(5).html('<input class="form-control" id="SETOR'+id+'_'+contador2+'" value="'+$(this).find("td").eq(5).html().split("<p>")[1].split("</p>")[0]+'">');
			$(this).find("td").eq(6).html('<input class="form-control" id="HORARIO'+id+'_'+contador2+'" value="'+$(this).find("td").eq(6).html().split("<p>")[1].split("</p>")[0]+'">');
			var s="";
			//s+='<tr id="contador'+id.split("titulo")[1]+'">';
		    s+='<td colspan=7><center><button class="fa fa-check btn btn-info" id="confirmar'+id.split("titulo")[1]+contador2+'" onclick="confirmar('+id.split("titulo")[1]+','+contador2+',false)"></button></center></td>';
			s+='<td colspan=7><center><button class="fa fa-times btn btn-danger" id="cancelar'+id.split("titulo")[1]+contador2+'" onclick="cancelar('+id.split("titulo")[1]+','+contador2+',false)"></button></center></td>';
		   // s+='</tr>';	
			//<input class="form-control" id="prefixotitulo2_2" placeholder="prefixo">
			//alert(contador2);
			$(this).find("td").eq(6).after(s);
			contador2++;
		});
	});	
	$('#inserir_categoria').click(function(){
		contador=contador+1;
		var s="<tr id='titulo"+contador+"' class='titulo'>";
		s+='	<td colspan="7" style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:764px">';
		s+='	<center><input class="form-control" id="tituloo'+contador+'"></input></center>';
		s+='	</td>		';
		s+="</tr>";
		s+='<tr id="titulo'+contador+'_1" class="titulo'+contador+'">';
		s+='<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:54px">';
		s+='	<input class="form-control" id="prefixotitulo'+contador+'_1" placeholder="prefixo"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:114px">';
		s+='	<input class="form-control" id="COMANDANTEtitulo'+contador+'_1" placeholder="COMANDANTE"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:132px">';
		s+='	<input class="form-control" id="MOTORISTAtitulo'+contador+'_1" placeholder="MOTORISTA"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:94px">';
		s+='	<input class="form-control" id="PATRULHEIROtitulo'+contador+'_1" placeholder="PATRULHEIRO"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:66px">';
		s+='	<input class="form-control" id="TELEFONEtitulo'+contador+'_1" placeholder="TELEFONE"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:238px">';
		s+='	<input class="form-control" id="SETORtitulo'+contador+'_1" placeholder="SETOR"></input>';
		s+='	</td>';
		s+='	<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:16px; vertical-align:top; width:65px">';
		s+='	<input class="form-control" id="HORARIOtitulo'+contador+'_1" placeholder="HORARIO"></input>';
		s+='	</td>';

		
		//s+='</tr>	';
		//s+='<tr id="contador'+contador+'">';
		var contador2=1;
		//s+='<td colspan=7><center><button class="fa fa-check btn btn-info" id="confirmar'+contador+contador2+'"  onclick="confirmar('+contador+','+contador2+',true)"></button></center></td><td><button class="btn btn-danger fa fa-times" onclick="cancelar('+contador+','+contador2+',true)" id="cancelar+'contador+contador2+'"></button></td>'
		  s+='<td colspan=7><center><button class="btn btn-info fa fa-check" id="confirmar'+contador+contador2+'"  onclick="confirmar('+contador+','+contador2+',true)"></button></center></td><td><button class="btn btn-danger fa fa-times" onclick="cancelar('+contador+','+contador2+',true)" id="cancelar'+contador+contador2+'"></button></td>'
		s+='</tr>';		
		//s+='<tr>';
		//s+='<button class="btn btn-info" id="confirmar">Confirmar</button>'
		//s+='</tr>';
		
		$(this).parent().parent().parent().before(s);
		$(this).css("display","none");
	});
	 $(document).arrive('#confirmar',function(){	
	   //  $('#confirmar').click(function(){
			// alert("AQUI");
		/*	 var id=$(this).parent().parent().parent().attr("id");
			 id="titulo"+id.split("contador")[1];
			 numero=id.split("contador")[1];
			// alert(id);
			 $('#prefixo'+id+'_1').parent().html('<p>'+$('#prefixo'+id+'_1').val()+'</p>');
			 $('#COMANDANTE'+id+'_1').parent().html('<p>'+$('#COMANDANTE'+id+'_1').val()+'</p>');
			 $('#MOTORISTA'+id+'_1').parent().html('<p>'+$('#MOTORISTA'+id+'_1').val()+'</p>');
			 $('#PATRULHEIRO'+id+'_1').parent().html('<p>'+$('#PATRULHEIRO'+id+'_1').val()+'</p>');
			 $('#TELEFONE'+id+'_1').parent().html('<p>'+$('#TELEFONE'+id+'_1').val()+'</p>');
			 $('#SETOR'+id+'_1').parent().html('<p>'+$('#SETOR'+id+'_1').val()+'</p>');
			 $('#HORARIO'+id+'_1').parent().html('<p>'+$('#HORARIO'+id+'_1').val()+'</p>');
			 $('#titulo'+contador).parent().html('<p><strong>'+$('#titulo'+contador).val()+'</strong><span style="margin-left:5px;font-size:11px" class="fa fa-plus btn btn-success"></span><span style="margin-left:5px;font-size:11px" class="fa fa-edit btn btn-warning"></span><span style="margin-left:5px;font-size:11px" class="fa fa-trash btn btn-danger"></span></p></center>')
			 $(this).parent().parent().remove();
			 $('#inserir_categoria').css("display","inherit"); */
		// });
	 });
});
</script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
</html>