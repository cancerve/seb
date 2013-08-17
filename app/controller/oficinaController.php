<?php
	require_once('sessionController.php'); 
?>
<?php

if(isset($_POST["origen"])){
	////////////////////////// ENVIO DE CORREO DE CONTACTAR OFICINA
	if($_POST["origen"]=='Contactar Oficina'){

		$para='';

		for($i=1;$i<=$_POST['cantidad'];$i++)
		{
			if(isset($_POST["chk".$i]))
			{
				$para .= $_POST["chk".$i].',';
			}
		}

		$asunto = $_POST['asunto'];				

		$origen = $_FILES['adjunto']['tmp_name'];
		if ($origen!=''){
			//////////// CON ADJUNTO
			$destino = "../images/adjuntos/".$_FILES['adjunto']['name'];
			if(!@move_uploaded_file($origen, $destino))
			{
				die("Error al tratar de subir el archivo");
			}
			$fp = fopen($destino, 'rb');
			$data = fread($fp, $_FILES['adjunto']['size']);
			fclose($fp);
			
			$data = chunk_split(base64_encode($data));
			$borde_mime = "BORDE_MULTIPARTE_123";
			$ent = chr(13).chr(10);
			$encabezados = "Content-Type: multipart/mixed; ".
					   "boundary=".chr(34).$borde_mime.chr(34);
			$mensaje = "--$borde_mime".$ent;
			$mensaje.= "Content-Type: text/html; ".
					   "charset=".chr(34)."iso-8859-1".chr(34).";".$ent.$ent;
			$mensaje.=$_POST['mensaje'].$ent.$ent;
			$mensaje.= "--$borde_mime".$ent;
			$mensaje.= "Content-Type: ".$_FILES['adjunto']['type'].";".
					   "name=".chr(34).$_FILES['adjunto']['name'].chr(34).";".$ent;
			$mensaje.= "Content-Transfer-Encoding: base64 ".$ent;
			$mensaje.= "Content-Disposition: attachment; ".
			"filename=".chr(34).$_FILES['adjunto']['name'].chr(34).";".$ent.$ent;
			$mensaje.="$data".$ent;
			$mensaje.= "--$borde_mime--".$ent;
			if(!mail($para,$asunto,$mensaje,$encabezados)){
				$mensaje = "Error al tratar de enviar el Correo \n";
			}else{
				$mensaje = "Correo Enviado Correctamente \n";			
			}
		}else{
			////////////// SIN ADJUNTO
			$remitente = "INFORMACION OFICINA COMERCIAL";
			$correo = "contacto@bancoex.gob.ve";	 
			$headers = "MIME-Version: 1.0\r\n";
			$headers.= "From: BANCOEX <$remitente>\n";
			$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$mensaje = $_POST['mensaje'];
			
			if(!mail($para,$asunto,$mensaje,$headers)){
				$mensaje = "Error al tratar de enviar el Correo \n";
			}else{
				$mensaje = "Correo Enviado Correctamente \n";			
			}
		}
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=../views/contactarEmp/index.php?mensaje=$mensaje\">";
	}
}
?>