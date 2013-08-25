<?php 
class Evento{
	private $AF_CodEvento;
	private $ciudad_AF_CodCiudad;
	private $pais_AL_CodPais;
	private $AF_Nombre_Evento;
	private $AF_Lugar;
	private $FE_Fecha_Desde;
	private $FE_Fecha_Hasta;
	private $F1_FechaDesde;
	private $F1_FechaHasta;
	private $F2_FechaDesde;
	private $F2_FechaHasta;
	private $F3_FechaDesde;
	private $F3_FechaHasta;
	private $F4_FechaDesde;
	private $F4_FechaHasta;
	private $F5_FechaDesde;
	private $F5_FechaHasta;
	private $TI_Hora_Inicio_Am;
	private $TI_Hora_Final_Am;
	private $TI_Hora_Inicio_Pm;
	private $TI_Hora_Final_Pm;
	private $NU_Minutos_x_Cita;
	private $NU_Minutos_Entre_Cita;
	private $NU_Cantidad_Mesa;
	private $BI_Activo;			

	function insertar($objConexion,$ciudad_AF_CodCiudad,$pais_AL_CodPais,$AF_Nombre_Evento,$AF_Lugar,$FE_Fecha_Desde,$FE_Fecha_Hasta,$F1_FechaDesde,$F1_FechaHasta,$F2_FechaDesde,$F2_FechaHasta,$F3_FechaDesde,$F3_FechaHasta,$F4_FechaDesde,$F4_FechaHasta,$F5_FechaDesde,$F5_FechaHasta,$TI_Hora_Inicio_Am,$TI_Hora_Final_Am,$TI_Hora_Inicio_Pm,$TI_Hora_Final_Pm,$NU_Minutos_x_Cita,$NU_Minutos_Entre_Cita,$NU_Cantidad_Mesa,$BI_Activo){
		
		$this->generarNuevo($objConexion);
		$this->ciudad_AF_CodCiudad	= $ciudad_AF_CodCiudad;
		$this->pais_AL_CodPais		= $pais_AL_CodPais;
		$this->AF_Nombre_Evento		= $AF_Nombre_Evento;
		$this->AF_Lugar				= $AF_Lugar;
		$this->FE_Fecha_Desde		= $FE_Fecha_Desde;
		$this->FE_Fecha_Hasta		= $FE_Fecha_Hasta;
		$this->F1_FechaDesde		= $F1_FechaDesde;
		$this->F1_FechaHasta		= $F1_FechaHasta;		
		$this->F2_FechaDesde		= $F2_FechaDesde;
		$this->F2_FechaHasta		= $F2_FechaHasta;
		$this->F3_FechaDesde		= $F3_FechaDesde;
		$this->F3_FechaHasta		= $F3_FechaHasta;
		$this->F4_FechaDesde		= $F4_FechaDesde;
		$this->F4_FechaHasta		= $F4_FechaHasta;
		$this->F5_FechaDesde		= $F5_FechaDesde;
		$this->F5_FechaHasta		= $F5_FechaHasta;
		$this->TI_Hora_Inicio_Am	= $TI_Hora_Inicio_Am;
		$this->TI_Hora_Final_Am		= $TI_Hora_Final_Am;
		$this->TI_Hora_Inicio_Pm	= $TI_Hora_Inicio_Pm;
		$this->TI_Hora_Final_Pm		= $TI_Hora_Final_Pm;
		$this->NU_Minutos_x_Cita	= $NU_Minutos_x_Cita;
		$this->NU_Minutos_Entre_Cita= $NU_Minutos_Entre_Cita;
		$this->NU_Cantidad_Mesa		= $NU_Cantidad_Mesa;
		$this->BI_Activo			= $BI_Activo;

		$query="INSERT INTO evento (AF_CodEvento,ciudad_AF_CodCiudad,pais_AL_CodPais,AF_Nombre_Evento,AF_Lugar,FE_Fecha_Desde,FE_Fecha_Hasta,F1_FechaDesde,F1_FechaHasta,F2_FechaDesde,F2_FechaHasta,F3_FechaDesde,F3_FechaHasta,F4_FechaDesde,F4_FechaHasta,F5_FechaDesde,F5_FechaHasta,TI_Hora_Inicio_Am,TI_Hora_Final_Am,TI_Hora_Inicio_Pm,TI_Hora_Final_Pm,NU_Minutos_x_Cita,NU_Minutos_Entre_Cita,NU_Cantidad_Mesa,BI_Activo)
				VALUES
				('".$this->AF_CodEvento."','".$this->ciudad_AF_CodCiudad."','".$this->pais_AL_CodPais."','".$this->AF_Nombre_Evento."','".$this->AF_Lugar."','".$this->FE_Fecha_Desde."','".$this->FE_Fecha_Hasta."','".$this->F1_FechaDesde."','".$this->F1_FechaHasta."','".$this->F2_FechaDesde."','".$this->F2_FechaHasta."','".$this->F3_FechaDesde."','".$this->F3_FechaHasta."','".$this->F4_FechaDesde."','".$this->F4_FechaHasta."','".$this->F5_FechaDesde."','".$this->F5_FechaHasta."','".$this->TI_Hora_Inicio_Am."','".$this->TI_Hora_Final_Am."','".$this->TI_Hora_Inicio_Pm."','".$this->TI_Hora_Final_Pm."','".$this->NU_Minutos_x_Cita."','".$this->NU_Minutos_Entre_Cita."',".$this->NU_Cantidad_Mesa.",".$this->BI_Activo.")";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	private function generarNuevo($objConexion){
		$this->AF_CodEvento='E-0';
		$query="SELECT AF_CodEvento
				FROM evento
				ORDER BY id DESC
				LIMIT 1";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->AF_CodEvento=$objConexion->obtenerElemento($resultado,0,0);
		}
		$cod = explode("-", $this->AF_CodEvento);
		$nuevo = $cod['1'] + 1; 
		$this->AF_CodEvento = 'E-'.$nuevo;
		return $this->AF_CodEvento;
	}
	
	function buscar($objConexion,$AF_CodEvento){
		$this->AF_CodEvento = $AF_CodEvento;
		$query="SELECT E.*, P.AL_Pais, C.AL_Ciudad
				FROM evento AS E
				LEFT JOIN pais AS P ON (P.AL_CodPais=E.pais_AL_CodPais)
				LEFT JOIN ciudad AS C ON (C.AF_CodCiudad=E.ciudad_AF_CodCiudad)
				WHERE AF_CodEvento='".$this->AF_CodEvento."'";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listar($objConexion){
		$query="SELECT E.id, E.AF_CodEvento, E.pais_AL_CodPais, P.AL_Pais, C.AL_Ciudad, E.AF_Nombre_Evento, E.FE_Fecha_Desde, E.FE_Fecha_Hasta
				FROM evento AS E
				LEFT JOIN pais AS P ON (P.AL_CodPais=E.pais_AL_CodPais)
				LEFT JOIN ciudad AS C ON (C.AF_CodCiudad=E.ciudad_AF_CodCiudad)
				ORDER BY AF_CodEvento DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}

	function listarSOLOCONcandidatas($objConexion){
		$query="SELECT E.AF_CodEvento, E.AF_Nombre_Evento
				FROM evento AS E
				INNER JOIN empresa_postulada AS EP ON (EP.evento_AF_CodEvento=E.AF_CodEvento)
				WHERE BI_Status = 1
				GROUP BY E.AF_CodEvento
				ORDER BY AF_Nombre_Evento ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarSOLOCONpartici($objConexion,$AF_RIF){
		$this->AF_RIF = $AF_RIF;
		$query="SELECT E.AF_CodEvento, E.AF_Nombre_Evento, EP.empresa_AF_RIF, EP.BI_Status
				FROM evento AS E
					INNER JOIN empresa_postulada AS EP ON 
							(EP.evento_AF_CodEvento=E.AF_CodEvento)
				WHERE EP.BI_Status = '4' AND EP.empresa_AF_RIF='".$this->AF_RIF."'
				GROUP BY E.AF_CodEvento
				ORDER BY AF_Nombre_Evento ASC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}		
	
	function obtenerUltimoId($objConexion){
		$this->AF_CodEvento=0;
		$query="SELECT AF_CodEvento
				FROM evento
				ORDER BY id DESC
				LIMIT 1";
		$resultado=$objConexion->ejecutar($query);
		if($objConexion->cantidadRegistros($resultado)>0){
			$this->AF_CodEvento=$objConexion->obtenerElemento($resultado,0,0);
		}
		
		return $this->AF_CodEvento;		
	}

	function getId(){
		return $this->AF_CodEvento;
	}
}
?>