<?php require_once('../model/ciudadModel.php'); ?>
<?php require_once('../controller/sessionController.php'); ?>
<?php
	$objCiudad = new Ciudad;
	$rsCiudad=$objCiudad->buscarCiudades($objConexion,$_GET["opcion"]);
	$cant = $objConexion->cantidadRegistros($rsCiudad);
	// Comienzo a imprimir el select

	echo "<select name='ciudad_AF_CodCiudad' id='ciudad_AF_CodCiudad' style='width:350px'>";
	echo "<option value=''>[ Seleccione ]</option>";
	
	for($i=0;$i<$cant;$i++){
		  $value=$objConexion->obtenerElemento($rsCiudad,$i,"AF_CodCiudad");
		  $des=$objConexion->obtenerElemento($rsCiudad,$i,"AL_Ciudad");
		  $selected="";
		  if($_GET['valor_ciudad']==$value){
			  $selected="selected='selected'";
		  }
		  echo "<option value=".$value." ".$selected.">".$des."</option>";
	}  
	echo "</select>";

?>


