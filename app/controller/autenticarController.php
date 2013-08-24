<?php
	require_once("../includes/conexion.class.php");
	require_once("../includes/constantes.php");	
	require_once("../includes/captcha/securimage.php");	
	require_once("../model/usuarioModel.php");
	require_once("../model/empresaModel.php");
	require_once("../model/empresaPostuModel.php");
	require_once("../model/citaModel.php");		
?>
<?php
if(isset($_POST["submit"])){
	try{
		$AF_Usuario = strtolower(trim($_POST["AF_Usuario"]));
		$AF_Clave 	= $_POST["AF_Clave"];
		$code 		= $_POST['code'];
		
		$objConexion	= new conexion(SERVER,USER,PASS,DB);
		$objUsuario		= new Usuario();
		$objImgCode 	= new Securimage();
		$objEmpresa		= new Empresa();
		
		$encontrado=$objUsuario->validarUsuario($objConexion,$AF_Usuario,$AF_Clave);

	    $valid = $objImgCode->check($code);
		
		if (($encontrado) and ($valid))
		{
			//session_start();
			$_SESSION["AF_Usuario"] = $AF_Usuario;			

			$RS = $objUsuario->buscarUsuario($objConexion,$AF_Usuario);
			$rol = $objConexion->obtenerElemento($RS,0,"rol"); 
			if ($rol==1){
				$AF_RIF = $objConexion->obtenerElemento($RS,0,"empresa_AF_RIF"); 
				$RS1 = $objEmpresa->buscarXrif($objConexion,$AF_RIF);
				$AF_Razon_Social = $objConexion->obtenerElemento($RS1,0,"AF_Razon_Social");
				
				$objEmpresaPostu = new EmpresaPostu();
				$RS = $objEmpresaPostu->buscarXstatus($objConexion,$AF_RIF,3);
				$cantRS = $objConexion->cantidadRegistros($RS);
				
				$objCita = new Cita();
				$RS2 = $objCita->buscarXresponder($objConexion,$AF_RIF);
				$cantRS2 = $objConexion->cantidadRegistros($RS2);

				if ($cantRS2 > 0){
					$mensaje="ATENCION: Usted tiene nuevas solicitudes de Citas de Negocios. Debe Aprobar o Rechazar dichas solicitudes, para continuar con el proceso de elaboracion de la Agenda.";
				}
				if ($cantRS > 0){
					$mensaje="IMPORTANTE: Su empresa ha sido seleccionada a participar en un Nuevo Evento. Debe confirmar su participacion en el mismo, para continuar con el proceso.";
				}
				if ($AF_Razon_Social == ''){
					$mensaje="IMPORTANTE: Debe actualizar el Perfil de la Empresa para poder continuar.";
				}

				$_SESSION["AF_Razon_Social"] = $AF_Razon_Social;
				$_SESSION["AF_RIF"] 		 = $AF_RIF;
				header("Location: ../views/index.php?mensaje=$mensaje");
			}else{
				header("Location: ../views/index.php");
			}
		}else{
			$mensaje="El nombre de Usuario, Clave o Codigo Invalido.";
			header("Location: ../../index.php?mensaje=$mensaje");			
		}
	}
	
	catch(Exception $e){
		$mensaje=$e->getMessage();
	}	
}
?>