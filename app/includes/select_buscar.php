<?php 
  require_once('../model/empresaModel.php');
  require_once('../model/eventoPaisParticiModel.php');
  require_once('../model/oficinaCModel.php');
  require_once('../model/empresaPostuModel.php');
  require_once('../model/empresaCodArancelModel.php');
  require_once('../model/citaEmpresaModel.php');
  require_once('../model/citaModel.php');
  require_once('../controller/sessionController.php'); 
?>
<?php
////////////////////////////// PARA TRAER OFICINAS COMERCIALES
if (isset($_POST['AF_CodEvento2'])){
	$AF_CodEvento = $_POST['AF_CodEvento2'];

	$objEventoPaisPartici = new EventoPaisPartici();
	$RSpais = $objEventoPaisPartici->listarXevento($objConexion,$AF_CodEvento);
	$cantRS = $objConexion->cantidadRegistros($RSpais);
	
	if ($cantRS>0){
		$tabla = '<table class="TablaRojaGrid"  width="100%"><tr class="TablaRojaGridTRTitulo"><th scope="col">Nro</th><th scope="col">Pais</th><th scope="col">Oficina Comercial</th><th scope="col">Telefono</th><th scope="col">Correo</th><th scope="col">Ver</th></tr>';
		$k=0;
		for($i=0;$i<$cantRS;$i++){
			$pais_AL_CodPais=$objConexion->obtenerElemento($RSpais,$i,"pais_AL_CodPais");
			
			$objOficinaC = new OficinaC();
			$RSOfic = $objOficinaC->listarXpais($objConexion,$pais_AL_CodPais);
			$cantRS2 = $objConexion->cantidadRegistros($RSOfic);
			for($j=0;$j<$cantRS2;$j++){			
				$k++;
				$AF_CodOficina=$objConexion->obtenerElemento($RSOfic,$j,"AF_CodOficina");
				$pais_oficina=$objConexion->obtenerElemento($RSOfic,$j,"pais_oficina");
				$AL_Nombre_Oficina=$objConexion->obtenerElemento($RSOfic,$j,"AL_Nombre_Oficina");
				$AF_Correo=$objConexion->obtenerElemento($RSOfic,$j,"AF_Correo");	
				$NU_Telefono=$objConexion->obtenerElemento($RSOfic,$j,"NU_Telefono");					
				
				$tabla .= '<tr class="TablaRojaGridTR"><td class="TablaRojaGridTD">'.$k.'<input type="checkbox" name="chk'.$k.'" id="chk'.$k.'" value="'.$AF_Correo.'" style="height:13" checked="checked"/></td><td class="TablaRojaGridTD" align="left">'.$pais_oficina.'</td><td class="TablaRojaGridTD" align="left">'.$AL_Nombre_Oficina.'</td><td class="TablaRojaGridTD">'.$NU_Telefono.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Correo.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_oficina.php?AF_CodOficina='.$AF_CodOficina.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td></tr>';
			}
		}
		
		$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';
		echo $tabla;
		 
	}else{
		echo '<b>No existen Oficinas Comerciales Registradas que coincidan con el Pais vinculado al Evento Seleccionado</b>';
	}		
}
////////////////////////////////////////// PARA TRAER EMPRESAS CANDIDATAS AL EVENTO
	if (isset($_POST['Contactar_Empresa'])){
	
		$AF_CodEvento=$_POST['Contactar_Empresa'];
	
		$objEmpresa = new Empresa();
		$objEmpresaPostu = new EmpresaPostu();
		
		$RS=$objEmpresa->buscarXEventXcod($objConexion,$AF_CodEvento);
		$cant=$objConexion->cantidadRegistros($RS);
		if ($cant>0){
			
			$tabla = '<table width="95%" align="center" class="TablaRojaGrid"><tr class="TablaRojaGridTRTitulo"><th scope="col">Nro</th><th scope="col">Pais</th><th scope="col">RIF</th><th scope="col">Razon Social</th><th scope="col">Telefono</th><th scope="col">Correo</th><th scope="col">Ver</th></tr>';
			$k=0;
			for($i=0;$i<$cant;$i++){
				
			  $k++;
			  $AF_RIF=$objConexion->obtenerElemento($RS,$i,"AF_RIF");
			  $AF_Razon_Social=$objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
			  $AF_Telefono=$objConexion->obtenerElemento($RS,$i,"AF_Telefono");
			  $AF_Correo_Electronico=$objConexion->obtenerElemento($RS,$i,"AF_Correo_Electronico");	
			  $pais_AL_CodPais = $objConexion->obtenerElemento($RS,$i,"pais_AL_CodPais");

			  $RSexist = $objEmpresaPostu->buscarXempresaXevento($objConexion,$AF_RIF,$AF_CodEvento);	
			  $cantRSexist = $objConexion->cantidadRegistros($RSexist);
			  
			  $checked = '';
			  if($cantRSexist>0){ $checked = 'checked="checked"'; }
				  
			  $tabla .= '<tr><td class="TablaRojaGridTD">'.$k.'<input type="checkbox" name="chk'.$k.'" id="chk'.$k.'" value="'.$AF_Correo_Electronico.'" style="height:13" '.$checked.'/></td><td class="TablaRojaGridTD">'.$pais_AL_CodPais.'</td><td class="TablaRojaGridTD">'.$AF_RIF.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Razon_Social.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Telefono.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Correo_Electronico.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_empresa.php?AF_RIF='.$AF_RIF.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td></tr>';
			}

			$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';			
			echo $tabla;  
		}else{
			echo '<b>No existen Empresas Registradas que coincidan con el Codigo Arancelario relacionado al Evento Seleccionado</b>';
		}
	}
