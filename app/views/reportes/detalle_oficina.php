<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/oficinaCModel.php');
require('../../includes/pdf/fpdf.php'); 

$objOficinaC = new OficinaC();
?>
<?php

	$AF_CodOficina = $_GET['AF_CodOficina'];
	$RS = $objOficinaC->buscar($objConexion,$AF_CodOficina);
	
	$AF_CodOficina = $objConexion->obtenerElemento($RS,0,"AF_CodOficina");
	$AL_Pais = $objConexion->obtenerElemento($RS,0,"AL_Pais");
	$AL_Nombre_Oficina = $objConexion->obtenerElemento($RS,0,"AL_Nombre_Oficina");
	$AF_Direccion = $objConexion->obtenerElemento($RS,0,"AF_Direccion");
	$AL_Persona_Contacto = $objConexion->obtenerElemento($RS,0,"AL_Persona_Contacto");	
	$NU_Telefono = $objConexion->obtenerElemento($RS,0,"NU_Telefono");
	$NU_Fax = $objConexion->obtenerElemento($RS,0,"NU_Fax");
	$AF_Correo = $objConexion->obtenerElemento($RS,0,"AF_Correo");
?>
<?php
///////////////////////////////////////////[ CONVERSION A PDF ]///////////////////////////////

class PDF extends FPDF{
	function Header(){
		$this->Image('../../images/logo.jpg',10,10,80,0);
		$this->Ln(30);						
		$this->SetFillColor(232,232,232);	
		$this->Cell(0,0,'',1,0,'C');
		$this->Ln(7);								
		$this->SetFont('Arial','B',15);
		$this->Cell(0,0,'HOJA DETALLE DE LA OFICINA COMERCIAL',0,0,'C');		
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
$pdf->Ln(1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(22,10,'CODIGO: '.$AF_CodOficina,0,0,'L');
$pdf->Ln(7);
$pdf->Cell(65,10,'NOMBRE: '.ucwords(strtolower(utf8_decode($AL_Nombre_Oficina))),0,0,'L');
$pdf->Ln(10);
$pdf->SetFillColor(232,232,232);	
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Pais: ',1,0,'L',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Pais))),1,0,'L');
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Direción: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AF_Direccion))),1,0,'L');	
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Persona Contacto: ',1,0,'L',1);		
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucfirst(strtolower(utf8_decode($AL_Persona_Contacto))),1,0,'L');		
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Telefono: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$NU_Telefono,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Telefono Fax: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$NU_Fax,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Correo Electronico: ',1,0,'L',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$AF_Correo,1,0,'L');
$pdf->Ln(10);
$pdf->Output();

?>