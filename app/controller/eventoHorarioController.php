<?php
	require_once('sessionController.php'); 
	require_once('../model/eventoHorarioModel.php'); 
	require_once('../includes/fecha.php'); 	
	
	
	$objEventoHorario = new EventoHorario();
?>
<?php
	if(isset($_POST["EventoHorario"])){
		if(!isset($_POST["id"])){
			for($i=0; $_POST['dias_evento'] > $i; $i++){
				$AF_CodEvento = $_POST['AF_CodEvento'];
				$FE_Fecha = cambiarFormatoE2($_POST['FE_Fecha'.$i]);
				$TI_Hora_Inicio_Am = $_POST['TI_Hora_Inicio_Am'.$i];
				$TI_Hora_Final_Am = $_POST['TI_Hora_Final_Am'.$i];
				$TI_Hora_Inicio_Pm = cambiarTime($_POST['TI_Hora_Inicio_Pm'.$i]);
				$TI_Hora_Final_Pm = cambiarTime($_POST['TI_Hora_Final_Pm'.$i]);
				$NU_Minutos_x_Cita = $_POST['NU_Minutos_x_Cita'.$i];			
				$NU_Minutos_Entre_Cita = $_POST['NU_Minutos_Entre_Cita'.$i];
	
				$objEventoHorario->insertar($objConexion,$AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio_Am,$TI_Hora_Final_Am,$TI_Hora_Inicio_Pm,$TI_Hora_Final_Pm,$NU_Minutos_x_Cita,$NU_Minutos_Entre_Cita);
			}
		}
		else{
			/*
			$objEvento->actualizar($objConexion,$_POST["id"],$_POST["ciudad_id"],$_POST["pais_id"],$_POST["AF_Nombre_Evento"],$_POST["AF_Lugar"],$_POST["FE_Fecha_Desde"],$_POST["FE_Fecha_Hasta"],$_POST["NU_Cantidad_Mesa"],$_POST["BI_Activo"]);
			$mensaje="Registro actualizado correctamente";
			*/
			echo 'ACTUALIZAR';
		}
		$mensaje="Registro de Evento Exitoso.";
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=../views/configuracion/evento/index.php?mensaje=$mensaje\">";
	}
?>