<?
include("config.php");
include("session.php");
?>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<?php

//$sql="select gerson.id as id,passagem,materiais_passagem,nome_completo_form,matricula_form,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais,remessa from(select pires.id as id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais,remessa from (select lohran.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais from (select tttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento from (select ttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga from (select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro)ttt1 inner join (select * from livro_topico7) ttt2 on ttt1.id=ttt2.id_livro)tttt1 inner join (select * from livro_topico8)tttt2 on tttt1.id=tttt2.id_livro)lohran inner join (select * from livro_topico9)lohran2 on lohran.id=lohran2.id_livro)pires inner join (select * from livro_topico10)pires2 on pires.id=pires2.id_livro)gerson inner join (select * from livro_topico11)gerson2 on gerson.id=gerson2.id_livro";
$sql = "select q1.id,texto_inicial,texto_inicial2,passagem from (select t1.id,texto_inicial,texto_inicial2 from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join (select * from livro_topico11)q2 on q1.id=q2.id_livro";
if(isset($_GET['turma']))
  $sql="select * from avisos where turma='Todas' or turma like '".$_GET['turma']."%'";
$result=mysqli_query($db,$sql);

//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$recados=array();
foreach($result as $row)
{
	
//$recado=$row['recado'];
//$recado=substr($recado,0,500);
//$recado= strip_tags( $recado );//[, string $allowable_tags ] )
array_push($recados,$row);
}
/*
for($w=0;$w<count($recados);$w++) //ordenando por data
{
	for($q=0;$q<count($recados);$q++)
	{
	  if($recados[$w]['data']>$recados[$q]['data'])
	  {
	  $aux=$recados[$w];
      $recados[$w]=$recados[$q];	  
      $recados[$q]=$aux;
	  }
	}
 
}

for($w=0;$w<count($recados);$w++) //ordenando por importancia
{
	for($q=0;$q<count($recados);$q++)
	{
	  if($recados[$w]['importancia']>$recados[$q]['importancia'])
	  {
	  $aux=$recados[$w];
      $recados[$w]=$recados[$q];	  
      $recados[$q]=$aux;
	  }
	}
 
}
*/
$recados2=array();
foreach($recados as $rec)
{
$recado=$rec['passagem'];
$recado=substr($recado,0,1000);
$recado= strip_tags( $recado );//[, string $allowable_tags ] )
array_push($recados2,"LPD ".$rec['texto_inicial']."|$|".$recado."|$|".$rec['id']);
}
$recados=$recados2;

$titulo=explode("|$|",$recados[0])[0];
$recado=explode("|$|",$recados[0])[1];
$id=explode("|$|",$recados[0])[2];
?>

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/DOCUMENTOS_IMPORTANTES">Documenta????o</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/CADASTRO">Cadastro</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/PROVAS">Provas</a>
				  <a class="dropdown-item" href="http://ec2-3-132-214-3.us-east-2.compute.amazonaws.com/fichas-de-aula/">Fichas de Aula</a>
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
	<a href="logout.php"><button class="btn btn-outline-success my-2 my-sm-0" type="button" href="logout.php">Sair</button></a>
 
  </div>
</nav> -->
<?php include("menu.php");?>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo $titulo; ?></h1>
      <p><?php echo $recado;?></p>
      <p><a class="btn btn-primary btn-lg" href="<?php  echo "novo_livro.php?id=".$id; ?>" role="button">Veja Mais &raquo;</a></p>
    </div>
  </div>

  
  <div class="container">
 <?php
$saida="" ;
for($i=1;$i<count($recados);$i++)
  {
$titulo=explode("|$|",$recados[$i])[0];
$recado=explode("|$|",$recados[$i])[1];
$id=explode("|$|",$recados[$i])[2];	  

  if($i==count($recados))
  {
  if($i%3==1)
  {
  $saida=$saida.'<div class="row"><div class="col">';
  }	  
	  $saida=$saida.'<div class="col">';
      $saida=$saida."<h2>".$titulo."</h2>";
	  $saida=$saida."<p style='text-align:justify;'>".$recado."</p>";
	  $saida=$saida."<p><a class='btn btn-secondary' href='novo_livro.php?id=".$id."' role='button'>Veja Mais &raquo;</a></p>";
      $saida=$saida.'</div>';	  
	  $saida=$saida.'</div>';	  	  
  }
  else{
  if($i%3==1)
  {
	  $saida=$saida.'<div class="row"><div class="col">';
      $saida=$saida."<h2>".$titulo."</h2>";
	  $saida=$saida."<p style='text-align:justify;'>".$recado."</p>";
	  $saida=$saida."<p><a class='btn btn-secondary' href='novo_livro.php?id=".$id."' role='button'>Veja Mais &raquo;</a></p>";
      $saida=$saida.'</div>';
  }
  if($i%3==2)
  {
	  $saida=$saida.'<div class="col">';
      $saida=$saida."<h2>".$titulo."</h2>";
	  $saida=$saida."<p style='text-align:justify;'>".$recado."</p>";
	  $saida=$saida."<p><a class='btn btn-secondary' href='novo_livro.php?id=".$id."' role='button'>Veja Mais &raquo;</a></p>";
      $saida=$saida.'</div>';	  
  }
  if($i%3==0)
  {
	  $saida=$saida.'<div class="col">';
      $saida=$saida."<h2>".$titulo."</h2>";
	  $saida=$saida."<p style='text-align:justify;'>".$recado."</p>";
	  $saida=$saida."<p><a class='btn btn-secondary' href='novo_livro.php?id=".$id."' role='button'>Veja Mais &raquo;</a></p>";
      $saida=$saida.'</div>';	  
	  $saida=$saida.'</div>';	  
  }
  }
  } 
  echo $saida;
  ?>
  </div>


</main>

<footer class="container">
  <p>&copy; APMB 2021</p>
</footer>

<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
