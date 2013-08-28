<?php 
require('../../includes/pdf/fpdf.php'); 
require_once('../../includes/funciones.php');
require_once('../../controller/sessionController.php'); 
require_once('../../model/citaModel.php');
require_once('../../model/empresaModel.php');
require_once('../../model/empresaContModel.php');
require_once('../../model/eventoModel.php');


$objCita 		= new Cita();
$objEmpresaCont = new EmpresaCont();
$objEvento		= new Evento();
$objEmpresa		= new Empresa();
?>
<?php
///////////////////// VARIABLES ///////////////////////////////
	$AF_RIF 		= $_GET['AF_RIF'];
	$AF_CodEvento 	= $_GET['AF_CodEvento'];
	
	$RS1 		= $objEmpresa->buscarXrif($objConexion,$AF_RIF);
	$cantRS1 	= $objConexion->cantidadRegistros($RS1);
	
	$AF_Razon_Social = $objConexion->obtenerElemento($RS1,0,"AF_Razon_Social");
	
	$RS2 		= $objEmpresaCont->listarXempresa($objConexion,$AF_RIF);
	$cantRS2 	= $objConexion->cantidadRegistros($RS2);	

	$rsEvento 		= $objEvento->buscar($objConexion,$AF_CodEvento);
	$cantEvento 	= $objConexion->cantidadRegistros($rsEvento);

	$_SESSION['AF_Nombre_Evento'] = $objConexion->obtenerElemento($rsEvento,0,"AF_Nombre_Evento");	
	$_SESSION['FE_Fecha_Desde'] = $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Desde");
	$_SESSION['FE_Fecha_Hasta'] = $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Hasta");
	$_SESSION['AL_Ciudad'] 		= $objConexion->obtenerElemento($rsEvento,0,"AL_Ciudad");
	$_SESSION['AL_Pais'] 		= $objConexion->obtenerElemento($rsEvento,0,"AL_Pais");	
	$FE_Fecha_Desde			= $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Desde");
	$FE_Fecha_Hasta			= $objConexion->obtenerElemento($rsEvento,0,"FE_Fecha_Hasta");
	$TI_Hora_Inicio_Am		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Inicio_Am");
	$TI_Hora_Final_Am		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Final_Am");
	$TI_Hora_Inicio_Pm		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Inicio_Pm");
	$TI_Hora_Final_Pm		= $objConexion->obtenerElemento($rsEvento,0,"TI_Hora_Final_Pm");
	$NU_Minutos_x_Cita		= $objConexion->obtenerElemento($rsEvento,0,"NU_Minutos_x_Cita");		
	$NU_Minutos_Entre_Cita	= $objConexion->obtenerElemento($rsEvento,0,"NU_Minutos_Entre_Cita");

	$RS3 		= $objCita->mostrarAgenda($objConexion,$AF_RIF,$AF_CodEvento);
	$cantRS3 	= $objConexion->cantidadRegistros($RS3);
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
		$this->Cell(0,0,'AGENDA DE NEGOCIOS',0,0,'C');		
		$this->Ln(7);
		$this->Cell(0,0,utf8_decode(mayuscula($_SESSION['AF_Nombre_Evento'])),0,0,'C');		
		$this->Ln(7);
		$this->Cell(0,0,'En la Ciudad de '.titulo($_SESSION['AL_Ciudad']).', '.titulo($_SESSION['AL_Pais']),0,0,'C');	
		$this->Ln(7);
		$this->SetFont('Arial','B',12);
		$this->Cell(0,0,'Desde el '.date("d/m/Y",strtotime($_SESSION['FE_Fecha_Desde'])).' hasta el '.date("d/m/Y",strtotime($_SESSION['FE_Fecha_Hasta'])),0,0,'C');		
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
$pdf->Cell(22,10,'RIF / IDN: '.$AF_RIF,0,0,'L');
$pdf->Ln(7);
$pdf->Cell(65,10,'Razon Social: '.utf8_decode(mayuscula($AF_Razon_Social)),0,0,'L');
$pdf->Ln(10);

$pdf->SetFillColor(232,232,232);	
$pdf->SetFont('Arial','B',11);

