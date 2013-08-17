<?php 
class Pais{
	private $id;
	private $AL_Codigo;
	private $AL_Pais;

	function insertar($objConexion,$AL_Codigo,$AL_Pais){
		$this->generarNuevo($objConexion);
		$this->AL_Codigo=$AL_Codigo;
		$this->AL_Pais=$AL_Pais;

		$query="INSERT INTO pais
				(id,AL_Codigo,AL_Pais)
				VALUES
				('".$this->id."','".$this->AL_Codigo."','".$this->AL_Pais."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$id,$AL_Codigo,$AL_Pais){
		$this->AL_Codigo=$AL_Codigo;
		$this->AL_Pais=$AL_Pais;
		
		$query="UPDATE pais SET
				AL_Codigo='".$this->AL_Codigo."',
				AL_Pais='".$this->AL_Pais."',
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM pais";
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
				FROM pais
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM pais
				ORDER BY AL_Pais ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar2($objConexion,$opcionSeleccionada){
		$query="SELECT id, AL_Ciudad
				FROM ciudad
				pais_id='".$opcionSeleccionada."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	
	function getLibCodigo(){
		return $this->id;
	}
	
	
}
?>