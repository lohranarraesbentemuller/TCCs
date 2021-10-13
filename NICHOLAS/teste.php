<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
#image_preview {
  position: relative; /* Add this since child are absolute! */
  background: #eee;
  margin: 15px;
  cursor: crosshair;
     z-index: 0;
}

#image_preview img {
  display: inline-block;
  vertical-align: top;
   z-index: 0;
}

.circle {
  position: absolute;
  background: rgba(255, 0, 0, 0.2) url("https://i.imgur.com/qtpC8Rf.png") no-repeat 50% 50%;
  border-radius: 50%;
  transform: translate(-50%, -50%); /* use translate instead of JS calculations */
}

.radius {
  position: absolute;
}
.identificador{
			position: absolute;
			transform: translate(-50%, -50%);
}

</style>
<script>
var App = App || {};
App.points = []; // Use array to store objects like [{x,y,r}, {x,y,r} ...]
contador=0;

   var handler= function(ev){
	   
	  

	  
	   
    const $this = $(this),
      r = parseInt($('.radius').val().trim(), 10), // Parse as Integer radix 10
      o = $this.offset(),
      y = ev.pageY - o.top,
      x = ev.pageX - o.left;

       flag=true;
		  for(i=0;i<App.points.length;i++)
		  {
			  //alert(App.points[i].x + " " + App.points[i].y);
			  if(Math.abs(x-App.points[i].x)<=(r) || Math.abs(y-App.points[i].y)<=(r))
			  {
				  flag=false;
			  }
		  }
	   if(!flag)
	   {
		   return;
	   }

    $("<div />", {
      "class": "circle",
	  "id":"circle_"+contador,
      css: {
        top: y,
        left: x,
        width: r * 2,
        height: r * 2,
      },
      appendTo: $this // append to #image_preview!
    });

    // Append data to App.points
    App.points.push({x,y,r});
    // Test
	
    console.log( App.points )
    $("<div />",{
		"id":"identificador"+contador,
		"class":"identificador form-control",
		"type":"text",
		css:{
			top:y,
			left:x,
            width: 150,
            height: 50,

		},
		appendTo: $this
	});
	contador=contador+1;
	  $($this).unbind('click',handler);
  }//);


jQuery(function($) {

  const $radius = $(".radius");

  //$('#image_preview').on('click', function(ev) {

  $('#image_preview').bind('click',handler);
});

$(document).ready(function(){
	
	$(document).arrive('.circle',function(){
		  $('.circle').click(function(evt){
			  //alert("aqui");
		   if($("#identificador"+$(this).attr("id").split("_")[1]).css("display")=="none"){
			  $("#identificador"+$(this).attr("id").split("_")[1]).css("display","block");
		   }
			//  alert("#identificador"+$(this).attr("id").split("_")[1]);
			  evt.stopPropagation();
		  });
	});
	$(document).arrive('.identificador',function(){
		if ($('#sinal_'+(contador-1)).length == 0) {
		$(this).append("<input class='form-control identificador_input' id='sinal_"+(contador-1)+"'></input>");
		//$(this).append("<button class='btn btn-info' id='btn_"+contador+"'>+</button>");
		}
	});
	$(document).arrive('.identificador_input',function(){
		$('.btn').click(function(){
			$(this).focus();
 
			 
		});
	});	
	//$(document).arrive('.btn',function(){
	
		$('#cadastrar').click(function(){
 
		$('.identificador').css("display","none");
			//if($('.identificador').val()=="")
			x=0;
			$('.identificador').each(function(e,b){
				//!$(this).val()
				//alert(x);
				//alert($('#sinal_'+x).val());
			   if(!$('#sinal_'+x).val())
			   {
				$("#circle_"+x).remove();
				$('#identificador'+x).remove();
			   }
				//$(this).remove();
				//alert(x);
			  x=x+1;
			});
			 //setTimeout(
  //function()  
  //{
    $('#image_preview').bind('click',handler);
  //}, 1000);
			 
			 
			   
		});
	//});
});

</script>

Radius: <input type="numeric" value="20" class="radius" name="radius">

<div id="image_preview">
  <img src="hb20.JPG" alt="graph">
</div>
<button class="btn btn-warning" id="cadastrar">Cadastrar</button>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>