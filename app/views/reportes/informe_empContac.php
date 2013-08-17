<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/empresaPostuModel.php');
require('../../includes/pdf/fpdf.php'); 

$objEmpresaPostu = new EmpresaPostu();
?>
<?php

	$AF_CodEvento = $_POST['AF_CodEvento'];
	$RS = $objEmpresaPostu->buscarXevento($objConexion,$AF_CodEvento);
	$cantRS = $objConexion->cantidadRegistros($RS);
	
	$AF_Nombre_Evento = $objConexion->obtenerElemento($RS,0,"AF_Nombre_Evento");
	$AL_Pais = $objConexion->obtenerElemento($RS,0,"AL_Pais");
	$AL_Ciudad = $objConexion->obtenerElemento($RS,0,"AL_Ciudad");
	$FE_Fecha_Desde = $objConexion->obtenerElemento($RS,0,"FE_Fecha_Desde");
	$FE_Fecha_Hasta = $objConexion->obtenerElemento($RS,0,"FE_Fecha_Hasta");
?>
<?php
	$_SESSION['AF_Nombre_Evento'] = $AF_Nombre_Evento;
	$_SESSION['AL_Pais'] = $AL_Pais;
	$_SESSION['AL_Ciudad'] = $AL_Ciudad;
	$_SESSION['FE_Fecha_Desde'] = $FE_Fecha_Desde;	
	$_SESSION['FE_Fecha_Hasta'] = $FE_Fecha_Hasta;
	
?>
<?php
///////////////////////////////////////////[ CONVERSION A PDF ]///////////////////////////////

class PDF extends FPDF{
	function Header(){
		$this->Image('../../images/logo.jpg',10,10,80,0);
//		$this->SetLeftMargin(50);
		$this->SetFont('Arial','',11);
		$this->Cell(0,0,'Pais: '.utf8_decode($_SESSION['AL_Pais']),0,0,'R');				
		$this->Ln(7);						
		$this->Cell(0,0,'Ciudad: '.utf8_decode($_SESSION['AL_Ciudad']),0,0,'R');				
		$this->Ln(7);						
		$this->Cell(0,0,'Desde: '.$_SESSION['FE_Fecha_Desde'],0,0,'R');				
		$this->Ln(7);						
		$this->Cell(0,0,'Hasta: '.$_SESSION['FE_Fecha_Hasta'],0,0,'R');				
		$this->Ln(10);						
		$this->SetFillColor(232,232,232);	
		$this->Cell(0,0,'',1,0,'C');
		$this->Ln(7);								
		$this->SetFont('Arial','B',15);
		$this->Cell(0,0,'INFORME DE EMPRESAS CONTACTADAS',0,0,'C');		
		$this->Ln(7);		
		$this->Cell(0,0,$_SESSION['AF_Nombre_Evento'],0,0,'C');
		$this->Ln(7);
		$this->Cell(0,0,'',1,0,'C');
		$this->SetFillColor(0,0,0);		
		$this->Cell(70);
		
		$this->Ln(5);
	}
	function Footer()	{
		$this->SetY(-20);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');		
	}
}

//Creacin del objeto de la clase heredada

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetLeftMargin(10);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(1);
$pdf->SetFillColor(232,232,232);	
$pdf->Cell(8,7,'Nro',1,0,'C',1);
$pdf->Cell(25,7,'RIF / IDN',1,0,'C',1);
$pdf->Cell(63,7,'Razon Social',1,0,'C',1);
$pdf->Cell(25,7,'Telefono',1,0,'C',1);
$pdf->Cell(25,7,'Fax',1,0,'C',1);	
$pdf->Cell(45,7,'Correo',1,0,'C',1);		
$pdf->Ln(7);
$pdf->SetFont('Arial','',10);	
for($i=0;$i<$cantRS;$i++){
	$AF_RIF = $objConexion->obtenerElemento($RS,$i,"AF_RIF");
	$AF_Razon_Social = $objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
	$AF_Clasificacion_Empresa = $objConexion->obtenerElemento($RS,$i,"AF_Clasificacion_Empresa");
	$AF_Telefono = $objConexion->obtenerElemento($RS,$i,"AF_Telefono");
	$AF_Fax = $objConexion->obtenerElemento($RS,$i,"AF_Fax");
	$AF_Correo_Electronico = $objConexion->obtenerElemento($RS,$i,"AF_Correo_Electronico");
	$pdf->Cell(8,7,$i+1,1,0,'C',1);
	$pdf->Cell(25,7,$AF_RIF,1,0,'L');
	$pdf->Cell(63,7,ucwords(strtolower(utf8_decode($AF_Razon_Social))),1,0,'L');
	$pdf->Cell(25,7,$AF_Telefono,1,0,'L');
	$pdf->Cell(25,7,$AF_Fax,1,0,'L');	
	$pdf->Cell(45,7,$AF_Correo_Electronico,1,0,'L');
	$pdf->Ln(7);	
}
$pdf->Ln(7);	
$pdf->Output();

?>