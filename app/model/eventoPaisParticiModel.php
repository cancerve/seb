<?php 
class EventoPaisPartici{
	private $evento_AF_CodEvento;
	private $pais_AL_CodPais;

	function insertar($objConexion,$evento_AF_CodEvento,$pais_AL_CodPais){
		$this->evento_AF_CodEvento=$evento_AF_CodEvento;
		$this->pais_AL_CodPais=$pais_AL_CodPais;

		$query="INSERT INTO evento_paisparticipante
				(evento_AF_CodEvento,pais_AL_CodPais)
				VALUES
				('".$this->evento_AF_CodEvento."','".$this->pais_AL_CodPais."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function listarXevento($objConexion,$AF_CodEvento){
		$this->AF_CodEvento = $AF_CodEvento;
		$query="SELECT EPP.evento_AF_CodEvento, EPP.pais_AL_CodPais, P.AL_Pais
				FROM evento_paisparticipante AS EPP
				LEFT JOIN pais AS P ON 
					(P.AL_CodPais = EPP.pais_AL_CodPais)
				WHERE EPP.evento_AF_CodEvento = '".$this->AF_CodEvento."'
				ORDER BY EPP.pais_AL_CodPais ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarXcodpais($objConexion,$pais_AL_CodPais){
		$this->pais_AL_CodPais = $pais_AL_CodPais;
		$query="SELECT E.id, E.AF_CodEvento, E.pais_AL_CodPais, P.AL_Pais, C.AL_Ciudad, E.AF_Nombre_Evento, E.FE_Fecha_Desde, E.FE_Fecha_Hasta
				FROM evento_paisparticipante as EP
				LEFT JOIN evento AS E ON
					(E.AF_CodEvento = EP.evento_AF_CodEvento)
				LEFT JOIN pais AS P ON 
					(P.AL_CodPais = E.pais_AL_CodPais)
				LEFT JOIN ciudad AS C ON 
					(C.AF_CodCiudad = E.ciudad_AF_CodCiudad)        
				WHERE EP.pais_AL_CodPais = '".$this->pais_AL_CodPais."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarXcodpais2($objConexion,$pais_AL_CodPais, $AF_RIF){
		$this->pais_AL_CodPais = $pais_AL_CodPais;
		$this->AF_RIF = $AF_RIF;
		$query="SELECT EPOS.empresa_AF_RIF, E.id, E.AF_CodEvento, E.pais_AL_CodPais, P.AL_Pais, C.AL_Ciudad, E.AF_Nombre_Evento, E.FE_Fecha_Desde, E.FE_Fecha_Hasta
			FROM evento_paisparticipante as EP
			LEFT JOIN evento AS E ON
					(E.AF_CodEvento = EP.evento_AF_CodEvento)
			LEFT JOIN pais AS P ON 
					(P.AL_CodPais = E.pais_AL_CodPais)
			LEFT JOIN ciudad AS C ON 
					(C.AF_CodCiudad = E.ciudad_AF_CodCiudad)       
			LEFT OUTER JOIN empresa_postulada AS EPOS ON
				(EP.evento_AF_CodEvento = EPOS.evento_AF_CodEvento AND EPOS.empresa_AF_RIF = '".$this->AF_RIF."')
			WHERE EP.pais_AL_CodPais = '".$this->pais_AL_CodPais."' AND EPOS.empresa_AF_RIF IS NULL";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}			
}
?>