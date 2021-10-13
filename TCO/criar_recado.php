ar---
layout: examples
title: Jumbotron Template
extra_css: "jumbotron.css"
---
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
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
<form method="post">
<center><h2>Criar novo Aviso</h2></center>
<h3>Título</h3>
<input class="form-control" id="titulo" name="titulo"></input>
<h3>Relevância</h3>
<select class="form-control" name="importancia" id="importancia">
<option selected>Aviso</option>
<option>Relevante</option>
<option>Muito Relevante</option>
<option>Urgente</option>
<option>Extremamente Urgente</option>
</select>
<h3>Turma</h3>
<select class="form-control" name="turma" id="turma">
<option>Todas</option>
<?php $sql2="select distinct(escala) from postos";
$result2=mysqli_query($db,$sql2);
foreach($result2 as $row2)
{
	echo "<option>".$row2['escala']."</option>";
}
?>
</select>
<h3>Conteúdo</h3>
<textarea class="form-control" id="conteudo" name="conteudo" rows="20"></textarea>

<center><button type="submit" width=20% class="btn btn-primary mb-2" type="submit"  name="btnDelete" id='enviar2' style="margin:10%;background-color:#212529;border-color:#212529;" >Enviar</button></center>

</form>
</div>
<script> 
//$(document).ready(function(){
	CKEDITOR.replace( 'conteudo' );
//});
</script>

<footer class="container">
  <p>&copy; APMB 2020-{{ site.time | date: "%Y" }}</p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