////////////////// PARA TRAER EMPRESAS PARTICIPANTES CON SIMILARES CODIGOS ARANCELARIOS
	if (isset($_POST['Emp_Cita'])){
	
		$AF_CodEvento	= $_POST['Emp_Cita'];
		$AF_RIF 		= $_SESSION['AF_RIF'];
		$tabla			= '';
		$codigos		= '';
		$rifs			= '';				
		$objEmpresa 			= new Empresa();
		$objCitaEmpresa			= new CitaEmpresa();
		$objEmpresaPostu 		= new EmpresaPostu();
		$objEmpresaCodArancel 	= new EmpresaCodArancel();
		
		$RS1 		= $objEmpresaCodArancel->listarXempresa($objConexion,$AF_RIF);
		$cantRS1 	= $objConexion->cantidadRegistros($RS1);
		
		for($x=0; $x<$cantRS1; $x++){
			$AL_CodArancel  = $objConexion->obtenerElemento($RS1,$x,"AL_CodArancel");
			$codigos .= "EMCA.cod_arancel_AL_CodArancel='".$AL_CodArancel."' or ";
		}
		
		$codigos = substr($codigos, 0, -4);
		
		$RS2		= $objCitaEmpresa->listarXempresa($objConexion,$AF_RIF);
		$cantRS2	= $objConexion->cantidadRegistros($RS2);

		if ($cantRS2>0){
			$rifs = 'AND (';	
			for($w=0; $w<$cantRS2; $w++){
				$empresa_AF_RIF  = $objConexion->obtenerElemento($RS2,$w,"BI_Invita");
				$rifs .= "E.AF_RIF!='".$empresa_AF_RIF."' and ";
				$empresa_AF_RIF  =$objConexion->obtenerElemento($RS2,$w,"empresa_AF_RIF");
				$rifs .= "E.AF_RIF!='".$empresa_AF_RIF."' and ";				
			}
		
			$rifs = substr($rifs, 0, -4).")";
		}
		
		$RS 	= $objEmpresa->buscarXEventXempXcod($objConexion,$AF_CodEvento,$AF_RIF,$codigos,$rifs);
		$cantRS = $objConexion->cantidadRegistros($RS);

		if ($cantRS>0){
			$tabla = '<table width="95%" align="center" class="TablaRojaGrid"><tr class="TablaRojaGridTRTitulo"><th scope="col">Nro</th><th scope="col">Pais</th><th scope="col">Razon Social</th><th scope="col">Clasificacion Empresarial</th><th scope="col">Pagina Web</th><th scope="col">Ver</th><th scope="col">Citar</th></tr>';

			$k=0;
			for($i=0;$i<$cantRS;$i++){
				
			  $k++;
			  $AF_RIF=$objConexion->obtenerElemento($RS,$i,"AF_RIF");
			  $AF_Razon_Social=$objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
			  $AF_Clasificacion_Empresa=$objConexion->obtenerElemento($RS,$i,"AF_Clasificacion_Empresa");
			  $AL_Web=$objConexion->obtenerElemento($RS,$i,"AL_Web");	
			  $pais_AL_CodPais = $objConexion->obtenerElemento($RS,$i,"pais_AL_CodPais");

			  $tabla .= '<tr><td class="TablaRojaGridTD">'.$k.'</td><td class="TablaRojaGridTD">'.$pais_AL_CodPais.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Razon_Social.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Clasificacion_Empresa.'</td><td class="TablaRojaGridTD" align="left">'.$AL_Web.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_empresa.php?AF_RIF='.$AF_RIF.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/agendacion/citar/citar.php?AF_RIF='.$AF_RIF.'&AF_CodEvento='.$AF_CodEvento.'"><img src="http://localhost/seb/app/images/bton_cita.gif" width="31" height="31"></a></td></tr>';

			}
			$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';			
		}

		if ($tabla==''){
			echo '<b>En estos momentos no existen Empresas Participantes pertinentes al Codigo Arancelario de su Empresa. Intente de nuevo en otro momento.</b>';
		}else{
			echo $tabla;
		}
	}

