<?php
	session_start();

	//EN LINUX
	//$ruta = '.:/php/PEAR.:/var/www/seb/app/includes';
	//EN WINDOWS
	$ruta = '.;D:\xampp\php\PEAR.;D:\xampp\htdocs\seb\app\includes;D:\xampp\htdocs\seb\app\model;';
	set_include_path(get_include_path() . PATH_SEPARATOR . $ruta);

	require_once("constantes.php");
	require_once("conexion.class.php");
	require_once("usuarioModel.php");
?>
<?php
	$objConexion= new conexion(SERVER,USER,PASS,DB);
	$objUsuario = new usuario();

	$usuario = $_SESSION["AF_Usuario"];
	
	if(isset($usuario)==false)
	{
		$mensaje="Acceso Denegado.";
		header("Location: http://localhost/seb/index.php?mensaje=$mensaje");			
	}else{
		$resUsuario=$objUsuario->buscarUsuario($objConexion,$usuario);
		$cant = $objConexion->cantidadRegistros($resUsuario);
		
		if($cant>0)
		{
			$rolUsuario=$objConexion->obtenerElemento($resUsuario,0,"rol");
			$_SESSION['rolUsuario']=$rolUsuario;
			
			$AL_NombreApellido=$objConexion->obtenerElemento($resUsuario,0,"AL_NombreApellido");
			$_SESSION['AL_NombreApellido']=$AL_NombreApellido;
			
			$empresa_AF_RIF=$objConexion->obtenerElemento($resUsuario,0,"empresa_AF_RIF");
			$_SESSION['AF_RIF']=$empresa_AF_RIF;			
						
		}else{
			$mensaje="Acceso Denegado.";
			header("Location: ../../index.php?mensaje=$mensaje");			
		}
	}
?>
<?php
	if(isset($_GET['tmenj'])=='1'){
		$clase = 'BlancoAzul';
	}else{
		$clase = 'BlancoRojo';	
	}
?>