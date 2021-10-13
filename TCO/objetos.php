<?php
 
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
 //   exit();
}
?>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="../ckeditor/ckeditor.js"></script>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery.css" />
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery-indicator.css" />
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery-video.css" />
   <!-- <link rel="stylesheet" href="Gallery-2.36.0/css/demo/demo.css" /> -->

<style>
.skin-blue .main-header .navbar{background-color:#154D6E}.skin-blue .main-header .navbar .nav>li>a{color:#fff}.skin-blue .main-header .navbar .nav>li>a:hover,.skin-blue .main-header .navbar .nav>li>a:active,.skin-blue .main-header .navbar .nav>li>a:focus,.skin-blue .main-header .navbar .nav .open>a,.skin-blue .main-header .navbar .nav .open>a:hover,.skin-blue .main-header .navbar .nav .open>a:focus,.skin-blue .main-header .navbar .nav>.active>a{background:rgba(0,0,0,0.1);color:#f6f6f6}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{color:#f6f6f6;background:rgba(0,0,0,0.1)}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{background-color:#154D6E}@media (max-width:767px){.skin-blue .main-header .navbar .dropdown-menu li.divider{background-color:rgba(255,255,255,0.1)}.skin-blue .main-header .navbar .dropdown-menu li a{color:#fff}.skin-blue .main-header .navbar .dropdown-menu li a:hover{background:#154D6E}}.skin-blue .main-header .logo{background-color:#154D6E;color:#fff;border-bottom:0 solid transparent}.skin-blue .main-header .logo:hover{background-color:#154D6E}.skin-blue .main-header li.user-header{background-color:#154D6E}.skin-blue .content-header{background:transparent}.skin-blue .wrapper,.skin-blue .main-sidebar,.skin-blue .left-side{background-color:#154D6E}.skin-blue .user-panel>.info,.skin-blue .user-panel>.info>a{color:#fff}.skin-blue .sidebar-menu>li.header{color:#4b646f;background:#1a2226}.skin-blue .sidebar-menu>li>a{border-left:3px solid transparent}.skin-blue .sidebar-menu>li:hover>a,.skin-blue .sidebar-menu>li.active>a{color:#fff;background:#1e282c;border-left-color:#3c8dbc}.skin-blue .sidebar-menu>li>.treeview-menu{margin:0 1px;background:#2c3b41}.skin-blue .sidebar a{color:#b8c7ce}.skin-blue .sidebar a:hover{text-decoration:none}.skin-blue .treeview-menu>li>a{color:#8aa4af}.skin-blue .treeview-menu>li.active>a,.skin-blue .treeview-menu>li>a:hover{color:#fff}.skin-blue .sidebar-form{border-radius:3px;border:1px solid #374850;margin:10px 10px}.skin-blue .sidebar-form input[type="text"],.skin-blue .sidebar-form .btn{box-shadow:none;background-color:#374850;border:1px solid transparent;height:35px}.skin-blue .sidebar-form input[type="text"]{color:#666;border-top-left-radius:2px;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:2px}.skin-blue .sidebar-form input[type="text"]:focus,.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{background-color:#fff;color:#666}.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{border-left-color:#fff}.skin-blue .sidebar-form .btn{color:#999;border-top-left-radius:0;border-top-right-radius:2px;border-bottom-right-radius:2px;border-bottom-left-radius:0}.skin-blue.layout-top-nav .main-header>.logo{background-color:#154D6E;color:#fff;border-bottom:0 solid transparent}.skin-blue.layout-top-nav .main-header>.logo:hover{background-color:#3b8ab8}
</style>

<script src="../APMB2/responsive-nao-calendar/jquery-nao-calendar.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<link href="../FO/dropzone.css" type="text/css" rel="stylesheet" />
<script>
$(document).ready(function(){
	
	var table2 = $('#example2').DataTable( {
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
		 { data: "id"},
         { data: "tipo"},
		 { data: "marca"},
		 { data: "caracteristicas"},
		 { data: "ocorrencia_id"},
		 { data: "numero"}
	],
	
	
    "ajax": 'getFOs2.php',
	
		 "columnDefs": [
		 	
           {
				
                "render": function (data, type, row ) { 
		 
				 
				 
 
					//return  "<button class='btn btn-light' onclick=dialogo2("+row['id']+")>"+"<img src='eye.png' style='width:15px;'>"+"</button>  "+row['tipo'] ;
					return  "<button class='btn btn-light' onclick=dialogo2("+row['id']+")>"+"<img src='eye.png' style='width:10px;height:10px;'>"+"</button>"+"<button class='btn btn-warning' onclick=anexar2("+row['id']+")>"+"<img src='clip.png' style='width:10px;height:10px;'>"+"</button>"+"<button class='btn btn-danger' onclick=deletar("+row['id']+")>"+"<img src='trash2.png' style='width:10px;height:10px;'>"+"</button>  "+row['tipo'] ;
                },
                "targets": 1
            },
     
                		
			 
			 
            { "visible": false,  "targets": [ 0 ] }	,		
             			
 

			]
	
	
	});

	
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
<link href="jumbotron.css" rel="stylesheet">

@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

body {
  color: blue;
}
a {
  color: inherit; /* blue colors for links too */
  text-decoration: inherit; /* no underline */
}
body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-heigth: 1.6;<nav.
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
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="../APMB2/stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <title>Genesis PMDF</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	
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
	
	<!---->
	<!--<script src="dropzone.js"></script>-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>

 
 <?php //include("menu.php");?>
 
 <img id="topo" style="display:none;" src="topo.png"/>
 <img id="topo_mobile" style="display:none;" src="topo_mobile.png"/>
 
 
 

 
<script src="../dropzone-master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</body>
 
   <div  id="tabela_div" style="width:1250px;">
   <a href="index.php"><button type="button" class="btn btn-primary" style="margin:1%;">Ver todas ocorrências</button></a>
      		<table id="example2">
          <th>ID</th>
		  <th>Tipo</th>
		  <th>Marca</th>
		  <th>Características</th>
		  <th>Ocorrência</th>
		  <th>Numero</th>
		</table>
		
		<div class="container"> 
		
		<div class="alert alert-warning" role="alert" id="alerta_sem_imagem">Não foram cadastradas imagens para esse objeto</div>
  <div class="row">
    <div id="tt1_1" class="col-sm">
      
    </div>
    <div id="tt1_2" class="col-sm">
      
    </div>
    <div id="tt1_3" class="col-sm">
      
    </div>
  </div>
  <div class="row">
    <div id="tt2_1" class="col-sm">
      
    </div>
    <div id="tt2_2" class="col-sm">
      
    </div>
    <div id="tt2_3" class="col-sm">
      
    </div>
  </div>  
</div>
	 </div>
      <!-- Main jumbotron for a primary marketing message or call to action -->
  

 


<script>

var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
function retira_acentos(palavra) { 
    com_acento = 'áàãâäéèêëíìîïóòõôöúùûüÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜ'; 
    sem_acento = 'aaaaaeeeeiiiiooooouuuuAAAAAEEEEIIIIOOOOOUUUU'; 
    nova=''; 
    for(i=0;i<palavra.length;i++) { 
        if (com_acento.search(palavra.substr(i,1))>=0) { 
            nova+=sem_acento.substr(com_acento.search(palavra.substr(i,1)),1); 
        } 
        else { 
            nova+=palavra.substr(i,1); 
        } 
    } 
    return nova; 
}
function anexar2(id)
{
	$('#anexar_form').remove();
    $('#alerta_sem_imagem').append('<form action="upload2.php?iddid='+id+'" id="anexar_form" class="dropzone q"  style="display:inherit;"></form>')	
	var myDropzone = new Dropzone("#anexar_form", { url: "upload2.php?iddid="+id});
    $('#alerta_sem_imagem').css("display","inherit");
	$('.dz-message').children('span').each(function()
	 {
		//$(this).val("Solte os arquivos aqui para upload");
		 ($(this).html("Solte imagens aqui para upload"));
		 
	 });
	//alert(id);
}
function deletar(id)
{
	$('#anexar_form').css("display","none");
	var r=confirm("Deseja remover o objeto da ocorrência? Todas as imagens relacionadas ao objeto também serão removidas");
	
	 if(r==true) { 
	 valor="id="+id;
  $.ajax({ 
 type:"POST", 
 url: "deletar.php", 
 data:valor,
  success: function(data){
   // alert("teste");
   // console.log(valor);
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
	
			// window.location.href = "inicio.php";
       }
}
function dialogo2(id)
{
	$('#anexar_form').css("display","none");
	 $('#tt1_1').css("display","none");
	  $('#tt1_2').css("display","none");
	   $('#tt1_3').css("display","none");
	    $('#tt2_1').css("display","none");
		 $('#tt2_2').css("display","none");
		  $('#tt2_3').css("display","none");
		  $('#alerta_sem_imagem').css("display","inherit");
	$.getJSON("imagens.php?id="+id, function (data) {
		
		for(i=0;i<data.data.length;i++)
		{
			console.log(data.data[0].s1);
		 if(data.data[0].s1 == undefined)
		 {
		 $('#alerta_sem_imagem').css("display","inherit");
		 
		 

		 }
		 else{
		$('#alerta_sem_imagem').css("display","none");
		 }
		 if(data.data[0].s1!==undefined)  
		 {
			 $('#tt1_1').html("<a href='./uploads/"+data.data[0].s1+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s1+"'></a>");
			 $('#tt1_1').css("display","inherit");
		 }
		 if(data.data[0].s2!==undefined)
		 {
			 $('#tt1_2').html("<a href='./uploads/"+data.data[0].s2+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s2+"'></a>");
			 $('#tt1_2').css("display","inherit");
		 }
		 if(data.data[0].s3!==undefined)
		 {
			 $('#tt1_3').html("<a href='./uploads/"+data.data[0].s3+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s3+"'></a>");
			 $('#tt1_3').css("display","inherit");
		 }
		 if(data.data[0].s4!==undefined)
		 {
			 $('#tt2_1').html("<a href='./uploads/"+data.data[0].s4+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s4+"'></a>");
			 $('#tt2_1').css("display","inherit");
		 }
		 if(data.data[0].s5!==undefined)
		 {
			 $('#tt2_2').html("<a href='./uploads/"+data.data[0].s5+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s5+"'></a>");
			 $('#tt2_2').css("display","inherit");
		 }
		 if(data.data[0].s6!==undefined)
		 {
			 $('#tt2_3').html("<a href='./uploads/"+data.data[0].s6+"'><img style='width:75px;height:75px;' src='./uploads/"+data.data[0].s6+"'></a>");
			 $('#tt2_3').css("display","inherit");
		 }
		}
			
	});
 

}

function dialogo(id)
{
	$('#anexar_form').css("display","none");
		 $('#tt1_1').css("display","none");
	  $('#tt1_2').css("display","none");
	   $('#tt1_3').css("display","none");
	    $('#tt2_1').css("display","none");
		 $('#tt2_2').css("display","none");
		  $('#tt2_3').css("display","none");
		  $('#alerta_sem_imagem').css("display","none");
	$.getJSON("getFOs.php?numero="+id, function (data) {
		for(i=0;i<data.data.length;i++)
		{
			$('#copom2').html(data.data[0].numero);
			$('#data2').html(data.data[0].data);
			$('#natureza2').html(data.data[0].natureza);
			$('#prefixo2').html(data.data[0].prefixo);
			$('#comandante2').html(data.data[0].comandante);
			$('#solicitante2').html(data.data[0].solicitante);
			$('#contato').html(data.data[0].contato);
			$('#endereco2').html(data.data[0].endereco);
			$('#historico_inicial2').html(data.data[0].historico_inicial);
			
	$('#alerta').css("display","none");
	$('.dropzone').css("display","none");
 	$('#marca').val('');
	$('#identificacao').val('');
	$('#caracteristicas').val('');
	$('#marca').css("display","inherit");
	$('#identificacao').css("display","inherit");
	$('#caracteristicas').css("display","inherit");
	$('#anexar').css("display","inherit");
	
	$('h6').css("display","inherit");
	$('#tipo').css("display","inherit");
	 var table2 = $('#example2').DataTable();
	 table2.search(data.data[0].numero).draw();
	 //table2.fnFilter( data.data[0].numero, 5 );
		}
			
	});
//valor="numero="+id;	
/*$.ajax({ 
 type:"POST", 
 url: "getFOs.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    console.log(valor);
	//console.log(data);
	$.getJSON(data, function (data2) {
		 //for(i=0;i<data2.data.length;i++)
	   // {
			$('#copom2').html(data2.data[0].numero);
		//}
	});		
	
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
	
	*/
	
  $('#dialog').dialog();
 $('#tabs').css("display","inherit");
$('#tabs').tabs();  
$('#copom2').html('');
$('.ui-dialog').css("width","600px");
if (isMobile)
	 $('.ui-dialog').css("width","200px");

}
$(document).ready(function(){
	
	
	$('p').css("text-align","justify");
	$('p').css("font-family","Verdana");
	$('h1').css("font-family","Verdana");
	$('h2').css("font-family","Verdana");
	$('h3').css("font-family","Verdana");
	$('p').css("font-size","12px");
	$('a').css("color","inherit");
	$('a').css("text-decoration", "inherit");
    
	$('#data').css("max-width","10px");
	$('#prefixo').css("max-width","100px");
	$('#comandante').css("max-width","100px");
	$('#natureza').css("max-width","100px");
	$('#solicitante').css("max-width","100px");
	$('#contato').css("max-width","100px");
	$('#cidade').css("max-width","100px");
	$('#bairro').css("max-width","100px");
	$('#endereco').css("max-width","77px");
     $('#historico_inicial').css("width", "150px");
	// $('#historico_inicial').css("max-width", "150px");
	$('#example_info').css("margin-left","3%");
	$('label').css("margin-left","3%");
	$('a').css("margin-right","3%important!");
	//$('.ui-dialog-titlebar').css("display","none");
	//$('select[name ="example_length"]').css("margin-left","3%");
	if(isMobile)
	{
		  
		 $("#topo_mobile").css("display","inherit");
		 $('#topo').css("display","none");
		 $('#tabela_div').css("width","400px");
		 //table.css("width","400px");
 
	}
	else{
		$("#topo_mobile").css("display","none");
		 $('#topo').css("display","inherit");
	}
//$(document).arrive('#dialog', {
 //   onceOnly: false
//}, function () {
    
//});



});




</script>

  <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

 
 
<div id="dialog" title="Detalhes">
  <!--<img src="DETALHES.png" style="width:40%;"/>-->
 
<div id="tabs" style="display:none;"  >
	<ul>
		<li><a href="#aba-1">Atendimento</a></li>
		<li><a href="#aba-2">Ver Anexos</a></li>
		<li><a href="#aba-3">Anexar à ocorrência</a></li>
	</ul>
	<div id="aba-1">
	  <div class="input-group mb-3 input-group-sm input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">Nº COPOM</span>
		</div>
		<div class="box-comment input-group-sm" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="copom2" class="text-bold "></span>
                                </div>
	    </div>
		
	  <div class="input-group mb-3 input-group-sm input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">DATA</span>
		</div>
				<div class="box-comment input-group-sm" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="data2" class="text-bold "></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"  style="width:100px;">UPM</span>
		</div>
				<div class="box-comment input-group-sm" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span  class="text-bold ">MESA 2</span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">NATUREZA</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="natureza2" class="text-bold"></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">PREFIXO</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="prefixo2" class="text-bold "></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">COMANDANTE</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="comandante2" class="text-bold "></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">SOLICITANTE</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="solicitante2" class="text-bold "></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm" >
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">CONTATO</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px;">
                                    <span id="contato2" class="text-bold"></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1" style="width:100px;">ENDEREÇO</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px;width:420px; ">
                                    <span id="endereco2" class="text-bold"></span>
                                </div>
	    </div>

	  <div class="input-group mb-3 input-group-sm">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">HISTÓRICO INICIAL</span>
		</div>
				<div class="box-comment" style="border:solid 1px #D3D3D3; padding:5px ">
                                    <span id="historico_inicial2" class="text-bold"></span>
                                </div>
	    </div>

	  
	<!--	<table>
		<tr >
 		<td class="input-group-addon bg-gray">Nº COPOM
		</td>
		<td id="copom2">
		</td>
		</tr>
		
		<tr>
		<td >DATA
		</td>
		<td id="data2">
		</td>
		
		</tr>		
		
		<tr>
		<td>UPM
		</td>
		<td>MESA 02</td>
		</tr>

		<tr>
		<td>NATUREZA
		</td>
		<td id="natureza2"></td>
		</tr>

		<tr>
		<td>PREFIXO
		</td>
		<td id="prefixo2"></td>
		</tr>

		<tr>
		<td>COMANDANTE
		</td>
		<td id="comandante2"></td>
		</tr>

		<tr>
		<td>SOLICITANTE
		</td>
		<td id="solicitante2"></td>		
		</tr>

		<tr>
		<td>CONTATO
		</td>
		<td id="contato2"></td>		
		</tr>

		<tr>
		<td>ENDEREÇO
		</td>
		<td id="endereco2"></td>		
		</tr>

		<tr>
		<td>HISTÓRICO INICIAL
		</td>
		<td id="historico_inicial2"></td>		
		</tr>		
		</table> -->
		
	</div>
	<div id="aba-2">
		<table id="example2">
          <th>ID</th>
		  <th>Tipo</th>
		  <th>Marca</th>
		  <th>Características</th>
		  <th>Ocorrência</th>
		  <th>Numero</th>
		</table>
		
		<div class="container"> 
		
		<div class="alert alert-warning" role="alert" id="alerta_sem_imagem">Não foram cadastradas imagens para esse objeto</div>
  <div class="row">
    <div id="tt1_1" class="col-sm">
      
    </div>
    <div id="tt1_2" class="col-sm">
      
    </div>
    <div id="tt1_3" class="col-sm">
      
    </div>
  </div>
  <div class="row">
    <div id="tt2_1" class="col-sm">
      
    </div>
    <div id="tt2_2" class="col-sm">
      
    </div>
    <div id="tt2_3" class="col-sm">
      
    </div>
  </div>  
</div>
		
	</div>
	<div id="aba-3">
	<div id="alerta" class="alert alert-primary" role="alert">
  Objeto anexado à ocorrência, use o formulário abaixo para inserir imagens para esse objeto
</div>
	    <h6>Tipo</h6>
	    <select id="tipo" class="form-control">
        <option>Veículo automotor</option>
        <option>Meio alternativo de transporte</option>
        <option>Material Bélico</option>
        <option>Arma Branca</option>
        <option>Pessoa</option>
        <option>Animal doméstico</option>
        <option>Animal Silvestre</option>
		<option>Documento</option>
		</select>
		<h6>Marca</h6>
		<input id="marca" type="text" class="form-control"></input>
		<h6>Identificacao</h6>
		<input id="identificacao" type="text" class="form-control"></input>
		<h6>Características</h6>
		<input id="caracteristicas" type="text" class="form-control"></input>
	    <form action="upload.php" class="dropzone"></form>
		 
		
		<center><button class="btn btn-primary" id="anexar">Anexar</button></center>
		
	</div>
</div>
</div>
<script>
$(document).ready(function(){
 
	 Dropzone.autoDiscover = false;
            var fileList = new Array;
            var i =0;
            $("div#myId").dropzone({
                addRemoveLinks: true,
                init: function() {

                    // Hack: Add the dropzone class to the element
                    $(this.element).addClass("dropzone");
 
                    this.on("success", function(file, serverFileName) {
                        fileList[i] = {"serverFileName" : serverFileName, "fileName" : file.name,"fileId" : i };
                        console.log(fileList);
                        i++;

                    });
                    this.on("removedfile", function(file) {
                        var rmvFile = "";
                        for(f=0;f<fileList.length;f++){

                            if(fileList[f].fileName == file.name)
                            {
                                rmvFile = fileList[f].serverFileName;

                            }

                        }

    
                    });

                },
                url: "/uploads"
            });
	
	 //$("div#myId").dropzone({ url: "/uploads" });
	 $('.dz-message').children('span').each(function()
	 {
		//$(this).val("Solte os arquivos aqui para upload");
		 ($(this).html("Solte imagens aqui para upload"));
		 
	 });
	//$("div#myId").dropzone.on("");
	$('#alerta').css("display","none");
	$('.dropzone').css("display","none");
	
	$('#anexar').click(function(){
	
	valor="numero="+$('#copom2').html()+"&tipo="+$( "#tipo option:selected" ).text()+"&marca="+$('#marca').val()+"&identificacao="+$('#identificacao').val()+"&caracteristicas="+$('#caracteristicas').val();
	
$.ajax({ 
 type:"POST", 
 url: "anexar.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    $('#alerta').css("display","inherit");
	$('.dropzone').css("display","inherit");
 	$('#marca').val('');
	$('#identificacao').val('');
	$('#caracteristicas').val('');
	$('#marca').css("display","none");
	$('#identificacao').css("display","none");
	$('#caracteristicas').css("display","none");
	$('#anexar').css("display","none");
	
	$('h6').css("display","none");
	$('#tipo').css("display","none");
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
	

		
	});
});
</script>
<style>

td {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
  background:white;
  

 
  text-align: justify;
  text-justify: inter-word;
}
 
th {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
  background:#ebeff2;
  heigth:33px;
}
select {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
}
label {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
}
div {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
}
a {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
}
.btn {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:11px;
}
 
</style>



<img src="baixo.PNG"/>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript"  src="../jQuery-Autocomplete-master/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
</html>