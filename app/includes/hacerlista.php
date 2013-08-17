<?php
//////////////////////////////////LISTAR CODIGO ARANCELARIO
function hacerlistaCodArancel($nivel,$AF_RIF) {
	include("conexion.php");

	$lista = '<ul>';

	if ($lista == '<ul>'){
		$lista = '<ul id="navigation">';	
	}
	
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM cod_arancel WHERE AL_ParentCod = '".$nivel."'";
	$q = mysql_query($sql, $conexion) or die(mysql_error());

	while ($r = mysql_fetch_assoc($q))  {
		mysql_query("SET NAMES 'utf8'");		
		$RSCA = "SELECT * FROM empresa_cod_arancel WHERE cod_arancel_AL_CodArancel = '".$r['AL_CodArancel']."' and empresa_AF_RIF = '".$AF_RIF."'";
		$RSCA = mysql_query($RSCA, $conexion) or die(mysql_error());
		$RS = mysql_fetch_assoc($RSCA);
		
		$checked = '';
		if($RS['id']!=''){ $checked = 'checked'; }
		
		$lista .= '<li>'.'<input type="checkbox" name="chk'.$r['AL_CodArancel'].'" id="chk'.$r['AL_CodArancel'].'" value="'.$r['AL_CodArancel'].'" style="height:13" '.$checked.'/>'.$r['AL_CodArancel'].' - '.substr($r['AF_Arancel'],0,85);
		if(strlen($r['AF_Arancel'])>85){ $lista .= '...';}

		$tiene_dependientes = null;

		$sql = "SELECT COUNT(AL_CodArancel) FROM cod_arancel WHERE AL_ParentCod = ".$r['AL_CodArancel'];
		$tiene_dependientes = mysql_num_rows(mysql_query($sql, $conexion));
 
 		if ($tiene_dependientes>0) {
			$lista .= hacerlistaCodArancel($r['AL_CodArancel'],$AF_RIF);
		}
		$lista .= '</li>';
	}
	$lista .= '</ul>';
	return $lista;
}

/////////////////////////////////LISTAR PAISES //////////////
function hacerlistaPaises() {
	ini_set('display_errors', '0');
	require_once("constantes.php");
	require_once("conexion.class.php");
	require_once('../../../model/paisModel.php');

	$objConexion = new conexion(SERVER,USER,PASS,DB);
	$objPais = new Pais();
	
	$colu = 3;
	$lista = '<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro">';

	$rsPais = $objPais->listar($objConexion);
	$cant = $objConexion->cantidadRegistros($rsPais);
	for($i=0;$i<$cant;$i++){
		$value = $objConexion->obtenerElemento($rsPais,$i,"AL_CodPais");
		$des = $objConexion->obtenerElemento($rsPais,$i,"AL_Pais");

		if ($colu==3){
			$lista .= '<tr><td>'.'<input type="checkbox" name="chk'.$i.'" id="chk'.$i.'" value="'.$value.'" style="height:13"/>'.$des.'</td>';
			$colu = 0;
		}else{
			$lista .= '<td>'.'<input type="checkbox" name="chk'.$i.'" id="chk'.$i.'" value="'.$value.'" style="height:13"/>'.$des.'</td>';			
			$colu++;
			if ($colu==3){
				$lista .= '</tr>';
			}
		}
	}

	$lista .= '</table>';
	return $lista;
}

?>
