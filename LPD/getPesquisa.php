<?php
//include('config.php');
 
		
require( '../FO/ssp.class.php' );
		  
$sql_details = array(
    'user' => 'USUARIO_DB',
    'pass' => 'SENHA_DB',
    'db'   => 'DB',
    'host' => 'localhost'
);
 //| id | data_do_fato | PouN     | defesa | data_ciencia | horario | id_anotado | codigo | conduta_aluno          | razoes |

$columns = array(
    array( 'db' => 'id', 'dt' => 'id' ),
    array( 'db' => 'data_do_fato','dt' => 'data'),
    array( 'db' => 'PouN','dt' => 'PouN'),
    array( 'db' => 'id_anotado','dt' => 'id_anotado'),
    array( 'db' => 'codigo','dt' => 'codigo'),
    //array( 'db' => 'cor','dt' => 'cor'),
    
);
$columns = array(
   array( 'db' => 'id','dt' => 'id' ),
   array( 'db' => 'data_do_fato', 'dt' => 'data' ),
   array( 'db' => 'PouN',   'dt' => 'PouN' ),
   array( 'db' => 'defesa', 'dt' => 'defesa' ),
   array( 'db' => 'data_ciencia', 'dt' => 'data_ciencia' ),
   array( 'db' => 'horario', 'dt' => 'horario' ),
   array( 'db' => 'id_anotado', 'dt' => 'id_anotado' ),
   array( 'db' => 'codigo', 'dt' => 'codigo' ),
   array( 'db' => 'conduta_aluno', 'dt' => 'conduta_aluno' ),
   array( 'db' => 'razoes', 'dt' => 'razoes' ),
   array( 'db' => 'status', 'dt' => 'status' )
);

$columns = array(
    array( 'db' => 'id','dt' => 'id'),
    //array( 'db' => 'data','dt'=>'data'), 
    array( 'db' => 'autor','dt'=>'autor'),
    array( 'db' => 'oficial','dt'=>'oficial'),
    array( 'db' => 'primeiro_topico','dt'=>'primeiro_topico'),
	array( 'db' => 'texto_inicial','dt'=>'texto_inicial'),
	array( 'db' => 'texto_inicial2','dt'=>'texto_inicial2'),
	array( 'db' => 'materiais','dt'=>'materiais'),
//topico2
	array('db'=>'servico','dt'=>'servico'),
	//topico3
	array('db'=>'faltas','dt'=>'faltas'),
	array('db'=>'atrasos','dt'=>'atrasos'),
	//topico4
	array('db'=>'trocas','dt'=>'trocas'),
	array('db'=>'outros_troca','dt'=>'outros_troca'),
	//topico5
	array('db'=>'presos','dt'=>'presos'),
	array('db'=>'detidos','dt'=>'detidos'),
	array('db'=>'ausentes','dt'=>'ausentes'),
	array('db'=>'desertores','dt'=>'desertores'),
	//topico6
	array('db'=>'viaturas_pernoite','dt'=>'viaturas_pernoite'),
	//topico7
	array('db'=>'instalacoes','dt'=>'instalacoes'),
	array('db'=>'equipamentos','dt'=>'equipamentos'),
	array('db'=>'inicial_hidrometro','dt'=>'inicial_hidrometro'),
	array('db'=>'final_hidrometro','dt'=>'final_hidrometro'),
	array('db'=>'diferenca_hidrometro','dt'=>'diferenca_hidrometro'),
	array('db'=>'outros_material_carga','dt'=>'outros_material_carga'),
	//topico 8
	array('db'=>'reserva_armamento','dt'=>'reserva_armamento'),
	//topico 9	
//	array('db'=>'demais','dt'=>'demais'),
	//topico 10	
	array('db'=>'remessa','dt'=>'remessa')//,
	//topico 11
//	array('db'=>'passagem','dt'=>'passagem'),
//	array('db'=>'materiais_passagem','dt'=>'materiais_passagem'),
//	array('db'=>'nome_completo_form','dt'=>'nome_completo_form'),
//	array('db'=>'matricula_form','dt'=>'matricula_form')
);
/*
select *from livro
 select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro
 select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro
 select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro
 select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro
 select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro
 select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro
 select ttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga from (select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro)ttt1 inner join (select * from livro_topico7) ttt2 on ttt1.id=ttt2.id_livro
 select tttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento from (select ttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga from (select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro)ttt1 inner join (select * from livro_topico7) ttt2 on ttt1.id=ttt2.id_livro)tttt1 inner join (select * from livro_topico8)tttt2 on tttt1.id=tttt2.id_livro
 select lohran.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais from (select tttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento from (select ttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga from (select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro)ttt1 inner join (select * from livro_topico7) ttt2 on ttt1.id=ttt2.id_livro)tttt1 inner join (select * from livro_topico8)tttt2 on tttt1.id=tttt2.id_livro)lohran inner join (select * from livro_topico9)lohran2 on lohran.id=lohran2.id_livro
 select pires.id as id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais,remessa from (select lohran.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais from (select tttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento from (select ttt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga from (select gg1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite from (select qq1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores from (select tt1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca from (select g1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos from (select q1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico from (select t1.id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais from (select * from livro)t1 inner join (select * from livro_topico1)t2 on t1.id=t2.id_livro)q1 inner join(select * from livro_topico2)q2 on q1.id=q2.id_livro)g1 inner join (select * from livro_topico3) g2 on g1.id=g2.id_livro)tt1 inner join (select * from livro_topico4)tt2 on tt1.id=tt2.id_livro)qq1 inner join (select * from livro_topico5)qq2 on qq1.id=qq2.id_livro)gg1 inner join (select * from livro_topico6)gg2 on gg1.id=gg2.id_livro)ttt1 inner join (select * from livro_topico7) ttt2 on ttt1.id=ttt2.id_livro)tttt1 inner join (select * from livro_topico8)tttt2 on tttt1.id=tttt2.id_livro)lohran inner join (select * from livro_topico9)lohran2 on lohran.id=lohran2.id_livro)pires inner join (select * from livro_topico10)pires2 on pires.id=pires2.id_livro
 */


