<?php 
class CitaEmpresa{
	private $empresa_AF_RIF;
	private $cita_NU_Cita;
	private $BI_Invita;

	function insertar($objConexion,$empresa_AF_RIF,$cita_NU_Cita,$BI_Invita){
		$this->empresa_AF_RIF	= $empresa_AF_RIF;
		$this->cita_NU_Cita		= $cita_NU_Cita;
		$this->BI_Invita		= $BI_Invita;

		$query="INSERT INTO cita_empresa (empresa_AF_RIF,cita_NU_Cita,BI_Invita)
				VALUES
				('".$this->empresa_AF_RIF."',".$this->cita_NU_Cita.",'".$this->BI_Invita."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function listarXempresa($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF = $empresa_AF_RIF;
		$query="SELECT C.*
				FROM cita_empresa AS C
				WHERE C.empresa_AF_RIF = '".$this->empresa_AF_RIF."' or C.BI_Invita = '".$this->empresa_AF_RIF."'";
		
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function listarSoloAgenda($objConexion,$AF_RIF){
		$this->AF_RIF = $AF_RIF;
		$query="SELECT E.AF_CodEvento, E.AF_Nombre_Evento
				FROM cita_empresa AS CE
				LEFT JOIN cita AS C
					ON (C.NU_Cita=CE.cita_NU_Cita)
				LEFT JOIN evento AS E
					ON (E.AF_CodEvento=C.evento_AF_CodEvento)
				WHERE empresa_AF_RIF='".$this->AF_RIF."' or BI_Invita='".$this->AF_RIF."'
				GROUP BY E.AF_CodEvento";
		
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}		
}
?>