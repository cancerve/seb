<?php 
class Usuario{
	private $id;
	private $AF_Usuario;
	private $empresa_AF_RIF;
	private $AF_Clave;
	private $AL_NombreApellido;
	private $AF_Correo;
	private $rol;

		function setAF_Usuario($AF_Usuario)
		{
			$this->AF_Usuario=strtolower(trim($AF_Usuario));	
		}
		
		function setAF_Clave($AF_Clave)
		{
			$this->AF_Clave=md5(trim($AF_Clave));	
		}
		
		function validarUsuario($objConexion,$AF_Usuario,$AF_Clave)
		{
			$this->setAF_Usuario($AF_Usuario);
			$this->setAF_Clave($AF_Clave);
			$query="SELECT * 
					FROM usuario 
					WHERE 
					AF_Usuario='".$this->AF_Usuario."' 
					AND 
					AF_Clave='".$this->AF_Clave."'";
			$resUsuario=$objConexion->ejecutar($query);
			
			if ($objConexion->cantidadRegistros($resUsuario)>0)
				return true;
			else
				return false;
		}
	
		function buscarUsuario($objConexion,$AF_Usuario){
			$this->AF_Usuario=$AF_Usuario;
			$query="SELECT *
					FROM usuario
					WHERE AF_Usuario='".$this->AF_Usuario."'";
			$resultado=$objConexion->ejecutar($query);
			return $resultado;		
		}

	
	function insertar($objConexion,$AF_Usuario,$empresa_AF_RIF,$AF_Clave,$AL_NombreApellido,$AF_Correo,$rol){
		$this->generarNuevo($objConexion);
		$this->AF_Usuario=strtolower(trim($AF_Usuario));
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$this->AF_Clave=md5(trim($AF_Clave));
		$this->AL_NombreApellido=$AL_NombreApellido;
		$this->AF_Correo=$AF_Correo;
		$this->rol=$rol;		

		$query="INSERT INTO usuario
				(id,AF_Usuario,empresa_AF_RIF,AF_Clave,AL_NombreApellido,AF_Correo,rol)
				VALUES
				(".$this->id.",'".$this->AF_Usuario."','".$this->empresa_AF_RIF."','".$this->AF_Clave."','".$this->AL_NombreApellido."','".$this->AF_Correo."',".$this->rol.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$id,$AF_Usuario,$empresa_AF_RIF,$AF_Clave,$AL_NombreApellido,$AF_Correo,$rol){
		$this->id=$id;
		$this->AF_Usuario=strtolower(trim($AF_Usuario));
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$this->AF_Clave=md5(trim($AF_Clave));
		$this->AL_NombreApellido=$AL_NombreApellido;
		$this->AF_Correo=$AF_Correo;
		$this->rol=$rol;		
		
		$query="UPDATE usuario SET
				AF_Usuario='".$this->AF_Usuario."',
				empresa_AF_RIF='".$this->empresa_AF_RIF."',
				AF_Clave='".$this->AF_Clave."',
				AL_NombreApellido='".$this->AL_NombreApellido."',
				AF_Clave='".$this->AF_Clave."',
				rol='".$this->rol."'								
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM usuario";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->id++;
		return;
	}
	
	function listar($objConexion){
		$query="SELECT *
				FROM usuario
				ORDER BY AF_Usuario ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
			
	function getLibCodigo(){
		return $this->id;
	}
	
	
}
?>