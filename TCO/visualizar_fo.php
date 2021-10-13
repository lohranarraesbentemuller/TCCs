<?php
include('config.php');
include('session.php');

$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

// echo $_SESSION['login_user'];
 //echo $_SESSION['papel'];exit();

$sql="select * from login where nome='".$_SESSION['login_user']."'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$sql="select * from cadastro where id_login=".$row['id'];
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$id22=$row['id'];

?>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
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
<!-- menu lateral-->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<!--fim do menu -->
<style>

@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);


body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;<nav.
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
    <title>Visualizar FO</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link href="dropzone.css" type="text/css" rel="stylesheet" />
	<!--datatables-->
  <!-- datatables -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	
<!--<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="style.css">
	<!---->
	<!--<script src="dropzone.js"></script>-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>

 
 <?php include("menu.php");?>
 
 
 
 <div class="container">
 
 
 
 
  <table id="example" class="display table" style="width:100%">
        <thead class="thead-dark" >
            <tr>
                <th>Opções</th>
                <th>Data</th>
                <th>Tipo</th>
                <th>Cadete</th>
                <th>Código</th>
				<th>Status</th>
				<th>ID</th>
				<th>Conduta</th>
                
            </tr>
			</thead>
  </table>
 
</div>



<script src="../dropzone-master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>
<script>
$.getJSON( "getCondutas.php", function( data2 ) {
$.getJSON( "getCadastrados.php", function( data3 ) {	
$(document).ready(function() {
	$('#sidebar').css("display","none");
	 $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#sidebar').css("display","inherit");
            });

	
	var table = $('#example').DataTable( {
	 responsive: true,
	 "order": [[ 1, "desc" ]],
         dom: 'Blfrtip',
         buttons: ['excel'],
	
	 //teste
    //"oSearch": {"#Status123": "Processado" },
 // } ); 
	//teste
//    $('#example').DataTable( {
	//	 responsive: true,
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
	{ data: "id"},
    { data: "data"},
	{ data: "PouN"},
	{ data: "id_anotado"},
	{ data: "codigo"},
	{ data: "status"},
	{ data: "id"},
	{ data: "conduta_aluno"}
	],
		<?php
		//echo utf8_decode($_SESSION['papel']);
		if($_SESSION['papel']=="aluno")
          echo '"ajax": "getFOs.php?id_anotado='.$id22.'",';
	    if(utf8_decode($_SESSION['papel'])=="coordenação" || ($_SESSION['papel'])=="coordenação")
		  echo '"ajax": "getFOs_coordenacao.php",';	
	    if($_SESSION['papel']=="secretaria")
		  echo '"ajax": "getFOs_coordenacao.php",';		  
		?>
		
		//teste2
		"columnDefs": [
						{"render":function(data,type,row){
				obj=data3;
				id=row['id_anotado'];
				//console.log(id);
			    for(i=0;i<obj.data.length;i++)
				{
					if(obj.data[i].id==id)
					{
						console.log(obj.data[i]);
						
						esfo="CAD "+obj.data[i].nome_de_guerra;
						break;
					}
				}
				//return row['id'];
				//return "<a href='editar_formulario.php?id="+row['id']+
			//	return '<a href="editar_formulario.php?id='+row['id']+"'>"+esfo+"</a>";
				//return '<a class="color:inherit;" href="editar_formulario.php?id='+row['id']+'">'+esfo+"</a>";
				 if(row['status']=="Processado")
				 {
				//	return '<a href="editar_formulario.php?id='+row['id']+'><button>Processado</button></a>'; //lohran arraes bentemuller
					return '<center><table style="background-color:transparent;"><tr><td><a href="editar_formulario.php?id='+row['id']+'">'+"Processado</a></td></tr></center>"
				 }
                <?php
                 if(utf8_decode($_SESSION['papel'])=='coordenação' || ($_SESSION['papel'])=="coordenação" )
				 {
					 $sql="select * from login where nome='".$_SESSION['login_user']."'";
					 $result=mysqli_query($db,$sql);
					 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					 $sql="select * from cadastro where id_login=".$row['id'];
					 $result=mysqli_query($db,$sql);
					 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					 if($row['posto']=="Outro")
					 {
					 echo "if(row['status']!='Criado')";
                        echo "return '<center>'+row['status']+'</center>';";
					 }
					 if($row['posto']=="Comandante de Cia")
					 {
					 echo "if(row['status']!='Aprovado')";
                        echo "return '<center>'+row['status']+'</center>';";						 
					 }
					 if($row['posto']=="Comandante da ESFO")
					 {
					 echo "if(row['status']!='Aprovado Comandante de Cia')";
                        echo "return '<center>'+row['status']+'</center>';";						 
					 }
 

				 }
                 ?> 
					 <?php if($_SESSION['papel']=='secretaria')
					 {
					 echo "if(row['status']!='Aprovado Comandante da ESFO')";
                        echo "return '<center>'+row['status']+'</center>';";						 
					 } ?>				 
                <?php
                 if($_SESSION['papel']=='aluno')
				 {
					 echo "if(row['status']!='Criado' && row['status']!='Devolvido' )";
                        echo "return '<center>'+row['status']+'</center>';";
					 	
				 }
                 ?> 

				return '<center><table style="background-color:transparent;"><tr><td><a href="editar_formulario.php?id='+row['id']+'">'+"<button id='editar_"+row['id']+"' class='fa fa-edit' /></a></td><td><button id='del_"+row['id']+"' class='fa fa-trash' /></td></tr></center>"
				
				//return esfo;//"<table style='background-color:transparent; border:none;'><tbody style='border:none; background-color:transparent;'><tr style='border:none; background-color:transparent;'><td style='font-size:10px;border:0px; background-color:transparent'><button style='border:none;' class='fa fa-trash' onclick=remover(" + row['id']+") type='button' ></button></td><td style='border:0px; background-color:transparent'>"+cadete+"</td></tr></tbody></table>"  ;
			},"targets":0},
		
		{"render":function(data,type,row){
			return (row['conduta_aluno']).slice(0,100);
			},"targets":7},
		       
				{"render":function(data,type,row){
				obj=data3;
				id=row['id_anotado'];
				//console.log(id);
			    for(i=0;i<obj.data.length;i++)
				{
					if(obj.data[i].id==id)
					{
						console.log(obj.data[i]);
						
						esfo="CAD "+obj.data[i].nome_de_guerra;
						break;
					}
				}
				//return row['id'];
				//return "<a href='editar_formulario.php?id="+row['id']+
			//	return '<a href="editar_formulario.php?id='+row['id']+"'>"+esfo+"</a>";
				//return '<a class="color:inherit;" href="editar_formulario.php?id='+row['id']+'">'+esfo+"</a>";
				return esfo;//"<table style='background-color:transparent; border:none;'><tbody style='border:none; background-color:transparent;'><tr style='border:none; background-color:transparent;'><td style='font-size:10px;border:0px; background-color:transparent'><button style='border:none;' class='fa fa-trash' onclick=remover(" + row['id']+") type='button' ></button></td><td style='border:0px; background-color:transparent'>"+cadete+"</td></tr></tbody></table>"  ;
			},"targets":3},
							{"render":function(data,type,row){
				obj=data2;
				id=row['codigo'];
				//console.log(id);
			    for(i=0;i<obj.data.length;i++)
				{
					if(obj.data[i].id==id)
					{
						//console.log(obj.data[i]);
						
						esfo=obj.data[i].id_cadete;//+" "+ obj.data[i].data;
						break;
					}
				}
				return esfo;//"<table style='background-color:transparent; border:none;'><tbody style='border:none; background-color:transparent;'><tr style='border:none; background-color:transparent;'><td style='font-size:10px;border:0px; background-color:transparent'><button style='border:none;' class='fa fa-trash' onclick=remover(" + row['id']+") type='button' ></button></td><td style='border:0px; background-color:transparent'>"+cadete+"</td></tr></tbody></table>"  ;
			},"targets":4},
			],
			//teste 2
			//{ "visible": false,  "targets": [ 1 ] }
		
		
    } );
	
	 		
		$('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" id="'+title+'123" placeholder="Procurar '+title+'" />' );
        //     "oSearch": {"#"+title+"123": "processado"},
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
		
        } );
    } );
	<?php
	$sql="select * from login where nome='".$_SESSION['login_user']."'";
	$result =mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$sql="select * from cadastro where id_login=".$row['id'];
	$result =mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	//echo "lohran arraes bentemuller";
	//echo "<BR>";
	//echo $row['posto'];
	//echo "<BR>";
	//echo "<BR>";
	//echo $sql;
	//echo "<BR>";
	//print_r($_SESSION);
	if($row['posto']=="Outro")
	{
	echo 'table.column(5).search("Criado").draw();';
	}
	if($row['posto']=="Comandante de Cia")
	{
	echo 'table.column(5).search("^Aprovado$",true,false,true).draw();';
	// table.column(i)
 //.search("^" + $(this).val() + "$", true, false, true)
 //.draw();
	}	
	if($row['posto']=="Comandante da ESFO" && $_SESSION['papel']=="coordenação")
	{
	echo 'table.column(5).search("Aprovado Comandante de Cia").draw();';
	}		
	if($_SESSION['papel']=="secretaria")
	{
	echo 'table.column(5).search("Aprovado Comandante da ESFO").draw();';
	}			
	?>
	$(document).arrive('.fa-edit',function(){

		$('.fa-edit').click(function(){
			//alert($(this).attr("id"));
			$(location).attr('href', "editar_formulario.php?id="+$(this).attr("id").split("_")[1])
			//window.location.href("editar_formulario.php?id="+$(this).attr("id").split("_")[1]);
		});
	});
	$(document).arrive('.fa-trash',function(){
		$('.fa-trash').click(function(){
 //inicio deleter
         valor="id="+$(this).attr("id").split("_")[1];
		$.ajax({ 
 type:"POST", 
 url: "deletar_FO.php", 
 data:valor,
  success: function(data){
	 console.log(valor);
	 location.reload(true);
			//console.log("AQUI");
		//	console.log(parseInt(data22,10));
	   // /$('#Data1').trigger("change");
		//alert("foi");
        //do something special
        //}, 500);  
	//window.location.href = 'formulario.php?id='+parseInt(data22,10);
    //console.log(valor);
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
	
		
		//fim deletar
		});
	});
} );
} );
} );
</script>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript"  src="../jQuery-Autocomplete-master/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
</html>