//select livro.id as id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,demais from livro  inner join livro_topico1 on livro.id=livro_topico1.id_livro inner join livro_topico2 on livro.id=livro_topico2.id_livro inner join livro_topico3 on livro.id=livro_topico3.id_livro inner join livro_topico4 on livro.id=livro_topico4.id_livro inner join livro_topico5 on livro.id=livro_topico5.id_livro inner join livro_topico6 on livro.id=livro_topico6.id_livro inner join livro_topico7 on livro.id=livro_topico7.id_livro inner join livro_topico8 on livro.id=livro_topico8.id_livro inner join livro_topico9 on livro.id=livro_topico9.id_livro

$table = <<<EOT
 (
 select livro.id as id,autor,oficial,primeiro_topico,texto_inicial,texto_inicial2,materiais,servico,faltas,atrasos,trocas,outros_troca,presos,detidos,ausentes,desertores,viaturas_pernoite,instalacoes,equipamentos,inicial_hidrometro,final_hidrometro,diferenca_hidrometro,outros_material_carga,reserva_armamento,remessa from
livro 
inner join livro_topico1 on livro.id=livro_topico1.id_livro
inner join livro_topico2 on livro.id=livro_topico2.id_livro
inner join livro_topico3 on livro.id=livro_topico3.id_livro
inner join livro_topico4 on livro.id=livro_topico4.id_livro
inner join livro_topico5 on livro.id=livro_topico5.id_livro
inner join livro_topico6 on livro.id=livro_topico6.id_livro
inner join livro_topico7 on livro.id=livro_topico7.id_livro
inner join livro_topico8 on livro.id=livro_topico8.id_livro
inner join livro_topico10 on livro.id=livro_topico10.id_livro
 ) temp
EOT;

