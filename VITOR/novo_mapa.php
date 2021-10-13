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
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
</style>
    <style>
  .fa{
    font-family: "Font Awesome 5 Free" !important;
	font-size: 10px !important;
  }
  </style>
<script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script> 
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


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

  <div class="container">
  <center>
   <div class="card" style="margin-top:7%;">
    <center>
<img src="police-car-icon.jpg" alt="Avatar" style="width:200px"></center>
  <div class="container">
    <!--<h4><b>Jane Doe</b></h4> -->
	<h4>Criar novo mapa de viatura</h4><BR>
     
	<select id="batalhao" class="form-control">
 <?php
 $sql="select * from bpms2 order by id";
 $result=mysqli_query($db,$sql);
 foreach($result as $row)
 {
	 echo "<option>".$row['nome']."</option>";
 }
 ?>
 </select><BR>
 <input name="data" class="data form-control" placeholder="DD/MM/AAAA" autocomplete="off"></input><BR>
 <center><button class="btn btn-dark">Criar novo mapa de viatura</button></center>
  </div>
</div>
  </center>
  
 
 </div>
 </body>
 <script>
 $(document).ready(function(){
	 $('.btn-dark').click(function(){
		 data=$('.data').val().split("/")[2]+"-"+$('.data').val().split("/")[1]+"-"+$('.data').val().split("/")[0];
		 batalhao=$('#batalhao').find(":selected").text();
		 //alert(data.length);
		 
		 if(data.length==10)
		 {
		 window.location.href = "n_mapa.php?data="+data+"&batalhao="+batalhao;
		 }
		 else{
			 alert("Preencha a data corretamente");
		 }
	 });
	  var date_input=$('input[name="data"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
		//format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	$('input[name="data"]').mask('00/00/0000');
 });
 </script>
 
 <script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</html>