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
<script type="text/javascript">
    function abrir_dialog() {
		var mensaje = "Fino";
		if(mensaje){
		  $( "#dialog" ).dialog({
			  show: "slide",
			  hide: "slide",
			  height: 475,
			  width: 690,
			  modal: true,
		  });
		}
    };
</script>

</head>
<body>
<!-- ///////////////// CREACION DE VENTANA HORARIOS //////////////////-->
<div id="dialog" title="Haga clic en un área disponible (Celda en Blanco) para concertar una cita." style="display:none;">
<span class="ui-icon ui-icon-circle-check"></span>
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
    <tr bgcolor="#CCCCCC">
      <td width="100%" class="BlancoGrisClaro">&nbsp;Debe señalar por lo menos un área disponible (Celda en Blanco)</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="2" cellpadding="2" class="TextonegroPEQ">
        <tr style="height:3px">
          <td width="5" bgcolor="#FFCC00" style="border:#000 solid 1px">&nbsp;</td>
          <td>Ocupado por Empresa Interesada</td>
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
           <table width="534" align="center" class="TablaRojaGrid">
            <tr class="TablaRojaGridTRTitulo">
              <th width="100" scope="col" align="center">Horario</th>
              <th width="100" scope="col">17/07/2013</th>
              <th width="100" scope="col">18/07/2013</th>
              <th width="100" scope="col">19/07/2013</th>
              <th width="100" scope="col">20/07/2013</th>
            </tr>
            <tr>
              <td colspan="5">-------- MAÑANA --------</td>
            </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">&nbsp;09:00 a 09:30</td>
              <td align="center" bgcolor="#0099FF" class="TablaRojaGridTDHorario">&nbsp;</td>
              <td class="TablaRojaGridTDHorario" align="center"><a href="../../../controller/agendacionController.php?valor=1"><img src="../../../images/blank.gif" width="1" height="1"  alt="" class="BotonHorarioDisponible"/></a></td>
              <td class="TablaRojaGridTDHorario" align="center"><input type="button" name="button" id="button" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario" align="center"><input type="button" name="button" id="button" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
            </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">&nbsp;09:40 a 10:10</td>
              <td bgcolor="#0099FF" class="TablaRojaGridTDHorario">&nbsp;</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button6" id="button6" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
            </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">10:20 a 10:50</td>
              <td bgcolor="#0099FF" class="TablaRojaGridTDHorario">&nbsp;</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button7" id="button7" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">11:00 a 11:30</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td bgcolor="#FFCC00" class="TablaRojaGridTDHorario">&nbsp;</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button8" id="button8" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">11:40 a 12:10</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button9" id="button9" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td colspan="5">-------- TARDE -------- </td>
            </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">02:00 a 02:30</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario" align="center"><input type="button" name="button" id="button" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">02:40 a 03:10</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button6" id="button6" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">03:20 a 03:50</td>
              <td bgcolor="#FF0000" class="TablaRojaGridTDHorario">&nbsp;</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td bgcolor="#0099FF" class="TablaRojaGridTDHorario">&nbsp;</td>
             </tr>
            <tr>
              <td height="22" class="TablaRojaGridTDHorario">04:00 a 04:30</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button8" id="button8" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
            <tr>
              <td class="TablaRojaGridTDHorario">04:40 a 05:10</td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button3" id="button3" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button4" id="button4" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button5" id="button5" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
              <td class="TablaRojaGridTDHorario"><input type="button" name="button10" id="button10" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
             </tr>
          </table>
      </td>
      </tr>
    </table>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////-->
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
