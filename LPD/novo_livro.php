<?php
include("config.php");
include("session.php");
$flag=True;
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//topico1
	
	$sql="update livro set primeiro_topico=".(intval($_POST['topico'],10)+1)." where id=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$texto_inicial=$_POST["texto_inicial"];
	$texto_inicial2=$_POST["texto_inicial2"];
	//topico2
	$materiais=$_POST["materiais"];
	$servico=$_POST["servico"];
	//topico3
	$faltas=$_POST["faltas"];
	$atrasos=$_POST["atrasos"];
	//topico4
	$troca=$_POST["troca"];
	$outros_troca=$_POST["outros_troca"];
	//topico5
	$presos=$_POST["presos"];
	$detidos=$_POST["detidos"];
	$ausentes=$_POST["ausentes"];
	$desertores=$_POST["desertores"];
	//topico6
	$viaturas_pernoite=$_POST["viaturas_pernoite"];
	//topico7
	$instalacoes=$_POST["instalacoes"];
	$equipamentos=$_POST["equipamentos"];
	$inicial_hidrometro=$_POST["inicial_hidrometro"];
	$final_hidrometro=$_POST["final_hidrometro"];
	$diferenca_hidrometro=$_POST["diferenca_hidrometro"];
	$outros_material_carga=$_POST["outros_material_carga"];
	//topico 8
	$reserva_armamento=$_POST["reserva_armamento"];
	//topico 9	
	$demais=$_POST["demais"];
	//topico 10	
	$remessa=$_POST["remessa"];
	//topico 11
	$passagem=$_POST["passagem"];
	$materiais_passagem=$_POST["materiais_passagem"];
	$nome_completo_form=$_POST["nome_completo_form"];
	$matricula_form=$_POST["matricula_form"];
	
	$flag=True;
	$divs=array();
	//print_r(var_dump($_POST));
	$a =  var_export($_POST, true);
 
	$titulo=array();
	$conteudo=array();
	$x=0;
	foreach(explode("=>",$a) as $post)
	{
	//	echo $post."<BR>".$x;
    if($x==count(explode("=>",$a)))
	{
	    array_push($conteudo,explode("'",$post)[1]);
	}
    else{	
	  if($x==0)
  	  {
	     array_push($titulo,explode("'",$post)[1]);
 
	  }
	  else{
		array_push($conteudo,explode("'",$post)[1]);
		array_push($titulo,explode("'",$post)[3]);
 
	  } 
	}
		$x++;
	}
	$x=0;
	 $divs=array();
	 $vazios=array();
	 
	  
	 //exit();
	 
     foreach($conteudo as $c)
	 {
		 array_push($divs,"<div id='div".$x."' class='alert alert-danger'>Preencha o campo indicado</div>");
		 if($c=="")
		 {
			 $flag=False;
			 array_push($vazios,$x);
			 
		 }
		 $x++;
	 }
	 
	 //print_r($divs);
	 
	 if(True)
	 {
	  $sql="insert into livro_topico1(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);	  
	  $sql="insert into livro_topico2(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico3(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico4(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico5(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico6(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico7(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico8(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico9(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico10(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);
	  $sql="insert into livro_topico11(id_livro) values(".$_GET['id'].")";
      $result=mysqli_query($db,$sql);	  
	  $sql = "select curdate() as data";
	  $result=mysqli_query($db,$sql);
	  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $sql="update livro_topico11 set data='".$row['data']."'";
	  $result=mysqli_query($db,$sql);
	  $x=0;
	    foreach($conteudo as $c)
		{
		 if($x>=0 && $x<=3) //topico 1
		  {
			$sql="update livro_topico1 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			//echo $sql;
			//echo "<BR>";
			$result=mysqli_query($db,$sql);
		  }
		 if($x>=4 && $x<=4) //topico 2
		  {
			$sql="update livro_topico2 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			//echo $sql;echo "<BR>";
			$result=mysqli_query($db,$sql);			 
		  }		 
		 if($x>=5 && $x<=6) //topico 3
		  {
			$sql="update livro_topico3 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 
		 if($x>=7 && $x<=8) //topico 4
		  {
			$sql="update livro_topico4 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=9 && $x<=12) //topico 5
		  {
			$sql="update livro_topico5 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=13 && $x<=13) //topico 6
		  {
			$sql="update livro_topico6 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=14 && $x<=19) //topico 7
		  {
			$sql="update livro_topico7 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=20 && $x<=20) //topico 8
		  {
			$sql="update livro_topico8 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=21 && $x<=21) //topico 9
		  {
			$sql="update livro_topico9 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
			
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=22 && $x<=22) //topico 10
		  {
			$sql="update livro_topico10 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id'];
      
			$result=mysqli_query($db,$sql);			 
		  }		 		 
		 if($x>=23) //topico 11
		  {
			$sql="update livro_topico11 set ".$titulo[$x]."='".$conteudo[$x]."' where id_livro=".$_GET['id']; 
		   // echo $sql."<BR>";
			$result=mysqli_query($db,$sql);			 
		  }		 		 
        $x++;
		}
		
		if($flag)
		{
	    //header("location:index.php");
		 echo '<script>alert("dados salvos com sucesso")</script>';
		}
	 }//exit();
	 
}

?>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<!-- datatables -->
     <link href="https://www.cfo2019.com/FO/dropzone.css" type="text/css" rel="stylesheet" />
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
	<link rel="stylesheet" href="../zTree_v3-master/css/zTreeStyle/zTreeStyle.css" type="text/css">
<!--datatables -->	
<script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/datatables.min.js"></script>
			  <script src="https://sgpol.pm.df.gov.br/vendors/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<style>
.topico{
	margin-bottom:10%;
}
h1{
	margin-top:5% !important;
	 font-family: "Times New Roman", Times, serif !important;
	 font-size:14px !important;
	 font-weight: bold !important;
}
form-control{
	 font-family: "Times New Roman", Times, serif !important;
	 font-size:14px !important;
	 font-weight: normal !important;
	 text-align:justify;
}
textarea{
		 font-family: "Times New Roman", Times, serif !important;
	 font-size:14px !important;
	 font-weight: normal !important;
	 text-align:justify;
}
input{
		 font-family: "Times New Roman", Times, serif !important;
	 font-size:14px !important;
	 font-weight: normal !important;
	 text-align:justify;
}
p{
	 font-family: "Times New Roman", Times, serif !important;
	 font-size:14px !important;
	 font-weight: normal !important;
	text-align:justify;
}
</style>
 
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<?php include("menu.php");?>
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
  <script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
  <link href="../jquery-ui-1.12.1/jquery-ui.css" type="text/css" rel="stylesheet" />
<div class="container" style="margin-top:10%;">
<div id="tabs">
  <ul>
    <?php $sql="select * from livro where id=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row['status']=="homologado")
	{
	   $style="display:none;";
	}
	else
	{
	   $style="";
	}  
	   ?>
    <li><a href="#tabs-1" style="<?php echo $style; ?>">Escrever Livro</a></li>
    <li><a href="#tabs-2">Visualizar Livro</a></li>
	<li><a href="#tabs-3">Pesquisar no Livro</a></li>
  </ul>
  <div id="tabs-1" style="<?php echo $style; ?>">
   <form method="post" style="<?php echo $style; ?>">
    <?php
	function query($query)
	{

  // mysql_query("SET NAMES utf8");
  // mysql_query("SET CHARACTER SET utf8");

   $db = mysqli_connect('localhost','USUARIO_DB','SENHA_DB','DB') ;
   if(mysqli_connect_errno()) {

    die("Falha de conexao com banco de dados " .mysqli_connect_error());

    }		
		$result=mysqli_query($db,$query);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		return $row;
	}
	function mes($mes)
	{
		if(intval($mes,10)==1)
   		  $mes="janeiro";
		if(intval($mes,10)==2) 
		  $mes="fevereiro";
		if(intval($mes,10)==3) 
		  $mes="março";
		if(intval($mes,10)==4) 
		  $mes="abril";
		if(intval($mes,10)==5) 
          $mes="maio";
		if(intval($mes,10)==6) 
          $mes="junho";
		if(intval($mes,10)==7) 
          $mes="julho";
		if(intval($mes,10)==8) 
          $mes="agosto";
		if(intval($mes,10)==9) 
          $mes="setembro";
		if(intval($mes,10)==10) 
          $mes="outubro";
		if(intval($mes,10)==11) 
          $mes="novembro";
		if(intval($mes,10)==12) 
          $mes="dezembro";
		
		return $mes;
	}
	
	$row=query("select curdate() as data");
	$hoje=explode("-",$row['data'])[2];
	$mes=mes(explode("-",$row['data'])[1]);
	$ano=explode("-",$row['data'])[0];
	$row=query('select date_add(curdate(),interval -1 day) as data');
	$ontem=explode("-",$row['data'])[2];
	
	$sql2="select * from livro where id=".$_GET['id'];
	$result22=mysqli_query($db,$sql2);
	$row22=mysqli_fetch_array($result22,MYSQLI_ASSOC);
	?>
	<p>Digite o último tópico do livro anterior <input type="number" value="<?php echo intval($row22['primeiro_topico'])-1;?>" class="form-control" id="topico" name="topico"/></p>
	<h1>LIVRO DE PARTE DIÁRIA DO CADETE DE DIA</h1>
	<p>Parte diária do Cadete de Dia da EsFo</p> 
	<?php $q=1; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
	<?php
	$sql="select * from livro_topico1 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(!isset($row['texto_inicial']))
	{
	$texto_inicial='<input name="texto_inicial" id="texto_inicial" class="form-control" value="do dia '.$ontem.' para o '.$hoje.' de '.$mes.' de '.$ano.' "></input></p>';
	}
	else
	{
	$texto_inicial='<input name="texto_inicial" id="texto_inicial" class="form-control" value="'.$row['texto_inicial'].'"></input></p>';
	}
	echo $texto_inicial;
	?>
	<h1>01 - ASSUNÇÃO DO SERVIÇO</h1>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
    <?php
    if(!isset($row['texto_inicial2']))
	{	
	$texto_inicial2='<input class="form-control" name="texto_inicial2" id="texto_inicial2" value="Eu, CAD '.$nome_de_guerra.', matrícula '.$matricula_pmdf.', assumi o serviço de Cadete de Dia da APMB no horário regulamentar em substituição a CAD XXXXX matrícula XXX.XXX/X, tendo recebido os itens a seguir:"></input>';
	}
	else
	{
	$texto_inicial2='<input class="form-control" name="texto_inicial2" id="texto_inicial2" value="'.$row['texto_inicial2'].'"></input>';
	}
	echo $texto_inicial2; 
	?>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
	<textarea class="form-control" id="materiais" name="materiais">
	<?php 
	//if(!isset($row['materiais']))
//	{
	echo $row['materiais'];	
	//}
	$sql="select * from livro_topico2 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	?>	
	</textarea>
 
	<p class="topico" id="t1" name="t1" style="float: right;">Tópico XXXX</p>
    <h1>02 - DISTRIBUIÇÃO DO EFETIVO DE SERVIÇO</h1>
    <p>Escala de Permanência:	</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>	
    <textarea class="form-control" id="servico" name="servico">
	<?php 
	//if(!isset($row['servico']))
//	{
	echo $row['servico'];
	//}
	$sql="select * from livro_topico3 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
	?>
	</textarea>
    <p class="topico" id="t2" name="t2" style="float: right;">Tópico XXXX</p>
	
    <h1>03 - FALTAS E ATRASOS AO SERVIÇO</h1>

    <p>Faltas ao Serviço:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>	
     <textarea class="form-control" id="faltas" name="faltas">
<?php
	 if(!isset($row['faltas']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['faltas'];
	 }
	 ?>
</textarea>
    <p>Atrasos: </p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>	
    <textarea class="form-control" id="atrasos" name="atrasos">
<?php
	 if(!isset($row['atrasos']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['atrasos'];
	 }
	$sql="select * from livro_topico4 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?>
</textarea>
	<p class="topico" id="t3" name="t3" style="float: right;">Tópico XXXX</p>
	<h1>04 - DEMAIS OCORRÊNCIAS RELACIONADAS AO EFETIVO</h1>

<p>TROCA DE SERVIÇO:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
 <textarea class="form-control" id="trocas" name="trocas">
<?php
	 if(!isset($row['trocas']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['trocas'];
	 }
	 
?></textarea>
<p>OUTROS:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
       <textarea class="form-control" id="outros_troca" name="outros_troca">
<?php
	 if(!isset($row['outros_troca']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['outros_troca'];
	 }
	 $sql="select * from livro_topico5 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?></textarea>
	 
      <p class="topico" id="t4" name="t4" style="float: right;">Tópico XXXX</p>
	  
<h1>05 - PRESOS, DETIDOS, AUSENTES E DESERTORES.</h1>

<p>Presos:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="presos" name="presos">
<?php
	 if(!isset($row['presos']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['presos'];
	 }?>
</textarea>
<p>Detidos:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="detidos" name="detidos">
<?php
	 if(!isset($row['detidos']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['detidos'];
	 }?>
</textarea>
<p>Ausentes:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="ausentes" name="ausentes">
<?php
	 if(!isset($row['ausentes']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['ausentes'];
	 }?></textarea>
<p>Desertores:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="desertores" name="desertores">
<?php
	 if(!isset($row['desertores']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['desertores'];
	 }
	$sql="select * from livro_topico6 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?></textarea>
<p class="topico" id="t5" name="t5" style="float: right;">Tópico XXXX</p>


<h1>06 - VIATURAS QUE PERNOITARAM NO QUARTEL</h1>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="viaturas_pernoite" name="viaturas_pernoite">
<?php
	 if(!isset($row['viaturas_pernoite']))
	 {
		$sql="select * from livro_topico6 where viaturas_pernoite is not null order by id_livro desc";
		$result2=mysqli_query($db,$sql);
		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		if(!isset($row2['viaturas_pernoite']))
		{
	    echo "SEM ALTERAÇÃO";
		}
		else
		{
			echo $row2['viaturas_pernoite'];
		}
	 }
	 else
	 {
		 echo $row['viaturas_pernoite'];
	 }
	$sql="select * from livro_topico7 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
</textarea>
<p class="topico" id="t6" name="t6" style="float: right;">Tópico XXXX</p>

<h1>07 - MATERIAL CARGA</h1>

<p>Instalações:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="instalacoes" name="instalacoes">
<?php
	 if(!isset($row['instalacoes']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['instalacoes'];
	 }
?></textarea>

<p>Equipamentos:</p>
	<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="equipamentos" name="equipamentos">
<?php
	 if(!isset($row['equipamentos']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['equipamentos'];
	 }
	 
?>
</textarea>
<p>Medição de Água:</p>
<p>-Hidrômetro inicial:</p> 
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<input class="form-control" name="inicial_hidrometro" id="inicial_hidrometro" value="<?php echo $row['inicial_hidrometro'];?>"></input>
<p>-Hidrômetro final:</p>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<input class="form-control" name="final_hidrometro" id="final_hidrometro" value="<?php echo $row['final_hidrometro'];?>"></input>
<p>- Diferença:</p> 
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<input class="form-control" name="diferenca_hidrometro" id="diferenca_hidrometro" value="<?php echo $row['diferenca_hidrometro'];?>"></input>
<p>Outros:</p>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="outros_material_carga" name="outros_material_carga" >
<?php
	 if(!isset($row['outros_material_carga']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['outros_material_carga'];
	 }
		$sql="select * from livro_topico8 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?></textarea>
<p class="topico" id="t7" name="t7" style="float: right;">Tópico XXXX</p>
<h1>08 - RESERVA DE ARMAMENTO</h1>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="reserva_armamento" name="reserva_armamento">
<?php
	 if(!isset($row['reserva_armamento']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['reserva_armamento'];
	 }
		$sql="select * from livro_topico9 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
</textarea>
<p class="topico" id="t8" name="t8" style="float: right;">Tópico XXXX</p>
<h1>09 - DEMAIS OCORRÊNCIAS RELACIONADAS AO SERVIÇO </h1>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="demais" name="demais">
<?php
	 if(!isset($row['demais']))
	 {
	    echo "SEM ALTERAÇÃO";
	 }
	 else
	 {
		 echo $row['demais'];
	 }
		$sql="select * from livro_topico10 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
</textarea>
<p class="topico" id="t9" name="t9" style="float: right;">Tópico XXXX</p>
<h1>10 - REMESSA DE DOCUMENTOS</h1>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="remessa" name="remessa">
<?php
	 if(!isset($row['remessa']))
	 {
		 $sql="select * from livro_topico9 where remessa is not null order by id_livro desc";
		 $result2=mysqli_query($db,$sql);
		 $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		 if(!isset($row2['remessa']))
		 {
	       echo "SEM ALTERAÇÃO";
		 }
		 else{
           echo $row2['remessa'];
		 }
	 }
	 else
	 {
		 echo $row['remessa'];
	 }
		$sql="select * from livro_topico11 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?></textarea>
<h1>11 - PASSAGEM DE SERVIÇO</h1>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<?php
//if(!isset($row['passagem']))
//{
//$passagem='<input class="form-control" id="passagem" name="passagem" value="Foi realizada a passagem de serviço ao CAD JULIANA, Matrícula 735.187/9, com todas as ordens em vigor e com as alterações já especificadas neste documento, tendo passado os seguintes materiais localizados na sala do cadete de dia:">';
//}
//else
//{
$passagem='<input class="form-control" id="passagem" name="passagem" value="'.$row['passagem'].'">';	
//}
echo $passagem;
?>
</input>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $divs[$q];?>
<textarea class="form-control" id="materiais_passagem" name="materiais_passagem">
<?php
    
	 if(!isset($row['materiais_passagem']))
	 {
		 $sql="select * from livro_topico11 where remessa is not null order by id_livro desc";
		 $result2=mysqli_query($db,$sql);
		 $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		 if(!isset($row2['materiais_passagem']))
		 {
	       echo "SEM ALTERAÇÃO";
		 }
		 else{
           echo $row2['materiais_passagem'];
		 }
	 }
	 else
	 {
		 echo $row['materiais_passagem'];
	 }
 
?></textarea>

 <center><p>Brasília/DF, <?php echo $hoje; ?> de <?php echo $mes?> de <?php echo $ano?>.</p></center>

 
<center>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $div[$q];?>
<?php 
 if(!isset($row['nome_completo']))
  { $nome_completo_form=$nome_completo;
  }
  else
  {
	  $nome_completo=$row['nome_completo_form'];
  }
 if(!isset($row['matricula_form']))
  { $matricula=$matricula_pmdf;
  }
  else
  {
	  $matricula=$row['matricula_form'];
  }
  ?>
  <?php
$display="";
$display2="";
if($_SESSION['papel']!="Coordenador")
{
	$display="display:none;";
}
else{
	//$display2="display:none;";
}
$sql="select * from livro where id=".$_GET['id'];
$result3=mysqli_query($db,$sql);
$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
?>
<input class="form-control" style="text-align:center;<?php echo $display2; ?>" name="nome_completo" id="nome_completo_form" value="<?php echo $row3['autor'];?>"/></center>
<center>
<?php $q++; if(!$flag && in_array($q,$vazios)) echo $div[$q];?>
<input class="form-control" style="text-align:center;<?php echo $display2; ?>" name="matricula_form" id="matricula_form" value="<?php echo $row['matricula_form'];?>"/></center>
<center><p <?php echo $display2; ?>>CADETE DE DIA</p></center>

<center><button type="submit" class="btn btn-primary">Salvar</button><button type="button" class="btn btn-warning" style="<?php echo $display;?>" id="homologar">Homologar</button></center>

      </form>                                               
	  
	  <form action="upload.php?id=<?php echo $_GET['id'];?>" class="dropzone dz-clickable"></form>
	  


<script>
$(document).ready(function(){
	
	$(document).arrive('.node_name', {
   onceOnly: false
}, function () {
	
  	$('.node_name').mousedown(function(event) {
		//alert("aqui");
    switch (event.which) {
        case 1:
            console.log('Left mouse button is pressed');
            break;
        case 2:
            alert('Middle mouse button is pressed');/*
 */
            break;
        case 3:
           console.log('Right mouse button is pressed');
		   		    <?php
			$sql="select * from livro";
			$lohran=mysqli_query($db,$sql);
			$lrow=mysqli_fetch_array($lohran,MYSQLI_ASSOC);
            $fflag=$lrow['status'];
			if($fflag=="")
			 $fflag="abc";
			?>
			if("<?php echo $fflag;?>"!="homologado"){
			r=confirm("Tem certeza que deseja remover o item selecionado?")
			if(r==true)
			{
				valor="flag=remover&arquivo="+$(this).attr("href");
				$.ajax({ 
				type:"POST", 
				url: "mostrar_diretorio.php", 
				data:valor,
				success: function(data){
   
				location.reload();
	
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
	        }
			else{
				if(!$('#alert_tree').length)
				{
				$('#remessa_tree').before("<div id='alert_tree' class='alert alert-warning'>documento já homologado, se oficial, clique em devolver para retornar ao modo de edição</div>");
				}
			}
            break;
        default:
            alert('Nothing');
    } });
}); 

	
	
var setting = {
data: {
simpleData: {
enable: true
}
}
};
var zNodes =[
   { id:1, pId:0, name:"Documentos", open:true,isParent:true},

<?
$d = dir("./uploads/1");
$i=0;
$saida="";
while (false !== ($entry = $d->read())) {
	//echo explode("_",$entry)[1]."<BR>";
	//print_r(explode("_",$entry));echo "\n";
	if(strlen($entry)>2 && explode("#",$entry)[1]==$_GET['id'])
	{
     //echo $entry."#";
	 $saida.= "{id:11,pId:11,name:'".$entry."',url:'uploads/1/".str_replace('#','%23',$entry)."'},";
	 //{ id:111, pId:11, name:'ANÁLISE CRIMINAL 23 turma.pptx' ,url:'uploads/ANÁLISE CRIMINAL 23 turma.pptx'},
	}
	$i=$i+1;
}
echo $saida."];";
?>

$.fn.zTree.init($("#treeDemo"), setting, zNodes);
});
</script>

	  <script src= "../zTree_v3-master/js/jquery.ztree.core.js"></script>
	  <script src="https://www.cfo2019.com/dropzone-master/dist/dropzone.js"></script>  
	  <script type="text/javascript" src="https://www.cfo2019.com/roosevelt/arrive-master/src/arrive.js"></script>
</div>
<div id="tabs-2">
 <!--TESTE AQUI -->
 <img style="float:left;" src="logopm.JPG"></img>
 <br> 
 <center style="margin-top:5%;"><p>GOVERNO DO DISTRITO FEDERAL</p>
<p style="margin-top:-2%;margin-bottom:-0.5%;">POLÍCIA MILITAR DO DISTRITO FEDERAL</p>
<p>Corpo de Cadetes</p></center>
<br><br><br>
  	<p style="font-weight:bold !important;">LIVRO DE PARTE DIÁRIA DO CADETE DE DIA</p>
	<p>Parte diária do Cadete de Dia da EsFo
	<?php
	$sql="select * from livro_topico1 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(!isset($row['texto_inicial']))
	{
	$texto_inicial='do dia '.$ontem.' para o '.$hoje.' de '.$mes.' de '.$ano;
	}
	else
	{
	$texto_inicial=$row['texto_inicial'];
	}
	echo $texto_inicial;
	echo "</p>";
	?>
	<p style="font-weight:bold !important;">01 - ASSUNÇÃO DO SERVIÇO</p>
	
    <?php
    if(!isset($row['texto_inicial2']))
	{	
	$texto_inicial2='Eu, CAD '.$nome_de_guerra.', matrícula '.$matricula_pmdf.', assumi o serviço de Cadete de Dia da APMB no horário regulamentar em substituição a CAD XXXXX matrícula XXX.XXX/X, tendo recebido os itens a seguir:';
	}
	else
	{
	$texto_inicial2=$row['texto_inicial2'];
	}
	echo "<p>".$texto_inicial2."</p>";
	?>
	
	
	<?php 
	//if(!isset($row['materiais']))
//	{
	echo $row['materiais'];	
	//}
	$sql="select * from livro_topico2 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	?>	
	
 
	<p class="topico" id="tt1" name="tt1" style="float:right;font-weight:bold !important;">Tópico XXXX</p>
    <p style="font-weight:bold !important;margin-top:5%;">02 - DISTRIBUIÇÃO DO EFETIVO DE SERVIÇO</p>
    <p>Escala de Permanência:	</p>
	
    
	<?php 
	//if(!isset($row['servico']))
//	{
	echo $row['servico'];
	//}
	$sql="select * from livro_topico3 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
	?>
	
    <p class="topico" id="tt2" name="tt2" style="float:right;font-weight:bold !important;">Tópico XXXX</p>
	
    <p style="font-weight:bold !important;margin-top:5%;">03 - FALTAS E ATRASOS AO SERVIÇO</p>

    <p>Faltas ao Serviço:</p>
	
    
	 <?php
	 if(!isset($row['faltas']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 echo "<p>".$row['faltas']."</p>";
	 }
	 ?>
	
    <p>Atrasos: </p>
	
    
		 <?php
	 if(!isset($row['atrasos']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 echo "<p>".$row['atrasos']."</p>";
	 }
	$sql="select * from livro_topico4 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?>
	
	<p class="topico" id="tt3" name="tt3" style="float: right;font-weight:bold !important;">Tópico XXXX</p>
	<p style="font-weight:bold !important;margin-top:5%;">04 - DEMAIS OCORRÊNCIAS RELACIONADAS AO EFETIVO</p>

<p>TROCA DE SERVIÇO:</p>
	
    
		 <?php
	 if(!isset($row['trocas']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 echo "<p>".$row['trocas']."</p>";
	 }
	 
	 ?> 
<p>OUTROS:</p>
	
    
		 <?php
	 if(!isset($row['outros_troca']))
	 {
	     echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 echo "<p>".$row['outros_troca']."</p>";
	 }
	 $sql="select * from livro_topico5 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?>
	 
      <p class="topico" id="tt4" name="tt4" style="float:right;font-weight:bold !important;">Tópico XXXX</p>
	  
<p style="font-weight:bold !important;margin-top:5%;">05 - PRESOS, DETIDOS, AUSENTES E DESERTORES.</p>

<p>Presos:</p>
	

		 <?php
	 if(!isset($row['presos']))
	 {
	   echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
 
		 echo "<p>".$row['presos']."</p>";
	 }?>

<p>Detidos:</p>


		 <?php
	 if(!isset($row['detidos']))
	 {
	   echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 
		 echo "<p>".$row['detidos']."</p>";
	 }?>

<p>Ausentes:</p>


		 <?php
	 if(!isset($row['ausentes']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
 
		  echo "<p>".$row['ausentes']."</p>";
	 }?>

<p>Desertores:</p>


		 <?php
	 if(!isset($row['desertores']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
	 
		 echo "<p>".$row['desertores']."</p>";
	 }
	$sql="select * from livro_topico6 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	 ?>	  

<p class="topico" id="tt5" name="tt5" style="float:right;font-weight:bold !important;">Tópico XXXX</p>


<p style="font-weight:bold !important;margin-top:5%;">06 - VIATURAS QUE PERNOITARAM NO QUARTEL</p>

<?php
	 if(!isset($row['viaturas_pernoite']))
	 {
		$sql="select * from livro_topico6 where viaturas_pernoite is not null order by id_livro desc";
		$result2=mysqli_query($db,$sql);
		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		if(!isset($row2['viaturas_pernoite']))
		{
	     echo "<p>SEM ALTERAÇÃO</p>";
		}
		else
		{
			echo $row2['viaturas_pernoite'];
		}
	 }
	 else
	 {
		 echo $row['viaturas_pernoite'];
	 }
	$sql="select * from livro_topico7 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<p class="topico" id="tt6" name="tt6" style="float:right;font-weight:bold !important;">Tópico XXXX</p>

<p style="font-weight:bold !important;margin-top:5%;">07 - MATERIAL CARGA</p>

<p>Instalações:</p>

<?php
	 if(!isset($row['instalacoes']))
	 {
	     echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 //echo $row['instalacoes'];
		 echo "<p>".$row['instalacoes']."</p>";
	 }
?>


<p>Equipamentos:</p>

<?php
	 if(!isset($row['equipamentos']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 //echo $row['equipamentos'];
		 echo "<p>".$row['equipamentos']."</p>";
	 }
	 
?>

<p>Medição de Água:</p>
<p>-Hidrômetro inicial:</p> 
	
<?php echo "<p>".$row['inicial_hidrometro']."</p>";?>

<p>-Hidrômetro final:</p>

<?php echo "<p>".$row['final_hidrometro']."</p>";?>
<p>- Diferença:</p> 

<?php "<p>".$row['diferenca_hidrometro']."</p>";?> 
<p>Outros:</p>
 
<?php
	 if(!isset($row['outros_material_carga']))
	 {
	     echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 //echo $row['outros_material_carga'];
		 echo "<p>".$row['outros_material_carga']."</p>";
	 }
		$sql="select * from livro_topico8 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
 
<p class="topico" id="tt7" name="tt7" style="float:right;font-weight:bold !important;">Tópico XXXX</p>
<p style="font-weight:bold !important;margin-top:5%;">08 - RESERVA DE ARMAMENTO</p>
 
<?php
	 if(!isset($row['reserva_armamento']))
	 {
	    echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		 //echo $row['reserva_armamento'];
		 echo "<p>".$row['reserva_armamento']."</p>";
	 }
		$sql="select * from livro_topico9 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
 
<p class="topico" id="tt8" name="tt8" style="float:right;font-weight:bold !important;">Tópico XXXX</p>
<p style="font-weight:bold !important;margin-top:5%;">09 - DEMAIS OCORRÊNCIAS RELACIONADAS AO SERVIÇO </p>
 
<?php
	 if(!isset($row['demais']))
	 {
	     echo "<p>SEM ALTERAÇÃO</p>";
	 }
	 else
	 {
		// echo $row['demais'];
		 echo "<p>".$row['demais']."</p>";
	 }
		$sql="select * from livro_topico10 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
<br> 
<p class="" id="tt9" name="tt9" style="float:right !important;font-weight:bold !important;">Tópico XXXX</p>
<p style="font-weight:bold !important;margin-top:5%;">10 - REMESSA DE DOCUMENTOS</p>
 
<?php
	 if(!isset($row['remessa']))
	 {
		 $sql="select * from livro_topico9 where remessa is not null order by id_livro desc";
		 $result2=mysqli_query($db,$sql);
		 $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		 if(!isset($row2['remessa']))
		 {
	       echo "<p>SEM ALTERAÇÃO</p>";
		 }
		 else{
           //echo $row2['remessa'];
		   echo "<p>".$row2['remessa']."</p>";
		 }
	 }
	 else
	 {
		 echo "<p>".$row['remessa']."</p>";
	 }
		$sql="select * from livro_topico11 where id_livro=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
?>
 
<p style="font-weight:bold !important;margin-top:5%;">11 - PASSAGEM DE SERVIÇO</p>
 
<?php
if(!isset($row['passagem']))
{
$passagem="Foi realizada a passagem de serviço ao CAD JULIANA, Matrícula 735.187/9, com todas as ordens em vigor e com as alterações já especificadas neste documento, tendo passado os seguintes materiais localizados na sala do cadete de dia:";
}
else
{
$passagem= $row['passagem'] ;	
}
echo "<p>".$passagem."</p>";
?>
 
 
<?php
	 if(!isset($row['materiais_passagem']))
	 {
		 $sql="select * from livro_topico11 where remessa is not null order by id_livro desc";
		 $result2=mysqli_query($db,$sql);
		 $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		 if(!isset($row2['materiais_passagem']))
		 {
	       echo "<p>SEM ALTERAÇÃO</p>";
		 }
		 else{
           echo $row2['materiais_passagem'];
		 }
	 }
	 else
	 {
		 echo $row['materiais_passagem'];
	 }
 
?>
 

 <center><p>Brasília/DF, <?php echo $hoje; ?> de <?php echo $mes?> de <?php echo $ano?>.</p></center>

 
<center>
  
 <?php echo "<p>".$row3['autor']."</p>";?> 
<center>
 
 
 <?php $sql="select * from livro_topico11";
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  ?>
  <?php echo "<p>".$row['matricula_form']."</p>";?> 
<center><p>CADETE DE DIA</p></center>
<button type="button" class="btn btn-info" style="margin-right:1%;" id="Gerar_PDF">Imprimir</button>  
 <!-- TESTE AQUI --> 
</div>
<div id="tabs-3">
<?php
$sql="select * from livro_topico1 where id_livro=".$_GET['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="materiaistabs3"><?php echo $row['materiais'] ?></div>
<?php
$sql="select * from livro_topico2 where id_livro=".$_GET['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="servicotabs3"><?php echo $row['servico']; ?></div>
<?php
$sql="select * from livro_topico6 where id_livro=".$_GET['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="viaturas_pernoitetabs3"><?php echo $row['viaturas_pernoite']; ?></div>
<?php
$sql="select * from livro_topico11 where id_livro=".$_GET['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div id="materiais_passagemtabs3"><?php echo $row['materiais_passagem']; ?></div>
<?php
$sql="select * from livro where id=".$_GET['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$style="";


if( $_SESSION['papel']!="Coordenador")
{
	$style="display:none;";

}
?>
<center><button type="button" style="<?php echo $style;?>" class="btn btn-danger" id="devolver">Devolver LPD</button><span class="fa fa-question" id="question" style="<?php echo $style;?>"></span></center>
	  <h1 id="remessa_tree">Remessa de documentos (clique com o botão direito do mouse para excluir)</h1>

<ul id="treeDemo" class="ztree">
</ul>

</div>
</div></div>
<script> 

function PrintElem(elem)
{
    Popup($(elem).html());
}

function Popup(data)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');
    mywindow.document.write('<html><head><title></title>');
	mywindow.document.write('<link rel="stylesheet" href="lpd.css" type="text/css" />');
    //mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
   // mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
   
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');

    mywindow.print();
    mywindow.close();

    return true;
}
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
$(document).ready(function(){
	
	//atualizacao de topicos
	<?php
	$sql= "select * from livro where id=".$_GET['id'];
	$result=mysqli_query($db,$sql);
	//print_r($result)
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//print_r($row);
	//echo $sql;
	if($row['primeiro_topico']=="")
	{$primeiro_topico=0;}
	else{
	$primeiro_topico=intval($row['primeiro_topico'],10);
	}
	?>
	if ("<?php echo $row['status']?>"=="homologado")
	{
		$( "#tabs-2" ).trigger( "click" );
	}
	if("0"!="<?php echo $primeiro_topico;?>")
	{
	var n1=parseInt(<?php echo $primeiro_topico;?>,10);
	var n2=n1+1;
	var n3=n2+1;
	var n4=n3+1;
	var n5=n4+1;
	var n6=n5+1;
	var n7=n6+1;
	var n8=n7+1;
	var n9=n8+1;
	
	n1=n1.toString();
	n2=n2.toString();
	n3=n3.toString();
	n4=n4.toString();
	n5=n5.toString();
	n6=n6.toString();
	n7=n7.toString();
	n8=n8.toString();
	n9=n9.toString();
	
	
	if((n1).length==1) n1="000"+n1;
	if((n1).length==2) n1="00"+n1;
	if((n1).length==3) n1="0"+n1;

	if((n2).length==1) n2="000"+n2;
	if((n2).length==2) n2="00"+n2
	if((n2).length==3) n2="0"+n2;
	
	if((n3).length==1) n3="000"+n3;
	if((n3).length==2) n3="00"+n3;
	if((n3).length==3) n3="0"+n3;

	if((n4).length==1) n4="000"+n4;
	if((n4).length==2) n4="00"+n4;
	if((n4).length==3) n4="0"+n4;

	if((n5).length==1) n5="000"+n5;
	if((n5).length==2) n5="00"+n5;
	if((n5).length==3) n5="0"+n5;

	if((n6).length==1) n6="000"+n6;
	if((n6).length==2) n6="00"+n6;
	if((n6).length==3) n6="0"+n6;

	if((n7).length==1) n7="000"+n7;
	if((n7).length==2) n7="00"+n7;
	if((n7).length==3) n7="0"+n7;

	if((n8).length==1) n8="000"+n8;
	if((n8).length==2) n8="00"+n8;
	if((n8).length==3) n8="0"+n8;	

	if((n9).length==1) n9="000"+n9;
	if((n9).length==2) n9="00"+n9;
	if((n9).length==3) n9="0"+n9;		
	
	$('#tt1').html("Tópico: "+n1);
	$('#tt2').html("Tópico: "+n2);
	$('#tt3').html("Tópico: "+n3);
	$('#tt4').html("Tópico: "+n4);
	$('#tt5').html("Tópico: "+n5);
	$('#tt6').html("Tópico: "+n6);
	$('#tt7').html("Tópico: "+n7);
	$('#tt8').html("Tópico: "+n8);
	$('#tt9').html("Tópico: "+n9);
	
	$('#t1').html("Tópico: "+n1);
	$('#t2').html("Tópico: "+n2);
	$('#t3').html("Tópico: "+n3);
	$('#t4').html("Tópico: "+n4);
	$('#t5').html("Tópico: "+n5);
	$('#t6').html("Tópico: "+n6);
	$('#t7').html("Tópico: "+n7);
	$('#t8').html("Tópico: "+n8);
	$('#t9').html("Tópico: "+n9);
    }
	//atualizacao de topicos
//devolver
$('#question').click(function(){alert("clique aqui para tornar o livro editável novamente")});
	$('#devolver').click(function(){
	valor="flag=devolver&id=<?php echo $_GET['id'];?>";
//TESTE NOTIFICACOES
$.ajax({ 
 type:"POST", 
 url: "Salavar_livro.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
    // console.log(data);
	//alert(valor);
 	//alert(data);
	alert("Livro devolvido com sucesso");
	location.reload();
	
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

//devolver
	
	//homologar
	
	$('#homologar').click(function(){
	valor="flag=homologar&id=<?php echo $_GET['id'];?>";
//TESTE NOTIFICACOES
$.ajax({ 
 type:"POST", 
 url: "Salavar_livro.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
    // console.log(data);
	//alert(valor);
 	//alert(data);
	alert("Livro homologado com sucesso");
	location.reload();
	
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
	
	//homologar
	
	//TABS3
	var ancestor1 = document.getElementById('materiaistabs3'),
    descendents1 = ancestor1.getElementsByTagName('table');
	
	var ancestor2 = document.getElementById('servicotabs3'),
    descendents2 = ancestor2.getElementsByTagName('table');
	
	var ancestor3 = document.getElementById('viaturas_pernoitetabs3'),
    descendents3 = ancestor3.getElementsByTagName('table');
	
	var ancestor4 = document.getElementById('materiais_passagemtabs3'),
    descendents4 = ancestor4.getElementsByTagName('table');
	
	var i, e, d;
	  try{
    for (i = 0; i < descendents1.length; ++i) {
    e = descendents1[i];
	e.setAttribute("id","example1");
 
 
  
    var table = document.getElementById("example1");
	var s="";
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	   //alert(col.toString());
	   //console.log(col);
	   col=document.getHTML(col, true) ;
	   
	   s=s+"<th>"+col.toString().split("<td>")[1].split("</td>")[0]+"</th>";
	   
	  
     //iterate through columns
	 
     //columns would be accessed using the "col" variable assigned in the for loop
     }
     break;	 
    }
 
    s="<thead>"+s+"</thead>";
 
	$('#example1').prepend(s);
	
	$('#example1').DataTable( {
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
});
 
    }
   }
	catch{}
	try{
    for (i = 0; i < descendents2.length; ++i) {
    e = descendents2[i];
	e.setAttribute("id","example2");

  var table = document.getElementById("example2");
	var s="";
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	   //alert(col.toString());
	   //console.log(col);
	   col=document.getHTML(col, true) ;
	  	  
	   s=s+"<th>"+col.toString().split("<td>")[1].split("</td>")[0]+"</th>";
	  
	 
     //iterate through columns
	 
     //columns would be accessed using the "col" variable assigned in the for loop
     }
     break;	 
    }
 
    s="<thead>"+s+"</thead>";
 
	$('#example2').prepend(s);
	
	$('#example2').DataTable( {
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
	});
 
    }
    }
	catch{}
	try{
	
    for (i = 0; i < descendents3.length; ++i) {
    e = descendents3[i];
	e.setAttribute("id","example3");
    var table = document.getElementById("example3");
	var s="";
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	   //alert(col.toString());
	   //console.log(col);
	   col=document.getHTML(col, true) ;
	   s=s+"<th>"+col.toString().split("<td>")[1].split("</td>")[0]+"</th>";
     //iterate through columns
	 
     //columns would be accessed using the "col" variable assigned in the for loop
     }
     break;	 
    }
 
    s="<thead>"+s+"</thead>";
 
	$('#example3').prepend(s);
	$('#example3 tr:last').attr('id','last');
	$('#last').remove();
	 
	$('#example3').DataTable( {
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
	}); 
   
	}}catch{}
	try{
    for (i = 0; i < descendents4.length; ++i) {
    e = descendents4[i];
	e.setAttribute("id","example4");
    var table = document.getElementById("example4");
	var s="";
    for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
	   //alert(col.toString());
	   //console.log(col);
	   col=document.getHTML(col, true) ;
	   
	   s=s+"<th>"+col.toString().split("<td>")[1].split("</td>")[0]+"</th>";
	    
     //iterate through columns
	 
     //columns would be accessed using the "col" variable assigned in the for loop
     }
     break;	 
    }
 
    s="<thead>"+s+"</thead>";
 
	$('#example4').prepend(s);
	 
	$('#example4').DataTable( {
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
	});  
	
    }
     }
    catch{}	
	//TABS3
	
	$("#topico").keyup(function(){
	var n1=parseInt($("#topico").val(),10)+1;
	var n2=n1+1;
	var n3=n2+1;
	var n4=n3+1;
	var n5=n4+1;
	var n6=n5+1;
	var n7=n6+1;
	var n8=n7+1;
	var n9=n8+1;
	
	n1=n1.toString();
	n2=n2.toString();
	n3=n3.toString();
	n4=n4.toString();
	n5=n5.toString();
	n6=n6.toString();
	n7=n7.toString();
	n8=n8.toString();
	n9=n9.toString();
	
	
	if((n1).length==1) n1="000"+n1;
	if((n1).length==2) n1="00"+n1;
	if((n1).length==3) n1="0"+n1;

	if((n2).length==1) n2="000"+n2;
	if((n2).length==2) n2="00"+n2
	if((n2).length==3) n2="0"+n2;
	
	if((n3).length==1) n3="000"+n3;
	if((n3).length==2) n3="00"+n3;
	if((n3).length==3) n3="0"+n3;

	if((n4).length==1) n4="000"+n4;
	if((n4).length==2) n4="00"+n4;
	if((n4).length==3) n4="0"+n4;

	if((n5).length==1) n5="000"+n5;
	if((n5).length==2) n5="00"+n5;
	if((n5).length==3) n5="0"+n5;

	if((n6).length==1) n6="000"+n6;
	if((n6).length==2) n6="00"+n6;
	if((n6).length==3) n6="0"+n6;

	if((n7).length==1) n7="000"+n7;
	if((n7).length==2) n7="00"+n7;
	if((n7).length==3) n7="0"+n7;

	if((n8).length==1) n8="000"+n8;
	if((n8).length==2) n8="00"+n8;
	if((n8).length==3) n8="0"+n8;	

	if((n9).length==1) n9="000"+n9;
	if((n9).length==2) n9="00"+n9;
	if((n9).length==3) n9="0"+n9;		
	
	$('#tt1').html("Tópico: "+n1);
	$('#tt2').html("Tópico: "+n2);
	$('#tt3').html("Tópico: "+n3);
	$('#tt4').html("Tópico: "+n4);
	$('#tt5').html("Tópico: "+n5);
	$('#tt6').html("Tópico: "+n6);
	$('#tt7').html("Tópico: "+n7);
	$('#tt8').html("Tópico: "+n8);
	$('#tt9').html("Tópico: "+n9);
	
	$('#t1').html("Tópico: "+n1);
	$('#t2').html("Tópico: "+n2);
	$('#t3').html("Tópico: "+n3);
	$('#t4').html("Tópico: "+n4);
	$('#t5').html("Tópico: "+n5);
	$('#t6').html("Tópico: "+n6);
	$('#t7').html("Tópico: "+n7);
	$('#t8').html("Tópico: "+n8);
	$('#t9').html("Tópico: "+n9);
	});
	  $( function() {
    $( "#tabs" ).tabs();
  } );
	$('#Gerar_PDF').click(function(){
           //window.print();
		   //$("#tabs-2").PrintElem();
		   PrintElem("#tabs-2");
         //  return false;
});

		$('.dz-message').children('span').each(function()
	 {
 
		 
		 ($(this).html("Arraste documentos para upload"));
		 
	 });
	$('textarea').attr("rows","10");
CKEDITOR.replace( 'materiais' );
CKEDITOR.replace( 'servico' );
CKEDITOR.replace( 'viaturas_pernoite' );
CKEDITOR.replace( 'materiais_passagem' );
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
	  { data: "nome"}, //1
	  
	  { data: "papel"} //2
	  
	],
	
	
    "ajax": 'getUsuarios.php',
	
		 "columnDefs": [
		             {
				
                "render": function (data, type, row ) { 
		 
				 
				 
                   // return s.replace("&Ccedil;","ç");
					return '<button type="button" class="btn btn-danger" onclick=remover('+row['id']+')><span class="fa fa-trash"></span></button>' ;
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

		$(this).append('<td colspan="2"></td><td><center><button id="plus" type="button" style="border:0px; background-color:transparent;"  ><img src="plus.png" style="width:40px; height:40px;"></image></button></center></td>');
		
		$( "#plus" ).click(function() {
        $("#example").append('<tr><td colspan="1"><input id="nome" name="nome" type="text" class="form-control" placeholder="nome" style="width:100%;" autocomplete="off"></input></td><td><input class="form-control" id="senha" type="password" name="senha" placeholder="senha" type="text" autocomplete="off"/></td><td><select class="form-control" id="papel"><option>Usuário</option><option>Coordenador</option></select></td><td><button id="enviar" class="btn btn-info">Cadastrar</button></td></tr>');
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
 
});
</script>

<footer class="container">
  <!--<p>&copy; APMB 2020-{{ site.time | date: "%Y" }}</p>-->
</footer>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
