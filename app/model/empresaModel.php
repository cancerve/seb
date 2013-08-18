<?php 
class Empresa{
	private $id;
	private $AF_RIF;	
	private $ciudad_AF_CodCiudad;
	private $pais_AL_CodPais;	
	private $AF_Clasificacion_Empresa;
	private $AF_Razon_Social;
	private $AF_Direccion;
	private $AL_Web;
	private $AF_Correo_Electronico;
	private $AF_Telefono;			
	private $AF_Fax;	

	function insertarRIF($objConexion,$AF_RIF){
			$this->generarNuevo($objConexion);
			$this->AF_RIF=$AF_RIF;
	
			$query="INSERT INTO empresa (id,AF_RIF)
					VALUES
					(".$this->id.",'".$this->AF_RIF."')";
			$resultado=$objConexion->ejecutar($query);
			return true;
		}


	function insertar($objConexion,$AF_RIF,$ciudad_AF_CodCiudad,$pais_AL_CodPais,$AF_Clasificacion_Empresa,$AF_Razon_Social,$AF_Direccion,$AL_Web,$AF_Correo_Electronico,$AF_Telefono,$AF_Fax){
		$this->generarNuevo($objConexion);
		$this->AF_RIF=$AF_RIF;
		$this->ciudad_AF_CodCiudad=$ciudad_AF_CodCiudad;				
		$this->pais_AL_CodPais=$pais_AL_CodPais;
		$this->AF_Clasificacion_Empresa=$AF_Clasificacion_Empresa;
		$this->AF_Razon_Social=$AF_Razon_Social;
		$this->AF_Direccion=$AF_Direccion;
		$this->AL_Web=$AL_Web;
		$this->AF_Correo_Electronico=$AF_Correo_Electronico;
		$this->AF_Telefono=$AF_Telefono;
		$this->AF_Fax=$AF_Fax;

		$query="INSERT INTO empresa (id,AF_RIF,ciudad_AF_CodCiudad,pais_AL_CodPais,AF_Clasificacion_Empresa,AF_Razon_Social,AF_Direccion,AL_Web,AF_Correo_Electronico,AF_Telefono,AF_Fax)
				VALUES
				(".$this->id.",'".$this->AF_RIF."','".$this->ciudad_AF_CodCiudad."','".$this->pais_AL_CodPais."','".$this->AF_Clasificacion_Empresa."','".$this->AF_Razon_Social."','".$this->AF_Direccion."','".$this->AL_Web."','".$this->AF_Correo_Electronico."','".$this->AF_Telefono."','".$this->AF_Fax."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function actualizar($objConexion,$AF_RIF,$ciudad_AF_CodCiudad,$pais_AL_CodPais,$AF_Clasificacion_Empresa,$AF_Razon_Social,$AF_Direccion,$AL_Web,$AF_Correo_Electronico,$AF_Telefono,$AF_Fax){
		$this->AF_RIF					= $AF_RIF;
		$this->ciudad_AF_CodCiudad		= $ciudad_AF_CodCiudad;				
		$this->pais_AL_CodPais			= $pais_AL_CodPais;
		$this->AF_Clasificacion_Empresa	= $AF_Clasificacion_Empresa;
		$this->AF_Razon_Social			= $AF_Razon_Social;
		$this->AF_Direccion				= $AF_Direccion;
		$this->AL_Web					= $AL_Web;
		$this->AF_Correo_Electronico	= $AF_Correo_Electronico;
		$this->AF_Telefono				= $AF_Telefono;
		$this->AF_Fax					= $AF_Fax;
		
		$query="UPDATE empresa SET
				ciudad_AF_CodCiudad='".$this->ciudad_AF_CodCiudad."',				
				pais_AL_CodPais='".$this->pais_AL_CodPais."',
				AF_Clasificacion_Empresa='".$this->AF_Clasificacion_Empresa."',
				AF_Razon_Social='".$this->AF_Razon_Social."',
				AF_Direccion='".$this->AF_Direccion."',
				AL_Web='".$this->AL_Web."',
				AF_Correo_Electronico='".$this->AF_Correo_Electronico."',
				AF_Telefono='".$this->AF_Telefono."',
				AF_Fax='".$this->AF_Fax."'				
				WHERE AF_RIF='".$this->AF_RIF."'";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->id=0;
		$query="SELECT MAX(id) as id
				FROM empresa";
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
				FROM empresa
				WHERE id=".$this->id;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarXrif($objConexion,$AF_RIF){
		$this->AF_RIF=$AF_RIF;
		$query="SELECT E.*, P.AL_Pais, C.AL_Ciudad
				FROM empresa AS E
				LEFT JOIN pais AS P ON (E.pais_AL_CodPais=P.AL_CodPais)
				LEFT JOIN ciudad AS C ON (E.ciudad_AF_CodCiudad=C.AF_CodCiudad)
				WHERE AF_RIF='".$this->AF_RIF."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	
	
	function buscarXEventXcod($objConexion,$AF_CodEvento){
		$this->AF_CodEvento=$AF_CodEvento;
		$query="SELECT E.*
				FROM empresa_cod_arancel AS EMCA
				LEFT JOIN empresa AS E ON 
						(EMCA.empresa_AF_RIF=E.AF_RIF)
				INNER JOIN evento_cod_arancel AS EVCA ON 
						(EVCA.cod_arancel_AL_CodArancel=EMCA.cod_arancel_AL_CodArancel AND EVCA.evento_AF_CodEvento='".$this->AF_CodEvento."')
				INNER JOIN evento_paisparticipante AS EP ON 
						(E.pais_AL_CodPais=EP.pais_AL_CodPais AND EP.evento_AF_CodEvento='".$this->AF_CodEvento."')
				GROUP BY E.AF_RIF";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}


	function buscarXEventXempXcod($objConexion,$AF_CodEvento,$AF_RIF,$codigos){
		
		$this->AF_CodEvento	= $AF_CodEvento;
		$this->AF_RIF		= $AF_RIF;
		$this->codigos		= $codigos;
		
		$query="SELECT EP.BI_Status, E.AF_RIF, E.pais_AL_CodPais, E.AF_Razon_Social, E.AF_Clasificacion_Empresa, E.AL_Web
				FROM empresa_postulada AS EP
				LEFT JOIN empresa AS E ON 
						(EP.empresa_AF_RIF=E.AF_RIF)
				LEFT JOIN empresa_cod_arancel AS EMCA ON
						(EMCA.empresa_AF_RIF=EP.empresa_AF_RIF)
				WHERE EP.BI_Status=4 AND E.AF_RIF!='".$this->AF_RIF."' AND EP.evento_AF_CodEvento='".$this->AF_CodEvento."' AND (".$this->codigos.")	        
				GROUP BY EP.empresa_AF_RIF";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarCandiXcod($objConexion,$AF_CodEvento){
		$this->AF_CodEvento=$AF_CodEvento;
		$query="SELECT EPP.BI_Status, E.*
				FROM empresa_cod_arancel AS EMCA
				LEFT JOIN empresa AS E ON 
						(EMCA.empresa_AF_RIF=E.AF_RIF)
				LEFT JOIN empresa_postulada AS EPP ON
						(EPP.empresa_AF_RIF=EMCA.empresa_AF_RIF)
				INNER JOIN evento_cod_arancel AS EVCA ON 
						(EVCA.cod_arancel_AL_CodArancel=EMCA.cod_arancel_AL_CodArancel AND EVCA.evento_AF_CodEvento='".$this->AF_CodEvento."')
				INNER JOIN evento_paisparticipante AS EP ON 
						(E.pais_AL_CodPais=EP.pais_AL_CodPais AND EP.evento_AF_CodEvento='".$this->AF_CodEvento."') 
				WHERE EPP.BI_Status = 1 and EPP.evento_AF_CodEvento='".$this->AF_CodEvento."'
				GROUP BY E.AF_RIF";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function buscarPostuXcod($objConexion,$AF_CodEvento){
		$this->AF_CodEvento = $AF_CodEvento;
		$query="SELECT EPP.BI_Status, E.*
				FROM empresa_cod_arancel AS EMCA
				LEFT JOIN empresa AS E ON 
					(EMCA.empresa_AF_RIF=E.AF_RIF)
				LEFT JOIN empresa_postulada AS EPP ON
					(EPP.empresa_AF_RIF=EMCA.empresa_AF_RIF)
				INNER JOIN evento_cod_arancel AS EVCA ON 
					(EVCA.cod_arancel_AL_CodArancel=EMCA.cod_arancel_AL_CodArancel AND EVCA.evento_AF_CodEvento='".$this->AF_CodEvento."')
				INNER JOIN evento_paisparticipante AS EP ON 
					(E.pais_AL_CodPais=EP.pais_AL_CodPais AND EP.evento_AF_CodEvento='".$this->AF_CodEvento."') 
				WHERE EPP.BI_Status = 2 and EPP.evento_AF_CodEvento='".$this->AF_CodEvento."'
				GROUP BY E.AF_RIF";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function buscarPostuXevento($objConexion,$AF_CodEvento){
		$this->AF_CodEvento = $AF_CodEvento;
		$query="SELECT EPP.BI_Status, E.*
				FROM empresa AS E
				LEFT JOIN empresa_postulada AS EPP ON
						(EPP.empresa_AF_RIF=E.AF_RIF)
				WHERE EPP.BI_Status = 2 and EPP.evento_AF_CodEvento='".$this->AF_CodEvento."'
				GROUP BY E.AF_RIF";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}	
	
	function listar($objConexion){
		$query="SELECT *
				FROM empresa
				ORDER BY id ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function obtenerUltimoRIF($objConexion){
		$query="SELECT MAX(id) as id, AF_RIF
				FROM empresa";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->AF_RIF=$objConexion->obtenerElemento($resultado,0,'AF_RIF');
		}
		
		return $this->AF_RIF;		
	}
		
	function getId(){
		return $this->id;
	}
}
?>