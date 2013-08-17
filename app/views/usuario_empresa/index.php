<?php 
require_once("../../includes/constantes.php");
require_once("../../includes/conexion.class.php");

$objConexion= new conexion(SERVER,USER,PASS,DB);
?>
<html>
<head>
<title>SEB</title>
<link rel="shortcut icon" href="../../images/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../../images/banner1.jpg" width="780" height="37" /></td>
      </tr>
      <tr>
        <td><img src="../../images/banner2.jpg" width="780" height="43" /></td>
      </tr>
    </table></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#9d0f0f">
    <td colspan="5" bgcolor="#666666"><img src="../images/blank.gif" width="1" height="1" /></td>
  </tr>
  <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <td height="25" bgcolor="#333333" class="Blanquita" align="center">SISTEMA DE EVENTOS BANCOEX</td>
  </tr>
</table>
<table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F8F8F8" bgcolor="#FFFFFF">

  <tr>
    <td valign="top" bordercolor="#000000" width="780" height="500">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REGISTRO USUARIO</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1" class="Negrita">Datos Generales</a></li>
  </ul>
  <form name="form1" id="form1" method="post" action="../../controller/usuarioController.php">
  <div id="tabs-1">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr>
              <td colspan="2" class="BlancoGris" width="95%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Crear su Usuario</td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoGrisClaro" width="95%">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td width="212" class="Textonegro">&nbsp;</td>
              <td width="73%">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">RIF / IDN de la Empresa:</td>
              <td><input type="text" name="empresa_AF_RIF" value="" size="32" id="empresa_AF_RIF" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Nombre y Apellido del Responsable del Registro:</td>
              <td><input type="text" name="AL_NombreApellido" value="" size="32" id="AL_NombreApellido" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Usuario:</td>
              <td><input type="text" name="AF_Usuario" value="" size="32" id="AF_Usuario" />
                <div id="Info2"></div></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Clave:</td>
              <td><input type="password" name="AF_Clave" value="" size="32" id="AF_Clave" /></td>
            </tr>
            <tr valign="baseline">
              <td align="right" nowrap="nowrap">Repita la Clave:</td>
              <td><input type="password" name="AF_Clave2" value="" size="32" id="AF_Clave2"/></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Correo_Electronico:</td>
              <td><input type="email" name="AF_Correo" value="" size="32" id="AF_Correo" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input name="Enviar" type="submit" class="BotonRojo"  value="[ Crear ]" id="Enviar">
                <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='../../../index.php'" />
                <input name="origen" type="hidden" id="origen" value="UserEmp">
                </td>
            </tr>
            </table>
        </td>
      </tr>
</table>
</div>
</form>
</div>
</body>
</html>