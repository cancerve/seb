<?php
	$conexion = mysql_pconnect("localhost", "root", "temporal1") or trigger_error(mysql_error(),E_USER_ERROR);
	mysql_select_db("bd_seb", $conexion);
?>