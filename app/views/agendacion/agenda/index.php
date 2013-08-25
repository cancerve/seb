<?php 
require_once('../../../controller/sessionController.php'); 
require_once('../../../model/citaEmpresaModel.php');

$objCitaEmpresa = new CitaEmpresa(); 
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
              <td colspan="2" align="left" nowrap>

              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="TablaRojaGrid">
                <tr class="TablaRojaGridTRTitulo">
                  <td>Nro</td>
                  <td>Evento</td>
                  <td>Agenda</td>
                </tr>
<?php
					$AF_RIF 	= $_SESSION['AF_RIF'];
                    $rsEvento	= $objCitaEmpresa->listarSoloAgenda($objConexion,$AF_RIF);
					$cantEvento = $objConexion->cantidadRegistros($rsEvento);
					
					if ($cantEvento>0){
	                    for($i=0;$i<$cantEvento;$i++){
    	                	$AF_CodEvento	  = $objConexion->obtenerElemento($rsEvento,$i,"AF_CodEvento");
        	                $AF_Nombre_Evento = $objConexion->obtenerElemento($rsEvento,$i,"AF_Nombre_Evento");
?>
						<tr class="TablaRojaGridTR">
						  <td class="TablaRojaGridTD"><?=$i+1?></td>
						  <td class="TablaRojaGridTD" align="left">&nbsp;<?=$AF_Nombre_Evento?></td>
						  <td class="TablaRojaGridTD" width="50"><a href="../../reportes/agenda_empresa.php?AF_RIF=<?=$AF_RIF?>&AF_CodEvento=<?=$AF_CodEvento?>" target="_blank"><img src="../../../images/bton_ver.gif" width="31" height="31"  alt=""/></a></td>
						</tr>
<?php 					}
					}else{ 
						echo 'No existen Eventos con Agendas Disponibles.';					
					}
					
?>
                    
              </table>
              </td>
              </tr>
            <tr valign="baseline">
              <td colspan="2" nowrap>&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2" align="center"><input name="button" type="button" class="BotonRojo" id="button" value="[ Cancelar ]" onClick="javascript:window.location='../index.php'" />
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