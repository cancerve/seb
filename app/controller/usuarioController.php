<?php
require_once("../includes/constantes.php");
require_once("../includes/conexion.class.php");

$objConexion= new conexion(SERVER,USER,PASS,DB);

	require_once('../model/usuarioModel.php');
	require_once('../model/empresaModel.php');
	
	$objUsuario = new Usuario();
	$objEmpresa = new Empresa();
?>
<?php
////////////////////// CASO DE USO POSTULAR EMPRESA INTERNAS ///////
	if ($_POST['origen']=='UserEmp')
	{
		$AF_Usuario     	= $_POST['AF_Usuario'];
		$empresa_AF_RIF 	= $_POST['empresa_AF_RIF'];
		$AF_Clave       	= $_POST['AF_Clave'];
		$AL_NombreApellido	= $_POST['AL_NombreApellido'];
		$AF_Correo			= $_POST['AF_Correo'];
		$rol				= 1;
		
		$objUsuario->insertar($objConexion,$AF_Usuario,$empresa_AF_RIF,$AF_Clave,$AL_NombreApellido,$AF_Correo,$rol);
		$objEmpresa->insertarRIF($objConexion,$empresa_AF_RIF);
		
		$remitente = "SISTEMA DE ENCUENTRO DE BANCOEX (SEB)";
		$correo = "contacto@bancoex.gob.ve";	 
		$headers = "MIME-Version: 1.0\r\n";
		$headers.= "From: BANCOEX <$remitente>\n";
		$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
		$mensaje = 'Usted se ha registrado satisfactoriamente en el Sistema de Encuentro de Bancoex (SEB).</br></br>Nombre de Usuario: '.$AF_Usuario.'</br></br>Clave de Acceso: '.$AF_Clave.'</br></br>Para entrar al sistema haga clic en el siguiente vinculo e introduzca su usario y clave.</br></br><a href="www.bancoex.gob.ve">www.bancoex.gob.ve</a>';
		if(!mail($para,$asunto,$mensaje,$headers)){
			$mensaje = "Error al tratar de enviar el Correo \n";
		}else{
			$mensaje = "Correo Enviado Correctamente \n";			
		}

		header("Location: ../views/usuario_empresa/fin.php?AF_Correo=$AF_Correo");
	}
?>