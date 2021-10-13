<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$nome=$_POST['txtUsuario'];
	$nome=str_replace(" ","",$nome);
	$senha=$_POST['txtSenha'];
	$flag=True;
	$sql="select * from login where nome='".$nome."' and senha = SHA2('".$senha."',224)";
	$result=mysqli_query($db,$sql);
	if ( mysqli_num_rows($result)>0)
	{
		 session_start();
         $_SESSION['login_user'] = $nome;
         $_SESSION['papel'] = $row['papel'];
         if($_POST['sistema']=="Gestão de Batalhões")
		 {
			 header("location:CPU.php");
		 }
		 if($_POST['sistema']=="Gestão de grandes eventos")
		 {
			 header("location:Grandes_Eventos.php");
		 }
//		header("location:index.php");
	}
	else
	{
		$flag=False;
		echo '<script src="../mapsed-master/ws/js/jquery-1.10.2.js"></script>';
		echo "<script>";
		echo "$(document).ready(function(){";
		echo "$('#errou_a_senha').css('display','inherit');";
		echo "});";
		echo "</script>";
	   //echo "DEU ERRADO";
 
   }
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	PMDF - Gênesis
</title>
<link rel="icon" href="favicon.ico" type="image/x-icon" /><meta http-equiv="CONTENT-LANGUAGE" content="pt-BR" />
<meta http-equiv="CONTENT-TYPE" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" /><meta name="ROBOTS" content="NONE" />
<meta name="GOOGLEBOT" content="NOARCHIVE" /><meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
<link rel="stylesheet" href="https://genesis.pm.df.gov.br/Content/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!--<link rel="stylesheet" href="Content/ionicons-2.0.1/css/ionicons.min.css" />-->
<link rel="stylesheet" href="https://genesis.pm.df.gov.br/Content/libs/css/ionicons.min.css"/>
<link rel="stylesheet" href="https://genesis.pm.df.gov.br/Content/dist/css/logon.min.css" />
<link rel="stylesheet" href="https://genesis.pm.df.gov.br/Content/dist/css/componentes.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    

    <!--<script type="text/javascript">
        window.onload = function() {
        $('#ModalAviso').modal('show');
        }
    </script>-->
    
</head>
<body class="hold-transition login-page">
    <div class="login-box box-solid">
        <form name="frmLogin" method="post"  id="frmLogin">
