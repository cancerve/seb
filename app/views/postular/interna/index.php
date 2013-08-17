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
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;POSTULAR EMPRESA</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">Datos Generales</a></li>
  </ul>
  <form name="form1" id="form1" method="post" action="../../../controller/empresaController.php" enctype="multipart/form-data">
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Postular a las Empresas Candidatas al Evento Seleccionado</td>
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
              <select name="AF_CodEvento" id="AF_CodEvento" onChange="load_Emp_Candi()" style="width:350px">
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
              <td nowrap align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" nowrap><div id="myDiv"></div></td>
              </tr>
            <tr valign="baseline">
              <td colspan="2" align="right" nowrap>&nbsp;</td>
            </tr>
            <tr style="text-align:center">
              <td colspan="2" nowrap><input name="Enviar" type="submit" class="BotonRojo" value="[ Postular ]" id="Enviar">
                <input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='../../centralView.php'" />
                <input name="origen" type="hidden" id="origen" value="Postular Internas"></td>
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