////////////////////////////////////////// PARA TRAER EMPRESAS CANDIDATAS AL EVENTO
	if (isset($_POST['Emp_Candi'])){
	
		$AF_CodEvento=$_POST['Emp_Candi'];

		$objEmpresa = new Empresa();
		$objEmpresaPostu = new EmpresaPostu();
		
		$RS=$objEmpresa->buscarCandiXcod($objConexion,$AF_CodEvento);
		$cant=$objConexion->cantidadRegistros($RS);
		if ($cant>0){
			
			$tabla = '<table width="95%" align="center" class="TablaRojaGrid"><tr class="TablaRojaGridTRTitulo"><th scope="col">Nro</th><th scope="col">Pais</th><th scope="col">RIF / IDN</th><th scope="col">Razon Social</th><th scope="col">Ver</th></tr>';
			$k=0;
			for($i=0;$i<$cant;$i++){
				
			  $k++;
			  $AF_RIF=$objConexion->obtenerElemento($RS,$i,"AF_RIF");
			  $AF_Razon_Social=$objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
			  $pais_AL_CodPais = $objConexion->obtenerElemento($RS,$i,"pais_AL_CodPais");

			  $RSexist = $objEmpresaPostu->buscarXempresaXevento($objConexion,$AF_RIF,$AF_CodEvento);	
			  $cantRSexist = $objConexion->cantidadRegistros($RSexist);
			  
			  $checked = '';
			  if($cantRSexist>0){ $checked = 'checked="checked"'; }
				  
			  $tabla .= '<tr><td class="TablaRojaGridTD">'.$k.'<input type="checkbox" name="chk'.$i.'" id="chk'.$i.'" value="'.$AF_RIF.'" style="height:13" '.$checked.'/></td><td class="TablaRojaGridTD">'.$pais_AL_CodPais.'</td><td class="TablaRojaGridTD">'.$AF_RIF.'</td><td class="TablaRojaGridTD">'.$AF_Razon_Social.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_empresa.php?AF_RIF='.$AF_RIF.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td></tr>';
			}

			$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';			
			echo $tabla;  
		}else{
			echo '<b>No existen Empresas Registradas que coincidan con el Codigo Arancelario relacionado al Evento Seleccionado</b>';
		}
	}
	
////////////////////////////////////////// PARA TRAER EMPRESAS POSTULADAS AL EVENTO
	if (isset($_POST['Emp_Postu'])){

		$AF_CodEvento=$_POST['Emp_Postu'];

		$objEmpresa = new Empresa();
		$objEmpresaPostu = new EmpresaPostu();
		
		$RS=$objEmpresa->buscarPostuXevento($objConexion,$AF_CodEvento);
		$cant=$objConexion->cantidadRegistros($RS);
		if ($cant>0){
			
			$tabla = '<table width="95%" align="center" class="TablaRojaGrid"><tr class="TablaRojaGridTRTitulo"><th scope="col">Nro</th><th scope="col">Pais</th><th scope="col">RIF / IDN</th><th scope="col">Razon Social</th><th scope="col">Ver</th></tr>';
			$k=0;
			for($i=0;$i<$cant;$i++){
				
			  $k++;
			  $AF_RIF=$objConexion->obtenerElemento($RS,$i,"AF_RIF");
			  $AF_Razon_Social=$objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
			  $pais_AL_CodPais = $objConexion->obtenerElemento($RS,$i,"pais_AL_CodPais");

			  $RSexist = $objEmpresaPostu->buscarXempresaXevento($objConexion,$AF_RIF,$AF_CodEvento);	
			  $cantRSexist = $objConexion->cantidadRegistros($RSexist);
			  
			  $checked = '';
			  if($cantRSexist>0){ $checked = 'checked="checked"'; }
				  
			  $tabla .= '<tr><td class="TablaRojaGridTD">'.$k.'<input type="checkbox" name="chk'.$i.'" id="chk'.$i.'" value="'.$AF_RIF.'" style="height:13" '.$checked.'/></td><td class="TablaRojaGridTD">'.$pais_AL_CodPais.'</td><td class="TablaRojaGridTD">'.$AF_RIF.'</td><td class="TablaRojaGridTD">'.$AF_Razon_Social.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_empresa.php?AF_RIF='.$AF_RIF.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td></tr>';
			}

			$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';			
			echo $tabla;  
		}else{
			echo '<b>No existen Empresas Registradas que coincidan con el Codigo Arancelario relacionado al Evento Seleccionado</b>';
		}
	}
