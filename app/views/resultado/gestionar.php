<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/resultadoModel.php');
 

$objResultado = new Resultado();
$AF_CodEvento = $_REQUEST['AF_CodEvento'];
$RS 	= $objResultado->listarXevento($objConexion,$AF_CodEvento);
$cantRS = $objConexion->cantidadRegistros($RS);

?>
<html>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<head>
<title>SEB</title>
<script type="text/javascript" src="../../js/mensajes.js"></script>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
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
    <p><?php echo $_GET['mensaje']; ?></p>
</div>
  <table class="Textonegro" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RESULTADO DE NEGOCIOS</td>
    </tr>
    <tr>
      <td><img src="../../images/blank.gif" width="20" height="5"></td>
    </tr>
    <tr>
      <td height="25" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td height="25" align="center"><a href="addView.php?AF_CodEvento=<?=$AF_CodEvento?>"><img src="../../images/bton_add.gif" width="35" height="31">&nbsp;Agregar Nuevo Resultado de Negocio</a></td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
    </tr>
    <?php if ($cantRS>0){ ?>
    <tr>
      <td height="25">
      <table width="95%" class="TablaRojaGrid" align="center">
      <thead>
        <tr class="TablaRojaGridTRTitulo">
          <th scope="col" align="center">NRO. CITA</th>
          <th scope="col" align="center">FECHA</th>
          <th scope="col" align="center">HORA</th>
          <th scope="col" align="center">EMPRESA QUE REPORTA</th>
          <th scope="col" align="center">INTERES</th>
          <th scope="col" align="center">EDITAR</th>
          <th scope="col" align="center">BORRAR</th>
        </tr>
	  </thead>
      <tbody>
	<?php
    	for($i=0; $i<$cantRS; $i++){
			$cita_NU_Cita 	= $objConexion->obtenerElemento($RS,$i,'cita_NU_Cita');
			$FE_Fecha 		= $objConexion->obtenerElemento($RS,$i,'FE_Fecha');			
			$TI_Hora_Inicio = $objConexion->obtenerElemento($RS,$i,'TI_Hora_Inicio');
			$TI_Hora_Final 	= $objConexion->obtenerElemento($RS,$i,'TI_Hora_Final');			
			$Reporta 		= $objConexion->obtenerElemento($RS,$i,'Reporta');
			$BI_Interes 	= $objConexion->obtenerElemento($RS,$i,'BI_Interes');			
    ?>
        <tr>
          <td align="center" class="TablaRojaGridTD"><?php echo $cita_NU_Cita; ?></td>
          <td align="center" class="TablaRojaGridTD"><?php echo $FE_Fecha; ?></td>
          <td align="center" class="TablaRojaGridTD"><?php echo $TI_Hora_Inicio.' / '.$TI_Hora_Final; ?></td>
          <td align="left" class="TablaRojaGridTD"><?php echo $Reporta; ?></td>
          <td align="center" class="TablaRojaGridTD"><?php if ($BI_Interes=='1'){ echo 'Si'; }else{ echo 'No'; } ?></td>
          <td align="center" class="TablaRojaGridTD">
          	<a href="../configuracion/evento/editView.php?id=<?php echo $evento['id']; ?>" onClick="return confirmEdit()">
            <img src="../../images/bton_edit.gif" width="35" height="31"></a>
          </td>
          <td align="center" class="TablaRojaGridTD">
          	<a href="../configuracion/evento/delView.php?id=<?php echo $evento['id']; ?>" onClick="return confirmBorrar()">
            <img src="../../images/bton_del.gif" width="35" height="31"></a>
          </td>
        </tr>
	<?php
	    }
    ?>          
        </tbody>
      </table>
	<?php
	    }else{ echo 'No se encontraron registros.'; }
    ?>       
      </td>
    </tr>
    <tr>
      <td height="25" >&nbsp;</td>
    </tr>
    <tr>
      <td height="25" align="center"><input name="button2" type="button" class="BotonRojo" id="button2" value="[ Atras ]" onClick="javascript:window.location='index.php'" /></td>
    </tr>
  </table>
</body>
</html>