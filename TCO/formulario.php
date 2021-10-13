<?php
$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

//$stringExemplo = 'É vamos retirar a acentuação.';

//echo str_replace($comAcentos, $semAcentos, $stringExemplo);
include('config.php');
include('session.php');
//echo "teste";
//echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>';

echo '<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>';

mkdir("uploads/".$_GET['id']);
chmod("uploads/".$_GET['id'],0777);
//include('session.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
   $flag=True;
 
   if(($_POST['data'])=="")
   {
	  // echo "TESTE";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
	   //$t="<div id='data_alert' class='alert alert-danger'>Preencha a data do fato</div>";
       $s=$s.'$(".data-alert").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
	   
   }
   
   if( $_POST['inlineRadioOptions']=="")
   {  echo "TESTE2";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
	   //$t="<div id='data_alert' class='alert alert-danger'>Preencha a data do fato</div>";
       $s=$s.'$(".poun-alert").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
   }	   
   if($_POST['exampleRadios']=="")
   {
	   echo "TESTE3";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
	   //$t="<div id='data_alert' class='alert alert-danger'>Preencha a data do fato</div>";
       $s=$s.'$(".razoes-alert").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
   }	   	   
   if($_POST['conduta_aluno']=="")	   
	{
		echo "TESTE4";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
       $s=$s.'$(".cad").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
   }
   else   
   {
	   //echo "TESTE5";
	   $sql="select * from condutas where codigo='".explode(" ",$_POST['conduta_aluno'])[0]."'";
	   $result=mysqli_query($db,$sql);
	   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	   //echo "AQUI<BR>";

	   $a=$row['codigo'];
	   $a=$a." ".str_replace($comAcentos, $semAcentos,($row['titulo']));
	   $b=str_replace($comAcentos, $semAcentos,$_POST['conduta_aluno']);
	   if($a!=$b)
	   {
		echo "TESTE 6";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
       $s=$s.'$(".cad").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
	   }
   }
   if(($_POST['conduta']==""))
    {
	  echo "TESTE6";
	   $s="<script>"."\n";
	   $s=$s."$(document).ready(function(){";
       $s=$s.'$(".conduta-alert").css("display","inline");';
	   $s=$s."});</script>";
	   echo $s;
	   $flag=False;
   }
   
   if($flag)
   {
	   //echo "aqui";exit();
   $data=$_POST['data'];
   $Positivonegativo=$_POST['inlineRadioOptions']; //option1 e option2
   
   if($Positivonegativo=="option1")
   {
	   $Positivonegativo="Positivo";
   }
   else
   {
	   $Positivonegativo="Negativo";
   }
   $defesa=$_POST['exampleRadios']; //option3 e option4
   if($defesa=="option3")
   {
	   $defesa="Sim";
   }
   else
   {
	   $defesa="Não";
   }   
   $conduta_aluno=$_POST['conduta_aluno'];
   $descricao=$_POST['conduta'];
   $razoes_texto=$_POST['razoes_texto'];
   
   
   $sql="select * from condutas where codigo='".explode(" ",$conduta_aluno)[0]."'";
   
   $result=mysqli_query($db,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $descricao2=$row['id'];
  



$sql=" select date_add(now(),interval -0 hour);";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$tudo= $row['date_add(now(),interval -0 hour)'];
$data_ciente = explode(" ",$tudo)[0];
//$data_ciente=explode("-",$data)[2]."/".explode("-",$data)[1]."/".explode("-",$data)[0];
$hora=explode(":",explode(" ",$tudo)[1])[0];
$minuto=explode(":",explode(" ",$tudo)[1])[1];

$sql="select * from login where nome='".$_SESSION['login_user']."'";  
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql="select * from cadastro where id_login=".$row['id'];

$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$id_cadete=$row['id'];
   
   $sql="insert into FO (data_do_fato,PouN,Defesa,data_ciencia,horario,id_anotado,codigo,conduta_aluno,razoes,observador) values('".explode("/",$_POST['data'])[2]."-".explode("/",$_POST['data'])[1]."-".explode("/",$_POST['data'])[0]."','".$Positivonegativo."','".$defesa."','".$data_ciente."','".$hora."h".$minuto."m"."',".$id_cadete.",".$descricao2.",'".$descricao."',".$_GET['id'].",'".$_POST['observador']."')";
   //echo $sql;exit();
   $result=mysqli_query($db,$sql);
   $sql="select * from FO where data_ciencia='".$data_ciente."' and horario='".$hora."h".$minuto."m"."' and id_anotado=".$id_cadete." and conduta_aluno='".$descricao."'";
   $result=mysqli_query($db,$sql);
   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
   $sql="insert into razoes (id_FO,razoes) values (".$row['id'].",'".$_POST['razoes_texto']."')";
   
//echo $sql;
   $result=mysqli_query($db,$sql);
   
   $sql="insert into FO_status(id_FO,status) values(".$row['id'].",'Criado')";
   $result=mysqli_query($db,$sql);
   //echo '<script>window.location.href = "visualizar_fo.php";</script>';
   
   $s= '<script>';
   $s.= 'r=confirm("FO preenchido com sucesso");';
	$s.= 'if(r==false)';
	 $s.='{';
	$s.=	'window.location.href="visualizar_fo.php";'; 
	 $s.='}';
	 $s.='else';
	 $s.='{';
	 $s.=	'window.location.href="visualizar_fo.php";'; 
	 $s.='}';
	
	 
   $s.=  '</script>';
  // exit($sql);
    echo($s);
    //header("location:visualizar_fo.php");
	
	//$lohranq="visualizar_fo.php";
//	echo "<script type='text/javascript'>window.top.location='".$lohranq."';</script>"; exit;
//echo $sql;
//exit();
   }
 //  header("location:visualizar_fo.php");
 
}

