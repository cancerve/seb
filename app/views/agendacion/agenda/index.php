<?php 
require_once('../../../controller/sessionController.php'); 
require_once('../../../model/eventoModel.php');

$objEvento = new Evento(); 
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../../css/seb.css">
<link rel="stylesheet" href="../../../css/jquery-ui.css" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../../js/funciones.js"></script>
<script type="text/javascript" src="../../../js/select_buscar.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;AGENDA</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">General</a></li>
  </ul>
  <form name="form1" id="form1" method="post" action="../../../views/reportes/agenda_empresa.php" target="_blank" enctype="multipart/form-data">
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el siguiente formulario para visualizar la Agenda del Evento Seleccionado</td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td width="27%" class="Textonegro">&nbsp;</td>
              <td width="73%">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Evento:</td>
              <td>
                <select name="AF_CodEvento" id="AF_CodEvento" style="width:350px">
                  <option selected="selected">[ Seleccione ]</option>
                  <?php 
                            $rsEvento=$objEvento->listar($objConexion);
                            for($i=0;$i<$objConexion->cantidadRegistros($rsEvento);$i++){
                                  $value=$objConexion->obtenerElemento($rsEvento,$i,"AF_CodEvento");
                                  $des=$objConexion->obtenerElemento($rsEvento,$i,"AF_Nombre_Evento");
                                  echo "<option value=".$value.">".$des."</option>";
                            }  
                        ?>
                  </select>
                </td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" nowrap>&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" align="center"><input name="button2" type="submit" class="BotonRojo" id="button2" value="[ Ver Agenda ]" onClick="" />
                <input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='../index.php'" />
                <input name="AF_RIF" type="hidden" id="AF_RIF" value="<?=$_SESSION['AF_RIF']?>"></td>
              </tr>
            </table>
          </td>
      </tr>
</table>
  </div>  
</form>
</div>
</table>
</body>
</html>