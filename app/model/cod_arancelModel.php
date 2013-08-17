<?php 
class CodArancel{
	private $AL_CodArancel;
	private $AF_Arancel;
	private $AL_ParentCod;

	function insertar($objConexion,$AL_CodArancel,$AF_Arancel,$AL_ParentCod){
		$this->AL_CodArancel=$AL_CodArancel;
		$this->AF_Arancel=$AF_Arancel;
		$this->AL_ParentCod=$AL_ParentCod;		

		$query="INSERT INTO cod_arancel
				(AL_CodArancel,AF_Arancel,AL_ParentCod)
				VALUES
				('".$this->AL_CodArancel."','".$this->AF_Arancel."','".$this->AL_ParentCod."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$AF_Arancel,$AL_ParentCod){
		$this->AF_Arancel=$AF_Arancel;
		$this->AL_ParentCod=$AL_ParentCod;		
		
		$query="UPDATE cod_arancel SET
				AF_Arancel='".$this->AF_Arancel."',
				AL_ParentCod='".$this->AL_ParentCod."',				
				WHERE AL_CodArancel=".$this->AL_CodArancel;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function buscar($objConexion,$AL_CodArancel){
		$this->AL_CodArancel=$AL_CodArancel;
		$query="SELECT *
				FROM cod_arancel
				WHERE AL_CodArancel='".$this->AL_CodArancel."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM cod_arancel
				ORDER BY AL_CodArancel ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function getLibCodigo(){
		return $this->AL_CodArancel;
	}

	function listaritems($objConexion,$AL_ParentCod){
		$query="SELECT * FROM cod_arancel WHERE AL_ParentCod='".$AL_ParentCod."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
}
?>