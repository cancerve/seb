<?php 
require_once('../../../controller/sessionController.php'); 
require_once('../../../model/eventoModel.php'); 

$objEvento = new Evento();
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../../css/seb.css">
<link rel="stylesheet" href="../../../css/jquery-ui.css" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../../js/funciones.js"></script>
<script type="text/javascript" src="../../../js/select_buscar.js"></script>
</head>
<body>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GESTIONAR CITA</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">Realizar Citas</a></li>
  </ul>
  
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Evento para el cual desea ver las Empresas Candidatas Contactadas</td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td colspan="2" class="Textonegro">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td width="185" align="right">Evento:</td>
              <td width="531">
              <select name="AF_CodEvento" id="AF_CodEvento" onChange="load_Emp_Cita()" style="width:350px">
				<?php 
					$rsEvento=$objEvento->listarSOLOCONpartici($objConexion,$_SESSION['AF_RIF']);
					$cantEvento = $objConexion->cantidadRegistros($rsEvento);
					if ($cantEvento>0){
						echo '<option selected="selected">[ Seleccione ]</option>';
						for($i=0;$i<$cantEvento;$i++){
							  $value=$objConexion->obtenerElemento($rsEvento,$i,"AF_CodEvento");
							  $des=$objConexion->obtenerElemento($rsEvento,$i,"AF_Nombre_Evento");
							  echo "<option value=".$value.">".$des."</option>";
						}  
					}else{
						echo '<option value="" selected="selected">No exiten Eventos donde haya sido Seleccionado a Participar.</option>';
					}
				?>               
              </select>
               </td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div id="myDiv"></div></td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><input name="button" type="button" class="BotonRojo" id="button" value="[ Atras ]" onClick="javascript:window.location='../index.php'" /></td>
            </tr>
            </table>
          </td>
      </tr>
</table>
    </div>

</div>
</table>
</body>
</html>
