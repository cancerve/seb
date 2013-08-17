<?php 
class EventoHorario{
	private $AF_CodHorario;
	private $evento_AF_CodEvento;
	private $FE_Fecha;
	private $TI_Hora_Inicio_Am;
	private $TI_Hora_Final_Am;
	private $TI_Hora_Inicio_Pm;
	private $TI_Hora_Final_Pm;
	private $NU_Minutos_x_Cita;
	private $NU_Minutos_Entre_Cita;			

	function insertar($objConexion,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio_Am,$TI_Hora_Final_Am,$TI_Hora_Inicio_Pm,$TI_Hora_Final_Pm,$NU_Minutos_x_Cita,$NU_Minutos_Entre_Cita){
		$this->generarNuevo($objConexion);
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$this->FE_Fecha=$FE_Fecha;
		$this->TI_Hora_Inicio_Am=$TI_Hora_Inicio_Am;
		$this->TI_Hora_Final_Am=$TI_Hora_Final_Am;
		$this->TI_Hora_Inicio_Pm=$TI_Hora_Inicio_Pm;
		$this->TI_Hora_Final_Pm=$TI_Hora_Final_Pm;
		$this->NU_Minutos_x_Cita=$NU_Minutos_x_Cita;
		$this->NU_Minutos_Entre_Cita=$NU_Minutos_Entre_Cita;

		$query="INSERT INTO evento_horario (AF_CodHorario,evento_AF_CodEvento,FE_Fecha,TI_Hora_Inicio_Am,TI_Hora_Final_Am,TI_Hora_Inicio_Pm,TI_Hora_Final_Pm,NU_Minutos_x_Cita,NU_Minutos_Entre_Cita)
				VALUES
				(".$this->AF_CodHorario.",'".$this->evento_AF_CodEvento."','".$this->FE_Fecha."','".$this->TI_Hora_Inicio_Am."','".$this->TI_Hora_Final_Am."','".$this->TI_Hora_Inicio_Pm."','".$this->TI_Hora_Final_Pm."',".$this->NU_Minutos_x_Cita.",".$this->NU_Minutos_Entre_Cita.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$AF_CodHorario,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio_Am,$TI_Hora_Final_Am,$TI_Hora_Inicio_Pm,$TI_Hora_Final_Pm,$NU_Minutos_x_Cita,$NU_Minutos_Entre_Cita){
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$this->FE_Fecha=$FE_Fecha;
		$this->TI_Hora_Inicio_Am=$TI_Hora_Inicio_Am;
		$this->TI_Hora_Final_Am=$TI_Hora_Final_Am;
		$this->TI_Hora_Inicio_Pm=$TI_Hora_Inicio_Pm;
		$this->TI_Hora_Final_Pm=$TI_Hora_Final_Pm;
		$this->NU_Minutos_x_Cita=$NU_Minutos_x_Cita;
		$this->NU_Minutos_Entre_Cita=$NU_Minutos_Entre_Cita;
		
		$query="UPDATE evento_horario SET
				ciudad_id='".$this->ciudad_id."',
				pais_id='".$this->pais_id."',
				AF_Nombre_Evento='".$this->AF_Nombre_Evento."',
				AF_Lugar='".$this->AF_Lugar."',
				FE_Fecha_Desde=".$this->FE_Fecha_Desde."
				FE_Fecha_Hasta='".$this->FE_Fecha_Hasta."',
				NU_Cantidad_Mesa='".$this->NU_Cantidad_Mesa."',
				BI_Activo=".$this->BI_Activo."
				WHERE AF_CodHorario=".$this->AF_CodHorario;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->AF_CodHorario=0;
		$query="SELECT MAX(AF_CodHorario) as AF_CodHorario
				FROM evento_horario";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->AF_CodHorario=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->AF_CodHorario++;
		return;
	}
	
	function buscar($objConexion,$AF_CodHorario){
		$this->AF_CodHorario=$AF_CodHorario;
		$query="SELECT *
				FROM evento_horario
				WHERE AF_CodHorario='".$this->AF_CodHorario."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM evento_horario
				ORDER BY AF_CodHorario ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function obtenerUltimoId($objConexion){
		$this->AF_CodHorario=0;
		$query="SELECT MAX(AF_CodHorario) as AF_CodHorario
				FROM evento_horario";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		
		return $this->AF_CodHorario;		
	}
		
	function getId(){
		return $this->AF_CodHorario;
	}
}
?>