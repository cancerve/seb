<?php 
class EmpresaCodArancel{
	private $id;
	private $cod_arancel_AL_CodArancel;
	private $empresa_AF_RIF;	

	function insertar($objConexion,$cod_arancel_AL_CodArancel,$empresa_AF_RIF){
		$this->generarNuevo($objConexion);
		$this->cod_arancel_AL_CodArancel=$cod_arancel_AL_CodArancel;
		$this->empresa_AF_RIF=$empresa_AF_RIF;			

		$query="INSERT INTO empresa_cod_arancel
				(id,cod_arancel_AL_CodArancel,empresa_AF_RIF)
				VALUES
				(".$this->id.",'".$this->cod_arancel_AL_CodArancel."','".$this->empresa_AF_RIF."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$id,$cod_arancel_AL_CodArancel,$empresa_AF_RIF){
		$this->cod_arancel_AL_CodArancel=$cod_arancel_AL_CodArancel;
		$this->empresa_AF_RIF=$empresa_AF_RIF;	
		
		$query="UPDATE empresa_cod_arancel SET
				cod_arancel_AL_CodArancel=".$this->cod_arancel_AL_CodArancel.",
				empresa_AF_RIF=".$this->empresa_AF_RIF.",								
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function delete($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF=$empresa_AF_RIF;	
		
		$query="DELETE FROM empresa_cod_arancel
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."'";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}	
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM empresa_cod_arancel";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->id++;
		return;
	}
	
	function buscar($objConexion,$id){
		$this->id=$id;
		$query="SELECT *
				FROM empresa_cod_arancel
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM empresa_cod_arancel
				ORDER BY id ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function listarXempresa($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$query="SELECT CA.AL_CodArancel, CA.AF_Arancel
				FROM empresa_cod_arancel AS E
				LEFT JOIN cod_arancel AS CA ON (E.cod_arancel_AL_CodArancel=CA.AL_CodArancel)
				WHERE E.empresa_AF_RIF='".$this->empresa_AF_RIF."'
				ORDER BY E.id ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function getLibCodigo(){
		return $this->id;
	}
	
}
?>