<?php 
require_once('../controller/sessionController.php'); 
require_once('../model/empresaPostuModel.php'); 
require_once('../model/citaModel.php'); 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<title>SEB</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/seb.css" >
<link rel="shortcut icon" href="../images/favicon.ico"/>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript">
    function abrir_dialog() {
		var mensaje = "<?php echo $_GET['mensaje']; ?>";
		if(mensaje){
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
		}
    };
</script>
</head>

<body onLoad="abrir_dialog();">
<div id="dialog" title="Mensaje" style="display:none;">
    <span class="ui-icon ui-icon-circle-check"></span>
    <p><?php echo $_GET['mensaje']; ?></p>
</div>
<p>&nbsp;</p>
<?php if ($_SESSION['rolUsuario']==1){ ?>
<table width="300"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="Negrita">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
      <p>&nbsp;</p>
      <p class="Textonegro">Escoja una acci&oacute;n en el listado de botones presentados en la parte superior. </p>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
<?php if($_SESSION['AF_Razon_Social']==''){ ?>  
  <tr>
    <td align="center">
    
    <table width="180" border="0" align="center" cellpadding="1" cellspacing="5">
      <tr>
        <td width="90" height="20" align="center" class="BotonGris"><a href="empresa/index.php"> <img src="../images/empresa.jpg" width="51" height="51"><br>
          Perfil<br>
          Empresa <br>
        </a></td>
        <td width="90" align="center" class="Negrita"><a href="empresa/index.php">Haga clic aqui para actualizar el Perfil de laEmpresa</a></td>
        </tr>
    </table>
    </td>
  </tr>
<?php } ?>
<?php 
$objEmpresaPostu = new EmpresaPostu();
$RS = $objEmpresaPostu->buscarXstatus($objConexion,$_SESSION['AF_RIF'],3);
$cantRS = $objConexion->cantidadRegistros($RS);
if ($cantRS>0){ ?>
  <tr>
    <td align="center">
    
    <table width="180" border="0" align="center" cellpadding="1" cellspacing="5">
      <tr>
        <td width="90" height="20" align="center" class="BotonGris"><a href="participacion/index.php"> <img src="../images/participacion.jpg" width="51" height="51"><br>
          Confirmar<br>
          Participacion <br>
        </a></td>
        <td width="90" align="center" class="Negrita"><a href="participacion/index.php">Haga clic aqui para Confirmar su Participacion en un Evento</a></td>
        </tr>
    </table>
    </td>
  </tr>
<?php } ?>  
<?php 
$objCita = new Cita();
$RS1 = $objCita->buscarXresponder($objConexion,$_SESSION['AF_RIF']);
$cantRS1 = $objConexion->cantidadRegistros($RS1);
if ($cantRS1>0){ ?>
  <tr>
    <td align="center">
    
    <table width="180" border="0" align="center" cellpadding="1" cellspacing="5">
      <tr>
        <td width="90" height="20" align="center" class="BotonGris"><a href="agendacion/citas/index.php"> <img src="../images/cita.jpg" width="51" height="51"><br>
          Gestionar<br>
          Citas
          <br>
        </a></td>
        <td width="90" align="center" class="Negrita"><a href="agendacion/citas/index.php">Haga clic aqui para Gestionar las Solicitudes de Citas Pendientes</a></td>
        </tr>
    </table>
    </td>
  </tr>
<?php } ?>  
</table>
<?php }else{ ?>
<table width="300"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="Negrita">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
      <p>&nbsp;</p>
      <p class="Textonegro">Escoja una acci&oacute;n en el listado de botones presentados en la parte superior. </p>
    </td>
  </tr>
</table>
<p>
  <?php } ?>
</p>
<form name="form1" id="form1" method="post" action="../controller/empresaController.php">
  <input name="AF_RIF" type="hidden" id="AF_RIF" value="<?=$_SESSION['AF_RIF']?>">
  <input name="origen" type="hidden" id="origen" value="Participacion">
</form>
</body>
</html>
