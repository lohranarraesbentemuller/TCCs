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
 $sql="select DATE_ADD(curdate(), INTERVAL -7 day) as ontem";
 $result=mysqli_query($db,$sql);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $ontem=$row['ontem'];
 $sql="select DATE_ADD(curdate(), INTERVAL 7 day) as amanha";
 $result=mysqli_query($db,$sql);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $amanha=$row['amanha'];
?>
<div class="container">
<h3 style="margin-top:10%;">Buscar intervalo de datas</h3>
<input type="text" id="min" class="form-control" placeholder="Data e hora de saída" value="<?php echo $ontem;?>"></input>
<input type="text" id="max" class="form-control" placeholder="Data e hora de retorno" value="<?php echo $amanha;?>"></input>
				<table id="example" class="display nowrap table-striped" style="width:80%">
<thead>
   <tr>
                        <th>ID</th> 
						<th>Matricula ESFO</th>
                        <th>Cia</th>
                        <th>Pelotão</th>
                        <th>Pauta</th>
                        <th>Cadete</th>
                        <th>Matrícula PMDF</th>
                        <th>Data e hora de saída</th>
                        <th>Data e hora de retorno</th>
						<th>Motivo</th>
						<th>Dia de preenchimento da guia</th>
						<th>Oficial que autorizou</th>
						

   </tr>
</thead> 
</table>
<canvas id="line-chart" width="800" height="450"></canvas>
</div>
 
<script>

	

