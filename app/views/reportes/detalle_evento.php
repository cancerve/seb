<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/eventoModel.php');
require_once('../../model/eventoPaisParticiModel.php');
require_once('../../model/eventoCodArancelModel.php');
require_once('../../includes/fecha.php');
require('../../includes/pdf/fpdf.php'); 

$objEvento 				= new Evento();
$objEventoPaisPartici 	= new EventoPaisPartici();
$objEventoCA 			= new EventoCodArancel();
?>
<?php
$AF_CodEvento 		= $_GET['AF_CodEvento'];

$RS = $objEvento->buscar($objConexion,$AF_CodEvento);

$AL_Pais 			= $objConexion->obtenerElemento($RS,0,"AL_Pais");
$AL_Ciudad 			= $objConexion->obtenerElemento($RS,0,"AL_Ciudad");
$AF_Nombre_Evento	= $objConexion->obtenerElemento($RS,0,"AF_Nombre_Evento");
$AF_Lugar 			= $objConexion->obtenerElemento($RS,0,"AF_Lugar");	
$FE_Fecha_Desde 	= cambiarFormatoE2($objConexion->obtenerElemento($RS,0,"FE_Fecha_Desde"));
$FE_Fecha_Hasta 	= cambiarFormatoE2($objConexion->obtenerElemento($RS,0,"FE_Fecha_Hasta"));

$RS1 = $objEventoPaisPartici->listarXevento($objConexion,$AF_CodEvento);
$cantRS1 = $objConexion->cantidadRegistros($RS1);	

$RS2 = $objEventoCA->listarXevento($objConexion,$AF_CodEvento);
$cantRS2 = $objConexion->cantidadRegistros($RS2);
	
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
		$this->Cell(0,0,'HOJA DETALLE DEL EVENTO',0,0,'C');		
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
$pdf->Cell(22,10,'Codigo del Evento: '.strtoupper($AF_CodEvento),0,0,'L');
$pdf->Ln(7);
$pdf->Cell(65,10,'Nombre del Evento: '.strtoupper(utf8_decode($AF_Nombre_Evento)),0,0,'L');
$pdf->Ln(10);
$pdf->SetFillColor(232,232,232);	
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Pais Anfitrion: ',1,0,'L',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Pais))),1,0,'L');
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Ciudad: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Ciudad))),1,0,'L');	
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Lugar: ',1,0,'L',1);		
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AF_Lugar))),1,0,'L');		
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Inicio del Evento: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$FE_Fecha_Desde,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Fin del Evento: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$FE_Fecha_Hasta,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Paises Invitados a Participar',0,0,'C');	
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
//ESPACIO 100% DE LA TABLA = 190 EN VERTICAL////////////////////////
$pdf->Cell(10,7,'Nro',1,0,'C',1);
$pdf->Cell(0,7,'Paises',1,0,'C',1);
$pdf->Ln(7);	
$pdf->SetFont('Arial','',10);
for($i=0;$i<$cantRS1;$i++){
	$AL_Pais = $objConexion->obtenerElemento($RS1,$i,"AL_Pais");

	$pdf->Cell(10,7,$i+1,1,0,'C',1);
	$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Pais))),1,0,'L');
	$pdf->Ln(7);	
}
$pdf->Ln(3);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Codigos Arancelarios vinculados al Evento',0,0,'C');	
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,7,'Nro',1,0,'C',1);
$pdf->Cell(20,7,'Codigo',1,0,'C',1);
$pdf->Cell(0,7,'Descripcion',1,0,'C',1);
$pdf->Ln(7);	
$pdf->SetFont('Arial','',10);
for($j=0;$j<$cantRS2;$j++){
	$AL_CodArancel = $objConexion->obtenerElemento($RS2,$j,"AL_CodArancel");
	$AF_Arancel = $objConexion->obtenerElemento($RS2,$j,"AF_Arancel");
	$pdf->Cell(10,7,$j+1,1,0,'C',1);
	$pdf->Cell(20,7,$AL_CodArancel,1,0,'L');
	$pdf->Cell(0,7,substr(ucwords(strtolower(utf8_decode($AF_Arancel))),0,95),1,0,'L');
	$pdf->Ln(7);	
}
$pdf->Ln(10);	
$pdf->Output();

?>