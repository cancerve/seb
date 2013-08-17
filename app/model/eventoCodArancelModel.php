<?php 
class EventoCodArancel{
	private $evento_AF_CodEvento;
	private $cod_arancel_AL_CodArancel;
	
	function insertar($objConexion,$evento_AF_CodEvento,$cod_arancel_AL_CodArancel){
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$this->cod_arancel_AL_CodArancel=$cod_arancel_AL_CodArancel;

		$query="INSERT INTO evento_cod_arancel
				(evento_AF_CodEvento,cod_arancel_AL_CodArancel)
				VALUES
				('".$this->evento_AF_CodEvento."','".$this->cod_arancel_AL_CodArancel."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM evento_cod_arancel
				ORDER BY evento_AF_CodEvento ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function listarXevento($objConexion,$evento_AF_CodEvento){
		$this->evento_AF_CodEvento = $evento_AF_CodEvento;
		$query="SELECT ECA.*, CA.AF_Arancel, CA.AL_CodArancel
				FROM evento_cod_arancel AS ECA
				LEFT JOIN cod_arancel AS CA ON
						(CA.AL_CodArancel = ECA.cod_arancel_AL_CodArancel)
				WHERE ECA.evento_AF_CodEvento = '".$this->evento_AF_CodEvento."'
				ORDER BY ECA.evento_AF_CodEvento ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	
	
}
?>