<div>
<input type="hidden" name="ToolkitScriptManager1_HiddenField" id="ToolkitScriptManager1_HiddenField" value="" />
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJLTU4MDQwMDk2DxYCHghjb250YWRvcmZkZNVb4FhVnuFf9X1f1HCaGqUmPP/f" />
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['frmLogin'];
if (!theForm) {
    theForm = document.frmLogin;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="https://genesis.pm.df.gov.br/WebResource.axd?d=H-PWIj3dNs4rFxc9yIeNKS5zR2p78WXYEKOyl0VEBHGy19t7q3AB_RFlegVznWqgqlq6D8O9o7yACyqOV0BB2kaj6_s1&t=636271565707292860" type="text/javascript"></script>


<script type="text/javascript">
//<![CDATA[
var __cultureInfo = '{"name":"pt-BR","numberFormat":{"CurrencyDecimalDigits":2,"CurrencyDecimalSeparator":",","IsReadOnly":true,"CurrencyGroupSizes":[3],"NumberGroupSizes":[3],"PercentGroupSizes":[3],"CurrencyGroupSeparator":".","CurrencySymbol":"R$","NaNSymbol":"NaN (Não é um número)","CurrencyNegativePattern":9,"NumberNegativePattern":1,"PercentPositivePattern":1,"PercentNegativePattern":1,"NegativeInfinitySymbol":"-Infinito","NegativeSign":"-","NumberDecimalDigits":2,"NumberDecimalSeparator":",","NumberGroupSeparator":".","CurrencyPositivePattern":2,"PositiveInfinitySymbol":"+Infinito","PositiveSign":"+","PercentDecimalDigits":2,"PercentDecimalSeparator":",","PercentGroupSeparator":".","PercentSymbol":"%","PerMilleSymbol":"?","NativeDigits":["0","1","2","3","4","5","6","7","8","9"],"DigitSubstitution":1},"dateTimeFormat":{"AMDesignator":"","Calendar":{"MinSupportedDateTime":"\/Date(-62135586000000)\/","MaxSupportedDateTime":"\/Date(253402300799999)\/","AlgorithmType":1,"CalendarType":1,"Eras":[1],"TwoDigitYearMax":2029,"IsReadOnly":true},"DateSeparator":"/","FirstDayOfWeek":0,"CalendarWeekRule":0,"FullDateTimePattern":"dddd, d\u0027 de \u0027MMMM\u0027 de \u0027yyyy HH:mm:ss","LongDatePattern":"dddd, d\u0027 de \u0027MMMM\u0027 de \u0027yyyy","LongTimePattern":"HH:mm:ss","MonthDayPattern":"dd\u0027 de \u0027MMMM","PMDesignator":"","RFC1123Pattern":"ddd, dd MMM yyyy HH\u0027:\u0027mm\u0027:\u0027ss \u0027GMT\u0027","ShortDatePattern":"dd/MM/yyyy","ShortTimePattern":"H:mm","SortableDateTimePattern":"yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss","TimeSeparator":":","UniversalSortableDateTimePattern":"yyyy\u0027-\u0027MM\u0027-\u0027dd HH\u0027:\u0027mm\u0027:\u0027ss\u0027Z\u0027","YearMonthPattern":"MMMM\u0027 de \u0027yyyy","AbbreviatedDayNames":["dom","seg","ter","qua","qui","sex","sáb"],"ShortestDayNames":["dom","seg","ter","qua","qui","sex","sáb"],"DayNames":["domingo","segunda-feira","terça-feira","quarta-feira","quinta-feira","sexta-feira","sábado"],"AbbreviatedMonthNames":["jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez",""],"MonthNames":["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro",""],"IsReadOnly":true,"NativeCalendarName":"Calendário gregoriano","AbbreviatedMonthGenitiveNames":["jan","fev","mar","abr","mai","jun","jul","ago","set","out","nov","dez",""],"MonthGenitiveNames":["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro",""]}}';//]]>
</script>

<script src="https://genesis.pm.df.gov.br/ScriptResource.axd?d=r41LOKcaETlGKuHoorHbQzrKeEJfGzW3nX4jBQ9YCUtwtC_AnC1iG5U8E11MIFJvNEPncLpsgGs0dTj47MDX9kT35eECSIDQ4AC_p3vMQt3MnUCIdH5325a9klupCaxRh8X8Ag2&t=705c9838" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
if (typeof(Sys) === 'undefined') throw new Error('ASP.NET Ajax client-side framework failed to load.');
//]]>
</script>

<script src="https://genesis.pm.df.gov.br/ScriptResource.axd?d=ziIWQpWTpAlOZgFCJuK_jIlpcwX7hCvh_QmK4-aS7afXbkzF00XjkjTJEbfwsMhltt8GWg09glb9Ae99DQ2B7u_wK5SSqpFx1i_hxmeAGAfgpPpzWY5YnUYS7KuKfDmw8EQhDQ2&t=705c9838" type="text/javascript"></script>
<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="C2EE9ABB" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWCAKasPHmCwKpwKPFCALxiYiEAQKC3IeGDAKalMPVBQL+xJuZBQK3+4KhCwL4gJ+FDolsq3aQ7dsdI2BsqOSl+nCpogG2" />
</div>
            <script type="text/javascript">
//<![CDATA[
//Sys.WebForms.PageRequestManager._initialize('ToolkitScriptManager1', document.getElementById('frmLogin'));
//Sys.WebForms.PageRequestManager.getInstance()._updateControls(['tuPanel','tupMsg','tupAtualizaTermo','tupMsgTermo'], ['btnLogin','btnTermo'], [], 90);
//]]>
</script>
  
                            
            <div id="uPanel">
			<form  method="post">
	                 
                    <div class="box box-widget widget-user-2">
                        <div id="nav-div" class="widget-user-header bg-blue-gradient">                            
                            <div class="widget-user-image margin-bottom">
                                <img class="img-circle no-border" src="https://genesis.pm.df.gov.br/Content/dist/img/logo_pmdf.png" alt="" />
                            </div>
                            <h3 class="widget-user-username text-bold">GEOVTR</h3>
                            <h5 class="widget-user-desc">Polícia Militar do Distrito Federal</h5>
                        </div>

                        <div id="pnLogin">
		
                            <div class="box-footer">
                                <div class="box-body">                                    
                                    
                                    <div class="form-group margin">
                                        <div id="pnDados">
			
                                            <div class="form-group has-feedback">
                                                <span class="fa fa-user form-control-feedback"></span>
                                                <input name="txtUsuario" type="text" id="txtUsuario" tabindex="1" class="form-control" type="text" onfocus="return habilitaBtn();" onchange="return habilitaBtn();" required="" placeholder="Usuário" parsley-trigger="change" />                                        
                                            </div>

                                            <div class="form-group has-feedback">
                                                <span class="fa fa-key form-control-feedback"></span>
                                                <input name="txtSenha" type="password" id="txtSenha" tabindex="2" class="form-control" onfocus="return habilitaBtn();" onchange="return habilitaBtn();" required="" placeholder="Senha" parsley-trigger="change" />                                                                                          
                                            </div>
                                            <div class="form-group has-feedback">
                                                <span class="fa fa-CAR form-control-feedback"></span>
                                                <SELECT name="sistema" id="txtSistmea" tabindex="3" class="form-control" ><option>Gestão de Batalhões</option><option>Gestão de grandes eventos</option></select>
                                            </div>                                            
                                            <div class="form-group">                                                
                                                <div class="checkbox checkbox-danger">
                                                    <div class="row">
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group has-feedback">  
                                                                                                  
                                            </div>                                                                                        
                                            
                                            <div class="form-group has-feedback hide">                                                                                                                     
                                                <div class="checkbox checkbox-primary"> 
                                                    <div class="row">                                                 
                                                         
                                                    </div>
                                                </div>
                                            </div>                                                                                        

                                            <div class="form-group">
			                                    <input type="submit" name="btnLogin" value="Autenticar"  id="btnLogin" tabindex="4" class="btn btn-primary btn-block" />
                                            </div>
                                            <div id="errou_a_senha" style="display:none;" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban m-r-5"></i>Acesso negado</h4>The user name or password is incorrect.
                                            </div>
                                            <div class="clearfix"></div>
                                        
		</div>

                                        <div class="form-group">
                                            <div id="upMsg">
			
                                                    <div class="col-md-12">
                                                        <div id="upProgresso" style="visibility:hidden;display:block;">
				
                                                                <div class="overlay">
                                                                    <i class="fa fa-circle-o-notch fa-spin"></i>
                                                                </div>
                                                            
			</div>                                                
                                                    </div> 
                                                    <span id="lblmsg"></span>                                                       
                                                
		</div>
                                        </div> 
                                        
                                        <div class="form-group">                                         
                                            <center>
                                                <img class="img-responsive" src="https://genesis.pm.df.gov.br/Content/dist/img/divulgacao.png" alt="" />
                                            </center>                                                              
                                        </div>                                                                                                       
                                    </div>
                                </div>
                            </div> 
                        
	</div>                                
                                
                                                                 
                    
                        <div id="upAtualizaTermo">
		
                                  
                            
	</div>  
                    
                          
                    </div>  
                    
                    <!-- Modal termo de uso -->
                    <div class="modal fade" id="div-termouso">
                        <div class="modal-dialog">                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">                                                    
                                        <i class="fa fa-edit"></i> <b>Termo de compromisso</b>                                                  
                                    </h4>
                                </div>
                                <div id="upMsgTermo">
		
                                        <div class="modal-body"> 
                                            <div id="pnTermoInicio">
			
                                                <div class="m-l-15 m-r-15 m-b-15">
                                                    <div class="form-group">                                   
                                                        
                                                    </div>
                                                </div>
                                                <div class="m-l-15 m-t-15">
                                                    <div class="form-group">
                                                        <span><b>Declaro que li o termo de compromisso e responsabilidade e</b></span>
                                                        <div class="input-group input-group">
                                                            <div class="radio radiobuttonlist">
                                                                <span id="rbtermo" class="radio-primary" onchange="return habilitaBtnTermo();"><input id="rbtermo_0" type="radio" name="rbtermo" value="true" checked="checked" /><label for="rbtermo_0">Concordo</label><br /><input id="rbtermo_1" type="radio" name="rbtermo" value="false" /><label for="rbtermo_1">Não concordo</label></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                                <div class="form-group text-center">
                                                    <div id="upProgressoTermo" style="visibility:hidden;display:block;">
				
                                                            <div class="overlay">
                                                                <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
                                                            </div>
                                                        
			</div>                                            
                                                </div> 
                                                
                                            
		</div>
                                            <div id="pnTermoFim">
			 
                                                <span id="lblTermoAssinatura"></span> 
                                            
		</div>                                                    
                                            <span id="lblmsgtermo"></span>                                   
                                        </div>
                                        <div class="modal-footer">
                                            <button onclick="__doPostBack('btnTermo','')" id="btnTermo" type="button" class="btn btn-success m-r-5" OnClientClick="return limparTermo();">
                                                <i class="fa fa-edit m-r-5"></i>Assinar termo
                                            </button>
                                            
                                             
                                                
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal" style="width:100px">
                                                <i class="fa fa-sign-out m-r-5"></i>Fechar</button>
                                        </div>
                                    
	</div>
                            </div>
                        </div>
                    </div>
                                                                  
            </form>    
</div>                                                                           
        

<script type="text/javascript">
//<![CDATA[
(function() {var fn = function() {$get("ToolkitScriptManager1_HiddenField").value = '';Sys.Application.remove_init(fn);};Sys.Application.add_init(fn);})();Sys.Application.initialize();
Sys.Application.add_init(function() {
    $create(Sys.UI._UpdateProgress, {"associatedUpdatePanelId":null,"displayAfter":500,"dynamicLayout":false}, null, null, $get("upProgresso"));
});
Sys.Application.add_init(function() {
    $create(Sys.UI._UpdateProgress, {"associatedUpdatePanelId":null,"displayAfter":500,"dynamicLayout":false}, null, null, $get("upProgressoTermo"));
});
//]]>
</script>
</form>
    </div>            
 
 
    <script src="../mapsed-master/ws/js/jquery-1.10.2.js"></script> 
    <script src="../mapsed-master/ws/js/bootstrap.js"></script>
	
 
    <!-- recaptcha 2.0 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit(token) {
            document.getElementById("frmLogin").submit();
        }
    </script>

    <script language="javascript" type="text/javascript">
        function limparMensagem() {
            var msg_erro = '';
            var obj_msg = document.getElementById('lblmsg');
            obj_msg.innerHTML = msg_erro;
            return true;
        }
        function habilitaBtn () {
            var msg_erro = '';
            var btnlogin = document.getElementById('btnLogin');
            var obj_msg = document.getElementById('lblmsg');
            obj_msg.innerHTML = msg_erro;
            btnlogin.disabled = false;
            return true;
        }
        
        function limparTermo() {
            var msg_erro = '';
            var obj_msg = document.getElementById('lblmsgtermo');
            obj_msg.innerHTML = msg_erro;
            return true;
        }
        function habilitaBtnTermo() {
            var msg_erro = '';
            var btntermo = document.getElementById('btntermo');
            var obj_msgtermo = document.getElementById('lblmsgtermo');
            obj_msg.innerHTML = msg_erro;
            obj_msgtermo.innerHTML = msg_erro;
            btntermo.disabled = false;
            return true;
        }
    </script>                         
</body>

<script language="javascript" type="text/javascript">
    function pageLoad() {
        $('.g-recaptcha').each(function(index, obj) {
        grecaptcha.render(obj, { 'localhost': '6LetgsAUAAAAAMXB_eyoIdYLoagngZ5NvKIReMG-' });
        });
    } 
</script>

</html>
