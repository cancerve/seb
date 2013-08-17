<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/eventoModel.php'); 

$objEvento = new Evento();
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/seb.css">

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/select_buscar.js"></script>
<script type="text/javascript" src="../../js/sliding.form.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACTAR EMPRESA - Contactar Oficinas Comerciales</td>
    </tr>
  </table>
<div id="content">
            <div id="wrapper">
                <div id="steps">
  <form name="form1" id="form1" method="post" action="../../controller/oficinaController.php" enctype="multipart/form-data">                
                        <fieldset class="step">
                            <legend>Mensaje</legend>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr bgcolor="#CCCCCC">
              <td height="25" colspan="2" bgcolor="#666666" class="Blanquita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Enviar la informacion sobre el evento a las Oficinas Comerciales</td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td colspan="2" bgcolor="#CCCCCC" class="Negrita">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td width="27%" class="Textonegro">&nbsp;</td>
              <td width="73%">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Evento:<span class="Rojita">(*)</span></td>
              <td>
              <select name="AF_CodEvento" id="AF_CodEvento" onChange="load_Oficinas()">
                <option selected="selected" value="">[ Seleccione ]</option>
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
              <td align="right" valign="top" nowrap>Asunto:<span class="Rojita">(*)</div></td>
              <td><input type="text" name="asunto" id="asunto"></td>
            </tr>
            <tr valign="baseline">
              <td align="right" valign="top" nowrap>Mensaje:</td>
              <td><textarea name="mensaje" cols="50" rows="5" id="mensaje"></textarea></td>
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
                            
                        </fieldset>
                        <fieldset class="step">
                            <legend>Para</legend>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
  <tr bgcolor="#CCCCCC">
    <td height="25" colspan="2" bgcolor="#666666" class="Blanquita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione las Oficinas Comerciales que desea contactar</td>
  </tr>
  <tr bgcolor="#CCCCCC">
    <td colspan="2" bgcolor="#CCCCCC" class="Negrita">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
  </tr>
  <tr>
    <td width="27%" class="Textonegro">&nbsp;</td>
    <td width="73%">&nbsp;</td>
  </tr>              
  <tr align="center">
    <td colspan="2" class="Textonegro" align="center"><div id="myDiv" align="center"></div>
      </td>
  </tr>
</table>
                        </fieldset>
						<fieldset class="step">
                            <legend>Confirmar Envio</legend>
                           
						  <p>
							Todo en el formulario fue llenado correctamente si todos los pasos tienen un icono de marca de verificación verde. Un icono de marca de verificación roja indica que algún campo no se encuentra o fue llenado con datos no válidos. En este último paso, confirma el envio de toda la información suministrada haciendo clic en el botón &quot;Enviar&quot;, en el caso que desee volver al menú haga clic en el botón &quot;Cancelar&quot;.</p>
                            <p class="submit">
<input name="Enviar" type="submit" class="BotonRojo" value="[ Enviar ]" id="Enviar">
&nbsp;
<input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='index.php'" />
<input name="origen" type="hidden" id="origen" value="oficina">
                            </p>
                        </fieldset>
                    </form>
                </div>

  <div id="navigation" style="display:none;">
      <ul>
        <li class="selected"><a href="#">Mensaje</a></li>
        <li><a href="#">Para</a></li>
        <li><a href="#">Confirmar</a></li>    
      </ul>
  </div>
  </div>
  </div>
</body>
</html>
