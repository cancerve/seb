<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/eventoModel.php'); 

$objEvento = new Evento();
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<script type="text/javascript" src="../../js/select_buscar.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACTAR EMPRESA - Contactar Oficinas Comerciales</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">Mensaje</a></li>
    <li><a href="#tabs-2">Para</a></li>
  </ul>
  <form name="form1" id="form1" method="post" action="../../controller/oficinaController.php" enctype="multipart/form-data">
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr>
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Enviar la informacion sobre el evento a las Oficinas Comerciales</td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td width="27%" class="Textonegro">&nbsp;</td>
              <td width="73%">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Evento:</td>
              <td>
              <select name="AF_CodEvento" id="AF_CodEvento" onChange="load_Oficinas()" style="width:350px">
                <option selected="selected">[ Seleccione ]</option>
				<?php 
					$rsEvento=$objEvento->listar($objConexion);
					$cant = $objConexion->cantidadRegistros($rsEvento);
					for($i=0;$i<$cant;$i++){
						  $value=$objConexion->obtenerElemento($rsEvento,$i,"AF_CodEvento");
						  $des=$objConexion->obtenerElemento($rsEvento,$i,"AF_Nombre_Evento");
						  echo "<option value=".$value.">".$des."</option>";
					}  
				?>               
              </select>
                      
               </td>
            </tr>
            <tr>
              <td align="right" valign="top" nowrap>Asunto:</td>
              <td><input type="text" name="asunto" id="asunto" style="width:350px"></td>
            </tr>
            <tr valign="baseline">
              <td align="right" valign="top" nowrap>Mensaje:</td>
              <td><textarea name="mensaje" cols="50" rows="5" id="mensaje" style="width:350px"></textarea></td>
            </tr>
            <tr>
              <td nowrap align="right">Archivo Adjunto:</td>
              <td><input name="adjunto" type="file"></td>
            </tr>
            <tr>
              <td nowrap align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            </table>
        </td>
      </tr>
</table>
</div>
<div id="tabs-2">
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr>
              <td class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione las Oficinas Comerciales a Enviar el Correo</td>
            </tr>
            <tr>
              <td class="BlancoGrisClaro">&nbsp;Seleccione al menos una Oficina Comercial</td>
            </tr>
  <tr>
    <td class="Textonegro" style="text-align: center">&nbsp;</td>
    </tr>              
  <tr>
    <td class="Textonegro"><div id="myDiv"></div>
      </td>
  </tr>
  <tr>
    <td class="Textonegro">&nbsp;</td>
  </tr>
  <tr>
    <td class="Textonegro" style="text-align: center">
      <input name="Enviar" type="submit" class="BotonRojo" value="[ Enviar ]" id="Enviar">
      <input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='index.php'" />
      <input name="origen" type="hidden" id="origen" value="Contactar Oficina">
      </td>
  </tr>
  </table>
</div>
</form>
</div>
</table>
</body>
</html>