$primaryKey='id';
if(isset($_POST['flag']))
{
$where="numero= ".$_GET['numero']." ";
$autor="";
$oficial="";
$texto_inicial="";
$texto_inicial2="";
$materiais="";
$servico="";
$faltas="";
$atrasos="";
$trocas="";
$outros_troca="";
$presos="";
$detidos="";
$ausentes="";
$desertores="";
$viaturas_pernoite="";

if(isset($_POST['Autor']))
{
$autor=$_POST['Autor'];
//echo $autor;
}
if(isset($_POST['Oficial']))
{
$oficial=$_POST['Oficial'];
}
if(isset($_POST['Data']))
{
$texto_inicial=$_POST['Data'];
}
if(isset($_POST['Passagem']))
{
$texto_inicial2=$_POST['Passagem'];
}
if(isset($_POST['Material']))
{
$materiais=$_POST['Material'];
}
if(isset($_POST['Escala']))
{
$servico=$_POST['Escala'];
}
if(isset($_POST['Faltas']))
{
$faltas=$_POST['Faltas'];
}
if(isset($_POST['Atrasos']))
{
$atrasos=$_POST['Atrasos'];
}
if(isset($_POST['Trocas']))
{
$trocas=$_POST['Trocas'];
}
if(isset($_POST['Outras_alteracoes']))
{
$outros_troca=$_POST['Outras_alteracoes'];
}
if(isset($_POST['Presos']))
{
$presos=$_POST['Presos'];
}
if(isset($_POST['Detidos']))
{
$detidos=$_POST['Detidos'];
}
if(isset($_POST['Ausentes']))
{
$ausentes=$_POST['Ausentes'];
}
if(isset($_POST['Desertores']))
{
$desertores=$_POST['Desertores'];
}
if(isset($_POST['viaturas']))
{
$viaturas_pernoite=$_POST['viaturas'];
}
if(isset($_POST['instalacoes']))
{
$instalacoes=$_POST['instalacoes'];
}
if(isset($_POST['Equipamentos']))
{
$equipamentos=$_POST['Equipamentos'];
}
if(isset($_POST['outros_material_carga']))
{
$outros_material=$_POST['outros_material_carga'];
}
if(isset($_POST['Reserva']))
{
$reserva=$_POST['Reserva'];
}
if(isset($_POST['Remessa']))
{
$remessa=$_POST['Remessa'];
}
$where="";
if($autor!="")
{
	$where="autor like '%".$autor."%'";
}
if($oficial!="")
{
	if($where!="")
	{
	$where.=" and oficial like '%".$oficial."%'";	
	}
	else
	{
	$where="oficial like '%".$oficial."%'";
	}
}
if($texto_inicial!="")
{
	if($where!="")
	{
	$where.=" and texto_inicial like '%".$texto_inicial."%'";	
	}
	else
	{
	$where="texto_inicial like '%".$texto_inicial."%'";
	}
}
if($texto_inicial2!="")
{
	if($where!="")
	{
	$where.=" and texto_inicial2 like '%".$texto_inicial2."%'";	
	}
	else
	{
	$where="texto_inicial2 like '%".$texto_inicial2."%'";
	}
}
if($materiais!="")
{
	if($where!="")
	{
	$where.=" and materiais like '%".$materiais."%'";	
	}
	else
	{
	$where="materiais like '%".$materiais."%'";
	}
}
if($servico!="")
{
	if($where!="")
	{
	$where.=" and servico like '%".$servico."%'";	
	}
	else
	{
	$where="servico like '%".$servico."%'";
	}
}
if($faltas!="")
{
	if($where!="")
	{
	$where.=" and faltas like '%".$faltas."%'";	
	}
	else
	{
	$where="faltas like '%".$faltas."%'";
	}
}
if($atrasos!="")
{
	if($where!="")
	{
	$where.=" and atrasos like '%".$atrasos."%'";	
	}
	else
	{
	$where="atrasos like '%".$atrasos."%'";
	}
}
if($trocas!="")
{
	if($where!="")
	{
	$where.=" and trocas like '%".$trocas."%'";	
	}
	else
	{
	$where="trocas ='%".$trocas."%'";
	}
}
if($outros_troca!="")
{
	if($where!="")
	{
	$where.=" and outros_troca like '%".$outros_troca."%'";	
	}
	else
	{
	$where="outros_troca like '%".$outros_troca."%'";
	}
}
if($presos!="")
{
	if($where!="")
	{
	$where.=" and presos like '%".$presos."%'";	
	}
	else
	{
	$where="presos like '%".$presos."%'";
	}
}
if($detidos!="")
{
	if($where!="")
	{
	$where.=" and detidos like '%".$detidos."%'";	
	}
	else
	{
	$where="detidos like '%".$detidos."%'";
	}
}
if($ausentes!="")
{
	if($where!="")
	{
	$where.=" and ausentes like '%".$ausentes."%'";	
	}
	else
	{
	$where="ausentes like '%".$ausentes."%'";
	}
}
if($desertores!="")
{
	if($where!="")
	{
	$where.=" and desertores like '%".$desertores."%'";	
	}
	else
	{
	$where="desertores like '%".$desertores."%'";
	}
}
if($viaturas_pernoite!="")
{
	if($where!="")
	{
	$where.=" and viaturas_pernoite like '%".$viaturas_pernoite."%'";	
	}
	else
	{
	$where="viaturas_pernoite like '%".$viaturas_pernoite."%'";
	}
}
if($instalacoes!="")
{
	if($where!="")
	{
	$where.=" and instalacoes like '%".$instalacoes."%'";	
	}
	else
	{
	$where="instalacoes like '%".$instalacoes."%'";
	}
}
if($equipamentos!="")
{
	if($where!="")
	{
	$where.=" and equipamentos like '%".$equipamentos."%'";	
	}
	else
	{
	$where="equipamentos like '%".$equipamentos."%'";
	}
}
if($outros_material!="")
{
	if($where!="")
	{
	$where.=" and outros_material_carga like '%".$outros_material."%'";	
	}
	else
	{
	$where="outros_material_carga like '%".$outros_material."%'";
	}
}
if($reserva!="")
{
	if($where!="")
	{
	$where.=" and reserva like '".$reserva."'";	
	}
	else
	{
	$where="reserva like '%".$reserva."%'";
	}
}
if($remessa!="")
{
	if($where!="")
	{
	$where.=" and remessa like '%".$remessa."%'";	
	}
	else
	{
	$where="remessa like '%".$remessa."%'";
	}
}

//echo $where;

}
else
{
	$where="1=1";
	//$where="oficial like '%frederico%'";
}
//print_r($_GET);echo "<BR>";
//print_r($sql_details);echo "<BR>";
//print_r($table);echo "<BR>";
//print_r($primaryKey);echo "<BR>";
//print_r($columns);echo "<BR>";
//echo $where."<BR>";
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$where )
);
//}
       
     ?>
 
 
