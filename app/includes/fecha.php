<?php
function cambiarFormatoA($fecha1){
	$fecha2=date("d-m-Y",strtotime($fecha1));
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

?>