<?php 
require_once('../../controller/sessionController.php'); 
require_once("../../includes/hacerlista.php");
require_once('../../model/paisModel.php');
require_once("../../model/empresaModel.php");
require_once("../../model/empresaContModel.php");

$objPais 			  = new Pais();
$objEmpresa 		  = new Empresa();
$objEmpresaContacto   = new EmpresaCont();

$RS = $objEmpresa->buscarXrif($objConexion,$_SESSION['AF_RIF']);
if ($objConexion->cantidadRegistros($RS)>0){

	$AF_RIF 					= $objConexion->obtenerElemento($RS,0,'AF_RIF');
	$ciudad_AF_CodCiudad 		= $objConexion->obtenerElemento($RS,0,'ciudad_AF_CodCiudad');
	$pais_AL_CodPais 			= $objConexion->obtenerElemento($RS,0,'pais_AL_CodPais');
	$AF_Clasificacion_Empresa 	= $objConexion->obtenerElemento($RS,0,'AF_Clasificacion_Empresa');
	$AF_Razon_Social 			= $objConexion->obtenerElemento($RS,0,'AF_Razon_Social');
	$AF_Direccion 				= $objConexion->obtenerElemento($RS,0,'AF_Direccion');
	$AL_Web 					= $objConexion->obtenerElemento($RS,0,'AL_Web');
	$AF_Correo_Electronico 		= $objConexion->obtenerElemento($RS,0,'AF_Correo_Electronico');
	$AF_Telefono 				= $objConexion->obtenerElemento($RS,0,'AF_Telefono');
	$AF_Fax 					= $objConexion->obtenerElemento($RS,0,'AF_Fax');
}

$RS1 = $objEmpresaContacto->listarXempresa($objConexion,$_SESSION['AF_RIF']);
$canRS1 = $objConexion->cantidadRegistros($RS1);
?>
<html>
<head>
<title>SEB</title>
<link rel="stylesheet" type="text/css" href="../../css/seb.css">
<link rel="stylesheet" href="../../css/jquery-ui.css" />
<link rel="stylesheet" href="../../css/jquery.treeview.css" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<script type="text/javascript" src="../../js/funciones.js"></script>
<script type="text/javascript" src="../../js/select_dependientes.js"></script>
<script type="text/javascript" src="../../js/jquery.treeview.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body onLoad="cargaContenido('pais_AL_CodPais',<?=$ciudad_AF_CodCiudad?>)">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td height="25" bgcolor="#CCCCCC" class="Negrita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PERFIL EMPRESA</td>
    </tr>
  </table>
  <br>
  <div id="tabs" style="width:730; margin-left:10px" align="center">
  <ul>
    <li><a href="#tabs-1" class="Negrita">Datos Generales</a></li>
    <li><a href="#tabs-2" class="Negrita">Contactos</a></li>
    <li><a href="#tabs-3" class="Negrita">Codigo Arancelario</a></li>    
  </ul>
  <form name="form1" id="form1" method="post" action="../../controller/empresaController.php">
  <div id="tabs-1">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bordercolor="#F8F8F8">
          <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
            <tr>
              <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Registrar su Empresa</td>
            </tr>
            <tr>
              <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
            </tr>
            <tr valign="baseline">
              <td width="212" align="right" nowrap="nowrap">RIF / IDN:</td>
              <td width="73%" class="NegritaMayor">&nbsp;<?=$AF_RIF?></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Clasificacion:</td>
              <td><select name="AF_Clasificacion_Empresa" style="width:350px">
                <option selected="selected">[ Seleccione ]</option>
                <option value="Micro Empresa" <?php if($AF_Clasificacion_Empresa=="Micro Empresa"){ echo 'selected="selected"'; } ?>>Micro Empresa</option>
                <option value="Pequeña Empresa" <?php if($AF_Clasificacion_Empresa=="Pequeña Empresa"){ echo 'selected="selected"'; } ?>>Pequeña Empresa</option>
                <option value="Mediana Empresa" <?php if($AF_Clasificacion_Empresa=="Mediana Empresa"){ echo 'selected="selected"'; } ?>>Mediana Empresa</option>
                <option value="Macro Empresa" <?php if($AF_Clasificacion_Empresa=="Macro Empresa"){ echo 'selected="selected"'; } ?>>Macro Empresa</option>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Razón Social:</td>
              <td><input type="text" name="AF_Razon_Social" value="<?=$AF_Razon_Social?>" size="32" / style="width:350px"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Pais:</td>
              <td><select name="pais_AL_CodPais" id="pais_AL_CodPais" onChange="cargaContenido(this.id)" style="width:350px">
                <option selected="selected">[ Seleccione ]</option>
                <?php 
					$rsPais=$objPais->listar($objConexion);
					for($i=0;$i<$objConexion->cantidadRegistros($rsPais);$i++){
						  $value=$objConexion->obtenerElemento($rsPais,$i,"AL_CodPais");
						  $des=$objConexion->obtenerElemento($rsPais,$i,"AL_Pais");
						  $selected="";
						  if($pais_AL_CodPais==$value){
							  $selected="selected='selected'";
						  }
						  echo "<option value=".$value." ".$selected.">".$des."</option>";
					}  
				?>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Ciudad:</td>
              <td><select id="ciudad_AF_CodCiudad" name="ciudad_AF_CodCiudad" disabled="disabled" style="width:350px">
                <option value="0" >[ Seleccione ]</option>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right" valign="top">Direccion:</td>
              <td><textarea name="AF_Direccion" cols="50" rows="5" style="width:350px"><?=$AF_Direccion?></textarea></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Página Web:</td>
              <td><input type="text" name="AL_Web" value="<?=$AL_Web?>" size="32" style="width:350px" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Correo Electronico:</td>
              <td><input type="email" name="AF_Correo_Electronico" value="<?=$AF_Correo_Electronico?>" size="32" style="width:350px" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Telefono:</td>
              <td><input type="text" name="AF_Telefono" value="<?=$AF_Telefono?>" size="32" id="AF_Telefono" style="width:350px"/></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Telefono Fax:</td>
              <td><input type="text" name="AF_Fax" value="<?=$AF_Fax?>" size="32" id="AF_Fax" style="width:350px" /></td>
            </tr>
            </table>
        </td>
      </tr>
