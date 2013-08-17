<?php require_once('../controller/sessionController.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../css/seb.css">
<link rel="shortcut icon" href="../images/favicon.ico"/>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
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
    <td height="25" bgcolor="#CCCCCC" class="Negrita" align="left">&nbsp;&nbsp;&nbsp;&nbsp;CREDITOS</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <table width="400" border="0" cellspacing="0" cellpadding="0" style="border-color:#b3b1b2" align="center" bgcolor="#FFFFFF">
      <tr>
        <td>
        <table width="100%" cellpadding="3" cellspacing="10" class="TablaRojaGrid">
          <tr>
            <td align="center" style="text-align: center"><strong>PEDRO CALZADILLA</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">Ministerio del Poder Popular de Educación  Universitaria (MPPEU).</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><strong>DR. ARMANDO ÁLVAREZ LUGO</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><em>Colegio Universitario de Caracas.</em></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><strong>YOLY  ARRECHEDERA</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><em>Programa Nacional de Formación en Informática</em></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><strong>ELISEO  AGUIRRE</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><em>Nombre del Docente Asesor.</em></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><strong>JUAN BLANCO</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><em>Representante de la comunidad.</em></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center"><strong>INTEGRANTES DEL EQUIPO DE PROYECTO.</strong></td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">Manuel Fernández</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">Isaac Mendoza</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">Jorge Freites</td>
          </tr>
          <tr>
            <td align="center" style="text-align: center">Vladimir Moreno</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><input name="button" type="button" class="BotonRojo" id="button" value="[ Inicio ]" onClick="javascript:window.location='centralView.php'" /></td>
  </tr>
</table>
</body>
</html>