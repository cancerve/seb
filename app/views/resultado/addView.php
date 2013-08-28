<?php 
require_once('../../controller/sessionController.php'); 

?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<script type="text/javascript" src="../../js/select_dependientes.js"></script>
<script type="text/javascript" src="../../js/demo.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESULTADO DE NEGOCIOS - Agregar Nuevo</td> 
      -
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">Datos Generales</a></li>
    <li><a href="#tabs-2">Montos Negociados</a></li>
    <li><a href="#tabs-3">Descripcion</a></li>        
  </ul>
  <form name="form1" id="form1" method="post" action="../../controller/resultadoController.php">
  <div id="tabs-1">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr>
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Agregar un nuevo Evento</td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td class="Textonegro">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="365">&nbsp;Numero de  Cita:</td>
              <td><input type="text" name="cita_NU_Cita" id="cita_NU_Cita" value="" size="32" onKeyUp="cargaContenido2(1,this.id,'AF_RIF_Reporta')" required></td>
            </tr>																					
            <tr>
              <td>&nbsp;RIF / IDN de la Empresa que Reporta:</td>
              <td>
              <select name="AF_RIF_Reporta" disabled id="AF_RIF_Reporta"  style="width:250px">
                	<option value="0" >[ Seleccione ]</option>
              </select></td>
            </tr>
            <tr>
                <td colspan="2"><div id="myDiv"></div></td>
            </tr>
          </table>
        </td>
      </tr>
</table>
</div>
<div id="tabs-2">
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr>
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Agregar un nuevo Evento</td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
  <tr>
    <td width="27%" class="Textonegro">&nbsp;</td>
    <td width="73%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro"><table width="100%" border="0" cellspacing="2" cellpadding="2" class="TablaRojaGrid">
      <tr class="TablaRojaGridTRTitulo">
        <td width="120">MONTO NEGOCIADO</td>
        <td width="49%">TIPO DE NEGOCIO</td>
      </tr>
      <tr class="TablaRojaGridTR">
        <td colspan="2" class="TablaRojaGridTD">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGridTR">
            <td width="50" align="center">US $</td>
            <td width="120"><input type="text" name="BS_Monto1" id="AF_Nombre_Evento7" value="" size="15" required></td>
            <td width="120" align="center">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="BI_Tipo_Negocio1" id="radio7" value="1">
              Compra                         
              <input type="radio" name="BI_Tipo_Negocio1" id="radio8" value="2">
              Inversión    
              <input type="radio" name="BI_Tipo_Negocio1" id="radio9" value="3">
              Alianza     <br>
              <input type="radio" name="BI_Tipo_Negocio1" id="radio10" value="4">
              Otro Especifique:
              <input type="text" name="AF_Otro1" id="AF_Otro1" value="" size="32" required></td>
          </tr>
          <tr class="TablaRojaGridTR">
            <td colspan="4" align="center">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr class="TablaRojaGridTR">
        <td colspan="2" class="TablaRojaGridTD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGridTR">
            <td width="50" align="center">US $</td>
            <td width="120"><input type="text" name="BS_Monto2" id="AF_Nombre_Evento7" value="" size="15" required></td>
            <td width="120" align="center">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="BI_Tipo_Negocio2" id="radio7" value="1">
              Compra                         
              <input type="radio" name="BI_Tipo_Negocio2" id="radio8" value="2">
              Inversión    
              <input type="radio" name="BI_Tipo_Negocio2" id="radio9" value="3">
              Alianza     <br>
              <input type="radio" name="BI_Tipo_Negocio2" id="radio10" value="4">
              Otro Especifique:
              <input type="text" name="AF_Otro2" id="AF_Nombre_Evento8" value="" size="32" required></td>
          </tr>
          <tr class="TablaRojaGridTR">
            <td colspan="4" align="center">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr class="TablaRojaGridTR">
        <td colspan="2" class="TablaRojaGridTD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGridTR">
            <td width="50" align="center">US $</td>
            <td width="120"><input type="text" name="BS_Monto3" id="AF_Nombre_Evento9" value="" size="15" required></td>
            <td width="120" align="center">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="BI_Tipo_Negocio3" id="radio11" value="1">
              Compra                         
              <input type="radio" name="BI_Tipo_Negocio3" id="radio12" value="2">
              Inversión    
              <input type="radio" name="BI_Tipo_Negocio3" id="radio13" value="3">
              Alianza     <br>
              <input type="radio" name="BI_Tipo_Negocio3" id="radio14" value="4">
              Otro Especifique:
              <input type="text" name="AF_Otro3" id="AF_Nombre_Evento10" value="" size="32" required></td>
          </tr>
          <tr class="TablaRojaGridTR">
            <td colspan="4" align="center">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
</table>
</div>
<div id="tabs-3">
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr>
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Agregar un nuevo Evento</td>
            </tr>
        <tr>
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
        </tr>
        <tr>
          <td class="Textonegro">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top" class="Textonegro">Producto y /o área de inversión:</td>
          <td><textarea name="AF_Producto" id="AF_Producto" cols="50" rows="4" style="width:350px"></textarea></td>
        </tr>
        <tr>
          <td width="27%" valign="top" class="Textonegro">Breve descripción del negocio:</td>
          <td width="73%"><textarea name="AF_Descripcion" id="AF_Descripcion" cols="50" rows="4" style="width:350px"></textarea></td>
        </tr>              
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
  <tr align="center">
    <td class="Textonegro" align="center">&nbsp;</td>
    <td class="Textonegro" align="center"><input name="Evento" type="submit" class="BotonRojo"  value="[ Guardar ]" id="Evento">
      <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='gestionar.php?AF_CodEvento=<?=$_GET['AF_CodEvento']?>'" />
      <input type="hidden" name="origen" value="Resultado" id="origen"></td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
</table>
</div>
</form>
</div>
</table>
</body>
</html>
