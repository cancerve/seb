<?php 
	require_once('../controller/sessionController.php'); 
	require_once('../model/citaEmpresaModel.php'); 
	require_once('../model/empresaModel.php'); 
	require_once('../model/empresaContModel.php'); 	
?>

<?php
	$objCitaEmpresa		= new CitaEmpresa;
	$rsCitaEmpresa		= $objCitaEmpresa->buscar($objConexion,$_GET["opcion"]);
	$cantCitaEmpresa 	= $objConexion->cantidadRegistros($rsCitaEmpresa);

	echo "<select name='AF_RIF_Reporta' id='AF_RIF_Reporta' style='width:250px'>";
	echo "<option value=''>[ Seleccione ]</option>";
	
	for($i=0;$i<$cantCitaEmpresa;$i++){
		  $value 	= $objConexion->obtenerElemento($rsCitaEmpresa,$i,"empresa_AF_RIF");
		  $des		= $objConexion->obtenerElemento($rsCitaEmpresa,$i,"AF_Razon_Social");
		  echo "<option value=".$value." ".$selected.">".$des."</option>";
	}  
	echo "</select>";
/*
listadoSelects[0]="cita_NU_Cita";
listadoSelects[1]="AF_RIF_Reporta";
listadoSelects[2]="empresa_contacto_NU_Cedula_Reporta";
listadoSelects[3]="empresa_contacto_NU_Cedula_Contraparte";
*/

?>

