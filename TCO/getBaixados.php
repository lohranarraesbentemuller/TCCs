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
    array( 'db' => 'numero','dt' => 'numero'),
    array( 'db' => 'data','dt'=>'data'), 
    array( 'db' => 'prefixo','dt'=>'prefixo'),
    array( 'db' => 'comandante','dt'=>'comandante'),
    array( 'db' => 'natureza','dt'=>'natureza'),
	array( 'db' => 'solicitante','dt'=>'solicitante'),
	array( 'db' => 'contato','dt'=>'contato'),
	array( 'db' => 'cidade','dt'=>'cidade'),
	array( 'db' => 'bairro','dt'=>'bairro'),
	array( 'db' => 'endereco','dt'=>'endereco'),
	array( 'db' => 'lat','dt'=>'lat'),
	array( 'db' => 'lng','dt'=>'lng'),
	array( 'db' => 'maps','dt'=>'maps'),
	array( 'db' => 'historico_inicial','dt'=>'historico_inicial')
    
);

$table = <<<EOT
 (
 select numero,data,prefixo,comandante,natureza,solicitante,contato,cidade,bairro,endereco,lat,lng,maps,historico_inicial from (select * from (select q1.*,q2.solicitante,q2.contato from (select * from (select id_ocorrencia,id_prefixo,id_solicitante,id_loc from ocorrencia_concat)t1 inner join (select * from ocorrencia)t2 on t1.id_ocorrencia=t2.numero)q1 inner join (select * from ocorrencia_solicitante)q2 on q1.id_solicitante=q2.id)g1 inner join (select * from ocorrencia_local)g2 on g1.id_loc=g2.id)l1 inner join (select * from ocorrencia_comando)l2 on l1.id_prefixo=l2.id
 ) temp
EOT;

$primaryKey='numero';
if(isset($_GET['numero']))
{
$where="numero= ".$_GET['numero']." ";
}
else
{
	$where="1=1";
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
 
 