////////////////////////////////////////// PARA TRAER SOLICITUDES DE CITAS
	if (isset($_POST['Soli_Citas'])){

		$objCita = new Cita();
		
		$AF_CodEvento	= $_POST['Soli_Citas'];
		$AF_RIF 		= $_SESSION['AF_RIF'];
		$Evento			= " and evento_AF_CodEvento='".$AF_CodEvento."'";
		
		$RS		= $objCita->buscarXresponder2($objConexion,$AF_RIF,$Evento);
		$cant	= $objConexion->cantidadRegistros($RS);
		if ($cant>0){
			
			$tabla = '<table width="95%" align="center" class="TablaRojaGrid"><tr class="TablaRojaGridTRTitulo"><th scope="col">Dia</th><th scope="col">Hora</th><th scope="col">Mesa</th><th scope="col" width="300">Invita</th><th scope="col" width="50">Ver</th><th scope="col">Aceptar</th><th scope="col">Rechazar</th></tr>';
			$k=0;
			for($i=0;$i<$cant;$i++){
				
			  $k++;
			  $NU_Cita 			   =$objConexion->obtenerElemento($RS,$i,"NU_Cita");
			  $evento_AF_CodEvento =$objConexion->obtenerElemento($RS,$i,"evento_AF_CodEvento");
			  $FE_Fecha			   =$objConexion->obtenerElemento($RS,$i,"FE_Fecha");
			  $TI_Hora_Inicio 	   = $objConexion->obtenerElemento($RS,$i,"TI_Hora_Inicio");
  			  $TI_Hora_Final 	   = $objConexion->obtenerElemento($RS,$i,"TI_Hora_Final");
  			  $NU_Mesa 			   = $objConexion->obtenerElemento($RS,$i,"NU_Mesa");
			  $AF_Razon_Social 	   = $objConexion->obtenerElemento($RS,$i,"AF_Razon_Social");
			  $empresa_AF_RIF 	   = $objConexion->obtenerElemento($RS,$i,"empresa_AF_RIF");
  
			  $tabla .= '<tr><td class="TablaRojaGridTD">'.date("d-m-Y",strtotime($FE_Fecha)).'</td><td class="TablaRojaGridTD">'.date("H:i",strtotime($TI_Hora_Inicio)).' a '.date("H:i",strtotime($TI_Hora_Final)).'</td><td class="TablaRojaGridTD">'.$NU_Mesa.'</td><td class="TablaRojaGridTD" align="left">'.$AF_Razon_Social.'</td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/views/reportes/detalle_empresa.php?AF_RIF='.$empresa_AF_RIF.'" target="_blank"><img src="http://localhost/seb/app/images/bton_ver.gif" width="31" height="31"></a></td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/controller/citaController.php?NU_Cita='.$NU_Cita.'&&origen=Aceptar"><img src="http://localhost/seb/app/images/bton_confir.gif" width="31" height="31"></a></td><td class="TablaRojaGridTD"><a href="http://localhost/seb/app/controller/citaController.php?NU_Cita='.$NU_Cita.'&&origen=Rechazar"><img src="http://localhost/seb/app/images/bton_rechaz.gif" width="31" height="31"></a></td></tr>';
			}

			$tabla .= '</table><input type="hidden" value="'.$k.'" name="cantidad" id="cantidad">';			
			echo $tabla;  
		}else{
			echo '<b>No existen Solicitudes de Citas para el Evento Seleccionado.</b>';
		}
	}	
		
?>