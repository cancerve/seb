<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/eventoModel.php');

$objEvento = new Evento(); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />


<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<script type="text/javascript" src="../../js/select_buscar.js"></script>


</head>

<body>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" bgcolor="#CCCCCC" class="Negrita" align="left">&nbsp;&nbsp;&nbsp;&nbsp;EVALUAR Y SELECCIONAR EMPRESAS</td>
  </tr>
</table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">General</a></li>
  </ul>
<form name="form1" method="post" action="../../controller/empresaController.php">
<div id="tabs-1">
  <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
    <tr bgcolor="#CCCCCC">
      <td height="25" colspan="2" bgcolor="#666666" class="Blanquita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Evento para el cual desea Seleccionar Empresas</td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td colspan="2" bgcolor="#CCCCCC" class="Negrita">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
    </tr>
    <tr>
      <td width="27%" class="Textonegro">&nbsp;</td>
      <td width="73%">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Evento:</td>
      <td><select name="AF_CodEvento" id="AF_CodEvento" onChange="load_Emp_Postu()"  style="width:350px">
        <option selected="selected">[ Seleccione ]</option>
        <?php 
					$rsEvento=$objEvento->listar($objConexion);
					for($i=0;$i<$objConexion->cantidadRegistros($rsEvento);$i++){
						  $value=$objConexion->obtenerElemento($rsEvento,$i,"AF_CodEvento");
						  $des=$objConexion->obtenerElemento($rsEvento,$i,"AF_Nombre_Evento");
						  echo "<option value=".$value.">".$des."</option>";
					}  
				?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" nowrap><div id="myDiv"></div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input name="Enviar" type="submit" class="BotonRojo" value="[ Seleccionar ]" id="Enviar">
        <input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='../centralView.php'" />
        <input name="origen" type="hidden" id="origen" value="Seleccionar Empresas"></td>
      </tr>
  </table>
</div>
</form>
</div>
</body>
</html>