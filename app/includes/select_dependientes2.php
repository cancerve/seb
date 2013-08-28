<?php 
	require_once('../controller/sessionController.php'); 
	require_once('../model/citaEmpresaModel.php'); 
	require_once('../model/empresaModel.php'); 
	require_once('../model/empresaContModel.php'); 	
?>

<?php
	$action = $_GET['action'];
///////////////////////////////////////////////////////// PRIMER AJAX
	if ($action==1){
		$objCitaEmpresa		= new CitaEmpresa;
		$rsCitaEmpresa		= $objCitaEmpresa->buscar($objConexion,$_GET["opcion"]);
		$cantCitaEmpresa 	= $objConexion->cantidadRegistros($rsCitaEmpresa);

?>	
<select name="<?=$_GET['idSelectDestino']?>" id="<?=$_GET['idSelectDestino']?>"  style="width:250px" onChange="cargaContenido3(2,this.id,'empresa_contacto_NU_Cedula_Reporta',<?=$_GET["opcion"]?>)">
<?php		
		echo "<option value=''>[ Seleccione ]</option>";
		for($i=0;$i<$cantCitaEmpresa;$i++){
			  $value 	= $objConexion->obtenerElemento($rsCitaEmpresa,$i,"empresa_AF_RIF");
			  $des		= $objConexion->obtenerElemento($rsCitaEmpresa,$i,"AF_Razon_Social");
			  echo "<option value=".$value." ".$selected.">".$des."</option>";
		}  
		echo "</select>";
	}
///////////////////////////////////////////////////////// SEGUNDO AJAX	
	if ($action==2){
		$objCitaEmpresa		= new CitaEmpresa;
		$rsCitaEmpresa		= $objCitaEmpresa->buscar($objConexion,$_GET["cita_NU_Cita"]);
		$cantCitaEmpresa 	= $objConexion->cantidadRegistros($rsCitaEmpresa);

		for($i=0;$i<$cantCitaEmpresa;$i++){
			$AF_RIF 	= $objConexion->obtenerElemento($rsCitaEmpresa,$i,"empresa_AF_RIF");
			if($AF_RIF != $_GET["opcion"]){
				$AF_RIF_Contraparte = $AF_RIF;	
			}
		}		
			
		
		$objEmpresaCont		= new EmpresaCont;
		$rsEmpresaCont		= $objEmpresaCont->listarXempresa($objConexion,$_GET["opcion"]);
		$cantEmpresaCont 	= $objConexion->cantidadRegistros($rsEmpresaCont);
		
		echo '<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro"><tr><td width="360">Nombre del Representante de la Empresa que Reporta:</td><td>';
?>	
	<select name="<?=$_GET['idSelectDestino']?>" id="<?=$_GET['idSelectDestino']?>"  style="width:250px">
<?php		
		echo "<option value=''>[ Seleccione ]</option>";
		for($i=0;$i<$cantEmpresaCont;$i++){
			  $value	= $objConexion->obtenerElemento($rsEmpresaCont,$i,"NU_Cedula");
			  $des 		= $objConexion->obtenerElemento($rsEmpresaCont,$i,"AL_Nombre");
			  $des     .= ' '.$objConexion->obtenerElemento($rsEmpresaCont,$i,"AL_Apellido");
			  echo "<option value=".$value." ".$selected.">".$des."</option>";
		}  
		echo "</select></td></tr>";
	

		$rsEmpresaCont		= $objEmpresaCont->listarXempresa($objConexion,$AF_RIF_Contraparte);
		$cantEmpresaCont 	= $objConexion->cantidadRegistros($rsEmpresaCont);
		echo '<tr><td>Nombre del Representante de la Empresa Contraparte:</td><td>';
?>	
	<select name="empresa_contacto_NU_Cedula_Contraparte" id="empresa_contacto_NU_Cedula_Contraparte"  style="width:250px">
<?php		
		echo "<option value=''>[ Seleccione ]</option>";
		for($i=0;$i<$cantEmpresaCont;$i++){
			  $value	= $objConexion->obtenerElemento($rsEmpresaCont,$i,"NU_Cedula");
			  $des 		= $objConexion->obtenerElemento($rsEmpresaCont,$i,"AL_Nombre");
			  $des     .= ' '.$objConexion->obtenerElemento($rsEmpresaCont,$i,"AL_Apellido");

			  echo "<option value=".$value." ".$selected.">".$des."</option>";
		}  
		echo "</select>";
		echo '<input type="hidden" name="AF_RIF_Contraparte" id="AF_RIF_Contraparte" value="'.$AF_RIF_Contraparte.'">';	
		echo '</td></tr><tr><td valign="top">La  empresa contraparte manifestó interés </td><td><input type="radio" name="BI_Interes" id="radio" value="1"><label for="BI_Interes">Si &nbsp;&nbsp;<input type="radio" name="BI_Interes" id="radio2" value="0">No </label></td></tr></table>';
	}	
	
?>

