<?php require_once('../controller/sessionController.php'); ?>
<!DOCTYPE HTML PUBLIC>
<html>
<link rel="stylesheet" type="text/css" href="../css/seb.css">
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="shortcut icon" href="../images/favicon.ico"/>
<head>
<title>SEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/maximizar.js"></script>
<script type="text/javascript" src="../js/desconectar.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    function abrir_dialog() {
		  $( "#dialog" ).dialog({
			  show: "blind",
			  hide: "explode",
			  modal: true,
			  buttons: {
				Aceptar: function() {
				  $( this ).dialog( "close" );
				}
			  }
		  });
    };
</script>
</head>
<body onUnload="desconectar();">
    <div id="dialog" title="Mensaje" style="display:none;">
    <p>En Construccion!!.</p>
</div>
<?php include("sections/header.html");?>
<table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#F8F8F8" bgcolor="#FFFFFF">
  <tr>
    <td height="25" bgcolor="#F8F8F8">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="2" class="Textonegro" align="right">Bienvenido(a), <?php echo $_SESSION['AL_NombreApellido']; ?></td>
        </tr>
      <tr>
        <td colspan="2"><img src="../images/blank.gif" width="1" height="1"></td>
        </tr>
      <tr bgcolor="#EFEFEF">
        <td bgcolor="#EFEFEF" colspan="2">
          <?php switch($_SESSION['rolUsuario']){
             case '0':
		  ?>        
          <table width="730" border="0" align="center" cellpadding="1" cellspacing="5">
            <tr>
              <td width="81" height="20" align="center" class="BotonGris"><a href="contactarEmp/index.php" target="central"><img src="../images/contactar.jpg" width="51" height="51"><br>
                Contactar Empresa</a></td>
              <td width="81" align="center" class="BotonGris"><a href="postular/interna/index.php" target="central"><img src="../images/postular.jpg" width="51" height="51"><br>
                Postular Empresa</a></td>
              <td width="81" align="center" class="BotonGris"><a href="resultado/index.php" target="central"><img src="../images/registrar resultados.jpg" width="51" height="51"><br>
                 Resultado de Negocio</a></td>
              <td width="81" align="center" class="BotonGris"><a href="informe/index.php" target="central"><img src="../images/informe.jpg" width="51" height="51"><br>
                &nbsp;Obtener Informe</a></td>
              <td width="84" align="center" class="BotonGris"><p><a href="configuracion/index.php" target="central"><img src="../images/config.jpg" width="51" height="51">Configuración<br>
                &nbsp; </a></p></td>
              <td width="81" align="center" class="BotonGris"><a href="creditos.php" target="central"><img src="../images/creditos.jpg" width="51" height="51"  alt=""/><br>
Créditos<br>
&nbsp;</a></td>
              <td width="81" align="center" class="BotonGris"><a href="usuario/index.php" target="central"><img src="../images/clave.jpg" alt="Cambiar Clave" width="51" height="51" border="0"><br>
                Perfil<br>
                Usuario
              </a></td>
              <td width="81" align="center" class="BotonGris"><a href="salirView.php"><img src="../images/salir.jpg" alt="Salir del Sistema" width="51" height="51" border="0"><br>
                Salir del<br>
                Sistema</a></td>
              </tr>
            </table>            
          <?php break;
			 case '1':
		  ?>
          <table width="599" border="0" align="center" cellpadding="1" cellspacing="5">
            <tr>
              <td width="90" height="20" align="center" class="BotonGris"><a href="empresa/index.php" target="central"> <img src="../images/empresa.jpg" width="51" height="51"><br>
                Perfil<br>
                Empresa <br>
              </a></td>
              <td width="90" height="20" align="center" class="BotonGris"><a href="postular/externa/index.php" target="central" > <img src="../images/postular.jpg" width="51" height="51"><br>
                Postular<br>
                Empresa </a></td>
              <td width="90" align="center" class="BotonGris"> <a href="agendacion/index.php" target="central"><img src="../images/cita.jpg" width="51" height="51"><br>
                Agendación<br>
                &nbsp; </a></td>
              <td width="90" align="center" class="BotonGris"><a href="creditos.php" target="central" ><img src="../images/creditos.jpg" width="51" height="51"  alt=""/><br>
                Créditos<br>&nbsp;</a></td>
              <td width="90" align="center" class="BotonGris"><a href="usuario/index.php" target="central"><img src="../images/clave.jpg" alt="Cambiar Clave" width="51" height="51" border="0"><br>
                Perfil<br>
                Usuario </a></td>
              <td width="90" align="center" class="BotonGris"><a href="salirView.php"><img src="../images/salir.jpg" alt="Salir del Sistema" width="51" height="51" border="0"><br>
                Salir del<br>
                Sistema</a></td>
              </tr>
            </table>            
          <?php break;
			 case '2':
		  ?>
          <table width="401" border="0" align="center" cellpadding="1" cellspacing="5">
            <tr>
              <td width="90" height="20" align="center" class="BotonGris"><a href="seleccionar/index.php" target="central"> <img src="../images/evaluar.jpg" width="51" height="51"><br>
                Evaluar y Seleccionar</a></td>
              <td width="90" align="center" class="BotonGris"><a href="creditos.php" target="central"><img src="../images/creditos.jpg" width="51" height="51"  alt=""/><br>
                Créditos<br>
  &nbsp;</a></td>
              <td width="90" align="center" class="BotonGris"><a href="usuario/index.php" target="central"><img src="../images/clave.jpg" alt="Cambiar Clave" width="51" height="51" border="0"><br>
                Perfil<br>
                Usuario </a></td>
              <td width="90" align="center" class="BotonGris"><a href="salirView.php"><img src="../images/salir.jpg" alt="Salir del Sistema" width="51" height="51" border="0"><br>
                Salir del<br>
                Sistema</a></td>
              </tr>
            </table>            
          <?php break;
			 case '3':
		  ?>
          <table width="401" border="0" align="center" cellpadding="1" cellspacing="5">
            <tr>
              <td width="90" align="center" class="BotonGris"><a href="informe/index.php" target="central"><img src="../images/informe.jpg" width="51" height="51"><br>
  &nbsp;Obtener Informe</a></td>
              <td width="90" align="center" class="BotonGris"><a href="creditos.php" target="central"><img src="../images/creditos.jpg" width="51" height="51"  alt=""/><br>
                Créditos<br>
                &nbsp;</a></td>
              <td width="90" align="center" class="BotonGris"><a href="usuario/index.php" target="central"><img src="../images/clave.jpg" alt="Cambiar Clave" width="51" height="51" border="0"><br>
                Perfil<br>
                Usuario </a></td>
              <td width="90" align="center" class="BotonGris"><a href="salirView.php"><img src="../images/salir.jpg" alt="Salir del Sistema" width="51" height="51" border="0"><br>
                Salir del<br>
                Sistema</a></td>
              </tr>
            </table>            
          <?php break;
		  }
		  ?>
          
</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bordercolor="#000000">
		<iframe src="centralView.php?mensaje=<?=$_GET['mensaje']?>" name="central" width="780" height="500" vspace="0" scrolling="yes" frameborder="1"></iframe>	
	</td>
  </tr>
</table>
</body>
</html>