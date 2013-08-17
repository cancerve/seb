<?php 
require_once('../../../controller/sessionController.php'); 

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
    <li><a href="#tabs-1">Realizar Citas</a></li>
  </ul>
  
  <div id="tabs-1">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro" bgcolor="#FFFFFF">
            <tr bgcolor="#CCCCCC">
              <td width="100%" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Haga clic en un área disponible (Celda en Blanco) para concertar una cita.</td>
            </tr>
            <tr bgcolor="#CCCCCC">
              <td class="BlancoGrisClaro">&nbsp;Debe señalar por lo menos un área disponible (Celda en Blanco)</td>
            </tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="2" cellpadding="2" class="Textonegro">
                <tr>
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
                      <td class="TablaRojaGridTDHorario" align="center"><input type="button" name="button" id="button" class="BotonHorarioDisponible" onClick="javascript:alert('En Construccion...')"></td>
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
            <tr>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.history.back()"></td>
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
