<?php ini_set('display_errors', 1); ?> 
<?php
	require_once('sessionController.php'); 
	require_once('../model/citaModel.php'); 
	require_once('../model/citaEmpresaModel.php'); 	
	
	$objCita 		= new Cita();	
	$objCitaEmpresa = new CitaEmpresa();
?>
<?php

if(isset($_REQUEST["origen"])){
/////////////////// AGENDAR NUEVA CITA ////////////////
	if($_REQUEST["origen"]=='Citar'){

		$evento_AF_CodEvento	= $_REQUEST["evento_AF_CodEvento"];
		$FE_Fecha				= $_REQUEST["FE_Fecha"];
		$TI_Hora_Inicio 		= $_REQUEST["TI_Hora_Inicio"];
		$TI_Hora_Final			= $_REQUEST["TI_Hora_Final"];
		$NU_Mesa				= $objCita->generarMesa($objConexion,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final);

		$AF_RIF_Invita			= $_REQUEST["AF_RIF_Invita"];
		$AF_RIF_Invitado		= $_REQUEST["AF_RIF_Invitado"];

		$objCita->insertar($objConexion,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final,$NU_Mesa);

		$NU_Cita = $objCita->ultCita($objConexion);
		
		$objCitaEmpresa->insertar($objConexion,$AF_RIF_Invita,$NU_Cita,$AF_RIF_Invitado);
		$objCitaEmpresa->insertar($objConexion,$AF_RIF_Invitado,$NU_Cita,0);
		
		$mensaje='Empresa Citada Exitosamente.';
		header("Location: ../views/agendacion/citas/index.php?mensaje=$mensaje");
	}
/////////////////// ACEPTAR CITA ////////////////	
	if($_REQUEST["origen"]=='Aceptar'){

		$NU_Cita	= $_REQUEST["NU_Cita"];

		$objCita->aceptarCita($objConexion,$NU_Cita);
		
		$mensaje='Cita Confirmada Exitosamente.';
		header("Location: ../views/agendacion/citas/index.php?mensaje=$mensaje");
	}
/////////////////// RECHAZAR CITA ////////////////	
	if($_REQUEST["origen"]=='Rechazar'){

		$NU_Cita	= $_REQUEST["NU_Cita"];

		$objCita->rechazarCita($objConexion,$NU_Cita);
		
		$mensaje='Cita Rechazada Exitosamente.';
		header("Location: ../views/agendacion/citas/index.php?mensaje=$mensaje");
	}	
		
}
?>