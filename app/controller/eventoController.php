<?php
	require_once('sessionController.php'); 
	require_once('../model/eventoModel.php'); 
	require_once('../model/cod_arancelModel.php');	
	require_once('../model/eventoCodArancelModel.php');	
	require_once('../model/eventoPaisParticiModel.php');		
	require_once('../model/paisModel.php');	
	require_once('../includes/fecha.php'); 		
	
	$objEvento = new Evento();
	$objCodArancel = new CodArancel();
	$objEventoCodArancel = new EventoCodArancel();
	$objEventoPaisPartici = new EventoPaisPartici();
	$objPais = new Pais();
?>
<?php
	if(isset($_POST["origen"])){
		if(!isset($_POST["id"])){

			$ciudad_AF_CodCiudad 	= $_POST["ciudad_AF_CodCiudad"];
			$pais_AL_CodPais 		= $_POST["pais_AL_CodPais"];
			$AF_Nombre_Evento 		= $_POST["AF_Nombre_Evento"];
			$AF_Lugar 				= $_POST["AF_Lugar"];
			$FE_Fecha_Desde			= cambiarFormatoE($_POST['FE_Fecha_Desde']);
			$FE_Fecha_Hasta 		= cambiarFormatoE($_POST['FE_Fecha_Hasta']);			
			$F1_FechaDesde 			= cambiarFormatoE($_POST['F1_FechaDesde']);
			$F1_FechaHasta 			= cambiarFormatoE($_POST['F1_FechaHasta']);
			$F2_FechaDesde 			= cambiarFormatoE($_POST['F2_FechaDesde']);
			$F2_FechaHasta 			= cambiarFormatoE($_POST['F2_FechaHasta']);
			$F3_FechaDesde 			= cambiarFormatoE($_POST['F3_FechaDesde']);
			$F3_FechaHasta 			= cambiarFormatoE($_POST['F3_FechaHasta']);
			$F4_FechaDesde 			= cambiarFormatoE($_POST['F4_FechaDesde']);
			$F4_FechaHasta 			= cambiarFormatoE($_POST['F4_FechaHasta']);
			$F5_FechaDesde 			= cambiarFormatoE($_POST['F5_FechaDesde']);
			$F5_FechaHasta 			= cambiarFormatoE($_POST['F5_FechaHasta']);
			$NU_Cantidad_Mesa 		= $_POST["NU_Cantidad_Mesa"];
			$BI_Activo 				= $_POST["BI_Activo"];

			///////////////INSERT EVENTO //////////////////////////////
			$objEvento->insertar($objConexion,$ciudad_AF_CodCiudad,$pais_AL_CodPais,$AF_Nombre_Evento,$AF_Lugar,$FE_Fecha_Desde,$FE_Fecha_Hasta,$F1_FechaDesde,$F1_FechaHasta,$F2_FechaDesde,$F2_FechaHasta,$F3_FechaDesde,$F3_FechaHasta,$F4_FechaDesde,$F4_FechaHasta,$F5_FechaDesde,$F5_FechaHasta,$NU_Cantidad_Mesa,$BI_Activo);
			$AF_CodEvento = $objEvento->obtenerUltimoId($objConexion);

			///////////////INSERT PAISES PARTICIPANTES //////////////////////////////
			$rsPais = $objPais->listar($objConexion);
			$cantRS = $objConexion->cantidadRegistros($rsPais);
			
			for($i=0;$i<$cantRS;$i++)
			{
				$AL_CodPais=$objConexion->obtenerElemento($rsPais,$i,"AL_CodPais");
				if(isset($_POST["chk".$i]))
				{
					$objEventoPaisPartici->insertar($objConexion,$AF_CodEvento,$AL_CodPais);
				}
				
			}
			///////////////INSERT CODIGO ARANCELARIO ////////////////////////////////
			$rsCodA = $objCodArancel->listar($objConexion);
			$cantRS = $objConexion->cantidadRegistros($rsCodA);
			
			for($i=0;$i<$cantRS;$i++)
			{
				$AL_CodArancel=$objConexion->obtenerElemento($rsCodA,$i,"AL_CodArancel");
				if(isset($_POST["chk".$AL_CodArancel]))
				{
					$objEventoCodArancel->insertar($objConexion,$AF_CodEvento,$AL_CodArancel);
				}
			}
		}
		else{
			/*
			$objEvento->actualizar($objConexion,$_POST["id"],$_POST["ciudad_AF_CodCiudad"],$_POST["pais_AL_CodPais"],$_POST["AF_Nombre_Evento"],$_POST["AF_Lugar"],$_POST["FE_Fecha_Desde"],$_POST["FE_Fecha_Hasta"],$_POST["NU_Cantidad_Mesa"],$_POST["BI_Activo"]);
			$mensaje="Registro actualizado correctamente";
			*/
			echo 'ACTUALIZAR';
		}

		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=../views/configuracion/eventohorario/addView.php?AF_CodEvento=$AF_CodEvento\">";
	}
?>