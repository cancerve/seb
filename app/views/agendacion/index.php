<?php require_once('../../controller/sessionController.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="shortcut icon" href="../../images/favicon.ico"/>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript">
    function abrir_dialog() {
		var mensaje = "<?=$_GET['mensaje']?>";
		if (mensaje!=''){  
		  $( "#dialog" ).dialog({
			  show: "blind",
			  hide: "explode",
			  modal: true,
			  buttons: {
				Aceptar: function() {
				  $( this ).dialog( "close" );
				}
			  }
		  });
		}
    };
</script>    
</head>

<body onLoad="abrir_dialog();">
    <div id="dialog" title="Mensaje" style="display:none;">
    <p><?php echo $_GET['mensaje']; ?></p>
</div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" bgcolor="#CCCCCC" class="Negrita" align="left">&nbsp;&nbsp;&nbsp;&nbsp;AGENDACIÓN</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="Textonegro" align="center">El Módulo Agendación permite Crear la Agenda de Negocios a traves de la Gestión de cada Cita..<br>
      <br>      
    <br></td>
  </tr>
  <tr>
    <td>
    <table width="42%" border="0" cellspacing="0" cellpadding="0" style="border-color:#b3b1b2" align="center" bgcolor="#FFFFFF">
      <tr>
        <td>
        <table width="100%" class="TablaRojaGrid">
          <tr class="TablaRojaGridTRTitulo">
            <td>Escoja una opción</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: justify"><a href="cita/index.php">&nbsp;- Crear Citas de Negocio</a></td>
          </tr>
          <tr>
            <td style="text-align: justify"><a href="agenda/index.php">&nbsp;- Administrar Agenda</a></td>
          </tr>
          <tr>
            <td style="text-align: justify">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='../centralView.php'" /></td>
  </tr>
</table>
</body>
</html>