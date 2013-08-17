<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/empresaPostuModel.php');

$objEmpresaPostu = new EmpresaPostu();
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
    function abrir_dialog() {
		var mensaje = "<?php echo $_GET['mensaje']; ?>";
		if(mensaje){
		  $( "#dialog" ).dialog({
			  show: "blind",
			  hide: "explode",
			  modal: true,
			  buttons: {
				Aceptar: function() {
				  $( this ).dialog( "close" );
				}
			  }
		  });
		}
    };
</script>
</head>
<body onLoad="abrir_dialog();">
<div id="dialog" title="Mensaje" style="display:none;">
    <span class="ui-icon ui-icon-circle-check"></span>
    <p><?php echo $_GET['mensaje']; ?></p>
</div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONFIRMAR PARTICIPACIÓN</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1">Datos Generales</a></li>
  </ul>
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione el Evento al cual desee confirmar la participación de su Empresa</td>
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
			$empresa_AF_RIF = $_SESSION['AF_RIF'];
			$rsEVE = $objEmpresaPostu->buscarXrifXstatus($objConexion,$empresa_AF_RIF,3);
			$cantEVE = $objConexion->cantidadRegistros($rsEVE);

			if ($cantEVE>0){

			  ?>
              <table width="100%" class="TablaRojaGrid">
                <tr class="TablaRojaGridTRTitulo">
                  <td width="81%">Nombre del Evento</td>
                  <td width="10%">Confirmar</td>
                  <td width="9%">Rechazar</td>
                </tr>
                <?php 
			for($i=0;$i<$cantEVE;$i++){

				$AF_CodEvento 		= $objConexion->obtenerElemento($rsEVE,$i,'evento_AF_CodEvento');
				$AF_Nombre_Evento 	= $objConexion->obtenerElemento($rsEVE,$i,'AF_Nombre_Evento');

                ?>
                <tr class="TablaRojaGridTR">
                  <td class="TablaRojaGridTD" align="left"><?php echo $AF_Nombre_Evento; ?></td>
                  <td class="TablaRojaGridTD"><a href="../../controller/empresaController.php?origen=Confirmar&&AF_CodEvento=<?=$AF_CodEvento?>"><img src="../../images/bton_confir.gif" width="51" height="51"  alt=""/></a></td>
                  <td class="TablaRojaGridTD"><a href="../../controller/empresaController.php?origen=Rechazar&&AF_CodEvento=<?=$AF_CodEvento?>"><img src="../../images/bton_rechaz.gif" width="51" height="51"  alt=""/></a></td>
                </tr>
                <?php 	} ?>
                </table>
                <?php
					}else{
						echo 'No ha sido seleccionado para participar en algun evento.';	
					}?>                
              </td>
              </tr>
            <tr valign="baseline">
              <td colspan="2" align="right" nowrap>&nbsp;</td>
            </tr>
            <tr align="center">
              <td colspan="2" nowrap>
              
                <span class="Textonegro" style="text-align:center">
                <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='../centralView.php'" />
                </span>
<input name="origen" type="hidden" id="origen" value="Confirmar Participacion"></td>
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