<?php 
class Cita{
	private $NU_Cita;
	private $evento_AF_CodEvento;
	private $FE_Fecha;
	private $TI_Hora_Inicio;
	private $TI_Hora_Final;
	private $NU_Mesa;

	function insertar($objConexion,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final,$NU_Mesa){
		$this->generarNuevo($objConexion);
		$this->evento_AF_CodEvento	= $evento_AF_CodEvento;
		$this->FE_Fecha				= $FE_Fecha;
		$this->TI_Hora_Inicio		= $TI_Hora_Inicio;
		$this->TI_Hora_Final		= $TI_Hora_Final;
		$this->NU_Mesa				= $NU_Mesa;

		$query="INSERT INTO cita (NU_Cita,evento_AF_CodEvento,FE_Fecha,TI_Hora_Inicio,TI_Hora_Final,NU_Mesa)
				VALUES
				(".$this->NU_Cita.",'".$this->evento_AF_CodEvento."','".$this->FE_Fecha."','".$this->TI_Hora_Inicio."','".$this->TI_Hora_Final."',".$this->NU_Mesa.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function aceptarCita($objConexion,$NU_Cita){
		$this->NU_Cita = $NU_Cita;
		$query = "UPDATE cita SET aprobada=1 
				  WHERE NU_Cita=".$this->NU_Cita;	
		
		$resultado = $objConexion->ejecutar($query);
		return true;
	}
	
	function rechazarCita($objConexion,$NU_Cita){
		$this->NU_Cita = $NU_Cita;
		$query = "DELETE FROM cita 
				  WHERE NU_Cita=".$this->NU_Cita;	
		
		$resultado = $objConexion->ejecutar($query);
		
		$query = "DELETE FROM cita_empresa 
				  WHERE cita_NU_Cita = ".$this->NU_Cita;	
		
		$resultado = $objConexion->ejecutar($query);		
		return true;
	}	
	
	private function generarNuevo($objConexion){
		$this->NU_Cita=0;
		$query="SELECT MAX(NU_Cita) as NU_Cita
				FROM cita";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->NU_Cita=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->NU_Cita++;
		return;
	}

	function generarMesa($objConexion,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final){
		$this->FE_Fecha 		= $FE_Fecha;
		$this->TI_Hora_Inicio 	= $TI_Hora_Inicio;
		$this->TI_Hora_Final 	= $TI_Hora_Final;
		$this->NU_Mesa			= 0;
		
		$query="SELECT MAX(NU_Mesa) as NU_Mesa
				FROM cita
				WHERE FE_Fecha = '".$this->FE_Fecha."' and TI_Hora_Inicio = '".$this->TI_Hora_Inicio."' and TI_Hora_Final = '".$this->TI_Hora_Final."'";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->NU_Mesa=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->NU_Mesa++;
		return $this->NU_Mesa;
	}
		
	function buscar($objConexion,$NU_Cita){
		$this->NU_Cita=$NU_Cita;
		$query="SELECT *
				FROM cita
				WHERE NU_Cita='".$this->NU_Cita."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarXresponder($objConexion,$AF_RIF){
		$this->AF_RIF	= $AF_RIF;
		$query="SELECT C.*, CE.*
				FROM cita AS C
				LEFT JOIN cita_empresa AS CE
					ON (CE.cita_NU_Cita=C.NU_Cita)
				WHERE CE.BI_Invita='".$this->AF_RIF."' and C.aprobada IS NULL";
		
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXresponder2($objConexion,$AF_RIF,$Evento){
		$this->AF_RIF	= $AF_RIF;
		$this->Evento 	= $Evento;
		$query="SELECT C.*, CE.*, E.AF_Razon_Social
				FROM cita AS C
				LEFT JOIN cita_empresa AS CE
					ON (CE.cita_NU_Cita=C.NU_Cita)
				LEFT JOIN empresa AS E
					ON (E.AF_RIF=CE.empresa_AF_RIF)
				WHERE CE.BI_Invita='".$this->AF_RIF."' and C.aprobada IS NULL".$this->Evento;
		
		$resultado=$objConexion->ejecutar($query);
		
		return $resultado;		
	}
		
	function mostrarAgenda($objConexion,$AF_RIF,$Evento){
		$this->AF_RIF	= $AF_RIF;
		$this->Evento 	= $Evento;
		$query="SELECT C.*, CE.*, E.AF_Razon_Social AS Invita, E2.AF_Razon_Social  AS Invitado
				FROM cita AS C
				LEFT JOIN cita_empresa AS CE
						ON (CE.cita_NU_Cita=C.NU_Cita)
				LEFT JOIN empresa AS E
						ON (E.AF_RIF=CE.empresa_AF_RIF)
				LEFT JOIN empresa AS E2
						ON (E2.AF_RIF=CE.BI_Invita)
				WHERE (CE.BI_Invita='".$this->AF_RIF."' or empresa_AF_RIF='".$this->AF_RIF."') and C.evento_AF_CodEvento='".$this->Evento."' ORDER BY FE_Fecha ASC";
		
		$resultado=$objConexion->ejecutar($query);
		
		return $resultado;		
	}

	function buscarXhorario($objConexion,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final,$AF_RIF_Invita){
		$this->evento_AF_CodEvento	= $evento_AF_CodEvento;
		$this->FE_Fecha				= $FE_Fecha;
		$this->TI_Hora_Inicio		= $TI_Hora_Inicio;
		$this->TI_Hora_Final		= $TI_Hora_Final;
		$this->AF_RIF_Invita		= $AF_RIF_Invita;
		
		$query="SELECT C.*, CE.empresa_AF_RIF, CE.BI_Invita, E.*
				FROM cita AS C
				LEFT JOIN cita_empresa AS CE ON
						(CE.cita_NU_Cita=C.NU_Cita)
				LEFT JOIN empresa AS E ON
						(E.AF_RIF=CE.BI_Invita)
				WHERE C.evento_AF_CodEvento='".$this->evento_AF_CodEvento."' and C.FE_Fecha='".$this->FE_Fecha."' and C.TI_Hora_Inicio='".$this->TI_Hora_Inicio."' and C.TI_Hora_Final='".$this->TI_Hora_Final."' and CE.empresa_AF_RIF='".$this->AF_RIF_Invita."'";

		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarXhorario2($objConexion,$evento_AF_CodEvento,$FE_Fecha,$TI_Hora_Inicio,$TI_Hora_Final,$AF_RIF_Invita){
		$this->evento_AF_CodEvento	= $evento_AF_CodEvento;
		$this->FE_Fecha				= $FE_Fecha;
		$this->TI_Hora_Inicio		= $TI_Hora_Inicio;
		$this->TI_Hora_Final		= $TI_Hora_Final;
		$this->AF_RIF_Invita		= $AF_RIF_Invita;
		
		$query="SELECT C.*, CE.empresa_AF_RIF, CE.BI_Invita, E.*
				FROM cita AS C
				LEFT JOIN cita_empresa AS CE ON
						(CE.cita_NU_Cita=C.NU_Cita)
				LEFT JOIN empresa AS E ON
						(E.AF_RIF=CE.BI_Invita)
				WHERE C.evento_AF_CodEvento='".$this->evento_AF_CodEvento."' and C.FE_Fecha='".$this->FE_Fecha."' and C.TI_Hora_Inicio='".$this->TI_Hora_Inicio."' and C.TI_Hora_Final='".$this->TI_Hora_Final."' and (CE.empresa_AF_RIF='".$this->AF_RIF_Invita."' or CE.BI_Invita='".$this->AF_RIF_Invita."'";

		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function ultCita($objConexion){
		$query="SELECT MAX(NU_Cita) as NU_Cita
				FROM cita";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->NU_Cita=$objConexion->obtenerElemento($resultado,0,0);
		}
		return $this->NU_Cita;
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM cita
				ORDER BY NU_Cita DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
}
?>