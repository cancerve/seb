<?php 
class EmpresaCont{
	private $id;
	private $NU_Cedula;
	private $empresa_AF_RIF;
	private $AL_Nombre;
	private $AL_Apellido;
	private $AF_Cargo;

	function insertar($objConexion,$NU_Cedula,$empresa_AF_RIF,$AL_Nombre,$AL_Apellido,$AF_Cargo){
		$this->generarNuevo($objConexion);
		$this->NU_Cedula=$NU_Cedula;
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$this->AL_Nombre=$AL_Nombre;
		$this->AL_Apellido=$AL_Apellido;
		$this->AF_Cargo=$AF_Cargo;

		$query="INSERT INTO empresa_contacto (id,NU_Cedula,empresa_AF_RIF,AL_Nombre,AL_Apellido,AF_Cargo)
				VALUES
				(".$this->id.",'".$this->NU_Cedula."','".$this->empresa_AF_RIF."','".$this->AL_Nombre."','".$this->AL_Apellido."','".$this->AF_Cargo."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function update($objConexion,$id,$NU_Cedula,$empresa_AF_RIF,$AL_Nombre,$AL_Apellido,$AF_Cargo){
		$this->id=$id;
		$this->NU_Cedula=$NU_Cedula;
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$this->AL_Nombre=$AL_Nombre;
		$this->AL_Apellido=$AL_Apellido;
		$this->AF_Cargo=$AF_Cargo;
		
		$query="UPDATE empresa_contacto SET
				NU_Cedula='".$this->NU_Cedula."',
				empresa_AF_RIF='".$this->empresa_AF_RIF."',
				AL_Nombre='".$this->AL_Nombre."',
				AL_Apellido='".$this->AL_Apellido."',
				AF_Cargo='".$this->AF_Cargo."'
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function delete($objConexion,$id){
		$this->id=$id;
		
		$query="DELETE FROM empresa_contacto
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM empresa_contacto";
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
				FROM empresa_contacto
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM empresa_contacto AS E
				ORDER BY id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarXempresa($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF = $empresa_AF_RIF;
		$query="SELECT *
				FROM empresa_contacto AS E
				WHERE empresa_AF_RIF = '".$this->empresa_AF_RIF."'
				ORDER BY id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
		
	function obtenerUltimoId($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM empresa_contacto";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		
		return $this->id;		
	}
		
	function getId(){
		return $this->id;
	}
}
?>