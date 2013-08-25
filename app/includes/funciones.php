<?php
function cambiarFormatoA($fecha1){
	$fecha2=date("d/m/Y",strtotime($fecha1));
	return $fecha2;
}

function cambiarFormatoE($fecha1){
	$valor = explode("/", $fecha1);
	$fecha2 = $valor[2].'-'.$valor[1].'-'.$valor[0];
	return $fecha2;
}

function cambiarFormatoE2($fecha1){
	$valor = explode("-", $fecha1);
	$fecha2 = $valor[2].'-'.$valor[1].'-'.$valor[0];
	return $fecha2;
}

function mayuscula($palabra){
	$palabra = strtoupper($palabra);
	return $palabra;	
}

function minuscula($palabra){
	$palabra = strtolower($palabra);
	return $palabra;	
}

function mayusprimera($palabra){
	$palabra = ucfirst($palabra);
	return $palabra;	
}

function mayuscdapalabra($palabra){
	$palabra = ucwords($palabra);
	return $palabra;	
}

function titulo($palabra){
	$palabra = ucwords(strtolower(utf8_decode($palabra)));
	return $palabra;	
}

function formatoHora($hora){
	$hora =	date("H:i",strtotime($hora));
	return $hora;
}
?>