//header("location:visualizar_fo.php");
?>
<script src="../ckeditor/ckeditor.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script>
var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
$(document).ready(function(){
	//alert("aqui");
	 
	if (isMobile)
	{
		$('#pmdf').css("width","75px");
		$('#apmb').css("width","40px");
		
       $('#texto_topo').html("<b>Polícia Militar do Distrito Federal</b><br><b>Academia de Polícia Militar do Distrito Federal</b><br><b>Escola de Formação de Oficiais</b><br><b><u>Formulário de FO</u></b>");
	  // $('#texto_topo').html("<p><b>Academia de Polícia Militar do Distrito Federal</b></p><p><b>Escola de Formação de Oficiais</b></p><p><b style="margin-top:50%;"><u>Formulário de FO</u></b></p>");
	  // $('#texto_topo').html("<p><b>Escola de Formação de Oficiais</b></p><p><b style="margin-top:50%;"><u>Formulário de FO</u></b></p>");
	  // $('#texto_topo').html('<p><b style="margin-top:50%;"><u>Formulário de FO</u></b></p>');
	}
});
</script>

<!doctype html>
<html lang="en">
<head>

<style>

@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.navbar-brand , .nav-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
</style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="css/style.css">-->

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <title>Formulario</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link href="../FO/dropzone.css" type="text/css" rel="stylesheet" />
	
	<!--<script src="dropzone.js"></script>-->
</head>
<body>
<?php include("menu.php");?>
<!--<div class="row" id="header" >
    <table class="table" > 
	<tr>
    <div class="col-md-3 col-md-offset-9">
     <td style="margin-left:10%;">
	   <img id="pmdf" src="./logo/pmdf (2).png" style="margin-left:25%;width:150px;height:auto;"  />
	 </td>
	 <td>
	   <div style="text-align:center;" id="texto_topo" style="color:white;">  
	   <h5 style="color:black;margin-right:10%;"><b>Polícia Militar do Distrito Federal</b></h5>
	   <h5 style="color:black;margin-right:10%;"><b>Departamento de Educação e Cultura</b></h5>
	   <h5 style="color:black;margin-right:10%;"><b>Academia de Polícia Militar do Distrito Federal</b></h5>
	   <h5 style="color:black;margin-right:10%;"><b>Escola de Formação de Oficiais</b></h5><br>
	   <h5 style="color:black;margin-right:10%;"><u><b>Formulário de Fato Observado</b></u></h5> 
	   
	   </div>
	 </td>
	 <td>
	   <img id="apmb" src="./logo/apmb.png" style="width:80px;height:auto;"  />
	 </td>
    </div>
	</tr>
	</table>
</div>
 -->
 <div class="container">
