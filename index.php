<html>
<link rel="stylesheet" type="text/css" href="app/css/seb.css">
<link rel="shortcut icon" href="app/images/favicon.ico"/>
<script src="app/images/swfobject_modified.js" type="text/javascript"></script>
<head>
<title>SEB</title>
<meta http-equiv="" content="text/html; charset=utf-8">
</head>

<body>
<table width="780" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" bgcolor="#333333" class="Blanquita" align="center">SISTEMA DE EVENTOS BANCOEX</td>
  </tr>
  <tr>
    <td valign="bottom">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
      <tr>
        <td align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
          <tr>
            <td align="center"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="550" height="140">
              <param name="movie" value="app/images/SEB.swf">
              <param name="quality" value="high">
              <param name="wmode" value="opaque">
              <param name="swfversion" value="10.1.0.0">
              <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
              <param name="expressinstall" value="app/images/expressInstall.swf">
              <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="app/images/SEB.swf" width="550" height="140">
                <!--<![endif]-->
                <param name="quality" value="high">
                <param name="wmode" value="opaque">
                <param name="swfversion" value="10.1.0.0">
                <param name="expressinstall" value="app/images/expressInstall.swf">
                <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
                <div>
                  <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object></td>
          </tr>
        </table>
       </td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="8" cellpadding="8">
              <tr>
                <th valign="top" scope="col">
                <table width="100%" class="TablaRojaGrid">
                  <tr class="TablaRojaGridTRTitulo">
                    <th scope="col">MACRO RUEDAS DE NEGOCIO</th>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="Textonegro" align="justify"><div align="justify" style="margin-left:12; margin-right:12">
                      Las Macro Ruedas de Negocios constituyen un instrumento de pol&iacute;tica pblica que ha puesto el Gobierno Bolivariano de Venezuela, al servicio de la cooperativas, micros, peque&ntilde;as y grandes empresas con potencial o tradici&oacute;n exportadora; a trav&eacute;s del Ministerio del poder popular de Planificaci&oacute;n y Finanzas y Bancoex, como organismo adscrito, responsable de la promoci&oacute;n de las exportaciones venezolanas, con el prop&oacute;sito de consolidar la base econ&oacute;mica y productiva de la integraci&oacute;n latinoamericana y fortalecer la cooperaci&oacute;n Sur &#8211; Sur. Bajo el compromiso de complementaci&oacute;n de las pol&iacute;ticas macroecon&oacute;micas de los pa&iacute;ses latinoamericanos para competir con econom&iacute;as mundiales en condiciones de igualdad, las Macro Ruedas, por su aplicaci&oacute;n y dimensi&oacute;n estrat&eacute;gica dentro de la policita comercial nacional, representan una oportunidad hist&oacute;rica para el desarrollo end&oacute;geno de Venezuela, fortaleciendo su capacidad productiva y diversificando la oferta exportable, fundamentada en los principios de solidaridad y complementariedad para garantizar un comercio justo y el bienestar de nuestros pueblos.
             
                    </div></td>
                  </tr>
                  <tr>
                    <td class="Textonegro" align="justify" height="5px">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="50" align="center" bordercolor="#0055a5" bgcolor="CCCCCC" class="NegritaMayor"><a href="app/views/usuario_empresa/index.php">Si aun su empresa no esta registrada en el SISTEMA DE EVENTOS BANCOEX, Haga clic aqui.</a></td>
                  </tr>
                  <tr>
                    <td class="Textonegro" align="justify" height="5px">&nbsp;</td>
                  </tr>                  
                  <tr>
                    <td class="TextonegroPEQ" align="center" style="margin-left:12; margin-right:12">En caso de cualquier duda puede escribirnos a la siguente direccion de correo: <a href="mailto:soporte_seb@bancoex.gob.ve">soporte@bancoex.gob.ve. </a><a href="#">Descargue aqui el Manual del Usuario</a></td>
                  </tr>
                </table>
                </th>
                <th width="300" scope="col" valign="middle">
                  <form name="form1" id="form1" method="POST" action="app/controller/autenticarController.php">
                    <fieldset>
                      <legend class="NegritaMayor" align="left"> Ingrese al Sistema </legend>
                      <table width="300" border="1" align="right" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="TablaRojaGrid">
                                              <tr>
                          <td style="border-color:#FFF" align="center" height="30" <?php if(isset($_GET['mensaje'])){ if (isset($_GET['c'])){ echo 'class="BlancoAzul"><span>'.$_GET['mensaje'].'</span>'; }else{ echo 'class="BlancoRojo"><span>'.$_GET['mensaje'].'</span>'; }} ?>></td>
                        </tr>
                        <tr>
                          <td align="center" style="border-color:#FFF">&nbsp;</td>
                        </tr>
                        <tr>
                          <td style="border-color:#FFF">
                            <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" class="Negrita">
                              <tr>
                                <td>Usuario:
                                <br>                      <input name="AF_Usuario" type="text" id="AF_Usuario" size="20" style="height:30px; width:200px; font-size:20"></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Clave:<br>                      <input name="AF_Clave" type="password" id="AF_Clave" size="20" style="height:30px; width:200px; font-size:20""></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Codigo:<br>                      <img src="app/includes/captcha/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>"></td>
                              </tr>
                              <tr bordercolor="#F8F8F8">
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Escribir Codigo:<br>                      <input name="code" id="code" type="text" size="20" style="height:30px; width:200px; font-size:20"" /></td>
                              </tr>
                              <tr>
                                <td align="center" bordercolor="#F8F8F8">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" bordercolor="#F8F8F8"><input id="submit" name="submit" type="submit" class="BotonRojo" value="[ Entrar ]"></td>
                              </tr>
                              <tr>
                                <td align="center" bordercolor="#F8F8F8">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" bordercolor="#F8F8F8"><p><a href="#" onClick="alert('En Construccion')">Recupere su Clave</a></p></td>
                              </tr>
                          </table></td>
                        </tr>
                      </table>
                    </fieldset>
                  </form>
                </th>
              </tr>
          </table>
          </td>
        </tr>
      </table>
	</td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>