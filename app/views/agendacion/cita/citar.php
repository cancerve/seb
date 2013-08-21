<?php 
require_once('../../../controller/sessionController.php'); 
require_once('../../../model/eventoModel.php'); 
require_once('../../../model/citaModel.php'); 

$objEvento 	= new Evento();
$objCita 	= new Cita();
?>
<html>
<head>
<title>SEB</title>

<link rel="stylesheet" type="text/css" href="../../../css/seb.css">
<link rel="stylesheet" href="../../../css/jquery-ui.css" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../../js/funciones.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <li><a href="#tabs-1">Haga clic en un área disponible (Celda en Blanco) para concertar una cita</a></li>
  </ul>
  
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td class="BlancoGrisClaro">&nbsp;Debe señalar por lo menos un área disponible (Celda en Blanco)</td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="2" cellpadding="2" class="TextonegroPEQ">
                <tr>
                  <td width="5"><input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.history.back()"></td>
                  <td width="15">&nbsp;</td>
                  <td width="5" bgcolor="#FFCC00" style="border:#000 solid 1px">&nbsp;</td>
                  <td>Ocupado la Empresa Interesada</td>
                  <td width="5" bgcolor="#FF0000" style="border:#000 solid 1px">&nbsp;</td>
                  <td>Ocupado por ambas</td>
                  <td width="5" bgcolor="#0099FF" style="border:#000 solid 1px">&nbsp;</td>
                  <td>Ocupado por su Empresa</td>
                  <td width="5" style="border:#000 solid 1px">&nbsp;</td>
                  <td width="5">Disponible</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td>
<!-- /////////////////// CREACION DE HORARIOS /////////////////////////////////////////// -->  
<?php 
	$AF_CodEvento 	= $_GET['AF_CodEvento'];
	$AF_RIF 		= $_GET['AF_RIF'];
	$rsEvento 		= $objEvento->buscar($objConexion,$AF_CodEvento);
	$cantEvento 	= $objConexion->cantidadRegistros($rsEvento);
	
	$FE_Fecha_Desde			= $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Desde");
	$FE_Fecha_Hasta			= $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Hasta");
	$TI_Hora_Inicio_Am		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Inicio_Am");
	$TI_Hora_Final_Am		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Final_Am");
	$TI_Hora_Inicio_Pm		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Inicio_Pm");
	$TI_Hora_Final_Pm		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Final_Pm");
	$NU_Minutos_x_Cita		= $objConexion->obtenerElemento($rsEvento,0,"NU_Minutos_x_Cita");		
	$NU_Minutos_Entre_Cita	= $objConexion->obtenerElemento($rsEvento,0,"NU_Minutos_Entre_Cita");

	$segundos	= strtotime($FE_Fecha_Hasta) - strtotime($FE_Fecha_Desde);
	$dias_evento= (intval($segundos/60/60/24))+1;	
	$minutos 	= $NU_Minutos_x_Cita + $NU_Minutos_Entre_Cita;

////////////////////////////////////HORARIO EN LA MANANA /////////////////////	
	$actual	= $TI_Hora_Inicio_Am; 
	$i = 0;
	while($actual < $TI_Hora_Final_Am){ 
		$actual = strtotime('+'.$minutos.' minute', strtotime($actual));
		$actual = date('H:i:s',$actual);	
		$i++;
	}
	
	$columnas 	= $dias_evento;
	$filas 		= $i;
