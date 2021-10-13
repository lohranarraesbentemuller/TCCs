<?
include("config.php");
include("session.php");
header("location:buscar_mapa.php");
?>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<!--<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">-->
    <!--<meta name="viewport" content="width=device-width,initial-scale=1">-->
	<!--<meta name="viewport" content="width=device-width, initial-scal=1, maximum-scale=1, user-scalable=0"/>-->
	<meta name="viewport" content="width=device-width,initial-scale=0.5,user-scalable=yes">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script> 
	<!--<script src="../jquery-ui-1.12.1/jquery-ui.js"></script>-->
	<script src='../Mobile-Drag-Drop-Plugin-jQuery/src/draganddrop.js' type='text/javascript'></script>
  <link href="../jquery-ui-1.12.1/jquery-ui.css" type="text/css" rel="stylesheet" />
    <style>
  .fa{
    font-family: "Font Awesome 5 Free" !important;
  }
  </style>
  <?php include("menu.php");
  //include("sopraver_menu.php");
  ?>
 
 
  <script>
   $(document).ready(function(){
	   $(document).arrive('#upm_escolha',function(){	
	      $('#upm_escolha').click(function(){
			  $(this).focus();
		  });
		  $('#enviar_upm').click(function(){
			  $('#UPM').html('<p>'+$('#upm_escolha').val()+'</p>');
		  });
	   });
	   
	   $(document).arrive('#enviar_cmt',function(){	

		  $('#enviar_cmt').click(function(){
			  $('#cmt_1').html('<p>_________________________</p><p>'+$('#cmt1_escolha').val()+'</p>');
			  $('#cmt_2').html('<p>'+$('#cmt2_escolha').val()+'</p>');
		  });
	   });	   
	   
	    $(document).arrive('#escolha_brasao',function(){	
		   $('#escolha_brasao').change(function(){
			   $( "#escolha_brasao option:selected" ).each(function() {
               // alert($( this ).text());
				$('#brasoes').html("<img src='./PMDF-brasoesPNG/"+$(this).text()+".png' style='height:108px; width:92px' />");
    });
		   });
		});
		$(document).arrive('#os_escolha',function(){
			$('#enviar_os').click(function(){
				$('#os').html("ORDEM DE SERVI&Ccedil;O N&ordm; "+$('#os_escolha').val());
			});
		});
		$(document).arrive('#enderecado_escolha',function(){
			$('#enviar_enderecado').click(function(){
				$('#enderecado').html("Ao(s): "+$('#enderecado_escolha').val());
			});
		});

		$(document).arrive('#referencia_escolha',function(){
			$('#enviar_referencia').click(function(){
				$('#referencia').html("Referência: "+$('#referencia_escolha').val());
			});
		});	
		$(document).arrive('#evento_escolha',function(){
			$('#enviar_evento').click(function(){
				$('#evento').html("Evento: "+$('#evento_escolha').val());
			});
		});	

		$(document).arrive('#data_escolha',function(){
			$('#data_escolha').mask('00/00/0000');
			$('#data_escolha2').mask('00/00/0000');
			$('#enviar_data').click(function(){
				$('#data').html("Data: "+$('#data_escolha').val()+" a "+ $('#data_escolha2').val());
			});
		});
		
		$(document).arrive('#horario_escolha',function(){
			$('#horario_escolha').mask('00:00');
			$('#horario_escolha2').mask('00:00');
			$('#enviar_horario').click(function(){
				$('#horario').html("Horário: "+$('#horario_escolha').val()+" as " + $('#horario_escolha2').val());
			});
		});		

		$(document).arrive('#local_escolha',function(){
			$('#enviar_local').click(function(){
				$('#local').html("Local: "+$('#local_escolha').val());
			});
		});			

		$(document).arrive('#TSE_escolha',function(){
			$('#TSE_escolha').change(function(){
				
				 $( "#TSE_escolha option:selected" ).each(function() {
					 //alert($(this).text());
                   //str += $( this ).text() + " ";
				   if($(this).text()=="não")
				   {
				   $('#TSE').html("TSE: (  ) sim    (X) não");
				   }
				   else{
				   $('#TSE').html("TSE: (X) sim    (  ) não");	   
				   }
                  });
				
			});
		});	

		$(document).arrive('#efetivo_escolha',function(){
			$('#enviar_efetivo').click(function(){
				$('#efetivo').html("Efetivo: "+$('#efetivo_escolha').val());
			});
		});			

		$(document).arrive('#duracao_escolha',function(){
			$('#enviar_duracao').click(function(){
				$('#duracao').html("Duracao: "+$('#duracao_escolha').val());
			});
		});	

		$(document).arrive('#uniforme_escolha',function(){
			$('#enviar_uniforme').click(function(){
				$('#uniforme').html("Uniforme: "+$('#uniforme_escolha').val());
			});
		});	

		$(document).arrive('#equipamento_escolha',function(){
			$('#enviar_equipamento').click(function(){
				$('#equipamento').html("Equipamento: "+$('#equipamento_escolha').val());
			});
		});	
		
		$(document).arrive('#armamento_escolha',function(){
			$('#enviar_armamento').click(function(){
				$('#armamento').html("Armamento: "+$('#armamento_escolha').val());
			});
		});			
		
		$(document).arrive('#situacao_escolha',function(){
			$('#enviar_situacao').click(function(){
				$('#situacao').html("Situação: "+$('#situacao_escolha').val());
			});
		});			

		$(document).arrive('#missao_escolha',function(){
			$('#enviar_missao').click(function(){
				$('#missao').html("Missão do Policiamento: "+$('#missao_escolha').val());
			});
		});			

		$(document).arrive('#prescricoes_escolha',function(){
			CKEDITOR.replace( 'prescricoes_escolha' );
			$('#enviar_prescricoes').click(function(){
				$('#prescricoes').html("<p>Prescrições diversas:</p><BR>"+CKEDITOR.instances['prescricoes_escolha'].getData());
			});
		});			

		$(document).arrive('#local_data_escolha',function(){
			$('#enviar_local_data').click(function(){
				$('#local_data').html($('#local_data_escolha').val());
			});
		});			
		
		$(document).arrive('#nome_posto_escolha',function(){
			$('#enviar_nome_posto').click(function(){
				$('#nome_posto').html($('#nome_posto_escolha').val());
			});
		});		
		
		$(document).arrive('#chefe_escolha',function(){
			$('#enviar_chefe').click(function(){
				$('#chefe').html($('#chefe_escolha').val());
			});
		});				
		//DBLCLICKs
 
	   $('#UPM').dblclick(function(){
		   $('#UPM').html("<input class='form-control' id='upm_escolha' placeholder='digite a UPM'></input><button id='enviar_upm' class='fa fa-check' ></button>");
	   });
	   
	   $('#cmt_1, #cmt_2').dblclick(function(){
		   $('#cmt_1').html("<input class='form-control' id='cmt1_escolha' placeholder='NOME COMPLETO DO ASSINANTE'></input>");
		   $('#cmt_2').html("<input class='form-control' id='cmt2_escolha' placeholder='CARGO DO ASSINANTE'></input><button id='enviar_cmt' class='fa fa-check' ></button>");
	   });
		$('#os').dblclick(function(){
			//$('#os').html("ORDEM DE SERVI&Ccedil;O N&ordm; ");
			$('#os').html("<input class='form-control' id='os_escolha' placeholder='numero da os'></input><button class='fa fa-check' id='enviar_os'></button>")
		});	   
	   
	   $('#enderecado').dblclick(function(){
		   $('#enderecado').html("<input class='form-control' id='enderecado_escolha' placeholder='Interessados'></input><button class='fa fa-check' id='enviar_enderecado'></button>")
	   });
	   
	   $('#referencia').dblclick(function(){
		   $('#referencia').html("<input class='form-control' id='referencia_escolha' placeholder='referencia'></input><button class='fa fa-check' id='enviar_referencia'></button>")
	   });	   
	   
	   $('#evento').dblclick(function(){
		   $('#evento').html("<input class='form-control' id='evento_escolha' placeholder='evento'></input><button class='fa fa-check' id='enviar_evento'></button>")
	   });	 
	   $('#data').dblclick(function(){
		   $('#data').html("<input class='form-control' id='data_escolha' placeholder='DD/MM/AAAA inicio'></input><input class='form-control' id='data_escolha2' placeholder='DD/MM/AAAA fim'></input><button class='fa fa-check' id='enviar_data'></button>")
	   });	   
	 
	   $('#horario').dblclick(function(){
		   var s="<input class='form-control' id='horario_escolha' placeholder='horario inicio'></input>";
		   s+="<input class='form-control' id='horario_escolha2' placeholder='horario fim'></input>";
		   s+="<button class='fa fa-check' id='enviar_horario'></button>"
		   $('#horario').html(s)
	   });
	   
	   $('#local').dblclick(function(){
		   $('#local').html("<input class='form-control' id='local_escolha' placeholder='Endereço'></input><button class='fa fa-check' id='enviar_local'></button>")
	   });	   
	   $('#TSE').dblclick(function(){
		   $('#TSE').html("<select class='form-control' id='TSE_escolha'><option></option><option>sim</option><option>não</option></select>")
	   });
	   $('#efetivo').dblclick(function(){
		   $('#efetivo').html("<input class='form-control' id='efetivo_escolha' placeholder='efetivo'></input><button class='fa fa-check' id='enviar_efetivo'></button>")
	   });	   
	   $('#duracao').dblclick(function(){
		   $('#duracao').html("<input class='form-control' id='duracao_escolha' placeholder='Duração'></input><button class='fa fa-check' id='enviar_duracao'></button>")
	   });	   
	   	   $('#uniforme').dblclick(function(){
		   $('#uniforme').html("<input class='form-control' id='uniforme_escolha' placeholder='Uniforme'></input><button class='fa fa-check' id='enviar_uniforme'></button>")
	   });	   
	   $('#equipamento').dblclick(function(){
		   $('#equipamento').html("<input class='form-control' id='equipamento_escolha' placeholder='equipamento'></input><button class='fa fa-check' id='enviar_equipamento'></button>")
	   });	   
	   $('#armamento').dblclick(function(){
		   $('#armamento').html("<input class='form-control' id='armamento_escolha' placeholder='armamento'></input><button class='fa fa-check' id='enviar_armamento'></button>")
	   });	   	   

	   $('#situacao').dblclick(function(){
		   $('#situacao').html("<textarea  rows='5' class='form-control' id='situacao_escolha'></textarea><button class='fa fa-check' id='enviar_situacao'></button>")
	   });	   	   	   
	   
	   $('#missao').dblclick(function(){
		   $('#missao').html("<textarea  rows='7' class='form-control' id='missao_escolha'></textarea><button class='fa fa-check' id='enviar_missao'></button>")
	   });		   
	   
	   $('#prescricoes').dblclick(function(){
		   $('#prescricoes').html("<p>Prescrições diversas:</p><br><textarea  rows='7' class='form-control' name='prescricoes_escolha' id='prescricoes_escolha'></textarea><button class='fa fa-check' id='enviar_prescricoes'></button>")
	   });	 
	   
	   $('#local_data').dblclick(function(){
		    $('#local_data').html("<input class='form-control' id='local_data_escolha' placeholder='Brasília, 06  de Maio  de 2021.'></input><button class='fa fa-check' id='enviar_local_data'></button>");
	   });

	   $('#nome_posto').dblclick(function(){
		    $('#nome_posto').html("<input class='form-control' id='nome_posto_escolha' placeholder='NOME – POSTO'></input><button class='fa fa-check' id='enviar_nome_posto'></button>");
	   });
	   
	   $('#chefe').dblclick(function(){
		    $('#chefe').html("<input class='form-control' id='chefe_escolha' placeholder=' '></input><button class='fa fa-check' id='enviar_chefe'></button>");
	   });	   
	   
	 
	   $('#brasoes').dblclick(function(){
		   
		   var valor="";
		   valor+="";
	   	$.ajax({ 
 type:"POST", 
 url: "getbrasoes.php", 
 data:valor,
  success: function(data){
	    
        var s="<select id='escolha_brasao' class='form-control'><option></option>";
		for(i=0;i<data.split("#").length;i++)
		{
			s+='<option>'+data.split("#")[i].split(".")[0]+'</option>';
		}
	s=s+"<select>";
	$('#brasoes').html(s);
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
		   
		   
		   
	   });// fim brasoes
	   
   });
  </script> 
 
<div class="row" style="margin-top:10%;" id="tudo">
 <?php
 $flag=False; 
 if(isset($_GET['id']))
 {
	 $flag=True;
	 $sql="select * from OS";
	 $result=mysqli_query($db,$sql);
	 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 $sql="select * from OS2";
	 $result=mysqli_query($db,$sql);
	 $row2=mysqli_fetch_array($result,MYSQLI_ASSOC);	 
 }
?>
<table align="center" cellspacing="0" style="border-collapse:collapse; width:641px">
	<tbody>
		<tr>
			<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:129px; width:90px">
			<?php if($flag)
			{
				echo '<p id="brasoes">'.$row2['brasoes'].'</p>';
			}
			else{
			    echo '<p id="brasoes"><img src="./PMDF-brasoesPNG/61_brasao_APMB.png" style="height:108px; width:92px" /></p>';
			}
			?>
			</td>
			<td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:129px; vertical-align:top; width:334px">
			<p>GOVERNO DO DISTRITO FEDERAL</p>

			<p>POL&Iacute;CIA MILITAR DO DISTRITO FEDERAL</p>
             <?php if($flag)
			 {
				 echo "<p id='UPM'>".str_replace("</p>","",str_replace("<p>","",$row['UPM']))."</p>";
			 }
			 else{
			echo '<p id="UPM">ACADEMIA DE POL&Iacute;CIA MILITAR DE BRAS&Iacute;LIA</p>';
			
			 }
			 ?>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:129px; vertical-align:bottom; width:217px">
			<?php
			if($flag)
			{
			echo '<p id="cmt_1">_________________________ '.str_replace("</p>","",str_replace("<p>","",$row2['cmt1'])).'</p>';

			echo '<p  id="cmt_2">'.str_replace("</p>","",str_replace("<p>","",$row2['cmt2'])).'</p>';
				
			}
			else{
			echo '<p id="cmt_1">_________________________ WILLIAN DELANO MARQUES DE ARA&Uacute;JO</p>';

			echo '<p  id="cmt_2">CEL &ndash; Cmt da APMB</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
				echo '<p id="os">ORDEM DE SERVI&Ccedil;O N&ordm; '.$row['os'].'</p>';
			}
			else{
			echo '<p id="os">ORDEM DE SERVI&Ccedil;O N&ordm; 00000/P-3</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:424px">
			<?php
			if ($flag)
			{
				echo '<p id="enderecado">'.$row2['enderecado'].'</p>';
			}
			else{
				
			echo '<p id="enderecado">Ao(s):SUPERVISOR/SVG</p>';
			}
			?>
			</td>
			<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:217px">
			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:279px">
			<?php
			if($flag)
			{
			echo '<p id="referencia">Refer&ecirc;ncia: '.$row['referencia'].'</p>';	
			}
			else{
			echo '<p id="referencia">Refer&ecirc;ncia: SEI n&ordm; 00000-0000000/2021-48.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
			}
			?>
			</td>
			<td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:361px">
			<?php
			if($flag)
			{
			echo '<p id="evento">'.$row2['evento'].'</p>';
			}
			else{
			echo '<p id="evento">Evento: Passeio cicl&iacute;stico</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:279px">
			<?php
			if($flag)
			{
			   echo '<p id="data">Data:'.explode("-",$row['data'])[2]."/".explode("-",$row['data'])[1]."/".explode("-",$row['data'])[0].' a '.explode("-",$row['data_fim'])[2]."/".explode("-",$row['data_fim'])[1]."/".explode("-",$row['data_fim'])[0].'</p>';
			}
			else{
				echo '<p id="data">Data:06/05/2021 a 08/06/2021</p>';
			}
			?>
			</td>
			<td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:361px">
			<?php
			if($flag)
			{
			echo '<p id="horario">Hor&aacute;rio:'.substr($row['hora_inicio'],0,-3).' as '.substr($row['hora_fim'],0,-3).' horas</p>';
			}
			else{
			echo '<p id="horario">Hor&aacute;rio:15:00 as 21:00 horas</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
			echo '<p id="local">'.$row2['local'].'</p>';
			}
			else{
				echo '<p id="local">Local: Estacionamento 13 do parque da cidade</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
			 echo '<p id="TSE">'.$row2['TSE'].'</p>';
			}
			else{
				echo '<p id="TSE">TSE: (&nbsp; ) sim&nbsp;&nbsp;&nbsp; (X) n&atilde;o</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
			    echo '<p id="efetivo">'.$row2['efetivo'].'</p>';
			}
			else{
				echo '<p id="efetivo">Efetivo: 02 policiais com moto e 02 policiais POG</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:279px">
			<?php
			if($flag)
			{			
			echo '<p id="duracao">'.$row2['duracao'].'</p>';
			}
			else{
				echo '<p id="duracao">Dura&ccedil;&atilde;o: 07 horas</p>';
			}
			?>
			</td>
			<td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:361px">
			<?php
			if($flag)
			{						
			echo '<p id="uniforme">'.$row2['uniforme'].'</p>';
			}
			else{
				echo '<p id="uniforme">Uniforme: 6a</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:279px">
			<?php
			if($flag)
			{								
			echo '<p id="equipamento">'.$row['equipamento'].'</p>';
			}
			else{
				echo '<p id="equipamento">Equipamento: tonfa , espargidor</p>';
			}
			?>
			</td>
			<td colspan="2" style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:361px">
			<?php
			if($flag)
			{										
			echo '<p id="armamento">'.$row2['armamento'].'</p>';
			}
			else{
				echo '<p id="armamento">Armamento: PT .40 24/7 PRO DS , 3 carregadores</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:74px; vertical-align:top; width:641px">
			<ol>
			<?php
			if($flag)
			{	
			
				echo '<li id="situacao">'.$row2['situacao'].'</li>';
			}
			else{
				echo '<li id="situacao">Situa&ccedil;&atilde;o: Assegurar a manuten&ccedil;&atilde;o da sensa&ccedil;&atilde;o de seguran&ccedil;a da popula&ccedil;&atilde;o do DF, imprimindo maior visibilidade ao policiamento ostensivo levado a efeito nas ruas do Distrito Federal, demonstrando, desta forma, a presen&ccedil;a diuturna da PMDF, mesmo diante do grave cen&aacute;rio que acomete o Distrito Federal, e proporcionando, consequentemente, maior tranquilidade aos cidad&atilde;os;</li>';
			}
			?>
			</ol>

			<p>&nbsp;</p>
			</td>
		</tr>
		<tr>
			<td colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:102px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
			echo '<p id="missao">'.$row2['missao'].'</p>';
			}
			else{
				echo '<p id="missao">Miss&atilde;o do Policiamento: Realizar patrulhamento para assegurar a integridade do patrim&ocirc;nio p&uacute;blico e privado, com especial aten&ccedil;&atilde;o &agrave;s &aacute;reas isoladas do parque, sobretudo no per&iacute;odo noturno</p>';
			}
			?>
			</td>
		</tr>
		<tr>
			<td  id="prescricoes" colspan="4" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:157px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
				echo $row2['prescricoes'];
			}
			else{
				echo '<p>Prescri&ccedil;&otilde;es diversas:</p>';

			echo '<ol>';
				echo '<li>O mais antigo dever&aacute; fazer contato com o SUPERVISOR DA &Aacute;REA para informar a presen&ccedil;a do Policiamento;</li>';
				echo '<li>Em caso de ocorr&ecirc;ncia de vulto, que gere repercuss&atilde;o ou envolva policiais militares ou outras autoridades, dever&aacute; comunicar de imediato ao adjunto que imediatamente deve informar ao supervisor</li>';
				echo '<li>RF de 1 hora, alternando entre as equipes.</li>';
			echo '</ol>';

			echo '<p>&nbsp;</p>';
				
			}
			?>
			
			</td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center;border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:157px; vertical-align:top; width:641px">
			<?php
			if($flag)
			{
			echo '<p id="local_data">'.$row2['local_data'].'</p>';

			echo '<p>__________________________________________</p>';

			echo '<p id="nome_posto">'.$row2['nome_posto'].'</p>';

			echo '<p id="chefe">'.$row2['chefe'].'</p>';

			echo '<p>&nbsp;</p>';
			}
			else{
			echo '<p id="local_data">Brasília, 29 de Junho de 2021</p>';

			echo '<p>__________________________________________</p>';

			echo '<p id="nome_posto">NOME - POSTO</p>';

			echo '<p id="chefe">Chefe do P3</p>';

			echo '<p>&nbsp;</p>';				
			}
			?>
			</td>
		</tr>
	</tbody>
</table>
 
</div>
<div class="row">
  <div class="col" style="margin-left:40%;margin-top:5%;">
   <center><button class="btn btn-dark" id="enviar_tabela">Cadastrar OS</button></center>
  </div>
<div class="container" style="margin-top:10%;display:none;">
<h5 >Atualizar Informações</h5>
<input class="form-control" class="data" id="data_saida" placeholder="Data de saída"></input>
<input class="form-control" class="hora" id="hora_saida" placeholder="Horário de saída"></input>
<input class="form-control" class="data" id="data_volta" placeholder="Data de retorno"></input>
<input class="form-control" class="hora" id="hora_volta" placeholder="Horário de retorno"></input>
<input class="form-control" id="motivo" placeholder="motivo"></input>
<table><tr><td><button id="atualizar" class="btn btn-warning">Atualizar</button></td><td><button id="enviar" class="btn btn-primary">Enviar</button></td></tr></table>
</div>
</div>
 
<script>
$(document).ready(function(){
	
 
	 $('#enviar_tabela').click(function(){
		 var valor="";
		 valor+="os="+$("#os").html().split("ORDEM DE SERVIÇO Nº ")[1];
		 valor+="&referencia="+$("#referencia").html().split("Referência:")[1];
		 var data_inicio=$("#data").html().split("Data:")[1].split(" a ")[0];
		 data_inicio=$.trim(data_inicio.split("/")[2])+"-"+$.trim(data_inicio.split("/")[1])+"-"+$.trim(data_inicio.split("/")[0]);
		 var data_fim=$("#data").html().split(" a ")[1];
		 data_fim=data_fim.split("/")[2]+"-"+data_fim.split("/")[1]+"-"+data_fim.split("/")[0];		 
		 var horario_inicio=$('#horario').html().split("Horário:")[1].split(" as ")[0];
		 var horario_fim=$('#horario').html().split(" as ")[1].split(" horas")[0];
		 horario_inicio+=":00";
		 horario_fim+=":00";
		 alert(data_inicio);
		 valor+="&data="+data_inicio;
		 valor+="&data_fim="+data_fim;
		 valor+="&hora_inicio="+horario_inicio;
		 valor+="&hora_fim="+horario_fim;
		 valor+="&upm="+$('#UPM').html();
		 
		 //teste
         valor+="&cmt1="+$('#cmt_1').html();
		 valor+="&cmt2="+$('#cmt_2').html();
		 valor+="&enderecado="+$('#enderecado').html();
		 valor+="&local="+$('#local').html();
		 valor+="&TSE="+$('#TSE').html();
		 valor+="&efetivo="+$('#efetivo').html();
		 valor+="&duracao="+$('#duracao').html();
		 valor+="&uniforme="+$('#uniforme').html();
		 valor+="&equipamento="+$('#equipamento').html();
		 valor+="&armamento="+$('#armamento').html();		 
         valor+="&situacao="+$('#situacao').html();		 
         valor+="&missao="+$('#missao').html();		 
         valor+="&prescricoes="+$('#prescricoes').html();		 
         valor+="&local_data="+$('#local_data').html();		 		 
         valor+="&nome_posto="+$('#nome_posto').html();
         valor+="&chefe="+$('#chefe').html();
         valor+="&brasoes="+$('#brasoes').html();		 
		 valor+="&evento="+$('#evento').html();		 
		<?php
		if($flag)
		{
 	     echo "valor+='&flag=editar';";
		 echo "valor+='&id=".$_GET['id']."';";
		}
		else{
	     echo "valor+='&flag=inserir';		";
		}
		 ?>
		 //teste
		 
		 
		
			   	$.ajax({ 
 type:"POST", 
 url: "salvar_os.php", 
 data:valor,
  success: function(data){
	   // alert(valor);
	   console.log(data);
		console.log(valor);
        alert("OS salva no banco de dados");
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
		
		
		 
	 }); //fim tabela
	 
	 
});
</script> 
 
 
<div class="col">
<div class="container" style="margin-top:10%;width:700px;">
 
 </div>
</div>
 
 
</div>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
