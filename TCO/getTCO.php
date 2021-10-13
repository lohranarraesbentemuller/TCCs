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
    array( 'db' => 'tipo_penal','dt'=>'tipo_penal'), 
    array( 'db' => 'fonte','dt'=>'fonte'),
    array( 'db' => 'descricao','dt'=>'descricao'),
    array( 'db' => 'tags','dt'=>'tags'),
	array( 'db' => 'cabe_tco','dt'=>'cabe_tco'),
	array( 'db' => 'ncabe_tco','dt'=>'ncabe_tco'),
	array( 'db' => 'atencao','dt'=>'atencao'),
	array( 'db' => 'caminho','dt'=>'caminho')
    
);

$table = <<<EOT
 (
  select t1.id,tipo_penal,fonte,descricao,tags,cabe_tco,ncabe_tco,atencao,caminho from (select * from TCO)t1 left join (select * from anexo_TCO)t2 on t1.id=t2.id_TCO
 ) temp
EOT;

$primaryKey='id';
if(isset($_GET['id']))
{
$where="id= ".$_GET['id']." ";
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
 
 