$(document).ready(function() {
	
	var minDate, maxDate;
	
$.fn.dataTable.ext.search.push(
 
    function( settings, data, dataIndex ) {
	//	alert($('#min').val());
       var min= parseInt($('#min').val().split("-")[0],10)*10000000000+parseInt($('#min').val().split("-")[1],10)*100000000+parseInt($('#min').val().split("-")[2].split(" ")[0],10)*1000000;
       var max=parseInt($('#max').val().split("-")[0],10)*10000000000+parseInt($('#max').val().split("-")[1],10)*100000000+parseInt($('#max').val().split("-")[2].split(" ")[0],10)*1000000;

        var age=(parseInt(data[7].split("-")[0],10)*10000000000+parseInt(data[7].split("-")[1],10)*100000000+parseInt(data[7].split("-")[2].split(" ")[0],10)*1000000+parseInt(data[7].split(" ")[1].split(":")[0],10)*10000+parseInt(data[7].split(":")[1],10)*100+parseInt(data[7].split(':')[2],10)*1);
		var age2=(parseInt(data[8].split("-")[0],10)*10000000000+parseInt(data[8].split("-")[1],10)*100000000+parseInt(data[8].split("-")[2].split(" ")[0],10)*1000000+parseInt(data[8].split(" ")[1].split(":")[0],10)*10000+parseInt(data[8].split(":")[1],10)*100+parseInt(data[8].split(':')[2],10)*1);
        //alert(age);
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
		
    }
);		
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
    });	
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
          { data: "id"},
		  { data: "matricula_esfo"},
	  { data: "cia"},
	  { data: "pelotao"},
          { data: "pauta"},
          { data: "cadete"},
          { data: "matricula"},
          { data: "saida"},
		  { data: "retorno"},
		  { data: "motivo"},
		  { data: "hoje"} ,
		  { data: "oficial"} 
	],
	
	<?php if($papel=="Coordenacao")
	{echo '"ajax": "getGuia.php",';}
		else{
		echo '"ajax": "getGuia.php?matricula_esfo='.$matricula_esfo.'",';
		}
		?>
   
  

        "columnDefs": [
            {
                "render": function ( data, type, row ) { 
                    return " <a  href=\"guia_liberacao.php?id=" + row['id'] + " \"><button class='fa fa-edit btn btn-warning' type='button'></button>"  + row['matricula_esfo']  + "</a>";
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
		var saida=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var saida2=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[7].split('</td>')[0];
			//console.log(a);
            //a.push(t.split('<td>')[1].split('</td>')[0]);
			var hora = a.split(" ")[1].split(":")[0];
			var minuto = a.split(":")[1];
   		    hora=parseInt(hora,10);
		    if(parseInt(minuto,10)<=20)
		    {
			    minuto=parseInt(0,10);
		    }
		    if(parseInt(minuto,10)>20 && parseInt(minuto,10)<=40)
		    {
			 minuto=parseInt(1,10);
		    }
		    if(parseInt(minuto,10)>40)
		    {
			 hora=parseInt(hora,10)+1;
             minuto=parseInt(0,10);
		    }
            saida[hora*2+minuto]=saida[hora*2+minuto]+1;

		}
		var saida2=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[8].split('</td>')[0];
			//console.log(a);
            //a.push(t.split('<td>')[1].split('</td>')[0]);
			var hora = a.split(" ")[1].split(":")[0];
			var minuto = a.split(":")[1];
   		    hora=parseInt(hora,10);
		    if(parseInt(minuto,10)<=20)
		    {
			    minuto=parseInt(0,10);
		    }
		    if(parseInt(minuto,10)>20 && parseInt(minuto,10)<=40)
		    {
			 minuto=parseInt(1,10);
		    }
		    if(parseInt(minuto,10)>40)
		    {
			 hora=parseInt(hora,10)+1;
             minuto=parseInt(0,10);
		    }
            saida2[hora*2+minuto]=saida2[hora*2+minuto]+1;

		}
		
		
		//teste
		//$('#line-chart').css("display","none");
		//
		new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
        labels: ["00:00","00:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00","04:30","05:00","05:30","06:00","06:30","07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30",,"21:00","21:30","22:00","22:30","23:00","23:30",],
        datasets: [{ 
            data: saida,
            label: "Saída",
            borderColor: "#3e95cd",
            fill: false
         },
		 { 
            data: saida2,
            label: "retorno",
            borderColor: "#ff0000",
            fill: false
         }
		   ]
        },
        options: {
          title: {
          display: true,
          text: 'Horários das guias'
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
    $('#min, #max').change( function() {
		
         table.draw();
        
		var data = $('#example').DataTable();
		//console.clear()
		var p = data.rows({ page: 'current' }).nodes();
		// console.log(p.length);
 		//console.log(p[1]);
		//console.log(p[1].innerHTML);
		var i;
		var a=[];
		var saida=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[7].split('</td>')[0];
			//console.log(a);
            //a.push(t.split('<td>')[1].split('</td>')[0]);
			var hora = a.split(" ")[1].split(":")[0];
			var minuto = a.split(":")[1];
   		    hora=parseInt(hora,10);
		    if(parseInt(minuto,10)<=20)
		    {
			    minuto=parseInt(0,10);
		    }
		    if(parseInt(minuto,10)>20 && parseInt(minuto,10)<=40)
		    {
			 minuto=parseInt(1,10);
		    }
		    if(parseInt(minuto,10)>40)
		    {
			 hora=parseInt(hora,10)+1;
             minuto=parseInt(0,10);
		    }
            saida[hora*2+minuto]=saida[hora*2+minuto]+1;

		}
		
				var saida2=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		for(i=0;i<p.length;i++){
			var t=p[i].innerHTML;
            a = t.split('<td>')[8].split('</td>')[0];
			//console.log(a);
            //a.push(t.split('<td>')[1].split('</td>')[0]);
			var hora = a.split(" ")[1].split(":")[0];
			var minuto = a.split(":")[1];
   		    hora=parseInt(hora,10);
		    if(parseInt(minuto,10)<=20)
		    {
			    minuto=parseInt(0,10);
		    }
		    if(parseInt(minuto,10)>20 && parseInt(minuto,10)<=40)
		    {
			 minuto=parseInt(1,10);
		    }
		    if(parseInt(minuto,10)>40)
		    {
			 hora=parseInt(hora,10)+1;
             minuto=parseInt(0,10);
		    }
            saida2[hora*2+minuto]=saida2[hora*2+minuto]+1;

		}
		
		//teste
		//$('#line-chart').css("display","none");
		//
		new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
        labels: ["00:00","00:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00","04:30","05:00","05:30","06:00","06:30","07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30",,"21:00","21:30","22:00","22:30","23:00","23:30",],
        datasets: [{ 
            data: saida,
            label: "Saída",
            borderColor: "#3e95cd",
            fill: false
         },
		 { 
            data: saida2,
            label: "retorno",
            borderColor: "#ff0000",
            fill: false
         }
		   ]
        },
        options: {
          title: {
          display: true,
          text: 'Horários das guias'
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