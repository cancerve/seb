<?php
	require_once('sessionController.php'); 
	require_once('../model/resultadoModel.php'); 
	
	$objResultado 		= new Resultado();	
?>
<?php

if(isset($_REQUEST["origen"])){
/////////////////// AGENDAR NUEVA CITA ////////////////
	if($_REQUEST["origen"]=='Resultado'){
		$cita_NU_Cita 							= $_REQUEST["cita_NU_Cita"];
		$AF_RIF_Reporta 						= $_REQUEST["AF_RIF_Reporta"];
		$empresa_contacto_NU_Cedula_Reporta 	= $_REQUEST["empresa_contacto_NU_Cedula_Reporta"];
		$AF_RIF_Contraparte 					= $_REQUEST["AF_RIF_Contraparte"];
		$empresa_contacto_NU_Cedula_Contraparte = $_REQUEST["empresa_contacto_NU_Cedula_Contraparte"];
		$BI_Interes 							= $_REQUEST["BI_Interes"];
		$BS_Monto1 								= $_REQUEST["BS_Monto1"];
		$BI_Tipo_Negocio1 						= $_REQUEST["BI_Tipo_Negocio1"];
		$AF_Otro1 								= $_REQUEST["AF_Otro1"];
		$BS_Monto2 								= $_REQUEST["BS_Monto2"];
		$BI_Tipo_Negocio2 						= $_REQUEST["BI_Tipo_Negocio2"];
		$AF_Otro2 								= $_REQUEST["AF_Otro2"];
		$BS_Monto3 								= $_REQUEST["BS_Monto3"];
		$BI_Tipo_Negocio3 						= $_REQUEST["BI_Tipo_Negocio3"];
		$AF_Otro3 								= $_REQUEST["AF_Otro3"];
		$AF_Producto 							= $_REQUEST["AF_Producto"];	
		$AF_Descripcion 						= $_REQUEST["AF_Descripcion"];

		$objResultado->insertar($objConexion,$AF_RIF_Reporta,$empresa_contacto_NU_Cedula_Reporta,$AF_RIF_Contraparte,$empresa_contacto_NU_Cedula_Contraparte,$BI_Interes,$BS_Monto1,$BI_Tipo_Negocio1,$AF_Otro1,$BS_Monto2,$BI_Tipo_Negocio2,$AF_Otro2,$BS_Monto3,$BI_Tipo_Negocio3,$AF_Otro3,$AF_Producto,$AF_Descripcion);

		$mensaje='Resultado de Negocio registrado Exitosamente.';
		header("Location: ../views/resultado/index.php?mensaje=$mensaje");
	}
}
?>