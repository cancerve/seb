<?php 
class OficinaC{
	private $id;
	private $pais_id;
	private $AL_Nombre_Oficina;
	private $AF_Direccion;
	private $AL_Persona_Contacto;
	private $NU_Telefono;
	private $NU_Fax;
	private $AF_Correo;			

	function insertar($objConexion,$pais_id,$AL_Nombre_Oficina,$AF_Direccion,$AL_Persona_Contacto,$NU_Telefono,$NU_Fax,$AF_Correo){
		$this->generarNuevo($objConexion);
		$this->pais_id=$pais_id;
		$this->AL_Nombre_Oficina=$AL_Nombre_Oficina;
		$this->AF_Direccion=$AF_Direccion;
		$this->AL_Persona_Contacto=$AL_Persona_Contacto;
		$this->NU_Telefono=$NU_Telefono;
		$this->NU_Fax=$NU_Fax;
		$this->AF_Correo=$AF_Correo;

		$query="INSERT INTO oficina_comercial (id,pais_id,AL_Nombre_Oficina,AF_Direccion,AL_Persona_Contacto,NU_Telefono,NU_Fax,AF_Correo)
				VALUES
				(".$this->id.",".$this->pais_id.",".$this->AL_Nombre_Oficina.",'".$this->AF_Direccion."','".$this->AL_Persona_Contacto."','".$this->NU_Telefono."','".$this->NU_Fax.",".$this->AF_Correo.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$id,$pais_id,$AL_Nombre_Oficina,$AF_Direccion,$AL_Persona_Contacto,$NU_Telefono,$NU_Fax,$AF_Correo){
		$this->pais_id=$pais_id;
		$this->AL_Nombre_Oficina=$AL_Nombre_Oficina;
		$this->AF_Direccion=$AF_Direccion;
		$this->AL_Persona_Contacto=$AL_Persona_Contacto;
		$this->NU_Telefono=$NU_Telefono;
		$this->NU_Fax=$NU_Fax;
		$this->AF_Correo=$AF_Correo;
		
		$query="UPDATE oficina_comercial SET
				pais_id='".$this->pais_id."',
				AL_Nombre_Oficina='".$this->AL_Nombre_Oficina."',
				AF_Direccion='".$this->AF_Direccion."',
				AL_Persona_Contacto='".$this->AL_Persona_Contacto."',
				NU_Telefono=".$this->NU_Telefono."
				NU_Fax='".$this->NU_Fax."',
				AF_Correo='".$this->AF_Correo."',
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM oficina_comercial";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->id++;
		return;
	}
	
	function buscar($objConexion,$AF_CodOficina){
		$this->AF_CodOficina=$AF_CodOficina;
		$query="SELECT O.*, P.AL_Pais
				FROM oficina_comercial AS O
				LEFT JOIN pais AS P ON (O.pais_AL_CodPais=P.AL_CodPais)
				WHERE AF_CodOficina='".$this->AF_CodOficina."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM oficina_comercial AS E
				ORDER BY id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarXpais($objConexion,$pais_AL_CodPais){
		$this->pais_AL_CodPais=$pais_AL_CodPais;
		$query="SELECT O.*, P.AL_Pais AS pais_oficina
				FROM oficina_comercial AS O
				LEFT JOIN pais AS P ON (P.AL_CodPais=O.pais_AL_CodPais)
				WHERE O.pais_AL_CodPais = '".$this->pais_AL_CodPais."'
				ORDER BY O.AL_Nombre_Oficina ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
		
	function obtenerUltimoId($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM oficina_comercial";
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