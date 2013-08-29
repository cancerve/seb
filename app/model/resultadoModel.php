<?php 
class Resultado{
	private $cita_NU_Cita;
	private $AF_RIF_Reporta;	
	private $empresa_contacto_NU_Cedula_Reporta;
	private $AF_RIF_Contraparte;	
	private $empresa_contacto_NU_Cedula_Contraparte;
	private $BI_Interes;
	private $BS_Monto1;
	private $BI_Tipo_Negocio1;
	private $AF_Otro1;
	private $BS_Monto2;
	private $BI_Tipo_Negocio2;
	private $AF_Otro2;	
	private $BS_Monto3;
	private $BI_Tipo_Negocio3;
	private $AF_Otro3;	
	private $AF_Producto;			
	private $AF_Descripcion;	

	function insertar($objConexion,$cita_NU_Cita,$AF_RIF_Reporta,$empresa_contacto_NU_Cedula_Reporta,$AF_RIF_Contraparte,$empresa_contacto_NU_Cedula_Contraparte,$BI_Interes,$BS_Monto1,$BI_Tipo_Negocio1,$AF_Otro1,$BS_Monto2,$BI_Tipo_Negocio2,$AF_Otro2,$BS_Monto3,$BI_Tipo_Negocio3,$AF_Otro3,$AF_Producto,$AF_Descripcion){
		$this->cita_NU_Cita								= $cita_NU_Cita;
		$this->AF_RIF_Reporta							= $AF_RIF_Reporta;
		$this->empresa_contacto_NU_Cedula_Reporta		= $empresa_contacto_NU_Cedula_Reporta;				
		$this->AF_RIF_Contraparte						= $AF_RIF_Contraparte;
		$this->empresa_contacto_NU_Cedula_Contraparte	= $empresa_contacto_NU_Cedula_Contraparte;
		$this->BI_Interes								= $BI_Interes;
		$this->BS_Monto1								= $BS_Monto1;
		$this->BI_Tipo_Negocio1							= $BI_Tipo_Negocio1;
		$this->AF_Otro1									= $AF_Otro1;
		$this->BS_Monto2								= $BS_Monto2;
		$this->BI_Tipo_Negocio2							= $BI_Tipo_Negocio2;
		$this->AF_Otro2									= $AF_Otro2;
		$this->BS_Monto3								= $BS_Monto3;
		$this->BI_Tipo_Negocio3							= $BI_Tipo_Negocio3;
		$this->AF_Otro3									= $AF_Otro3;
		$this->AF_Producto								= $AF_Producto;
		$this->AF_Descripcion							= $AF_Descripcion;

		$query="INSERT INTO resultado_negocio (cita_NU_Cita,AF_RIF_Reporta,empresa_contacto_NU_Cedula_Reporta,AF_RIF_Contraparte,empresa_contacto_NU_Cedula_Contraparte,BI_Interes,BS_Monto1,BI_Tipo_Negocio1,AF_Otro1,BS_Monto2,BI_Tipo_Negocio2,AF_Otro2,BS_Monto3,BI_Tipo_Negocio3,AF_Otro3,AF_Producto,AF_Descripcion)
				VALUES
				(".$this->cita_NU_Cita.",'".$this->AF_RIF_Reporta."','".$this->empresa_contacto_NU_Cedula_Reporta."','".$this->AF_RIF_Contraparte."','".$this->empresa_contacto_NU_Cedula_Contraparte."',".$this->BI_Interes.",".$this->BS_Monto1.",".$this->BI_Tipo_Negocio1.",'".$this->AF_Otro1."',".$this->BS_Monto2.",".$this->BI_Tipo_Negocio2.",'".$this->AF_Otro2."',".$this->BS_Monto3.",".$this->BI_Tipo_Negocio3.",'".$this->AF_Otro3."','".$this->AF_Producto."','".$this->AF_Descripcion."')";
		$resultado=$objConexion->ejecutar($query);
		return true;
	}
	
	function buscar($objConexion,$cita_NU_Cita){
		$this->cita_NU_Cita=$cita_NU_Cita;
		$query="SELECT *
				FROM resultado_negocio
				WHERE cita_NU_Cita=".$this->cita_NU_Cita;
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
	
	function listarXevento($objConexion,$AF_CodEvento){
		$this->AF_CodEvento = $AF_CodEvento;
		$query="SELECT R.*, C.*, E.AF_Razon_Social AS Reporta
				FROM resultado_negocio AS R
				LEFT JOIN cita AS C
					ON (C.NU_Cita=R.cita_NU_Cita)
				LEFT JOIN empresa AS E
					ON (E.AF_RIF=R.AF_RIF_Reporta)
				WHERE C.evento_AF_CodEvento='".$this->AF_CodEvento."'
				ORDER BY cita_NU_Cita DESC";
		$resultado=$objConexion->ejecutar($query);
		return $resultado;		
	}
}
?>