<?php 
require_once('../../controller/sessionController.php'); 
require_once('../../model/empresaModel.php');
require_once('../../model/empresaContModel.php');
require_once('../../model/empresaCodArancelModel.php');
require('../../includes/pdf/fpdf.php'); 

$objEmpresa = new Empresa();
$objEmpresaCont = new EmpresaCont();
$objEmpresaCA = new EmpresaCodArancel();
?>
<?php
	$AF_RIF = $_GET['AF_RIF'];
	$RS = $objEmpresa->buscarXrif($objConexion,$AF_RIF);
	$empresa_id = $objConexion->obtenerElemento($RS,0,"id");	
	$AF_Rif = $objConexion->obtenerElemento($RS,0,"AF_Rif");
	$AF_Razon_Social = $objConexion->obtenerElemento($RS,0,"AF_Razon_Social");
	$AF_Clasificacion_Empresa = $objConexion->obtenerElemento($RS,0,"AF_Clasificacion_Empresa");
	$AL_Pais = $objConexion->obtenerElemento($RS,0,"AL_Pais");
	$AL_Ciudad = $objConexion->obtenerElemento($RS,0,"AL_Ciudad");	
	$AF_Direccion = $objConexion->obtenerElemento($RS,0,"AF_Direccion");
	$AL_Web = $objConexion->obtenerElemento($RS,0,"AL_Web");
	$AF_Correo_Electronico = $objConexion->obtenerElemento($RS,0,"AF_Correo_Electronico");
	$AF_Telefono = $objConexion->obtenerElemento($RS,0,"AF_Telefono");
	$AF_Fax = $objConexion->obtenerElemento($RS,0,"AF_Fax");

$RS1 = $objEmpresaCont->listarXempresa($objConexion,$AF_RIF);
$cantRS1 = $objConexion->cantidadRegistros($RS1);	

//echo $empresa_id;
$RS2 = $objEmpresaCA->listarXempresa($objConexion,$AF_RIF);
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
		$this->Cell(0,0,'HOJA DETALLE DE LA EMPRESA',0,0,'C');		
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
$pdf->Cell(22,10,'RIF / IDN: '.$AF_Rif,0,0,'L');
$pdf->Ln(7);
$pdf->Cell(65,10,'Razon Social: '.utf8_decode($AF_Razon_Social),0,0,'L');
$pdf->Ln(10);
$pdf->SetFillColor(232,232,232);	
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Clasificacion de la Empresa: ',1,0,'L',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AF_Clasificacion_Empresa))),1,0,'L');
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Pais: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Pais))),1,0,'L');	
$pdf->Ln(7);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(55,7,'Ciudad: ',1,0,'L',1);		
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AL_Ciudad))),1,0,'L');		
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Direccion: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,ucwords(strtolower(utf8_decode($AF_Direccion))),1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Pagina Web: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$AL_Web,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Correo Electronico: ',1,0,'L',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$AF_Correo_Electronico,1,0,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);		
$pdf->Cell(55,7,'Telefono: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$AF_Telefono,1,0,'L');	
$pdf->SetFont('Arial','B',11);
$pdf->Ln(7);
$pdf->Cell(55,7,'Telefono Fax: ',1,0,'L',1);	
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,7,$AF_Fax,1,0,'L');	
$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Personas Contacto de la Empresa',0,0,'C');	
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
//ESPACIO 100% DE LA TABLA = 190 EN VERTICAL////////////////////////
$pdf->Cell(8,7,'Nro',1,0,'C',1);
$pdf->Cell(37,7,'Cedula / Pasaporte',1,0,'C',1);
$pdf->Cell(51,7,'Nombre',1,0,'C',1);
$pdf->Cell(51,7,'Apellido',1,0,'C',1);
$pdf->Cell(43,7,'Cargo',1,0,'C',1);	
$pdf->Ln(7);	
$pdf->SetFont('Arial','',10);
for($i=0;$i<$cantRS1;$i++){
	$NU_Cedula = $objConexion->obtenerElemento($RS1,$i,"NU_Cedula");
	$AL_Nombre = $objConexion->obtenerElemento($RS1,$i,"AL_Nombre");
	$AL_Apellido = $objConexion->obtenerElemento($RS1,$i,"AL_Apellido");
	$AF_Cargo = $objConexion->obtenerElemento($RS1,$i,"AF_Cargo");

	$pdf->Cell(8,7,$i+1,1,0,'C',1);
	$pdf->Cell(37,7,$NU_Cedula,1,0,'L');
	$pdf->Cell(51,7,ucwords(strtolower(utf8_decode($AL_Nombre))),1,0,'L');
	$pdf->Cell(51,7,ucwords(strtolower(utf8_decode($AL_Apellido))),1,0,'L');
	$pdf->Cell(43,7,ucwords(strtolower(utf8_decode($AF_Cargo))),1,0,'L');	
	$pdf->Ln(7);	
}
$pdf->Ln(3);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Codigos Arancelarios vinculados a la Empresa',0,0,'C');	
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(8,7,'Nro',1,0,'C',1);
$pdf->Cell(15,7,'Codigo',1,0,'C',1);
$pdf->Cell(0,7,'Descripcion',1,0,'C',1);
$pdf->Ln(7);	
$pdf->SetFont('Arial','',10);
for($j=0;$j<$cantRS2;$j++){
	$AL_CodArancel = $objConexion->obtenerElemento($RS2,$j,"AL_CodArancel");
	$AF_Arancel = $objConexion->obtenerElemento($RS2,$j,"AF_Arancel");
	$pdf->Cell(8,7,$j+1,1,0,'C',1);
	$pdf->Cell(15,7,$AL_CodArancel,1,0,'L');
	$pdf->Cell(0,7,substr(ucwords(strtolower(utf8_decode($AF_Arancel))),0,95),1,0,'L');
	$pdf->Ln(7);	
}
$pdf->Ln(10);	
$pdf->Output();

?>