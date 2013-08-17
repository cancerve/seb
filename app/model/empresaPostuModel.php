<?php 
class EmpresaPostu{
	private $id;
	private $evento_AF_CodEvento;
	private $empresa_AF_RIF;
	private $BI_Status;

	function insertar($objConexion,$evento_AF_CodEvento,$empresa_AF_RIF,$BI_Status){
		
		$this->generarNuevo($objConexion);
		$this->evento_AF_CodEvento	= $evento_AF_CodEvento;
		$this->empresa_AF_RIF		= $empresa_AF_RIF;
		$this->BI_Status			= $BI_Status;		

		$query="INSERT INTO empresa_postulada
				(id,evento_AF_CodEvento,empresa_AF_RIF,BI_Status)
				VALUES
				(".$this->id.",'".$this->evento_AF_CodEvento."','".$this->empresa_AF_RIF."',".$this->BI_Status.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$id,$evento_AF_CodEvento,$empresa_AF_RIF,$BI_Status){

		$this->id					= $id;
		$this->evento_AF_CodEvento	= $evento_AF_CodEvento;
		$this->empresa_AF_RIF		= $empresa_AF_RIF;
		$this->BI_Status			= $BI_Status;
		
		$query="UPDATE empresa_postulada SET
				evento_AF_CodEvento='".$this->evento_AF_CodEvento."',
				empresa_AF_RIF='".$this->empresa_AF_RIF."',
				BI_Status='".$this->BI_Status."'
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actStatus($objConexion,$evento_AF_CodEvento,$empresa_AF_RIF,$BI_Status){
		$this->evento_AF_CodEvento 	= $evento_AF_CodEvento;
		$this->BI_Status			= $BI_Status;
		$this->empresa_AF_RIF		= $empresa_AF_RIF;
		$query="UPDATE empresa_postulada SET
				BI_Status=".$this->BI_Status."
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."' and evento_AF_CodEvento = '".$this->evento_AF_CodEvento."'";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM empresa_postulada";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->id=$objConexion->obtenerElemento($resultado,0,0);
		}
		$this->id++;
		return;
	}
	
	function buscar($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$query="SELECT *
				FROM empresa_postulada
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarXrif($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF = $empresa_AF_RIF;
		$query="SELECT EP.*, E.AF_Nombre_Evento
				FROM empresa_postulada AS EP
				LEFT JOIN evento AS E ON 
					(EP.evento_AF_CodEvento=E.AF_CodEvento)
				WHERE EP.empresa_AF_RIF='".$this->empresa_AF_RIF."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXrifXstatus($objConexion,$empresa_AF_RIF,$status){
		$this->empresa_AF_RIF = $empresa_AF_RIF;
		$this->status = $status;
		$query="SELECT EP.*, E.AF_Nombre_Evento
				FROM empresa_postulada AS EP
				LEFT JOIN evento AS E ON 
					(EP.evento_AF_CodEvento=E.AF_CodEvento)
				WHERE EP.empresa_AF_RIF='".$this->empresa_AF_RIF."' and BI_Status=".$this->status;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXstatus($objConexion,$empresa_AF_RIF,$status){
		$this->empresa_AF_RIF	= $empresa_AF_RIF;
		$this->status 			= $status;
		$query="SELECT *
				FROM empresa_postulada
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."' and BI_Status = ".$this->status;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarXempresaXevento($objConexion,$empresa_AF_RIF,$evento_AF_CodEvento){

		$this->empresa_AF_RIF		= $empresa_AF_RIF;
		$this->evento_AF_CodEvento 	= $evento_AF_CodEvento;

		$query="SELECT *
				FROM empresa_postulada
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."' and evento_AF_CodEvento='".$this->evento_AF_CodEvento."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	

	function buscarXEmpresa($objConexion,$empresa_AF_RIF){
		$this->empresa_AF_RIF=$empresa_AF_RIF;
		$query="SELECT *
				FROM empresa_postulada
				WHERE empresa_AF_RIF='".$this->empresa_AF_RIF."'
				ORDER BY id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXevento($objConexion,$evento_AF_CodEvento){
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$query="SELECT EE.AF_Nombre_Evento, EE.pais_AL_CodPais, P.AL_Pais, EE.ciudad_AF_CodCiudad, C.AL_Ciudad, EE.FE_Fecha_Desde, EE.FE_Fecha_Hasta, EE.NU_Cantidad_Mesa, E.AF_RIF, E.AF_Razon_Social, E.AF_Clasificacion_Empresa, E.AF_Telefono, E.AF_Fax, E.AF_Correo_Electronico
				FROM empresa_postulada AS EP
				LEFT JOIN evento AS EE ON (EP.evento_AF_CodEvento=EE.AF_CodEvento)
				LEFT JOIN empresa AS E ON (EP.empresa_AF_RIF=E.AF_RIF)
				LEFT JOIN pais AS P ON (EE.pais_AL_CodPais=P.AL_CodPais)
				LEFT JOIN ciudad AS C ON (EE.ciudad_AF_CodCiudad=C.AF_CodCiudad)
				WHERE EP.evento_AF_CodEvento='".$this->evento_AF_CodEvento."'
				ORDER BY EP.id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXcandidatas($objConexion,$evento_AF_CodEvento){
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$query="SELECT EP.id, E.AF_RIF, E.AF_Razon_Social, E.AF_Clasificacion_Empresa, E.AF_Telefono, E.AF_Fax, E.AF_Correo_Electronico
				FROM empresa_postulada AS EP
				LEFT JOIN empresa AS E ON 
						(EP.empresa_AF_RIF=E.AF_RIF)
				WHERE EP.evento_AF_CodEvento = '".$this->evento_AF_CodEvento."' AND EP.BI_Status = 1
				ORDER BY EP.id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	
		
	function buscarPostuXevento($objConexion,$evento_AF_CodEvento){
		$this->evento_AF_CodEvento = $evento_AF_CodEvento;
		$query="SELECT E.*
				FROM empresa_postulada AS EP
				LEFT JOIN empresa AS E ON (EP.empresa_AF_RIF=E.AF_RIF)
				WHERE EP.evento_AF_CodEvento='".$this->evento_AF_CodEvento."' AND EP.BI_Status=2
				ORDER BY EP.id DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}		
			
	function listar($objConexion){
		$query="SELECT *
				FROM empresa_postulada
				ORDER BY id ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
		
	function getLibCodigo(){
		return $this->id;
	}
	
	
}
?>