?> 
<!-- //////////////////// HORARIO DINAMICO PHP //////////////////////////////////////// -->
<table width="534" align="center" class="TablaRojaGrid">
 <tr class="TablaRojaGridTRTitulo">
 	<td width="100" scope="col" align="center">&nbsp;Horario</td>
	<?php 
	$dia = date("d-m-Y", strtotime($FE_Fecha_Desde));
	for ($k=0; $k<$columnas;$k++){ 
		$Fecha[$k] = $dia;
		echo '<td width="100" scope="col">'.$dia.'</td>';
		$dia = date("d-m-Y", strtotime($dia)+(60*60*24));
	}
	?>    
 </tr>
 <?php
	$actual	= date('H:i',strtotime($TI_Hora_Inicio_Am));
	$AF_CodEvento 	= $_GET['AF_CodEvento'];
	$NU_Mesa 		= $objCita->generarMesa($objConexion);
	$AF_RIF_Invita	= $_SESSION['AF_RIF'];
	$AF_RIF_Invitado= $_GET['AF_RIF'];

	for($t=0; $t<$filas; $t++){
		echo "<tr>";
		$actual1 = strtotime('+'.$minutos.' minute', strtotime($actual));
		$actual1 = date('H:i',$actual1);	
		echo '<td class="TablaRojaGridTDHorario">'.$actual.' a '.$actual1.'</td>';

		$Hora_Inicio 	= $actual;
		$Hora_Final 	= $actual1;

		$actual = $actual1;

		for($y=0;$y<$columnas;$y++){ ?>			
        
			<td class="TablaRojaGridTDHorario"><a href="../../../controller/citaController.php?evento_AF_CodEvento=<?=$AF_CodEvento?>&&FE_Fecha=<?=date("Y-m-d", strtotime($Fecha[$y]))?>&&TI_Hora_Inicio=<?=$Hora_Inicio?>&&TI_Hora_Final=<?=$Hora_Final?>&&NU_Mesa=<?=$NU_Mesa?>&&AF_RIF_Invita=<?=$AF_RIF_Invita?>&&AF_RIF_Invitado=<?=$AF_RIF_Invitado?>&&origen=Citar"><img title="espacio" src="../../../images/blank.gif" class="BotonHorarioDisponible" onmouseover="$(this).attr('src','../../../images/gris.gif')" onMouseOut="$(this).attr('src','../../../images/blank.gif')" alt="Empresa XXxxx" /></a></td>

<?php	}	echo "</tr>";	} ?>
 <?php 
 ////////////////////////////// HORARIO EN LA TARDE /////////////////////////
	$actual	= $TI_Hora_Inicio_Pm; 
	$i = 0;
 
 	while($actual < $TI_Hora_Final_Pm){ 
		$actual = strtotime('+'.$minutos.' minute', strtotime($actual));
		$actual = date('H:i:s',$actual);	
		$i++;
	}

	$columnas 	= $dias_evento;
	$filas 		= $i;

	$actual	= date('H:i',strtotime($TI_Hora_Inicio_Pm));
	for($t=0; $t<$filas; $t++){
		echo "<tr>";
		$actual1 = strtotime('+'.$minutos.' minute', strtotime($actual));
		$actual1 = date('H:i',$actual1);	
		echo '<td class="TablaRojaGridTDHorario">'.$actual.' a '.$actual1.'</td>';
		
		$Hora_Inicio 	= $actual;
		$Hora_Final 	= $actual1;
		
		$actual = $actual1;

		for($y=0;$y<$columnas;$y++){ ?>

			<td class="TablaRojaGridTDHorario"><a href="../../../controller/citaController.php?evento_AF_CodEvento=<?=$AF_CodEvento?>&&FE_Fecha=<?=date("Y-m-d", strtotime($Fecha[$y]))?>&&TI_Hora_Inicio=<?=$Hora_Inicio?>&&TI_Hora_Final=<?=$Hora_Final?>&&NU_Mesa=<?=$NU_Mesa?>&&AF_RIF_Invita=<?=$AF_RIF_Invita?>&&AF_RIF_Invitado=<?=$AF_RIF_Invitado?>&&origen=Citar"><img title="espacio" src="../../../images/blank.gif" class="BotonHorarioDisponible" onmouseover="$(this).attr('src','../../../images/gris.gif')" onMouseOut="$(this).attr('src','../../../images/blank.gif')" alt="Empresa XXxxx" /></a></td>

<?php	}	echo "</tr>";	} ?>
 
 </table>
<!-- //////////////////////////////////////////////////////////////// -->
              </td>
              </tr>

            </table>
          </td>
      </tr>
</table>
    </div>

</div>
</body>
</html>

