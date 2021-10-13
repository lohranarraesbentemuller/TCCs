<?php
include("config.php");
include("session.php"); 
?>
<!doctype html>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

</script>

    <style>
  .fa{
    font-family: "Font Awesome 5 Free" !important;
	font-size: 10px !important;
  }
  </style>
<script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script> 
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 

<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
 
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
<html  >
    

  <body>
  
<?php include("menu.php");?> 	    
 
 <?php
 $sql="select DATE_ADD(curdate(), INTERVAL -0 day) as ontem";
 $result=mysqli_query($db,$sql);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $ontem=$row['ontem'];
 $sql="select DATE_ADD(curdate(), INTERVAL 7 day) as amanha";
 $result=mysqli_query($db,$sql);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $amanha=$row['amanha'];
?>
<div class="container">
<h3 style="margin-top:10%;">Buscar OS vigente da unidade <select class="form-control" id="unidade_escolhida">
<option>Todas</option>
<?php
$sql="select * from bpms2";
$result=mysqli_query($db,$sql);
foreach($result as $row)
{
	if($row['nome']==$_GET['UPM'])
	{
	echo "<option selected>".$row['nome']."</option>";
	}
	else{
	echo "<option>".$row['nome']."</option>";	
	}
}
?>
</select></h3>
<input type="text" id="min" class="form-control" placeholder="Data atual" value="<?php echo $ontem;?>"></input>
<!--<input type="text" id="max" class="form-control" placeholder="Data e hora de retorno" value="<?php echo $amanha;?>"></input>-->
				<table id="example" class="display nowrap table-striped" style="width:80%">
<thead>
   <tr>
          
	<th>ID</th>
    <th>OS</th>
    <th>Referencia</th>
    <th>Data</th>
	<th>hora inicio</th>
	<th>hora fim</th>
	<th>UPM</th>
	<th>data fim</th>
	<th>cmt1</th>
	<th>cmt2</th>
	<th>Enderecado</th>
	<th>Local</th>
	<th>TSE</th>
	<th>Efetivo</th>
	<th>Duracao</th>
	<th>Uniforme</th>
	<th>Equipamento</th>
	<th>Armamento</th>
	<th>chefe</th>
	<th>evento</th>
	<th>N vigência</th>
						

   </tr>
</thead> 
</table>
<canvas id="line-chart" width="800" height="450"></canvas>
</div>
 
<script>

	

