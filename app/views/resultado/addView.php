<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/paisModel.php'); 
require_once('../../includes/hacerlista.php');

$objPais = new Pais();
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<link rel="stylesheet" href="../../css/jquery.treeview.css" />


<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/jquery.ui.datepicker-es.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<script type="text/javascript" src="../../js/select_dependientes.js"></script>
<script type="text/javascript" src="../../js/jquery.treeview.js"></script>
<script type="text/javascript" src="../../js/demo.js"></script>
<script type="text/javascript" src="../../js/validar.js"></script>

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
  <form name="form1" id="form1" method="post" action="">
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
              <td width="360" class="Textonegro">&nbsp;</td>
              <td width="356">&nbsp;</td>
            </tr>
            <tr>
              <td>Numero de la Cita:</td>
              <td><input type="text" name="AF_Nombre_Evento2" id="AF_Nombre_Evento2" value="" size="32" required></td>
            </tr>
            <tr>
              <td>RIF / IDN de la Empresa que Reporta:</td>
              <td>
              <select id="ciudad_AF_CodCiudad" name="ciudad_AF_CodCiudad" disabled="disabled">
                	<option value="0" >[ Seleccione ]</option>
              </select></td>
            </tr>
            <tr>
              <td>Nombre del Representante de la Empresa que Reporta:</td>
              <td><select id="ciudad_AF_CodCiudad2" name="ciudad_AF_CodCiudad2">
                <option value="0" >[ Seleccione ]</option>
                </select></td>
            </tr>
            <tr>
              <td>Nombre del Representante de la Empresa Contraparte:</td>
              <td><select id="ciudad_AF_CodCiudad3" name="ciudad_AF_CodCiudad2">
                <option value="0" >[ Seleccione ]</option>
              </select></td>
            </tr>
            <tr>
              <td valign="top">La  empresa contraparte manifestó interés </td>
              <td ><input type="radio" name="radio" id="radio" value="Si">
                <label for="radio">Si 
                  &nbsp;&nbsp;
                  <input type="radio" name="radio" id="radio2" value="No">
                No </label></td>
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
        <td colspan="2" class="TablaRojaGridTD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGrid">
            <td width="50">US $</td>
            <td width="120"><input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento7" value="" size="15" required></td>
            <td width="120">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="radio2" id="radio7" value="radio3">
              Compra                         
              <input type="radio" name="radio2" id="radio8" value="radio4">
              Inversión    
              <input type="radio" name="radio2" id="radio9" value="radio5">
              Alianza     <br>
              <input type="radio" name="radio2" id="radio10" value="radio6">
              Otro Especifique:
              <input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento6" value="" size="32" required></td>
          </tr>
        </table></td>
      </tr>
      <tr class="TablaRojaGridTR">
        <td colspan="2" class="TablaRojaGridTD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGrid">
            <td width="50">US $</td>
            <td width="120"><input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento7" value="" size="15" required></td>
            <td width="120">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="radio3" id="radio7" value="radio3">
              Compra                         
              <input type="radio" name="radio3" id="radio8" value="radio4">
              Inversión    
              <input type="radio" name="radio3" id="radio9" value="radio5">
              Alianza     <br>
              <input type="radio" name="radio3" id="radio10" value="radio6">
              Otro Especifique:
              <input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento8" value="" size="32" required></td>
          </tr>
        </table></td>
      </tr>
      <tr class="TablaRojaGridTR">
        <td colspan="2" class="TablaRojaGridTD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="TablaRojaGrid">
            <td width="50">US $</td>
            <td width="120"><input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento9" value="" size="15" required></td>
            <td width="120">Menor a 3 meses</td>
            <td align="left"><input type="radio" name="radio4" id="radio11" value="radio3">
              Compra                         
              <input type="radio" name="radio4" id="radio12" value="radio4">
              Inversión    
              <input type="radio" name="radio4" id="radio13" value="radio5">
              Alianza     <br>
              <input type="radio" name="radio4" id="radio14" value="radio6">
              Otro Especifique:
              <input type="text" name="AF_Nombre_Evento6" id="AF_Nombre_Evento10" value="" size="32" required></td>
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
          <td class="Textonegro">Producto y /o área de inversión</td>
          <td><textarea name="AF_Lugar2" id="AF_Lugar2" cols="50" rows="5"></textarea></td>
        </tr>
        <tr>
          <td width="27%" class="Textonegro">Breve descripción del negocio</td>
          <td width="73%"><textarea name="AF_Lugar3" id="AF_Lugar3" cols="50" rows="5"></textarea></td>
        </tr>              
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
  <tr align="center">
    <td class="Textonegro" align="center">&nbsp;</td>
    <td class="Textonegro" align="center"><input name="Evento" type="button" class="BotonRojo"  value="[ Guardar ]" id="Evento" onClick="javascript:alert('En Construccion...')">
      <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='gestionar.php?AF_CodEvento=<?=$_GET['AF_CodEvento']?>'" />
      <input type="hidden" name="origen" value="Evento" id="origen"></td>
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
