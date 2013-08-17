<?php 
require_once('../../../controller/sessionController.php'); 
require_once('../../../model/eventoPaisParticiModel.php');
require_once('../../../model/empresaModel.php');
require_once('../../../includes/fecha.php');

$objEventoPaisPartici 	= new EventoPaisPartici();
$objEmpresa = new Empresa();
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
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Evento al cual desee postular su Empresa</td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr>
              <td width="200" class="Textonegro">&nbsp;</td>
              <td width="516">&nbsp;</td>
            </tr>
            <tr valign="baseline">
              <td colspan="2">
              
              <?php 
			$AF_RIF = $_SESSION['AF_RIF'];
			$rsEMP = $objEmpresa->buscarXrif($objConexion,$AF_RIF);
			$cantEMP = $objConexion->cantidadRegistros($rsEMP);
			if ($cantEMP>0){
				$pais_AL_CodPais = $objConexion->obtenerElemento($rsEMP,0,'pais_AL_CodPais');
			}
			
			$rsEvento=$objEventoPaisPartici->listarXcodpais2($objConexion,$pais_AL_CodPais,$AF_RIF);
			$cantRS = $objConexion->cantidadRegistros($rsEvento);
			if ($cantRS>0){

			  ?>
              <table width="100%" class="TablaRojaGrid">
                <tr class="TablaRojaGridTRTitulo">
                  <td>&nbsp;</td>
                  <td>Periodo del Evento</td>
                  <td>Pais</td>
                  <td>Nombre del Evento</td>
                  <td>Detalle</td>
                </tr>
                <?php 
						for($i=0;$i<$cantRS;$i++){
							$AF_CodEvento 		= $objConexion->obtenerElemento($rsEvento,$i,'AF_CodEvento');
							$FE_Fecha_Desde 	= cambiarFormatoE2($objConexion->obtenerElemento($rsEvento,$i,'FE_Fecha_Desde'));
							$FE_Fecha_Hasta 	= cambiarFormatoE2($objConexion->obtenerElemento($rsEvento,$i,'FE_Fecha_Hasta'));
							$AL_Pais 			= $objConexion->obtenerElemento($rsEvento,$i,'AL_Pais');
							$AF_Nombre_Evento 	= $objConexion->obtenerElemento($rsEvento,$i,'AF_Nombre_Evento');

                ?>
                <tr class="TablaRojaGridTR">
                  <td class="TablaRojaGridTD"><input type="radio" name="AF_CodEvento" id="radio" value="<?=$AF_CodEvento?>"></td>
                  <td class="TablaRojaGridTD"><?php echo $FE_Fecha_Desde.' - '.$FE_Fecha_Hasta; ?></td>
                  <td class="TablaRojaGridTD"><?php echo $AL_Pais; ?></td>
                  <td class="TablaRojaGridTD" align="left"><?php echo $AF_Nombre_Evento; ?></td>
                  <td class="TablaRojaGridTD"><a href="../../reportes/detalle_evento.php?AF_CodEvento=<?=$AF_CodEvento?>" target="_blank"><img src="../../../images/bton_ver.gif" width="31" height="31"  alt=""/></a></td>
                </tr>
                <?php 	} ?>
                </table>
                <?php
					}else{
						echo 'No se encuentran Eventos Disponibles.';	
					}?>                
              </td>
              </tr>
            <tr valign="baseline">
              <td colspan="2" align="right" nowrap>&nbsp;</td>
            </tr>
            <tr align="center">
              <td colspan="2" nowrap>
              <?php if ($cantRS!=0){ ?>
              <input name="Enviar" type="submit" class="BotonRojo" value="[ Postular ]" id="Enviar">
              <?php } ?>
                <span class="Textonegro" style="text-align:center">
                <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='../../centralView.php'" />
                </span>
<input name="origen" type="hidden" id="origen" value="Postular Externas"></td>
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