//ESPACIO 100% DE LA TABLA = 190 EN VERTICAL////////////////////////
$pdf->Cell(8,7,'Nro',1,0,'C',1);
$pdf->Cell(37,7,'Cedula / Pasaporte',1,0,'C',1);
$pdf->Cell(51,7,'Nombre',1,0,'C',1);
$pdf->Cell(51,7,'Apellido',1,0,'C',1);
$pdf->Cell(43,7,'Cargo',1,0,'C',1);	
$pdf->Ln(7);	
$pdf->SetFont('Arial','',10);
for($i=0;$i<$cantRS2;$i++){
	$NU_Cedula 	= $objConexion->obtenerElemento($RS2,$i,"NU_Cedula");
	$AL_Nombre 	= $objConexion->obtenerElemento($RS2,$i,"AL_Nombre");
	$AL_Apellido= $objConexion->obtenerElemento($RS2,$i,"AL_Apellido");
	$AF_Cargo 	= $objConexion->obtenerElemento($RS2,$i,"AF_Cargo");

	$pdf->Cell(8,7,$i+1,1,0,'C',1);
	$pdf->Cell(37,7,$NU_Cedula,1,0,'L');
	$pdf->Cell(51,7,ucwords(strtolower(utf8_decode($AL_Nombre))),1,0,'L');
	$pdf->Cell(51,7,ucwords(strtolower(utf8_decode($AL_Apellido))),1,0,'L');
	$pdf->Cell(43,7,ucwords(strtolower(utf8_decode($AF_Cargo))),1,0,'L');	
	$pdf->Ln(7);	
}
$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,0,mayuscula('Cronograma de Citas:'),0,0,'C');
$pdf->Ln(3);
$igual = '';
for($i=0;$i<$cantRS3;$i++){
	$FE_Fecha 	= $objConexion->obtenerElemento($RS3,$i,"FE_Fecha");
	if ($igual!=$FE_Fecha){
		$pdf->Ln(7);
		$pdf->SetFont('Arial','B',13);
		$pdf->Cell(0,7,'Dia: '.cambiarFormatoA($FE_Fecha),1,0,'C');
		$pdf->Ln(7);
		$pdf->Cell(30,7,'Hora',1,0,'C',1);
		$pdf->Cell(15,7,'Cita',1,0,'C',1);		
		$pdf->Cell(125,7,'Empresa',1,0,'C',1);
		$pdf->Cell(0,7,'Mesa',1,0,'C',1);
		$pdf->Ln(7);	
		$pdf->SetFont('Arial','',10);
		$igual = $FE_Fecha;
	}
	$NU_Cita 		= $objConexion->obtenerElemento($RS3,$i,"NU_Cita");
	$TI_Hora_Inicio = $objConexion->obtenerElemento($RS3,$i,"TI_Hora_Inicio");
	$TI_Hora_Final 	= $objConexion->obtenerElemento($RS3,$i,"TI_Hora_Final");
	$empresa_AF_RIF	= $objConexion->obtenerElemento($RS3,$i,"empresa_AF_RIF");
	$BI_Invita 		= $objConexion->obtenerElemento($RS3,$i,"BI_Invita");
	$Invita			= $objConexion->obtenerElemento($RS3,$i,"Invita");
	$Invitado 		= $objConexion->obtenerElemento($RS3,$i,"Invitado");	
	$NU_Mesa 		= $objConexion->obtenerElemento($RS3,$i,"NU_Mesa");

	if ($empresa_AF_RIF==$AF_RIF){
		$RIF = $BI_Invita;
		$empresa = $Invitado;
	}else{
		$RIF = $empresa_AF_RIF;		
		$empresa = $Invita;		
	}
	if ($RIF != '0'){
		$pdf->Cell(30,7,formatoHora($TI_Hora_Inicio).' / '.formatoHora($TI_Hora_Final),1,0,'C',1);
		$pdf->Cell(15,7,$NU_Cita,1,0,'C');		
		$pdf->Cell(125,7,$empresa,1,0,'L');
		$pdf->Cell(0,7,$NU_Mesa,1,0,'C');
		$pdf->Ln(7);	
	}
}
$pdf->Ln(10);	
$pdf->Output();

?>