<form method="post">
     <table class="table">
	 
     <tr><td><div style="width:100%;display:none;" class="alert alert-danger data-alert" role="alert">Data não preenchida</div></td></tr>
     <tr><td><div style="width:100%;display:none;" class="alert alert-danger poun-alert" role="alert">Escolha Positivo ou Negatiavo</div></td></tr>
     <tr><td><div style="width:100%;display:none;" class="alert alert-danger razoes-alert" role="alert">Preencha se quer ou não razões de defesa</div>	 </td></tr></table>
     <h5><label for="exampleFormControlSelect1">Data</label></h5>
 	<div class="form-group">
	<input class="form-control" id="data" name="data" placeholder="DD/MM/AAAA" type="text" autocomplete="off"/>
	</div>	
	<h5><label for="exampleFormControlSelect33">Observador da Conduta</label></h5>
	<input class="form-control" id="observador" name="observador" type="text" autocomplete="off"/>
	<table class="table">
	<tr>
<td style="text-align:center;margin-right:10%;">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Positivo</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Negativo</label>
</div>
 
<br><br>

 
    <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"  >
  <label class="form-check-label" for="exampleRadios3">
    Razões de defesa
  </label>
</div>
 
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
  <label class="form-check-label" for="exampleRadios4">
    Ciente, sem razões de defesa
  </label>
</div>
 <br>
<?php $sql=" select date_add(now(),interval -0 hour);";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$tudo= $row['date_add(now(),interval -0 hour)'];
$data = explode(" ",$tudo)[0];
$data=explode("-",$data)[2]."/".explode("-",$data)[1]."/".explode("-",$data)[0];
$hora=explode(":",explode(" ",$tudo)[1])[0];
$minuto=explode(":",explode(" ",$tudo)[1])[1];

?>
</td>
<td style="text-align:center;margin-right:10%;">
Data da ciência <?php echo $data;?><BR> Horário <?php echo $hora;?>H<?php echo $minuto;?>min
<br>
<?php
$sql="select * from login where nome='".$_SESSION['login_user']."'";  
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql="select * from cadastro where id_login=".$row['id'];

$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
Anotado <b><?php echo "CAD ".$row['nome_de_guerra']; ?></b> <br>Nº de Pauta <b><?php echo $row['matricula_esfo'];?></b> <br>
<?php echo $row['cia'];?>ª Cia <?php echo $row['pelotao'];?>º Pelotão <br>

</td>
</tr>
</table>

<center><b><u>Descrição da Conduta adotada pelo Aluno</u></b></center><br>

<table><tr><td><div style="margin-top:10%;display:none;" class="alert alert-danger cad" role="alert">Conduta não encontrada</div></td></tr></table>

<h5>Código da Conduta</h5>

<input name="conduta_aluno" id="conduta_aluno" type="text" class="form-control"></input><br>

<br><br>

<div style="margin-top:10%;display:none;" class="alert alert-danger conduta-alert" role="alert">Preencha a descrição da conduta</div>
<h5>Descrição da conduta</h5>
<textarea id="conduta" name="conduta"></textarea>
<div id="razoes">
<h5 id="razoes_titulo"> Razões de Defesa</label></h5><br>
<textarea name="razoes_texto" id="razoes_texto" rows="4" cols="50" class="form-control"> </textarea>

</div>

<center><button id="enviar" name="enviar" class="btn btn-dark">Enviar</button></center>


</form>
<br>
<form action="upload.php?id=<?php echo $_GET['id'];?>" class="dropzone"></form>

</div>
<script src="../dropzone-master/dist/dropzone.js"></script>
<script>

function converteacento(a)
	{
	//	alert(a);
		a=a.replace('&Aacute;','Á');
a=a.replace('&Eacute;','É');
a=a.replace('&Iacute;','Í');
a=a.replace('&Oacute;','Ó');
a=a.replace('&Uacute;','Ú');
a=a.replace('&aacute;','á');
a=a.replace('&eacute;','é');
a=a.replace('&iacute;','í');
a=a.replace('&oacute;','ó');
a=a.replace('&uacute;','ú');
a=a.replace('&Acirc;','Â');
a=a.replace('&Ecirc;','Ê');
a=a.replace('&Ocirc;','Ô');
a=a.replace('&acirc;','â');
a=a.replace('&ecirc;','ê');
a=a.replace('&ocirc;','ô');
a=a.replace('&Agrave;','À');
a=a.replace('&agrave;','à');
a=a.replace('&Uuml;','Ü');
a=a.replace('&uuml;','ü');
a=a.replace('&Ccedil;','Ç');
a=a.replace('&ccedil;','ç');
a=a.replace('&Atilde;','Ã');
a=a.replace('&Otilde;','Õ');
a=a.replace('&atilde;','ã');
a=a.replace('&otilde;','õ');
a=a.replace('&Ntilde;','Ñ');
a=a.replace('&ntilde;','ñ');
//a=alert(a);*/
//a=2;
return a;
	}