$(document).ready(function() {
	
	$('#unidade_escolhida').change(function(){
		var s=$('#unidade_escolhida option:selected').text();
		//alert(s);
		if(s!="Todas")
		{
		window.location.href = "buscar_os.php?UPM="+s;
	    }
		else{
			window.location.href ="buscar_os.php";
		}
	});
	
	var minDate, maxDate;
	
$.fn.dataTable.ext.search.push(
 
    function( settings, data, dataIndex ) {
	//	alert($('#min').val());
       var min= parseInt($('#min').val().split("-")[0],10)*10000000000+parseInt($('#min').val().split("-")[1],10)*100000000+parseInt($('#min').val().split("-")[2].split(" ")[0],10)*1000000;
       //var max=parseInt($('#max').val().split("-")[0],10)*10000000000+parseInt($('#max').val().split("-")[1],10)*100000000+parseInt($('#max').val().split("-")[2].split(" ")[0],10)*1000000;

        var age=parseInt(data[3].split("-")[0],10)*10000000000+parseInt(data[3].split("-")[1],10)*100000000+parseInt(data[3].split("-")[2].split(" ")[0],10)*1000000 ;
		var age2=parseInt(data[7].split("-")[0],10)*10000000000+parseInt(data[7].split("-")[1],10)*100000000+parseInt(data[7].split("-")[2].split(" ")[0],10)*1000000 ;
		var n_vigente=data[20].split(",");
		//alert(min);
		//console.log(n_vigente);
		//alert($.inArray($('#min').val(),n_vigente));
        //alert(age2);
        /*if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age2 <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age2 <= max ) )
        {*/
		if( ( ((isNaN(min)) || (min>=age && min<=age2)) && ($.inArray($('#min').val(),n_vigente)==-1) )){
            return true;
        }
        return false; 
		
    }
);		
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    //maxDate = new DateTime($('#max'), {
    //    format: 'YYYY-MM-DD'
    //});	
	    $('#example thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Procurar '+title+'" />' );
    } );
	var table = $('#example').DataTable( {
	  
	 "scrollX": true,
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
          
	{data:"id"},
    {data:"os"},
    {data:"referencia"},
    {data:"data"},
	{data:"hora_inicio"},
	{data:"hora_fim"},
	{data:"UPM"},
     {data:"data_fim"},
	{data:"cmt1"},
	{data:"cmt2"},
	{data:"enderecado"},
	{data:"local"},
	{data:"TSE"},
	{data:"efetivo"},
	{data:"duracao"},
	{data:"uniforme"},
	{data:"equipamento"},
	{data:"armamento"},
	{data:"chefe"},
	{data:"evento"},
	{data:"n_vigente"}
		  
	],
	
	 <?php
	 if(!isset($_GET['UPM'])){
     echo '"ajax":"getOS.php",';
	 }
	 else
	 {
	 echo '"ajax":"getOS.php?UPM='.$_GET['UPM'].'",'; 
	 }
     ?>
        "columnDefs": [
            {
                "render": function ( data, type, row ) { 
                    return " <a  href=\"ordem_de_servico.php?id=" + row['id'] + " \"><button class='fa fa-edit btn btn-warning' type='button'></button>"  + row['os']  + "</a>";
                },
                "targets": 1
            },
			//{ "visible": false,  "targets": [ 0 ] },
			{ "visible": false,  "targets": [ 0 ] }
			//{ "visible": false,  "targets": [ 9 ] }
        ],

	 
	"initComplete": function(settings, json) {
		
		       this.api().columns().every( function () {
                var that = this;
                
                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
			
			//lohran
			
			var data = $('#example').DataTable();
		//console.clear()
		var p = data.rows({ page: 'current' }).nodes();
		 //console.log(p.length);
 		//console.log(p[1]);
		//console.log(p[1].innerHTML);
		var i;
		var a=[];
 
		var saida=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[4].split('</td>')[0];
			a2 = t.split('<td>')[5].split('</td>')[0];
 
			//var dia1 = a.split("-")[2];
			//var dia2 = a2.split("-")[2];
            //alert(a);
			//alert(a2);
			var horas=["00:00:00","01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00"];
			flag=false;
 		   for(j=0;j<horas.length;j++)
		     {
                  if(a==horas[j])
				  {
					  flag=true;
				  }
				  if(a2==horas[j])
				  {
					  flag=false;
				  }
				  if(flag)
				  {
					  saida[j]=saida[j]+1;
				  }
		     }

		}
		
	 
		
		//teste
		//$('#line-chart').css("display","none");
		//
		new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
        labels: ["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
        datasets: [{ 
            data: saida,
            label: "OS",
            borderColor: "#3e95cd",
            fill: false
         }  
		   ]
        },
        options: {
          title: {
          display: true,
          text: 'OS vigente'
         }
         }
         });
		 //$('#line-chart').append("<p>TESTE</p>");
		//teste
		
			//lohran
			
	}
	} );
	//new $.fn.dataTable.FixedHeader( table );
	 //filtro por coluna
	 table.columns.adjust().draw();
	$('#example thead tr').clone(true).appendTo( '#example thead' );
    /*$('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Procurar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } ); */
 
 
		
 
 
new $.fn.dataTable.FixedHeader( table );
    $('#min').change( function() {
		
         table.draw();
        
		var data = $('#example').DataTable();
		//console.clear()
		var p = data.rows({ page: 'current' }).nodes();
		// console.log(p.length);
 		//console.log(p[1]);
		//console.log(p[1].innerHTML);
		var i;
		var a=[];
		var saida=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[4].split('</td>')[0];
			a2 = t.split('<td>')[5].split('</td>')[0];
 
			//var dia1 = a.split("-")[2];
			//var dia2 = a2.split("-")[2];
             //alert(a);
			 //alert(a2);
			var horas=["00:00:00","01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00"];
			flag=false;
 		   for(j=0;j<horas.length;j++)
		     {
				 
                  if(a==horas[j])
				  {
					  flag=true;
				  }
				  if(a2==horas[j])
				  {
					  flag=false;
				  }
				  if(flag)
				  {
					  saida[j]=saida[j]+1;
				  }
		     }

		}
		
	 
		
		//teste
		//$('#line-chart').css("display","none");
		//
		new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
        labels: ["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
        datasets: [{ 
            data: saida,
            label: "OS vigente",
            borderColor: "#3e95cd",
            fill: false
         }  
		   ]
        },
        options: {
          title: {
          display: true,
          text: 'OS vigente'
         }
         }
         });
		 //$('#line-chart').append("<p>TESTE</p>");
		//teste
		
		
		
		
    } );
    

 
    
} );
//} );

	</script>
 </div>
 <script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</html>