</table>
</div>
<div id="tabs-2">
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
  <tr>
    <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Llene el formulario para Registrar a los contactos de su Empresa</td>
  </tr>
  <tr>
    <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
  </tr>
  <tr>
  	<td width="415"><br>
    <table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro"><tr align="center"><td>Nro</td>
    <td width="168">Cedula / Pasaporte:</td><td width="168">Nombre:</td><td width="168">Apellido:</td><td width="168">Cargo:</td></tr></table>
    	<div id="campos">

			<?php
            if ($canRS1>0){
				$a=0;
                for($w=0; $w<$canRS1; $w++){
					$a++;
                    $id 		= $objConexion->obtenerElemento($RS1,$w,'id');
                    $NU_Cedula 		= $objConexion->obtenerElemento($RS1,$w,'NU_Cedula');
                    $AL_Nombre 		= $objConexion->obtenerElemento($RS1,$w,'AL_Nombre');
                    $AL_Apellido 	= $objConexion->obtenerElemento($RS1,$w,'AL_Apellido');
                    $AF_Cargo		= $objConexion->obtenerElemento($RS1,$w,'AF_Cargo');

echo '<table  width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro"><tr><td>&nbsp;'.$a.'<input type="hidden" name="id'.$w.'" id="id'.$w.'" value="'.$id.'">&nbsp;</td><td><input type="text" name="NU_Cedula'.$w.'" value="'.$NU_Cedula.'"></td><td><input type="text" name="AL_Nombre'.$w.'" value="'.$AL_Nombre.'"></td><td><input type="text" name="AL_Apellido'.$w.'" value="'.$AL_Apellido.'"></td><td><input type="text" name="AF_Cargo'.$w.'" value="'.$AF_Cargo.'"></td></tr></table>';
					
                }
            }
            ?>
        </div>
    </td>
  </tr>
</td>
    <td width="1135" align="center"><input name="button" type="button" class="BotonRojo" id="button" value="[ Agregar ]" onClick="AgregarCampos(<?=$canRS1?>);" /></td>
  </tr>
  </table>
</div>
<div id="tabs-3">
<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">
  <tr bgcolor="#CCCCCC">
    <td colspan="2" class="BlancoGris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seleccione los codigos arancelarios que correspondan con las actividades de su Empresa</td>
  </tr>
  <tr>
    <td colspan="2" class="BlancoGrisClaro">&nbsp;Todos los campos con asteriscos (<span class="Rojita">&nbsp;*&nbsp;</span>) son de car&aacute;cter obligatorio.</td>
  </tr>
  <tr>
    <td width="27%" class="Textonegro">&nbsp;</td>
    <td width="73%">&nbsp;</td>
  </tr>              
  <tr>
    <td colspan="2" class="Textonegro"><?php echo hacerlistaCodArancel(0, $_SESSION['AF_RIF']); ?>
      </td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="Textonegro" style="text-align:center"><input name="Evento" type="submit" class="BotonRojo"  value="[ Guardar ]" id="Evento">
      <input name="button2" type="button" class="BotonRojo" id="button2" value="[ Cancelar ]" onClick="javascript:window.location='../centralView.php'" />
      <input type="hidden" name="cant_contac" id="cant_contac" value="">
      <input name="origen" type="hidden" id="origen" value="editEmp">
      <input name="AF_RIF" type="hidden" id="AF_RIF" value="<?=$_SESSION['AF_RIF']?>"></td>
    </tr>
  </table>
</div>
</form>
</div>
</body>
</html>