$.getJSON( "getCondutas.php", function( data3 ) {
$(document).ready(function(){
//teste

 
CKEDITOR.instances.conduta.on("change",function(){
	$('.conduta-alert').css("display","none");
});
 

//teste
 $(window).keydown(function(event){ //formulario não vai com enter
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
	
	//$('.btn btn-dark').css("display","none");
	$('#razoes').css("display","none");
	$('.dropzone').css("display","none");
	var date_input=$('input[name="data"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        //format: 'mm/dd/yyyy',
		format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	$('input[name="data"]').mask('00/00/0000');
	
	$('#exampleRadios4').click(function(){
 
		$('#razoes').css("display","none");
		$('.dropzone').css("display","none");
		$('.razoes-alert').css("display","none");
	});
	$('#exampleRadios3').click(function(){
        $('.razoes-alert').css("display","none");
		$('#razoes').css("display","inline");
		$('.dropzone').css("display","block");
	});	
 
 
	 $('.dz-message').children('span').each(function()
	 {
 
		 
		 ($(this).html("Upload"));
		 
	 });
//teste
	var cadete="";
	for(i=0;i<data3.data.length;i++)		
	{
		
			cadete=converteacento(cadete)+"|"+converteacento(data3.data[i].id_cadete) + ' ' + converteacento(data3.data[i].data) ;
	}
	var cadete2 = $.map(cadete.split("|"), function (team) { return { value: team, data: { category: 'cadete' }}; });
	//console.log(cadete2);
	//cadete2="lohran";
	    $('#conduta_aluno').devbridgeAutocomplete({
        lookup: cadete2,
        minChars: 1,
        onSelect: function (suggestion) {
            //$('#selection').html('You selected: ' + converteacento(suggestion.value) + ', ' + suggestion.data.category); //lohran arraes
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Não há condutas com esse nome',
        groupBy: 'cadete'
    });
//teste
 
		$(document).arrive(".autocomplete-suggestion",function(){
		$(".autocomplete-suggestion").css("background-color", "white");
		$(".autocomplete-suggestion").click(function(){
			$('.cad').css("display","none");
		});
		});
		$("#conduta_aluno").keydown(function(){
 
	
    if (jQuery.inArray($(this).val(),cadete.split("|"))!=-1 && $(this).val()!="")
	 { 
      console.log("yes");
      $('.cad').css("display","none");}
	else
	{
		console.log("no");
	 
	 $('.cad').css("display","inline");
 
	}
    });
	//teste array json
	var cadete="";
	for(i=0;i<data3.data.length;i++)		
	{
		
			cadete=converteacento(cadete)+"|"+converteacento(data3.data[i].id_cadete) + ' ' + converteacento(data3.data[i].data) ;
	}
	var cadete2 = $.map(cadete.split("|"), function (team) { return { value: team, data: { category: 'cadete' }}; });
	//console.log(cadete2);
	//cadete2="lohran";
	    $('#conduta_aluno').devbridgeAutocomplete({
        lookup: cadete2,
        minChars: 1,
        onSelect: function (suggestion) {
            //$('#selection').html('You selected: ' + converteacento(suggestion.value) + ', ' + suggestion.data.category); //lohran arraes
        },
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Não há condutas com esse nome',
        groupBy: 'cadete'
    });
         
        //});
	
	 $('#data').change(function(){
		 if($(this).val().split("-").length>1)
		 {
			 $(this).val($(this).val().split("-")[2]+"/"+$(this).val().split("-")[1]+"/"+$(this).val().split("-")[0]);
		 }
		 $('.data-alert').css("display","none");
	 });
	$('#inlineRadio1, #inlineRadio2').click(function(){
		$('.poun-alert').css("display","none");
	});
});
});
CKEDITOR.replace( 'razoes_texto' );
CKEDITOR.replace( 'conduta' );
</script>


</body>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript"  src="../jQuery-Autocomplete-master/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
</html>